<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="cp">
    
    
    <div class="icon">
        <?php echo CHtml::image(Yii::app()->baseUrl."/images/cp/icon/Computer.png"); ?>
        <?php echo CHtml::link('System Manager', array('/admin/system')) ?>
    </div>
    <div class="icon">
        <?php echo CHtml::image(Yii::app()->baseUrl."/images/cp/icon/Pictures.png"); ?>
        <?php echo CHtml::link('Menu Manager', array('/admin/system_menu/')) ?>
    </div>
    
    <div class="icon">
        <?php echo CHtml::image(Yii::app()->baseUrl."/images/cp/icon/User.png"); ?>
        <?php echo CHtml::link('User Manager', array('/admin/user/admin/')) ?>
    </div>
    
    
    <div class="icon">
        <?php echo CHtml::image(Yii::app()->baseUrl."/images/cp/icon/Portfolio.png"); ?>
        <?php echo CHtml::link('Category Manager', array('/admin/category')) ?>
    </div>
    <div class="icon">
        <?php echo CHtml::image(Yii::app()->baseUrl."/images/cp/icon/Tag.png"); ?>
        <?php echo CHtml::link('News Manager', array('/admin/news/admin')) ?>
    </div>
</div>