<?php
/* @var $this EsplClientController */
/* @var $model EsplClient */

$this->breadcrumbs=array(
	'Espl Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplClient', 'url'=>array('index')),
	array('label'=>'Manage EsplClient', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>