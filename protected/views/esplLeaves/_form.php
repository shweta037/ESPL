<?php
/* @var $this EsplLeavesController */
/* @var $model EsplLeaves */
/* @var $form CActiveForm */
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
    <h4 class="card-title">Create Leavs Details</h4>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'espl-leaves-form',
// Please note: When you enable ajax validation, make sure the corresponding
// controller action is handling ajax validation correctly.
// There is a call to performAjaxValidation() commented in generated controller code.
// See class documentation of CActiveForm for details on this.
'enableAjaxValidation'=>false,
)); ?>

<div class="card-body ">
    <div class="form-group">
        <?php echo $form->errorSummary($model); ?>

        <div class="row">
<?php echo $form->labelEx($model,'leave_name'); ?>
<?php echo $form->textField($model,'leave_name',array('size'=>60,'maxlength'=>256,'class'=>"form-control", 'id'=>"currency_name",'required'=>"true")); ?>
<?php echo $form->error($model,'leave_name'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'total_leaves'); ?>
<?php echo $form->textField($model,'total_leaves',array('size'=>60,'maxlength'=>256,'class'=>"form-control", 'id'=>"currency_name",'required'=>"true")); ?>
<?php echo $form->error($model,'total_leaves'); ?>
</div>



<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
</div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
</div></div></div></div></div></div>
<?php

$this->beginWidget('zii.bootstrap.widgets.TbModal', array('id'=>'myModal'));

echo '<div id="form-modal" class="modal-body">';


echo '<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Your Model header</h4>
        </div>
        <div class="modal-body">
            <div class="well">
               
                
                
                
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
    <h4 class="card-title">Create Leavs Details</h4>
</div>' ?>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'espl-leaves-form',

'enableAjaxValidation'=>true,
   // 'validateOnSubmit'=>true,
));
 ?>

<div class="card-body ">
    <div class="form-group">
        <?php echo $form->errorSummary($model); ?>

        <div class="row">
<?php echo $form->labelEx($model,'leave_name'); ?>
<?php echo $form->textField($model,'leave_name',array('size'=>60,'maxlength'=>256,'class'=>"form-control", 'id'=>"currency_name",'required'=>"true")); ?>
<?php echo $form->error($model,'leave_name'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'total_leaves'); ?>
<?php echo $form->textField($model,'total_leaves',array('size'=>60,'maxlength'=>256,'class'=>"form-control", 'id'=>"currency_name",'required'=>"true")); ?>
<?php echo $form->error($model,'total_leaves'); ?>
</div>




        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
        </div>

      <?php  $this->endWidget(); ?>

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

    'label' => 'Open modal',

    'url' => '#myModal',

    'type' => 'primary',

    'size' => 'small', // '', 'large', 'small' or 'mini'

    'htmlOptions' => array(

        'data-toggle' => 'modal',

    ),

));




?>
<script type="text/javascript">

    function send()
    {
alert("test");
        var data=$("#person-form-edit_person-form").serialize();


        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("EsplLeave/create"); ?>',
            data:data,
            success:function(data){
                alert(data);
            },
            error: function(data) { // if error occured
                alert("Error occured.please try again");
                alert(data);
            },

            dataType:'html'
        });

    }
</script>

<!-- View Popup ends -->
