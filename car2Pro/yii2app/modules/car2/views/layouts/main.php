<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\components\SystemHelper;
use app\widgets\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
// AppAsset::register($this);
app\assets\AdminleAsset::register($this);

?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">

<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>
<style>
body {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: 'Kanit', sans-serif;
    /* background-image: linear-gradient(-90deg, #5f72bd 0%, #9b23ea 100%); */
}

.promote {
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }

    50% {
        background-position: 100% 50%;
    }

    100% {
        background-position: 0% 50%;
    }
}
}
</style>

<!-- <body class="layout-top-nav"> -->

<body class="layout-top-nav">
    <?php $this->beginBody()?>
    <?php
Modal::begin([
    'id' => 'main-modal',
    'title' => '<h4 class="modal-title"></h4>',
    // 'size' => 'modal-sm',
    'footer' => '',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
]);
Modal::end();
?>
    <div class="wrapper">
        <?=$this->render('navbar');?>
        <?php if (Yii::$app->controller->id == 'default'): ?>
        <?=$this->render('slide');?>
        <?php endif;?>

        <div class="<?=Yii::$app->controller->id == 'default' ? '' : 'container'?>"
            style="margin-bottom: 100px;margin-top:50px;">
            <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
            <?=Alert::widget()?>
            <?=$content?>
        </div>

        <footer class="main-footer bg-secondary">
            <div class="container">

                <div class="row">
                    <div class="col-4">
                        <h4>Address</h4>
                        <?=SystemHelper::getSetting('address')?>
                    </div>
                    <div class="col-4">
                        <h4>Follw Use On</h4>
                        <table border="0" cellpadding="2" cellspacing="2" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 45px;">
                                        <?=Html::img('@web/img/line-me.png', ['style' => 'width: 44px; height: 44px;']);?>
                                    </td>
                                    <td>
                                        <span style="line-height:20px;">
                                            <span style="color: rgb(0, 185, 0); font-size:20px;">
                                                OFFICIAL LINE
                                                ID</span><br>
                                            <?=Html::a('<span style="color:#FFFFFF;">' . SystemHelper::getSetting('line_name') . '</span>', 'http://line.me/ti/p/~' . SystemHelper::getSetting('line_link'), ['target' => '_blank'])?>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img alt="" src="/img/fb.png" style="width: 43px; height: 43px;">
                                    </td>
                                    <td>
                                        <?=Html::a('<span style="color:#FFFFFF;">' . SystemHelper::getSetting('facebook_name') . '</span>', SystemHelper::getSetting('facebook_link'), ['target' => '_blank'])?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-4">
                        <h4><i class="fas fa-mobile-alt"></i> <?=SystemHelper::getSetting('phone')?></h4>
                    </div>
                </div>
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                </div>
                <!-- Default to the left -->
                <!-- <strong>Copyright © 2014-2019 <?=Yii::powered()?>.</strong> All rights reserved. -->
            </div>
        </footer>

        <?php $this->endBody()?>
    </div>

</body>

</html>
<?php $this->endPage()?>