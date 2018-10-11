<?php
/* @var $this ServiceCategoryController */
/* @var $model ServiceCategory */

$this->breadcrumbs=array(
	'Service Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceCategory', 'url'=>array('index')),
	array('label'=>'Manage ServiceCategory', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>