<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Carousel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carousel-form">

    <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
  ]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'active')->inline()->radioList([0 => 'ไม่แสดง', 1 => 'แสดง'])->label('สถานะ') ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
    <?=$form->field($model, 'photo_temp')->fileInput(['id' => 'profile-img'])->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>