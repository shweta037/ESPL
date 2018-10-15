<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */
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
		<?php echo $form->label($model,'proposal_id'); ?>
		<?php echo $form->textField($model,'proposal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_region_id'); ?>
		<?php echo $form->textField($model,'project_region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_country_id'); ?>
		<?php echo $form->textField($model,'project_country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mandatory_sector'); ?>
		<?php echo $form->textField($model,'mandatory_sector',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'conditional_sector'); ?>
		<?php echo $form->textField($model,'conditional_sector',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'technical_area'); ?>
		<?php echo $form->textField($model,'technical_area',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'technical_expert_id'); ?>
		<?php echo $form->textField($model,'technical_expert_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'methodological_expert_id'); ?>
		<?php echo $form->textField($model,'methodological_expert_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'financial_expert_id'); ?>
		<?php echo $form->textField($model,'financial_expert_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'local_expert_id'); ?>
		<?php echo $form->textField($model,'local_expert_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publication_date'); ?>
		<?php echo $form->textField($model,'publication_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'site_visit_completed_date'); ?>
		<?php echo $form->textField($model,'site_visit_completed_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'findings_issued_date'); ?>
		<?php echo $form->textField($model,'findings_issued_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'draft_report_issued'); ?>
		<?php echo $form->textField($model,'draft_report_issued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'final_report_issued'); ?>
		<?php echo $form->textField($model,'final_report_issued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'submission_date'); ?>
		<?php echo $form->textField($model,'submission_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'completeness_check_date'); ?>
		<?php echo $form->textField($model,'completeness_check_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ir_check_date'); ?>
		<?php echo $form->textField($model,'ir_check_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
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