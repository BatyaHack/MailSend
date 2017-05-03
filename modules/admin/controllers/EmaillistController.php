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
class EmaillistController extends Controller
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
     * Lists all Emaillist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmaillistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $model = new ImgUpload;

        if(Yii::$app->request->post()){

            //Получаем файл из формы
            $file = UploadedFile::getInstance($model, 'image');

            //Сохраняем на диск
            $file->saveAs(Yii::getAlias('@app'). "/web/" . "db/" . $file->name);

            //теперь получаем файл, который загрузили уже из диска на сервере
            $address = file_get_contents(Yii::getAlias('@app'). "/web/" . "db/" . $file->name);

            $find_array = [];

            preg_match_all('/(\S+@[a-z0-9.]*)/m', $address, $find_array);



            for ($i = 0; $i<count($find_array[0]); $i++)
            {
                $mail = new Emaillist();
                $mail->email = $find_array[0][$i];
                $mail->save(false);
            }



            //Почистим бд от одинаковых эмейлов

            $all_mail = Emaillist::find()->all();

            $only_mail = []; //Заполним массив только чистыми эмейлами
            foreach ($all_mail as $m){
                $only_mail[] = $m->email;
            }

            $only_mail = array_unique ($only_mail);//избавимя от повторений
            Emaillist::deleteAll();//делаем через костыли!!! Чистим табилцу

            //Переписывам таблицу
            foreach ($only_mail as $m)
            {
                $mail = new Emaillist();
                $mail->email = $m;
                $mail->save(false);
            }

            //------------------------------------//
        }




        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Emaillist model.
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
     * Creates a new Emaillist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Emaillist();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Emaillist model.
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
     * Deletes an existing Emaillist model.
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
     * Finds the Emaillist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emaillist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emaillist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
