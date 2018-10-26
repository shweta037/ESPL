<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */

$this->breadcrumbs=array(
	'Espl Projects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplProject', 'url'=>array('index')),
	array('label'=>'Create EsplProject', 'url'=>array('create')),
	array('label'=>'Update EsplProject', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplProject', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplProject', 'url'=>array('admin')),
);
?>

<h1>View EsplProject #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proposal_id',
		'project_region_id',
		'project_country_id',
		'mandatory_sector',
		'conditional_sector',
		'technical_area',
		'technical_expert_id',
		'methodological_expert_id',
		'financial_expert_id',
		'local_expert_id',

		'submission_date',
		'completeness_check_date',
		'ir_check_date',
		'created_date',
		'modified_date',
	),
)); ?>
