<?php
/* @var $this MethodologiesController */
/* @var $model Methodologies */
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
                            <h4 class="card-title">Add Methodologies Sub Category</h4>
                        </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'methodologies-form',
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
                                        <?php echo $form->labelEx($model,'Sub Category Name'); ?>
                                        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>"form-control", 'id'=>"name",'required'=>"true")); ?>
                                        <?php echo $form->error($model,'name'); ?>
                                    </div>


                               <!-- <div class="row">
                                    <?php /*echo $form->labelEx($model,'category_id'); */?>
                                    <?php /*echo $form->textField($model,'category_id',array('class'=>"form-control", 'id'=>"subcategory_name",'required'=>"true")); */?>
                                    <?php /*echo $form->error($model,'category_id'); */?>
                                </div>-->

        <div class="form-group">
            <div class="row">
                <label for="service_name" class="bmd-label-floating" ><?php
                echo $form->labelEx($model,'category_name');?></label>
                <?php $data = CHtml::listData(MethodologiesCategory::model()->findAll(), 'id', 'category_name');
                $htmlOptions =     array('size' => '1', 'prompt'=>'-- select category --','class'=>"form-control",'selected'=>'selected');
                echo $form->listBox($model,'category_id', $data, $htmlOptions);
                echo $form->error($model,'category_id');
                ?>
            </div>
        </div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
    </div>

                            <?php $this->endWidget(); ?>

                        </div><!-- form -->
                    </div>
                </div></div></div></div></div></div>