<?php
/* @var $this MethodologiesCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Methodologies Categories',
);

$this->menu=array(
	array('label'=>'Create MethodologiesCategory', 'url'=>array('create')),
	array('label'=>'Manage MethodologiesCategory', 'url'=>array('admin')),
);
?>
<!--
<h1>Methodologies Categories</h1>-->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
