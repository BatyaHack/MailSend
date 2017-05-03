<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sender".
 *
 * @property integer $id
 * @property string $messages_id
 * @property integer $status
 * @property integer $counter_sender
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





    //Метод отправки письма
    static public function sendEmail($address, $data=false, $subject=false, $textbody=false, $htmlbody=false){
        $mail = Yii::$app->mailer->compose()
            ->setFrom('vasa11514@gmail.com')
            ->setTo($address)
            ->setSubject($subject) // тема письма
            ->setTextBody($textbody)
            ->setHtmlBody($htmlbody);
        if($data!=false){
            foreach ($data as $s){
                $mail->attach($s);//комментарий чисто для коммита. так как я забыл его сделать и пушанул.
            }
        }
        $mail->send();
    }
}
