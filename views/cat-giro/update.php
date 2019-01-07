<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatGiro */

$this->title = 'Update Cat Giro: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Giros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-giro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'cla_giros'=> $cla_giros
    ]) ?>

</div>
