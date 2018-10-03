<?php
/* @var $this MethodologiesCategoryController */
/* @var $model MethodologiesCategory */
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
                            <h4 class="card-title">Create Methodologies category</h4>
                        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'methodologies-category-form',
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
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>60,'maxlength'=>255,'class'=>"form-control", 'id'=>"category_name",'required'=>"true")); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>
<!--
	<div class="row">
		<?php /*echo $form->labelEx($model,'is_deleted'); */?>
		<?php /*echo $form->textField($model,'is_deleted'); */?>
		<?php /*echo $form->error($model,'is_deleted'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'created_date'); */?>
		<?php /*echo $form->textField($model,'created_date'); */?>
		<?php /*echo $form->error($model,'created_date'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'modified_date'); */?>
		<?php /*echo $form->textField($model,'modified_date'); */?>
		--><?php /*echo $form->error($model,'modified_date'); */?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

                        <?php $this->endWidget(); ?>

                    </div><!-- form -->
                </div>
            </div></div></div></div></div></div>