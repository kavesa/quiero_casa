<?php

namespace backend\controllers;

use Yii;
use backend\models\Property;
use backend\models\PropertySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use kartik\file\FileInput;
use Aws\S3\S3Client;

use Aws\S3\S3Exception;


require '../../vendor/autoload.php';



/**
 * PropertyController implements the CRUD actions for Property model.
 */
class PropertyController extends Controller
{

    public $modelId;

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
     * Lists all Property models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PropertySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Property model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Property model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Property();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $this->modelId = $model->id_property;
            }
            return $this->redirect(['view', 'id' => $model->id_property]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function afterAction($action, $result) {
        $result = parent::afterAction($action, $result);
        // your custom code here
        $model = new Property();


        if ($model->load(Yii::$app->request->post())) {
            
            $images = UploadedFile::getInstances($model, 'image');
            $fileCount = count($images);
            try {
                $config = require('../app/config.php');

                $s3 = S3Client::factory([
                    'credentials' => [
                        'key' => $config['s3']['key'],
                        'secret' => $config['s3']['secret'],
                    ],
                    'region' => 'us-west-2',
                    'version' => 'latest',
                    
                ]);

                for ($i = 0; $i < $fileCount; $i++) {
                    $model->filename = $images[$i];
                    $ext = end(explode(".", $model->filename));
                    $model->avatar = Yii::$app->security->generateRandomString().".{$ext}";

                    $path = '../files/'. $model->avatar;

                    $images[$i]->saveAs($path);
                    $s3 -> putObject([
                        'Bucket' => $config['s3']['bucket'],
                        'Key' => "uploads/{$this->modelId}/{$model->filename}",
                        'Body' => fopen($path, 'rb'),
                        'ACL' => 'public-read'
                    ]);
                    

                }
            }
            catch (S3Exception $e) {
                die("Error");
            }
        }

        return $result;
    }

    /**
     * Updates an existing Property model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            return $this->redirect(['view', 'id' => $model->id_property]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Property model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the Property model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Property the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Property::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
