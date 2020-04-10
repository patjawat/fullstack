<?php
use yii\helpers\Html;
use app\modules\mr\models\Events;

?>
<h1>
    <?php
    echo Yii::$app->basePath;
    ?>
</h1>
<form class="form-inline mb-3">
    <div class="form-group mr-3" style="width:40%">
        <label for="inputPassword2" class="sr-only">Password</label>
        <input type="text" class="form-control" placeholder="ค้นหา .." style="width:100%">
    </div>
    <?=Html::a('<i class="fas fa-plus"></i> จองห้องประชุม',['/mr/events'],['class'=>'btn btn-success'])?>
</form>

<?php foreach (Events::find()->all() as $model):?>
<div class="card card-widget shadow mb-3 bg-white rounded collapse-card collapsed-card">
    <div class="card-header">
        <div class="user-block">
            <img class="img-circle" src="/img/user1-128x128.jpg" alt="User Image">
            <span class="username"><a href="#">เรื่อง : <?=$model->title?></a> <code class="countdown"></code></span>
            <span class="description">(<?=$model->room->name;?>)</span>
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
        <p><?=$model->body;?></p>
        <!-- Social sharing buttons -->
        <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print QR-Code</button>
        <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button>
        <span class="float-right text-muted">45 likes - 2 comments</span>
    </div>
    <!-- /.card-body -->
</div>
<?php endforeach;?>


<?php
$js = <<< JS
    // var interval = setInterval(function() {
    //     var momentNow = moment();
    //     $('.date-part').html(momentNow.format('YYYY MMMM DD') + ' '
    //                         + momentNow.format('dddd')
    //                          .substring(0,3).toUpperCase());
    //     $('.time-part').html(momentNow.format('A hh:mm:ss'));
    // }, 100);
    var timer2 = "5:30:00";
var interval = setInterval(function() {


  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('.countdown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
}, 1000);
JS;
$this->registerJS($js)
?>