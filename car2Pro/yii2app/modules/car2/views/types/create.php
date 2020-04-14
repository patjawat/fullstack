<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Types */

$this->title = 'Create Types';
$this->params['breadcrumbs'][] = ['label' => 'Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="types-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>