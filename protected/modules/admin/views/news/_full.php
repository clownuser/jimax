

<div class="view">
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
	<?php echo CHtml::encode($this->r()); ?>
	<br />

	


<?php echo CHtml::link(CHtml::encode("News"), array('index')); ?>
</div>


<div class="vote">
<?php echo CHtml::image(Yii::app()->baseUrl."/images/down.png"); ?>
<?php echo CHtml::ajaxLink(CHtml::encode($data->minus), array('news/vote/id/'.$data->news_id.'/t/down'),array('update' => '#m'),array('id'=>'m')); ?>
<?php echo CHtml::image(Yii::app()->baseUrl."/images/up.png"); ?>
<?php echo CHtml::ajaxLink(CHtml::encode($data->plus ), array('news/vote/id/'.$data->news_id.'/t/up'),array('update' => '#p'),array('id'=>'p')); ?>
</div>



