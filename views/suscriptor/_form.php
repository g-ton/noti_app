<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\widgets\MaskedInput;

$this->registerJsFile(Yii::$app->HomeUrl.'js/suscriptor/suscriptor.js', ['depends' => [yii\web\JqueryAsset::className()]]);

?>

<div class="suscriptor-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'id' => 'form_suscriptor',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'validationUrl' => Url::to(['validate']),
    ]); ?>
    <div class="row"><!-- A dos columnas bootstrap -->      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?= $form->field($model, 'razon_social')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_pais')->dropDownList(['1'=> 'México']) ?>

            <?= $form->field($model, 'id_municipio')->dropDownList([], ['id'=> 'id_municipio', 'prompt' => 'Seleccionar']) ?>

            <?=
                $form->field($model, 'celular',[])->widget(\yii\widgets\MaskedInput::className(), [
                    'name' => 'celular_mask',
                    'mask' => '99-99-99-99-99',
                    'options' => ['required'=>true, 'id'=>'celular_mask', 'class' => 'form-control',  'placeholder'=>'Número celular', 'data-toggle'=>'tooltip', 'title'=>'Número celular a 10 dígitos']
                ])
            ?>

            <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>
        </div>        

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?= $form->field($model, 'id_giro')->dropDownList($giros, ['options'=> isset($model->id_giro) ? [$model->id_giro=> ['Selected'=>true]] : [],  'prompt' => 'Seleccionar']) ?> 

            <?= $form->field($model, 'codigo_postal')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_estado')->dropDownList($estados, ['options'=> isset($model->id_estado) ? [$model->id_estado=> ['Selected'=>true]] : [],  'prompt' => 'Seleccionar', 'id'=> 'id_estado']) ?>  

            <?= $form->field($model, 'calle_colonia')->textInput(['maxlength' => true]) ?>
            
            <?=
                $form->field($model, 'telefono',[])->widget(\yii\widgets\MaskedInput::className(), [
                    'name' => 'telefono_mask',
                    'mask' => '999-9-99-99-99',
                    'options' => ['required'=>true, 'id'=>'telefono_mask', 'class' => 'form-control',  'placeholder'=>'Número fijo con clave lada', 'data-toggle'=>'tooltip', 'title'=>'Número fijo iniciando con clave lada']
                ])
            ?>

            <?= $form->field($model, 'cedula_profesional')->textInput(['maxlength' => true]) ?>
        </div>        
    </div>
    <?php
        echo '<label class="control-label">Imágenes (De las instalaciones, productos, etc.)</label>';
        echo FileInput::widget([
            'model' => $model,
            'attribute' => 'imagenes[]',
            'options' => ['multiple' => true, 'accept' => 'image/*', 'id'=> 'img_input'],
            'pluginOptions' => ['uploadUrl' => Url::to(['/site/file-upload']),'previewFileType' => 'image', 'maxFileCount' => 10, 'maxFileSize'=>1024]
        ]);
    ?>
    <br>
    <!-- Turno 1 -->
    <?= Html::hiddenInput('des_lun_t_a', '', ['id'=> 'des_lun_t_a']); ?>
    <?= Html::hiddenInput('has_lun_t_a', '', ['id'=> 'has_lun_t_a']); ?>
    <?= Html::hiddenInput('des_mar_t_a', '', ['id'=> 'des_mar_t_a']); ?>
    <?= Html::hiddenInput('has_mar_t_a', '', ['id'=> 'has_mar_t_a']); ?>
    <?= Html::hiddenInput('des_mie_t_a', '', ['id'=> 'des_mie_t_a']); ?>
    <?= Html::hiddenInput('has_mie_t_a', '', ['id'=> 'has_mie_t_a']); ?>
    <?= Html::hiddenInput('des_jue_t_a', '', ['id'=> 'des_jue_t_a']); ?>
    <?= Html::hiddenInput('has_jue_t_a', '', ['id'=> 'has_jue_t_a']); ?>
    <?= Html::hiddenInput('des_vie_t_a', '', ['id'=> 'des_vie_t_a']); ?>
    <?= Html::hiddenInput('has_vie_t_a', '', ['id'=> 'has_vie_t_a']); ?>
    <?= Html::hiddenInput('des_sab_t_a', '', ['id'=> 'des_sab_t_a']); ?>
    <?= Html::hiddenInput('has_sab_t_a', '', ['id'=> 'has_sab_t_a']); ?>
    <?= Html::hiddenInput('des_dom_t_a', '', ['id'=> 'des_dom_t_a']); ?>
    <?= Html::hiddenInput('has_dom_t_a', '', ['id'=> 'has_dom_t_a']); ?>
    <!-- Turno 2 -->
    <?= Html::hiddenInput('des_lun_t_b', '', ['id'=> 'des_lun_t_b']); ?>
    <?= Html::hiddenInput('has_lun_t_b', '', ['id'=> 'has_lun_t_b']); ?>
    <?= Html::hiddenInput('des_mar_t_b', '', ['id'=> 'des_mar_t_b']); ?>
    <?= Html::hiddenInput('has_mar_t_b', '', ['id'=> 'has_mar_t_b']); ?>
    <?= Html::hiddenInput('des_mie_t_b', '', ['id'=> 'des_mie_t_b']); ?>
    <?= Html::hiddenInput('has_mie_t_b', '', ['id'=> 'has_mie_t_b']); ?>
    <?= Html::hiddenInput('des_jue_t_b', '', ['id'=> 'des_jue_t_b']); ?>
    <?= Html::hiddenInput('has_jue_t_b', '', ['id'=> 'has_jue_t_b']); ?>
    <?= Html::hiddenInput('des_vie_t_b', '', ['id'=> 'des_vie_t_b']); ?>
    <?= Html::hiddenInput('has_vie_t_b', '', ['id'=> 'has_vie_t_b']); ?>
    <?= Html::hiddenInput('des_sab_t_b', '', ['id'=> 'des_sab_t_b']); ?>
    <?= Html::hiddenInput('has_sab_t_b', '', ['id'=> 'has_sab_t_b']); ?>
    <?= Html::hiddenInput('des_dom_t_b', '', ['id'=> 'des_dom_t_b']); ?>
    <?= Html::hiddenInput('has_dom_t_b', '', ['id'=> 'has_dom_t_b']); ?>
    <?= Html::hiddenInput('labora_festivo', '', ['id'=> 'labora_festivo']); ?>

    <div class="form-group">
        <?= Html::submitButton('Aceptar', ['class' => 'btn btn-success']) ?>
        <!-- Validar que cuando sea edición el url::to cambiarlo por la url de update con su parámetro respectivo -->
        <?= Html::button('Agregar Horarios', ['value'=> Url::to(['suscriptor-horario/create']), 'class' => 'btn btn-primary', 'id'=> 'modal_btn', 'title'=>'Capturar los horarios de atención', 'data-toggle'=>'tooltip']); ?>
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
