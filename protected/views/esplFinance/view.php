<?php
/* @var $this EsplFinanceController */
/* @var $model EsplFinance */

$this->breadcrumbs=array(
	'Espl Finances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplFinance', 'url'=>array('index')),
	array('label'=>'Create EsplFinance', 'url'=>array('create')),
	array('label'=>'Update EsplFinance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplFinance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplFinance', 'url'=>array('admin')),
);
?>

<h1>View EsplFinance #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_id',
		'registerd_issue_date',
		'travel_invoice_due_date',
		'created_by',
		'created_date',
		'modified_date',
	),
)); ?>
