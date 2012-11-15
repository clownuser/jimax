<?php
$this->breadcrumbs=array(
	'System Menus'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List System menu', 'url'=>array('index')),
	array('label'=>'Create System menu', 'url'=>array('create')),
	array('label'=>'Update System menu', 'url'=>array('update', 'id'=>$model->id_catalog)),
	array('label'=>'Delete System menu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_catalog),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage System menu', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_catalog',
		'name',
		'description',
		'keywords',
		'modrewrite',
		'pos',
		'hide',
		'id_parent',
	),
    'itemCssClass'=>array('well'),
)); ?>
