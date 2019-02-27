<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
?>
<div class="site-login">
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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'correo')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::a('Regístrate', Url::to(['suscriptor/create']), ['class'=> 'btn btn-success', 'title'=> '¿Aún no tienes cuenta?, regístrate de forma fácil y rápida aquí']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>
