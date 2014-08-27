<?php

namespace app\modules\auth;

class AuthModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\auth\controllers';
    public function init()
    {
        parent::init();
		$this->setup();
        // custom initialization code goes here
    }
	
	public function setup() {
		$setup = new AuthSetup();
		$setup->init();
	}
}
