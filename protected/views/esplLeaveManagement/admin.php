            <?php
            /* @var $this EsplLeaveManagementController */
            /* @var $model EsplLeaveManagement */

            $this->breadcrumbs=array(
            'Espl Leave Managements'=>array('index'),
            'Manage',
            );

            $this->menu=array(
            array('label'=>'List EsplLeaveManagement', 'url'=>array('index')),
            array('label'=>'Create EsplLeaveManagement', 'url'=>array('create')),
            );

            Yii::app()->clientScript->registerScript('search', "
            $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
            });
            $('.search-form form').submit(function(){
            $('#espl-leave-management-grid').yiiGridView('update', {
            data: $(this).serialize()
            });
            return false;
            });
            ");
            ?>
            <div class="content">
            <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
            <i class="material-icons">assignment</i>
            </div>


            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-right">



                    <?php   foreach(Yii::app()->user->getFlashes() as $key => $message) {
                        echo '<span class="form-control"><h4 class="flash-' . $key . '">' . $message . "</h4>\n</span>";
                    } ?>








            <?php

            $this->beginWidget('zii.bootstrap.widgets.TbModal', array('id'=>'myModal'));

            echo '<div id="form-modal" class="modal-body">';


            echo '<div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Fill Your Leave Details</h4>
            </div>
            <div class="modal-body">
            <div class="well">
            
            
            
            
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
            <h4 class="card-title text-left">Apply Leave</h4>
            </div>' ?>

                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'espl-leave-management-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>True,
                            'enableClientValidation' => true,
                           'clientOptions'=>array('validateOnSubmit'=>true),
                            'htmlOptions'=>array(
                                'onsubmit'=>"send();",/* Disable normal form submit */
                              //  'onkeypress'=>"send();" /* Do ajax call when user presses enter key */
                            ),

                        )); ?>


                        <div class="card-body ">
                            <div class="form-group">
                                <?php echo $form->errorSummary($model); ?>
                                <div class="row">
                                    <?php
                                        echo $form->labelEx($model,'leave_type');?>
                                    <?php
                                    $data = CHtml::listData(EsplLeaves::model()->findAll(), 'id', 'leave_name');
                                    $htmlOptions =     array('size' => '1', 'prompt'=>'-- select leave --',
                                        'class'=>"form-control",'selected'=>'selected','ajax' => array(
                                        'type'=>'POST', //request type
                                        'url'=>CController::createUrl('EsplLeaveManagement/leaves_number'), //url to call.
                                        //Style: CController::createUrl('currentController/methodToCall')
                                        //'update'=>'#service_sub_category', //selector to update
                                        'data'=>array('leave_type'=>'js:this.value'),
                                        //leave out the data key to pass all form values through
                                        'success'=>'js:function(data1){  
                                         
                                         var test= document.getElementById("EsplLeaveManagement_leave_type").value;
                                         if(test!=6){
                                             $("#total_leaves").val(data1); 
                                         }
                                                                             
                                   
                                            return false;
                                        }'

                                    ) );
                                    echo $form->listBox($model,'leave_type', $data, $htmlOptions);
                                    echo $form->error($model,'leave_type');
                                    ?>
                                    <?php   $x= Yii::app()->user->id;$data1 = Yii::app()->db->createCommand()
                                        ->select('e.id, e.name,e.comobo_off')
                                        ->from('espl_employee_details as e')
                                        ->where('e.user_id="'.$x.'"')
                                        ->queryAll();

                                    foreach ($data1 as $combo){



                                  //  echo $combo['comobo_off'];

                                    ?>

                                    <?php if($combo['comobo_off'] >='0'){?>
                                        <input type="hidden" id="total_leaves" name="total_leaves" value="<?php echo $combo['comobo_off'];?>">
                                    <?php }else{?>
                                        <input type="hidden" id="total_leaves" name="total_leaves" value="">
                                    <?php } }?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'subject'); ?>
                                    <?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_name",'required'=>"true")); ?>
                                    <?php echo $form->error($model,'subject'); ?>
                                </div>


                                <div class="row">
                                    <?php echo $form->labelEx($model,'from_date'); ?>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplLeaveManagement[from_date]',
                                        //'value'=>Yii::app()->getRequest()->getParam("from_date"),
                                        'value'=>(isset(Yii::app()->request->cookies['from_date'])) ? Yii::app()->request->cookies['from_date']->value : '',
                                        'model' => $model,
                                        'attribute' => 'from_date',//this to insert the value from the field
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

                                    <?php echo $form->error($model,'from_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'to_date'); ?>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplLeaveManagement[to_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("to_date"),
                                        'model' => $model,
                                        'attribute' => 'to_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'to_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'message'); ?>
                                    <?php echo $form->textArea($model,'message',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_name",'required'=>"true")); ?>
                                    <?php echo $form->error($model,'message'); ?>
                                </div>



                                <!--<div class="row buttons">
                                    <?php /*echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); */?>
                                </div>
            --> <div class="row buttons">
                                    <div class="row buttons">
                                        <?php echo CHtml::Button('SUBMIT',array('onclick'=>'send();')); ?>
                                    </div>
                                </div>
                                <?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>

            </div>
            </div>
            <div class="modal-footer">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
            </div>
            </div>
            </div>';
            <?php echo '</div>';

            $this->endWidget();


            // button to show the modal

            $this->widget('zii.bootstrap.widgets.TbButton', array(

            'label' => 'Apply Leave',

            'url' => '#myModal',

            'type' => 'primary',

            'size' => 'small', // '', 'large', 'small' or 'mini'

            'htmlOptions' => array(

            'data-toggle' => 'modal',

            ),

            ));




            ?>

            </div></div>




            <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
            <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
            'model'=>$model,
            )); ?>
            </div><!-- search-form -->

            <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'espl-leave-management-grid',
            'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            //'id',
            'name',
                'leave_name',
                'leave_request_days',
            'from_date',
            'to_date',

                'approved_by',
                'leave_status',
               // 'value' => '($data->leave_status == "pending")?Pending',
            /*
            'modified_date',
            */

            array(
            'class'=>'CButtonColumn',
            'header' => 'Action',
            'template'=>'{Approved}{update}{Partial}{Cancel}',
            'buttons'=>array(
               'Approved'=>array(
                     //'label'=> '<a href="#myModalnew" class="btn btn-sm" data-toggle="modal">Partially Approved</a>',
                    'label'=>'<button class="btn btn-small btn-rose">Approve</button>',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                    'visible'=>'Yii::app()->user->role == "Admin"?true :false',
                   // 'click' => 'js:function() { alert($data->id); return false;}',
                    'url'   => 'Yii::app()->createUrl("esplLeaveManagement/approved", array("id" => $data->id))',

                ),

            'update'=>array(
            'label'=>'<button class="btn btn-small btn-rose">Edit</button>',
            'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
            'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like'),
                 'visible'=>'Yii::app()->user->role != "Admin"?true:false',
            ),
               'Cancel'=>array(
                     //'label'=> '<a href="#myModalnew" class="btn btn-sm" data-toggle="modal">Partially Approved</a>',
                    'label'=>'<button class="btn btn-small btn-rose">Cancel</button>',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                    'visible'=>'Yii::app()->user->role == "Admin"?true:false    ',
                  //  'click' => 'js:function() { alert($data->id); return false;}',
                    'url'   => 'Yii::app()->createUrl("esplLeaveManagement/cancel", array("id" => $data->id))',
               ),
                'Partial'=>array(
                    //'label'=> '<a href="#myModalnew" class="btn btn-sm" data-toggle="modal">Partially Approved</a>',
                    'label'=>'<button class="btn btn-small btn-rose">Partial </button>',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                    'visible'=>'Yii::app()->user->role == "Admin"?true:false   ',
                   // 'click' => 'js:function() { alert($data->id); return false;}',
                    'url'   => 'Yii::app()->createUrl("esplLeaveManagement/partial", array("id" => $data->id))',
                ),

            ),
            ),
            ),
            )); ?>

            </div>
            </div></div>
            </div></div>
            </div>
            </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#myModal").on('shown.bs.modal', function(){
                            $(this).find('input[type="text"]').focus();
                        });

                    });


            function send()
            {

            //  console.log("test");

            var data=$("#espl-leave-management-form").serialize();


            $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("EsplLeaveManagement/create"); ?>',
            data:data,
            success:function(data){

              // var result = JSON.parse(data);

            console.log(data);
            if(data == 1){
                alert("You are not allowed to take more than the leaves allocated");

            }else if(data == 'done'){
                    window.location.href= "<?php echo Yii::app()->request->baseUrl; ?>/EsplLeaveManagement/admin";
            }else
            {
                alert("you have only " + data + " leaves left");
            }

            },
            error: function(data) { // if error occured
            alert("Error occured.please try again");
            alert(data);
            },

            dataType:'html'
            });

            }

            </script>

            <script type="text/javascript">

            /*   var dom = {};
            dom.query = jQuery.noConflict(true);*/
            $.noConflict();
            jQuery.noConflict();
            </script>

            <!-- View Popup ends -->