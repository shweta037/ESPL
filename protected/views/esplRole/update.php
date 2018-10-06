<?php
/* @var $this EsplRoleController */
/* @var $model EsplRole */

$this->breadcrumbs=array(
	'Espl Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplRole', 'url'=>array('index')),
	array('label'=>'Create EsplRole', 'url'=>array('create')),
	array('label'=>'View EsplRole', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplRole', 'url'=>array('admin')),
);
?>

<h1>Update EsplRole <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>