<?php

namespace backend\controllers;

use Yii;
use backend\models\PropertyCondition;
use backend\models\PropertyConditionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PropertyConditionController implements the CRUD actions for PropertyCondition model.
 */
class PropertyConditionController extends Controller
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
     * Lists all PropertyCondition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropertyConditionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PropertyCondition model.
     * @param integer $id_property
     * @param integer $id_condition
     * @return mixed
     */
    public function actionView($id_property, $id_condition)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_property, $id_condition),
        ]);
    }

    /**
     * Creates a new PropertyCondition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PropertyCondition();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_property' => $model->id_property, 'id_condition' => $model->id_condition]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PropertyCondition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_property
     * @param integer $id_condition
     * @return mixed
     */
    public function actionUpdate($id_property, $id_condition)
    {
        $model = $this->findModel($id_property, $id_condition);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_property' => $model->id_property, 'id_condition' => $model->id_condition]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PropertyCondition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_property
     * @param integer $id_condition
     * @return mixed
     */
    public function actionDelete($id_property, $id_condition)
    {
        $this->findModel($id_property, $id_condition)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PropertyCondition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_property
     * @param integer $id_condition
     * @return PropertyCondition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_property, $id_condition)
    {
        if (($model = PropertyCondition::findOne(['id_property' => $id_property, 'id_condition' => $id_condition])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
