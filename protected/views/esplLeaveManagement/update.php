<?php
/* @var $this EsplLeaveManagementController */
/* @var $model EsplLeaveManagement */

$this->breadcrumbs=array(
	'Espl Leave Managements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplLeaveManagement', 'url'=>array('index')),
	array('label'=>'Create EsplLeaveManagement', 'url'=>array('create')),
	array('label'=>'View EsplLeaveManagement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplLeaveManagement', 'url'=>array('admin')),
);
?>

<h1>Update EsplLeaveManagement <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>