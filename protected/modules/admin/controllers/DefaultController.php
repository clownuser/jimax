<?php

class DefaultController extends Controller
{
      //  public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations

        );
    }
    
    public function accessRules() {
        return array(
           
           
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create',),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index','admin','update','delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
	public function actionIndex()
	{
		$this->render('index');
	}
}