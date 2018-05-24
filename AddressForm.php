<?php

namespace tonisormisson\addressform;

use tonisormisson\addressform\traits\TranslationsTrait;
use yii\base\Widget;
use Yii;
use Rinvex\Country\Country;



/**
 * Class AddressForm
 * @property array $countryList
 * @property Country[] $countries
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

    /** @var array $attributeLabels Form labels */
    public $attributeLabels;

    /** @var array $placeHolders Form placeholders */
    public $placeHolders;

    public $fieldIdPrefix = "address-form-";

    /** @var Module */
    public $module;

    public function init()
    {
        parent::init();
        $this->module = Yii::$app->getModule('addressform');

        $this->registerTranslations();

        $this->attributeLabels = [
            'country' => Yii::t("addressform", "Country"),
            'state' => Yii::t("addressform", "State"),
            'city' => Yii::t("addressform", "City"),
            'postCode' => Yii::t("addressform", "Post Code"),
            'addressLine1' => Yii::t("addressform", "Street address"),
            'addressLine2' => Yii::t("addressform", "Section, floor, etc."),
        ];

        $this->placeHolders = [
            'country' => Yii::t("addressform", "Select country"),
            'state' => Yii::t("addressform", "Select state"),
            'city' => Yii::t("addressform", "Kilingi-Nõmme"),
            'postCode' => Yii::t("addressform", "Post Code"),
            'addressLine1' => Yii::t("addressform", "Mäe 2"),
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