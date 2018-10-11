<?php
/* @var $this ServiceCategoryController */
/* @var $model ServiceCategory */
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
	'id'=>'service-category-form',
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
		<?php echo $form->labelEx($model,'service_cat_name'); ?>
		<?php echo $form->textField($model,'service_cat_name',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'service_cat_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php  $models = Status::model()->findAll(array("condition"=>"id IN (1,2)")); //load the model from which u need the data

        $data = CHtml::listData($models, 'id', 'status_name');// fetch the column name from the table

        /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
        $htmlOptions =     array( 'prompt'=>'-- Select Status Name --','class'=>"form-control",'selected'=>'selected');
        // print_r($data);
        echo $form->dropDownList($model,'status', $data, $htmlOptions); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

                                <?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>