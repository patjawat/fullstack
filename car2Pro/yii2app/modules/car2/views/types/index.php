<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\car2\models\TypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ประะเภทรถ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-index">

    <p>
        <?= Html::a('<i class="fas fa-plus"></i> สร้างใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'photo',
                'header' =>'ภาพ',
                'format' =>'raw',
                'value' => function($model){
                    return ' <img src="data:image/jpeg;base64,'.base64_encode($model->photo).'"width="280px" id="imgFormDb" />';
                }
                ],
                'name',
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'width' =>'120px'
                ],
                ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>