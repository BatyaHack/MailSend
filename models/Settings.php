<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sender;
use yii\helpers\Url;

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


    public static function setSettings($model)
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
        fclose($file);
    }

    public static function currentEmail()
    {
        $url = Url::to("@app/config/web.php");
        $file = fopen($url, "r");

        $text = fread($file, filesize($url));
        fclose($file);
        $result = [];
        preg_match("/^(([a-zA-Z0-9_\\-.]+)@([a-zA-Z0-9\\-]+)\\.[a-zA-Z0-9\\-.]+$)/", $text, $result);
        return $result[0];
    }
}
