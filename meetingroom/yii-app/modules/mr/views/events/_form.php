<?php

use app\modules\mr\models\Room;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\helpers\Url;
use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
$this->registerJS($this->render('../../web/js/mrScript.js'));
?>

<div class="event-room-form">

    <?php $form = ActiveForm::begin(['id' => 'events-form']);?>


    <div class="row">
        <div class="col-4">
            <?=$form->field($model, 'room_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Room::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'เลือกห้องประชุม'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);?>
        </div>
        <div class="col-8">
            <?=$form->field($model, 'title')->textInput()?>
        </div>

    </div>

    <?php
    echo $form->field($model, 'body')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('mr/elfinder',[
        ]),
    ])->label(false)?>
    <div class="form-group">
        <?php //Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>

<?php
$js = <<< JS

// $('body').on('beforeSubmit', 'form#events-form', function () {
//      var form = $(this);
//      // return false if form still have some validation errors
//      if (form.find('.has-error').length) {
//           return false;
//      }
//      // submit form
//      $.ajax({
//           url: form.attr('action'),
//           type: 'post',
//           data: form.serialize(),
//           success: function (response) {
//               console.log(response);
//                if(response){
//                 closeModal()
//                }else{
//                 alert(response)
//                }
//           }
//      });
//      return false;
// });

JS;
$this->registerJS($js);
?>