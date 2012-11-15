<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap-responsive.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vote.css" />

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?> 

        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/mysite.js"); ?>

        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/ckeditor/ckeditor_basic.js"); ?>

        <?php  // Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/bootstrap/js/bootstrap.js"); ?>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
<?php $this->widget('bootstrap.widgets.BootNavbar', array(
    'fixed'=>true,
    'brand'=>CHtml::link(CHtml::encode(Yii::app()->name), array('/site/index/'), array('class' => 'brand')),
    'brandUrl'=>'#',
    
    
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'items'=>System_menu::model()->MenuList(),
        ),
        '',
        array(
            'class'=>'bootstrap.widgets.BootMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Info', 'url'=>'#'),
                '---',
                array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                    
                    '-----------',
                )),
            ),
        ),
    ),
)); ?>
        </div>
        

       
        
        <div class=""><?php // $this->widget('ext.lang.LanguageSelector');  ?></div>



        <div class="container-fluid">

            





<?php echo $content; ?>
        </div>


        <div class="container">

            <p><?php echo Yii::powered(); ?></p>


        </div>



    </body>
</html>
