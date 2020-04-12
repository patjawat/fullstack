<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\hr\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลพนักงาน';

?>

<h1 class="text-white"><i class="fas fa-user-tag"></i> ข้อมูลพนักงาน</h1>
<p>
    <?=Html::a('<i class="fas fa-plus"></i> สร้างใหม่', ['create'], ['class' => 'btn btn-success create-employee'])?>
</p>
<div class="row">
    <div class="col-8">

        <?php for ($x = 0; $x <= 8; $x++): ?>
        <div class="card card-widget shadow mb-3 bg-white rounded collapse-card collapsed-card">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="/img/user1-128x128.jpg" alt="User Image">
                    <span class="username"><a href="#" data-card-widget="collapse">นายปัจวัฒน์ ศรีบุญเรือง</a> :
                        <code>นักวิชาการคอมพิวเตอร์ <i class="fas fa-cog fa-spin"></i></code>
                    </span>
                    <span class="description">(ห้องประชุมทรายแก้ว) :
                        12/04/2020 เวลา : 07:00:00 - 11:30:00
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
                <a class="btn btn-primary" href="/index.php?r=mr%2Fevents%2Fprint-qr&amp;id=79" target="_blank"
                    data-pjax="0"><i class="far fa-id-card"></i> พิมพ์บัตรประจำตัว</a> <button type="button"
                    class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
                <span class="float-right text-muted">45 likes - 2 comments</span>
            </div>
            <!-- /.card-body -->
        </div>
        <?php endfor;?>

    </div>
    <div class="col-4">
        <?=$this->render('_right_form');?>
    </div>
</div>

<?php Pjax::begin();?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php Pjax::end();?>

<?php
$js = <<< JS

$('.create-employee').click(function (e) {
    e.preventDefault();
    $.ajax({
        type: "get",
        url: "index.php?r=hr/employee/create",
        dataType: "json",
        beforeSend: function(){
            // beforLoadModal();
        },
        success: function (response) {
            $('#main-modal').modal('show');
            $(".modal-dialog").removeClass('modal-lg modal-sm modal-md')
            $('.modal-content').addClass('card-outline card-primary');
            $(".modal-dialog").addClass('modal-lg');
            $('#main-modal-label').html(response.title);
            $('.modal-body').html(response.content);
            $('.modal-footer').html(response.footer);
            $('#master-requester').focus();
            $('.modal-header').html('<div class="user-block">'+
            '<img class="img-circle elevation-3" src="/img/user1-128x128.jpg" alt="User Image">'+
            '<span class="username"><a href="#">เพิ่มข้อมูลพนักงาน</a></span>'+
            '<span class="description">Shared publicly - 7:30 PM Today</span>'+
        '</div>'+
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
$this->registerJS($js)
?>