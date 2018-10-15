<?php
/* @var $this EsplProjectController */
/* @var $data EsplProject */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_id')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_region_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mandatory_sector')); ?>:</b>
	<?php echo CHtml::encode($data->mandatory_sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conditional_sector')); ?>:</b>
	<?php echo CHtml::encode($data->conditional_sector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('technical_area')); ?>:</b>
	<?php echo CHtml::encode($data->technical_area); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('technical_expert_id')); ?>:</b>
	<?php echo CHtml::encode($data->technical_expert_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('methodological_expert_id')); ?>:</b>
	<?php echo CHtml::encode($data->methodological_expert_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('financial_expert_id')); ?>:</b>
	<?php echo CHtml::encode($data->financial_expert_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('local_expert_id')); ?>:</b>
	<?php echo CHtml::encode($data->local_expert_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publication_date')); ?>:</b>
	<?php echo CHtml::encode($data->publication_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_visit_completed_date')); ?>:</b>
	<?php echo CHtml::encode($data->site_visit_completed_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('findings_issued_date')); ?>:</b>
	<?php echo CHtml::encode($data->findings_issued_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('draft_report_issued')); ?>:</b>
	<?php echo CHtml::encode($data->draft_report_issued); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('final_report_issued')); ?>:</b>
	<?php echo CHtml::encode($data->final_report_issued); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submission_date')); ?>:</b>
	<?php echo CHtml::encode($data->submission_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('completeness_check_date')); ?>:</b>
	<?php echo CHtml::encode($data->completeness_check_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ir_check_date')); ?>:</b>
	<?php echo CHtml::encode($data->ir_check_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>