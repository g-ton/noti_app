<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SuscriptorUsuarioLogin;
use app\utilidades\Utilidades;

class LoginController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
           
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
            #Asignar variables de sesión - start
            $session = Yii::$app->session;
            if (!$session->isActive){
                $session->open();
            }

            #Obtener rol de usuario
            $rol_usuario= '';
            $user_assigned= Yii::$app->authManager->getAssignments(Yii::$app->user->getId());
            foreach($user_assigned as $user_assign){
              $rol_usuario = $user_assign->roleName;
              break;
            }

            #Variables de sesión de utilidad a lo largo del sitio - start
            $session->set('id_suscriptor', $model->getUser()->suscriptor->id); 
            $session->set('rol_usuario', $rol_usuario); 
            #Variables de sesión de utilidad a lo largo del sitio - end

            $usuario = SuscriptorUsuarioLogin::findOne(Yii::$app->user->getId());
            $usuario->ultimo_acceso= Date('Y-m-d h:i:s');
            $usuario->save();

            return $this->redirect(['/site/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        #El siguiente método realiza la destrucción de la sesión, no hay necesidad de anotar los métodos de eliminación de sesión
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
