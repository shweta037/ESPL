<?php

/**
 * This is the model class for table "espl_proposal".
 *
 * The followings are the available columns in table 'espl_proposal':
 * @property integer $id
 * @property string $service_type
 * @property string $service_category
 * @property string $service_sub_category
 * @property string $project_scale
 * @property string $project_type
 * @property integer $proposal_number
 * @property string $proposal_issue_date
 * @property integer $proposa_revision_number
 * @property string $client_name
 * @property string $client_country
 * @property integer $proposal_status
 * @property string $contract_signed
 * @property integer $contract_value
 * @property string $contract_value_currency
 * @property string $client_representative_name
 * @property string $client_representative_email
 * @property integer $client_representative_phone
 * @property string $client_address
 * @property string $project_title
 * @property integer $project_external_number
 * @property integer $team_lead
 * @property string $created_date
 * @property integer $created_by
 * @property string $modified_date
 */
class EsplProposal extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'espl_proposal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_type, service_category,client_representative_email,client_representative_phone, service_sub_category,proposa_revision_number, project_scale, project_type, proposal_number, 
			    proposal_issue_date, client_name, client_country, proposal_status, contract_value, contract_value_currency, 
			    client_representative_name, project_title', 'required'),
			//array('proposal_number, proposa_revision_number, proposal_status, contract_value, client_representative_phone, project_external_number, team_lead, created_by', 'numerical', 'integerOnly'=>true),
			//array('proposal_number, proposa_revision_number, proposal_status, contract_value, client_representative_phone, project_external_number, team_lead, created_by,service_type, service_category, project_scale, project_type, client_name, client_country, client_representative_name, client_representative_email, client_address, project_title', 'length', 'max'=>255),
			array('project_external_number,attachment_image','length','max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, service_type, service_category, service_sub_category, project_scale, 
			    project_type, proposal_number, proposal_issue_date, proposa_revision_number, client_name,
			     client_country, proposal_status, contract_signed, contract_value, contract_value_currency, client_representative_name, 
			      project_title, 
			     created_date, created_by, modified_date,client_representative_email,client_representative_phone,client_address,
			     project_external_number,team_lead,contract_signed,created_by,invoice_status_ids', 'safe', 'on'=>'search'),
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
			'service_type' => 'Service Type',
			'service_category' => 'Service Category',
			'service_sub_category' => 'Service Sub Category',
			'project_scale' => 'Project Scale',
			'project_type' => 'Project Type',
			'proposal_number' => 'Proposal Number',
			'proposal_issue_date' => 'Proposal Issue Date',
			'proposa_revision_number' => 'Proposal Revision Number',
			'client_name' => 'Client Name',
			'client_country' => 'Client Country',
			'proposal_status' => 'Proposal Status',
			'contract_signed' => 'Contract Signed',
			'contract_value' => 'Contract Value',
			'contract_value_currency' => 'Contract Value Currency',
			'client_representative_name' => 'Client Representative Name',
			'client_representative_email' => 'Client Representative Email',
			'client_representative_phone' => 'Client Representative Phone',
			'client_address' => 'Client Address',
			'project_title' => 'Project Title',
			'project_external_number' => 'Project External Number',
			'team_lead' => 'Team Lead',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
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
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('service_category',$this->service_category,true);
		$criteria->compare('service_sub_category',$this->service_sub_category,true);
		$criteria->compare('project_scale',$this->project_scale,true);
		$criteria->compare('project_type',$this->project_type,true);
		$criteria->compare('proposal_number',$this->proposal_number);
		$criteria->compare('proposal_issue_date',$this->proposal_issue_date,true);
		$criteria->compare('proposa_revision_number',$this->proposa_revision_number);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('client_country',$this->client_country,true);
		$criteria->compare('proposal_status',$this->proposal_status);
		$criteria->compare('contract_signed',$this->contract_signed,true);
		$criteria->compare('contract_value',$this->contract_value);
		$criteria->compare('contract_value_currency',$this->contract_value_currency,true);
		$criteria->compare('client_representative_name',$this->client_representative_name,true);
		$criteria->compare('client_representative_email',$this->client_representative_email,true);
		$criteria->compare('client_representative_phone',$this->client_representative_phone);
		$criteria->compare('client_address',$this->client_address,true);
		$criteria->compare('project_title',$this->project_title,true);
		$criteria->compare('project_external_number',$this->project_external_number);
		$criteria->compare('team_lead',$this->team_lead);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EsplProposal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
