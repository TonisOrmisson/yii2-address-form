<?php
/** @var \yii\web\View $this */
/** @var \tonisormisson\addressform\AddressForm $widget */


?>

<div class="form-horizontal" role="form">
    <fieldset>
        <?php if (!in_array('name', $widget->disabledFields)):?>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['name']?></label>
            <div class="col-sm-10">
                <input id="<?=$widget->fieldIdPrefix?>name" name="name" placeholder="<?=$widget->placeHolders['name']?>" class="form-control" type="text">
            </div>
        </div>
        <?php endif;?>

        <?= $this->render('_country-region-row', ['widget' => $widget]) ?>

        <?php if (!in_array('addressLine1', $widget->disabledFields)):?>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['addressLine1']?></label>
            <div class="col-sm-10">
                <input id="<?=$widget->fieldIdPrefix?>address-line-1" name="address-line-1" placeholder="<?=$widget->placeHolders['addressLine1']?>" class="form-control" type="text">
            </div>
        </div>
        <?php endif;?>

        <?php if (!in_array('addressLine2', $widget->disabledFields)):?>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['addressLine2']?></label>
            <div class="col-sm-10">
                <input  id="<?=$widget->fieldIdPrefix?>address-line-2" name="address-line-2" placeholder="<?=$widget->placeHolders['addressLine2']?>" class="form-control" type="text">
            </div>
        </div>
        <?php endif;?>

        <?= $this->render('_city-postcode-row', ['widget' => $widget]) ?>

    </fieldset>
</div>