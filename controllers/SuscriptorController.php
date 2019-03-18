<?php

namespace app\controllers;

use Yii;
use app\models\Suscriptor;
use app\models\SuscriptorSearch;
use app\models\CatEstados;
use app\models\SuscriptorUsuario;
use app\models\AuthAssignment;
use app\models\SuscriptorImagen;
use app\utilidades\Utilidades;
use yii\web\Controller;
use yii\web\Response;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SuscriptorController implements the CRUD actions for Suscriptor model.
 */
class SuscriptorController extends Controller
{
    public function behaviors()
    {
        return [
         'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['view', 'update'],
                        'allow' => true,
                        'roles' => ['superadmin','admin'],
                    ],
                    [
                        'actions' => ['delete', 'index'],
                        'allow' => true,
                        'roles' => ['superadmin'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['superadmin', '?'],
                    ]
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Suscriptor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuscriptorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Suscriptor model.
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
     * Creates a new Suscriptor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Suscriptor();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model_suscriptor_usuario= new SuscriptorUsuario();
            $model_suscriptor_usuario->username= 'admin';
            $model_suscriptor_usuario->id_suscriptor= $model->id;
            $clave_auto= Utilidades::generarClave();
            $model_suscriptor_usuario->password= $clave_auto;
            $model_suscriptor_usuario->password_repeat= $model_suscriptor_usuario->password;
            if($model_suscriptor_usuario->validate()){
                $registro_sus_usuario= Utilidades::registroSuscriptorUsuario(1, $model_suscriptor_usuario, $clave_auto, 'admin');
                if($registro_sus_usuario){
                    $mensaje= 'El Suscriptor ha sido registrado con éxito!, favor de verificar su bandeja de correo electrónico para obtener sus credenciales de acceso al sistema.';
                    $resultado= true;
                    #Registro de imágenes - start
                    if(!Utilidades::registrarImagen($model, 'imagenes')){
                        $mensaje= 'El Suscriptor ha sido registrado con éxito, sin embargo una o más de las imágenes no pudo ser guardada, favor de verificar.';
                        $resultado= false;
                    }
                    #Registro de imágenes - end
                    
                    #Registro de horarios - start
                    if(isset($_POST['labora_festivo'])){
                        Utilidades::registrarHorario(null, $_POST, $model->id);
                    }
                    #Registro de horarios - end
                    
                    if(!Utilidades::envioEmailNuevoSuscriptor($model->correo, $clave_auto, $model->razon_social)){
                        $mensaje= 'El correo de activacion de Suscriptor no pudo ser enviado, favor de verificar y/o contactarnos para atenderle al respecto!.';
                        $resultado= false;
                    }

                    Yii::$app->session->setFlash('mensaje_registro_suscriptor', $mensaje);
                    return $this->redirect(['/login', 'resultado'=> $resultado]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model, 'giros' => Utilidades::getGiros(), 'estados' => Utilidades::getEstados()
        ]);
    }

    /**
     * Updates an existing Suscriptor model.
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
            'model' => $model, 'giros' => Utilidades::getGiros(), 'estados' => Utilidades::getEstados()
        ]);
    }

    /**
     * Deletes an existing Suscriptor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $model->estatus= 0;
        $model->save();

        return $this->redirect(['index']);
    }

    public function actionObtenerMunicipios()
    {        
        return Utilidades::getMunicipios($_POST['id_estado']);
    }

    /**
     * Finds the Suscriptor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Suscriptor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Suscriptor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
