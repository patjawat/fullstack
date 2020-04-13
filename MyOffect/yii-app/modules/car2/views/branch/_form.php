<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-code-branch"></i> สาขา</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php $form = ActiveForm::begin();?>

        <?=$form->field($model, 'id')->textInput(['maxlength' => true])?>

        <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>

        <div class="form-group">
            <?=Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success'])?>
            <?=Html::a('<i class="fas fa-redo-alt"></i> ยกเลิก', ['/car2/branch'], ['class' => 'btn btn-default'])?>
        </div>

        <?php ActiveForm::end();?>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
</div>