<?php

class SearchController extends Controller {

//$this->layout = 'column2';
    private $_indexFiles = 'runtime.search';

    public function init() {
       Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        parent::init();
    }

    public function actionIndex() {
        // echo  Yii::getPathOfAlias('application.' . $this->_indexFiles);

        if (($term = Yii::app()->getRequest()->getParam('s'))) {
            
            $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding("UTF-8");
            $results = $index->find($term);
            $query = Zend_Search_Lucene_Search_QueryParser::parse($term);
            $dataProvider = new CArrayDataProvider($results, array(
                        'pagination' => array(
                            'pageSize' => 1,
                            'params'=>array('s'=>$term),
                        ),
                    ));
            
            
            $this->render('search', array('results' => $results, 'term' => $term, 'query' => $query, 'data' => $dataProvider));
        } else {
            $this->redirect(array('site/index'));
        }
    }

    public function actionCreate() {
        $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);
        

        $posts = News::model()->findAll();
        foreach ($posts as $post) {
            $doc = new Zend_Search_Lucene_Document();

            $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($post->name), 'utf-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('link', CHtml::encode($post->url)
                            , 'utf-8')
            );

            $doc->addField(Zend_Search_Lucene_Field::Text('content', CHtml::encode($post->body)
                            , 'utf-8')
            );


            $index->addDocument($doc);
        }
        $index->commit();
        echo 'Lucene index created';
        $this->redirect(array('site/index'));
    }

    public function actionSearch() {
        
    }
    
    public function actionAdvance(){
        
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}