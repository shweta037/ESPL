<?php
/* @var $this EsplFinanceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Espl Finances',
);

$this->menu=array(
	array('label'=>'Create EsplFinance', 'url'=>array('create')),
	array('label'=>'Manage EsplFinance', 'url'=>array('admin')),
);
?>

<h1>Espl Finances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
