<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\car2\models\CarouselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carousels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousel-index">

    <p>
        <?=Html::a('Create Carousel', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?php Pjax::begin();?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'header' => 'photo',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::img('@web/carousel/'.$model->photo,['width' =>300]);
            },
        ],
        'title',
        'content',

        [
            'class' => 'kartik\grid\ActionColumn',
            'width' => '120px'
        ],
    ],
]);?>

    <?php Pjax::end();?>

</div>