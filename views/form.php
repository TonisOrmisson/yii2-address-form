<?php
/** @var \yii\web\View $this */
/** @var \tonisormisson\addressform\AddressForm $widget */
use yii\bootstrap\ActiveForm;

$model = $widget->address;
?>

<div class="form-horizontal" role="form">
    <?php $form = (empty($widget->form)) ? ActiveForm::begin(['layout' => 'horizontal']) : $widget->form ?>

    <fieldset>
        <?= (in_array('name', $widget->disabledFields)) ? null: $form->field($model, 'name')->textInput(['placeholder'=>$widget->placeHolders['name']]) ?>
        <?= $this->render('_country-region-row', ['widget' => $widget, 'form' => $form]) ?>

        <?= (in_array('addressLine1', $widget->disabledFields)) ? null: $form->field($model, 'addressLine1')->textInput(['placeholder'=>$widget->placeHolders['addressLine1']]) ?>
        <?= (in_array('addressLine2', $widget->disabledFields)) ? null: $form->field($model, 'addressLine2')->textInput(['placeholder'=>$widget->placeHolders['addressLine2']]) ?>
        <?= (in_array('city', $widget->disabledFields)) ? null: $form->field($model, 'city')->textInput(['placeholder'=>$widget->placeHolders['city']]) ?>
        <?= (in_array('postCode', $widget->disabledFields)) ? null: $form->field($model, 'postCode')->textInput(['postCode'=>$widget->placeHolders['postCode']]) ?>
        <?= \yii\helpers\Html::submitButton()?>

    </fieldset>
    <?php (empty($widget->form)) ? ActiveForm::end() : null?>
</div>