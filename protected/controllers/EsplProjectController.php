<?php

class EsplProjectController extends Controller
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
    public function accessRules(){
        $this->layout = false;
        if( Yii::app()->user->getState('role') =="Admin"){
            $arr =array('index','view','create','update','admin','dynamicsubcategories','employeedetails','serviceCategoriesList');   // give all access to admin
        }else if( Yii::app()->user->getState('role') =="Project"){
            $arr =array('index','view','update','admin');  // give all access to staff
        }else if( Yii::app()->user->getState('role') =="Finance"){
            $arr =array('index','view','update','admin');  // give all access to staff
        }else{
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
		$model=new EsplProject;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EsplProject'])){
			$model->attributes=$_POST['EsplProject'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionUpdate($id){
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['EsplProject'])){
           /*echo "<pre>";
            echo Yii::app()->user->role;
            print_r($_POST);
            die;*/

            $model->attributes=$_POST['EsplProject'];
            if(Yii::app()->user->role=="Project") {
                $model['project_region_id'] = implode(",", $_POST['EsplProject']['project_region_id']);
                $model['project_country_id'] = implode(",", $_POST['EsplProject']['project_country_id']);
                $model['mandatory_sector'] = implode(",", $_POST['EsplProject']['mandatory_sector']);
                $model['conditional_sector'] = implode(",", $_POST['EsplProject']['conditional_sector']);
                $model['technical_expert_id'] = implode(",", $_POST['EsplProject']['technical_expert_id']);
                $model['methodological_expert_id'] = implode(",", $_POST['EsplProject']['methodological_expert_id']);
                $model['financial_expert_id'] = implode(",", $_POST['EsplProject']['financial_expert_id']);
                $model['local_expert_id'] = implode(",", $_POST['EsplProject']['local_expert_id']);
                $model['methodolgy_category_id'] = implode(",", $_POST['EsplProject']['methodolgy_category_id']);
                $model['methodolgy_subcategory_id'] = implode(",", $_POST['EsplProject']['methodolgy_subcategory_id']);
            }

			if($model->save()) {
                Yii::app()->user->setFlash('success', "Information Successfully Saved!");
                //$this->redirect(array('view','id'=>$model->id));

                $created_date = date("Y-m-d H:i:s");
                if(Yii::app()->user->role=="Project") {
                    if (isset($_POST['stage_date'])) {
                        foreach ($_POST['stage_date'] as $key => $stagedate) {
                            $stage_update = Yii::app()->db->createCommand()
                                ->update(
                                    'espl_project_finance_stage',
                                    array(
                                        'project_stage_date' => $stagedate,
                                        'project_stage_submit_by' => Yii::app()->user->name,
                                    ),
                                    'id=:id',
                                    array(':id' => $key)
                                );
                        }
                    }
                }else if(Yii::app()->user->role=="Finance") {
                    //echo "block1";
                    if (isset($_POST['finance_stage_date'])) {
                        //echo "block2";
                        foreach ($_POST['finance_stage_date'] as $key => $stagedate) {
                            $stage_update = Yii::app()->db->createCommand()
                                ->update(
                                    'espl_project_finance_stage',
                                    array(
                                        'finance_stage_date' => $stagedate,
                                        'finance_stage_amount' => $_POST['finance_stage_amount'][$key],
                                        'finance_stage_amount_currency' => $_POST['finance_stage_amount_currency'][$key],
                                        'finance_stage_submit_by' => Yii::app()->user->name,
                                    ),
                                    'id=:id',
                                    array(':id' => $key)
                                );
                        }
                    }
                }

                $url = Yii::app()->createUrl('esplProject/admin');
                Yii::app()->request->redirect($url);
            }
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
		$dataProvider=new CActiveDataProvider('EsplProject');
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
		$model=new EsplProject('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EsplProject']))
			$model->attributes=$_GET['EsplProject'];
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
	 * @return EsplProject the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EsplProject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EsplProject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='espl-project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
