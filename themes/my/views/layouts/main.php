<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap-responsive.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vote.css" />

        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?> 
         <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/menu/jquery.dcmegamenu.1.3.4.min.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/menu/jquery.hoverIntent.minified.js"); ?>

        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/mysite.js"); ?>

        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/js/ckeditor/ckeditor_basic.js"); ?>
       
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/bootstrap/js/bootstrap.js"); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
    </head>

    <body>





        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">

                <div class="container-fluid">
   
                    <div class="nav-collapse">
                        <?php echo CHtml::link(CHtml::encode(Yii::app()->name), array('/site/index/'), array('class' => 'brand')); ?>

                        <?php
//                        $this->widget('zii.widgets.CMenu', array(
//                            //$menu;
//                            'items' => array(
//                                array('label' => 'Home', 'url' => array('/site/index')),
//                                array('label'=>'Admin', 'url'=>array('/admin/default'),'visible'=>!Yii::app()->user->isGuest),
//
//                                array('label' => 'News', 'url' => array('/news/index')),
//                                array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
//                                array('label' => 'Contact', 'url' => array('/site/contact')),
//                                array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
//                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
//                            ),
//                            'itemCssClass'=>'nav',
//                        ));
                        $this->widget('zii.widgets.CMenu', array(
                            'id'=>'mega-menu-1',
                            'items' => System_menu::model()->MenuList(),
                            'itemCssClass' => 'active btn-mini   ',
                           // 'itemTemplate' => '{menu}<b class="caret"></b>',
                           // 'urlOption' => "dropdown",
                          //  'submenuHtmlOptions' => array('class' => 'sub'),
                           // 'htmlOptions' => array('id' => 'mega-menu-1'),
                           // 'urlClass' => '',
                        ));
                        ?>
  
                        <?php
                        // if(!empty($this->clips['menu'])) 
                     //   echo $this->clips['nav'];
                        ?>


                    </div>
                    
                </div>
   
            </div>
            
        </div>
                    <div class=""><?php // $this->widget('ext.lang.LanguageSelector');?></div>

        <div class="container-fluid">

            <!-- mainmenu -->
            <!-- breadcrumbs -->
            
          
            
  
            
            <?php echo $content; ?>
        </div>


        <div class="container">

            <p><?php echo Yii::powered(); ?></p>


        </div>



    </body>
</html>
