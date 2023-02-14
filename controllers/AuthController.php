<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\IdentityInterface;
use yii\web\Response;

class AuthController extends Controller
{
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
        return $this->render('login', [
            'model' => $model,
        ]);
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

    public function actionTest()
    {
        $user = User::findOne(2);

        Yii::$app->user->login($user);

        echo '<pre>';
//        print_r(Yii::$app->user->isGuest($user));die;
        if (Yii::$app->user->isGuest) {
            echo 'Пользователь гость';
        }else
        {
            echo 'Пользователь авторизован';
        }

    }






}


?>