<?php

/**
 * This is the model class for table "espl_client".
 *
 * The followings are the available columns in table 'espl_client':
 * @property integer $id
 * @property string $client_name
 * @property string $client_email
 * @property string $client_address
 * @property string $client_phone_number
 * @property string $created_date
 * @property string $modified_date
 */
class EsplClient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'espl_client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_name, client_email, client_address, client_phone_number', 'required'),
			array('client_name, client_email, client_address, client_phone_number', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_name, client_email, client_address, client_phone_number, created_date, modified_date', 'safe', 'on'=>'search'),
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
			'client_name' => 'Client Name',
			'client_email' => 'Client Email',
			'client_address' => 'Client Address',
			'client_phone_number' => 'Client Phone Number',
			'created_date' => 'Created Date',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('client_address',$this->client_address,true);
		$criteria->compare('client_phone_number',$this->client_phone_number,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EsplClient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
