<?php
/* @var $this ServiceCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Service Categories',
);

$this->menu=array(
	array('label'=>'Create ServiceCategory', 'url'=>array('create')),
	array('label'=>'Manage ServiceCategory', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
