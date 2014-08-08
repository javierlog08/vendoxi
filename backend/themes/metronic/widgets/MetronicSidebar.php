<?php

namespace backend\themes\metronic\widgets;

use Yii1;
use yii\bootstrap\Widget;

class MetronicSidebar extends Widget
{
	public $items = [];
	public $toggler = true;
	
	public function init() 
	{
		parent::init();
		
	}
	
	
	public function renderItem() 
	{
		foreach($this->items as $item) {
			
		}	
	}
	
}