<?php
/* @var $this EsplFinanceController */
/* @var $model EsplFinance */

$this->breadcrumbs=array(
	'Espl Finances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsplFinance', 'url'=>array('index')),
	array('label'=>'Manage EsplFinance', 'url'=>array('admin')),
);
?>

<h1>Create EsplFinance</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>