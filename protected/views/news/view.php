<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create'),'visible' => !Yii::app()->user->isGuest),
	
);

?>

<h1><?php echo CHtml::encode($model->name); ?></h1>

<?php 
//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		
//		'name',
//		'body',
//		'putdate',
//		'url',
//		'urltext',
//		'urlpic',
//		
//	),
//)); 
?>
<?php  //print_r($model->com->name); 
 
?>

<?php $this->renderPartial('_full', array('data' => $model, ));?>
<?php  $this->renderPartial('comment/_form', array('model' => $model2,'nid'=>$model ));?>

<?php

$this->widget('ext.com.MCom', array('news_id' => $model->news_id));
?>