<?php

/**
 * This is the model class for table "tbl_coment".
 *
 * The followings are the available columns in table 'tbl_coment':
 * @property integer $comment_id
 * @property string $post
 * @property string $email
 * @property string $name
 * @property integer $news_id
 * @property string $date
 * @property integer $user_id
 * @property integer $hide
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeValidate() {
             $this->date = new CDbExpression('NOW()');
             
             if(!Yii::app()->user->isGuest) {
                $id = Yii::app()->user->id;
                $this->user_id = Yii::app()->user->id; 
                $this->email = User::model()->getUserMail(intval($id));
                $this->name = User::model()->getUserName($id);
             }
             else{
                  $this->user_id=0;
             }
             
           return  parent::beforeValidate();
           
        }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_coment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post, email, name,  user_id,', 'required'),
			array('user_id,news_id', 'numerical', 'integerOnly'=>true),
                        array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comment_id, post, email, name, news_id, date, user_id, hide', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => 'Comment',
			'post' => Yii::t('site','body'),
			'email' => Yii::t('site','email'),
			'name' => Yii::t('site','name'),
			'news_id' => 'News',
			'date' => Yii::t('site','date'),
			'user_id' => 'User',
			'hide' => 'Hide',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('hide',$this->hide);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}