<?php
/* @var $this ServiceController */
/* @var $model Service */
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
            <h4 class="card-title">Create Service</h4>
        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->
    <div class="card-body ">
        <div class="form-group">
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <label for="service_name" class="bmd-label-floating"> <?php echo $form->labelEx($model,'service_name'); ?></label>
		<?php echo $form->textField($model,'service_name',array('size'=>60,'maxlength'=>255,'class'=>"form-control", 'id'=>"exampleEmail",'required'=>"true")); ?>
		<?php echo $form->error($model,'service_name'); ?>
	</div>
            <div class="row">
                <label for="service_name" class="bmd-label-floating"> <?php echo $form->labelEx($model,'service_name'); ?></label>

                <?php  $items = ArrayHelper::map(Model::find()->all(), 'id', 'name');
                $form->field($model, 'attribute')->dropDownList($items) ?>
                <?php echo $form->dropDownList($model,'service_name',array('size'=>60,'maxlength'=>255,'class'=>"form-control", 'id'=>"exampleEmail",'required'=>"true")); ?>
                <?php echo Html::dropDownList('status', $select, $sexes,array('class'=>"form-control")); ?>
                <?php echo $form->error($model,'service_name'); ?>
            </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
    </div>
    </div></div></div></div></div></div>
