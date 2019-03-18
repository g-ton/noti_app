<?php

namespace app\controllers;

use Yii;
use app\models\SuscriptorHorario;
use app\models\SuscriptorHorarioSearch;
use yii\web\Response;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;

/**
 * SuscriptorHorarioController implements the CRUD actions for SuscriptorHorario model.
 */
class SuscriptorHorarioController extends Controller
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
     * Lists all SuscriptorHorario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuscriptorHorarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuscriptorHorario model.
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

    public function actionValidate()
    {
        $model = new SuscriptorHorario();
        #Validación para editar
        /*if(isset($_GET['editar']) && isset($_GET['id'])){
            $model = Cuenta::find()->where(['id'=> $_GET['id']])->one();
        }*/

        $request = \Yii::$app->getRequest();
        if ($request->isPost && $model->load($request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    /**
     * Creates a new SuscriptorHorario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuscriptorHorario();

        if ($model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'resultado'=> 1,
                'des_lun_t_a'=> $model->des_lun_t_a,
                'has_lun_t_a'=> $model->has_lun_t_a,
                'des_mar_t_a'=> $model->des_mar_t_a,
                'has_mar_t_a'=> $model->has_mar_t_a,
                'des_mie_t_a'=> $model->des_mie_t_a,
                'has_mie_t_a'=> $model->has_mie_t_a,
                'des_jue_t_a'=> $model->des_jue_t_a,
                'has_jue_t_a'=> $model->has_jue_t_a,
                'des_vie_t_a'=> $model->des_vie_t_a,
                'has_vie_t_a'=> $model->has_vie_t_a,
                'des_sab_t_a'=> $model->des_sab_t_a,
                'has_sab_t_a'=> $model->has_sab_t_a,
                'des_dom_t_a'=> $model->des_dom_t_a,
                'has_dom_t_a'=> $model->has_dom_t_a,
                'labora_festivo'=> $model->labora_festivo
            ];
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SuscriptorHorario model.
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
     * Deletes an existing SuscriptorHorario model.
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
     * Finds the SuscriptorHorario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuscriptorHorario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuscriptorHorario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
