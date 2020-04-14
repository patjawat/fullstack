<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'phone') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'facebook_link') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'facebook_name') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'line_link') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'line_name') ?>
        </div>
    </div>

    <?= $form->field($model, 'address')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
])->label('ที่อยู่'); ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>