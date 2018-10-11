<?php
/* @var $this EsplProposalController */
/* @var $data EsplProposal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />



	<b><?php echo CHtml::encode($data->getAttributeLabel('service_category')); ?>:</b>
	<?php echo CHtml::encode($data->service_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_sub_category')); ?>:</b>
	<?php echo CHtml::encode($data->service_sub_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_scale')); ?>:</b>
	<?php echo CHtml::encode($data->project_scale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_type')); ?>:</b>
	<?php echo CHtml::encode($data->project_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_number')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_issue_date')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_issue_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposa_revision_number')); ?>:</b>
	<?php echo CHtml::encode($data->proposa_revision_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_country')); ?>:</b>
	<?php echo CHtml::encode($data->client_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_status')); ?>:</b>
	<?php echo CHtml::encode($data->proposal_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_signed')); ?>:</b>
	<?php echo CHtml::encode($data->contract_signed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_value')); ?>:</b>
	<?php echo CHtml::encode($data->contract_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contract_value_currency')); ?>:</b>
	<?php echo CHtml::encode($data->contract_value_currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_representative_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_representative_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_representative_email')); ?>:</b>
	<?php echo CHtml::encode($data->client_representative_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_representative_phone')); ?>:</b>
	<?php echo CHtml::encode($data->client_representative_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_address')); ?>:</b>
	<?php echo CHtml::encode($data->client_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_title')); ?>:</b>
	<?php echo CHtml::encode($data->project_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_external_number')); ?>:</b>
	<?php echo CHtml::encode($data->project_external_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_lead')); ?>:</b>
	<?php echo CHtml::encode($data->team_lead); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>