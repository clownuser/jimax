<?php

class NewsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';
    public $uploaded = false;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
//            array(
//                'COutputCache',
//                'duration' => 100,
//                'varyByParam' => array('id'),
//            ),
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'test', 'vote'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create',),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('update'),
                'users' => array('moder'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','update', 'rbac'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {

        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */

    /**
     * Need change this future
     * @param type $model 
     */
    public function upload($model) {
// echo $dir2 = Yii::getPathOfAlias('application.images.news');

        $dir = Yii::app()->params->uploadImage;
        $file = CUploadedFile::getInstance($model, 'file');

        if ($model->validate()) {
            $model->urlpic = $file->getName();
            $file->saveAs($dir . '/' . $file->getName());
        }
    }

    public function actionCreate() {
        $model = new News;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            $this->upload($model);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->news_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            
            $this->upload($model);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->news_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {


        $dataProvider = new CActiveDataProvider('News', array(
                    'criteria' => array(
                        'condition' => 'hide="show"',
                    ),
                    'pagination' => array(
                        'pageSize' => 2,
                    ),
                ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function r() {
        $r = Yii::app()->request;
        $host = $r->hostInfo;
        return $re = $host . $r->requestUri;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRbac() {
        $auth = Yii::app()->authManager;
        $auth->createOperation('Create', 'create a post');
        $auth->createOperation('View', 'read a post');
        $auth->createOperation('Update', 'update a post');
        $auth->createOperation('Delete', 'delete a post');
        $bizRule = 'return isset($params["news"])&& $params["news"]->isUserInRole("admin");';
        $task = $auth->createTask('updateOwnNews', 'update a post by author himself', $bizRule);

        $task->addChild('Update');


        $role = $auth->createRole('reader');
        $role->addChild('View');

        $role = $auth->createRole('author');
        $role->addChild('reader');
        $role->addChild('Create');
        $role->addChild('updateOwnNews');

        $role = $auth->createRole('editor');
        $role->addChild('author');
        $role->addChild('Update');

        $role = $auth->createRole('admin');
        $role->addChild('editor');
        $role->addChild('author');
        $role->addChild('Delete');

        $auth->assign('reader', 'demo');
        $auth->assign('editor', 'moder');

        $auth->assign('admin', 'admin');
        echo "Done.";
    }

    public function actionTest() {
        $post = new stdClass();
        $post->authID = 'admin';
        echo "Current permissions:<br />";
        echo "<ul>";
        echo "<li>Create post: " . Yii::app()->user->checkAccess
                ('Create') . "</li>";
        echo "<li>Read post: " . Yii::app()->user->checkAccess
                ('View') . "</li>";
        echo "<li>Update post: " . Yii::app()->user->checkAccess
                ('Update', array('news' => $post)) . "</li>";
        echo "<li>Delete post: " . Yii::app()->user->checkAccess
                ('Delete') . "</li>";
        echo "</ul>";
    }

    public function actionVote() {
        if (Yii::app()->request->isAjaxRequest) {

            $t = Yii::app()->request->getQuery('t');
            $id = Yii::app()->request->getQuery('id');
            $model = News::model();
            $row = $model->findByPk($id);
            
                if ($t == 'up') {
                     $plus = $row->plus + 1;
                   // $plus = 0;
                    $model->updateByPk($id, array('plus' => $plus));


                    $this->renderPartial('vote', array('vote' => $plus));
                } else if ($t == 'down') {

                    $minus = $row->minus + 1;

                    $model->updateByPk($id, array('minus' => $minus));
                    $this->renderPartial('vote', array('vote' => $minus));
                }
            
            
        }
    }

}
