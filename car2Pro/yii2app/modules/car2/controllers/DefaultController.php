<?php

namespace app\modules\car2\controllers;
use Yii;
use yii\web\Controller;
use app\modules\car2\models\Cars;
use app\modules\car2\models\CarsSearch;

/**
 * Default controller for the `car2` module
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionError()
    {
        $this->layout = 'login';
        return $this->render('error');
    }
}