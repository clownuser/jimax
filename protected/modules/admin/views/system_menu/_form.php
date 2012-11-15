<div class="form span6 well">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'system-menu-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="span4">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="span4">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="span4">
        <?php echo $form->labelEx($model, 'keywords'); ?>
        <?php echo $form->textArea($model, 'keywords', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'keywords'); ?>
    </div>

    <div class="span4">
        <?php echo $form->labelEx($model, 'modrewrite'); ?>
        <?php echo $form->textArea($model, 'modrewrite', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'modrewrite'); ?>
    </div>

    <div class="span4">
        <?php echo $form->labelEx($model, 'pos'); ?>

        <?php
        if ($model->isNewRecord) {
            echo $form->textField($model, 'pos', $model->findMaxPosition());
        } else {
            echo $form->textField($model, 'pos');
        }
        ?>
        <?php echo $form->error($model, 'pos'); ?>
    </div>

    <div class="span4">
        <?php echo $form->labelEx($model, 'hide'); ?>
        <?php echo $form->dropDownList($model, 'hide', array('show' => 'show', 'hide' => 'hide')); ?>
        <?php echo $form->error($model, 'hide'); ?>
    </div>
    
    <div class="span4">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->dropDownList($model, 'type', $model->getMenuType(), array('prompt'=>'Select Type')); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="span4">
        <?php echo $form->labelEx($model, 'Parent Category'); ?>
        <?php echo $form->dropDownList($model, 'id_parent', $model->findAllMenu($model->id_catalog), array('prompt'=>'Select Menu')); ?>
        <?php echo $form->error($model, 'id_parent'); ?>
    </div>

    <div class="span4 buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->