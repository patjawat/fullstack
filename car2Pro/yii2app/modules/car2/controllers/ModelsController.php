<?php

namespace app\modules\car2\controllers;

use app\modules\car2\models\Models;
use app\modules\car2\models\ModelsSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ModelsController extends Controller
{

    public function init()
    {
        parent::init();
        $this->layout = 'admin';
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ModelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $band_id = Yii::$app->request->get('band_id');
        $request = Yii::$app->request;
        $model = new Models();
        $model->band_id = $band_id;

        if ($model->load(Yii::$app->request->post())) {
            return $model->save();
        }
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "เพิ่มใหม่",
                'content' => $this->renderAjax('create', [
                    'model' => $model,
                ]),
                'footer' => Html::button('<i class="fas fa-power-off"></i> ปิด', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => 'btn btn-success', 'onclick' => 'return saveModels()']),

            ];
        } else {

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            return $model->save();
        }
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "แก้ไข",
                'content' => $this->renderAjax('update', [
                    'model' => $model,
                ]),
                'footer' => Html::button('<i class="fas fa-power-off"></i> ปิด', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                Html::submitButton('<i class="fas fa-edit"></i> บันทึก', ['class' => 'btn btn-warning', 'onclick' => 'return saveModels()']),

            ];
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->findModel($id)->delete();
    }

    protected function findModel($id)
    {
        if (($model = Models::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}