<?php

namespace app\controllers\laboratory;

use app\controllers\BaseController;

class ThirdLaboratoryWorkController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() : string
    {
        return $this->render('thirdLaboratory');
    }
}