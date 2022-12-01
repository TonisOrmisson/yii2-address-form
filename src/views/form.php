<?php
/** @var \yii\web\View $this */
/** @var \tonisormisson\addressform\AddressForm $widget */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$model = $widget->address;
?>

<?= Html::beginTag("div", $widget->htmlOptions) ?>
    <?php $form = (empty($widget->form)) ? ActiveForm::begin($widget->formOptions) : $widget->form ?>
    <?= (in_array('name', $widget->disabledFields)) ? null: $form->field($model, 'name')->textInput(['placeholder'=>$widget->placeHolders['name']]) ?>
    <?= $this->render('_country-region-row', ['widget' => $widget, 'form' => $form, 'model' => $model]) ?>
    <?= (in_array('addressLine1', $widget->disabledFields)) ? null: $form->field($model, 'addressLine1')->textInput(['placeholder'=>$widget->placeHolders['addressLine1']]) ?>
    <?= (in_array('addressLine2', $widget->disabledFields)) ? null: $form->field($model, 'addressLine2')->textInput(['placeholder'=>$widget->placeHolders['addressLine2']]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= (in_array('city', $widget->disabledFields)) ? null: $form->field($model, 'city')->textInput(['placeholder'=>$widget->placeHolders['city']])?>
        </div>
        <div class="col-md-4">
            <?= (in_array('postCode', $widget->disabledFields)) ? null: $form->field($model, 'postCode')->textInput(['placeholder'=>$widget->placeHolders['postCode']]) ?>
        </div>
    </div>
    <?= empty($widget->form) ? Html::submitButton($widget->submitText,$widget->submitOptions) : null?>

<?php (empty($widget->form)) ? ActiveForm::end() : null?>
<?= Html::endTag("div")?>