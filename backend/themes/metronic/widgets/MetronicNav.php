<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\themes\metronic\widgets;

use Yii;
use yii\bootstrap\Nav;
use yii\bootstrap\Dropdown;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use backend\models\NotificationTypes;

class MetronicNav extends Nav
{
	public $model; // User model
	
	private $_noticon = [
		NotificationTypes::SUCCESS => '<span class="label label-sm label-icon label-success"><i class="fa fa-plus"></i></span>',
		NotificationTypes::DANGER => '<span class="label label-sm label-icon label-danger"><i class="fa fa-bolt"></i></span>',
		NotificationTypes::WARNING => '<span class="label label-sm label-icon label-warning"><i class="fa fa-bell-o"></i>/span>',
		NotificationTypes::INFO => '<span class="label label-sm label-icon label-info"><i class="fa fa-bullhorn"></i></span>',
	];
	
    public function init()
    {
    	parent::init();
		$this->encodeLabels = false;
		$this->options = ['class' => 'nav navbar-nav pull-right'];
		$this->items = [
			$this->notifications(),
			$this->messages(),
			$this->tasks(),
		];
	}
	
	private function notifications() {
		
		$count = 0;
		foreach($this->model->notifications as $notify){
			$data[] = '<li>
				<a href="#">
				'.$this->_noticon[$notify->type].'
				'.$notify->message.' <span class="time">
				Just now </span>
				</a>
			</li>'; 
		}

		$count = count($data);
		
		array_unshift($data, '<li><p>You have '.$count.' new notifications</p></li>');
		
		$data[] = '<li class="external"><a href="#">See all notifications <i class="m-icon-swapright"></i></a></li>';
		
		
		return $notifications = [
			'id'=>'header_notification_bar',
			'label' => '<i class="fa fa-warning"></i><span class="badge badge-default">'.$count.' </span>',
			'options' => ['class'=>'dropdown dropdown-extended dropdown-notification'],
			'items' => $data,
		];
	}
	
	private function messages() {
		
		$data = array();
		$count = 0;
		return $messages = [
			'id'=>'header_notification_bar',
			'label' => '<i class="fa fa-envelope"></i><span class="badge badge-default">'.$count.' </span>',
			'options' => ['class'=>'dropdown dropdown-extended dropdown-inbox'],
			'items' => [
	        	'<li><p>You have '.$count.' new messages</p></li>'.
	        	''
	    	],
		];
	}
	
	private function tasks() {
		
		$data = array();
		$count = 0;
		return $tasks = [
			'id'=>'header_notification_bar',
			'label' => '<i class="fa fa-tasks"></i><span class="badge badge-default">'.$count.' </span>',
			'options' => ['class'=>'dropdown dropdown-extended dropdown-tasks'],
			'items' => [
	        	'<li><p>You have '.$count.' pending tasks</p></li>'.
	        	''
	    	],
		];
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
            $linkOptions['data-toggle'] = 'dropdown';
            Html::addCssClass($options, 'dropdown');
            Html::addCssClass($linkOptions, 'dropdown-toggle');
            if (is_array($items)) {
                if ($this->activateItems) {
                    $items = $this->isChildActive($items, $active);
                }
                $items = Dropdown::widget([
                    'items' => $items,
                    'encodeLabels' => $this->encodeLabels,
                    'clientOptions' => false,
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