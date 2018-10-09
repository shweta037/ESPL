<?php

/**
 * This is the model class for table "espl_employee_details".
 *
 * The followings are the available columns in table 'espl_employee_details':
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_role
 * @property string $name
 * @property string $father_name
 * @property string $title
 * @property string $profile_image
 * @property string $date_of_birth
 * @property string $mobile_number
 * @property string $whatsapp_number
 * @property string $active_status

 */
class EsplEmployeeDetails extends CActiveRecord
{


    public $profile_image;
    public $new_model;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'espl_employee_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_role, name', 'required'),
			array('user_id, user_role', 'numerical', 'integerOnly'=>true),
          //  array('[profile_image]','file','extensions' => 'png, jpg'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, user_role, name', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'user_role' => 'User Role',
			'name' => 'Employee Name',
            'father_name' => 'Father Name',
            'title' =>'Title',
            'profile_image'=>'Profile Image',
            'date_of_birth'=>'Date Of Birth',
            'mobile_number'=>'Mobile Number',
            'whatsapp_number'=>'WhatsApp Number',
            'active_status'=>'Active Status'
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_role',$this->user_role);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('father_name',$this->father_name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('profile_image',$this->profile_image,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('mobile_number',$this->mobile_number,true);
		$criteria->compare('whatsapp_number',$this->whatsapp_number,true);
		$criteria->compare('active_status',$this->active_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EsplEmployeeDetails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
