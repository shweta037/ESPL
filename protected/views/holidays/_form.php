<?php
/* @var $this HolidaysController */
/* @var $model Holidays */
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
                            <h4 class="card-title">Add Holidays</h4>
                        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'holidays-form',
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
		<?php echo $form->labelEx($model,'holiday_name'); ?>
		<?php echo $form->textField($model,'holiday_name',array('size'=>60,'maxlength'=>512,'class'=>"form-control", 'id'=>"holiday_name",'required'=>"true")); ?>
		<?php echo $form->error($model,'holiday_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'holiday_date'); ?>
		<?php //echo $form->textField($model,'holiday_date',array('class'=>"form-control datepicker-Inline", 'id'=>"holiday_date",'required'=>"true")); ?>
        <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'Holidays[holiday_date]',
            'value'=>Yii::app()->getRequest()->getParam("holiday_date"),
            'model' => $model,
            'attribute' => 'holiday_date',//this to insert the value from the field
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
        <?php echo $form->error($model,'holiday_date'); ?>
	</div>

<!--	<div class="row">
		<?php /*echo $form->labelEx($model,'is_deleted'); */?>
		<?php /*echo $form->textField($model,'is_deleted'); */?>
		<?php /*echo $form->error($model,'is_deleted'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'created_date'); */?>
		<?php /*echo $form->textField($model,'created_date'); */?>
		<?php /*echo $form->error($model,'created_date'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'modified_date'); */?>
		<?php /*echo $form->textField($model,'modified_date'); */?>
		<?php /*echo $form->error($model,'modified_date'); */?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

                                    <?php $this->endWidget(); ?>

                                </div><!-- form -->
                            </div>
                        </div></div></div></div></div></div>