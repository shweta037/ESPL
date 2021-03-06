<?php

class ServiceController extends Controller
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
	/*public function accessRules()
	{

	    $role = Yii::app()->user->role;

	   // echo Yii::app()->user->getState('role');

	    $project = $role;
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
               // 'expression' => array($this, 'Project'),
               // 'role'=>array('Project')
                'roles'=>array('Admin', 'editor'),
               // 'expression'=>array((Yii::app()->user->role == "admin") ||() Yii::app()->user->role == "Project"),

            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/
    public function accessRules()

    {



        if( Yii::app()->user->getState('role') =="Admin")

        {

            $arr =array('index','view','create','update','admin');   // give all access to admin

        }else if( Yii::app()->user->getState('role') =="Project")

        {

            $arr =array('index','view','update','admin');  // give all access to staff

        }

        else

        {

            $arr = array('');          //  no access to other user

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
		$model=new Service;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Service']))
		{
			$model->attributes=$_POST['Service'];
            $model['created_date']=date('Y-m-d H:i:s');
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
                $url = Yii::app()->createUrl('service/admin');
            Yii::app()->request->redirect($url);
			    //$this->actionAdmin();
		}
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
		// $this->performAjaxValidation($model);

		if(isset($_POST['Service']))
		{
			$model->attributes=$_POST['Service'];
            $model['created_date']= date('Y-m-d H:i:s');
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
        $this->layout = false;
		$dataProvider=new CActiveDataProvider('Service');
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
		$model=new Service('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Service']))
			$model->attributes=$_GET['Service'];
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
	 * @return Service the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Service::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Service $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='service-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
