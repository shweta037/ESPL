<?php
/* @var $this ProductAssignController */
/* @var $model ProductAssign */

$this->breadcrumbs=array(
	'Product Assigns'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductAssign', 'url'=>array('index')),
	array('label'=>'Manage ProductAssign', 'url'=>array('admin')),
);
?>

<h1>Create ProductAssign</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>