<?php
/* @var $this InvoiceStageController */
/* @var $model InvoiceStage */

$this->breadcrumbs=array(
	'Invoice Stages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List InvoiceStage', 'url'=>array('index')),
	array('label'=>'Create InvoiceStage', 'url'=>array('create')),
	array('label'=>'Update InvoiceStage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete InvoiceStage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InvoiceStage', 'url'=>array('admin')),
);
?>

<h1>View InvoiceStage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'stage_name',
		'is_deleted',
		'created_date',
		'modified_date',
	),
)); ?>
