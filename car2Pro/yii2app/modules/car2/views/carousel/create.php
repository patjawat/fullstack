<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Carousel */

$this->title = 'สร้าง Slide รูปภาพ';
$this->params['breadcrumbs'][] = ['label' => 'Carousels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carousel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>