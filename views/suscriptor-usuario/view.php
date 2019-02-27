<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuscriptorUsuario */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="suscriptor-usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'ultimo_acceso',
        ],
    ]) ?>

    <?= Html::a('Mostrar Contraseña', [''], ['id' => 'mostrar_clave']) ?>
    <input type="hidden" name="password_show" id="password_show" value=<?= $model->password_show ?> >
    <span id="pintar_clave"></span>

</div>

<?php
$this->registerJs("$('#mostrar_clave').click(function(e) {
    e.preventDefault();
    var clave_encriptada= $('#password_show').val();

    $.ajax({
        url    : url_base + 'suscriptor-usuario/desencriptar-clave',
        type   : 'POST',
        dataType: 'json',
        data   : {clave_encriptada: clave_encriptada},
        success: function (response) {
            if(response.error_sesion_ajax){
                retornarLogin(response.error_sesion_ajax);
            }
            $('#pintar_clave').text(response.clave_desencriptada);
        },
        error  : function (event, jqxhr, exception) {
            retornarLogin(jqxhr.status);
        }
    });

});"
); 
?>
