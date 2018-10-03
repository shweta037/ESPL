<?php
/* @var $this MethodologiesCategoryController */
/* @var $model MethodologiesCategory */

$this->breadcrumbs=array(
	'Methodologies Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MethodologiesCategory', 'url'=>array('index')),
	array('label'=>'Create MethodologiesCategory', 'url'=>array('create')),
	array('label'=>'Update MethodologiesCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MethodologiesCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MethodologiesCategory', 'url'=>array('admin')),
);
?>

<!--<h1>View MethodologiesCategory #<?php /*echo $model->id; */?></h1>-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		'is_deleted',
		'created_date',
		'modified_date',
	),
)); ?>
