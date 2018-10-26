<?php
/* @var $this ProjectTimeSheetController */
/* @var $data ProjectTimeSheet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_id')); ?>:</b>
	<?php echo CHtml::encode($data->project_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_hrs')); ?>:</b>
	<?php echo CHtml::encode($data->time_hrs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_mins')); ?>:</b>
	<?php echo CHtml::encode($data->time_mins); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timesheet_date')); ?>:</b>
	<?php echo CHtml::encode($data->timesheet_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>