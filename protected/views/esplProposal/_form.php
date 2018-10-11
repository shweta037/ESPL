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
                            <h4 class="card-title">Create Proposal</h4>
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
                                    <?php echo $form->labelEx($model,'service_type'); ?>

                                    <?php

                                    $models = Service::model()->findAll(); //load the model from which u need the data

                                    $data = CHtml::listData($models, 'service_name', 'service_name');// fetch the column name from the table

                                    /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                    $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected');
                                    // print_r($data);
                                    echo $form->dropDownList($model,'service_type', $data, $htmlOptions);

                                    echo $form->error($model,'service_type');



                                    ?>
                                </div>
    <div class="row">
    <?php echo $form->labelEx($model,'service category'); ?>

    <?php

    $models = ServiceCategory::model()->findAll(); //load the model from which u need the data

    $data = CHtml::listData($models, 'id', 'service_cat_name');// fetch the column name from the table

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
    </div>


	<div class="row">
		<?php echo $form->labelEx($model,'service_sub_category'); ?>
		<?php
        $htmlOptions =     array( 'id'=>'service_sub_category','prompt'=>'-- Select Service Sub Category --','class'=>"form-control",'selected'=>'selected','multiple'=>'multiple');
        $options= array();
        echo CHtml::dropDownList('EsplProposal[service_sub_category][]','',$options,$htmlOptions); ?>

		<?php echo $form->error($model,'service_sub_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_scale'); ?>
		<?php $options=array('0'=>'Select Project Scale','1'=>'Large Scale','2'=>'Small Scale');
		echo $form->dropDownList($model,'project_scale',$options,array('class'=>"form-control", 'id'=>"project_scale",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_type'); ?>
		<?php  $options=array('0'=>'Select Project Type','1'=>'PoA','2'=>'PA');
		echo $form->dropDownList($model,'project_type',$options,array('class'=>"form-control", 'id'=>"project_type",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_number'); ?>
		<?php echo $form->textField($model,'proposal_number',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'proposal_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_issue_date'); ?>
		<?php //echo $form->textField($model,'proposal_issue_date',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>

        <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
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
        ));?>
        <?php echo $form->error($model,'proposal_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_revision_number'); ?>
		<?php echo $form->textField($model,'proposa_revision_number',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'proposa_revision_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>

            <?php
            $models = EsplClient::model()->findAll(); //load the model from which u need the data

            $data = CHtml::listData($models, 'id', 'client_name');// fetch the column name from the table

            /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
            $htmlOptions =     array('prompt'=>'-- Select Client Name--','class'=>"form-control", 'selected'=>'selected','onChange' => 'javascript:contractsigned(this.selectedIndex)' );
            // print_r($data);
            echo $form->dropDownList($model,'client_name', $data, $htmlOptions);
            ?>

		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_country'); ?>
		<?php

        $models = Country::model()->findAll(); //load the model from which u need the data

        $data = CHtml::listData($models, 'name', 'name');// fetch the column name from the table

        /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
        $htmlOptions =     array( 'prompt'=>'-- Select Country--','class'=>"form-control",'selected'=>'selected'  );
        // print_r($data);
        echo $form->dropDownList($model,'client_country', $data, $htmlOptions);?>
		<?php echo $form->error($model,'client_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_status'); ?>
		<?php
        $models = ProposalStatus::model()->findAll(); //load the model from which u need the data

        $data = CHtml::listData($models, 'id', 'status_name');// fetch the column name from the table

        /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
        $htmlOptions =     array( 'prompt'=>'-- Select proposal status --','class'=>"form-control", 'selected'=>'selected','onChange' => 'javascript:contractsigned(this.selectedIndex)' );
        // print_r($data);
        echo $form->dropDownList($model,'proposal_status', $data, $htmlOptions);
        ?>
		<?php echo $form->error($model,'proposal_status'); ?>
	</div>

	<div class="row" id="contract_signed" style="display: none">
		<?php echo $form->labelEx($model,'contract_signed'); ?>

        <?php    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'EsplProposal[contract_signed]',
            'value'=>Yii::app()->getRequest()->getParam("holiday_date"),
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
        ));?>

        <?php echo $form->error($model,'contract_signed'); ?>
	</div><script>
                                    function contractsigned(id)
                                    {

                                          alert(id);
                                        if(id ==3) {
                                            document.getElementById("contract_signed").style.display = "block";
                                            alert(document.getElementById("EsplProposal_contract_signed").value);
                                        }else{
                                            document.getElementById("contract_signed").style.display = "none";
                                        }
                                    }
                                </script>

	<div class="row">
		<?php echo $form->labelEx($model,'contract_value'); ?>
		<?php echo $form->textField($model,'contract_value',array('class'=>"form-control", 'id'=>"currency_code",'required'=>"true")); ?>
		<?php echo $form->error($model,'contract_value'); ?>
	</div>
                            <div class="row">
                                <?php echo $form->labelEx($model,'contract_value_currency'); ?>

                                <?php

                                $models = Currency::model()->findAll(); //load the model from which u need the data

                                $data = CHtml::listData($models, 'currency_code', 'currency_code');// fetch the column name from the table

                                /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
                                $htmlOptions =     array( 'prompt'=>'-- Select Currency --','class'=>"form-control",'selected'=>'selected'  );
                                // print_r($data);
                                echo $form->dropDownList($model,'contract_value_currency', $data, $htmlOptions);

                                echo $form->error($model,'contract_value_currency');



                                ?>

                            </div>


	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_name'); ?>

        <?php

        $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users join espl_employee_details as emp on users.id= emp.user_id')->queryAll();

        $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table

        /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
        $htmlOptions =     array( 'prompt'=>'-- Select Name --','class'=>"form-control",'selected'=>"selected", 'ajax' => array(
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
           
            //console.log(result.name);
            
            
            $("#client_representative_email").val(result.email);
           $("#client_representative_phone").val(result.mobilenumber); 
           $("#client_address").val(result.address); 
            $("#hidden_name").val(result.name); 
            return false;
            }'

        ) );
        // print_r($data);
        echo $form->dropDownList($model,'client_representative_name', $data, $htmlOptions);?>

     <input type="hidden" value=" "  name="EsplProposal[hidden_name]" id="hidden_name"/>



        <?php echo $form->error($model,'client_representative_name'); ?>
	</div>


    <div class="row">
        <?php echo $form->labelEx($model,'client_representative_email'); ?>
        <?php echo $form->textField($model,'client_representative_email',array('class'=>"form-control", 'id'=>"client_representative_email",'required'=>"true")); ?>
        <?php echo $form->error($model,'client_representative_email'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'client_representative_phone'); ?>
		<?php echo $form->textField($model,'client_representative_phone',array('class'=>"form-control", 'id'=>"client_representative_phone",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_representative_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_address'); ?>
		<?php echo $form->textField($model,'client_address',array('class'=>"form-control", 'id'=>"client_address",'required'=>"true")); ?>
		<?php echo $form->error($model,'client_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_title'); ?>
		<?php echo $form->textField($model,'project_title',array('class'=>"form-control", 'id'=>"project_title",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_external_number'); ?>
		<?php echo $form->textField($model,'project_external_number',array('class'=>"form-control", 'id'=>"project_external_number",'required'=>"true")); ?>
		<?php echo $form->error($model,'project_external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_lead'); ?>
		<?php



        $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users join espl_employee_details as emp on users.id= emp.user_id')->queryAll();

        $data = CHtml::listData($models, 'id', 'name');// fetch the column name from the table

        /* $htmlOptions =     array( 'prompt'=>'-- Select Service Type --','class'=>"form-control",'selected'=>'selected','onChange' => 'javascript:description(this.selectedIndex)' );*/
        $htmlOptions =     array( 'prompt'=>'-- Select Team Lead --','class'=>"form-control",'selected'=>'selected' );
        // print_r($data);
        echo $form->dropDownList($model,'team_lead', $data, $htmlOptions); ?>
		<?php echo $form->error($model,'team_lead'); ?>
	</div>


	<div class="row">


        <?php  $value= Yii::app()->user->getId();


       // $models = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users join espl_employee_details as emp on users.id= emp.user_id  where users.id = "'.$id.'"')->queryAll();
     /* foreach($models as $val){
          $value1= $val['name'];
      }*/

        ?>
        <input type="hidden" value="<?php echo $value ?>"  name="EsplProposal[created_by]" id="hidden_name"/>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>"btn btn-rose")); ?>
	</div>

<?php $this->endWidget(); ?>

                            </div><!-- form -->
                        </div>
                    </div></div></div></div></div></div>
<?php


?>
