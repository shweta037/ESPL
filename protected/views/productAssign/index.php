<?php
/* @var $this ProductAssignController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Assigns',
);

$this->menu=array(
	array('label'=>'Create ProductAssign', 'url'=>array('create')),
	array('label'=>'Manage ProductAssign', 'url'=>array('admin')),
);
?>

<h1>Product Assigns</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
