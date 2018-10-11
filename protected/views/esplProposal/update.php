<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */

$this->breadcrumbs=array(
	'Espl Proposals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplProposal', 'url'=>array('index')),
	array('label'=>'Create EsplProposal', 'url'=>array('create')),
	array('label'=>'View EsplProposal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplProposal', 'url'=>array('admin')),
);
?>

<!--<h1>Update EsplProposal <?php /*echo $model->id; */?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>