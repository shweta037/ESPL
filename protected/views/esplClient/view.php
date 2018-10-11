<?php
/* @var $this EsplClientController */
/* @var $model EsplClient */

$this->breadcrumbs=array(
	'Espl Clients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplClient', 'url'=>array('index')),
	array('label'=>'Create EsplClient', 'url'=>array('create')),
	array('label'=>'Update EsplClient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplClient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplClient', 'url'=>array('admin')),
);
?>

<h1>View EsplClient #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_name',
		'client_email',
		'client_address',
		'client_phone_number',
		'created_date',
		'modified_date',
	),
)); ?>
