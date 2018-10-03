<?php
/* @var $this CurrencyController */
/* @var $model Currency */
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
                            <h4 class="card-title">Create Currency</h4>
                        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-form',
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
		<?php echo $form->labelEx($model,'currency_name'); ?>
		<?php echo $form->textField($model,'currency_name',array('size'=>60,'maxlength'=>256,'class'=>"form-control", 'id'=>"currency_name",'required'=>"true")); ?>
		<?php echo $form->error($model,'currency_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_code'); ?>
		<?php echo $form->textField($model,'currency_code',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'currency_code'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

                        <?php $this->endWidget(); ?>

                    </div><!-- form -->
                </div>
            </div></div></div></div></div></div>