<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\Categoriya;
use backend\models\ProductSearch;
use backend\models\Rasmlar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */

/*DB da rasmlar jadvali bor. Bunda 4 ta usutun id, product_id, rasm, sana bor. Sana TIMESTAMP, CURRENT_TIMESTAMP qilingan. use backend\models\Rasmlar; use yii\web\UploadedFile; use yii\helpers\Url;*/

    public function actionMultiple()
    {
        $upload = new Rasmlar();
       
        if($upload->load(Yii::$app->request->post()))
        {
            $upload->rasm = UploadedFile::getInstances($upload, 'rasm');
            if($upload->rasm && $upload->validate())
            {
                if(!file_exists(Url::to('../../rasmlar/mahsulotlar/')))
                {
                    mkdir(Url::to('../../rasmlar/mahsulotlar/'),0777,true);
                }
                $path = Url::to('../../rasmlar/mahsulotlar/');
                foreach ($upload->rasm as $rasm) {
                    $model = new Rasmlar();

                    $model->product_id = $upload->product_id;
                    $model->rasm = time().rand(100,999).'.'.$rasm->extension;
                    if($model->save(false))
                    {
                        $rasm->saveAs($path.$model->rasm);
                    }
                }
                return $this->redirect(['index']);
            }
        }
        return $this->render('multiple', ['upload' => $upload]);
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $model->reyting = '0';
            $model->sana = date("Y-m-d H:i:s");
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
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
     * Deletes an existing Product model.
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

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
