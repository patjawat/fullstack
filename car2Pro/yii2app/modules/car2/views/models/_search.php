<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<style>
.form-group {
    margin-bottom: 0rem;
}
</style>

<?php $form = ActiveForm::begin([
    'action' => ['view', 'id' => $id],
    'method' => 'get',
    'options' => ['data-pjax' => true],
]);?>
<?=$form->field($model, 'q', [
    'inputTemplate' =>
    '<div class="input-group">{input}' . Html::submitButton('<i class="fas fa-search"></i>',
        ['class' => 'btn btn-default']) . '&nbsp;'
    . Html::a('<i class="fas fa-redo"></i>', ['/car2/bands/view', 'id' => $id], ['class' => 'btn btn-secondary']) . '</div>',
])->textInput(['class' => 'form-control float-righ', 'placeholder' => 'ค้นหา', 'autofocus' => 'autofocus'])->label(false);?>
<?php ActiveForm::end();?>

<?php
$js = <<< JS
$('#modelssearch-q').select();
JS;
$this->registerJS($js);
?>