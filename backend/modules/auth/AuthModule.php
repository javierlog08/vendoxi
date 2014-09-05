<?php

namespace app\modules\auth;

class AuthModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\auth\controllers';
	public $setup;
	
    public function init()
    {
        parent::init();
		$this->setup = new AuthSetup();
		$this->setup->init();
        // custom initialization code goes here
    }
	
}
