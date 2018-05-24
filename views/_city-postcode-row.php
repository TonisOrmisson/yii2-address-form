<?php
/** @var \yii\web\View $this */
/** @var \yii\web\View $this */
/** @var \tonisormisson\addressform\AddressForm $widget */

?>



<?php if (!in_array('city', $widget->disabledFields) or !in_array('postCode', $widget->disabledFields)):?>
    <div class="form-group">
        <?php if (!in_array('city', $widget->disabledFields)):?>
        <label class="col-sm-2 control-label" for="textinput"><?=$widget->attributeLabels['city']?></label>
        <div class="col-sm-6">
            <input  id="<?=$widget->fieldIdPrefix?>city" name="city" placeholder="<?=$widget->placeHolders['city']?>" class="form-control" type="text">
        </div>
        <?php endif;?>

        <?php if (!in_array('postCode', $widget->disabledFields)):?>
        <div class="col-sm-4">
            <input  id="<?=$widget->fieldIdPrefix?>postCode" name="postCode" placeholder="<?=$widget->placeHolders['postCode']?>" class="form-control" type="text">
        </div>
        <?php endif;?>
    </div>
<?php endif;?>
