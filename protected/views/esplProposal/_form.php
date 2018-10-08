<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'espl-proposal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_category'); ?>
		<?php echo $form->textField($model,'service_category',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_sub_category'); ?>
		<?php echo $form->textField($model,'service_sub_category',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'service_sub_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_scale'); ?>
		<?php echo $form->textField($model,'project_scale',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'project_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_type'); ?>
		<?php echo $form->textField($model,'project_type',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'project_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_number'); ?>
		<?php echo $form->textField($model,'proposal_number'); ?>
		<?php echo $form->error($model,'proposal_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_issue_date'); ?>
		<?php echo $form->textField($model,'proposal_issue_date'); ?>
		<?php echo $form->error($model,'proposal_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposa_revision_number'); ?>
		<?php echo $form->textField($model,'proposa_revision_number'); ?>
		<?php echo $form->error($model,'proposa_revision_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_country'); ?>
		<?php echo $form->textField($model,'client_country',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_status'); ?>
		<?php echo $form->textField($model,'proposal_status'); ?>
		<?php echo $form->error($model,'proposal_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_signed'); ?>
		<?php echo $form->textField($model,'contract_signed'); ?>
		<?php echo $form->error($model,'contract_signed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_value'); ?>
		<?php echo $form->textField($model,'contract_value'); ?>
		<?php echo $form->error($model,'contract_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_value_currency'); ?>
		<?php echo $form->textField($model,'contract_value_currency',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'contract_value_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_name'); ?>
		<?php echo $form->textField($model,'client_representative_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_representative_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_email'); ?>
		<?php echo $form->textField($model,'client_representative_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_representative_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_phone'); ?>
		<?php echo $form->textField($model,'client_representative_phone'); ?>
		<?php echo $form->error($model,'client_representative_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'client_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_title'); ?>
		<?php echo $form->textField($model,'project_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'project_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_external_number'); ?>
		<?php echo $form->textField($model,'project_external_number'); ?>
		<?php echo $form->error($model,'project_external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_lead'); ?>
		<?php echo $form->textField($model,'team_lead'); ?>
		<?php echo $form->error($model,'team_lead'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
		<?php echo $form->error($model,'created_by'); ?>
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