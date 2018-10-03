<?php
/* @var $this MethodologiesCategoryController */
/* @var $model MethodologiesCategory */

$this->breadcrumbs=array(
	'Methodologies Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MethodologiesCategory', 'url'=>array('index')),
	array('label'=>'Create MethodologiesCategory', 'url'=>array('create')),
	array('label'=>'View MethodologiesCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MethodologiesCategory', 'url'=>array('admin')),
);
?>

<!--<h1>Update MethodologiesCategory <?php /*echo $model->id; */?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>