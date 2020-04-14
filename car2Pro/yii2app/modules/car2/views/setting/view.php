<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\car2\models\Setting */

$this->title = 'ต้ังค่าระบบ';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-view">

    <p>
        <?=Html::a('<i class="far fa-edit"></i> แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>

    </p>

    <?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'title',
        'phone',
        'line_name',
        'facebook_name',
        'address:html',
    ],
])?>

</div>