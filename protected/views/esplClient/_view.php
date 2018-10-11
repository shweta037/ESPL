<?php
/* @var $this EsplClientController */
/* @var $data EsplClient */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_email')); ?>:</b>
	<?php echo CHtml::encode($data->client_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_address')); ?>:</b>
	<?php echo CHtml::encode($data->client_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->client_phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />


</div>