<?php

namespace app\models;

use data;
use Yii;

/**
 * This is the model class for table "sender".
 *
 * @property integer $id
 * @property string $messages_id
 * @property integer $status
 * @property integer $counter_sender
 * @property data  $data_publish
 */
class Sender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'counter_sender'], 'integer'],
            [['messages_id'], 'string', 'max' => 255],
            [['data_publish'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'messages_id' => 'Messages ID',
            'status' => 'Status',
            'counter_sender' => 'Counter Sender',
            'data_publish' => 'Data Publish'
        ];
    }

    public function getMessage(){

        return $this->hasOne(Message::className(), ['id' => 'messages_id']);
    }



    public function getIcon(){
        if ($this->status == 1){
            return "galochka-check_128x128.png";
        }
        else{
            return "delete_128x128.png";
        }
    }

    //Метод возвращения заголовка статей
    public function getTitleMessages($id)
    {
        $senter = Sender::find()->where("id=$id")->one();
        $message = Message::find()->where("id=$senter->messages_id")->one();
        return $message->title;
    }


    //Метод отправки письма
    static public function sendEmail($address, $data=false, $subject=false, $textbody=false, $htmlbody=false){

        $mail = Yii::$app->mailer->compose()
            ->setFrom("a@a.com.gmail")
            ->setTo($address)
            ->setSubject($subject) // тема письма
            ->setTextBody($textbody);

        if($htmlbody!=false){
            $mail->setHtmlBody($htmlbody);
        }

        if($data!=false){
            foreach ($data as $s){
                $mail->attach($s);
            }
        }
        $mail->send();
    }
}