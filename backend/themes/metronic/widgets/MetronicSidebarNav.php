<?php

namespace backend\themes\metronic\widgets;

use Yii;
use yii\bootstrap\Nav;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class MetronicSidebarNav extends Nav
{
	public $items = [];
	public $toggler = true;
	public $controller;
	public function init() 
	{
		parent::init();
		$this->options = [
			'class'=> 'page-sidebar-menu',
			'data-auto-scroll'=>'false',
			'data-auto-speed'=>200,
		];
		$this->encodeLabels = false;
		$this->items = [
			$this->toggleButton(),
			$this->search(),
		];
		
		$this->renderMenu();
		
	}
	
	
	private function toggleButton() {
		return $button = '
		<li class="sidebar-toggler-wrapper">
			<div class="sidebar-toggler">
			</div>
		</li>';
	}
	
	private function search() {
		return $form = '
		<li class="sidebar-search-wrapper hidden-xs">
			<form class="sidebar-search" action="extra_search.html" method="POST">
				<a href="javascript:;" class="remove">
				</a>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
					<!-- DOC: value=" ", that is, value with space must be passed to the submit button -->
					<input class="btn submit" type="button" type="button" value=" "/>
					</span>
				</div>
			</form>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
		</li>
		';
	}

	private function renderMenu() 
	{
		$menu = [];
		foreach(Yii::$app->params['MetronicSideNavMenu'] as $item) {
			$li = [
				'url'=>$item['url'],
				'label'=>"<i class=\"fa ".$item['icon']."\"></i><span class=\"title\">".$item['label']."</span>",
			];
			
			if($item['url']==Yii::$app->requestedRoute) {
				$li['label'].='<span class="selected"></span>';
				$li['options'] = ['class'=>'active'];
			}
				
			
			if(isset($item['submenu'])) {
				$li['label'].='<span class="arrow "></span>';
				foreach($item['submenu'] as $sub) {
					$sli = [
						'label'=>"<i class=\"fa ".$sub['icon']."\"></i><span class=\"title\">".$sub['label']."</span>",
						'url'=>$sub['url'],
					];
					
					if($sub['url']==Yii::$app->requestedRoute) {
						$sli['options'] =  ['class'=>'active'];
						$li['label'].='<span class="selected"></span>';
						$li['options'] = ['class'=>'active open'];
					}
					
					$li['items'][] = $sli;
				}
			}
			
			$this->items[] = $li;
		}
	}
	
	public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

        if (isset($item['active'])) {
            $active = ArrayHelper::remove($item, 'active', false);
        } else {
            $active = $this->isItemActive($item);
        }

        if ($items !== null) {
            if (is_array($items)) {
                if ($this->activateItems) {
                    $items = $this->isChildActive($items, $active);
                }
                $items = Nav::widget([
                    'items' => $items,
                    'encodeLabels' => $this->encodeLabels,
                    'clientOptions' => false,
                    'options'=>['class'=>'sub-menu'],
                    'view' => $this->getView(),
                ]);
            }
        }

        if ($this->activateItems && $active) {
            Html::addCssClass($options, 'active');
        }

        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);
    }
	
}