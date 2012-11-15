<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LanguageSelector
 *
 * @author user
 */
class LanguageSelector extends CWidget
{
    public function run()
    {
        $currentLang = Yii::app()->language;
        $languages = Yii::app()->params->languages;
        $this->render('languageSelector', array('currentLang' => $currentLang, 'languages'=>$languages));
    }
}

?>
