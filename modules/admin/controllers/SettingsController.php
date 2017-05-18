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
            $url = Url::to("@app/config/web.php");
            //$test_url = Url::to("@app/config/Customtest.php"); //тестовый url НЕ ВКОЕМ СЛУЧАЕ ПРОСТО TEST. ТАК КАК ПРОСО test уже есть!!!

            $file = fopen($url, "r");
            //$test_file = fopen($test_url, "w+"); //тестовый файл

            $text = fread($file, filesize($url));
            fclose($file);
            $file = fopen($url, "w+");

            //$ssl = $model-> ssl == 0 ? "" : "ssl"; Спросить насчет этой дичи. Возмодно там не bool значения

            $text = preg_replace("/'port' =>\\s\\d*/", "'port' => {$model->port}", $text);
            $text = preg_replace("/'host' =>\\s.*/", "'host' => '{$model->host}',", $text);
            $text = preg_replace("/'username' =>\\s.*/", "'username' => '{$model->username}',", $text);
            $text = preg_replace("/'password' =>\\s.*/", "'password' => '{$model->password}',", $text);

            fwrite($file, $text);
        }

        return $this->render('index.php',[
            'model' => $model
        ]);
    }
}