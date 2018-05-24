# Yii2 Address-form module
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/TonisOrmisson/yii2-address-form/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/TonisOrmisson/yii2-address-form/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/TonisOrmisson/yii2-address-form/badges/build.png?b=master)](https://scrutinizer-ci.com/g/TonisOrmisson/yii2-address-form/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/TonisOrmisson/yii2-address-form/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/TonisOrmisson/yii2-address-form/?branch=master)
A module doing address-form fields with dependent pre-set country-region drop-downs.
Countries & regions powered by:

## powered by rinvex/country
 
250 countries & regions worldwide available

## Example
```
use tonisormisson\addressform\AddressForm; 

echo AddressForm::widget([
    'allowedCountries' => ["EE", "LV", "LT"],
    'fieldIdPrefix' => 'my-model-name-',
    'attributeLabels' = [
        // custom labels here if needed
        'country' => ,
        'state' => ,
        'city' => ,
        'postCode' => ,
        'addressLine1' => ,
        'addressLine2' => ,
    ],
    'placeHolders' = [
        // custom placeholders here if needed
        'country' => ,
        'state' => ,
        'city' => ,
        'postCode' => ,
        'addressLine1' => ,
        'addressLine2' => ,
    ],
            
]);
```
    