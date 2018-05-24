<?php
namespace tonisormisson\addressform\models;

use yii\base\Model;

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
            [['name', 'state', 'postCode', 'addressLine1', 'addressLine2'], 'required'],
        ];
    }


}