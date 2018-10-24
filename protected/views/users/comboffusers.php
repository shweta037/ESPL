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
                            <h4 class="card-title">Add Combo Off</h4>
                        </div>

                        <?php $form=$this->beginWidget('CActiveForm', array(
                                     'id'=>'users-form',

                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'enableAjaxValidation'=>false,
                                    ));



                        ?>
<div class="card-body ">
    <div class="form-group row">
        <div class="col-md-10">
<label>Add Combo Off</label>
            <?php
            $models = EsplLeaves::model()->findAll(array("condition"=>"id=6"), 'id', 'leave_name'); //load the model from which u need the data
            $data = CHtml::listData($models, 'id', 'leave_name');// fetch the column name from the table
            /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
            $htmlOptions =     array( 'class'=>"form-control",'selected'=>'selected' ,'required'=>'required' );
            // print_r($data);

            foreach($models as $val){
               // print_r($val);
             //   exit;

            }
            echo $form->dropDownList($val,'leave_name', $data, $htmlOptions);?>
            <?php echo $form->error($val,'leave_name'); ?>
          <!--  --><?php
/*            $employee_info = Yii::app()->db->createCommand()
                ->select('name ,address,father_name,title,profile_image,mobile_number,health_benifits,date_of_birth,profile_image')
                ->from('espl_employee_details')
                ->where('espl_employee_details.user_id=:id', array(':id'=>$model['id']))
                ->queryRow();
            // print_r($employee_info);
            */?>
            <label>Employee Name</label>
            <?php  $x = CHttpRequest::getParam('id');

/*
            SELECT e.id, e.name,e.comobo_off,(el.total_leaves-e.comobo_off)as leftCombo
FROM `espl_employee_details` e left join espl_leave_management as l on l.user_id=e.user_id left JOIN espl_leaves as el on el.id = l.leave_type
WHERE e.user_id="2" GROUP by e.user_id*/
            $data1 = Yii::app()->db->createCommand()
                ->select('e.id, e.name,e.comobo_off')
                ->from('espl_employee_details as e')

                // ->leftjoin('espl_leave_management as l' , 'l.user_id=e.user_id')
                  //  ->LEFTJOIN('espl_leaves as el' , 'el.id = l.leave_type')
                ->where('e.user_id="'.$x.'"')
                ->group('e.user_id')
                ->queryAll();?>

            <select class="form-control" name="active_status" required>
                <option class="form-control" selected="selected">----Please Select-----</option>
                <?php foreach ($data1 as $valstatus){
                    $valueb[]=$valstatus;
                    // print_r($data1);
                    ?>

                    <option value="<?php if(isset($valstatus['name']))echo $valstatus['name'] ?>" selected='selected'  class="dropdown-item"><?php echo $valstatus['name'] ?></option>
                <?php } ?>
            </select>

            <?php //echo "<pre>";//print_r($model);?>
            <div class="errorMessage"></div>
           <?php  $total_leaves = Yii::app()->db->createCommand()
            ->select('e.id, e.total_leaves')
            ->from('espl_leaves as e')
            ->where('e.id = 6')

            ->queryAll();

            foreach($total_leaves as $totalleaves){

              }

           ?>
            <?php  $total_leave_requested = Yii::app()->db->createCommand()
                ->select('e.id, SUM(e.leave_request_days) as leave_request_days')
                ->from('espl_leave_management as e')
                ->where('e.leave_type = 6')
                ->andwhere('e.user_id = "'.$x.'"')
                ->queryAll();

            foreach($total_leave_requested as $totalleaverequested){

            }

            if(isset($totalleaverequested['leave_request_days'])){
                $leftcombo = $totalleaves['total_leaves']-$totalleaverequested['leave_request_days'];
            }else{
                $leftcombo = $totalleaves['total_leaves'];
            }

           // echo $leftcombo;

            ?>

             <input type="text" class="form-control" value="<?php echo $totalleaves['total_leaves']?>" name="total_leaves" readonly>

            <label>Left Combo Leave</label>
            <input type="text" class="form-control" value="<?php echo $leftcombo ?> " id ="combleave" name="combleave" readonly >

            <label>Allot Combo Leave</label>
            <input type="text" class="form-control" value=" "  id ="allotcombleave" name="allotcombleave">
            <?php echo CHtml::button( 'Save',array('class'=>"btn btn-rose", 'onclick'=>"send();")); ?>
            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div></div></div></div></div></div>

    <script>
        function send() {
            var leftleave = parseInt(document.getElementById('combleave').value);
            var allotcombleave = parseInt(document.getElementById('allotcombleave').value);
            if(allotcombleave !='' && (allotcombleave > leftleave)){
                    alert("Please specify less number of leaves then total leave left " );
                    return false;
            }else{
                $("#users-form").submit();

                window.location.href = '<?php echo Yii::app()->createUrl('users/admin');?>';

            }

        }
    </script>