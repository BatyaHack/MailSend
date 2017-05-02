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
        //Добавлям в бд
        $email = new Emaillist();
        $email->email = $get['EMAIL'];
        $email->save();



        Yii::$app->mailer->compose()
            ->setFrom('vasa11514@gmail.com')
            ->setTo('korotyailya1997@gmail.com')
            ->setSubject('Уведемление с сайта ') // тема письма
            ->setTextBody('Текстовая версия письма (без HTML)')
            ->setHtmlBody('<p>HTML версия письма</p>')
            ->send();


        return $this->render('index.php');
    }
}
