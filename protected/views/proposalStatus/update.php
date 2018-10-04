<?php
/* @var $this ProposalStatusController */
/* @var $model ProposalStatus */

$this->breadcrumbs=array(
	'Proposal Statuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProposalStatus', 'url'=>array('index')),
	array('label'=>'Create ProposalStatus', 'url'=>array('create')),
	array('label'=>'View ProposalStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProposalStatus', 'url'=>array('admin')),
);
?>

<h1>Update ProposalStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>