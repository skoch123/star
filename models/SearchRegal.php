<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Regal;

/**
 * SearchRegal represents the model behind the search form about `app\models\Regal`.
 */
class SearchRegal extends Regal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'person_id', 'power','technic','sparing'], 'integer'],
	    [['title'],'string'],
            [['ch_ship_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Regal::find()->joinWith('person');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'person_id' => $this->person_id,
            'ch_ship_date' => $this->ch_ship_date,
            'power' => $this->power,
            'technic' => $this->technic,
	    'sparing' => $this->sparing,
        ]);

        return $dataProvider;
    }
}
