<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $name
 * @property string $birthday
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $school
 * @property integer $group_id
 * @property string $passport
 * @property string $sport_passport
 * @property string $med_card
 * @property string $ensurence
 * @property integer $photo
 * @property integer $contract
 * @property integer $accept
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday', 'med_card', 'ensurence'], 'safe'],
            [['group_id', 'photo', 'contract', 'accept'], 'integer'],
            [['name', 'email', 'address', 'school', 'passport', 'sport_passport'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'birthday' => 'Дата рождения',
            'phone' => 'Телефон',
            'email' => 'Email',
            'address' => 'Адрес',
            'school' => 'Учебное завдение',
            'group_id' => 'Группа',
            'passport' => 'Паспорт',
            'sport_passport' => 'Паспорт спортсмена',
            'med_card' => 'Мед. справка до',
            'ensurence' => 'Страховка до',
            'photo' => 'Наличие фото',
            'contract' => 'Наличие договора',
            'accept' => 'Наличие согласия',
        ];
    }

    public function getWeight(){
	return $this->hasMany(Weight::className(),['person_id'=>'id']);
    }

    public function getCurrentWeight(){
	return $this->hasOne(Weight::className(),['person_id'=>'id'])->orderBy(['date'=>SORT_DESC]);
    }

    public function getGroup(){
	return $this->hasOne(Groups::className(),['id'=>'group_id']);
    }
    
    public function getRegal(){
	return $this->hasMany(Regal::className(),['person_id'=>'id']);
    }

}
