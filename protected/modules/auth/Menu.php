<?php 
namespace app\modules\auth; 
class Menu
{
	static function add(){
		$menu['auth'] = array( 
			'user'=>array('auth/user/index'),
			'user group'=>array('auth/group/index'),  
		//	'auth'=>array('auth/auth/index'), 
		);
		return $menu;
	}
}