<?php
/* @var $this EsplClientController */
/* @var $model EsplClient */

$this->breadcrumbs=array(
	'Espl Clients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplClient', 'url'=>array('index')),
	array('label'=>'Create EsplClient', 'url'=>array('create')),
	array('label'=>'View EsplClient', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplClient', 'url'=>array('admin')),
);
?>

<!--<h1>Update EsplClient <?php /*echo $model->id; */?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>