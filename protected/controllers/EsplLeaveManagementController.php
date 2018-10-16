<?php

class EsplLeaveManagementController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','leaves_number'),
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
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
        $this->render('/include/dashboard_footer');
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new EsplLeaveManagement;
       $id =Yii::app()->user->getId();
        $total_leaves= $_POST['total_leaves'];
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['EsplLeaveManagement']) && Yii::app()->request->isAjaxRequest)
		{

		  //  print_r($_POST);exit;
			$model->attributes=$_POST['EsplLeaveManagement'];


            $total_leaves= $_POST['total_leaves'];
            $leave_type = $_POST['EsplLeaveManagement']['leave_type'];
			$datetime1 = $_POST['EsplLeaveManagement']['from_date'];
            $datetime2 =  $_POST['EsplLeaveManagement']['to_date'];
            $date1 = new DateTime($datetime1);
            $date2 = new DateTime($datetime2);

            $diff=date_diff($date1,$date2);
            $datediff=$diff->format("%R%a");
            $resource_cnt = Yii::app()->db->createCommand()
                ->select('sum(leave_request_days)as total_leaves')
                ->from('espl_leave_management')

                ->where('user_id=:id', array(':id'=>$id))
                ->andWhere('leave_type=:leave_type', array(':leave_type'=>$leave_type))
                ->queryRow();

            $total_leaves_from_db= $resource_cnt['total_leaves'];

            $model['created_date']=date("Y-m-d H:i:s");
            $model['user_id']=Yii::app()->user->getId();
            $model['leave_request_days']= $datediff;

            if($total_leaves_from_db == ''){
                if($total_leaves>=$datediff){
                    if($model->save())
                        //  echo $interval;

                        $error="done";

                    echo $error;
                        $model->refresh();
                }elseif($total_leaves<=$datediff){

                //  $error= "You are not allowed to take more than the leaves allocated";

                   $error="1";
                    echo ($error);
                }
            }else{

                if($total_leaves_from_db>=$datediff){
                    $error="done";

                    echo $error;
                    $model->refresh();
                }elseif($total_leaves_from_db<=$datediff){
                     $leave_left = $total_leaves - $total_leaves_from_db;
                    $error=$leave_left;
                    // echo $leave_left;
                    //$error= "You have $leave_left leaves left";
                    echo ($error);
                }
            }


		}
     /*   $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('create',array(
			'model'=>$model,
		));
        $this->render('/include/dashboard_footer');*/
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EsplLeaveManagement']))
		{
			$model->attributes=$_POST['EsplLeaveManagement'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('EsplLeaveManagement');
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
		$model=new EsplLeaveManagement('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EsplLeaveManagement']))
			$model->attributes=$_GET['EsplLeaveManagement'];
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
		$this->render('admin',array(
			'model'=>$model,
		));
        $this->render('/include/dashboard_footer');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EsplLeaveManagement the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EsplLeaveManagement::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EsplLeaveManagement $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='espl-leave-management-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



    //ajax function to get sub categories
    public function actionleaves_number(){
        $leaveid=$_POST['leave_type'];;
        $data = Yii::app()->db->createCommand('SELECT total_leaves FROM  espl_leaves  where id= "'.$leaveid.'"')->queryAll();

      //  print_r($data);exit;
        foreach($data as $name)
        {
          echo $name['total_leaves'];
        }
        // exit;
    }

}
