<?php
/* @var $this EsplLeavesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Leaves',
);

$this->menu=array(
	array('label'=>'Create EsplLeaves', 'url'=>array('create')),
	array('label'=>'Manage EsplLeaves', 'url'=>array('admin')),
);
?>

<h1>Espl Leaves</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
