<?php

/**
 * This is the model class for table "espl_leave_management".
 *
 * The followings are the available columns in table 'espl_leave_management':
 * @property integer $id
 *  @property integer $leave_type
 * @property string $subject
 * @property string $leave_status
 * @property string $to_date
 * @property string $from_date
 * @property string $message
 * @property string $created_date
 * @property string $modified_date
 */
class EsplLeaveManagement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'espl_leave_management';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject,to_date, from_date,leave_type,message', 'required'),
			array('subject, message', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject, to_date, from_date, message, created_date, modified_date', 'safe', 'on'=>'search'),
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
            'leave_type' => 'Leave Type',
			'subject' => 'Subject',
			'to_date' => 'To Date',
			'from_date' => 'From Date',
			'message' => 'Message',
            'leave_request_days' => 'Requested Days',
            'leave_status' => 'Status',
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
        $criteria->alias = 'i';
        $criteria->select = 'd.status_name as leave_status,i.id,i.leave_type,i.subject,i.to_date,i.from_date,i.message,i.created_date, i.modified_date';
		$criteria->compare('id',$this->id);
        $criteria->compare('leave_type',$this->leave_type,true);
        $criteria->compare('leave_status',$this->leave_status,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('to_date',$this->to_date,true);
		$criteria->compare('from_date',$this->from_date,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
        $criteria->join= 'JOIN status d ON (d.id=i.leave_status)';
        $criteria->together = true;
        $models = EsplLeaveManagement::model()->find($criteria);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EsplLeaveManagement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
