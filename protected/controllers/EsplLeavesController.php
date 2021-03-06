<?php

class EsplLeavesController extends Controller
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

            $arr =array('index','view','create','update','admin','leaves_number');   // give all access to admin

        }else if( Yii::app()->user->getState('role') =="Project")

        {

            $arr =array('index','create','view','update','admin','leaves_number');  // give all access to staff

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
		$model=new EsplLeaves;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EsplLeaves']))
		{
			$model->attributes=$_POST['EsplLeaves'];
            $model['created_date']=date('Y-m-d H:i:s');
			if($model->save())
				//$this->redirect(array('view','id'=>$model->id));
                $url = Yii::app()->createUrl('esplLeaves/admin');
            Yii::app()->request->redirect($url);
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
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EsplLeaves']))
		{
			$model->attributes=$_POST['EsplLeaves'];
			if($model->save())
				//this->redirect(array('view','id'=>$model->id));
                $url = Yii::app()->createUrl('esplLeaves/admin');
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
		$dataProvider=new CActiveDataProvider('EsplLeaves');
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
		$model=new EsplLeaves('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EsplLeaves']))
			$model->attributes=$_GET['EsplLeaves'];
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
	 * @return EsplLeaves the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EsplLeaves::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EsplLeaves $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='espl-leaves-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
