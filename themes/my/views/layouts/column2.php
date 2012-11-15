
<?php $this->beginContent('//layouts/main'); ?>

<div class="row">
    
      

    <div class="span3">
      
        <div class="well"> 
         <h3><?php echo CHtml::encode(Yii::t('site','search'))?></h3>
         <?php echo   CHtml::beginForm(array('search/index/'), 'post',array('class'=>'search-form'));?>
             
         <?php  echo   CHtml::textField("s","",array('class'=>'search-query ')); ?>
          <?php  echo  CHtml::submitButton(CHtml::encode(Yii::t('site','search')),array('class'=>'btn btn-info')); ?>
          <?php echo CHtml::endForm(); ?>
       </div>
       
<?php $this->widget('ext.last10.LastTen', array('name' => 'News', 'limit' => 5)); ?>




    </div>



    <div class="span6">
        <ul class="breadcrumb">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?></ul>
<?php endif ?> 

        
<?php echo $content; ?>



    </div>





    <div class="span3">
         <div class="well">
   <?php  $this->widget('Clouds', array());?>

        </div>
<?php if(!Yii::app()->user->isGuest): ?>
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">::</li>
                <?php
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => Yii::t('site','operation'),
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'operations'),
                ));
                $this->endWidget();
                ?>
            </ul>
        </div><!-- sidebar -->
        <?php endif; ?>
<?php $this->renderPartial('//sos/em'); ?>

    </div>
</div>


<div class="alert">
    <a class="close" data-dismiss="alert">×</a>
    Beta test development
</div>


<?php $this->endContent(); ?>


