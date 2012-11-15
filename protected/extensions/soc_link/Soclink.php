<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Soclink
 *
 * @author user
 */
class Soclink extends CWidget {
    //put your code here
    
    public function init() {
//       $assetsDir = dirname(__FILE__) . '/assets';
//            $cs = Yii::app()->getClientScript();
//            $cs->registerCoreScript("jquery");
//// Publishing and registering JavaScript file
//            $cs->registerScriptFile(
//                    Yii::app()->assetManager->publish(
//                            $assetsDir . '/facebook_events.js'
//                    ), CClientScript::POS_END
//            );
//// Publishing and registering CSS file
//            $cs->registerCssFile(
//                    Yii::app()->assetManager->publish(
//                            $assetsDir . '/facebook_events.css'
//                    )
//            );
//// Publishing image. publish returns the actual URL
//// asset can be accessed with
//            $this->loadingImageUrl = Yii::app()->assetManager->publish(
//                            $assetsDir . '/ajax-loader.gif'
//            );
    }
    
    public function run() {
        $this->render("_sos");
    }
}

?>
