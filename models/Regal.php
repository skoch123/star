<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regal".
 *
 * @property integer $id
 * @property integer $person_id
 * @property string $ch_ship_date
 * @property integer $category_id
 * @property integer $position
 */
class Regal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['person_id', 'power','technic','sparing',], 'integer'],
	    [['title'],'string'],
            [['ch_ship_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Person ID',
            'ch_ship_date' => 'Дата проведения соревнования',
            'title' => 'Название соревнования',
	    'power' => 'Сила',
	    'technic' => 'Техника',
	    'sparing' => 'Спаринг',
        ];
    }

    public function getPerson(){
	return $this->hasOne(Person::className(),['id'=>'person_id']); 
    }

}
