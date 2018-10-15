<?php
/* @var $this EsplLeaveManagementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Leave Managements',
);

$this->menu=array(
	array('label'=>'Create EsplLeaveManagement', 'url'=>array('create')),
	array('label'=>'Manage EsplLeaveManagement', 'url'=>array('admin')),
);
?>

<h1>Espl Leave Managements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
