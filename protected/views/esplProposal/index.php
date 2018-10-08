<?php
/* @var $this EsplProposalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Proposals',
);

$this->menu=array(
	array('label'=>'Create EsplProposal', 'url'=>array('create')),
	array('label'=>'Manage EsplProposal', 'url'=>array('admin')),
);
?>

<h1>Espl Proposals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
