<?php
$this->breadcrumbs=array(
	'System Menus'=>array('index'),
	$model->name=>array('view','id'=>$model->id_catalog),
	'Update',
);

$this->menu=array(
	array('label'=>'List System_menu', 'url'=>array('index')),
	array('label'=>'Create System_menu', 'url'=>array('create')),
	array('label'=>'View System_menu', 'url'=>array('view', 'id'=>$model->id_catalog)),
	array('label'=>'Manage System_menu', 'url'=>array('admin')),
);
?>

<h1>Update Menu <?php echo $model->id_catalog; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>