<div class="span6 well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    
)); ?>
   

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="span4">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="span4">
		<?php echo $form->labelEx($model,'Text'); ?>
		<?php echo $form->textArea($model,'body',array( 'cols'=>'130','rows'=>'20','class'=>'ckeditor')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	

	<div class="span4">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="span4">
		<?php echo $form->labelEx($model,'urltext'); ?>
		<?php echo $form->textField($model,'urltext',array('size'=>50)); ?>
		<?php echo $form->error($model,'urltext'); ?>
	</div>

	<div class="span4">
            <?php echo "Picture name:"; ?>
		<?php echo CHtml::encode($model->urlpic); ?>
		<?php echo $form->fileField($model,'file'); ?>
		<?php echo $form->error($model,'file'); ?>
               
	</div>

	<div class="span4">
            <?php echo $form->dropDownList($model,'hide', $model->showOptions()); ?>
		
	</div>
       
        <div class="span4">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>150)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="span4 buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->