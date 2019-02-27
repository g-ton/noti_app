<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\suscriptor */

$this->title = 'Create Suscriptor';
?>
<div class="suscriptor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'giros' => $giros, 'estados' => $estados
    ]) ?>

</div>
