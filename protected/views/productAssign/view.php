<?php
/* @var $this ProductAssignController */
/* @var $model ProductAssign */

$this->breadcrumbs=array(
	'Product Assigns'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductAssign', 'url'=>array('index')),
	array('label'=>'Create ProductAssign', 'url'=>array('create')),
	array('label'=>'Update ProductAssign', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductAssign', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductAssign', 'url'=>array('admin')),
);
?>

<h1>View ProductAssign #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'employe_id',
		'assign_date',
		'created_by',
		'created_date',
		'modified_date',
	),
)); ?>
