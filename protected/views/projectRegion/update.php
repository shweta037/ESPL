<?php
/* @var $this ProjectRegionController */
/* @var $model ProjectRegion */

$this->breadcrumbs=array(
	'Project Regions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectRegion', 'url'=>array('index')),
	array('label'=>'Create ProjectRegion', 'url'=>array('create')),
	array('label'=>'View ProjectRegion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectRegion', 'url'=>array('admin')),
);
?>

<h1>Update ProjectRegion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>