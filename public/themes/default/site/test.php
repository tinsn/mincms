<?php
use yii\helpers\Html;
css("img {margin-right:10px;margin-bottom:10px;}");
?> 

<?php //echo $row;?>
<?php // echo $pages;?>
<div id="play"></div>
<?php echo widget('jwplayer',array(
	'tag'=>'play',
	'file'=>base_url().'upload/1.mp4',
));?>	
<hr>
<div id="ckplayer"></div>
<?php echo widget('ckplayer',array(
	'tag'=>'ckplayer',
	'file'=>base_url().'upload/1.mp4',
));?>	
<hr>
<input id='datepicker'>
<?php widget('datepicker',array('tag'=>'#datepicker'));?>
	
	
<div id="map" style="width:300px;height:300px;"></div>
<?php widget('gmap',array(
	'tag'=>'map',
	'address'=>'上海',	
));?>


<!--<textarea id='jqte' style="width:300px;"></textarea>-->
<?php //widget('jqte',array('tag'=>'#jqte'));?>	
	
	
<div id="galleria" style="width:600px;height:400px;">
	<?php for($i=1;$i<5;$i++){ $f = 't/'.$i.'.jpg';   ?>
    <a href="<?php echo image_url($f,array('resize'=>array(600,400,true,true)));?>"><img src="<?php echo image_url($f,array('resize'=>array(300,200)));?>"     
    	data-big="<?php echo image_url($f,array('resize'=>array(600,400)));?>" data-title="My title 1" data-description="My description 1"></a>
    <?php }?>
</div>
<?php widget('gallery',array(
	'tag'=>'#galleria',
	'theme'=>'twelve',// classic , azur ,dots,fullscreen,twelve
));
?> 
 

<h3><?php echo __('cart test');?></h3>
<hr>

<?php echo module_widget('cart','ajax');?>
 <div class="row-fluid pricing-table pricing-three-column" style="margin: 0;">
    <?php 
foreach($cart_test as $t){
?>
        <div class="span4 plan"> 
            <h2><?php echo image($t['file'],1,array('class'=>'img-rounded')); ?><?php echo $t['name']; ?></h2>  
          <ul>
            <li class="plan-feature"><?php echo $t['price'];?></li> 
            <li class="plan-feature">
             
    			 <?php echo module_widget('cart','add',array(
    					'id'=>$t['id'],
    					'slug'=>'default',
    					'price'=>$t['price']
    				));?> 
    		  </li>
          </ul>
        </div>
    	
<?php } ?>    
</div>
<h3><?php echo __('input select');?></h3>
<hr>
<?php echo $this->render('input');?>
	
	
 



<?php 

css("
.cart_has{width:100px;}
.pricing-table .plan {
  border-radius: 5px;
  text-align: center;
  background-color: #f3f3f3;
  -moz-box-shadow: 0 0 6px 2px #b0b2ab;
  -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
  box-shadow: 0 0 6px 2px #b0b2ab;
}
 
 .plan:hover {
  background-color: #fff;
  -moz-box-shadow: 0 0 12px 3px #b0b2ab;
  -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
  box-shadow: 0 0 12px 3px #b0b2ab;
}
 
 .plan {
  padding: 20px;
  color: #ff;
  background-color: #5e5f59;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
  
.plan-name-bronze {
  padding: 20px;
  color: #fff;
  background-color: #665D1E;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
 }
  
.plan-name-silver {
  padding: 20px;
  color: #fff;
  background-color: #C0C0C0;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
 }
  
.plan-name-gold {
  padding: 20px;
  color: #fff;
  background-color: #FFD700;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
  } 
  
.pricing-table-bronze  {
  padding: 20px;
  color: #fff;
  background-color: #f89406;
  -moz-border-radius: 5px 5px 0 0;
  -webkit-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
  
.pricing-table .plan .plan-name span {
  font-size: 20px;
}
 
.pricing-table .plan ul {
  list-style: none;
  margin: 0;
  -moz-border-radius: 0 0 5px 5px;
  -webkit-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px;
}
 
.pricing-table .plan ul li.plan-feature {
  padding: 15px 10px;
  border-top: 1px solid #c5c8c0;
}
 
.pricing-three-column {
  margin: 0 auto;
  width: 80%;
}
 
.pricing-variable-height .plan {
  float: none;
  margin-left: 2%;
  vertical-align: bottom;
  display: inline-block;
  zoom:1;
  *display:inline;
}
 
.plan-mouseover .plan-name {
  background-color: #4e9a06 !important;
}
 
.btn-plan-select {
  padding: 8px 25px;
  font-size: 18px;
}
");