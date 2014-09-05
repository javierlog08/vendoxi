<?php

namespace backend\themes\metronic\widgets;

use Yii;
use yii\widgets\Breadcrumbs;

class MetronicBreadcrumbs extends Breadcrumbs
{
	
	public function init() {
		parent::init();
		$this->itemTemplate = "<li><i>{link}</i><i class='fa fa-angle-right'></i></li>";
		$this->options = ['class'=>'page-breadcrumb breadcrumb'];
		$this->homeLink = [
			'label' => 'Home',
			'url' => Yii::$app->homeUrl,
			'template' => '<li><i class="fa fa-home"></i><i>{link}</i><i class="fa fa-angle-right"></i></li>',
		];
	}


}