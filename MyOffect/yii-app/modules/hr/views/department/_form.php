<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hr\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-8">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('ชื่อแผนก/ฝ่าย') ?>
</div>
<div class="col-4">
<div class="form-group" style="margin-top:32px;">
        <?= Html::submitButton('<i class="fas fa-check"></i> ตกลง', ['class' => 'btn btn-success']) ?>
    </div>
</div>
</div>



    <?php ActiveForm::end(); ?>

</div>
