<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuscriptorHorarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suscriptor Horarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suscriptor-horario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Suscriptor Horario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_suscriptor',
            'lunes',
            'martes',
            'miercoles',
            //'jueves',
            //'viernes',
            //'sabado',
            //'domingo',
            //'labora_festivo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
