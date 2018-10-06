<?php
/* @var $this EsplRoleController */
/* @var $model EsplRole */

$this->breadcrumbs=array(
	'Espl Roles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplRole', 'url'=>array('index')),
	array('label'=>'Create EsplRole', 'url'=>array('create')),
	array('label'=>'Update EsplRole', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplRole', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplRole', 'url'=>array('admin')),
);
?>

<h1>View EsplRole #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'role_name',
		'permission',
		'created_date',
		'modified_date',
	),
)); ?>
