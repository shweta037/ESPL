<?php

/**
 * This is the model class for table "espl_project".
 *
 * The followings are the available columns in table 'espl_project':
 * @property integer $id
 * @property integer $proposal_id
 * @property integer $project_region_id
 * @property integer $project_country_id
 * @property string $mandatory_sector
 * @property string $conditional_sector
 * @property string $technical_area
 * @property integer $technical_expert_id
 * @property integer $methodological_expert_id
 * @property integer $financial_expert_id
 * @property integer $local_expert_id

 * @property string $submission_date
 * @property string $completeness_check_date
 * @property string $ir_check_date
 * @property string $created_date
 * @property string $modified_date
 * @property string $teamleader
 * @property string $project_title
 */
class EsplProject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $teamleader;
	public $project_title;
	public function tableName()
	{
		return 'espl_project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('proposal_id, project_region_id, project_country_id, mandatory_sector, conditional_sector, technical_area, technical_expert_id, methodological_expert_id, financial_expert_id, local_expert_id, submission_date, completeness_check_date, ir_check_date, created_date, modified_date', 'required'),
			array('id', 'required'),
			//array('proposal_id, project_region_id, project_country_id, technical_expert_id, methodological_expert_id, financial_expert_id, local_expert_id', 'numerical', 'integerOnly'=>true),
			array('proposal_id, project_region_id, project_country_id, mandatory_sector, conditional_sector, technical_area, technical_expert_id,
			 methodological_expert_id, financial_expert_id, local_expert_id, submission_date, completeness_check_date, ir_check_date, 
			 created_date, modified_date,mandatory_sector, conditional_sector,finance_bill_number,registered_Issued_date, 
			 technical_area,methodolgy_subcategory_id,travel_invoice_date,travel_invoice_type,
			travel_invoice_amount,travel_invoice_currency', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, proposal_id,finance_stage_date,finance_stage_amount,finance_stage_amount_currency,finance_stage_submit_by, 
			project_region_id, project_country_id, mandatory_sector, conditional_sector, technical_area, technical_expert_id, methodological_expert_id, 
			financial_expert_id, local_expert_id, submission_date, completeness_check_date, ir_check_date, created_date, modified_date,travel_invoice_date,travel_invoice_type,
			travel_invoice_amount,travel_invoice_currency', 'safe', 'on'=>'search'),
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
			'id' => 'Project ID',
			'project_title' => 'Project Name',
			'proposal_id' => 'Project Name',
			'project_region_id' => 'Project Region',
			'teamleader' => 'Team Leader',
			'project_country_id' => 'Project Country',
			'mandatory_sector' => 'Mandatory Sector',
			'conditional_sector' => 'Conditional Sector',
			'technical_area' => 'Technical Area',
			'technical_expert_id' => 'Technical Expert',
			'methodological_expert_id' => 'Methodological Expert',
			'financial_expert_id' => 'Financial Expert',
			'local_expert_id' => 'Local Expert',
			'submission_date' => 'Submission Date',
			'completeness_check_date' => 'Completeness Check Date',
			'ir_check_date' => 'Ir Check Date',
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
        $criteria->alias = 'p';
        $criteria->select = 'p.id,p.proposal_id,p.project_region_id,p.project_country_id,p.mandatory_sector,p.conditional_sector,p.technical_area,p.technical_expert_id,
        p.methodological_expert_id,p.financial_expert_id,p.local_expert_id,p.submission_date,p.completeness_check_date,p.ir_check_date,
        p.created_date,p.modified_date,espl_proposal.project_title,espl_employee_details.name as teamleader';
		$criteria->compare('id',$this->id);
		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('project_region_id',$this->project_region_id);
		$criteria->compare('project_country_id',$this->project_country_id);
		$criteria->compare('mandatory_sector',$this->mandatory_sector,true);
		$criteria->compare('conditional_sector',$this->conditional_sector,true);
		$criteria->compare('technical_area',$this->technical_area,true);
		$criteria->compare('technical_expert_id',$this->technical_expert_id);
		$criteria->compare('methodological_expert_id',$this->methodological_expert_id);
		$criteria->compare('financial_expert_id',$this->financial_expert_id);
		$criteria->compare('local_expert_id',$this->local_expert_id);

		$criteria->compare('submission_date',$this->submission_date,true);
		$criteria->compare('completeness_check_date',$this->completeness_check_date,true);
		$criteria->compare('ir_check_date',$this->ir_check_date,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
        $criteria->join= 'inner join espl_proposal on espl_proposal.id = p.proposal_id inner join espl_employee_details on espl_employee_details.user_id = espl_proposal.team_lead';
        $criteria->together = true;
        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EsplProject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
