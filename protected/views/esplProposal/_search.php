<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'service_category'); ?>
		<?php echo $form->textField($model,'service_category',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'service_sub_category'); ?>
		<?php echo $form->textField($model,'service_sub_category',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_scale'); ?>
		<?php echo $form->textField($model,'project_scale',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_type'); ?>
		<?php echo $form->textField($model,'project_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposal_number'); ?>
		<?php echo $form->textField($model,'proposal_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposal_issue_date'); ?>
		<?php echo $form->textField($model,'proposal_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposa_revision_number'); ?>
		<?php echo $form->textField($model,'proposa_revision_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_country'); ?>
		<?php echo $form->textField($model,'client_country',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposal_status'); ?>
		<?php echo $form->textField($model,'proposal_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_signed'); ?>
		<?php echo $form->textField($model,'contract_signed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_value'); ?>
		<?php echo $form->textField($model,'contract_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contract_value_currency'); ?>
		<?php echo $form->textField($model,'contract_value_currency',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_representative_name'); ?>
		<?php echo $form->textField($model,'client_representative_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_representative_email'); ?>
		<?php echo $form->textField($model,'client_representative_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_representative_phone'); ?>
		<?php echo $form->textField($model,'client_representative_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_title'); ?>
		<?php echo $form->textField($model,'project_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_external_number'); ?>
		<?php echo $form->textField($model,'project_external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'team_lead'); ?>
		<?php echo $form->textField($model,'team_lead'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->