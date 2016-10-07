<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Person;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Regal */
/* @var $form yii\widgets\ActiveForm */
$person = Person::find()->orderBy('name')->asArray()->all();
$personList = ArrayHelper::map($person, 'id', 'name');

?>

<div class="regal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'person_id')->dropDownList($personList) ?>

    <?= $form->field($model, 'ch_ship_date')->widget(DatePicker::className(),['pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'todayHighlight' => true
        ]]);
         ?>


    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'power')->textInput() ?>
    <?= $form->field($model, 'technic')->textInput() ?>
    <?= $form->field($model, 'sparing')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
