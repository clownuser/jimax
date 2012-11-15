<?php

/**
 * This is the model class for table "tbl_news".
 *
 * The followings are the available columns in table 'tbl_news':
 * @property integer $news_id
 * @property string $name
 * @property string $body
 * @property string $putdate
 * @property string $url
 * @property string $urltext
 * @property string $urlpic
 * @property string $hide
 */
class News extends CActiveRecord {

    public $file;
    private $_oldTags;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function beforeValidate() {


        $this->putdate = new CDbExpression('NOW()');
        $this->url = $this->getUrl();
        return parent::beforeValidate();
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, body, url, urltext ', 'required'),
            array('hide', 'length', 'max' => 4),
            array('name', 'length', 'max' => 123),
            array('putdate', 'safe'),
            array('file', 'file', 'types' => 'png'),
            array('tags', 'match', 'pattern' => '/^[\w\s,]+$/',
                'message' => 'only words  can be'),
            array('tags', 'normalizeTags'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('news_id, name, body, putdate, url, urltext, urlpic, hide', 'safe', 'on' => 'search'),
        );
    }

    public function normalizeTags($attribute, $params) {
        $this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }

    public function getUrl() {
        return Yii::app()->createUrl(Yii::app()->getHomeUrl()."/".Yii::app()->baseUrl, array(
                    'id' => $this->news_id,
                    'title' => $this->name,
                ));
    }

    protected function afterSave() {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
    }

    protected function afterFind() {
        parent::afterFind();
        $this->_oldTags = $this->tags;
    }

    protected function afterDelete() {
        parent::afterDelete();
       
        Tag::model()->updateFrequency($this->tags, '');
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
             'com'=>array(self::HAS_MANY, 'Comment', 'news_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'news_id' => 'News',
            'name' => 'Name',
            'body' => 'Body',
            'putdate' => 'Putdate',
            'url' => 'Url',
            'urltext' => 'Urltext',
            'urlpic' => 'Urlpic',
            'hide' => 'Hide',
            'plus' => 'Plus',
            'minus' => 'Minus',
            'tags' => 'Tags',
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

        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('putdate', $this->putdate, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('urltext', $this->urltext, true);
        $criteria->compare('urlpic', $this->urlpic, true);
        $criteria->compare('hide', $this->hide, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function showOptions() {
        return array("1" => "show", "2" => "hide");
    }

    public function handVote($id, $t) {

        return false;
    }

}