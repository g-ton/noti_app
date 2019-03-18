<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuscriptorHorario */

$this->title = 'Create Suscriptor Horario';
$this->params['breadcrumbs'][] = ['label' => 'Suscriptor Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suscriptor-horario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
