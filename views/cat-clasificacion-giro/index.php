<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatClasificacionGiroSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clasificación de Giros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-clasificacion-giro-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Agregar Clasificación Giro', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
