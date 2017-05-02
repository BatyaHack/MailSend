<?php

namespace app\modules\admin\controllers;

use app\models\ImgUpload;
use Yii;
use app\models\Emaillist;
use app\models\EmaillistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EmaillistController implements the CRUD actions for Emaillist model.
 */
class StartemailController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {
        //Класс который отвечает за логику хранения файла
        $model = new ImgUpload;





        if(Yii::$app->request->post())
        {

            //Получаем картинку и сохраняем ее на сервер
            if($file = UploadedFile::getInstance($model, 'image')) {
                $file_name = $model->imageUpload($file);
                $data = Yii::getAlias('@app'). "/web/" . "uploads/" . $file_name;
            }



            //Создаем письмо используя метод письма
            $listemail = Emaillist::find()->all();
            $subject = Yii::$app->request->post('subject');
            $textbody = Yii::$app->request->post('textbody');
            $htmlbody = Yii::$app->request->post('texthtml');
            foreach ($listemail as $email)
            {
                $this->sendEmail($email->email, $data, $subject, $textbody, $htmlbody);
            }
            //----------------------------------------------------------------------------//
        }


        return $this->render('index',[
            'model'=>$model,
        ]);
    }




    //Метод отправки письма
    private function sendEmail($address, $data=false, $subject=false, $textbody=false, $htmlbody=false){
       $mail = Yii::$app->mailer->compose()
            ->setFrom('vasa11514@gmail.com')
            ->setTo($address)
            ->setSubject($subject) // тема письма
            ->setTextBody($textbody)
            ->setHtmlBody($htmlbody);
            if($data!=false){
                $mail->attach($data);
            }
            $mail->send();
    }
}