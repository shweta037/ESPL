<?php

class EsplProposalController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','dynamicsubcategories','employeedetails'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->layout = false;
		$model=new EsplProposal;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['EsplProposal']))
		{

            //$model->categories = implode(",",$_POST['EsplProposal']['categories']);
         //   print_r($_POST);
			$model->attributes=$_POST['EsplProposal'];
            $model['created_date']= date("Y-m-d H:i:s");
           // $model['service_sub_category'] = implode(",",$_POST['EsplProposal']['service_sub_category']);
            $model['client_representative_name']=$_POST['EsplProposal']['hidden_name'];
			if($model->save())
              $getlast=Yii::app()->db->getLastInsertId();
			 // echo $getlast;
		//	exit;
            $created_date=date("Y-m-d H:i:s");
            $command= Yii::app()->db->createCommand()
                ->insert(
                    'espl_project',
                    array(
                        'proposal_id'=>$getlast,
                        'created_date'=>$created_date,
                    )
                );

//                $this->redirect(array('view','id'=>$model->id));
               $url = Yii::app()->createUrl('EsplProposal/admin');
            Yii::app()->request->redirect($url);
		}//
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('create',array(
			'model'=>$model,
		));
        $this->render('/include/dashboard_footer');
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $this->layout = false;
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['EsplProposal']))
		{
			$model->attributes=$_POST['EsplProposal'];
			if($model->save())
                die();
				//$this->redirect(array('view','id'=>$model->id));
                $url = Yii::app()->createUrl('EsplProposal/admin');
                Yii::app()->request->redirect($url);
		}
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('update',array(
			'model'=>$model,
		));
        $this->render('/include/dashboard_footer');
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->layout = false;
		$dataProvider=new CActiveDataProvider('EsplProposal');
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
        $this->render('/include/dashboard_footer');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $this->layout = false;
		$model=new EsplProposal('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EsplProposal']))
			$model->attributes=$_GET['EsplProposal'];
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('admin',array(
			'model'=>$model,
		));
        $this->render('/include/dashboard_footer');
	}

	//ajax function to get sub categories
    public function actiondynamicsubcategories(){
      $countryid=$_POST['service_category'];;
        $data=ServiceSubCategory::model()->findAll('serviceId= "'.$countryid.'"',
            array(':serviceId'=>(int) $_POST['service_category']));

        $data=CHtml::listData($data,'id','service_name');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
        }
       // exit;
    }


    public function actionemployeedetails(){
      $userid=$_POST['client_representative_name'];

     // echo $userid;exit;
     //   $data=EsplEmployeeDetails::model()->findAll('user_id= "'.$userid.'"',
       //     array(':user_id'=>(int) $_POST['client_representative_name']),'email');
        $data = Yii::app()->db->createCommand('SELECT users.id,users.email,emp.name,emp.address,emp.mobile_number FROM users join espl_employee_details as emp on users.id= emp.user_id where user_id= "'.$userid.'"')->queryAll();
        //$data=CHtml::textField($data,'id','email','address');


     foreach($data as $value){
        // print_r($value);

        $c_email=  $value['email'];
          $address = $value['address'];
         $mnumber = $value['mobile_number'];
         $name = $value['name'];
         $data = array(
             'email' => $c_email,
             'address' => $address,
             'mobilenumber'=>$mnumber,
             'name'=>$name
         );
        // echo $c_email."*****".$c_name;
         echo json_encode($data);
  // exit;
       //  echo $c_email.",".$c_name;
       /*$a= '<input type="text" value="'.$value['email'].'" class="form-control" name="client_representative_email" id="client_representative_email"/>';
         echo '<input type="text" value="'.$value['name'].'" class="form-control" name="client_representative_name" id="client_representative_name"/>';*/
     }


    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EsplProposal the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EsplProposal::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EsplProposal $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='espl-proposal-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
