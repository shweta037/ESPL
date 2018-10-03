<?php
/* @var $this MethodologiesController */
/* @var $model Methodologies */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Methodologies', 'url'=>array('index')),
	array('label'=>'Create Methodologies', 'url'=>array('create')),
	array('label'=>'View Methodologies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Methodologies', 'url'=>array('admin')),
);
?>

<h1>Update Methodologies <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>