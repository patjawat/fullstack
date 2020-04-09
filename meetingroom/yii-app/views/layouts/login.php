<?php

/**
 * หน้าหลักระบบ Theptarin TCDs
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

app\assets\AdminleAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./img/medico.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./img/medico.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>:TCDs</title>
    <?php $this->head() ?>
</head>

<body class="login-page" style="min-height: 512.391px;">
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>