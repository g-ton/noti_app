<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuscriptorHorario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="suscriptor-horario-form">

    <?php $form = ActiveForm::begin([
    'id' => 'form_suscriptor_horario',
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'validationUrl' => Url::to(['validate']),
    ]); ?>

    <?= $form->field($model, 'des_lun_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_lun_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_mar_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_mar_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_mie_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_mie_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_jue_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_jue_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_vie_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_vie_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_sab_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_sab_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des_dom_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_dom_t_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'labora_festivo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    

    <?php ActiveForm::end(); ?>

</div>
