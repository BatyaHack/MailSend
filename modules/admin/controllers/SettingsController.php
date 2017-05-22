<?php

namespace app\modules\admin\controllers;

use app\models\ImgUpload;
use app\models\Settings;
use Yii;
use app\models\Emaillist;
use app\models\EmaillistSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EmaillistController implements the CRUD actions for Emaillist model.
 */
class SettingsController extends Controller
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

        $model = new Settings();

        if($model->load(Yii::$app->request->post()))
        {
           Settings::setSettings($model);
        }

        return $this->render('index.php',[
            'model' => $model
        ]);
    }
}