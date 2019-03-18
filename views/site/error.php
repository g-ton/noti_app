<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<div class="background error-page-wrapper">
  <center>
    <div class="content-container shadow">
        <div class="head-line secondary-text-color"><?= $exception->statusCode ?></div>
        <div class="subheader primary-text-color">
            <?= Html::encode($message) ?>
        </div>
        <div class="hr"></div>
        <p>Por favor contáctenos si piensa que es un error interno de la aplicación. Gracias.</p><br>
        <?= Html::a('Ir a Inicio', Url::to(['site/index']), ['class'=> 'btn btn-lg btn-success']) ?>
    </div>
  </center>
</div>

<?php
$ruta_fondo= Yii::$app->HomeUrl.'img/fondo_error.jpg';
$this->registerJs('$(".wrap").css("background-image", "url('.$ruta_fondo.')");');

