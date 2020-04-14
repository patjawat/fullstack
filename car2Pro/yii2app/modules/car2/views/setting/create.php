<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Setting */

$this->title = 'Create Setting';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>