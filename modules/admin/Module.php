<?php

namespace app\modules\admin;
use Yii;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {

            if (Yii::$app->user->getId()==null) {
                // the URL that the user should be redirected to after login.
                Yii::$app->user->setReturnUrl(Yii::app()->getRequest()->requestUri);
                Yii::$app->getRequest()->redirect('/login');
            }
            $controller->layout = 'main';
            // this method is called before any module controller action is performed
            // you may place customized code here

            return true;
        }
        else
            return false;
    }
}
