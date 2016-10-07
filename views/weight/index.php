<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWeight */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weight-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Weight', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'person.name',
            'weight',
	    ['attribute'=>'date','value'=>function($model){
                                                        return date('Y-m-d',strtotime($model->date));
                                                }],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
