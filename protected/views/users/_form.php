<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
/* @var $new_model EsplEmployeeDetails */
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">


                <div class="form">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">mail_outline</i>
                            </div>
                            <h4 class="card-title">Add Employee</h4>
                        </div>

                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'users-form',

                            'htmlOptions' => array(

                                'enctype' => 'multipart/form-data'

                            ),

                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>false,
                        ));



                        ?>
                        <div class="card-body ">
                            <div class="form-group row">
                                <div class="col-md-6">

                                    <?php echo $form->labelEx($model,'Role');
                                    $models = Role::model()->findAll(); //load the model from which u need the data
                                    $data = CHtml::listData($models, 'id', 'description');// fetch the column name from the table
                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Role--','class'=>"form-control",'selected'=>'selected' ,'required'=>'required' );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'role_id', $data, $htmlOptions);?>
                                    <?php echo $form->error($model,'role_id'); ?>
                                    <?php
                                    $employee_info = Yii::app()->db->createCommand()
                                        ->select('name ,address,father_name,title,profile_image,mobile_number,health_benifits,date_of_birth,profile_image')
                                        ->from('espl_employee_details')
                                        ->where('espl_employee_details.user_id=:id', array(':id'=>$model['id']))
                                        ->queryRow();
 // print_r($employee_info);
                                    ?>
                                    <label>Employee Name</label>
                                    <input type="text" name="name" value="<?php echo $employee_info['name']; ?>"  class="form-control" required />

                                    <?php //echo "<pre>";//print_r($model);?>
                                    <div class="errorMessage"></div>
                               
                                
                                    <label>Title</label>
                                    <input type="text" name="title"  value="<?php echo $employee_info['title']; ?>" class="form-control" required />
                                    <div class="errorMessage"></div>


                                
                                    <label>Father Name</label>
                                    <input type="text" name="father_name" value="<?php echo $employee_info['father_name']; ?>"  class="form-control" required />
                                    <div class="errorMessage"></div>


                                
                                    <label>User Name</label>
                                    <input type="text" name="Users[username]" value="<?php echo $model['username']; ?>"  class="form-control" required />
                                    <div class="errorMessage"></div>

                                
                                    <label>Email</label>
                                    <input type="text" name="Users[email]" value="<?php echo $model['email']; ?>" class="form-control" required />
                                    <div class="errorMessage"></div>

                                    <label>Password</label>
                                    <input type="password" name="Users[password]" value="<?php echo $model['password']; ?>" class="form-control" required />
                                    <div class="errorMessage"></div>



                                    <label> Address</label>
                                    <input type="text" name="address" value="<?php echo $employee_info['address']; ?>" class="form-control" required />
                                    <div class="errorMessage"></div>



             </div>

                                <div class="col-md-6">





                                    <label>Profile Image</label><br/>

                                    <div class="fileinput fileinput-new text-center col-md-12" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                           <!-- <img src="<?php /*echo Yii::app()->request->baseUrl; */?>/assets/img/image_placeholder.jpg" alt="...">-->
                                            <img src="<?php if(isset($employee_info['profile_image'])){echo Yii::app()->request->baseUrl; ?>/protected/upload/<?php echo $employee_info['profile_image'];}else{ echo Yii::app()->request->baseUrl; ?>/assets/img/image_placeholder.jpg<?php }?>" alt=""?>
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="profile_image" value="<?php echo $employee_info['profile_image']; ?>"  enctype ='multipart/form-data'/>
                          </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>

                                    <label>Date of Birth</label>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'date_of_birth',
                                        //'value'=>Yii::app()->getRequest()->getParam("date_of_birth"),
                                        'value'=>$employee_info["date_of_birth"],
                                        //'model' => $new_model,
                                        'attribute' => 'date_of_birth',//this to insert the value from the field
                                        'flat'=>false,//remove to hide the datepicker
                                        'options'=>array(
                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                        ),
                                        'htmlOptions'=>array(
                                            'style'=>'',
                                            'class'=>"form-control ",
                                          //  'value'=> $employee_info['date_of_birth'],

                                        ),
                                    ));?>



                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile_number"  value="<?php echo $employee_info['mobile_number']; ?>" class="form-control" required />
                                    <div class="errorMessage"></div>


                                    <label>Whats App Number</label>
                                    <input type="text" name="whatsapp_number"   class="form-control"/>
                                    <div class="errorMessage"></div>


                                    <label>Active Status</label>

                                    <?php $data1 = $data = Yii::app()->db->createCommand()->select('id, status_name')->from('status')->where('id IN (1,2)')->queryAll();;


                                    ?>

                                    <select class="form-control" name="active_status" required>
                                        <option class="form-control" selected="selected">----Please Select-----</option>
                                        <?php foreach ($data1 as $valstatus){
                                            $valueb[]=$valstatus;
                                           // print_r($data1);
                                            ?>

                                            <option value="<?php if(isset($valstatus['status_name']))echo $valstatus['status_name'] ?>" selected='selected'  class="dropdown-item"><?php echo $valstatus['status_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <label>Health Benefits</label>
                                    <input type="text" name="health_benefits" value="<?php echo $employee_info['health_benifits']?>"  class="form-control"/>
                                    <div class="errorMessage"></div>
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>

                                </div>


                                <?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>