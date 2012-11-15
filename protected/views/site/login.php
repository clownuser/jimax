<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	CHtml::encode(Yii::t('site','enter')),
);
?>

<h3><?php echo CHtml::encode(Yii::t('site','enter'))?></h3>



<div class="span5 well">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
            
	),
    'htmlOptions'=>array('class'=>''),
)); ?>

	<p class="note"><?php echo CHtml::encode(Yii::t('site','fieldneed')) ;?><span class="required">*</span></p>

	<div class="span3">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			
		</p>
	</div>

	<div class="span3 rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="span3 buttons">
		<?php echo CHtml::submitButton(CHtml::encode(Yii::t('site','enter')),array('class'=>'btn')); ?>
	</div>
<br/>
<?php $this->endWidget(); ?>
        <div class="span3 ">
        <?php echo CHtml::link(CHtml::encode(Yii::t('site','register')), array('user/register/')) ?><br/>
<?php echo CHtml::link(CHtml::encode(Yii::t('site','forgot')), array('user/restore/')) ?>
</div>
</div><!-- form -->

