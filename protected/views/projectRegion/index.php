<?php
/* @var $this ProjectRegionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Project Regions',
);

$this->menu=array(
	array('label'=>'Create ProjectRegion', 'url'=>array('create')),
	array('label'=>'Manage ProjectRegion', 'url'=>array('admin')),
);
?>

<h1>Project Regions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
