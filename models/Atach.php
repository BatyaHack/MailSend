<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atach".
 *
 * @property integer $id
 * @property string $file_name
 * @property integer $many_id
 *
 * @property Message $many
 */
class Atach extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['many_id'], 'integer'],
            [['file_name'], 'string', 'max' => 255],
            [['many_id'], 'exist', 'skipOnError' => true, 'targetClass' => Message::className(), 'targetAttribute' => ['many_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_name' => 'File Name',
            'many_id' => 'Many ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMany()
    {
        return $this->hasOne(Message::className(), ['id' => 'many_id']);
    }
}
