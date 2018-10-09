<?php
/* @var $this ServiceSubCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Service Sub Categories',
);

$this->menu=array(
	array('label'=>'Create ServiceSubCategory', 'url'=>array('create')),
	array('label'=>'Manage ServiceSubCategory', 'url'=>array('admin')),
);
?>

<h1>Service Sub Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
