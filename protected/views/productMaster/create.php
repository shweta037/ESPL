<?php
/* @var $this ProductMasterController */
/* @var $model ProductMaster */

$this->breadcrumbs=array(
	'Product Masters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductMaster', 'url'=>array('index')),
	array('label'=>'Manage ProductMaster', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>