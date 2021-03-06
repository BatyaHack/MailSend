<?php

namespace app\modules\admin\controllers;

use app\models\Emaillist;
use Error;
use Swift_TransportException;
use Yii;
use app\models\Sender;
use app\models\SenderSearch;
use yii\base\ErrorException;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SenderController implements the CRUD actions for Sender model.
 */
class SenderController extends Controller
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

    /**
     * Lists all Sender models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SenderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sender model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sender model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sender();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sender model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sender model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sender model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sender the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sender::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionStart()
    {
        $obj = Sender::find()->where(['status'=>'1', 'data_publish'=>date("Y-m-d")])->all();

        foreach ($obj as $send_mail){
            $addres = Emaillist::find()->all(); //хотя можно сразу брать одного пользователя, а не всех!

            $addres = array_slice($addres, $send_mail->counter_sender, $send_mail->counter_sender+1);

            $data_array = [];
            $files = $send_mail->message->files;
            foreach ($files as $file){
                $data_array[] = (Yii::getAlias('@app'). "/web/" . "uploads/" . $file->file_name);
            }

            try
            {
                Sender::sendEmail($addres[0]->email, $data_array,  $send_mail->message->title,
                    $send_mail->message->body, $send_mail->message->html_body);

                $send_mail->counter_sender++;
                $send_mail->save(false);
            }
            catch (ErrorException $ex) {
                echo $ex->getMessage();
                echo "<br>";
                echo "В таблице закончились пользователи. Проверьте количество отправленных писем и количество email адрессов";
            }
            catch (Swift_TransportException $ex){
                echo $ex->getMessage();
                echo "<br>";
                echo "Вы неправильно указали логин и пароль. Так же стоит подтвердить доступ на почте";
            }
        }
    }
}