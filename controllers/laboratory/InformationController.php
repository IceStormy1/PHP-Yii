<?php

namespace app\controllers\laboratory;

use app\controllers\BaseController;

class InformationController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('information');
    }
}