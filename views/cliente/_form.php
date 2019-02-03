<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->HomeUrl.'js/cliente/cliente.js', ['depends' => [yii\web\JqueryAsset::className()]]);

?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_giro')->dropDownList($giros, ['options'=> isset($model->id_giro) ? [$model->id_giro=> ['Selected'=>true]] : [],  'prompt' => 'Seleccionar']) ?> 

    <?= $form->field($model, 'id_pais')->dropDownList(['1'=> 'México']) ?>

    <?= $form->field($model, 'id_estado')->dropDownList($estados, ['options'=> isset($model->id_estado) ? [$model->id_estado=> ['Selected'=>true]] : [],  'prompt' => 'Seleccionar', 'id'=> 'id_estado']) ?>  

    <?= $form->field($model, 'id_municipio')->dropDownList([], ['id'=> 'id_municipio', 'prompt' => 'Seleccionar']) ?>

    <?= $form->field($model, 'calle_colonia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_postal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_profesional')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
