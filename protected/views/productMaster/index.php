<?php
/* @var $this ProductMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Masters',
);

$this->menu=array(
	array('label'=>'Create ProductMaster', 'url'=>array('create')),
	array('label'=>'Manage ProductMaster', 'url'=>array('admin')),
);
?>

<h1>Product Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
