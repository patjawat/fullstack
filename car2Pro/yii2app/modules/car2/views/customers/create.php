<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Customers */

$this->title = 'ข้อมูลลูกค้า';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-create">

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>