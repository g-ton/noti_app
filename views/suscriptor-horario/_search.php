<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuscriptorHorarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suscriptor-horario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_suscriptor') ?>

    <?= $form->field($model, 'lunes') ?>

    <?= $form->field($model, 'martes') ?>

    <?= $form->field($model, 'miercoles') ?>

    <?php // echo $form->field($model, 'jueves') ?>

    <?php // echo $form->field($model, 'viernes') ?>

    <?php // echo $form->field($model, 'sabado') ?>

    <?php // echo $form->field($model, 'domingo') ?>

    <?php // echo $form->field($model, 'labora_festivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
