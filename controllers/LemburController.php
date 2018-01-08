<?php

namespace app\controllers;

use Yii;
use mPDF;
use app\models\Lembur;
use app\models\LemburSearch;
use app\models\LemburPendingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use kartik\mpdf\Pdf;


/**
 * LemburController implements the CRUD actions for Lembur model.
 */
class LemburController extends Controller
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

    public function actionCetaklembur($id) 
    {
        $model = $this->findModel($id);
        $mpdf = new mPDF('utf-8', 'A5-L', 0, '', 10, 10, 5, 1, 1, 1, '');
        $mpdf->WriteHTML($this->render('cetaklembur', ['model' => $model]));
        $mpdf->Output();
    }

    /**
     * Lists all Lembur models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity->id === 1) {
            $searchModel = new LemburSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            $searchModel = new LemburPendingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Lists all Lembur models.
     * @return mixed
     */
    public function actionSearch()
    {
        if(Yii::$app->user->identity->id === 1) {
            $searchModel = new LemburSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('search', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            $searchModel = new LemburPendingSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('search', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Lembur model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lembur model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lembur();
        $model->nik = Yii::$app->user->identity->nik;
        $model->upah_lembur = 2;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_lembur]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionApprove($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->identity->jabatan === 'Kepala Divisi' OR Yii::$app->user->identity->jabatan === 'Direktur') {
            $model->user1 = Yii::$app->user->identity->id;
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->redirect(['site/index']);
        } elseif(Yii::$app->user->identity->jabatan === 'Kepala Seksi' OR Yii::$app->user->identity->jabatan === 'Kepala Departemen') {
            $model->user2 = Yii::$app->user->identity->id;
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->redirect(['site/index']);
        } elseif(Yii::$app->user->identity->jabatan === 'HNN' OR Yii::$app->user->identity->jabatan === 'ANI') {
            $model->user3 = Yii::$app->user->identity->id;
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->redirect(['site/index']);
        } else {
            $model->user4 = Yii::$app->user->identity->id;
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->redirect(['site/index']);
        }
    }

    /**
     * Updates an existing Lembur model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_lembur]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lembur model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lembur model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Lembur the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lembur::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
