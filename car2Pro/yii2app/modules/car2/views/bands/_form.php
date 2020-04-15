<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin();?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-file"></i>
            <?=$this->title;?>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?=$form->field($model, 'name')->textInput(['maxlength' => true])?>
        <?=$form->field($model, 'photo_temp')->fileInput(['id' => 'profile-img'])->label(false);?>

        <div class="form-group">
            <?=Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success'])?>
            <?=Html::a('<i class="fas fa-redo-alt"></i> ยกเลิก', ['/car2/bands'], ['class' => 'btn btn-default'])?>
        </div>

    </div>
    <!-- /.card-body -->
</div>
<?php ActiveForm::end();?>