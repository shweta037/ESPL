<?php
/* @var $this EsplLeavesController */
/* @var $model EsplLeaves */

$this->breadcrumbs=array(
	'Espl Leaves'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplLeaves', 'url'=>array('index')),
	array('label'=>'Create EsplLeaves', 'url'=>array('create')),
	array('label'=>'Update EsplLeaves', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplLeaves', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplLeaves', 'url'=>array('admin')),
);
?>

<h1>View EsplLeaves #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'leave_name',
		'total_leaves',
		'created_date',
		'modified_date',
	),
)); ?>
