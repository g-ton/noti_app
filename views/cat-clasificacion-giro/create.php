<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatClasificacionGiro */

$this->title = 'Create Cat Clasificacion Giro';
$this->params['breadcrumbs'][] = ['label' => 'Cat Clasificacion Giros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-clasificacion-giro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
