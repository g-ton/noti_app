<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuscriptorUsuario;

/**
 * SuscriptorUsuarioSearch represents the model behind the search form of `app\models\SuscriptorUsuario`.
 */
class SuscriptorUsuarioSearch extends SuscriptorUsuario
{
    public $item_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_suscriptor', 'estatus'], 'integer'],
            [['username', 'password', 'ultimo_acceso', 'item_name'], 'safe'],
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
        $query= SuscriptorUsuario::find()->where('id <> '.Yii::$app->user->identity->id);
        $query->joinWith(['rolAsignado']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['item_name']= [
            'asc'=> ['item_name'=>SORT_ASC],
            'desc'=> ['item_name'=>SORT_DESC]
        ];

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
            'estatus' => $this->estatus,
        ]);

        if($this->ultimo_acceso!= null){
            $query->andFilterWhere(['between', 'ultimo_acceso', $this->ultimo_acceso. ' 00:00:00', $this->ultimo_acceso. ' 23:59:59']);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'item_name', $this->item_name]);

        return $dataProvider;
    }
}
