<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */

$this->breadcrumbs=array(
	'Espl Proposals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EsplProposal', 'url'=>array('index')),
	array('label'=>'Create EsplProposal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#espl-proposal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Espl Proposals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'espl-proposal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'service_type',
		'service_category',
		'service_sub_category',
		'project_scale',
		'project_type',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
