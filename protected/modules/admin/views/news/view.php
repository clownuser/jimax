<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->news_id)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->news_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
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


<?php $this->renderPartial('_full', array('data' => $model, ))?>