<?php

/**
 * This is the model class for table "tbl_users".
 *
 * The followings are the available columns in table 'tbl_users':
 * @property integer $id
 * @property string $name
 * @property string $password
 * @property string $mail
 * @property string $active
 * @property string $last_visit
 * @property string $last_update
 * @property string $data_create
 * @property string $ban
 */
class User extends CActiveRecord {
    
    public $password_repeat;
    public $verifyCode;
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    
    


        /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('password', 'compare'),
            array('mail, name, password', 'required'),
            array('mail, name, password', 'length', 'max' => 50),
            array('mail, name', 'unique'),
            array('password_repeat, active, last_visit, last_update, data_create, ban', 'safe'),
            
                   array('verifyCode', 'captcha', 'allowEmpty' =>!Yii::app()->user->isGuest),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, password, mail, active, last_visit, last_update, data_create, ban', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'name' => Yii::t('site','name'),
            'password' => Yii::t('site','password'),
            'password_repeat'=>Yii::t('site','password_repeat'),
            'mail' => Yii::t('site','email'),
            'active' => 'Active',
            'last_visit' => 'Last Visit',
            'last_update' => 'Last Update',
            'data_create' => 'Data Create',
            'ban' => 'Ban',
            'verifyCode' => Yii::t('site','codesec'),
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

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('mail', $this->mail, true);
        $criteria->compare('active', $this->active, true);
        $criteria->compare('last_visit', $this->last_visit, true);
        $criteria->compare('last_update', $this->last_update, true);
        $criteria->compare('data_create', $this->data_create, true);
        $criteria->compare('ban', $this->ban, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function userOption() {
        return array('yes' => 'yes', 'no' => 'no');
    }

    protected function afterValidate() {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }
   /**
    *Encrypt password
    * @param type $value
    * @return type 
    */
    public function encrypt($value) {
        return md5($value);
    }
    
    public function getUserMail($id){
       $row = $this->findByPk($id);
       return $row->mail;
    }
    
    public function getUserName($id){
        $row = $this->findByPk($id);
       return $row->name;
    }

}