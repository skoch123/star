<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weight".
 *
 * @property integer $id
 * @property string $weight
 * @property string $date
 * @property integer $person_id
 */
class Weight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['person_id'], 'integer'],
            [['weight'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weight' => 'Вес',
            'date' => 'Дата',
            'person_id' => 'Person ID',
        ];
    }
    public function getPerson(){
        return $this->hasOne(Person::className(),['id'=>'person_id']);
    }

}
