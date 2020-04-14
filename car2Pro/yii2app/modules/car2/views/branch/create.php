<?php

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Branch */

$this->title = 'สร้างใหม่';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-create">

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>