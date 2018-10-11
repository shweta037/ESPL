<?php
/* @var $this EsplClientController */
/* @var $model EsplClient */
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
                            <h4 class="card-title">Create Client Details</h4>
                        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'espl-client-form',
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
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_name",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_email",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_address",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_phone_number'); ?>
		<?php echo $form->textField($model,'client_phone_number',array('size'=>60,'maxlength'=>64,'class'=>"form-control", 'id'=>"client_phone_number",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_phone_number'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

                        <?php $this->endWidget(); ?>

                    </div><!-- form -->
                </div>
            </div></div></div></div></div></div>