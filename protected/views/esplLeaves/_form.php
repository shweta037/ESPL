<?php
/* @var $this EsplLeavesController */
/* @var $model EsplLeaves */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'espl-leaves-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'leave_name'); ?>
		<?php echo $form->textField($model,'leave_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'leave_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_leaves'); ?>
		<?php echo $form->textField($model,'total_leaves',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'total_leaves'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->