<?php
return [
    'adminEmail' => 'admin@example.com',
    'title'      => 'Vendoxi | Admin Panel',
    'copyright'  =>	'2014 &copy; Vendoxi Corp.',
    
	/*----------------------------------------------------------------------
	 * Metronic Theme Configs
	 * 
	 * Metronic nav Profile Menu
	 * Used On MetronicNavWidget from Metronic Theme Only
	 * 
	 * @see http://www.yiiframework.com/doc-2.0/yii-bootstrap-nav.html#$items-detail
	 * [ur=>route, label=>Link label content]
	 * 
	 * ---------------------------------------------------------------------
	 */
	 'MetronicNavMenu' => [
	 	['url'=>'site/user/profile','label'=>'<i class="fa fa-user"></i> My Profile'],
	 	['url'=>'site/user/calendar','label'=>'<i class="fa fa-calendar"></i> My Calendar'],
	 	['url'=>'site/user/inbox','label'=>'<i class="fa fa-envelope"></i> My Inbox'],
	 	['url'=>'site/user/tasks','label'=>'<i class="fa fa-tasks"></i> My Tasks'],
	 	'---', //Menu Divider
	 	['url'=>'site/user/lock','label'=>'<i class="fa fa-lock"></i> Lock Screen'],
	 	['url'=>'auth/user/logout','label'=>'<i class="fa fa-key"></i> Log Out','linkOptions' => ['data-method' => 'post']],
	 ],
];
