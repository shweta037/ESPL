<?php
/* @var $this EsplLeavesController */
/* @var $model EsplLeaves */

$this->breadcrumbs=array(
	'Espl Leaves'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplLeaves', 'url'=>array('index')),
	array('label'=>'Create EsplLeaves', 'url'=>array('create')),
	array('label'=>'View EsplLeaves', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplLeaves', 'url'=>array('admin')),
);
?>

<h1>Update EsplLeaves <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>