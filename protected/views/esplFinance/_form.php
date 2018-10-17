<?php
/* @var $this EsplFinanceController */
/* @var $model EsplFinance */
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
                            <h4 class="card-title">Update Project Details</h4>
                        </div>

                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'espl-finance-form',
                                // Please note: When you enable ajax validation, make sure the corresponding
                                // controller action is handling ajax validation correctly.
                                // There is a call to performAjaxValidation() commented in generated controller code.
                                // See class documentation of CActiveForm for details on this.
                                'enableAjaxValidation'=>false,
                            )); ?>

                        <div class="card-body ">
                            <div class="form-group">



                                    <div class="row">
                                        <?php echo $form->labelEx($model,'Project Name'); ?>
                                        <?php
                                        $projectname = Yii::app()->db->createCommand()
                                                        ->select('espl_project.id as projectid,espl_proposal.project_title')
                                                        ->from('espl_project')
                                                        ->join('espl_proposal','espl_proposal.id = espl_project.proposal_id')
                                                        ->queryAll();

                                        ?>
                                        <select id="EsplFinance[project_id]" name="EsplFinance[project_id]" class="form-control">
                                            <option value="">Select Project Name</option>
                                            <?php

                                                foreach ($projectname as $project){
                                                    echo '<option value="'.$project['projectid'].'">'.$project['project_title'].'</option>';
                                                }
                                            ?>
                                        </select>
                                        <?php echo $form->error($model,'project_id'); ?>
                                    </div>


                                    <div class="row">
                                        <?php echo $form->labelEx($model,'registerd_issue_date'); ?>
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                            'name'=>'EsplFinance[registerd_issue_date]',
                                            'value'=>Yii::app()->getRequest()->getParam("registerd_issue_date"),
                                            'model' => $model,
                                            'attribute' => 'registerd_issue_date',//this to insert the value from the field
                                            'flat'=>false,//remove to hide the datepicker
                                            'options'=>array(
                                                'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            ),
                                            'htmlOptions'=>array(
                                                'style'=>'',
                                                'class'=>"form-control "
                                            ),
                                        ));?>
                                        <?php echo $form->error($model,'registerd_issue_date'); ?>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'travel_invoice_due_date'); ?>
                                        <?php
                                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                            'name'=>'EsplFinance[travel_invoice_due_date]',
                                            'value'=>Yii::app()->getRequest()->getParam("travel_invoice_due_date"),
                                            'model' => $model,
                                            'attribute' => 'travel_invoice_due_date',//this to insert the value from the field
                                            'flat'=>false,//remove to hide the datepicker
                                            'options'=>array(
                                                'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                            ),
                                            'htmlOptions'=>array(
                                                'style'=>'',
                                                'class'=>"form-control "
                                            ),
                                        ));?>
                                        <?php echo $form->error($model,'travel_invoice_due_date'); ?>
                                    </div>
                                    <h5>Invoice Stage Date Information</h5>
                                    <table class="table table-striped">
                                        <thbody>
                                            <tr>
                                                <th>Invoice Stage</th>
                                                <th>Invoice Due Date</th>
                                                <th>Invoice Amount</th>
                                                <th>Invoice Currency</th>
                                            </tr>
                                        </thbody>
                                        <tbody>
                                        <?php
                                        $invoice_stages = InvoiceStage::model()->findAll(); //load the model from which u need the data
                                        foreach ($invoice_stages as $stages){ ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" value="<?php echo $stages['id']; ?>" id="invoice_stage_id<?php echo $stages['id']; ?>"
                                                           name="invoice_stage_id[<?php echo $stages['id']; ?>]">
                                                    <?php echo $stages['stage_name']; ?></td>
                                                <td>
                                                    <?php
                                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                        'name'=>'invoice_due_date['.$stages['id'].']',
                                                        'value'=>Yii::app()->getRequest()->getParam("invoice_due_date[".$stages['id']."]"),
                                                        'attribute' => 'invoice_due_date['.$stages['id'].']',//this to insert the value from the field
                                                        'flat'=>false,//remove to hide the datepicker
                                                        'options'=>array(
                                                            'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                            'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'

                                                        ),
                                                        'htmlOptions'=>array(
                                                            'style'=>'',
                                                            'class'=>"form-control ",
                                                            'placeholder'=>'Please select invoice date',
                                                        ),
                                                    ));?>
                                                </td>
                                                <td>
                                                    <input type="text" id="invoice_amount<?php echo $stages['id']; ?>" name="invoice_amount[<?php echo $stages['id']; ?>]"
                                                           class="form-control" placeholder="Please enter invoice amount">
                                                </td>
                                                <td>
                                                    <?php $currency = Currency::model()->findAll(); //load the model from which u need the data ?>
                                                    <select id="invoice_currency_id<?php echo $stages['id']; ?>" name="invoice_currency_id[<?php echo $stages['id']; ?>]"
                                                            class="form-control">
                                                        <option value="">Select Currency Name</option>
                                                        <?php

                                                        foreach ($currency as $cur){
                                                            echo '<option value="'.$cur['id'].'">'.$cur['currency_name'].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                        </tbody>
                                    </table>

                                    <div class="row buttons">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
                                    </div>
                                <?php $this->endWidget(); ?>
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>