<?php
/* @var $this ProjectRegionController */
/* @var $model ProjectRegion */

$this->breadcrumbs=array(
	'Project Regions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectRegion', 'url'=>array('index')),
	array('label'=>'Manage ProjectRegion', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>