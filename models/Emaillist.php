<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emaillist".
 *
 * @property integer $id
 * @property string $email
 */
class Emaillist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emaillist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'data', 'visit'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'data' => 'Data',
            'visit' => 'Visit'
        ];
    }
}
