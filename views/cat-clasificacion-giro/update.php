<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatClasificacionGiro */

$this->title = 'Update Cat Clasificacion Giro: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Clasificacion Giros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-clasificacion-giro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
