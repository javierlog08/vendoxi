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
use backend\models\User;

class MetronicNav extends Nav
{
	public $model; // User model
	public $assets; //Asset manager theme bundle
	
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
		
		if(!(bool)$this->model)
			$this->model = User::find()->with([
				'notifications'=> function($q) {
					$q->orderBy(['time'=>SORT_DESC]);
					$q->limit(10);
				},
				'messages'=> function($q) {
					$q->orderBy(['date'=>SORT_DESC]);
					$q->limit(10);
				}
			])->one();
				
		$this->items = [
			$this->notifications(),
			$this->messages(),
			$this->tasks(),
			$this->profile(),
		];
	}
	
	public function run()
    {
        echo $this->renderItems();
    }
	
	
	private function notifications() 
	{
		
		$count = 0;
		foreach($this->model->notifications as $notify){
			$data[] = '<li>
				<a href="#">
				'.$this->_noticon[$notify->type].'
				'.$notify->message.' <span class="time">
				'.Yii::$app->formatter->asRelativeTime($notify->time).' </span>
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
	
	private function messages() 
	{
		
		$count = 0;
		$assets = $this->assets;
		foreach($this->model->messages as $message){
			$sender = User::findOne($message->sender_id);
			$photo = ($sender->detail->photo == NULL) ? $assets->baseUrl.'/admin/layout/img/avatar.png' : $sender->detail->photo;
			$data[] = '<li>
				<a href="inbox.html?a=view">
					<span class="photo">
					<img src="'.$photo.'" alt=""/>
					</span>
					<span class="subject">
					<span class="from">
					'.$sender->detail->name.' </span>
					<span class="time">
					'.Yii::$app->formatter->asRelativeTime($message->date).' </span>
					</span>
					<span class="message">
					'.$message->message.'</span>
				</a>
			</li>';
		}

		$count = count($data);
		
		array_unshift($data, '<li><p>You have '.$count.' new messages</p></li>');
		
		$data[] = '<li class="external"><a href="#">See all messages <i class="m-icon-swapright"></i></a></li>';
		return $messages = [
			'id'=>'header_inbox_bar',
			'label' => '<i class="fa fa-envelope"></i><span class="badge badge-default">'.$count.' </span>',
			'options' => ['class'=>'dropdown dropdown-extended dropdown-inbox'],
			'items' => $data,
		];
	}
	
	private function tasks() 
	{
		
		$data = array();
		$count = 0;
		return $tasks = [
			'id'=>'header_task_bar',
			'label' => '<i class="fa fa-tasks"></i><span class="badge badge-default">'.$count.' </span>',
			'options' => ['class'=>'dropdown dropdown-extended dropdown-tasks'],
			'items' => [
	        	'<li><p>You have '.$count.' pending tasks</p></li>'.
	        	''
	    	],
		];
	}

	private function profile() 
	{
		$user = $this->model;
		$assets = $this->assets;
		$photo = ($user->detail->photo == NULL) ? $assets->baseUrl.'/admin/layout/img/avatar.png' : $user->detail->photo;
		$menu = [];
		foreach(Yii::$app->params['MetronicNavMenu'] as $item) {
			
			if(!is_array($item)){
				$menu[] = '<li class="divider"></li>';
			} else {
				$menu[] = $item;
			}
			
		}
		
		return $profile = [
			'label'=>'
				<img alt="" width=29 height=29 class="img-circle" src="'.$photo.'"/>
				<span class="username">Bob </span>
				<i class="fa fa-angle-down"></i>',
			'options'=>['class'=>'dropdown dropdown-user'],
			'items' => $menu,
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