<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Regal */

$this->title = 'Create Regal';
$this->params['breadcrumbs'][] = ['label' => 'Regals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
