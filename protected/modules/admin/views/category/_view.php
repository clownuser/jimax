<div class="view well">

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	

	
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('pos')); ?>:</b>
	<?php echo CHtml::encode($data->pos); ?>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('hide')); ?>:</b>
	<?php echo CHtml::encode($data->hide); ?>
	
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->findParentName($data->parent_id)); ?>
        
	<?php echo CHtml::link(CHtml::encode("Change"), array('update', 'id'=>$data->category_id)); ?>
	


</div>