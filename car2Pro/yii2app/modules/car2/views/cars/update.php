<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Cars */

$this->title = 'แก้ไข: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cars-update">

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>