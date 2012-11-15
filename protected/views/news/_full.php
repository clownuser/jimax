

<div class="view">


	
<ul class="thumbnails">
    <li class="span3">
        <a href="#" class="thumbnail">
	
	<?php
       
        echo CHtml::image(Yii::app()->baseUrl."/images/news/".$data->urlpic, $data->urlpic) ;
        ?>
                 </a>
    </li>
</ul>
    
	<br />
        <?php echo $data->body; ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('putdate')); ?>:</b>
	<?php echo CHtml::encode($data->putdate); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('urltext')); ?>:</b>
	<?php // echo CHtml::encode(Yii::app()->baseUrl."/".$data->url); ?>
	<br />

	


<?php echo CHtml::link(CHtml::encode(Yii::t('site','news')), array('index'),array('class' => 'btn')); ?>
</div>
<br/>

<div class="vote">
<?php echo CHtml::image(Yii::app()->baseUrl."/images/down.png"); ?>
<?php echo CHtml::ajaxLink(CHtml::encode($data->minus), array('news/vote/id/'.$data->news_id.'/t/down'),array('update' => '#m'),array('id'=>'m')); ?>
<?php echo CHtml::image(Yii::app()->baseUrl."/images/up.png"); ?>
<?php echo CHtml::ajaxLink(CHtml::encode($data->plus ), array('news/vote/id/'.$data->news_id.'/t/up'),array('update' => '#p'),array('id'=>'p')); ?>
</div>

<?php // $this->renderPartial('//sos/_sos') ; ?>

