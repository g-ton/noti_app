<?php

namespace app\controllers;

use Yii;
use app\models\SuscriptorUsuario;
use app\models\Suscriptor;
use app\models\SuscriptorHorario;
use app\models\SuscriptorUsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\AuthAssignment;
use app\utilidades\Utilidades;
use app\utilidades\UtilidadesExpReg;
use yii\web\Response;
use yii\filters\AccessControl;

/**
 * SuscriptorUsuarioController implements the CRUD actions for SuscriptorUsuario model.
 */
class SuscriptorUsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'ajax' => [
                'class' => 'yii\filters\AjaxFilter',
                'only' => ['desencriptar-clave']
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ]
        ];
    }

    /**
     * Lists all SuscriptorUsuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $searchModel = new SuscriptorUsuarioSearch();
        $params = Yii::$app->request->queryParams;
        $params['SuscriptorUsuarioSearch']['id_suscriptor'] = $session['id_suscriptor'];
        $params['SuscriptorUsuarioSearch']['estatus'] = 1;
        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuscriptorUsuario model.
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
     * Crea a un nuevo Usuario.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = Yii::$app->session;

        if (isset($session['id_suscriptor'])){
            $model = new SuscriptorUsuario();
            $model->scenario= 'create';
            $model->id_suscriptor= $session['id_suscriptor'];

            if( ($model->load(Yii::$app->request->post()) && $model->validate()) ){
                $registro_sus_usuario= Utilidades::registroSuscriptorUsuario(1, $model, $model->password, $model->rol);
                if($registro_sus_usuario){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            $roles= Utilidades::getRoles();

            return $this->render('create', [
                'model' => $model, 'roles'=> $roles
            ]);
        }
    }

    /**
     * Actualiza a un  Usuario existente.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model                  = $this->findModel($id);
        $model->scenario        = 'update';
        $password               = $model->password;
        $password_show          = $model->password_show;
        $model->password        = '';
        $model->password_repeat = '';
        $modelo_valido          = true;
        $roles                  = Utilidades::getRoles();
        
        $model_asignar_rol = new AuthAssignment();
        $model_asignar_rol = $model_asignar_rol->find()->where([ 'user_id' => $id ])->one();

        if(isset($_POST['SuscriptorUsuario'])){            
            #Si la contraseña ha sido cambiada se encripta en sha1, sino permanece igual
            if($_POST['SuscriptorUsuario']['password']!= ''){
                $clave_valida= preg_match(UtilidadesExpReg::CLAVE, $_POST['SuscriptorUsuario']['password']);

                #Valida contraseña
                if(($clave_valida=== 0) ){
                    $modelo_valido= false;
                    $model->addError('password','El campo debe contar con un mínimo de 8 caracteres, al menos una letra Minúscula, una letra Mayúscula, un Número y un Caracter especial.');
                } else{
                    #Valida que la contraseña repetida sea igual a la original
                    if($_POST['SuscriptorUsuario']['password']!= $_POST['SuscriptorUsuario']['password_repeat']){
                        $modelo_valido= false;
                        $model->addError('password_repeat','Las contraseñas no coinciden, favor de verificar.');
                    }
                    $password= sha1($_POST['SuscriptorUsuario']['password']);
                    #Password encriptado con AES
                    $password_show= \Yii::$app->encrypter->encrypt($_POST['SuscriptorUsuario']['password']);
                }
            }
            
            #Si el modelo actualizado no es válido se manda mensaje de error al formulario
            if(!$modelo_valido){
                return $this->render('update', [
                    'model' => $model, 'roles'=> $roles, 'rol'=> $model_asignar_rol->item_name
                ]);
                exit; 
            }

            $model->password        = $password;
            $model->password_repeat = $password;
            $model->password_show   = $password_show;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                #Se guarda modelo Asignación de Rol
                $model_asignar_rol->item_name   = $_POST['SuscriptorUsuario']['rol'];
                $model_asignar_rol->save(false);
                Yii::$app->cache->flush();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model, 'roles'=> $roles, 'rol'=> $model_asignar_rol->item_name
        ]);
    }

    /**
     * A partir de la clave encriptada con el algoritmo AES, retorna la cadena desencriptada (Ajax action)
     */
    public function actionDesencriptarClave(){
        Yii::$app->response->format = Response::FORMAT_JSON;

        if(Utilidades::verificarSesionAjax()!== true){
            return Utilidades::verificarSesionAjax();
        }

        if(isset($_POST['clave_encriptada'])){
            return array('clave_desencriptada'=> \Yii::$app->encrypter->decrypt($_POST['clave_encriptada']));
        }
    }

    /**
     * Deletes an existing SuscriptorUsuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
        $model->estatus= 0;
        $model->save(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the SuscriptorUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuscriptorUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuscriptorUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
