<?php

use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Models */
/* @var $form yii\widgets\ActiveForm */
$this->registerJS($this->render('../../dist/js/car2.js'));
?>

<div class="models-form">

    <?php $form = ActiveForm::begin(['id' => 'form-models']);?>
    <?=$form->field($model, 'band_id')->hiddenInput()->label(false);?>
    <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>
    <?php ActiveForm::end();?>

</div>