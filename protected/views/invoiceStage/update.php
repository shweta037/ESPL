<?php
/* @var $this InvoiceStageController */
/* @var $model InvoiceStage */

$this->breadcrumbs=array(
	'Invoice Stages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InvoiceStage', 'url'=>array('index')),
	array('label'=>'Create InvoiceStage', 'url'=>array('create')),
	array('label'=>'View InvoiceStage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage InvoiceStage', 'url'=>array('admin')),
);
?>

<!--<h1>Update InvoiceStage <?php /*echo $model->id; */?></h1>-->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>