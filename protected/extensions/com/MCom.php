<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MCom
 *
 * @author user
 */
class MCom extends CWidget {

    public $news_id;
    public $page = 5;
    public $order='date DESC';
    private $dataProvider;

    public function init() {
        $creteria = new CDbCriteria(array(
                    'condition' => 'news_id=:nid',
                     'params'=>array(':nid' => $this->news_id),
            'order'=>$this->order,
                ));
       
        $this->dataProvider = new CActiveDataProvider('Comment', array(
                    'criteria' =>$creteria ,
                    
                    'pagination' => array(
                        'pageSize' => $this->page,
                    )
                ));
    }

    public function run() {
        $this->render('index', array('dataProvider' => $this->dataProvider));
    }

}

?>
