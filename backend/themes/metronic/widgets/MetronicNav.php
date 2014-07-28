<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes\metronic\widgets;

use Yii;
use yii\bootstrap\Nav;

class MetronicNav extends Nav
{
    public function init()
    {
    	parent::init();
		$this->options = ['class' => 'navbar-nav pull-right'];
		$this->items = [
			[
				'id'=>'header_notification_bar',
				'label'=>'',
				'items'=>["testa","testa"]
			]
		];
	}
	
}