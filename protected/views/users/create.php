<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>
<!--
<h1>Create Users</h1>-->

<?php

//$model='Users';
$employeedetailmodel='EsplEmployeeDetails';
//$this->renderPartial('_form', array('model'=>$model));
$this->renderPartial('_form',array('model'=>$model,'new_model'=>$employeedetailmodel));
?>