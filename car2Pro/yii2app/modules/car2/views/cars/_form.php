<?php

use app\modules\car2\models\Car2Models;
use app\modules\car2\models\Branch;
use kartik\widgets\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-list-ul"></i> รายการ</h3>

        <div class="card-tools">
            <div style="width: 400px;">
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-3">

        <?php $form = ActiveForm::begin([
    'id' => 'form-cars',
    // 'fieldConfig' => [
    //     'horizontalCssClasses' => [
    //         'label' => 'col-lg-4 col-md-4 col-sm-4',
    //         'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
    //     ],
    // ],
    // 'layout' => 'horizontal',
]);?>
        <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
        <div class="row">
            <div class="col-6">
                <?php echo $form->field($model, 'model_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Car2Models::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);
?>

            </div>
            <div class="col-6">
                <?=$form->field($model, 'price')->textInput()?>

            </div>
        </div>

        <?=$form->field($model, 'sell')->textInput()?>

        <?=$form->field($model, 'photo')->textInput(['maxlength' => true])?>

        <?=$form->field($model, 'content')->textarea(['rows' => 6])?>

        <?php echo $form->field($model, 'branch_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Branch::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'สาขา'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);
?>


        <div class=" form-group">
            <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-left">

        </ul>
        <ul class="pagination pagination-sm m-0 float-right">

        </ul>
    </div>
</div>
<?php ActiveForm::end();?>