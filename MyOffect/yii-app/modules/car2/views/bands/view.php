<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Bands */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bands-view">
    <p>
        <?=Html::a('<i class="fas fa-angle-left"></i> หน้าหลัก', ['/car2/bands'], ['class' => 'btn btn-default']);?>
        <?=Html::a('<i class="fas fa-plus"></i> เพิ่มรุ่นรถยนต์', ['/car2/models/create', 'band_id' => $model->id], ['class' => 'btn btn-success create-models'])?>
        <?=Html::a('<i class="far fa-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('<i class="far fa-trash-alt"></i> ลบ', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
])?>
    </p>

</div>


<?php Pjax::begin(['id' => 'bands-container-pjax']);?>
<style>
#models-container table thead {
    background-color: #fff;
}

#models-container-container {
    height: 480px;
}
</style>
<?php
$layout = <<< HTML
<div class="clearfix"></div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ul"></i> รุ่นของ{$this->title}</h3>

                <div class="card-tools">
                 <div style="width: 800px;">
                    {$this->render('../models/_search',['model'=>$searchModel,'id'=>$model->id])}
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
            'attribute' => 'username',
            'header' => 'ชื่อรุ่นรถยนต์',
            'value' => function ($model, $key, $index, $widget) {
                return $model->name;
            },
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'header' => '<center>ดำเนินการ<center>',
            'contentOptions' => ['style' => 'width:80px;',
                'noWrap' => true,
            ],
            'template' => '<div>{update} {delete}</div>',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::button('<i class="fas fa-edit"></i>', [
                        'value' => \yii\helpers\Url::to(['update', 'id' => $model->id]),
                        'title' => 'แก้ไขการ' . $this->title,
                        'class' => 'btn btn-warning btn-xs text-white',
                        // 'onclick' =>''
                        'onclick' => "
                            $.ajax({
                                type: 'get',
                                url: '" . \yii\helpers\Url::to(['/car2/models/update', 'id' => $model->id]) . "',
                                beforeSend: function(){
                                    beforLoadModal();
                                },
                                success: function (response) {
                                    $('#main-modal').modal('show');
                                    $('.modal-footer').show();
                                    $('.modal-dialog').removeClass('modal-lg modal-sm modal-md');
                                    $('.modal-content').addClass('card-outline card-primary');
                                    $('.modal-dialog').addClass('modal-md');
                                    $('#main-modal-label').html(response.title);
                                    $('.modal-body').html(response.content);
                                    $('.modal-footer').html(response.footer);
                                }
                            });
                            ",
                    ]);
                },
                'delete' => function ($url, $model, $key) {
                    return Html::button('<i class="far fa-trash-alt"></i>', [
                        'value' => \yii\helpers\Url::to(['delete', 'id' => $model->id]),
                        'title' => 'แก้ไขการ' . $this->title,
                        'class' => 'btn btn-danger btn-xs text-white',
                        // 'onclick' =>''
                        'onclick' => "
                        if (confirm('ลบข้อมูล?')) {
                            $.ajax({
                                type: 'post',
                                url: '" . \yii\helpers\Url::to(['/car2/models/delete', 'id' => $model->id]) . "',
                                success: function (response) {
                                 if(response){
                                    $.pjax.reload({container:'#bands-container-pjax'});
                                 }
                                }
                            });
                        }
                            ",
                    ]);
                },

            ],
        ],

    ],
]);?>
<?php Pjax::end();?>
<?php
$js = <<< JS

$('.create-models').click(function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        beforeSend: function(){
            beforLoadModal();
        },
        success: function (response) {
            $('#main-modal').modal('show');
            $('.modal-footer').show();
            $(".modal-dialog").removeClass('modal-lg modal-sm modal-md')
            $('.modal-content').addClass('card-outline card-primary');
            $(".modal-dialog").addClass('modal-md');
            $('#main-modal-label').html(response.title);
            $('.modal-body').html(response.content);
            $('.modal-footer').html(response.footer);
            $('.modal-header').html('<div class="user-block">'+response.title+'</div>'+
            '<div class="card-tools">'+
                '<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">'+
                    '<i class="far fa-circle"></i></button>'+
                '<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>'+
                '</button>'+
                '<button type="button" class="btn btn-tool" data-card-widget="remove" data-dismiss="modal"><i class="fas fa-times"></i>'+
                '</button>'+
            '</div>')
        }
    });
});




JS;
$this->registerJS($js, View::POS_END);
?>