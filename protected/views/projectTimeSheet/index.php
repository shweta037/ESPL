<?php
/* @var $this ProjectTimeSheetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Project Time Sheets',
);

$this->menu=array(
	array('label'=>'Create ProjectTimeSheet', 'url'=>array('create')),
	array('label'=>'Manage ProjectTimeSheet', 'url'=>array('admin')),
);
?>

<h1>Project Time Sheets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
