<?php
use yii\helpers\Html;
/**
 * @var yii\base\View $this
 */
 
$this->title = __('content');
$this->params['breadcrumbs'][] =  array('label'=>__('content'),'url'=>url('content/site/index'));  
$this->params['breadcrumbs'][] = __('list'); 
?>
<blockquote>
	<h3>
		<?php echo $this->title; ?> 
	</h3>
</blockquote>
	
<?php if(!$name){?>
<table class="table">
  <thead>
    <tr> 
      <th><?php echo __('name');?></th>
      <th><?php echo __('slug');?></th>
      <th><?php echo __('action');?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($types as $t){?>
    <tr> 
      <td><?php echo $t->name;?></td>
      <td><?php echo $t->slug;?></td>
      <td>
      	<?php echo Html::a('<i class="icon-plus-sign"></i>',url('content/node/create',array('name'=>$t->slug)));?>  
      	&nbsp;&nbsp;
      	<?php echo Html::a('<i class="icon-list-alt"></i>',url('content/node/index',array('name'=>$t->slug)));?>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php }else{?>
	 <?php echo Html::a('<i class="icon-plus-sign"></i>',url('content/node/create',array('name'=>$name)));?> 
	 <table class="table">
	  <thead>
	    <tr> 
	      <th><?php echo __('name');?></th>
	      <th><?php echo __('slug');?></th>
	      <th><?php echo __('action');?></th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach($models as $model){?>
	    <tr> 
	      <td><?php echo $model->title;?></td>
	      <td><?php echo $model->body;?></td>
	      <td>
	      	<?php echo Html::a('<i class="icon-edit"></i>',url('content/node/update',array('name'=>$name,'id'=>$model->id)));?>    
	      </td>
	    </tr>
	    <?php }?>
	  </tbody>
	</table>
	<div class='pagination'>
		<?php  echo \app\core\LinkPager::widget(array(
		      'pagination' => $pages,
		  ));?>
	</div>
<?php }?>
