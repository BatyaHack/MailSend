<?php

namespace app\controllers;

use app\models\Emaillist;
use app\models\News;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class NewsController extends Controller
{
    public $layout = 'secondpage.php';
     public function actionIndex($id = 0){
       return $this->render('index.php');
    }

    public function actionLesson($data = 0)
    {
        $name = $this->getData("custom_U670");
        $email = $this->getData("Email");
        $skype = $this->getData("custom_U924");
        $data = $this->getData("custom_U730");
        $message = $this->getData("custom_U666");

        $email_list = new Emaillist();
        $email_list->email = $email;
        $email_list->data = date('Y-m-d');
        $email_list->save(false);

        $news = new News();
        $news->name = $name;
        $news->email = $email;
        $news->skype = $skype;
        $news->data = $data;
        $news->message = $message;

        $news->save(false);

        return "Мы Вас ждем!";
    }

    private function getData($name)
    {
        return Yii::$app->request->get($name);
    }
}
