<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Author;
use yii\data\Pagination;

/**
 * AuthorSearch represents the model behind the search form of `app\modules\admin\models\Author`.
 */
class AuthorSearch extends Author
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Name', 'Birthday', 'Description'], 'safe'],
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
        $query = Author::find();

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => new  Pagination(
                [
                    'defaultPageSize' => 5,
                    'totalCount' => $query->count()
                ])
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['ilike', 'Id', $this->Id])
            ->andFilterWhere(['ilike', 'Name', $this->Name])
            ->andFilterWhere(['ilike', 'Birthday', $this->Birthday])
            ->andFilterWhere(['ilike', 'Description', $this->Description]);

        return $dataProvider;
    }
}
