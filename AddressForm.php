<?php

namespace tonisormisson\addressform;

use tonisormisson\addressform\models\Address;
use tonisormisson\addressform\traits\TranslationsTrait;
use yii\base\Widget;
use Yii;
use Rinvex\Country\Country;
use yii\widgets\ActiveForm;


/**
 * Class AddressForm
 * @property array $countryList
 * @property Country[] $countries
 * @property boolean $isFormInjected
 *
 *
 * @package tonisormisson\addressform
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class AddressForm extends Widget
{
    use TranslationsTrait;

    /**
     * @var array $allowedCountries list of allowed countries. If list is empty, all countries are used.
     */
    public $allowedCountries = [];

    public $name = "address-form";

    /** @var array $placeHolders Form placeholders */
    public $placeHolders;

    public $fieldIdPrefix = "address-form-";

    /** @var Module */
    public $module;

    /** @var ActiveForm */
    public $form;

    /** @var array Fields to disable */
    public $disabledFields = [];

    /** @var Address */
    public $address;


    /**
     * @var array config yii\bootstrap\ActiveForm
     */
    public $formOptions = [];


    public function init()
    {
        parent::init();
        $this->registerTranslations();
        $this->module = Yii::$app->getModule('addressform');

        if (empty($this->address)) {
            $this->address = new Address();
        } else {
            $this->address->validate();
        }


        $this->placeHolders = [
            'name' => Yii::t("addressform", "John Doe"),
            'country' => Yii::t("addressform", "Select country"),
            'state' => Yii::t("addressform", "Select state"),
            'city' => Yii::t("addressform", "New York City"),
            'postCode' => Yii::t("addressform", "Post Code"),
            'addressLine1' => Yii::t("addressform", "350 Fifth Avenue"),
            'addressLine2' => Yii::t("addressform", "Section, floor, etc."),
        ];
    }




    public function run()
    {
        return $this->render('form', [
            'widget' => $this
        ]);
    }

    /**
     * @return string[]
     */
    public function getCountryList() {

        $countryList = [];
        foreach ($this->countries as $country) {
            $countryList[$country->getIsoAlpha2()] = $country->getEmoji(). " " . $country->getName();
        }
        return $countryList;
    }

    /**
     * @return Country[]
     */
    public function getCountries()
    {
        $countries = [];
        if (empty($this->allowedCountries)) {
            foreach (\countries() as $countryCode => $countryAttributes) {
                $country = country($countryCode);
                $countries[$country->getIsoAlpha2()] = $country;
            }
            return $countries;
        }

        foreach ($this->allowedCountries as $countryCode) {
            $countries[$countryCode] = country($countryCode);
        }
        return $countries;

    }


}