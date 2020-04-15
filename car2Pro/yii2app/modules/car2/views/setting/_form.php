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
            <?= $form->field($model, 'data_json[title]')->label('ชื่อเว็บ') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'data_json[phone]')->label('โทรสัพท์') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'data_json[facebook_link]')->label('Facebook Link') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'data_json[facebook_name]')->label('ชื่อ Facebook') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'data_json[line_link]')->label('Line Link') ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'data_json[line_name]')->label('ชื่อไลน์') ?>
        </div>
    </div>

    <?= $form->field($model, 'data_json[address]')->widget(CKEditor::className(),[
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