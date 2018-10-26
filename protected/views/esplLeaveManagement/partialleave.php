<?php
/**
 * Created by PhpStorm.
 * User: shweta
 * Date: 24/10/18
 * Time: 11:40 AM
 */?>

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
                            <h4 class="card-title">Partial Leave Approval (
                                <?php   $x = CHttpRequest::getParam('id');

                                              $data1 = Yii::app()->db->createCommand()
                                            ->select('e.to_date, e.from_date')
                                            ->from('espl_leave_management as e')
                                            ->where('e.id="'.$x.'"')
                                            ->queryAll();


                                              foreach($data1 as $value){

                                              echo "Leave Request From   &nbsp;".date("d-F",strtotime($value['to_date']) )." to ".date("d-F",strtotime($value['from_date']));}

                                              ?>)
                            </h4>

                        <!--  --><?php /*  foreach(Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<span class="form-control"><h4 class="flash-' . $key . '">' . $message . "</h4>\n</span>";
                            } */?>
                        </div>

                        <input type="hidden" name="leave_to_date" value="<?php echo $value['to_date']?>" />
                        <input type="hidden" name="leave_from_date" value="<?php echo $value['from_date']?>" />

                        <?php   /* $model='EsplLeaveManagement';$form=$this->beginWidget('CActiveForm', array(
                            'id'=>'users-form',
                           // 'url'=>'EsplLeaveManagement/admin',

                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>false,
                        ));*/


                        $model='EsplLeaveManagement';
                        ?>
                        <form action="<?php echo Yii::app()->request->baseUrl?>/EsplLeaveManagement/partialapprove" method="post"  id="users-form">
                        <div class="card-body ">
                            <div class="form-group row">
                                <div class="col-md-10">

                                    <label>Employee Name</label>
                                    <?php  $x = CHttpRequest::getParam('id');

                                    $data1 = Yii::app()->db->createCommand()
                                        ->select('d.name,e.subject')
                                        ->from('espl_leave_management as e')
                                        ->join('espl_employee_details as d','d.user_id=e.user_id')
                                        ->where('e.id="'.$x.'"')
                                        ->queryAll();

                                    foreach($data1 as $empname){

                                    }
                                    ?>
                                    <input type="text" class="form-control" id="" value="<?php echo $empname['name']?>" name="name" readonly>

                                    <label>Subject</label>
                                    <input type="text" class="form-control" value="<?php echo $empname['subject']?>" name="subject" readonly>

                                    <input type="hidden" class="form-control" value="<?php echo $x;?>" name="id" readonly>
                                    <label>From Date</label>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>

                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'from_date',
                                        'model'=>$model,
                                        'id'=>'from_date',
                                        'value'=>(isset(Yii::app()->request->cookies['from_date'])) ? Yii::app()->request->cookies['from_date']->value : '',
                                      //  'model' => $model,
                                        'attribute' => 'from_date',//this to insert the value from the field
                                        'flat'=>false,//remove to hide the datepicker
                                        'options'=>array(
                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'yearRange'=>'2000:2099',
                                            'minDate' => '2000-01-01',      // minimum date
                                            'maxDate' => '2099-12-31',
                                        ),
                                        'htmlOptions'=>array(
                                            'style'=>'',
                                            'class'=>"form-control "
                                        ),
                                    ));?>

                                    <label>To Date</label>
                                    <?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
                                    <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'to_date',
                                        'id'=>'to_date',
                                        'value'=>Yii::app()->getRequest()->getParam("to_date"),
                                        //  'model' => $model,
                                        'attribute' => 'to_date',//this to insert the value from the field
                                        'flat'=>false,//remove to hide the datepicker
                                        'options'=>array(
                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            'changeMonth'=>true,
                                            'changeYear'=>true,
                                            'yearRange'=>'2000:2099',
                                            'minDate' => '2000-01-01',      // minimum date
                                            'maxDate' => '2099-12-31',
                                        ),
                                        'htmlOptions'=>array(
                                            'style'=>'',
                                            'class'=>"form-control "
                                        ),
                                    ));?>




                                    <?php echo CHtml::button( 'Save',array('class'=>"btn btn-rose", 'onclick'=>"return checkdate();")); ?>
                                    <?php //$this->endWidget(); ?>

                                </div><!-- form -->
                            </div>
                        </div></div></div></div></div></div>

    <script type="text/javascript">
        function checkdate() {
           // alert("hello");
     /*   var first_to_date = parseInt(document.getElementById('leave_to_date').value);
            var first_from_date = parseInt(document.getElementById('leave_from_date').value);
            var second_to_date = parseInt(document.getElementById('to_date'));
            var second_from_date = parseInt(document.getElementById('from_date'));*/

          //  alert("the to date is " + second_to_date + "the from date "+ second_from_date);
            $("#users-form").submit();

           // window.location.href = '<?php // echo Yii::app()->createUrl('users/admin');?>';
        }
    </script>