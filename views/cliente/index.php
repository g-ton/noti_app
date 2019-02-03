<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'razon_social',
            'rfc',
            'id_giro',
            'id_pais',
            //'id_estado',
            //'id_municipio',
            //'calle_colonia',
            //'codigo_postal',
            //'celular',
            //'telefono',
            //'correo',
            //'cedula_profesional',
            //'estatus',
            //'bloqueado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
