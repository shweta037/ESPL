<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */
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
                            <h4 class="card-title">Proposal Information</h4>
                        </div>
                        <?php

                        $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'espl-proposal-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation'=>True,
                        )); ?>
                        <div class="card-body ">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <?php echo $form->errorSummary($model); ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'service_type',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = Service::model()->findAll(); //load the model from which u need the data
                                                $data = CHtml::listData($models, 'id', 'service_name');// fetch the column name from the table
                                                $htmlOptions =     array( 'prompt'=>'Select Service Category','class'=>"form-control ",
                                                    'data-style'=>'btn select-with-transition','selected'=>'selected','onchange'=>'selectservice(this.value)',
                                                    //'value'=>$model['service_type'],
                                                    'ajax' => array(
                                                        'type'=>'POST', //request type
                                                        'url'=>CController::createUrl('EsplProposal/serviceCategoriesList'), //url to call.
                                                        //Style: CController::createUrl('currentController/methodToCall')
                                                        'update'=>'#service_category', //selector to update
                                                        'data'=>array('service_type'=>'js:this.value'),
                                                        //leave out the data key to pass all form values through
                                                    )
                                                );
                                                // print_r($data);
                                                echo $form->dropDownList($model,'service_type', $data, $htmlOptions);
                                                echo $form->error($model,'service_type');
                                                ?>
                                            </div>
                                            <script>
                                                function selectservice(servicevalue) {
                                                    //alert(servicevalue);
                                                    if(servicevalue=="" || servicevalue==1){
                                                        document.getElementById("div_label_status").style.display = "none";
                                                        document.getElementById("div_millestone").style.display = "none";
                                                       // $("#div_millestone").html('');
                                                    }else{
                                                        document.getElementById("div_label_status").style.visibility = "inherit";
                                                        document.getElementById("div_millestone").style.display = "block";
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'service_category',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $htmlOptions =     array( 'id'=>'service_category','prompt'=>'Select Service Category',
                                                    'class'=>"form-control ",'selected'=>'selected','data-style'=>'btn select-with-transition');
                                                $options= array();
                                                if($model->attributes['id']){
                                                    $category_list = Yii::app()->db->createCommand()
                                                                    ->select('*')
                                                                    ->from('service_category')
                                                                    ->where('service_category.service_type_id=:id', array(':id'=>$model->attributes['service_type']))
                                                                    ->queryAll();

                                                    ?>
                                                        <select name="EsplProposal[service_category]" id="service_category" class="form-control" data-style="btn select-with-transition">
                                                            <option value="">Select Service Category</option>
                                                            <?php
                                                                foreach ($category_list as $category){ ?>
                                                                    <option value="<?php echo $category['service_type_id']; ?>" <?php if($category['id']==$model->attributes['service_category']){ echo "selected"; } ?>>
                                                                        <?php echo $category['service_cat_name']; ?>
                                                                    </option>
                                                                <?php }
                                                            ?>

                                                        </select>
                                                <?php
                                                }else{
                                                    echo CHtml::dropDownList('EsplProposal[service_category]','',$options,$htmlOptions);
                                                }
                                                // print_r($data);
                                                //echo $form->dropDownList($model,'service_category', $data, $htmlOptions);
                                                echo $form->error($model,'service_category');
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'service_sub_category',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = ServiceSubCategory::model()->findAll(); //load the model from which u need the data

                                                if($model->attributes['id']){ ?>
                                                    <select name="EsplProposal[service_sub_category][]" id="service_sub_category" class="form-control selectpicker" data-style="btn select-with-transition" multiple>
                                                        <option value="">Select Service Category</option>
                                                        <?php
                                                        $explode_sub_cat = explode(',',$model->attributes['service_sub_category']);
                                                        foreach ($models as $subcategory){ ?>
                                                            <option value="<?php echo $subcategory['id']; ?>"
                                                                <?php if(in_array($subcategory['id'],$explode_sub_cat)){ echo "selected"; } ?>>
                                                                <?php echo $subcategory['service_name']; ?>
                                                            </option>
                                                        <?php }
                                                        ?>

                                                    </select>
                                                <?php
                                                }else{
                                                    $data = CHtml::listData($models, 'id', 'service_name');// fetch the column name from the table
                                                    $htmlOptions =     array('prompt'=>'Select Service Sub Category','class'=>"form-control selectpicker", 'selected'=>'selected',
                                                        'data-style'=>'btn select-with-transition','multiple'=>'multiple' );
                                                    echo $form->dropDownList($model,'service_sub_category[]', $data, $htmlOptions);
                                                }
                                                ?>
                                                <?php echo $form->error($model,'service_sub_category'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'project_scale',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php $options=array(''=>'Select Project Scale','Large Scale'=>'Large Scale','Small Scale'=>'Small Scale');
                                                echo $form->dropDownList($model,'project_scale',$options,array('class'=>"form-control selectpicker", 'id'=>"project_scale",
                                                    'required'=>"true",'data-style'=>'btn select-with-transition')); ?>
                                                <?php echo $form->error($model,'project_scale'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'project_type',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php  $options=array(''=>'Select Project Type','PoA'=>'PoA','PA'=>'PA');
                                                echo $form->dropDownList($model,'project_type',$options,array('class'=>"form-control selectpicker", 'id'=>"project_type",
                                                    'data-style'=>'btn select-with-transition')); ?>
                                                <?php echo $form->error($model,'project_type'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'proposal_number',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'proposal_number',array('class'=>"form-control", 'id'=>"proposal_number")); ?>
                                                <?php echo $form->error($model,'proposal_number'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'proposal_issue_date',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php /*echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control datepicker",
                                                    'id'=>"proposal_issue_date")); */?>
                                                <?php
                                                $this->widget('zii.widgets.jui.CJuiDatePicker',
                                                    array(
                                                        'name'=>'EsplProposal[proposal_issue_date]',
                                                        'value'=>Yii::app()->getRequest()->getParam("holiday_date"),
                                                        'model' => $model,
                                                        'attribute' => 'proposal_issue_date',//this to insert the value from the field
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
                                                <?php echo $form->error($model,'proposal_issue_date'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'proposal_revision_number',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'proposa_revision_number',array('class'=>"form-control", 'id'=>"proposa_revision_number")); ?>
                                                <?php echo $form->error($model,'proposa_revision_number'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'client_name',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = EsplClient::model()->findAll(); //load the model from which u need the data
                                                $data = CHtml::listData($models, 'id', 'client_name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array('prompt'=>'Select Client Name','class'=>"form-control selectpicker", 'selected'=>'selected',
                                                                        'data-style'=>'btn select-with-transition' );
                                                // print_r($data);
                                                echo $form->dropDownList($model,'client_name', $data, $htmlOptions);
                                                echo $form->error($model,'client_name'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'client_country',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = Country::model()->findAll(); //load the model from which u need the data
                                                $data = CHtml::listData($models, 'name', 'name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array( 'prompt'=>'Select Country','class'=>"form-control selectpicker",'selected'=>'selected',
                                                                          'data-style'=>'btn select-with-transition');
                                                // print_r($data);
                                                echo $form->dropDownList($model,'client_country', $data, $htmlOptions);?>
                                                <?php echo $form->error($model,'client_country'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <?php echo $form->labelEx($model,'client_representative_name',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php

                                                $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users 
                                                                            join espl_employee_details as emp on users.id= emp.user_id')->queryAll();
                                                $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array( 'prompt'=>'Client Representative Name','class'=>"form-control selectpicker",
                                                                        'selected'=>"selected",'data-style'=>'btn select-with-transition',
                                                                            'ajax' => array(
                                                                                'type'=>'POST', //request type
                                                                                'url'=>CController::createUrl('EsplProposal/employeedetails'), //url to call.
                                                                                //Style: CController::createUrl('currentController/methodToCall')
                                                                                'update'=>'#client_representative_email', //selector to update
                                                                                'data'=>array('client_representative_name'=>'js:this.value'),
                                                                                //leave out the data key to pass all form values through
                                                                                'success'=>'js:function(data1){ 
                                                                                //console.log(data1);
                                                                                //var data2 = data1.split("*****");                                                    
                                                                                result = JSON.parse(data1);                                                   
                                                                                console.log(result);   
                                                                                $("#client_representative_email").val(result.email);
                                                                                $("#client_representative_phone").val(result.mobilenumber); 
                                                                                $("#client_address").val(result.address); 
                                                                                $("#hidden_name").val(result.name); 
                                                                                return false;
                                                                                }'
                                                                            )
                                                                        );
                                                                // print_r($data);
                                                                echo $form->dropDownList($model,'client_representative_name', $data, $htmlOptions);?>
                                                                <!--<input type="hidden" value=""  name="hidden_name" id="hidden_name"/>-->
                                                                <?php echo $form->error($model,'client_representative_name'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'client_representative_email',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'client_representative_email',array('class'=>"form-control", 'id'=>"client_representative_email")); ?>
                                                <?php echo $form->error($model,'client_representative_email'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'client_representative_phone',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'client_representative_phone',array('class'=>"form-control", 'id'=>"client_representative_phone")); ?>
                                                <?php echo $form->error($model,'client_representative_phone'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'client_address',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'client_address',array('class'=>"form-control", 'id'=>"client_address")); ?>
                                                <?php echo $form->error($model,'client_address'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'project_title',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'project_title',array('class'=>"form-control", 'id'=>"project_title")); ?>
                                                <?php echo $form->error($model,'project_title'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'project_external_number',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'project_external_number',array('class'=>"form-control", 'id'=>"project_external_number")); ?>
                                                <?php echo $form->error($model,'project_external_number'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'contract_value',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php echo $form->textField($model,'contract_value',array('class'=>"form-control", 'id'=>"currency_code")); ?>
                                                <?php echo $form->error($model,'contract_value'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'contract_value_currency',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = Currency::model()->findAll(); //load the model from which u need the data
                                                $data = CHtml::listData($models, 'currency_code', 'currency_code');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array( 'prompt'=>'Select Currency','class'=>"form-control selectpicker",'selected'=>'selected','data-style'=>'btn select-with-transition'  );
                                                // print_r($data);
                                                echo $form->dropDownList($model,'contract_value_currency', $data, $htmlOptions);
                                                echo $form->error($model,'contract_value_currency');
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <?php echo $form->labelEx($model,'proposal_status',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $models = ProposalStatus::model()->findAll(); //load the model from which u need the data
                                                $data = CHtml::listData($models, 'id', 'status_name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array( 'prompt'=>'Select proposal status','class'=>"form-control selectpicker", 'selected'=>'selected',
                                                    'onChange' => 'javascript:contractsigned(this.selectedIndex)','data-style'=>'btn select-with-transition' );
                                                // print_r($data);
                                                echo $form->dropDownList($model,'proposal_status', $data, $htmlOptions);
                                                ?>
                                                <?php echo $form->error($model,'proposal_status'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="div_team_lead" style="visibility: hidden">
                                        <?php echo $form->labelEx($model,'team_lead',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php

                                                $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users 
                                                                              join espl_employee_details as emp on users.id= emp.user_id')->queryAll();
                                                $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table
                                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                                $htmlOptions =     array( 'prompt'=>'-- Select Team Lead --','class'=>"form-control selectpicker",'selected'=>'selected','data-style'=>'btn select-with-transition');
                                                // print_r($data);
                                                echo $form->dropDownList($model,'team_lead', $data, $htmlOptions); ?>
                                                <?php echo $form->error($model,'team_lead'); ?>

                                                <?php  $value= Yii::app()->user->getId();
                                                // $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users join espl_employee_details as emp on users.id= emp.user_id  where users.id = "'.$id.'"')->queryAll();
                                                /* foreach($models as $val){
                                                     $value1= $val['name'];
                                                 }*/
                                                ?>
                                                <input type="hidden" value="<?php echo $value ?>"  name="EsplProposal[created_by]" id="hidden_name"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="div_contract_signed" style="visibility: hidden">
                                        <?php echo $form->labelEx($model,'contract_signed',array('class'=>'col-md-4 col-form-label')); ?>
                                        <div class="col-md-8">
                                            <div class="has-default">
                                                <?php
                                                $this->widget('zii.widgets.jui.CJuiDatePicker',
                                                    array(
                                                        'name'=>'EsplProposal[contract_signed]',
                                                        'value'=>Yii::app()->getRequest()->getParam("contract_signed"),
                                                        'model' => $model,
                                                        'attribute' => 'contract_signed',//this to insert the value from the field
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
                                                );
                                                ?>

                                                <?php echo $form->error($model,'contract_signed'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function contractsigned(id){
                                            if(id ==3) {
                                                document.getElementById("div_contract_signed").style.visibility = "inherit";
                                                document.getElementById("div_team_lead").style.visibility = "inherit";
                                                //alert(document.getElementById("EsplProposal_contract_signed").value);
                                            }else{
                                                document.getElementById("div_contract_signed").style.visibility = "hidden";
                                                document.getElementById("div_team_lead").style.visibility = "hidden";
                                            }
                                        }
                                    </script>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <label  class="col-md-2  col-form-label"><b>Invoice Stage</b></label>
                                        <div class="form-check col-md-10" style="text-align: left;">
                                            <?php
                                            $explode_invoice_stage_ids = array();
                                            if($model->attributes['id']){
                                                $explode_invoice_stage_ids = explode(',',$model->attributes['invoice_status_ids']);
                                            }
                                            $invoice_stage = InvoiceStage::model()->findAll();
                                            foreach ($invoice_stage as $stage){ ?>
                                                <label class="form-check-label" style="margin-right: 15px;margin-top: 10px;">
                                                    <input class="form-check-input myCheckBox" type="checkbox" id="status<?php echo $stage['id']; ?>" name="EsplProposal[invoice_status_ids][]"
                                                           value="<?php echo $stage['id']; ?>"
                                                           <?php if($explode_invoice_stage_ids!=null && in_array($stage['id'],$explode_invoice_stage_ids)){ echo "checked"; } ?>
                                                           onclick="milestonecreate('<?php echo $stage['stage_name']; ?>',<?php echo $stage['id']; ?>)"><?php echo $stage['stage_name']; ?>
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            <?php }  ?>

                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <?php
                                        $display = "none";
                                        $milestonelist = Yii::app()->db->createCommand('SELECT * FROM espl_proposal_milestone where proposal_id="'.$model->attributes['id'].'"')->queryAll();
                                        if($milestonelist){
                                            $display = "block";
                                        }
                                        ?>
                                        <div class="col-md-12" id="div_label_status" style="display: <?php echo $display; ?>">
                                            <h5>Milestone Details :</h5>
                                            <div class="row">
                                                <label  class="col-md-3 col-form-label"><b>Select Status</b></label>
                                                <label style="text-align: center;" class="col-md-3 col-form-label"><b>Milestone Name</b></label>
                                                <label style="text-align: center;" class="col-md-3 col-form-label"><b>Milestone Value</b></label>
                                                <label style="text-align: center;" class="col-md-3 col-form-label"><b>Milestone Description</b></label>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="div_millestone">
                                            <?php
                                            if($model->attributes['id'] && $milestonelist!=null){
                                                foreach ($milestonelist as $milelist){
                                                ?>
                                                    <div class="row" id="div_status<?php echo $milelist['id'];?>" >
                                                        <label class="col-md-3 col-form-label"><?php echo $milelist['milestone_name'];?></label>
                                                        <div class="col-md-3">
                                                            <div class="has-default">
                                                                <input type="hidden" name="txt_milestone_stageid[]" value="<?php echo $milelist['stage_id']; ?>">
                                                                <input type="text" id="txt_status<?php echo $milelist['id'];?>" placeholder="Please Enter Milestone name"
                                                                       name="txt_milestone_name[]" class="form-control" value="<?php echo $milelist['milestone_name'];?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="has-default">
                                                                <input type="text" id="txt_milestone_value<?php echo $milelist['id'];?>" placeholder="Please Enter Milestone value"
                                                                       name="txt_milestone_value[]" class="form-control" value="<?php echo $milelist['milestone_value'];?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="has-default">
                                                                <input type="text" id="txt_milestone_description<?php echo $milelist['id'];?>" placeholder="Please Enter Milestone description"
                                                                       name="txt_milestone_description[]" class="form-control" value="<?php echo $milelist['milestone_description'];?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <script>
                                        var i = 1;
                                        var checkBoxes = $('.myCheckBox');
                                        function milestonecreate(milestonename,obj) {
                                            service_type = $("#EsplProposal_service_type").val();

                                                //alert(milestonename);
                                                if (checkBoxes.filter(':checked').length < 1) {
                                                    document.getElementById("div_label_status").style.display = "none";
                                                } else {
                                                    document.getElementById("div_label_status").style.display = "block";
                                                }
                                                check = $("#status" + obj).is(":checked");
                                                if (check) {
                                                    var chk1 = '<div class="row" id="div_status' + obj + '">' +
                                                        '<label class="col-md-3 col-form-label">' + milestonename + '</label>' +
                                                        '<div class="col-md-3"> ' +
                                                        '<div class="has-default"> ' +
                                                        '<input type="hidden" name="txt_milestone_stageid[]" value="'+obj+'">'+
                                                        '<input type="text" id="txt_status' + obj + '" placeholder="Please Enter Milestone name" name="txt_milestone_name[]" value="' + milestonename + '" class="form-control"> ' +
                                                        '</div> ' +
                                                        '</div> ' +
                                                        '<div class="col-md-3"> ' +
                                                        '<div class="has-default"> ' +
                                                        '<input type="text" id="txt_milestone_value' + obj + '" placeholder="Please Enter Milestone value" name="txt_milestone_value[]" class="form-control" required> ' +
                                                        '</div> ' +
                                                        '</div> ' +
                                                        '<div class="col-md-3"> ' +
                                                        '<div class="has-default"> ' +
                                                        '<input type="text" id="txt_milestone_description' + obj + '" placeholder="Please Enter Milestone description" name="txt_milestone_description[]" class="form-control">' +
                                                        '</div> ' +
                                                        '</div> ' +
                                                        '</div>';

                                                    var e = document.createElement('div');
                                                    e.innerHTML = chk1;
                                                    div_millestone.appendChild(e.firstChild);
                                                    i = i + 1;
                                                } else {
                                                    //alert("bbye");
                                                    $("#div_status" + obj).remove();
                                                }

                                                if(service_type==1 || service_type==""){
                                                    document.getElementById("div_label_status").style.display = "none";
                                                    document.getElementById("div_millestone").style.display = "none";
                                                }else{
                                                    document.getElementById("div_label_status").style.display = "block";
                                                    document.getElementById("div_millestone").style.display = "block";
                                                }


                                        }
                                    </script>

                                </div>

                                <div class="buttons col-md-12 ">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>"btn btn-rose pull-right")); ?>
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

<script type="text/javascript">
    $(document).ready(function(){
        setFormValidation('#espl-proposal-form');
    });

</script>
