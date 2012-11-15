<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	CHtml::encode(Yii::t('site','contact')),
);
?>

<h3><?php echo CHtml::encode(Yii::t('site','contact'))?></h3>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>



<div class="span5 well">
    

    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo CHtml::encode(Yii::t('site','fieldneed')) ;?><span class="required">*</span></p>

	<?php // echo $form->errorSummary($model); ?>

	<div class="span3">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="span4">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="span3">
		<?php echo CHtml::submitButton(CHtml::encode(Yii::t('site','submit'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>