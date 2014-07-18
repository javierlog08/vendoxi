<?php

namespace app\modules\auth;
use Yii;

class AuthModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\auth\controllers';
    
    public function init()
    {
        parent::init();
        // custom initialization code goes here
    }
}
