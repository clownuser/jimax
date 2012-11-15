<?php

$this->breadcrumbs = array(
    CHtml::encode(Yii::t('site','news')),
);

$this->menu = array(
    array('label' => Yii::t('site','create'), 'url' => array('create'), 'visible' => !Yii::app()->user->isGuest),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
if(Yii::app()->user->hasFlash('news'))
   // echo Yii::app()->user->getFlash('news');
?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<h3><?php echo CHtml::encode(Yii::t('site','news')) ;?></h3>
<?php if(!empty($_GET['tag'])): ?>
<h4><?php echo CHtml::encode(Yii::t('site','tags')) ;?><i><?php echo CHtml::encode($_GET['tag']); ?></i></h4>
<?php endif; ?>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
   'pagerCssClass'=>'pagination-centered',
));
?>






