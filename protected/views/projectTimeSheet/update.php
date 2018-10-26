<?php
/* @var $this ProjectTimeSheetController */
/* @var $model ProjectTimeSheet */

$this->breadcrumbs=array(
	'Project Time Sheets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectTimeSheet', 'url'=>array('index')),
	array('label'=>'Create ProjectTimeSheet', 'url'=>array('create')),
	array('label'=>'View ProjectTimeSheet', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectTimeSheet', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>