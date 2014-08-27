<?php

/**
 * Auth Setup
 * Instala roles y permisos del modulo  por default.
 * @author javierlog08
 * @link javierlog08@gmail.com
 * 
 */
namespace app\modules\auth;

class AuthSetup extends \common\components\ModuleSetupBase
{
	protected function permissions() {
		
		return $p = [
			'createUser'		=>	'Allow User Creation',
			'editUser'			=>	'Allow user Edit',
			'banUser'			=>	'Allow user Ban',
			'unbanUser'			=>	'Allow user Unban',
			'createRole'		=>	'Allow role Creation',
			'editRole'			=>	'Allow role Edit',
			'deleteRole'		=>	'Allow role Delete',
			'createPermission'	=>	'Allow permission Create',
			'deletePermission'	=>	'Allow permission Delete',
		];
	}
	
	protected function roles() {
		return $r = [
			'admin'=> [
				'createUser',
				'editUser',
				'banUser',
				'unbanUser',
				'createRole',
				'editRole',
				'deleteRole',
				'createPermission',
				'deletePermission',
			]
		];
	}

}
