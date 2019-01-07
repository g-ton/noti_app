<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatGiroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-giro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_clasificacion_giro') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'estatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
