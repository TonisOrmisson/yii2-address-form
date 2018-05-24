# Yii2 Address-form module
A module doing address-form fields with dependent pre-set country-region drop-downs.
Countries & regions powered by:

##`rinvex/country`
 
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
    