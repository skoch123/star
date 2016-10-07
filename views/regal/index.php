<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchRegal */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'person.name','header'=>'ФИО'],
            ['attribute'=>'ch_ship_date','value'=>function($model){
							return date('Y-m-d',strtotime($model->ch_ship_date));
						}],
	    'title',
            'power',
            'technic',
	    'sparing',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
