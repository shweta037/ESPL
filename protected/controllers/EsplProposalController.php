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

        $this->layout = false;


        if( Yii::app()->user->getState('role') =="Admin")

        {

            $arr =array('index','view','create','update','admin','dynamicsubcategories','employeedetails','serviceCategoriesList');   // give all access to admin

        }else if( Yii::app()->user->getState('role') =="Project")

        {

            $arr =array('index','view','update','admin');  // give all access to staff

        }else if( Yii::app()->user->getState('role') =="Proposal")

        {

            $arr =array('index','view','update','admin');  // give all access to staff

        }

        else

        {

            $arr = array('');         //  no access to other user

        }



        return array(

            array('allow', // allow authenticated user to perform 'create' and 'update' actions

                'actions'=>$arr,

                'users'=>array('@'),

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


            $model->attributes=$_POST['EsplProposal'];
            $model['service_sub_category'] = implode(",",$_POST['EsplProposal']['service_sub_category']);
            if(isset($_POST['EsplProposal']['invoice_status_ids'])) {
                $model['invoice_status_ids'] = implode(",", $_POST['EsplProposal']['invoice_status_ids']);
            }
            $model['created_date']= date("Y-m-d H:i:s");
            $vid_img = time().$_FILES['attachment_image']['name'];
            if (!empty($_FILES['attachment_image'])) {
                /*move to the folder*/
                $vid_img = time().$_FILES['attachment_image']['name'];/*here using time for different different image*/
                $move = Yii::app()->basePath.'/attachment/' .$vid_img;
                move_uploaded_file($_FILES['attachment_image']['tmp_name'], $move);

            }
            $model['attachment_image']=$vid_img;
            //$model['client_representative_name']=$_POST['hidden_name'];
            //$model['contract_signed']=$_POST['EsplProposal']['contract_signed'];

            /*echo "<pre>";
            print_r($_POST['EsplProposal']);
            print_r($model->attributes);
            $model->save();
            die;*/
			if($model->save())
                $getlast = Yii::app()->db->getLastInsertId();
                $created_date = date("Y-m-d H:i:s");
                if($getlast){
                    if ($_POST['EsplProposal']['proposal_status'] == 3) {

                            $command = Yii::app()->db->createCommand()
                               ->insert(
                                   'espl_project',
                                   array(
                                       'proposal_id' => $getlast,
                                       'created_date' => $created_date,
                                   )
                               );
               }

               if ($_POST['EsplProposal']['service_type'] != 1 && isset($_POST['txt_milestone_name']) && $_POST['txt_milestone_name'] != null) {
                   foreach ($_POST['txt_milestone_stageid'] as $key => $item) {
                       $milestone_insert = Yii::app()->db->createCommand()
                           ->insert(
                               'espl_proposal_milestone',
                               array(
                                   'proposal_id' => $getlast,
                                   'milestone_name' => $_POST['txt_milestone_name'][$key],
                                   'milestone_value' => $_POST['txt_milestone_value'][$key],
                                   'milestone_description' => $_POST['txt_milestone_description'][$key],
                                   'stage_id' => $item,
                                   'created_date' => $created_date,
                               )
                           );
                   }


               }
                }



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

        $model = $this->loadModel($id);
        print_r($model->getErrors());

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['EsplProposal'])) {


            $model->attributes = $_POST['EsplProposal'];
            $model['service_sub_category'] = implode(",", $_POST['EsplProposal']['service_sub_category']);
            if (isset($_POST['EsplProposal']['invoice_status_ids'])) {
                $model['invoice_status_ids'] = implode(",", $_POST['EsplProposal']['invoice_status_ids']);
            }
            $model['created_date']= date("Y-m-d H:i:s");
            $vid_img = time().$_FILES['attachment_image']['name'];
            if (!empty($_FILES['attachment_image'])) {
                /*move to the folder*/
                $vid_img = time().$_FILES['attachment_image']['name'];/*here using time for different different image*/
                $move = Yii::app()->basePath.'/attachment/' .$vid_img;
                move_uploaded_file($_FILES['attachment_image']['tmp_name'], $move);

            }
            $model['attachment_image']=$vid_img;

            if ($model->save()){

                //$this->redirect(array('view','id'=>$model->id));
                if ($_POST['EsplProposal']['proposal_status'] == 3) {
                    $command = Yii::app()->db->createCommand()
                        ->insert(
                            'espl_project',
                            array(
                                'proposal_id' => $id
                            )
                        );
                }



                if ($_POST['EsplProposal']['service_type'] != 1 && isset($_POST['txt_milestone_name']) && $_POST['txt_milestone_name'] != null) {
                    $milestonelist = Yii::app()->db->createCommand('SELECT stage_id FROM espl_proposal_milestone where proposal_id="' . $id . '"')->queryAll();
                    $milestone_list = array();
                    foreach ($milestonelist as $k => $milestonelist1) {
                        $milestone_list[] = $milestonelist[$k]['stage_id'];
                    }

                    foreach ($_POST['txt_milestone_stageid'] as $key => $item) {
                        if (in_array($item, $milestone_list)) {
                            $milestone_update = Yii::app()->db->createCommand()
                                ->update(
                                    'espl_proposal_milestone',
                                    array(
                                        'milestone_name' => $_POST['txt_milestone_name'][$key],
                                        'milestone_value' => $_POST['txt_milestone_value'][$key],
                                        'milestone_description' => $_POST['txt_milestone_description'][$key],
                                    ),
                                    'stage_id=:stage_id',
                                    array(':stage_id' => $item)
                                );
                        } else {
                            $milestone_insert = Yii::app()->db->createCommand()
                                ->insert(
                                    'espl_proposal_milestone',
                                    array(
                                        'proposal_id' => $id,
                                        'milestone_name' => $_POST['txt_milestone_name'][$key],
                                        'milestone_value' => $_POST['txt_milestone_value'][$key],
                                        'milestone_description' => $_POST['txt_milestone_description'][$key],
                                        'stage_id' => $item,
                                    )
                                );
                        }

                    }
                }
                }

            $url = Yii::app()->createUrl('EsplProposal/admin');
            Yii::app()->request->redirect($url);
        }

            $this->render('/include/dashboard_header');
            $this->render('/include/dashboard_leftbar');
            $this->render('update', array(
                'model' => $model,
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

    public function actionserviceCategoriesList(){
        $service_type=$_POST['service_type'];;
        $data=ServiceCategory::model()->findAll('service_type_id= "'.$service_type.'"',
                                                    array(':service_type_id'=>(int) $service_type));

        $data=CHtml::listData($data,'id','service_cat_name');
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
        $data = Yii::app()->db->createCommand('SELECT users.id,users.email,emp.name,emp.address,emp.mobile_number FROM users join espl_employee_details as emp 
                                          on users.id= emp.user_id where user_id= "'.$userid.'"')->queryAll();
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
