<?php
/* @var $this EsplRoleController */
/* @var $model EsplRole */

$this->breadcrumbs=array(
	'Espl Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplRole', 'url'=>array('index')),
	array('label'=>'Manage EsplRole', 'url'=>array('admin')),
);
?>

<h1>Create EsplRole</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>