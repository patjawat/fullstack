<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Car2Models */

$this->title = 'Update Car2 Models: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Car2 Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car2-models-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>