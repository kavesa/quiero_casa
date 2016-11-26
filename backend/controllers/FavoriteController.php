<?php

namespace backend\controllers;

use Yii;
use backend\models\Favorite;
use backend\models\FavoriteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FavoriteController implements the CRUD actions for Favorite model.
 */
class FavoriteController extends Controller
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
     * Lists all Favorite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FavoriteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Favorite model.
     * @param integer $id_user
     * @param integer $id_property
     * @return mixed
     */
    public function actionView($id_user, $id_property)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user, $id_property),
        ]);
    }

    /**
     * Creates a new Favorite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Favorite();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_property' => $model->id_property]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Favorite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_user
     * @param integer $id_property
     * @return mixed
     */
    public function actionUpdate($id_user, $id_property)
    {
        $model = $this->findModel($id_user, $id_property);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_user' => $model->id_user, 'id_property' => $model->id_property]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Favorite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_user
     * @param integer $id_property
     * @return mixed
     */
    public function actionDelete($id_user, $id_property)
    {
        $this->findModel($id_user, $id_property)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Favorite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_user
     * @param integer $id_property
     * @return Favorite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user, $id_property)
    {
        if (($model = Favorite::findOne(['id_user' => $id_user, 'id_property' => $id_property])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
