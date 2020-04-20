<?php
use app\modules\car2\models\Bands;
use app\modules\car2\models\Cars;
use app\modules\car2\models\Types;
use yii\helpers\Html;
?>
<style>
.zoom {

    transition: transform .2s;
    /* Animation */
}

.zoom:hover {
    transform: scale(1.2);
}

.zoom2 {

    transition: transform .2s;
    /* Animation */
}

.zoom2:hover {
    transform: scale(1.05);
}

.img-fluid {
    max-width: 100%;
    height: 150px;
}
</style>
<div class="container">
    <h3>ประเถทรถยนต์</h3>
    <table border="0" cellpadding="4" cellspacing="4" style="width:100%;">
        <tbody>
            <tr>
                <?php foreach (Types::find()->all() as $model): ?>
                <td style="text-align: center;">
                    <a href="/product-cat/36149/36149/รถตู้.html" style="text-align: center;">

                        <?=Html::img($model->getPhotoViewer(),['class' => 'img-responsive zoom']);?>
                    </a>
                    <br>
                    <span style="font-size:20px;">
                        <font color="#333333"><?=$model->name?></font>
                    </span>
                </td>
                <?php endforeach;?>
            </tr>
        </tbody>
    </table>
</div>

<br>
<br>
<div class="container">
    <?=$this->render('_search', [
    'model' => $searchModel,
]);?>
</div>
<div class="p-3 promote">

    <div class="container">
        <div class="row">
            <?php foreach (Cars::find()->all() as $car): ?>

            <div class="col-md-3">
                <div class="card profile-card-2 shadow-lg  mb-5 p-1 bg-white rounded zoom2">

                    <div class="card-img-block">
                        <?=Html::img('@web/cars/' . $car->photo, [
    'class' => 'img-fluid',
    'height' => '300px',
]);?>

                    </div>
                    <div class="card-body pt-5">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-success text-lg">
                                พิเศษ
                            </div>
                        </div>

                        <h5 class="card-title">Toyota Vios ปี 2014</h5>
                        <p class="card-text">

                            1.5 J เกียร์ Auto สีบรอนซ์เงิน</p>
                        <div class="icon-block text-success">

                            <p>
                                ราคา ฿359,000.00THB
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

<div class="container pt-3">
    <h3>ยี่ห้อรถยนต์</h3>

    <div class="row">
        <?php foreach (Bands::find()->all() as $model): ?>
        <div class="col-2">
            <?php //Html::img($model->getPhotoViewer());?>
            <?=Html::img($model->getPhotoViewer(),['class' => 'img-responsive zoom','width' =>'100px;']);?>
        </div>

        <?php endforeach;?>
    </div>
</div>