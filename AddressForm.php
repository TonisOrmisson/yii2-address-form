<?php

namespace tonisormisson\addressform;

use tonisormisson\addressform\models\Address;
use tonisormisson\addressform\traits\TranslationsTrait;
use yii\base\ErrorException;
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

    /**
     * @var Country
     */
    private $country;

    public $id = "address-form";

    /** @var array $placeHolders Form placeholders */
    public $placeHolders;

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

    /** @var string */
    public $submitText;


    /** @var array $submitOptions  the HTML options for submit button */
    public $submitOptions = [
        'class' => 'btn btn-primary',
    ];

    public $htmlOptions = [];

    public $fieldIdPrefix = 'address-';

    /** @var string $defaultCountry */
    public $defaultCountry = "";

    public function init()
    {
        parent::init();
        $this->registerTranslations();
        $this->module = Yii::$app->getModule('addressform');

        $this->setDefaults();

        $this->placeHolders = [
            'name' => Yii::t("addressform", "John Doe"),
            'country' => Yii::t("addressform", "Select country"),
            'state' => Yii::t("addressform", "Select state"),
            'city' => Yii::t("addressform", "New York City"),
            'postCode' => Yii::t("addressform", "10001"),
            'addressLine1' => Yii::t("addressform", "350 Fifth Avenue"),
            'addressLine2' => Yii::t("addressform", "2nd floor, room 203"),
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
    public function getCountryList()
    {

        $countryList = [];
        foreach ($this->countries as $country) {
            $countryList[$country->getIsoAlpha2()] = $country->getEmoji(). " " . $country->getName();
        }
        return $countryList;
    }

    /**
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
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

    private function setDefaults()
    {
        if (empty($this->address)) {
            $params = [];
            if (!empty($this->disabledFields)) {
                $requiredFields = array_diff(Address::$defaultRequiredFields, $this->disabledFields);
                $params['requiredFields'] =  $requiredFields;
            }
            $this->address = new Address($params);
        }

        if (count($this->allowedCountries) === 1) {
            $this->country = country($this->allowedCountries[0]);
            $this->address->country = $this->country->getIsoAlpha2();
        }
        if(!empty($this->defaultCountry)) {
          if(!in_array($this->defaultCountry, $this->allowedCountries) && !empty($this->allowedCountries))  {
              throw new ErrorException("the set defaultCounty '{$this->defaultCountry}' must be one of the configured allowedCountries");
          }
          $this->country = country($this->defaultCountry);
        }

        if (empty($this->submitText)) {
            $this->submitText = Yii::t("addressform", "Send");
        }
        $this->htmlOptions['id'] = $this->id;
        if (!empty($this->htmlOptions)) {
            foreach ($this->htmlOptions as $key => $value) {
                $this->htmlOptions[$key] = $value;
            }
        }

    }


}
