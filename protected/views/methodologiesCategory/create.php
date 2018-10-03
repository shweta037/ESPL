<?php
/* @var $this MethodologiesCategoryController */
/* @var $model MethodologiesCategory */

$this->breadcrumbs=array(
	'Methodologies Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MethodologiesCategory', 'url'=>array('index')),
	array('label'=>'Manage MethodologiesCategory', 'url'=>array('admin')),
);
?>
<!--
<h1>Create MethodologiesCategory</h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>