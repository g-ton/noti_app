<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatGiro */

$this->title = 'Giros';
$this->params['breadcrumbs'][] = ['label' => 'Cat Giros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-giro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'cla_giros'=> $cla_giros
    ]) ?>

</div>
