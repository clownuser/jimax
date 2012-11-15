<?php
$this->breadcrumbs=array(
	'System Menus',
);

$this->menu=array(
	array('label'=>'Create System menu', 'url'=>array('create')),
	array('label'=>'Manage System menu', 'url'=>array('admin')),
);
?>

<h1>Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'pagerCssClass'=>'pagination-centered',
)); ?>
