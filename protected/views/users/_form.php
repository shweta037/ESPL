<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
/* @var $new_model EsplEmployeeDetails */
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">


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
                            //'enctype' => 'multipart/form-data',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>false,
                        ));



                        ?>
                        <div class="card-body ">
                            <div class="form-group">

                                <div class="row">
                                    <label>User Name</label>
                                    <input type="text" name="Users[username]"  class="form-control"/>
                                    <div class="errorMessage"></div>
                                </div>

                                <div class="row">
                                    <label>Email</label>
                                    <input type="text" name="Users[email]"  class="form-control"/>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="row">
                                    <label>Password</label>
                                    <input type="text" name="Users[password]"  class="form-control"/>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="row">


                                    <label for="service_name" class="bmd-label-floating" >Employee Name</label>
                                    <?php $data = Yii::app()->db->createCommand()->select('user_id,name')->from('espl_employee_details')->queryAll();
                                    //  echo  yii::app()->user->getState('email');
                                    ?>
                                    <select class="form-control" name="EsplEmployeeDetails[name]">
                                        <option class="form-control">----Please Select-----</option>
                                        <?php foreach ($data as $val){
                                            $value[]=$val;?>

                                            <option value="<?php echo $val['name'] ?>" class="dropdown-item"><?php echo $val['name'] ?></option>
                                        <?php } ?>
                                    </select>


                                    <div class="errorMessage"></div>

                                </div>


                                <div class="row ">


                                    <label for="service_name" class="bmd-label-floating" >User Role</label>
                                    <?php $data = Yii::app()->db->createCommand()->select('id, role_name')->from('espl_role')->queryAll();

                                    ?>
                                    <select class="form-control" name="EsplEmployeeDetails[role_name]">
                                        <option class="form-control">----Please Select-----</option>
                                        <?php foreach ($data as $val){
                                            $value[]=$val;?>

                                            <option value="<?php echo $val['id'] ?>" class="dropdown-item"><?php echo $val['role_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="row">
                                    <label>Father Name</label>
                                    <input type="text" name="EsplEmployeeDetails[father_name]"  class="form-control"/>
                                    <div class="errorMessage"></div>
                                </div>
                                <div class="row">
                                    <label>Title</label>
                                    <input type="text" name="EsplEmployeeDetails[title]"   class="form-control"/>
                                    <div class="errorMessage"></div>

                                </div>
                                <div class="row">
                                    <label>Profile Image</label><br/>

                                    <div class="fileinput fileinput-new text-center col-md-4" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="EsplEmployeeDetails[profile_image]" enctype ='multipart/form-data'/>
                          </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>



                                    <?php /* $this->widget('CMultiFileUpload',
            array(
                'name'=>'EsplEmployeeDetails[profile_image]',
                'model'=>$new_model,
                'attribute' => 'profile_image',
                'accept'=>'jpg|gif|png|doc|docx|pdf',
                //'denied'=>'Only doc,docx,pdf and txt are allowed',
               // 'max'=>4,
               // 'remove'=>'[x]',
               // 'duplicate'=>'Already Selected',
                'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
            )
            )
        );
        */?>
                                    <div class="errorMessage"></div>

                                </div>

                                <div class="row">
                                    <label>Date of Birth</label>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplEmployeeDetails[date_of_birth]',
                                        'value'=>Yii::app()->getRequest()->getParam("date_of_birth"),
                                        'model' => $new_model,
                                        'attribute' => 'date_of_birth',//this to insert the value from the field
                                        'flat'=>false,//remove to hide the datepicker
                                        'options'=>array(
                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                        ),
                                        'htmlOptions'=>array(
                                            'style'=>'',
                                            'class'=>"form-control "
                                        ),
                                    ));?>

                                </div>
                                <div class="row">
                                    <label>Mobile Number</label>
                                    <input type="text" name="EsplEmployeeDetails[mobile_number]"   class="form-control"/>
                                    <div class="errorMessage"></div>

                                </div>
                                <div class="row">
                                    <label>Whats App Number</label>
                                    <input type="text" name="EsplEmployeeDetails[whatsapp_number]"   class="form-control"/>
                                    <div class="errorMessage"></div>

                                </div>
                                <div class="row">
                                    <label>Active Status</label>

                                    <?php $data1 = $data = Yii::app()->db->createCommand()->select('id, status_name')->from('status')->where('id IN (3,4,5,6)')->queryAll();;


                                    //  print_r($data['id']);

                                    // exit;
                                    ?>

                                    <select class="form-control" name="EsplEmployeeDetails[active_status]">
                                        <option class="form-control">----Please Select-----</option>
                                        <?php foreach ($data1 as $valstatus){
                                            $valueb[]=$valstatus;
                                            print_r($data1);
                                            ?>

                                            <option value="<?php echo $valstatus['status_name'] ?>" class="dropdown-item"><?php echo $valstatus['status_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>





                                <div class="row buttons">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
                                </div>

                                <?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>