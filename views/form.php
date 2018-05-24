<?php
/** @var \tonisormisson\addressform\AddressForm $widget */

use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Url;


?>

<div class="form-horizontal" role="form">
    <fieldset>

        <!-- Text input-->
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

        <!-- Text input-->
        <div class="form-group">

        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['addressLine1']?></label>
            <div class="col-sm-10">
                <input id="<?=$widget->fieldIdPrefix?>address-line-1" name="address-line-1" placeholder="<?=$widget->placeHolders['addressLine1']?>" class="form-control" type="text">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['addressLine2']?></label>
            <div class="col-sm-10">
                <input  id="<?=$widget->fieldIdPrefix?>address-line-2" name="address-line-2" placeholder="<?=$widget->placeHolders['addressLine2']?>" class="form-control" type="text">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['city']?></label>
            <div class="col-sm-6">
                <input  id="<?=$widget->fieldIdPrefix?>city" name="city" placeholder="<?=$widget->placeHolders['city']?>" class="form-control" type="text">
            </div>
            <div class="col-sm-4">
                <input  id="<?=$widget->fieldIdPrefix?>postCode" name="postCode" placeholder="<?=$widget->placeHolders['postCode']?>" class="form-control" type="text">
            </div>
        </div>

    </fieldset>
</div>