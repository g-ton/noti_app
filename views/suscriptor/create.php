<?php

use yii\helpers\Html;

$this->title = 'Registro';
?>
<div class="suscriptor-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model, 'giros' => $giros, 'estados' => $estados,
        'des_lun_t_a'=> '',
		'has_lun_t_a'=> '',
		'des_mar_t_a'=> '',
		'has_mar_t_a'=> '',
		'des_mie_t_a'=> '',
		'has_mie_t_a'=> '',
		'des_jue_t_a'=> '',
		'has_jue_t_a'=> '',
		'des_vie_t_a'=> '',
		'has_vie_t_a'=> '',
		'des_sab_t_a'=> '',
		'has_sab_t_a'=> '',
		'des_dom_t_a'=> '',
		'has_dom_t_a'=> '',
		'labora_festivo'=> ''
    ]) ?>

</div>
