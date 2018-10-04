<?php
/* @var $this ProposalStatusController */
/* @var $model ProposalStatus */

$this->breadcrumbs=array(
	'Proposal Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProposalStatus', 'url'=>array('index')),
	array('label'=>'Manage ProposalStatus', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>