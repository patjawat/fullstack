<?php

namespace app\modules\car2\controllers;

class AdminController extends \yii\web\Controller
{
    public function init()
    {
        parent::init();
        $this->layout = 'admin';
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}