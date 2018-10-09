<?php
/* @var $this EsplProposalController */
/* @var $model EsplProposal */
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
	'id'=>'espl-proposal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>True,
)); ?>


                        <div class="card-body ">
                            <div class="form-group">
                                <?php echo $form->errorSummary($model); ?>

                                <div class="row">
		<?php echo $form->labelEx($model,'service category'); ?>

        <?php

        $models = Service::model()->findAll(); //load the model from which u need the data

        $data = CHtml::listData($models, 'id', 'service_name');// fetch the column name from the table

       /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
        $htmlOptions =     array( 'prompt'=>'-- Select Service Category --','class'=>"form-control",'selected'=>'selected', 'ajax' => array(
            'type'=>'POST', //request type
            'url'=>CController::createUrl('EsplProposal/dynamicsubcategories'), //url to call.
            //Style: CController::createUrl('currentController/methodToCall')
            'update'=>'#service_sub_category', //selector to update
            'data'=>array('service_category'=>'js:this.value'),
            //leave out the data key to pass all form values through
        ) );
        // print_r($data);
        echo $form->dropDownList($model,'service_category', $data, $htmlOptions);

        echo $form->error($model,'service_category');



        ?>
                                  <!--  <div id="description_id" style="display:none;">

                                        <input type="" name="EsplProposal[description]"></textarea>
                                    </div>
                                    <script>
                                        function description(id)
                                        {

                                          //  alert(id);
                                            if(id !=1)
                                                document.getElementById("description_id").style.display="block";
                                        }
                                    </script>-->
                                </div></div>


	<div class="row">
		<?php echo $form->labelEx($model,'service_sub_category'); ?>
		<?php
       $htmlOptions =     array( 'prompt'=>'-- Select Service Sub Category --','class'=>"form-control",'selected'=>'selected');
        $options= array();
        echo CHtml::dropDownList('service_sub_category','',$options,$htmlOptions); ?>

		<?php echo $form->error($model,'service_sub_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_scale'); ?>
		<?php echo $form->textField($model,'project_scale',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_type'); ?>
		<?php echo $form->textField($model,'project_type',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_number'); ?>
		<?php echo $form->textField($model,'proposal_number',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'proposal_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_issue_date'); ?>
		<?php echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'proposal_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposa_revision_number'); ?>
		<?php echo $form->textField($model,'proposa_revision_number',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'proposa_revision_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_country'); ?>
		<?php echo $form->textField($model,'client_country',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_status'); ?>
		<?php echo $form->textField($model,'proposal_status',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'proposal_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_signed'); ?>
		<?php echo $form->textField($model,'contract_signed',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'contract_signed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_value'); ?>
		<?php echo $form->textField($model,'contract_value',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'contract_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_value_currency'); ?>
		<?php echo $form->textField($model,'contract_value_currency',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'contract_value_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_name'); ?>
		<?php echo $form->textField($model,'client_representative_name',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_representative_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_email'); ?>
		<?php echo $form->textField($model,'client_representative_email',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_representative_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_phone'); ?>
		<?php echo $form->textField($model,'client_representative_phone',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_representative_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_title'); ?>
		<?php echo $form->textField($model,'project_title',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_external_number'); ?>
		<?php echo $form->textField($model,'project_external_number',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_lead'); ?>
		<?php echo $form->textField($model,'team_lead',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'team_lead'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
	</div>

<?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>