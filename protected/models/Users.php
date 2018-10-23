<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $created_date
 * @property string $modified_date
 * @property string $name
  * @property string $role
  * @property string $created_by
 *  @property string $active_status

 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $name;
    public $title;
    public $mobile_number;
    public $profile_image;
    public $active_status;
    public $role;
    public $created_by;
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password', 'required'),
			array('username, email, password', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password,created_date,modified_date,name,role,role_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
            'name'=>'Name',
            'title'=>'Title',
            'role'=>'Role',
            'mobile_number'=>'Mobile Number',
            'active_status'=>'Status',
            'created_by'=>'Created By',
            'created_date'=>'Created Date',
			'modified_date' => 'Modified Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
     $id=   Yii::app()->user->getId();

   //  echo $id;
		$criteria=new CDbCriteria;
        $criteria->alias = 'u';
        $criteria->select = 'e.created_by,r.description as role,u.id,u.username,u.email,u.password,e.name,e.mobile_number,e.profile_image,e.active_status,e.title,u.created_date,u.modified_date';
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
       // $criteria->compare('created_by',$this->created_by,true);
        $criteria->compare('created_date',$this->created_date,true);
        $criteria->compare('modified_date',$this->modified_date,true);
       // $criteria->compare('name',$this->name,true);
        $criteria->group = 'u.id';


        $criteria->join= 'JOIN espl_employee_details e ON  (e.user_id=u.id) Left JOIN role r ON  (r.id=u.role_id)';
      if( Yii::app()->user->getState('role') !="Admin"){
        $criteria->addCondition('u.id = ' . $id);//this is where condition
    }
       // $criteria->together = true;
        $models = Users::model()->find($criteria);
		//$criteria->compare('user_role',$this->user_role,true);
		//$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
