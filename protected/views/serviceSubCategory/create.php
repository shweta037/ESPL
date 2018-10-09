<?php
/* @var $this ServiceSubCategoryController */
/* @var $model ServiceSubCategory */

$this->breadcrumbs=array(
	'Service Sub Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceSubCategory', 'url'=>array('index')),
	array('label'=>'Manage ServiceSubCategory', 'url'=>array('admin')),
);
?>

<h1>Create ServiceSubCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>