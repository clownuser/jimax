

<div class="view">

	

	<h3><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo CHtml::encode($data->name); ?></h3>
	<br />

	
	<?php echo $data->body; ?>
	<br />

	

	
	<?php
       
        echo CHtml::image("images/news/".$data->urlpic, $data->urlpic,array('height'=>50, )) ;
        ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('putdate')); ?>:</b>
	<?php echo CHtml::encode($data->putdate); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('urltext')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	


<?php echo CHtml::link(CHtml::encode("Read more"), array('view', 'id'=>$data->news_id)); ?>
</div>
