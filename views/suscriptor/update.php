<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\suscriptor */

$this->title = 'Update suscriptor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Suscriptores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="suscriptor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
