<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */
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
                            <h4 class="card-title">Create Project</h4>
                        </div>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'espl-project-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>false,
                        )); ?>

                        <div class="card-body ">
                            <div class="form-group">
                                <?php echo $form->errorSummary($model); ?>

                                <?php
                                $proposal_info = Yii::app()->db->createCommand()
                                    ->select('espl_proposal.service_type,espl_proposal.service_category,espl_proposal.service_sub_category,espl_proposal.project_scale,espl_proposal.project_type,
                                            espl_proposal.proposal_number,espl_proposal.proposal_issue_date,espl_proposal.proposa_revision_number,espl_proposal.client_name,espl_proposal.client_country,
                                            espl_proposal.proposal_status,espl_proposal.contract_signed,espl_proposal.contract_value,espl_proposal.contract_value_currency,
                                            espl_proposal.client_representative_name,espl_proposal.client_representative_email,espl_proposal.client_representative_phone,
                                            espl_proposal.client_address,espl_proposal.project_title,espl_proposal.project_external_number,espl_proposal.team_lead,
                                            service_type.service_name as servicename,service_category.service_cat_name as categoryname,
                                            service_sub_category.service_name as subservicename,espl_employee_details.name as teamleadname')
                                    ->from('espl_proposal')
                                    ->join('service_type', 'service_type.id=espl_proposal.service_type')
                                    ->join('service_category', 'service_category.id=espl_proposal.service_category')
                                    ->join('service_sub_category', 'service_sub_category.id=espl_proposal.service_sub_category')
                                    ->join('espl_employee_details', 'espl_employee_details.user_id=espl_proposal.team_lead')
                                    ->where('espl_proposal.id=:id', array(':id'=>$model['proposal_id']))
                                    ->queryRow();

                                ?>
                                <div class="row">
                                    <input type="hidden" name="EsplProject[id]" value="<?php echo $model['id']; ?>">
                                    <?php echo $form->labelEx($model,'Service Type'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['servicename'],'readonly'=>'readonly')); ?>
                                </div>


                                <div class="row">
                                    <?php echo $form->labelEx($model,'Project Title'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['project_title'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Service Category'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['categoryname'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Service Sub Category'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['subservicename'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Project Scale'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['project_scale'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Project Type'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['project_type'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Proposal No'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['proposal_number'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Name of Client'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['client_name'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Country of Client'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['client_country'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Contract Signed'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['contract_signed'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Contract Value'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['contract_value'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Contract Currency'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['contract_value_currency'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Client Address'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['client_address'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Project External Number'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['project_external_number'],'readonly'=>'readonly')); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Team Leader'); ?>
                                    <?php echo $form->textField($model,'',array('class'=>"form-control",'value'=>$proposal_info['teamleadname'],'readonly'=>'readonly')); ?>
                                </div>





                                <div class="row">
                                    <?php echo $form->labelEx($model,'Project Region'); ?>
                                    <?php
                                    $models = ProjectRegion::model()->findAll(); //load the model from which u need the data
                                    $data = CHtml::listData($models, 'id', 'region_name');// fetch the column name from the table
                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Project Region--','class'=>"form-control",'selected'=>'selected'  );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'project_region_id', $data, $htmlOptions);?>
                                    <?php echo $form->error($model,'project_region_id'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Project Country'); ?>
                                    <?php
                                    $models = Country::model()->findAll(); //load the model from which u need the data
                                    $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table
                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Country--','class'=>"form-control",'selected'=>'selected'  );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'project_country_id', $data, $htmlOptions);?>
                                    <?php echo $form->error($model,'project_country_id'); ?>
                                </div>
                                <div class="row">
                                    <h4>Applied Methodologies</h4>
                                </div>
                                <?php
                                $methodologie_category = MethodologiesCategory::model()->findAll();
                                foreach ($methodologie_category as $category){ ?>
                                    <div class="row">
                                        <input type="hidden" name="category_id[]" value="<?php echo $category['id'] ?>">
                                        <?php echo $form->labelEx($model,"".$category['category_name'].""); ?>
                                        <select class="form-control" id="subcategory_id_<?php echo $category['id']; ?>" name="subcategory_id[]" required>
                                                <?php
                                                    $methodologie_subcategory = Methodologies::model()->findAll(array('condition'=>'category_id = "'.$category['id'].'"'));
                                                    foreach ($methodologie_subcategory as $subcategory){ ?>
                                                        <option value="<?php echo $subcategory['id']; ?>"><?php echo $subcategory['name']; ?></option>
                                                <?php
                                            } ?>
                                        </select>
                                    </div>

                                <?php } ?>



                                <div class="row">
                                    <?php echo $form->labelEx($model,'Mandatory Sector'); ?>
                                    <?php $htmlOptions =     array( 'prompt'=>'-- Select Mandatory Sector--','class'=>"form-control",'selected'=>'selected');?>
                                    <?php  echo $form->dropDownList($model,'mandatory_sector', array(range(1, 15)),$htmlOptions);?>
                                    <?php echo $form->error($model,'mandatory_sector'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Conditional Sector'); ?>
                                    <?php $htmlOptions =     array( 'empty'=>'-- Select Conditional Sector--','class'=>"form-control",'selected'=>'selected' );?>
                                    <?php  echo $form->dropDownList($model,'conditional_sector', array(range(1, 15)),$htmlOptions);?>
                                    <?php echo $form->error($model,'conditional_sector'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Technical Area'); ?>
                                    <?php $htmlOptions =     array( 'empty'=>'-- Select Conditional Sector--','class'=>"form-control",'selected'=>'selected' );?>
                                    <?php  echo $form->dropDownList($model,'technical_area', array(range(1.1, 15.1)),$htmlOptions);?>
                                    <?php echo $form->error($model,'technical_area'); ?>
                                </div>


                                <div class="row">
                                    <?php echo $form->labelEx($model,'Technical Expert'); ?>
                                    <?php
                                    $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users join espl_employee_details as emp on users.id= emp.user_id')->queryAll();

                                    $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table

                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Technical Expert --','class'=>"form-control",'selected'=>'selected' );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'technical_expert_id', $data, $htmlOptions); ?>
                                    <?php echo $form->error($model,'technical_expert_id'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Methodological Expert'); ?>
                                    <?php
                                    $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table

                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Methodologica Expert --','class'=>"form-control",'selected'=>'selected' );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'methodological_expert_id', $data, $htmlOptions); ?>
                                    <?php echo $form->error($model,'methodological_expert_id'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Financial Expert'); ?>
                                    <?php
                                    $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table
                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Financial Expert --','class'=>"form-control",'selected'=>'selected' );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'financial_expert_id', $data, $htmlOptions); ?>
                                    <?php echo $form->error($model,'financial_expert_id'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'Local Expert'); ?>
                                    <?php
                                    $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table
                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Local Expert --','class'=>"form-control",'selected'=>'selected' );
                                    // print_r($data);
                                    echo $form->dropDownList($model,'local_expert_id', $data, $htmlOptions); ?>
                                    <?php echo $form->error($model,'local_expert_id'); ?>
                                </div>


                                <div class="row">
                                    <?php echo $form->labelEx($model,'publication_date'); ?>
                                    <?php //echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>

                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[publication_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("publication_date"),
                                        'model' => $model,
                                        'attribute' => 'publication_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'publication_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'site_visit_completed_date'); ?>
                                    <?php //echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>

                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[site_visit_completed_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("site_visit_completed_date"),
                                        'model' => $model,
                                        'attribute' => 'site_visit_completed_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'site_visit_completed_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'findings_issued_date'); ?>
                                    <?php //echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>

                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[findings_issued_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("findings_issued_date"),
                                        'model' => $model,
                                        'attribute' => 'findings_issued_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'findings_issued_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'draft_report_issued'); ?>
                                    <?php //echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>

                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[draft_report_issued]',
                                        'value'=>Yii::app()->getRequest()->getParam("draft_report_issued"),
                                        'model' => $model,
                                        'attribute' => 'draft_report_issued',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'draft_report_issued'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'final_report_issued'); ?>
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[final_report_issued]',
                                        'value'=>Yii::app()->getRequest()->getParam("final_report_issued"),
                                        'model' => $model,
                                        'attribute' => 'final_report_issued',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'final_report_issued'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'submission_date'); ?>
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[submission_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("submission_date"),
                                        'model' => $model,
                                        'attribute' => 'submission_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'submission_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'completeness_check_date'); ?>
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[completeness_check_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("completeness_check_date"),
                                        'model' => $model,
                                        'attribute' => 'completeness_check_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'completeness_check_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'I&R Check Completed'); ?>
                                    <?php
                                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                        'name'=>'EsplProject[ir_check_date]',
                                        'value'=>Yii::app()->getRequest()->getParam("ir_check_date"),
                                        'model' => $model,
                                        'attribute' => 'ir_check_date',//this to insert the value from the field
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
                                    <?php echo $form->error($model,'ir_check_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'created_date'); ?>
                                    <?php echo $form->textField($model,'created_date',array('class'=>"form-control", 'id'=>"project_country_id",'required'=>"true")); ?>
                                    <?php echo $form->error($model,'created_date'); ?>
                                </div>

                                <div class="row">
                                    <?php echo $form->labelEx($model,'modified_date'); ?>
                                    <?php echo $form->textField($model,'modified_date',array('class'=>"form-control", 'id'=>"project_country_id",'required'=>"true")); ?>
                                    <?php echo $form->error($model,'modified_date'); ?>
                                </div>

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