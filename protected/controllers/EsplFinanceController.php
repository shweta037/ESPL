<?php

class EsplFinanceController extends Controller
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
				'actions'=>array('create','update'),
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
		$model=new EsplFinance;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EsplFinance']))
		{
			$model->attributes=$_POST['EsplFinance'];
			if($model->save())
                //$this->redirect(array('view','id'=>$model->id));
               $getlast=Yii::app()->db->getLastInsertId();
                $created_date=date("Y-m-d H:i:s");
                $url = Yii::app()->createUrl('esplFinance/admin');
				//$this->redirect(array('view','id'=>$model->id));
            foreach ($_POST['invoice_stage_id'] as  $key=>$stagelist){
                $insert= Yii::app()->db->createCommand()
                    ->insert(
                        'espl_finance_stage',
                        array(
                            'finance_id'=>$getlast,
                            'invoice_due_date'=>$_POST['invoice_due_date'][$key],
                            'invoice_stage_id'=>$stagelist,
                            'invoice_amount'=>$_POST['invoice_amount'][$key],
                            'invoice_currency_id'=>$_POST['invoice_currency_id'][$key],
                            'created_date'=>$created_date,
                        )
                    );
            }

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

		if(isset($_POST['EsplFinance']))
		{
			$model->attributes=$_POST['EsplFinance'];
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
		$dataProvider=new CActiveDataProvider('EsplFinance');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EsplFinance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EsplFinance']))
			$model->attributes=$_GET['EsplFinance'];

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
	 * @return EsplFinance the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EsplFinance::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EsplFinance $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='espl-finance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
