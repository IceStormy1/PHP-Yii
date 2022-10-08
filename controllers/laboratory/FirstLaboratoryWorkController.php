<?php

namespace app\controllers\laboratory;

use app\controllers\BaseController;
use app\models\laboratory\FeedbackModel;
use Yii;

class FirstLaboratoryWorkController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() : string
    {
        return $this->render('firstLaboratory');
    }

    public function actionPartTwo() : string
    {
        $model = new FeedbackModel();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            $model->favoriteCuisine = intval(Yii::$app->request->post()["FeedbackModel"]["favoriteCuisine"]);
            $model->isRecommend = intval(Yii::$app->request->post()["FeedbackModel"]["isRecommend"]);
        }

        return $this->render('firstLaboratoryPartTwo', ['feedbackModel' => $model]);
    }
}