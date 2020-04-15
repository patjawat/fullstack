<?php
use yii\helpers\Html;
?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <?=Html::img('@web/car/1920x700_slide3.jpg',[
                'class' => 'd-block w-100',
                'style' => 'height: 500px;',
                'alt' => 1
            ]);?> </div>
        <div class="carousel-item">
            <?=Html::img('@web/car/1920x700_slide2.jpg',[
                'class' => 'd-block w-100',
                'style' => 'height: 500px;',
                'alt' => 2
            ]);?>
        </div>
        <div class="carousel-item">
            <?=Html::img('@web/car/3bae17d.jpg',[
                'class' => 'd-block w-100',
                'style' => 'height: 500px;',
                'alt' => 3
            ]);?>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>