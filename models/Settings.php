<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sender;

/**
 * SenderSearch represents the model behind the search form about `app\models\Sender`.
 */
class Settings extends Sender
{
    public function rules()
    {
        return [
            [['port'], 'integer'],
            [['password', 'username', 'host'], 'string'],
            [['ssl'], 'boolean'],
        ];
    }
    public $host;
    public $password;
    public $username;
    public $port;
    public $ssl;
}
