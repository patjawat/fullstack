<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Customers */

$this->title = 'ข้อมูลลูกค้า : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customers-update">
    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>