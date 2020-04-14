<?php

use app\modules\car2\models\Cars;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
?>

<div class="types-search text-center">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1,
    ],
]);?>
    <div class="row">
        <div class="col-3">
            <?=$form->field($model, 'id')?>
        </div>
        <div class="col-3">
            <?=$form->field($model, 'model_id')?>

        </div>
        <div class="col-2">
            <?=$form->field($model, 'price')?>
        </div>
        <div class="col-3">
            <div class="form-group" style="margin-top:30px;">
                <?=Html::submitButton('<i class="fas fa-search"></i> ค้นหา', ['class' => 'btn btn-primary'])?>
                <?=Html::a('<i class="fas fa-list-ul"></i> ดูทั้งหมด',['/car2/list'], ['class' => 'btn btn-danger'])?>
            </div>
        </div>
    </div>



    <?php ActiveForm::end();?>

</div>