<?php

namespace backend\controllers;

use Yii;
use backend\models\PropertyImage;
use backend\models\PropertyImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PropertyImageController implements the CRUD actions for PropertyImage model.
 */
class PropertyImageController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all PropertyImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropertyImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PropertyImage model.
     * @param integer $id_property
     * @param string $image
     * @return mixed
     */
    public function actionView($id_property, $image)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_property, $image),
        ]);
    }

    /**
     * Creates a new PropertyImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PropertyImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_property' => $model->id_property, 'image' => $model->image]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PropertyImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_property
     * @param string $image
     * @return mixed
     */
    public function actionUpdate($id_property, $image)
    {
        $model = $this->findModel($id_property, $image);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_property' => $model->id_property, 'image' => $model->image]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PropertyImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_property
     * @param string $image
     * @return mixed
     */
    public function actionDelete($id_property, $image)
    {
        $this->findModel($id_property, $image)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PropertyImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_property
     * @param string $image
     * @return PropertyImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_property, $image)
    {
        if (($model = PropertyImage::findOne(['id_property' => $id_property, 'image' => $image])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
