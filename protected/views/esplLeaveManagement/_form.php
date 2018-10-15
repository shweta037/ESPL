<?php
/* @var $this EsplLeaveManagementController */
/* @var $model EsplLeaveManagement */
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
                            <h4 class="card-title">Apply Leave</h4>
                        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'espl-leave-management-form',
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
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_name",'required'=>"true")); ?>
		<?php echo $form->error($model,'subject'); ?>
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
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textField($model,'message',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_name",'required'=>"true")); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div></div></div></div></div></div>