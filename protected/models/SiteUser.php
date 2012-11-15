<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteUser
 *
 * @author user
 */
//Yii::import('application.modules.admin.models.User');
class SiteUser extends CFormModel {

  

    public $verifyCode;

    /**
     * Declares the validation rules.
     */
    public function rules() {
       
        return array(
            
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
      
        return array(
            'verifyCode' => 'Verification Code',
        );
    }

}

?>
