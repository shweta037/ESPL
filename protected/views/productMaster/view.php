<?php
/* @var $this ProductMasterController */
/* @var $model ProductMaster */

$this->breadcrumbs=array(
	'Product Masters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductMaster', 'url'=>array('index')),
	array('label'=>'Create ProductMaster', 'url'=>array('create')),
	array('label'=>'Update ProductMaster', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductMaster', 'url'=>'#', 'linkOptions'=>
                array('submit'=>
                        array('delete','id'=>$model->id),
                            'confirm'=>'Are you sure you want to delete this item?')
                    ),
	array('label'=>'Manage ProductMaster', 'url'=>array('admin')),
);
?>

<h1>View ProductMaster #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_name',
		'created_date',
		'modified_date',
	),
)); ?>
