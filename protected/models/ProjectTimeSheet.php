<?php

/**
 * This is the model class for table "project_time_sheet".
 *
 * The followings are the available columns in table 'project_time_sheet':
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property string $time_hrs
 * @property string $time_mins
 * @property string $timesheet_date
 * @property string $created_date
 * @property string $modified_date
 * @property string $project_title
 * @property string $totalhrs
 * @property string $totalmins
 * @property string $timeid

 */
class ProjectTimeSheet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $project_title;
	public $totalhrs;
	public $totalmins;
	public $timesheet_date;
	public $timeid;
	public function tableName()
	{
		return 'project_time_sheet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, user_id, timesheet_date', 'required'),
			array('project_id, user_id', 'numerical', 'integerOnly'=>true),
			array('time_hrs, time_mins', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_id, user_id, time_hrs, time_mins, timesheet_date, created_date, modified_date', 'safe', 'on'=>'search'),
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
			'project_id' => 'Project Name',
			'totalhrs' => 'Total Time (Hrs)',
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
		$criteria=new CDbCriteria;
        $criteria->alias = 'p';
        $criteria->select = 'espl_project.id as id,espl_proposal.project_title, CONCAT(sum( cast(time_hrs as decimal(10,2))  + cast( (time_mins/60) as decimal(10,2)) ) ," hrs") as totalhrs,timesheet_date,p.id as timeid,p.project_id,p.user_id,p.time_hrs,p.time_mins,p.timesheet_date,p.created_date,p.modified_date';
        $criteria->compare('id',$this->id);
        $criteria->compare('timeid',$this->timeid);
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('time_hrs',$this->time_hrs,true);
		$criteria->compare('time_mins',$this->time_mins,true);
		$criteria->compare('timesheet_date',$this->timesheet_date,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('project_title',$this->project_title,true);
		$criteria->compare('totalhrs',$this->totalhrs,true);
		$criteria->compare('timesheet_date',$this->timesheet_date,true);
		$criteria->compare('totalmins',$this->totalmins,true);

        $criteria->join= 'right join espl_project on espl_project.id = p.project_id inner join espl_proposal on espl_proposal.id = espl_project.proposal_id';
        if( Yii::app()->user->getState('role') !="Admin"){
            $criteria->addCondition('p.user_id = ' . $id);//this is where condition
        }
        $criteria->together = true;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProjectTimeSheet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
