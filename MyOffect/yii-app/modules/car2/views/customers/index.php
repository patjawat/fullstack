<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\car2\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '<i class="fas fa-user-friends"></i> ระบบข้อมมูลลูกค้า (CRM)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <?php Pjax::begin();?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php foreach ($dataProvider->getModels() as $model): ?>
    <div class="card card-widget shadow mb-3 bg-white rounded collapse-card collapsed-card">
        <div class="card-header">
            <div class="user-block">
                <img class="img-circle" src="/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#" data-card-widget="collapse"><?=$model->fullname;?></a> :
                    <span class="text-success"><i class="fas fa-check"></i></span>
                </span>
                <span class="description">อายุ 34 ปี 4 เดือน
                </span>

            </div>
            <!-- /.user-block -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-expanded="false"><i
                        class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <p></p>
            <!-- Social sharing buttons -->
            <a class="btn btn-primary btn-sm" href="/index.php?r=mr%2Fevents%2Fprint-qr&amp;id=79" target="_blank"
                data-pjax="0"><i class="far fa-id-card"></i> พิมพ์บัตรประจำตัว</a>
            <?=Html::a('<i class="far fa-edit"></i>แก้ไข', ['/hr/employee/update', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning create-employee']);?>
            <span class="float-right text-muted">45 likes - 2 comments</span>
        </div>
        <!-- /.card-body -->
    </div>
    <?php endforeach;?>

    <?php Pjax::end();?>

</div>