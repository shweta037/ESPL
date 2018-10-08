<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */

$this->breadcrumbs=array(
	'Espl Proposals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EsplProposal', 'url'=>array('index')),
	array('label'=>'Create EsplProposal', 'url'=>array('create')),
	array('label'=>'Update EsplProposal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EsplProposal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EsplProposal', 'url'=>array('admin')),
);
?>

<h1>View EsplProposal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'service_type',
		'service_category',
		'service_sub_category',
		'project_scale',
		'project_type',
		'proposal_number',
		'proposal_issue_date',
		'proposa_revision_number',
		'client_name',
		'client_country',
		'proposal_status',
		'contract_signed',
		'contract_value',
		'contract_value_currency',
		'client_representative_name',
		'client_representative_email',
		'client_representative_phone',
		'client_address',
		'project_title',
		'project_external_number',
		'team_lead',
		'created_date',
		'created_by',
		'modified_date',
	),
)); ?>
