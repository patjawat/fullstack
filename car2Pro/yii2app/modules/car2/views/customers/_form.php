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
                <?=$form->field($model, 'phone')->textInput()?>




            </div>
            <div class="col-6">

                <?=$form->field($model, 'branch_id')->textInput()?>
                <?=$form->field($model, 'zip_code')->textInput(['maxlength' => true])?>
                <?=$form->field($model, 'amphure_name')->textInput(['maxlength' => true, 'readOnly' => true])?>
                <?=$form->field($model, 'province_name')->textInput(['maxlength' => true, 'readOnly' => true])?>
                <div class="hide-address">
                    <?=$form->field($model, 'address')->textArea(['rows' => 5]);?>
                </div>
                <?=$form->field($model, 'amphure_id')->hiddenInput(['maxlength' => true])->label(false);?>
                <?=$form->field($model, 'province_id')->hiddenInput(['maxlength' => true])->label(false);?>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="form-group">
            <?php if ($model->isNewRecord): ?>
            <?=Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success'])?>
            <?php else: ?>
            <?=Html::submitButton('<i class="fas fa-edit"></i> แก้ไข', ['class' => 'btn btn-warning'])?>

            <?php endif;?>
            <?=Html::a('<i class="fas fa-redo-alt"></i> ยกเลิก', ['/car2/customers'], ['class' => 'btn btn-default'])?>
        </div>
    </div>
    <!-- /.card-footer-->
</div>
<?php ActiveForm::end();?>
<?php
$js = <<< JS
checkAddress();
$('#customers-zip_code').keyup(function (e) {
    var value = $(this).val();
    console.log(value)
    getAddress(value)
});

function getAddress(value){
    $.ajax({
        type: "get",
        url: "index.php?r=car2/customers/get-address",
        data: {zip_code:value},
        dataType: "json",
        success: function (response) {
            checkAddress();
            if(response){
                $('#customers-amphure_id').val(response.amphure_id)
                $('#customers-amphure_name').val(response.amphure_name)
                $('#customers-province_id').val(response.province_id)
                $('#customers-province_name').val(response.province_name)
                $('.hide-address').show();

            }else{
                $('#customers-amphure_id').val(null)
                $('#customers-amphure_name').val(null)
                $('#customers-province_id').val(null)
                $('#customers-province_name').val(null)
                $('.hide-address').hide();
            }
        }
    });
}

function checkAddress(){
        if($('#customers-province_id').val() === ''){
            $('.hide-address').hide();
        }else{
            $('.hide-address').show();
        }
    }

JS;
$this->registerJs($js);
?>