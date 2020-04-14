<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Car2Models */

$this->title = 'Create Car2 Models';
$this->params['breadcrumbs'][] = ['label' => 'Car2 Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car2-models-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>