<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\hr\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php // Pjax::begin(); ?>
<div class="department-index">
<div class="show-form-department"></div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


<?php // Pjax::end(); ?>
</div>
<?php
$js = <<< JS
loadFormDepartment();
function loadFormDepartment(){
    $.ajax({
        type: "get",
        url: "index.php?r=hr/department/create",
        dataType: "json",
        success: function (response) {
            $('.show-form-department').html(response.content);
            console.log('success');
        }
    });
}
JS;
$this->registerJS($js);
?>
