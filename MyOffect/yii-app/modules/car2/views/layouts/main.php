<?php

/* @var $this \yii\web\View */
/* @var $content string */

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

}
</style>
<!-- <body class="layout-top-nav"> -->

<body class="layout-navbar-fixed layout-top-nav layout-footer-fixed">
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
        <?=$this->render('slide');?>

        <div class="container" style="margin-bottom: 100px;">
            <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
            <?=Alert::widget()?>
            <?=$content?>
        </div>

        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright © 2014-2019 <?=Yii::powered()?>.</strong> All rights reserved.
        </footer>
        <?php $this->endBody()?>
    </div>

</body>

</html>
<?php $this->endPage()?>