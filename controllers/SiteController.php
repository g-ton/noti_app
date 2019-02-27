<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\utilidades\Utilidades;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'about'],
                'rules' => [
                    [
                        'actions' => ['index', 'about'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actions()
    {
        return [
            #Aquí se gestiona el pintado de los errores que pueden aparecer en la aplicación (Páginas no encontradas, Falta de permiso, etc...)
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        Yii::$app->cache->flush();
        #Utilidades::envioEmailNuevoContribuyente('bionik_gotik@hotmail.com', 'clave_yeah', 'Teta Comercial');
        return $this->render('about');
    }
}
