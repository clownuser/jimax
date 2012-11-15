<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	
);
?>

<h1>Create News</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>