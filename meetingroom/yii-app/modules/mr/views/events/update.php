<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventRoom */

$this->title = 'Update Event Room: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Event Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
