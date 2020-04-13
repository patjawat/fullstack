<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Bands */

$this->title = 'แก้ไข: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bands-update">

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>