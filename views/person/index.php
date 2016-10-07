<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            ['attribute'=>'name','format'=>'raw','value'=>function($model,$index){
								return Html::a($model->name,Url::to('?r=regal/index&SearchRegal[person_id]='.$model->id));
							}],
            ['attribute'=>'birthday','format'=>'raw','value'=>function($model,$index){
								$date1=date('Y-m-d');
								$date2=$model->birthday;
								$dateDiff=date_diff(date_create($date1), date_create($date2));
								return date('Y-m-d',strtotime($date2)).', полных лет: '.$dateDiff->y;
							}],
            'phone',
            // 'email:email',
            // 'address',
            // 'school',
             ['attribute'=>'group.title','label'=>'Группа','enableSorting'=>true],
            // 'passport',
             'sport_passport',
             ['attribute'=>'med_card','format'=>'raw','contentOptions' => function ($model, $key, $index, $column) {
									  $date1=date('Y-m-d');
                                                                	  $date2=$model->med_card;
                                                                	  $dateDiff=date_diff(date_create($date1), date_create($date2));
      									  return ['style' => 'background-color:' 
							            . (((strtotime($model->med_card)>strtotime($date1)) && $dateDiff->days>14)
               								 ? 'green' : 'red')];
   									 },
						'value'=>function($model,$index){return (($model->med_card!=null)?date('Y-m-d',strtotime($model->med_card)):null);}],
             ['attribute'=>'ensurence','format'=>'raw','contentOptions' => function ($model, $key, $index, $column) {
                                                                          $date1=date('Y-m-d');
                                                                          $date2=$model->ensurence;
                                                                          $dateDiff=date_diff(date_create($date1), date_create($date2));
                                                                          return ['style' => 'background-color:' 
                                                                    . (((strtotime($model->ensurence)>strtotime($date1)) && $dateDiff->days>14)
                                                                         ? 'green' : 'red')];
                                                                         },
                                                'value'=>function($model,$index){return (($model->ensurence!=null)?date('Y-m-d',strtotime($model->ensurence)):null);}],

            // 'photo',
            ['attribute'=>'contract','format'=>'raw','contentOptions' => function ($model, $key, $index, $column) {
									return ['style' => 'background-color:'
                                                                    . ($model->contract==1
                                                                         ? 'green' : 'red')];
										}],
            // 'accept',
	    ['attribute' => 'currentWeight.weight', 'label'=>'Последнее взвешивание','format'=>'raw','value'=>function($model,$index){
                                                                return Html::a($model->currentWeight['weight'],Url::to('?r=weight/index&SearchWeight[person_id]='.$model->id));
                                                        }],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
