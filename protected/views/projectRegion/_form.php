<?php
/* @var $this ProjectRegionController */
/* @var $model ProjectRegion */
/* @var $form CActiveForm */
?>

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-10">


<div class="form">
<div class="card ">
<div class="card-header card-header-rose card-header-icon">
<div class="card-icon">
<i class="material-icons">mail_outline</i>
</div>
<h4 class="card-title">Create Project Region</h4>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'project-region-form',
// Please note: When you enable ajax validation, make sure the corresponding
// controller action is handling ajax validation correctly.
// There is a call to performAjaxValidation() commented in generated controller code.
// See class documentation of CActiveForm for details on this.
'enableAjaxValidation'=>false,
)); ?>
<div class="card-body ">
<div class="form-group">
<?php echo $form->errorSummary($model); ?>



<div class="row">
<?php echo $form->labelEx($model,'region_name'); ?>
<?php echo $form->textField($model,'region_name',array('size'=>60,'maxlength'=>255,'class'=>"form-control", 'id'=>"region_name",'required'=>"true")); ?>
<?php echo $form->error($model,'region_name'); ?>
</div>



<div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div></div></div></div></div></div>