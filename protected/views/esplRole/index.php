<?php
/* @var $this EsplRoleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Roles',
);

$this->menu=array(
	array('label'=>'Create EsplRole', 'url'=>array('create')),
	array('label'=>'Manage EsplRole', 'url'=>array('admin')),
);
?>

<h1>Espl Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
