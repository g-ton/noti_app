<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$session = Yii::$app->session;
?>

<!-- Se pinta Alert Message si el Suscriptor es guardado correctamente -->
<?php if (Yii::$app->session->hasFlash('mensaje_registro_suscriptor') && isset($_GET['resultado']) && $_GET['resultado']): ?>
    <div class="alert alert-success alert-dismissible">
        <?= $session->getFlash('mensaje_registro_suscriptor') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('mensaje_registro_suscriptor') && isset($_GET['resultado']) && !$_GET['resultado']): ?>
    <div class="alert alert-warning alert-dismissible">
        <?= $session->getFlash('mensaje_registro_suscriptor') ?>
    </div>
<?php endif; ?>

<div class="background error-page-wrapper">
  <center>
    <div class="content-container shadow">
        <h1 align="center"><img src="img/notiapp_logo_mini.png" class="img-responsive" title="NotiApp le permite, estar cada vez más cerca de sus clientes, notificándolos en tiempo real de sucesos importantes, agenda de citas, historial crediticio y de consumo, así como también la gestión del perfil de empresa, gestión de productos y servicios, y mucho más!"></h1>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}<div class=\"col-sm-9\">{input}{error}</div>",
                'labelOptions' => ['class' => 'control-label col-sm-3'],
            ],
        ]); ?>

            <?= $form->field($model, 'correo')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'username')->textInput() ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button', 'title'=> '¿Suscriptor de NotiApp?, Iniciar sesión']) ?>
                <?= Html::a('Registrarse', Url::to(['suscriptor/create']), ['class'=> 'btn btn-success', 'title'=> '¿Sin cuenta aún?, El registro es fácil y rápido!']) ?>
            </div>
        <?php ActiveForm::end(); ?>
        <div class="hr"></div>
    </div>
  </center>
</div>

<?php
$ruta_fondo= Yii::$app->HomeUrl.'img/fondo_error.jpg';
$this->registerJs('$(".wrap").css("background-image", "url('.$ruta_fondo.')");');