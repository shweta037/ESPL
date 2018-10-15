<?php
/* @var $this EsplProjectController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Projects',
);

$this->menu=array(
	array('label'=>'Create EsplProject', 'url'=>array('create')),
	array('label'=>'Manage EsplProject', 'url'=>array('admin')),
);
?>

<h1>Espl Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
