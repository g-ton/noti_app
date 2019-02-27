<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuscriptorUsuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suscriptor-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rol')->dropDownList($roles, ['options'=> isset($rol) ? [$rol=> ['Selected'=>true]] : [],  'prompt' => 'Seleccionar']) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
