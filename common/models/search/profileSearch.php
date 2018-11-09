<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\profile;

/**
 * profileSearch represents the model behind the search form of `common\models\profile`.
 */
class profileSearch extends profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['fName', 'lName', 'brithday', 'phone', 'email', 'city', 'province', 'bio', 'urlFacebook', 'urlTelegram', 'urlTwitter', 'urlLinkedin', 'urlInstagram', 'urlGithub'], 'safe'],
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
        $query = profile::find();

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
            'brithday' => $this->brithday,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'fName', $this->fName])
            ->andFilterWhere(['like', 'lName', $this->lName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'bio', $this->bio])
            ->andFilterWhere(['like', 'urlFacebook', $this->urlFacebook])
            ->andFilterWhere(['like', 'urlTelegram', $this->urlTelegram])
            ->andFilterWhere(['like', 'urlTwitter', $this->urlTwitter])
            ->andFilterWhere(['like', 'urlLinkedin', $this->urlLinkedin])
            ->andFilterWhere(['like', 'urlInstagram', $this->urlInstagram])
            ->andFilterWhere(['like', 'urlGithub', $this->urlGithub]);

        return $dataProvider;
    }
}
