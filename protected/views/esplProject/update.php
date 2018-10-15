<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */

$this->breadcrumbs=array(
	'Espl Projects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplProject', 'url'=>array('index')),
	array('label'=>'Create EsplProject', 'url'=>array('create')),
	array('label'=>'View EsplProject', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplProject', 'url'=>array('admin')),
);
?>

<h1>Update EsplProject <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>