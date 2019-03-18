<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\suscriptor */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->HomeUrl.'js/suscriptor/suscriptor.js', ['depends' => [yii\web\JqueryAsset::className()]]);

?>

<div class="suscriptor-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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

    <?php
        echo FileInput::widget([
            'model' => $model,
            'attribute' => 'imagenes[]',
            'options' => ['multiple' => true],
            'pluginOptions' => ['previewFileType' => 'image', 'maxFileCount' => 10]
        ]);
    ?>
    <!-- Validar que cuando sea edición el url::to cambiarlo por la url de update con su parámetro respectivo -->
    <?= Html::button('Agregar Horarios', ['value'=> Url::to(['suscriptor-horario/create']), 'class' => 'btn btn-scs', 'id'=> 'modal_btn', 'title'=>'Capturar los horarios de atención', 'data-toggle'=>'tooltip']); ?>

    <?= Html::hiddenInput('des_lun_t_a', $des_lun_t_a, ['id'=> 'des_lun_t_a']); ?>
    <?= Html::hiddenInput('has_lun_t_a', $has_lun_t_a, ['id'=> 'has_lun_t_a']); ?>
    <?= Html::hiddenInput('des_mar_t_a', $des_mar_t_a, ['id'=> 'des_mar_t_a']); ?>
    <?= Html::hiddenInput('has_mar_t_a', $has_mar_t_a, ['id'=> 'has_mar_t_a']); ?>
    <?= Html::hiddenInput('des_mie_t_a', $des_mie_t_a, ['id'=> 'des_mie_t_a']); ?>
    <?= Html::hiddenInput('has_mie_t_a', $has_mie_t_a, ['id'=> 'has_mie_t_a']); ?>
    <?= Html::hiddenInput('des_jue_t_a', $des_jue_t_a, ['id'=> 'des_jue_t_a']); ?>
    <?= Html::hiddenInput('has_jue_t_a', $has_jue_t_a, ['id'=> 'has_jue_t_a']); ?>
    <?= Html::hiddenInput('des_vie_t_a', $des_vie_t_a, ['id'=> 'des_vie_t_a']); ?>
    <?= Html::hiddenInput('has_vie_t_a', $has_vie_t_a, ['id'=> 'has_vie_t_a']); ?>
    <?= Html::hiddenInput('des_sab_t_a', $des_sab_t_a, ['id'=> 'des_sab_t_a']); ?>
    <?= Html::hiddenInput('has_sab_t_a', $has_sab_t_a, ['id'=> 'has_sab_t_a']); ?>
    <?= Html::hiddenInput('des_dom_t_a', $des_dom_t_a, ['id'=> 'des_dom_t_a']); ?>
    <?= Html::hiddenInput('has_dom_t_a', $has_dom_t_a, ['id'=> 'has_dom_t_a']); ?>
    <?= Html::hiddenInput('labora_festivo', $labora_festivo, ['id'=> 'labora_festivo']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
    Modal::begin([
        'header' => '<h5></h5>',
        'id' => 'modal',
    ]);
    echo "<div id='modal_content'></div>";
    Modal::end(); 
?>
