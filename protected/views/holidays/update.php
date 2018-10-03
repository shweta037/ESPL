<?php
/* @var $this HolidaysController */
/* @var $model Holidays */

$this->breadcrumbs=array(
	'Holidays'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Holidays', 'url'=>array('index')),
	array('label'=>'Create Holidays', 'url'=>array('create')),
	array('label'=>'View Holidays', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Holidays', 'url'=>array('admin')),
);
?>

<!--<h1>Update Holidays <?php /*echo $model->id; */?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>