<?php
/* @var $this ServiceSubCategoryController */
/* @var $model ServiceSubCategory */

$this->breadcrumbs=array(
	'Service Sub Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceSubCategory', 'url'=>array('index')),
	array('label'=>'Create ServiceSubCategory', 'url'=>array('create')),
	array('label'=>'View ServiceSubCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ServiceSubCategory', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>