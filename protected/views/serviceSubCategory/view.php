<?php
/* @var $this ServiceSubCategoryController */
/* @var $model ServiceSubCategory */

$this->breadcrumbs=array(
	'Service Sub Categories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ServiceSubCategory', 'url'=>array('index')),
	array('label'=>'Create ServiceSubCategory', 'url'=>array('create')),
	array('label'=>'Update ServiceSubCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ServiceSubCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceSubCategory', 'url'=>array('admin')),
);
?>

<h1>View ServiceSubCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'serviceId',
		'service_name',
		'is_deleted',
		'created_date',
		'modified_date',
	),
)); ?>
