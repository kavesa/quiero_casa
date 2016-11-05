<?php

namespace backend\controllers;

use Yii;
use backend\models\PropertyPrice;
use backend\models\PropertyPriceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PropertyPriceController implements the CRUD actions for PropertyPrice model.
 */
class PropertyPriceController extends Controller
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
     * Lists all PropertyPrice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropertyPriceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PropertyPrice model.
     * @param integer $id_property
     * @param integer $id_operation
     * @param integer $id_currency
     * @return mixed
     */
    public function actionView($id_property, $id_operation, $id_currency)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_property, $id_operation, $id_currency),
        ]);
    }

    /**
     * Creates a new PropertyPrice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PropertyPrice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_property' => $model->id_property, 'id_operation' => $model->id_operation, 'id_currency' => $model->id_currency]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PropertyPrice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_property
     * @param integer $id_operation
     * @param integer $id_currency
     * @return mixed
     */
    public function actionUpdate($id_property, $id_operation, $id_currency)
    {
        $model = $this->findModel($id_property, $id_operation, $id_currency);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_property' => $model->id_property, 'id_operation' => $model->id_operation, 'id_currency' => $model->id_currency]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PropertyPrice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_property
     * @param integer $id_operation
     * @param integer $id_currency
     * @return mixed
     */
    public function actionDelete($id_property, $id_operation, $id_currency)
    {
        $this->findModel($id_property, $id_operation, $id_currency)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PropertyPrice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_property
     * @param integer $id_operation
     * @param integer $id_currency
     * @return PropertyPrice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_property, $id_operation, $id_currency)
    {
        if (($model = PropertyPrice::findOne(['id_property' => $id_property, 'id_operation' => $id_operation, 'id_currency' => $id_currency])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
