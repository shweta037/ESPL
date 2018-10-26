<?php
/* @var $this ProductAssignController */
/* @var $model ProductAssign */

$this->breadcrumbs=array(
	'Product Assigns'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductAssign', 'url'=>array('index')),
	array('label'=>'Create ProductAssign', 'url'=>array('create')),
	array('label'=>'View ProductAssign', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductAssign', 'url'=>array('admin')),
);
?>

<h1>Update ProductAssign <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>