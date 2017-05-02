<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


class ImgUpload extends Model
{

    public $image;

    //Создаем метод, который будет сохранять файл на сервер(не в БД)
    //Данный метод делает путь по которому будет идти сохранение
    public function imageUpload(UploadedFile $file)
    {

        $this->image = $file;

        if ($this->validate()) {

            $fileName = strtolower(md5(uniqid($file->baseName)) . "." . $file->extension);

            $file->saveAs(Yii::getAlias('@app'). "/web/" . "uploads/" . $fileName);

            return $fileName;
        }
    }

    public function DeleteImg($currentImg)
    {

        if (file_exists(Yii::getAlias('@app'). "/web/" . "uploads/" . $currentImg && $currentImg!=null)) {
            unlink(Yii::getAlias('@app'). "/web/" . "uploads/" . $currentImg);
        }
    }
}