<?php

use app\models\Room;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\EventRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-room-form">

    <?php $form = ActiveForm::begin(['id' => 'event-room-form']);?>

    <?=$form->field($model, 'room_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Room::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'เลือกห้องประชุม'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);?>
    <div class="row">
        <div class="col-12">
            <?php

// echo $form->field($model, 'date_start')->widget(DateControl::classname(), [
//     'type' => DateControl::FORMAT_DATETIME,
//     'language' => 'th',
// ]);
// echo $form->field($model, 'date_end')->widget(DateControl::classname(), [
//     'type' => DateControl::FORMAT_DATETIME,
//     'language' => 'th',
// ]);

?>
        </div>

    </div>

    <?=$form->field($model, 'title')->textInput()?>
    <?=$form->field($model, 'body')->textArea(['rows' => 5])?>


    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>

<?php
$js = <<< JS

$('body').on('beforeSubmit', 'form#event-room-form', function () {
     var form = $(this);
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
              console.log(response);
               if(response){
                closeModal()
               }else{
                alert(response)
               }
          }
     });
     return false;
});

JS;
$this->registerJS($js);
?>