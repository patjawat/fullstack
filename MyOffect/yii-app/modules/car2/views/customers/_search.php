<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventRoomSearch */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1,
    ],
]);?>
<div class="row">
    <div class="col-9">
        <?=$form->field($model, 'q', [
    'inputOptions' => [
        'placeholder' => $model->getAttributeLabel('q'),
    ],
])->label(false);?>
    </div>
    <div class="col-3">
        <?=Html::a('<i class="fas fa-plus"></i> สร้างใหม่', ['/car2/customers/create'], ['class' => 'btn btn-success'])?>
    </div>
</div>

<?php ActiveForm::end();?>
<?php
$js = <<< JS

$('#customerssearch-q').select();
JS;
$this->registerJS($js);
?>