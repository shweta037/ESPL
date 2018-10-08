<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */

$this->breadcrumbs=array(
	'Espl Proposals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplProposal', 'url'=>array('index')),
	array('label'=>'Manage EsplProposal', 'url'=>array('admin')),
);
?>

<h1>Create EsplProposal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>