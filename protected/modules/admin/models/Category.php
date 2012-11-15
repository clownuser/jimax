<?php

/**
 * This is the model class for table "tbl_category".
 *
 * The followings are the available columns in table 'tbl_category':
 * @property integer $category_id
 * @property string $title
 * @property string $url
 * @property string $meta
 * @property integer $pos
 * @property string $hide
 * @property integer $parent_id
 */
class Category extends CActiveRecord {
    const SHOW='show';
    const HIDE='hide';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function beforeValidate() {


        if ($this->parent_id == '') {
            $this->parent_id = 0;
        }
        return parent::beforeValidate();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(' title, url, meta, pos, hide', 'required'),
            array('category_id, pos,parent_id', 'numerical', 'integerOnly' => true),
            array('hide', 'length', 'max' => 4),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('category_id, title, url, meta, pos, hide', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'title' => 'Title',
            'url' => 'Url',
            'meta' => 'Meta',
            'pos' => 'Pos',
            'hide' => 'Hide',
            'parent_id' => 'Parent',
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

        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('meta', $this->meta, true);
        $criteria->compare('pos', $this->pos);
        $criteria->compare('hide', $this->hide, true);
        $criteria->compare('parent_id', $this->parent_id, true);
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getTypes() {
        return array('show' => self::SHOW, 'hide' => self::HIDE);
    }

    public function getAllCategory($id) {
        $row = $this->findAll();

        if ($id != null)
            $rows = $this->findAll('category_id!=:category_id', array('category_id' => $id));
        else
            $rows = $this->findAll('category_id');

        $array = CHtml::listData($rows, 'category_id', 'title');





        return $array;
    }

    public function findMaxposition($id=0) {
        $cretrria = new CDbCriteria();
        $cretrria->select = 'pos';
        $cretrria->order = 'pos DESC';


        $this->setDbCriteria($cretrria);

        $rows = $this->find('parent_id=:id', array(':id' => $id));
        if ($rows != null)
            return array('value' => $rows->pos + 1);
        else {
            return array('value' => 1);
        }
    }

    public function findParentName($id) {
        $row = $this->findByPk($id);
        if ($row != null) {
            return $row->title;
        } else {
            return " ";
        }
    }

}