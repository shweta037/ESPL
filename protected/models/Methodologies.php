<?php

/**
 * This is the model class for table "methodologies".
 *
 * The followings are the available columns in table 'methodologies':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $category_name
 * @property integer $is_deleted
 * @property string $created_date
 * @property string $modified_date
 */
class Methodologies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public $category_name;// take a default constand for the column name u want to join of the different table
	public function tableName()
	{
		return 'methodologies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('category_id, is_deleted', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, category_id,category_name, name, is_deleted, created_date, modified_date', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category Id',
            'category_name'=>'Category Name',
			'name' => 'Name',
			'is_deleted' => 'Is Deleted',
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
        $criteria->alias = 'i';//this is for main table
		$criteria->compare('i.id',$this->id);// these are all for data table search should not be removed if we are taking the select query also.
		$criteria->compare('i.category_id',$this->category_id);
        $criteria->compare('d.category_name',$this->category_name);
        $criteria->select = 'd.category_name as category_name,i.id, i.category_id, i.name,i.is_deleted, i.created_date, i.modified_date';
		$criteria->compare('i.name',$this->name,true);
		$criteria->compare('i.is_deleted',$this->is_deleted);
		$criteria->compare('i.created_date',$this->created_date,true);
		$criteria->compare('i.modified_date',$this->modified_date,true);
        $criteria->addCondition('i.category_id=d.id');//this is where condition
        $criteria->join= 'JOIN methodologies_category d ON (i.category_id=d.id)';
        $criteria->together = true;
        $models = Methodologies::model()->find($criteria);
     //print_r($models);exit;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

		//this will generate this query
       /* SELECT `i`.`id`, `i`.`category_id`, `i`.`name`,
`i`.`is_deleted`, `i`.`created_date`, `i`.`modified_date` FROM
`methodologies` `i` JOIN methodologies_category d ON (i.category_id=d.id)*/
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Methodologies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
