<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SuscriptorHorario */

$this->title = 'Update Suscriptor Horario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Suscriptor Horarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suscriptor-horario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
