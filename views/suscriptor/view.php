<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Suscriptores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="suscriptor-view">

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
            'id',
            'razon_social',
            'rfc',
            'id_giro',
            'id_pais',
            'id_estado',
            'id_municipio',
            'calle_colonia',
            'codigo_postal',
            'celular',
            'telefono',
            'correo',
            'cedula_profesional',
            'estatus',
            'bloqueado',
        ],
    ]) ?>

</div>
