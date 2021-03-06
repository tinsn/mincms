<?php namespace app\core;
/**
*  all admin controllers should be exnteds this controller
* 
* @author Sun < mincms@outlook.com >
*/ 
class AuthController extends Controller
{ 
	private $supperUsers = array(1);
	public $allowAccess = array();
	public $theme = 'admin';
	public $full_action;
	function init(){
		parent::init(); 
	 	language('language_');  
	 	if(\Yii::$app->user->isGuest){ 
			flash('error',__('login first'));   
			header('Location: '.url('auth/open/login'));  
			exit;
		}     
		/*
		* load modules 
		* 加载模块
		*/
		if(!cache_pre('all_modules'))
			\app\core\Modules::load();  
	  
	}
	/**
	* request 前
	*/
	function beforeAction($action){  
		parent::beforeAction($action);   
		if(\Yii::$app->user->isGuest){ 
			exit;
		}
		//判断用户是否有权限
		$url = $action->controller->id.'.'.$action->controller->action->id;
		$module = $action->controller->module->id; 
		if($module && $module!=$action->id)
			$url = $module.'.'.$url; 
		//所当前的URL 传入判断权限   
		$this->full_action = $url;
		$this->checkUserAccess($url);    
		return true;
	}
	/**
    * check access
    */
    protected function checkUserAccess($action_id){  
    	$uid = \Yii::$app->user->identity->id;//当前用户ID
     
    	if(in_array($uid,$this->supperUsers)) return true; 
    	if(is_array($this->allowAccess) && in_array($action_id,$this->allowAccess)) return; 
    	$access = \app\modules\auth\models\User::access($uid);  
    	if(!$access || !in_array($action_id,$access)){
    	  	throw new \yii\base\HttpException(403,__('access deny'));
    	}
    	
    }

	 
}
