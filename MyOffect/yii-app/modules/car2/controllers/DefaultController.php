<?php

namespace app\modules\car2\controllers;

use yii\web\Controller;

/**
 * Default controller for the `car2` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionError()
    {
        $this->layout = 'login';
        return $this->render('error');
    }
}