<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Customers */

$this->title = 'รหัสลูกค้า | ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="card card-widget">
    <div class="card-header">
        <div class="user-block">
            <img class="img-circle" src="/img/user1-128x128.jpg" alt="User Image">
            <span class="username"><a href="#"><?=$model->fullname;?></a> :
                <span class="text-success"><i class="fas fa-check"></i></span>
            </span>
            <span class="description">อายุ 34 ปี 4 เดือน
            </span>

        </div>
        <!-- /.user-block -->
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                <i class="far fa-circle"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="display: block;">

        <a class="btn btn-primary btn-sm" href="/index.php?r=mr%2Fevents%2Fprint-qr&amp;id=79" target="_blank"
            data-pjax="0"><i class="far fa-id-card"></i> พิมพ์บัตรประจำตัว</a>
        <?=Html::a('<i class="far fa-edit"></i>แก้ไข', ['/car2/customers/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning create-employee']);?>
        <span class="float-right text-muted">45 likes - 2 comments</span>
    </div>
    <!-- /.card-body -->

</div>