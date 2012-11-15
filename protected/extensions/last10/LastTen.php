<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LastTen
 *
 * @author user
 */
class LastTen extends CWidget {

    //put your code here
    public $name;
    private $model;
    public $order ='putdate';
    public $hide ='show' ;
    public $limit=10;

    public function init() {
        try {
        $this->model = new $this->name;
        }
        catch(Exception $e) {
            throw new CException('Wrong Model Class');
        }
    }

    public function run() {
        $rows  =$this->selectLastTen();
        $this->render('index',array('rows'=>$rows,'name'=>$this->name));
    }

    public function selectLastTen() {
      
       $rows = $this->model->findAll(array(
            'order'=>$this->order,
           'limit'=>$this->limit,
            'condition'=>'hide=:hide',
            'params'=>array(':hide'=>$this->hide),

            ));
            return $rows;
        
    }

}

?>
