<?php
/* @var $this InvoiceStageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Invoice Stages',
);

$this->menu=array(
	array('label'=>'Create InvoiceStage', 'url'=>array('create')),
	array('label'=>'Manage InvoiceStage', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
