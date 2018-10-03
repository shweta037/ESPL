<?php
/* @var $this InvoiceStageController */
/* @var $model InvoiceStage */

$this->breadcrumbs=array(
	'Invoice Stages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InvoiceStage', 'url'=>array('index')),
	array('label'=>'Manage InvoiceStage', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>