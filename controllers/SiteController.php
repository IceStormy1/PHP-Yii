<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        $registrationModel = new LoginForm();

        return $this->render('login', [
            'model' => $model,
            'registrationModel' => $registrationModel,
        ]);
    }

    public function actionRegistration()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->post());

        $isUserExist = User::find()->where('"UserName" = \'' . $model->username .'\' ')->count() != 0;

        if($isUserExist != 0)
            return $this->redirect('?r=site%2Flogin');

        $userModel = new User();
        $userModel["UserName"] = $model->username;
        $userModel["Password"] = Yii::$app->getSecurity()->generatePasswordHash($model->password);

        $userModel->save();

        $this->actionLogin();
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * @return string
     */
    public function actionSay(): string
    {
        return $this->render('say', ['message' => 'Hello YII']);
    }

    /**
     * @return string
     */
    public function actionEntry(): string
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate())
        {
            // данные в $model удачно проверены
            // делаем что-то полезное с $model ...
            return $this->render('entryConfirm', ['model' => $model]);
        }
        else
        {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entryDefault', ['model' => $model]);
        }
    }

    public function actionFirstLaboratory()
    {
        return $this->render('firstLaboratory');
    }
}
