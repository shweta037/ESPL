<?php

class UsersController extends Controller
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
        $this->layout = false;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model=new Users;

        if(isset($_POST['Users']) && isset($_POST['EsplEmployeeDetails']))
        {

            $model->attributes=$_POST['Users'];

            /*        $model['username']=$_POST['Users']['username'];
                      $model['email']=$_POST['Users']['email'];*/
            $model['password']=MD5($_POST['Users']['password']);
            $model['created_date']=date('Y-m-d H:i:s');
            $model->save();
            $getlast=Yii::app()->db->getLastInsertId();
            // print_r($model);
            //echo $getlast;

            $model = new EsplEmployeeDetails();
            $model->attributes=$_POST['EsplEmployeeDetails'];

            // print_r($model);exit;
            // $model->profile_image=CUploadedFile::getInstance($model,'profile_image');
            $rand = rand(0,9999);
            //   $fecha = date('Y-m-d');


            $uploadedFile=CUploadedFile::getInstance($model,'profile_image');


            $pathname= Yii::app()->basePath.'/upload/';

            $model['name']=$_POST['EsplEmployeeDetails']['name'];
            $model['date_of_birth']=$_POST['EsplEmployeeDetails']['date_of_birth'];
            $model['profile_image']=$pathname.$_POST['EsplEmployeeDetails']['profile_image'];
            $model['date_of_birth']=$_POST['EsplEmployeeDetails']['date_of_birth'];
            $model['user_id'] = $getlast;
            $model['user_role'] = $_POST['EsplEmployeeDetails']['role_name'];
            $model['title'] = $_POST['EsplEmployeeDetails']['title'];
            $model['father_name'] = $_POST['EsplEmployeeDetails']['father_name'];
            $model['mobile_number'] = $_POST['EsplEmployeeDetails']['mobile_number'];
            $model['whatsapp_number'] = $_POST['EsplEmployeeDetails']['whatsapp_number'];
            $model['active_status'] = $_POST['EsplEmployeeDetails']['active_status'];
            $model['created_date']=date('Y-m-d H:i:s');
            //print_r($model);exit;
            // //  $path= Yii::app()->basePath.'/uploadProfileImage/'.'_'.$model['profile_image'];

            //  print_r($model);
            // echo "<hr/>";
            //  print_r($model);exit;
            // echo $model['profile_image'];

            if($model->save() )
                $url = Yii::app()->createUrl('Users/admin');
            Yii::app()->request->redirect($url);

            // $this->redirect(array('view','id'=>$model->id));
        }
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
        $this->render('create',array(
            'model'=>$model,
            //'model2'=>$model
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

        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
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
        $dataProvider=new CActiveDataProvider('Users');
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
        $model=new Users('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Users']))
            $model->attributes=$_GET['Users'];
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
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Users::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Users $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
