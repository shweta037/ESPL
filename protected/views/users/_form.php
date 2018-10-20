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

                                    <label>Employee Name</label>
                                    <input type="text" name="name"  class="form-control" required />
                                    <div class="errorMessage"></div>
                               
                                
                                    <label>Title</label>
                                    <input type="text" name="title"   class="form-control" required />
                                    <div class="errorMessage"></div>


                                
                                    <label>Father Name</label>
                                    <input type="text" name="father_name"  class="form-control" required />
                                    <div class="errorMessage"></div>


                                
                                    <label>User Name</label>
                                    <input type="text" name="Users[username]"  class="form-control" required />
                                    <div class="errorMessage"></div>

                                
                                    <label>Email</label>
                                    <input type="text" name="Users[email]"  class="form-control" required />
                                    <div class="errorMessage"></div>

                                    <label>Password</label>
                                    <input type="password" name="Users[password]"  class="form-control" required />
                                    <div class="errorMessage"></div>



                                    <label> Address</label>
                                    <input type="text" name="address"  class="form-control" required />
                                    <div class="errorMessage"></div>



             </div>

                                <div class="col-md-6">





                                    <label>Profile Image</label><br/>

                                    <div class="fileinput fileinput-new text-center col-md-12" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                          <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="profile_image" enctype ='multipart/form-data'/>
                          </span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>

                                    <label>Date of Birth</label>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'date_of_birth',
                                        'value'=>Yii::app()->getRequest()->getParam("date_of_birth"),
                                        //'model' => $new_model,
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



                                    <label>Mobile Number</label>
                                    <input type="text" name="mobile_number"   class="form-control" required />
                                    <div class="errorMessage"></div>


                                    <label>Whats App Number</label>
                                    <input type="text" name="whatsapp_number"   class="form-control"/>
                                    <div class="errorMessage"></div>


                                    <label>Active Status</label>

                                    <?php $data1 = $data = Yii::app()->db->createCommand()->select('id, status_name')->from('status')->where('id IN (1,2)')->queryAll();;


                                    ?>

                                    <select class="form-control" name="active_status" required>
                                        <option class="form-control">----Please Select-----</option>
                                        <?php foreach ($data1 as $valstatus){
                                            $valueb[]=$valstatus;
                                           // print_r($data1);
                                            ?>

                                            <option value="<?php echo $valstatus['status_name'] ?>" class="dropdown-item"><?php echo $valstatus['status_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <label>Health Benefits</label>
                                    <input type="text" name="health_benefits"   class="form-control"/>
                                    <div class="errorMessage"></div>
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>

                                </div>


                                <?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>