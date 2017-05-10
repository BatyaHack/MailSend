<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $atach
 * @property string $html_body
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body', 'atach'], 'string', 'max' => 255],
            [['html_body'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'atach' => 'Atach',
            'html_body'=>'html_body',
        ];
    }

    //Вернем файлы, который нужно прикрепить
    public function getFiles()
    {
        return $this->hasMany(Atach::className(), ['many_id'=>'id']);
    }

    public function getListFiles()
    {
        //просто так
    }

}
