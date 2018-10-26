<?php
/* @var $this ProductMasterController */
/* @var $model ProductMaster */

$this->breadcrumbs=array(
	'Product Masters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductMaster', 'url'=>array('index')),
	array('label'=>'Create ProductMaster', 'url'=>array('create')),
	array('label'=>'View ProductMaster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductMaster', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>