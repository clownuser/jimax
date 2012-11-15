<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clouds
 *
 * @author user
 */
Yii::import('zii.widgets.CPortlet');
class Clouds extends CPortlet {
    //put your code here
     public $title='Tags';
    public $maxTags=20;
 
    protected function renderContent()
    {
        $tags=Tag::model()->findTagWeights($this->maxTags);
        
        foreach($tags as $tag=>$weight)
        {
            
            $link=CHtml::link(CHtml::encode($tag), array('news/index','tag'=>$tag));
            echo CHtml::tag('span', array(
                'class'=>'tag',
                'style'=>"font-size:{$weight}pt;",
            ), $link)."\n";
                
        }
       
    }
}

?>
