<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Types */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="types-view">

    <p>
        <?= Html::a('หน้าหลัก', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบทิ้ง', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php if ($model->photo) : ?>
    <img src="data:image/jpeg;base64,<?= base64_encode($model->photo) ?>" height="40%" width="40%" id="imgFormDb" />
    <?php else : ?>
    <?= Html::img('@web/images/photo_thumbnail.svg'); ?>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>