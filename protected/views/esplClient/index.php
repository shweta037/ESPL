<?php
/* @var $this EsplClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Clients',
);

$this->menu=array(
	array('label'=>'Create EsplClient', 'url'=>array('create')),
	array('label'=>'Manage EsplClient', 'url'=>array('admin')),
);
?>

<h1>Espl Clients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
