<?php
$this->breadcrumbs=array(
	'System Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List System_menu', 'url'=>array('index')),
	array('label'=>'Manage System_menu', 'url'=>array('admin')),
);
?>

<h1>Create Menu</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>