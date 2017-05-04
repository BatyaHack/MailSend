<?php

namespace app\controllers;

use app\models\Emaillist;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SaveemailController extends Controller
{
    public function actionIndex($id=false){

        $request = Yii::$app->request;
        $get = $request->get();

        if(preg_match('/(\S+@[a-z0-9.]*)/si', $get['EMAIL'])) {
            //Добавлям в бд
            $email = new Emaillist();
            $email->email = $get['EMAIL'];
            $email->save();

            $answer = "Спасибо. Вы подписаны на рассылку!";
        } else{
            $answer = "Не корректный email адресс";
        }







        return $this->render('index.php', [
            'answer' => $answer,
        ]);
    }
}
