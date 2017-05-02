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

                    

        $email = new Emaillist();
        $email->email = $get['EMAIL'];
        $email->save();


        return $this->render('index.php');
    }
}
