<?php
/* @var $this MethodologiesController */
/* @var $model Methodologies */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Methodologies', 'url'=>array('index')),
	array('label'=>'Create Methodologies', 'url'=>array('create')),
	array('label'=>'Update Methodologies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Methodologies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Methodologies', 'url'=>array('admin')),
);
?>

<h1>View Methodologies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'name',
		'is_deleted',
		'created_date',
		'modified_date',
	),
)); ?>
