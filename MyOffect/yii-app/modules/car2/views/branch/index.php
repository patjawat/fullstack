<?php

use kartik\grid\GridView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\car2\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สาขา';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?=Html::a('<i class="fas fa-plus"></i> สร้างใหม่', ['create'], ['class' => 'btn btn-success'])?>
</p>

<?php
$layout = <<< HTML
<div class="clearfix"></div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ul"></i> รุ่นของ{$this->title}</h3>

                <div class="card-tools">
                 <div style="width: 800px;">
                    {$this->render('_search',['model'=>$searchModel])}
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
              {items}
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-left">
                {summary}
                </ul>
                <ul class="pagination pagination-sm m-0 float-right">
                  {pager}
                </ul>
              </div>
            </div>
HTML;
?>

<?=GridView::widget([
    'id' => 'models-container',
    'dataProvider' => $dataProvider,
    //   'filterModel' => $searchModel,
    'pjax' => false,
    'showHeader' => true,
    'showPageSummary' => false,
    'layout' => '{items}{pager}',
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => '20'],
    'perfectScrollbar' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
    'layout' => $layout,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '36px',
            'pageSummary' => 'Total',

            'pageSummaryOptions' => ['colspan' => 6],
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
        [
            'attribute' => 'id',
            'width' => '50px',
            'hAlign' => 'center',
            'vAlign' => 'middle',
            'value' => function ($model, $key, $index, $widget) {
                return $model->id;
            },
        ],
        [
            'attribute' => 'name',
            'value' => function ($model, $key, $index, $widget) {
                return $model->name;
            },
        ],

        [
            'class' => 'kartik\grid\ActionColumn',
            'width' => '120px;',
        ],

    ],
]);?>