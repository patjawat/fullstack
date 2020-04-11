<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hr\models\Employee */

$this->title = 'เพิ่มข้อมูลพนักงาน';
?>
<div class="employee-create text-center">
    <h1>
        <img class="img-circle elevation-3" src="/img/user1-128x128.jpg" alt="User Avatar" style="width:100px;">
        <?=Html::encode($this->title)?></h1>
</div>
<br>
<?=$this->render('_form', [
    'model' => $model,
])?>