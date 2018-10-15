<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */

$this->breadcrumbs=array(
	'Espl Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplProject', 'url'=>array('index')),
	array('label'=>'Manage EsplProject', 'url'=>array('admin')),
);
?>

<h1>Create EsplProject</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>