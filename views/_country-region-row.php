<?php
/** @var \tonisormisson\addressform\AddressForm $widget */

use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;
?>




<div class="form-group">
    <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['country']?></label>
    <div class="col-sm-4">
        <?= Select2::widget([
            'name' => 'country',
            'data' => $widget->getCountryList(),
            'options' => [
                'id' => $widget->fieldIdPrefix . "country",
                'multiple' => false,
                'placeholder' => $widget->placeHolders['country'],
            ],
            'pluginOptions'=>[
                'placeholder' => $widget->placeHolders['country'],
            ],
        ]);?>
    </div>

    <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['state']?></label>
    <div class="col-sm-4">
        <?= DepDrop::widget([
            'name' => 'region',
            'type'=>DepDrop::TYPE_SELECT2,
            'options' => [
                'id' => $widget->fieldIdPrefix . "-region",
            ],
            'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
            'pluginOptions'=>[
                'placeholder' => $widget->placeHolders['state'],
                'depends'=>[$widget->fieldIdPrefix . 'country'],
                'url' => Url::toRoute(['/addressform/query/regions']),
                'loadingText' => 'Loading child level 1 ...',
            ],
        ]);?>
    </div>
</div>
