<?php
/* @var $this ProductAssignController */
/* @var $model ProductAssign */
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
                            'id'=>'product-assign-form',
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
                                    <div class="row" id="div_team_lead">
                                        <?php echo $form->labelEx($model,'employe_id',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users 
                                                                              join espl_employee_details as emp on users.id= emp.user_id')->queryAll();
                                                $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array( 'prompt'=>'-- Select Employee Name --','class'=>"form-control selectpicker",'selected'=>'selected','data-style'=>'btn select-with-transition');
                                                // print_r($data);
                                                echo $form->dropDownList($model,'employe_id', $data, $htmlOptions); ?>
                                                <?php echo $form->error($model,'employe_id'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'Product Name',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = ProductMaster::model()->findAll(); //load the model from which u need the data
                                                $data = CHtml::listData($models, 'id', 'product_name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array('prompt'=>'Select Product Name','class'=>"form-control selectpicker", 'selected'=>'selected',
                                                    'data-style'=>'btn select-with-transition' );
                                                // print_r($data);
                                                echo $form->dropDownList($model,'product_id', $data, $htmlOptions);
                                                echo $form->error($model,'product_id'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'assign_date',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php /*echo $form->textField($model,'assign_date',array('class'=>"form-control datepicker",
                                                    'id'=>"assign_date")); */?>
                                                <?php
                                                $this->widget('zii.widgets.jui.CJuiDatePicker',
                                                    array(
                                                        'name'=>'ProductAssign[assign_date]',
                                                        'value'=>Yii::app()->getRequest()->getParam("assign_date"),
                                                        'model' => $model,
                                                        'attribute' => 'assign_date',//this to insert the value from the field
                                                        'flat'=>false,//remove to hide the datepicker
                                                        'options'=>array(
                                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                        ),
                                                        'htmlOptions'=>array(
                                                            'style'=>'',
                                                            'class'=>"form-control "
                                                        ),
                                                    )
                                                );?>
                                                <?php echo $form->error($model,'assign_date'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="buttons">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose pull-right")); ?>
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



