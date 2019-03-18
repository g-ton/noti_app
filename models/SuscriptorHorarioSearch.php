<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuscriptorHorario;

/**
 * SuscriptorHorarioSearch represents the model behind the search form of `app\models\SuscriptorHorario`.
 */
class SuscriptorHorarioSearch extends SuscriptorHorario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_suscriptor', 'labora_festivo'], 'integer'],
            [['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = SuscriptorHorario::find();

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
            'id_suscriptor' => $this->id_suscriptor,
            'labora_festivo' => $this->labora_festivo,
        ]);

        $query->andFilterWhere(['like', 'lunes', $this->lunes])
            ->andFilterWhere(['like', 'martes', $this->martes])
            ->andFilterWhere(['like', 'miercoles', $this->miercoles])
            ->andFilterWhere(['like', 'jueves', $this->jueves])
            ->andFilterWhere(['like', 'viernes', $this->viernes])
            ->andFilterWhere(['like', 'sabado', $this->sabado])
            ->andFilterWhere(['like', 'domingo', $this->domingo]);

        return $dataProvider;
    }
}
