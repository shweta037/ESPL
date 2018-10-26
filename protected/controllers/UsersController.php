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

    public function accessRules(){
        $this->layout = false;
        if( Yii::app()->user->getState('role') =="Admin"){
            $arr =array('index','view','create','update','admin','combo_off');   // give all access to admin
        }else if( Yii::app()->user->getState('role') =="Project"){
            $arr =array('index','view','update','admin');   // give all access to admin
        }else if( Yii::app()->user->getState('role') =="Finance"){
            $arr =array('index','view','update','admin');   // give all access to admin
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
        $this->layout = false;
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
        $this->layout = false;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model),
        $model=new Users;

        if(isset($_POST['Users']))
        {
 // print_r($_POST['Users']),exit,
            $model->attributes=$_POST['Users'];

            /*       'username']=$_POST['Users']['username'],
                     'email']=$_POST['Users']['email'],*/
           $model['password']=MD5($_POST['Users']['password']);
            $model['created_date']=date('Y-m-d H:i:s');
            $model['role_id']=$_POST['Users']['role_id'];
          //  $model['created_by']=Yii::app()->user->getId();
            $model->save();
            $getlast=Yii::app()->db->getLastInsertId();

           $pathname= Yii::app()->basePath.'/upload/';
            $vid_img = time().$_FILES['profile_image']['name'];
            if (!empty($_FILES['profile_image'])) {
                /*move to the folder*/
                $vid_img = time().$_FILES['profile_image']['name'];/*here using time for different different image*/
                $move = Yii::app()->basePath.'/upload/' .$vid_img;
                move_uploaded_file($_FILES['profile_image']['tmp_name'], $move);

            }
           // $fileName = "{$rand}-{$uploadedFile}"; // random number + file name
           // $model->profile_image = $fileName;
          $insert= Yii::app()->db->createCommand()
             ->insert(
             'espl_employee_details',
                array('name'=>$_POST['name'],
                'date_of_birth'=>$_POST['date_of_birth'],
                'profile_image'=>$vid_img,
                'date_of_birth'=>$_POST['date_of_birth'],
                'user_id'=> $getlast,
                'address'=> $_POST['address'],
                'title'=> $_POST['title'],
                'father_name'=> $_POST['father_name'],
                'mobile_number'=> $_POST['mobile_number'],
                'whatsapp_number'=> $_POST['whatsapp_number'],
                'active_status'=> $_POST['active_status'],
                'created_date'=>date('Y-m-d H:i:s'),
                    'created_by'=>Yii::app()->user->name,
                    )


        );

                $url = Yii::app()->createUrl('Users/admin');
            Yii::app()->request->redirect($url);


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
        $model = $this->loadModel($id);
        print_r($model->getErrors());


        // $model= Users::model()->findAll();
 // echo "<pre>";
 // print_r($_POST);exit;

        // echo "helo".$model->name;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model),
       /* */
        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
 // print_r($_POST);exit;

            $save_users = Yii::app()->db->createCommand()
                ->update('users',
                    array('username' => $_POST['Users']['username'],
                        'role_id' => $_POST['Users']['role_id'],

                        'email' => $_POST['Users']['email'],

                        'password' =>md5(($_POST['Users']['password'])),
                       ),
                    'id=:id',
                    array(':id' => $id)
                );

        //    print_r($save_users);exit;
            if ($save_users) {
                $vid_img = time() . $_FILES['profile_image']['name'];
                if (!empty($_FILES['profile_image'])) {
                    /*move to the folder*/
                    $vid_img = time() . $_FILES['profile_image']['name'];/*here using time for different different image*/
                    $move = Yii::app()->basePath . '/upload/' . $vid_img;
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], $move);

                }
               /* echo "<pre>";
                print_r($_POST);
                echo $vid_img;
                exit;*/
                $update = Yii::app()->db->createCommand()
                    ->update('espl_employee_details',
                        array('name' => $_POST['name'],
                            'date_of_birth' => $_POST['date_of_birth'],
                            'profile_image' => $vid_img,
                            'date_of_birth' => $_POST['date_of_birth'],
                            'user_id' => $id,
                            'address' => $_POST['address'],
                            'title' => $_POST['title'],
                            'father_name' => $_POST['father_name'],
                            'mobile_number' => $_POST['mobile_number'],
                            'whatsapp_number' => $_POST['whatsapp_number'],
                            'active_status' => $_POST['active_status'],
                            'created_date' => date('Y-m-d H:i:s'),
                            'created_by'=>Yii::app()->user->name,
                            ),

                        'user_id=:user_id',
                        array(':user_id' => $id)
                    );

               echo $update;
                //$this->redirect(array('view', 'id' => $model->id));
                $url = Yii::app()->createUrl('Users/admin');
                Yii::app()->request->redirect($url);

            }
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
        $model->unsetAttributes(); // clear any default values
        if(isset($_GET['Users']))
            $model->attributes=$_GET['Users'];
        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
        $this->render('admin',array(
            'model'=>$model,
            //'model'=>$this->loadModel($id),
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

        //print_r($model);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    public function actioncombo_off($id){
      //  echo $id;

       // print_r($_POST);

        $this->layout = false;

        $this->render('/include/dashboard_header');
        $this->render('/include/dashboard_leftbar');
        $this->render('comboffusers');
        $this->render('/include/dashboard_footer');
        if(isset($_POST)){
            $leaveupdate = Yii::app()->db->createCommand()
                ->update(
                    'espl_employee_details',
                    array(
                        'comobo_off' => $_POST['allotcombleave'],

                    ),
                    'user_id=:user_id',
                    array(':user_id' => $id)
                );


        }

        if($leaveupdate)

            $this->actionAdmin();
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
