<?php
/* @var $this ProjectTimeSheetController */
/* @var $model ProjectTimeSheet */

$this->breadcrumbs=array(
	'Project Time Sheets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectTimeSheet', 'url'=>array('index')),
	array('label'=>'Create ProjectTimeSheet', 'url'=>array('create')),
	array('label'=>'Update ProjectTimeSheet', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectTimeSheet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectTimeSheet', 'url'=>array('admin')),
);
?>

<h1>View ProjectTimeSheet #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_id',
		'user_id',
		'time_hrs',
		'time_mins',
		'timesheet_date',
		'created_date',
		'modified_date',
	),
)); ?>
