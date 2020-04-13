<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Models */

$this->title = 'Update Models: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="models-update">
    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>