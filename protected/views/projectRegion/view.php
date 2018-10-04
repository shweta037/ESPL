<?php
/* @var $this ProjectRegionController */
/* @var $model ProjectRegion */

$this->breadcrumbs=array(
	'Project Regions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectRegion', 'url'=>array('index')),
	array('label'=>'Create ProjectRegion', 'url'=>array('create')),
	array('label'=>'Update ProjectRegion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectRegion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectRegion', 'url'=>array('admin')),
);
?>

<!--<h1>View ProjectRegion #<?php /*echo $model->id; */?></h1>-->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'region_name',
		'is_deleted',
		'created_date',
		'modified_date',
	),
)); ?>
