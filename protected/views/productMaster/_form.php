<?php
/* @var $this ProductMasterController */
/* @var $model ProductMaster */
/* @var $form CActiveForm */
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form">
                    <div class="card ">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">mail_outline</i>
                            </div>
                            <h4 class="card-title">Product Information</h4>
                        </div>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'product-master-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>false,
                        )); ?>
                        <div class="card-body ">
                            <div class="form-group row">
                                <div class="col-md-12" style="color:red;">
                                    <?php echo $form->errorSummary($model); ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'product_name',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
                                                <?php echo $form->error($model,'product_name'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons col-md-6 ">
                                    <div class="row buttons">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- form -->