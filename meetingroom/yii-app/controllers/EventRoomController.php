<?php

namespace app\controllers;

use app\models\EventRoom;
use app\models\EventRoomSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * EventRoomController implements the CRUD actions for EventRoom model.
 */
class EventRoomController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all EventRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventRoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EventRoom model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EventRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EventRoom();
        $start = Yii::$app->request->get('start');
        $end = Yii::$app->request->get('end');
        $thStart = Yii::$app->thaiFormatter->asDate($start, 'php:d/m/Y H:i:s');
        $thEnd = Yii::$app->thaiFormatter->asDate($end, 'php:d/m/Y H:i:s');

        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->date_start = $start;
            $model->date_end = $end;
            $model->save(false);
            return $this->redirect(['index']);

        }

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['title' => 'จองห้องประชุม วันที่ : ' . $thStart,
                'content' => $this->renderAjax('create', [
                    'model' => $model,
                ]),
                'footer' => 'footer',
            ];
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing EventRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EventRoom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = EventRoom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionJsoncalendar($start = null, $end = null, $_ = null)
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $models = EventRoom::find()->all();
        $events = [];
        foreach ($models as $model) {
            $events[] = [
                'id' => $model->id,
                'title' => $model->title,
                'start' => date('Y-m-d\TH:i:s\Z', strtotime($model->date_start)),
                'end' => date('Y-m-d\TH:i:s\Z', strtotime($model->date_end)),
                'backgroundColor' => '#f56954', //red
                'borderColor' => '#f56954', //red
                'textColor' => '#fff', //red
                'editable' => true,
                'droppable' => true,
                'startEditable' => true, // ใช้เม้าเลื่อไปวันอื่นได้
                'durationEditable' => true,
            ];
        }
        return $events;
    }

}