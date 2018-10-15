<?php
/* @var $this EsplLeaveManagementController */
/* @var $model EsplLeaveManagement */

$this->breadcrumbs=array(
	'Espl Leave Managements'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplLeaveManagement', 'url'=>array('index')),
	array('label'=>'Create EsplLeaveManagement', 'url'=>array('create')),
	array('label'=>'Update EsplLeaveManagement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplLeaveManagement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplLeaveManagement', 'url'=>array('admin')),
);
?>

<h1>View EsplLeaveManagement #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'subject',
		'to_date',
		'from_date',
		'message',
		'created_date',
		'modified_date',
	),
)); ?>
