<?php
/* @var $this HolidaysController */
/* @var $model Holidays */

$this->breadcrumbs=array(
	'Holidays'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Holidays', 'url'=>array('index')),
	array('label'=>'Manage Holidays', 'url'=>array('admin')),
);
?>

<!--<h1>Create Holidays</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>