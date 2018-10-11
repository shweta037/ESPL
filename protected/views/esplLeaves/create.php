<?php
/* @var $this EsplLeavesController */
/* @var $model EsplLeaves */

$this->breadcrumbs=array(
	'Espl Leaves'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplLeaves', 'url'=>array('index')),
	array('label'=>'Manage EsplLeaves', 'url'=>array('admin')),
);
?>

<h1>Create EsplLeaves</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>