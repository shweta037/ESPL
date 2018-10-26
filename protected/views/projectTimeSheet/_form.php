<?php
/* @var $this ProjectTimeSheetController */
/* @var $model ProjectTimeSheet */
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
                            <div class="row">
                                <?php
                                 if($model->attributes['id']=="") {
                                     $projectid = CHttpRequest::getParam('id');
                                 }else{
                                     $projectid = $model->attributes['project_id'];
                                 }
                                $project_name = Yii::app()->db->createCommand()
                                    ->select('project_title')
                                    ->from('espl_proposal')
                                    ->join('espl_project','espl_project.proposal_id = espl_proposal.id')
                                    ->where('espl_project.id=:id', array(':id'=>$projectid))
                                    ->queryRow();
                                ?>
                                <div class="col-md-6">
                                    <h4 class="card-title">Project Timesheet Information (<?php echo $project_name['project_title']; ?>)</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/projectTimeSheet/admin">
                                        <input class="btn btn-primary" type="button" name="yt0" value="<< Back" style="float:right;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'project-time-sheet-form',
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
                                        <?php echo $form->labelEx($model,'Total Time',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-4">
                                            <div class="has-default">
                                                <?php if($model->attributes['id']==""){ ?>
                                                    <input type="hidden" name="ProjectTimeSheet[project_id]" value="<?php echo CHttpRequest::getParam('id'); ?>">
                                                <?php } ?>
                                                <?php echo $form->textField($model,'time_hrs',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Please enter time in hrs')); ?>
                                                <?php echo $form->labelEx($model,'time (Hrs)',array('class'=>'col-form-label')); ?>
                                                <?php echo $form->error($model,'time_hrs'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'time_mins',array('size'=>60,'maxlength'=>255,'class'=>'form-control','placeholder'=>'Please enter time in min')); ?>
                                                <?php echo $form->labelEx($model,'time (min)',array('class'=>'col-form-label')); ?>
                                                <?php echo $form->error($model,'time_min'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'Select Date',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $this->widget('zii.widgets.jui.CJuiDatePicker',
                                                    array(
                                                        'name'=>'ProjectTimeSheet[timesheet_date]',
                                                        'value'=>Yii::app()->getRequest()->getParam("timesheet_date"),
                                                        'model' => $model,
                                                        'attribute' => 'timesheet_date',//this to insert the value from the field
                                                        'flat'=>false,//remove to hide the datepicker
                                                        'options'=>array(
                                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                            'changeMonth'=>true,
                                                            'changeYear'=>true,
                                                            'yearRange'=>date('Y').':2019',
                                                            'minDate' => date('Y-m-d',strtotime("-2 days")),      // minimum date
                                                            'maxDate' => date('Y-m-d'),
                                                        ),
                                                        'htmlOptions'=>array(
                                                            'style'=>'',
                                                            'class'=>"form-control ",
                                                            'placeholder'=>'Please select date'
                                                        ),
                                                    )
                                                );?>

                                                <?php echo $form->error($model,'timesheet_date'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>"btn btn-rose pull-right")); ?>
                                        <?php $this->endWidget(); ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- form -->