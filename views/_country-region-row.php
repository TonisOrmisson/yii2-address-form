<?php
/** @var \tonisormisson\addressform\AddressForm $widget */
/** @var  \yii\bootstrap\ActiveForm $form */
/** @var  \tonisormisson\addressform\models\Address $model */

use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
use tonisormisson\addressform\AddressHelper;
use yii\helpers\ArrayHelper;

$country =$widget->getCountry();
$countryDisabled = (count($widget->allowedCountries) < 2 and !empty($widget->allowedCountries));
?>

<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'country')->widget(Select2::class, [
            'data' => $widget->getCountryList(),
            'options' => [
                'multiple' => false,
                'placeholder' => $widget->placeHolders['country'],
                'disabled' => $countryDisabled,
                'value' => $country instanceof \Rinvex\Country\Country ? $country->getIsoAlpha2() : null,
                'enableClientValidation' => false,
            ],
            'pluginOptions'=>[
                'placeholder' => $widget->placeHolders['country'],
            ],
        ]);?>
        <?= $countryDisabled ?  $form->field($model, 'country')->hiddenInput(['value'=> $country->getIsoAlpha2()])->label(false) : null ?>
    </div>

    <div class="col-sm-6">
    <?php if(is_null($country)):?>
        <?= $form->field($model, 'state')->widget(DepDrop::class, [
            'type'=>DepDrop::TYPE_SELECT2,
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'placeholder' => $widget->placeHolders['state'],
                'depends'=>[$widget->fieldIdPrefix . 'country'],
                'url' => Url::toRoute(['/addressform/query/regions']),
                'loadingText' => Yii::t("addressform", "Loading") . "...",
                'value' => !is_null($country) ? (new AddressHelper())->formatList($country->getDivisions()) : [],
            ],
        ]);?>
    <?php else:?>
        <?= $form->field($model, 'state')->widget(Select2::class, [
            'data'=>  ArrayHelper::map((new AddressHelper())->formatList($country->getDivisions()),'id', 'name'),
            'options' => [
                'placeholder' => $widget->placeHolders['state'],
            ],
        ]);?>
    <?php endif;?>
    </div>
</div>
