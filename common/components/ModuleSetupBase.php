<?php

namespace common\components;
use Yii;
use yii\base\Component;
use yii\helpers\VarDumper;
abstract class ModuleSetupBase {
	
	/**
	 * El primer methodo que sera ejecutado por el instalador de la aplicación
	 */
	public function init(){
		$this->run();
	}	
	
	/**
	 * Debe regresar un array con los permisos de la aplicacion en el siguiente orden
	 * Array = [
	 *    "nombreDelPermiso" => "Descripcion del permiso"
	 *    "nombreDelPermiso" => "Descripcion del permiso"
	 * ]
	 * @return Array con los permisos
	 */
	abstract protected function permissions();
	
	
	/**
	 * Debe Regresar el nombre de los roles con los permisos deseados
	 * Array = [
	 *    ["NombreRole1 => 
	 *      [
	 *       "Permiso1",
	 *       "Permiso2",
	 *       "Permiso3"
	 *      ] 
	 *    ]
	 *    ["NombreRole2 => 
	 *      [
	 *       "Permiso1",
	 *       "Permiso2",
	 *       "Permiso3"
	 *      ] 
	 *    ]
	 * ]
	 * 
	 * Nota: Agregar los permisos puede ser opcional. Puede hacerse desde el Modulo de Administracion instalado en la aplicacion
	 * @return Array con los permisos
	 */
	abstract protected function roles();
	
	
	private function run() {
		$auth = Yii::$app->authManager;
		$permissions = $this->permissions();
		$roles = $this->roles();
		
		
		foreach($permissions as $name=>$desc )
			$this->createPermission($name,$desc);

		foreach($roles as $role=>$permissions)
			$this->createRole($role,$permissions);
	}
	
	private function createPermission($name,$desc = '') {
		$auth = Yii::$app->authManager;
		if(!$auth->getPermission($name)) {
			$p = $auth->createPermission($name);
	    	$p->description = $desc;
	    	$auth->add($p);
		}
		
	}
	
	private function createRole($name,$permissions) {
		$auth = Yii::$app->authManager;
		if($auth->getRole($name))
			$r =  $auth->getRole($name);
		else {
			$r = $auth->createRole($name);
			$auth->add($r);
		}

		foreach($permissions as $p) {
			if( !$auth->hasChild($r,$auth->getPermission($p)) )
				$auth->addChild($r, $auth->getPermission($p));
		}
   
	}
}
