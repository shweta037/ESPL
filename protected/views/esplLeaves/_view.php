<?php
/* @var $this EsplLeavesController */
/* @var $data EsplLeaves */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leave_name')); ?>:</b>
	<?php echo CHtml::encode($data->leave_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_leaves')); ?>:</b>
	<?php echo CHtml::encode($data->total_leaves); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />


</div>