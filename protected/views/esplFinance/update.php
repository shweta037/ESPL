<?php
/* @var $this EsplFinanceController */
/* @var $model EsplFinance */

$this->breadcrumbs=array(
	'Espl Finances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EsplFinance', 'url'=>array('index')),
	array('label'=>'Create EsplFinance', 'url'=>array('create')),
	array('label'=>'View EsplFinance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EsplFinance', 'url'=>array('admin')),
);
?>

<h1>Update EsplFinance <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>