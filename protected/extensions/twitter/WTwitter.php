<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WTwitter
 *
 * @author user
 */
class WTwitter extends CWidget {
    //put your code here
    public $urlname;
    public $url;
    
    public function init() {
        
    }
    
    public function run() {
        $this->render('index');
    }
}
//https://twitter.com/#!/dtwdevelop
?>
