<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Books;
use yii\data\Pagination;

/**
 * BooksSearch represents the model behind the search form of `app\modules\admin\models\Books`.
 */
class BooksSearch extends Books
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'BookName', 'GenreId', 'AuthorId', 'DateOfWriting'], 'safe'],
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
    public function search($params): ActiveDataProvider
    {
        $query = Books::find()
            ->innerJoinWith(Author::$TableName, '"AuthorId" = "Authors"."Id"')
            ->innerJoinWith(Genres::$TableName, '"GenreId" = "Genres"."Id"');

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
        $query->andFilterWhere([
            'DateOfWriting' => $this->DateOfWriting,
        ]);

        $query->andFilterWhere(['ilike', 'Id', $this->Id])
            ->andFilterWhere(['ilike', 'BookName', $this->BookName])
            ->andFilterWhere(['ilike', 'GenreId', $this->GenreId])
            ->andFilterWhere(['ilike', 'AuthorId', $this->AuthorId]);

        return $dataProvider;
    }
}
