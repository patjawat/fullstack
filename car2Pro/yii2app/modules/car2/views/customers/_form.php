<?php

use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

?>

<style>
.form-group>label {
    text-align: end;
    font-size: 15px;
}

.help-block {
    display: block;
    margin-top: 0px;
    margin-bottom: 0px;
    color: #737373;
}

.form-group {
    margin-bottom: 5px;
}
</style>

<?php
$form = ActiveForm::begin([
    'id' => 'form-employee',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-3',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8 offset-sm-0',
        ],
    ],
    'layout' => 'horizontal',
]);
?>


<div class="card">
    <div class="card-header">
        <?php if ($model->isNewRecord): ?>
        <h3 class="card-title"><i class="fas fa-plus"></i> สร้างใหม่</h3>
        <?php else: ?>
        <h3 class="card-title"><i class="fas fa-edit"></i> แก้ไข</h3>
        <?php endif;?>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-6">
                <?=$form->field($model, 'gender')->inline()->radioList(['M' => 'ชาย', 'F' => 'หญิง'])?>
                <?=$form->field($model, 'pname')->widget(Select2::classname(), ['data' => [
    'นาย' => "นาย",
    'นาง' => "นาง",
    'นางสาว' => "นางสาว",
],
    'options' => ['placeholder' => 'เลือกคำนำหน้า'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
])->label();
?>
                <?=$form->field($model, 'fullname')->textInput()?>

                <?=$form->field($model, 'cid')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9'])?>
                <?=$form->field($model, 'birthdate')->widget(DateControl::classname(), ['type' => DateControl::FORMAT_DATE,
    'language' => 'th',
    'ajaxConversion' => false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true,
        ],
    ],
]);
?>


                <div class="form-group">
                    <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
                </div>
            </div>
            <div class="col-6">

                <?=$form->field($model, 'branch_id')->textInput()?>

                <?=$form->field($model, 'address')->textInput(['maxlength' => true])?>
            </div>
        </div>


        Start creating your amazing application!
    </div>
    <!-- /.card-body -->
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
</div>
<?php ActiveForm::end();?>