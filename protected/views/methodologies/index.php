<?php
/* @var $this MethodologiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Methodologies',
);

$this->menu=array(
	array('label'=>'Create Methodologies', 'url'=>array('create')),
	array('label'=>'Manage Methodologies', 'url'=>array('admin')),
);
?>

<h1>Methodologies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
