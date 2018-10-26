<?php
/* @var $this ProjectTimeSheetController */
/* @var $model ProjectTimeSheet */

$this->breadcrumbs=array(
	'Project Time Sheets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectTimeSheet', 'url'=>array('index')),
	array('label'=>'Manage ProjectTimeSheet', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>