<?php
/* @var $this ProposalStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proposal Statuses',
);

$this->menu=array(
	array('label'=>'Create ProposalStatus', 'url'=>array('create')),
	array('label'=>'Manage ProposalStatus', 'url'=>array('admin')),
);
?>

<h1>Proposal Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
