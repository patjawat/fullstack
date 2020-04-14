<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Setting */

$this->title = 'ตั้งค่าระบบ';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>