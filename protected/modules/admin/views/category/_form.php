<div class="form well">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'category-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
<?php echo $form->textField($model, 'title', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
<?php echo $form->textField($model, 'url', array('rows' => 6, 'cols' => 50)); ?>
<?php echo $form->error($model, 'url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'meta'); ?>
<?php echo $form->textField($model, 'meta', array('rows' => 6, 'cols' => 50,)); ?>
    <?php echo $form->error($model, 'meta'); ?>
    </div>
     <div class="row">
 <?php echo $form->labelEx($model, 'pos'); ?>
    <?php
    if ($model->isNewRecord) {
        echo $form->textField($model, 'pos', $model->findMaxPosition());
    } else {
        echo $form->textField($model, 'pos');
    }
    ?>
     </div>  

    <div class="row">
        <?php echo $form->labelEx($model, 'hide'); ?>
<?php echo $form->dropDownList($model, 'hide', $model->getTypes(), array('prompt' => 'Select Type')); ?>
<?php echo $form->error($model, 'hide'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
<?php echo $form->dropDownList($model, 'parent_id', $model->getAllCategory($model->category_id), array('prompt' => 'Select parent')); ?>
<?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->