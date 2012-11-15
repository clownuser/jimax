<?php

/**
 * This is the model class for table "tbl_system_menu".
 *
 * The followings are the available columns in table 'tbl_system_menu':
 * @property integer $id_catalog
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $modrewrite
 * @property integer $pos
 * @property string $hide
 * @property integer $id_parent
 *
 * The followings are the available model relations:
 * @property TblMenuParagraph[] $tblMenuParagraphs
 * @property TblSystemImage[] $tblSystemImages
 * @property TblSystemMenuPosition[] $tblSystemMenuPositions
 */
class System_menu extends CActiveRecord {
   
    const LIK='link';
    const CATEGORY='category';
    const ARTICLE = 'article';
    public $type;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return System_menu the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function beforeValidate() {


        if ($this->id_parent == '') {
            $this->id_parent = 0;
        }
        return parent::beforeValidate();
    }

    public function getMenuType() {
        return array('link' => self::LIK, 'category' => self::CATEGORY, 'article' => self::ARTICLE);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_system_menu';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, description, keywords, modrewrite', 'required'),
            array('pos, id_parent', 'numerical', 'integerOnly' => true),
            array('hide', 'length', 'max' => 4),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_catalog, name, description, keywords, modrewrite, pos, hide, id_parent', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tblMenuParagraphs' => array(self::HAS_MANY, 'TblMenuParagraph', 'id_catalog'),
            'tblSystemImages' => array(self::HAS_MANY, 'TblSystemImage', 'id_catalog'),
            'tblSystemMenuPositions' => array(self::HAS_MANY, 'TblSystemMenuPosition', 'id_catalog'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_catalog' => 'Id Catalog',
            'name' => 'Name',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'modrewrite' => 'Modrewrite',
            'pos' => 'Pos',
            'hide' => 'Hide',
            'id_parent' => 'Id Parent',
            'type' => 'type',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_catalog', $this->id_catalog);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('keywords', $this->keywords, true);
        $criteria->compare('modrewrite', $this->modrewrite, true);
        $criteria->compare('pos', $this->pos);
        $criteria->compare('hide', $this->hide, true);
        $criteria->compare('id_parent', $this->id_parent);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function findParentName($id) {

        $row = $this->findByAttributes(array('id_parent' => $id));
        if ($row != null)
            return $row->name;
        else
            return false;
    }

    /*
     * @id default null
     * retrun @array
     */

    public function findAllMenu($id=null) {
        if ($id != null)
            $rows = $this->findAll('id_catalog!=:id_catalog', array('id_catalog' => $id));
        else
            $rows = $this->findAll('id_catalog');

        $array = CHtml::listData($rows, 'id_catalog', 'name');

       



        return $array;
    }

    public function findHideOption($id) {
        $row = $this->findByAttributes(array('id_parent' => $id));
        if ($row != null)
            return $row->hide;
        else
            return false;
    }

    public function changeHideStatus($id, $show) {
        if ($show == "no")
            $this->updateByPk($id, array('hide' => 'hide'));
        else {
            $this->updateByPk($id, array('hide' => 'show'));
        }
    }

    /**
     * Find position
     * @param int $id
     * @return array 
     */
    public function findMaxPosition($id=0) {

        $cretrria = new CDbCriteria();
        $cretrria->select = 'pos';
        $cretrria->order = 'pos DESC';


        $this->setDbCriteria($cretrria);

        $rows = $this->find('id_parent=:id_catalog', array('id_catalog' => $id));
        if ($rows != null)
            return array('value' => $rows->pos + 1);
        else {
            return array('value' => 1);
        }
    }

    /**
     * update position
     * @param type $pos_id
     * @param type $param 
     */
    public function changePosition($id, $param='up') {

        $data = $this->findByPk($id, array('select' => array('id_parent', 'pos')));
        if ($param == 'up') {
            $row = $this->findByAttributes(array('id_parent' => $data->id_parent), 'pos=:p', array(':p' => $data->pos - 1));
            if ($row != null) {
                $this->updateByPk($row->id_catalog, array('pos' => $data->pos));
                $this->updateByPk($id, array('pos' => $row->pos));
            }
        } else {
            $row = $this->findByAttributes(array('id_parent' => $data->id_parent), 'pos=:p', array(':p' => $data->pos + 1));
            if ($row != null) {
                $this->updateByPk($row->id_catalog, array('pos' => $data->pos));
                $this->updateByPk($id, array('pos' => $row->pos));
            }
        }
    }

    public function checkPosition() {
        
    }

    /**
     * Menu parent and child
     * @param int $par
     * @return array 
     */
    private function recMenu($par, $limit=0) {
        $rows = $this->findall(array('condition' => "id_parent={$par} and hide='show'", 'order' => 'pos'));

        $array = array();

        foreach ($rows as $value) {


            if ($this->exists("id_parent={$value->id_catalog}")) {


                $array[] = array('label' => $value->name, 'url' => array("/" . $value->modrewrite), 'items' => $this->recMenu($value->id_catalog), $limit + 1);
            } else {
                $array[] = array('label' => $value->name, 'url' => array("/" . $value->modrewrite));
            }
        }

        return $array;
    }

    public function MenuList() {
        // array('label' => 'Home', 'url' => array('/site/index'))
        // $rows = $this->findall(array('condition' => "id_parent=0", 'order' => 'pos'));


        $array[] = array('label' => 'Home', 'url' => array('/site/index'));

        $data = $this->recMenu(0);
        foreach ($data as $menu) {
            $array[] = $menu;
        }


        $array[] = array('label' => 'Admin', 'url' => array('/admin/default'), 'visible' => !Yii::app()->user->isGuest);

        $array[] = array('label' => 'Contact', 'url' => array('/site/contact'));
        $array[] = array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest);
        $array[] = array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest);


        return $array;
    }

}