<div class="form well">
<h3><?php echo CHtml::encode(Yii::t('site','add_comment')) ;?></h3><br/>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>false,
)); ?>

	
        <?php if(Yii::app()->user->isGuest): ?>
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <?php endif; ?>
	<div class="row">
		<?php echo $form->labelEx($model,'post'); ?>
		<?php echo $form->textArea($model,'post',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'post'); ?>
	</div>

	


	<div class="row">
		
		<?php echo $form->hiddenField($model,'news_id',array('value'=>$nid->news_id)); ?>
		
	</div>

	


	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? CHtml::encode(Yii::t('site','submit')) : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->