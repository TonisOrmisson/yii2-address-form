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
?>




<div class="row">
    <div class="col-sm-6">
        <?= $form->field($model, 'country')->widget(Select2::class, [
            'data' => $widget->getCountryList(),
            'options' => [
                'id' => $widget->fieldIdPrefix . "country",
                'multiple' => false,
                'placeholder' => $widget->placeHolders['country'],
                'disabled' => !is_null($country),
                'value' => !is_null($country) ? $country->getIsoAlpha2() : null,
            ],
            'pluginOptions'=>[
                'placeholder' => $widget->placeHolders['country'],
            ],
        ]);?>
    </div>

    <div class="col-sm-6">
    <?php if(is_null($country)):?>
        <?= $form->field($model, 'state')->widget(DepDrop::class, [
            'type'=>DepDrop::TYPE_SELECT2,
            'options' => [
                'id' => $widget->fieldIdPrefix . "-state",
            ],
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'placeholder' => $widget->placeHolders['state'],
                'depends'=>[$widget->fieldIdPrefix . 'country'],
                'url' => Url::toRoute(['/addressform/query/regions']),
                'loadingText' => 'Loading child level 1 ...',
                'value' => !is_null($country) ? (new AddressHelper())->formatList($country->getDivisions()) : [],
            ],
        ]);?>
    <?php else:?>
        <?= $form->field($model, 'state')->widget(Select2::class, [
            'data'=>  ArrayHelper::map((new AddressHelper())->formatList($country->getDivisions()),'id', 'name'),
            'options' => [
                'id' => $widget->fieldIdPrefix . "-state",
                'placeholder' => $widget->placeHolders['state'],
            ],
        ]);?>
    <?php endif;?>
    </div>
</div>
