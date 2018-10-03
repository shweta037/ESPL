<?php
/* @var $this MethodologiesController */
/* @var $model Methodologies */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Methodologies', 'url'=>array('index')),
	array('label'=>'Manage Methodologies', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>