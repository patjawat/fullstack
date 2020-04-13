<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Bands */

$this->title = 'สร้างยี่ห้อ';
$this->params['breadcrumbs'][] = ['label' => 'Bands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bands-create">
    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>