<?php
/* @var $this EsplLeaveManagementController */
/* @var $model EsplLeaveManagement */

$this->breadcrumbs=array(
	'Espl Leave Managements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplLeaveManagement', 'url'=>array('index')),
	array('label'=>'Manage EsplLeaveManagement', 'url'=>array('admin')),
);
?>

<h1>Create EsplLeaveManagement</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>