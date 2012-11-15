<div class="span5 well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="span4">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="span4">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
         <div class="span4">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>
	<div class="span4">
		<?php echo $form->labelEx($model,'mail'); ?>
		<?php echo $form->textField($model,'mail',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mail'); ?>
	</div>

	
       <?php if(CCaptcha::checkRequirements()): ?>
	<div class="span4">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	

	<div class="span4 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? CHtml::encode(Yii::t('site','register')) : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->