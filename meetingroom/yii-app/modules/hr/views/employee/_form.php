<?php

use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;
/* @var $this yii\web\View */
/* @var $model app\modules\hr\models\Employee */
/* @var $form yii\widgets\ActiveForm */
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
<!-- <div class="card card-widget shadow-lg p-3 mb-5 bg-white rounded"> -->

<?php
$form = ActiveForm::begin([
    'id' => 'form-chiefcomplaint',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'validateOnBlur' => true,
    'validateOnChange' => true,
    'validateOnSubmit' => true,
    // 'validationUrl' => ['/chiefcomplaint/chiefcomplaint/ajax-validation'],
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-3',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8 offset-sm-0',
        ],
    ],
    'layout' => 'horizontal',
]);
?>
<di class="row">
    <div class="col-6">
        <?=$form->field($model, 'gender')->inline()->radioList(['M' => 'Male', 'F' => 'Female'])?>
        <?=$form->field($model, 'pname')->textInput(['maxlength' => true])?>
        <?=$form->field($model, 'id')->widget(MaskedInput::className(), ['mask' => '9-9999-99999-99-9'])?>
        <?=$form->field($model, 'birthdate')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATE,
    'language' => 'th',
    'ajaxConversion' => false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true,
        ],
    ],
]);
?>
        <?=$form->field($model, 'fname')->textInput(['maxlength' => true])?>
        <?=$form->field($model, 'lname')->textInput(['maxlength' => true])?>
        <?=$form->field($model, 'photo')->fileInput(['maxlength' => true])?>
    </div>
    <div class="col-6">
        <?=
$form->field($model, 'department_id')->widget(Select2::classname(), [
    'data' => [
        'Standard' => "Standard",
        'Contact' => "Contact",
        'Droplet' => "Droplet",
        'Airborne' => "Airborne",
    ],
    'options' => ['placeholder' => 'เลือกแผนก/ฝ่าย'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
])->label();
?>
        <?=
$form->field($model, 'position_id')->widget(Select2::classname(), [
    'data' => [
        'Standard' => "Standard",
        'Contact' => "Contact",
        'Droplet' => "Droplet",
        'Airborne' => "Airborne",
    ],
    'options' => ['placeholder' => 'เลือกตำแหน่งงาน'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
])->label();
?>
        <?=$form->field($model, 'salary')->textInput()?>
        <?=$form->field($model, 'phone')->textInput(['maxlength' => true])?>
        <?=$form->field($model, 'job_start')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATE,
    'language' => 'th',
    'ajaxConversion' => false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true,
        ],
    ],
]);
?>
        <?=$form->field($model, 'job_expire')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATE,
    'language' => 'th',
    'ajaxConversion' => false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true,
        ],
    ],
]);
?>
    </div>
    </div>

    <?php ActiveForm::end();?>