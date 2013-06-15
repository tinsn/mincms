<?php namespace app\modules\content\widget\relation;  
use app\modules\content\Classes;
use yii\helpers\Html;
use app\core\Arr;
use app\core\DB;
/**
* 
* @author Sun < mincms@outlook.com >
*/
class Widget extends \app\modules\content\Widget
{  
	public $theme;	
	/***
	* when content type choice relation
	*/
  	static function content_type(){  
  		$arr = Classes::table_columns();  
  		$id = $_GET['id'];  
  		$str = '<div class="control-group">';  
 		$str .= "<p class='controls'>".Html::dropDownList('Field[relate]',null,$arr['table'],
 			array('id'=>'Field_relate'))."</p>"; 
  	 	$str .= "</div>"; 
 		return $str; 
	}
 	static function node_type(){  
		 return 'int';
	}
	function run(){  
		$name = $this->name;   
 		$relate = $this->structure[$name]['relate'];
 		//contnet type
 		$values = array();
 		if(strpos($relate , 'node_') !== false){
 			$all = Classes::all($this->slug);
 			foreach($all as $v){  
 				$v = (array)$v;
 				$values[$v['id']] = Arr::first($v);
 			}
 		 
 		}
 		
 		echo $this->form->field($this->model,$name)->dropDownList($values); 
 		 
	}
}