<?php
/* @var $this EsplRoleController */
/* @var $model EsplRole */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'espl-role-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'role_name'); ?>
		<?php echo $form->textField($model,'role_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'role_name'); ?>
	</div>

	<div class="row">

        <?php
        echo $form->labelEx($model,'permission');?></label>
        <?php $data = CHtml::listData(Status::model()->findAll(array("condition"=>"id IN (3,4,5,6)")), 'id', 'status_name');
        $htmlOptions =     array('size' => '1', 'prompt'=>'-- select Permission --','class'=>"form-control",'selected'=>'selected', 'multiple' => 'multiple');
      // print_r($data);
        echo $form->dropDownList($model,'permission', $data, $htmlOptions);
        echo $form->error($model,'permission');
        ?>
	</div>

	<!--<div class="row">
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->