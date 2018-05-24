<?php
namespace tonisormisson\addressform\models;

use yii\base\Model;
use Yii;

/**
 * Class Address
 * @package tonisormisson\addressform\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class Address extends Model
{
    /** @var string */
    public $name;

    /** @var string $country 2-letter iso code*/
    public $country;

    /** @var string $state*/
    public $state;

    /** @var string $city*/
    public $city;

    /** @var string $postCode*/
    public $postCode;

    /** @var string $addressLine1 */
    public $addressLine1;

    /** @var string $addressLine2 */
    public $addressLine2;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'country', 'state', 'postCode', 'city', 'addressLine1', 'addressLine2', 'state'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t("addressform", "Name"),
            'country' => Yii::t("addressform", "Country"),
            'state' => Yii::t("addressform", "State"),
            'city' => Yii::t("addressform", "City"),
            'postCode' => Yii::t("addressform", "Post Code"),
            'addressLine1' => Yii::t("addressform", "Street address"),
            'addressLine2' => Yii::t("addressform", "Section, floor, etc."),

        ];
    }


}