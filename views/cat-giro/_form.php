<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatGiro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-giro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_clasificacion_giro')->dropDownList($cla_giros, ['options'=> isset($model->id_clasificacion_giro) ? [$model->id_clasificacion_giro=> ['Selected'=>true]] : [],  'prompt' => 'Seleccionar']) ?> 

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
