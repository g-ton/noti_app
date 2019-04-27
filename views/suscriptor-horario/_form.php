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
    ]); 
    $titulo_mascara= 'Hora expresada en formato 24 hrs';
    ?>
    <div class="row">
        <!-- Turno 1 -->
        <div class="col-md-6">
            <div class="col-lg-12"><i>Turno 1</i></div>
            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Lunes</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_lun_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_lun_t_a_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'des_lun_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_lun_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_lun_t_a_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'has_lun_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Martes</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_mar_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_mar_t_a_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'des_mar_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_mar_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_mar_t_a_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'has_mar_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Miércoles</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_mie_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_mie_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_mie_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_mie_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_mie_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_mie_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Jueves</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_jue_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_jue_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_jue_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_jue_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_jue_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_jue_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Viernes</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_vie_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_vie_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_vie_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_vie_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_vie_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_vie_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Sábado</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_sab_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_sab_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_sab_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_sab_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_sab_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_sab_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Domingo</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_dom_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_dom_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_dom_t_a_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_dom_t_a',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_dom_t_a_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_dom_t_a_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>
        </div>
        <!-- Turno 2 -->
        <div class="col-md-6">
            <div class="col-lg-12"><i>Turno 2</i> (Opcional)</div>
            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Lunes</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_lun_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_lun_t_b_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'des_lun_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_lun_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_lun_t_b_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'has_lun_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Martes</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_mar_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_mar_t_b_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'des_mar_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_mar_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_mar_t_b_mask',
                            'mask' => '99:99',
                            'options' => ['id'=>'has_mar_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Miércoles</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_mie_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_mie_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_mie_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_mie_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_mie_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_mie_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Jueves</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_jue_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_jue_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_jue_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_jue_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_jue_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_jue_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Viernes</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_vie_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_vie_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_vie_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_vie_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_vie_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_vie_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Sábado</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_sab_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_sab_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_sab_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_sab_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_sab_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_sab_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12"><span class="label label-warning">Domingo</span></div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'des_dom_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'des_dom_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'des_dom_t_b_mask', 'class' => 'form-control',  'placeholder'=>'08:00', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <?=
                        $form->field($model, 'has_dom_t_b',[])->widget(\yii\widgets\MaskedInput::className(), [
                            'name' => 'has_dom_t_b_mask',
                            'mask' => '99:99',
                            'options' => [ 'id'=>'has_dom_t_b_mask', 'class' => 'form-control',  'placeholder'=>'19:30', 'data-toggle'=>'tooltip', 'title'=>$titulo_mascara]
                        ])
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'labora_festivo')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
