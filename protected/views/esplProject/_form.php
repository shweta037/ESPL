<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */
/* @var $form CActiveForm */
?>
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef1c !important;
    }
</style>
<?php
$project_user_readonly = "";
$finance_user_readonly = "";
$proposal_user_readonly = "";

$proposal_active_pannel = "";
$project_active_pannel = "";
$finance_active_pannel = "";






$role_login = Yii::app()->user->role;
if($role_login=="Admin"){
    $proposal_active_pannel = "active";

    $project_user_readonly = "disabled";
    $finance_user_readonly = "disabled";
    $proposal_user_readonly = "disabled";

}else if($role_login=="Project"){
    $project_active_pannel = "active";

    $finance_user_readonly = "disabled";
    $proposal_user_readonly = "disabled";

}else if($role_login=="Finance"){
    $finance_active_pannel = "active";

    $proposal_user_readonly = "disabled";
    $project_user_readonly = "disabled";

}else{
    $proposal_active_pannel = "active";

    $project_user_readonly = "disabled";
    $finance_user_readonly = "disabled";
    $proposal_user_readonly = "disabled";
}
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
                            <?php if($role_login=="Finance"){ ?>
                                <h4 class="card-title">Finance Information</h4>
                            <?php }else{ ?>
                                <h4 class="card-title">Project Information</h4>
                            <?php } ?>

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
                            <div class="form-group row">
                                <?php echo $form->errorSummary($model); ?>
                                <?php
                                $proposal_info = Yii::app()->db->createCommand()
                                    ->select('espl_proposal.service_type,espl_proposal.service_category,espl_proposal.service_sub_category,espl_proposal.project_scale,espl_proposal.project_type,
                                            espl_proposal.proposal_number,espl_proposal.proposal_issue_date,espl_proposal.proposa_revision_number,espl_proposal.client_name,espl_proposal.client_country,
                                            espl_proposal.proposal_status,espl_proposal.contract_signed,espl_proposal.contract_value,espl_proposal.contract_value_currency,
                                            espl_proposal.client_representative_name,espl_proposal.client_representative_email,espl_proposal.client_representative_phone,
                                            espl_proposal.client_address,espl_proposal.project_title,espl_proposal.project_external_number,espl_proposal.team_lead,
                                            espl_proposal.client_representative_email,espl_proposal.client_representative_phone,
                                            service_type.service_name as servicename,service_category.service_cat_name as categoryname,
                                            e1.name as teamleadname,espl_client.client_name,e2.name as representative_name')
                                    ->from('espl_proposal')
                                    ->join('service_type', 'service_type.id=espl_proposal.service_type')
                                    ->join('service_category', 'service_category.id=espl_proposal.service_category')
                                    ->leftjoin('espl_employee_details as e1', 'e1.user_id=espl_proposal.team_lead')
                                    ->leftjoin('espl_employee_details as e2', 'e2.user_id=espl_proposal.client_representative_name')
                                    ->leftjoin('espl_client', 'espl_client.id=espl_proposal.client_name')
                                    ->where('espl_proposal.id=:id', array(':id'=>$model['proposal_id']))
                                    ->queryRow();

                                ?>
                                <div class="col-md-12">
                                    <?php echo $form->errorSummary($model); ?>
                                    <div class="card-header card-header-tabs card-header-rose">
                                        <div class="nav-tabs-navigation">
                                            <div class="nav-tabs-wrapper">

                                                <ul class="nav nav-tabs" data-tabs="tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo $proposal_active_pannel; ?>" href="#proposal" data-toggle="tab">
                                                            <i class="material-icons">bug_report</i> Proposal Information
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo $project_active_pannel; ?>" href="#projects" data-toggle="tab">
                                                            <i class="material-icons">code</i> Project Information
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                    </li>
                                                    <?php if($role_login=="Admin" || $role_login=="Finance"){ ?>
                                                        <li class="nav-item">
                                                            <a class="nav-link <?php echo $finance_active_pannel; ?>" href="#finiance" data-toggle="tab">
                                                                <i class="material-icons">cloud</i> Finance Information
                                                                <div class="ripple-container"></div>
                                                            </a>
                                                        </li>
                                                    <?php } ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane <?php echo $proposal_active_pannel; ?> col-md-12" id="proposal">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Service Type</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['servicename']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Project Title</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['project_title']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Service Category</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['categoryname']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php
                                                            $subcategory_service_name = Yii::app()->db->createCommand()
                                                                ->select('service_name')
                                                                ->from('service_sub_category')
                                                                ->where('find_in_set(id,"'.$proposal_info['service_sub_category'].'")')->queryAll();
                                                            $subcat_name = implode(',', array_map(function($el){ return $el['service_name']; }, $subcategory_service_name));
                                                            ?>
                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Service Sub Category</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $subcat_name; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Proposal No</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['proposal_number']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php if($role_login=="Project" || $role_login=="Admin"){ ?>
                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Name of Client</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['client_name']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Country of Client</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['client_country']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php if($role_login=="Finance" || $role_login=="Admin"){ ?>
                                                                <div class="row">
                                                                    <label class="col-md-4 col-form-label">Client Representative Name</label>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <input type="text" class="form-control" value="<?php echo $proposal_info['representative_name']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-md-4 col-form-label">Client Representative Email</label>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <input type="text" class="form-control" value="<?php echo $proposal_info['client_representative_email']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <label class="col-md-4 col-form-label">Client Representative Phone</label>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <input type="text" class="form-control" value="<?php echo $proposal_info['client_representative_phone']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>

                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Client Address</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['client_address']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Project Scale</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['project_scale']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <label class="col-md-4 col-form-label">Project Type</label>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">
                                                                        <input type="text" class="form-control" value="<?php echo $proposal_info['project_type']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Contract Signed</label>
                                                            <div class="col-md-8">
                                                                <div class="has-default">
                                                                    <input type="text" class="form-control" value="<?php echo date('d M, Y',strtotime($proposal_info['contract_signed'])); ?>" <?php echo $proposal_user_readonly; ?>>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Contract Value</label>
                                                            <div class="col-md-8">
                                                                <div class="has-default">
                                                                    <input type="text" class="form-control" value="<?php echo $proposal_info['contract_value']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Contract Currency</label>
                                                            <div class="col-md-8">
                                                                <div class="has-default">
                                                                    <input type="text" class="form-control" value="<?php echo $proposal_info['contract_value_currency']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Project External Number</label>
                                                            <div class="col-md-8">
                                                                <div class="has-default">
                                                                    <input type="text" class="form-control" value="<?php echo $proposal_info['project_external_number']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <label class="col-md-4 col-form-label">Team Leader</label>
                                                            <div class="col-md-8">
                                                                <div class="has-default">
                                                                    <input type="text" class="form-control" value="<?php echo $proposal_info['teamleadname']; ?>" <?php echo $proposal_user_readonly; ?>>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane <?php echo $project_active_pannel; ?>" id="projects">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <?php if($role_login=="Project" || $role_login=="Admin"){ ?>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Project Region',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <?php
                                                                            $project_regions = ProjectRegion::model()->findAll(); //load the model from which u need the data ?>
                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[project_region_id][]"  multiple required >
                                                                                <option value="">Select Project Region</option>
                                                                                <?php
                                                                                foreach ($project_regions as $region){
                                                                                    $selected="";
                                                                                    if(in_array($region['id'],explode(',',$model->attributes['project_region_id']))){
                                                                                        $selected="selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $region['id']; ?>" <?php echo $selected; ?>><?php echo $region['region_name']; ?></option>
                                                                                <?php }
                                                                                ?>

                                                                            </select>
                                                                            <?php echo $form->error($model,'project_region_id'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Project Country',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <?php
                                                                            $project_country = Country::model()->findAll(); //load the model from which u need the data ?>
                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[project_country_id][]" multiple required >
                                                                                <option value="">Select Project Country</option>
                                                                                <?php
                                                                                foreach ($project_country as $country){
                                                                                    $selected="";
                                                                                    if(in_array($country['id'],explode(',',$model->attributes['project_country_id']))){
                                                                                        $selected="selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $country['id']; ?>" <?php echo $selected; ?>><?php echo $country['name']; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                            <?php echo $form->error($model,'project_country_id'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $methodologie_category = MethodologiesCategory::model()->findAll();
                                                                foreach ($methodologie_category as $category){ ?>
                                                                    <div class="row">
                                                                        <?php echo $form->labelEx($model,$category['category_name'],array('class'=>'col-md-4 col-form-label')); ?>
                                                                        <div class="col-md-8">
                                                                            <div class="has-default">
                                                                                <input type="hidden" name="EsplProject[methodolgy_category_id][]" value="<?php echo $category['id'] ?>">
                                                                                <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> id="methodolgy_subcategory_id_<?php echo $category['id']; ?>" name="EsplProject[methodolgy_subcategory_id][]"
                                                                                        data-style="btn select-with-transition" multiple required>
                                                                                    <?php
                                                                                    $methodologie_subcategory = Methodologies::model()->findAll(array('condition'=>'category_id = "'.$category['id'].'"'));
                                                                                    foreach ($methodologie_subcategory as $subcategory){
                                                                                        $selected="";
                                                                                        if(in_array($subcategory['id'],explode(',',$model->attributes['methodolgy_subcategory_id']))){
                                                                                            $selected="selected";
                                                                                        }?>
                                                                                        <option value="<?php echo $subcategory['id']; ?>" <?php echo $selected; ?>><?php echo $subcategory['name']; ?></option>
                                                                                        <?php
                                                                                    } ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Mandatory Sector',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">

                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[mandatory_sector][]" multiple required >
                                                                                <option value="">Select Mandatory Sector</option>
                                                                                <?php
                                                                                for($i=1;$i<=15;$i++){
                                                                                    $selected="";
                                                                                    if(in_array($i,explode(',',$model->attributes['mandatory_sector']))){
                                                                                        $selected="selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>

                                                                            <?php echo $form->error($model,'mandatory_sector'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Conditional Sector',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[conditional_sector][]" multiple required >
                                                                                <option value="">Select Conditional Sector</option>
                                                                                <?php
                                                                                for($i=1;$i<=15;$i++){
                                                                                    $selected="";
                                                                                    if(in_array($i,explode(',',$model->attributes['conditional_sector']))){
                                                                                        $selected="selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                            <?php echo $form->error($model,'conditional_sector'); ?>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            <?php //role end
                                                            } ?>

                                                            <div class="row">
                                                                <?php echo $form->labelEx($model,'Technical Area',array('class'=>'col-md-4 col-form-label')); ?>
                                                                <div class="col-md-8">
                                                                    <div class="has-default">

                                                                        <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[technical_area]"  required >
                                                                            <option value="">Select Technical Area</option>
                                                                            <?php

                                                                            for($i=1.1;$i<=15.1;$i+=0.1){
                                                                                $selected="";
                                                                                /*if(in_array($i,explode(',',$model->attributes['technical_area']))){
                                                                                    $selected="selected";
                                                                                }*/
                                                                                if($model->attributes['technical_area']==number_format($i,1)){
                                                                                    $selected="selected";
                                                                                }
                                                                                ?>
                                                                                <option value="<?php echo number_format($i,1); ?>" <?php echo $selected; ?>><?php echo number_format($i,1); ?></option>
                                                                            <?php }
                                                                            ?>
                                                                        </select>
                                                                        <?php echo $form->error($model,'technical_area'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if($role_login=="Project" || $role_login=="Admin") { ?>
                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model, 'Technical Expert', array('class' => 'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <?php
                                                                            $users_expertise = Yii::app()->db->createCommand('SELECT users.*,emp.name FROM users join espl_employee_details as emp on  users.id= emp.user_id')->queryAll(); ?>

                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?>
                                                                                    data-style="btn select-with-transition"
                                                                                    name="EsplProject[technical_expert_id][]"
                                                                                    multiple required>
                                                                                <option value="">Select Technical
                                                                                    Expert
                                                                                </option>
                                                                                <?php
                                                                                foreach ($users_expertise as $expertise) {
                                                                                    $selected = "";
                                                                                    if (in_array($expertise['id'], explode(',', $model->attributes['technical_expert_id']))) {
                                                                                        $selected = "selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $expertise['id']; ?>" <?php echo $selected; ?>><?php echo $expertise['name']; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                            <?php echo $form->error($model, 'technical_expert_id'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model, 'Methodological Expert', array('class' => 'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?>
                                                                                    data-style="btn select-with-transition"
                                                                                    name="EsplProject[methodological_expert_id][]"
                                                                                    multiple required>
                                                                                <option value="">Select Methodological
                                                                                    Expert
                                                                                </option>
                                                                                <?php
                                                                                foreach ($users_expertise as $expertise) {
                                                                                    $selected = "";
                                                                                    if (in_array($expertise['id'], explode(',', $model->attributes['methodological_expert_id']))) {
                                                                                        $selected = "selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $expertise['id']; ?>" <?php echo $selected; ?>><?php echo $expertise['name']; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                            <?php echo $form->error($model, 'methodological_expert_id'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php // end role
                                                            } ?>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php if($role_login=="Project" || $role_login=="Admin") { ?>
                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Financial Expert',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[financial_expert_id][]" multiple required >
                                                                                <option value="">Select Financial Expert</option>
                                                                                <?php
                                                                                foreach ($users_expertise as $expertise){
                                                                                    $selected="";
                                                                                    if(in_array($expertise['id'],explode(',',$model->attributes['financial_expert_id']))){
                                                                                        $selected="selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $expertise['id']; ?>" <?php echo $selected; ?>><?php echo $expertise['name']; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                            <?php echo $form->error($model,'financial_expert_id'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Local Expert',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <select class="form-control selectpicker" <?php echo $project_user_readonly; ?> data-style="btn select-with-transition" name="EsplProject[local_expert_id][]" multiple required >
                                                                                <option value="">Select Local Expert</option>
                                                                                <?php
                                                                                foreach ($users_expertise as $expertise){
                                                                                    $selected="";
                                                                                    if(in_array($expertise['id'],explode(',',$model->attributes['local_expert_id']))){
                                                                                        $selected="selected";
                                                                                    }
                                                                                    ?>
                                                                                    <option value="<?php echo $expertise['id']; ?>" <?php echo $selected; ?>><?php echo $expertise['name']; ?></option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                            <?php echo $form->error($model,'local_expert_id'); ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <?php // end role
                                                            } ?>
                                                            <?php
                                                            $project_status_milestone = Yii::app()->db->createCommand('SELECT id,stage_name as stage_name,project_stage_date,project_stage_date  FROM espl_project_finance_stage where project_id="'.$model->attributes['id'].'"')->queryAll();
                                                            /* if($project_status_milestone==null){
                                                                 $project_status_milestone = Yii::app()->db->createCommand('SELECT invoice_stage.id as id,invoice_stage.stage_name FROM espl_proposal
                                                                                                                             inner join invoice_stage on FIND_IN_SET(invoice_stage.id,espl_proposal.invoice_status_ids)
                                                                                                                             where espl_proposal.id="'.$model->attributes['proposal_id'].'"')->queryAll();
                                                             }*/
                                                            foreach ($project_status_milestone as $project_milestone){ ?>
                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,$project_milestone['stage_name'].' Date',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <?php
                                                                            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                                'name'=>'stage_date['.$project_milestone['id'].']',
                                                                                'id'=>'stage_name'.$project_milestone['id'],
                                                                                //'value'=>Yii::app()->getRequest()->getParam('project_stage_date'),
                                                                                'value'=>$project_milestone['project_stage_date'],
                                                                                //'model' => $model,
                                                                                'attribute' => 'project_stage_date',//this to insert the value from the field
                                                                                'flat'=>false,//remove to hide the datepicker
                                                                                'options'=>array(
                                                                                    'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                                                    'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                                                ),
                                                                                'htmlOptions'=>array(
                                                                                    'style'=>'',
                                                                                    'class'=>"form-control ",
                                                                                    $project_user_readonly=>$project_user_readonly
                                                                                ),
                                                                            ));?>
                                                                            <?php echo $form->error($model,'stage_name'.$project_milestone['id']); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if($role_login=="Project" || $role_login=="Admin") { ?>
                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Submission Date',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
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
                                                                                    'class'=>"form-control ",
                                                                                    $project_user_readonly=>$project_user_readonly
                                                                                ),
                                                                            ));?>
                                                                            <?php echo $form->error($model,'submission_date'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'Completeness Check Date',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
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
                                                                                    'class'=>"form-control ",
                                                                                    $project_user_readonly=>$project_user_readonly
                                                                                ),
                                                                            ));?>
                                                                            <?php echo $form->error($model,'completeness_check_date'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,'I&R Check Completed',array('class'=>'col-md-4 col-form-label')); ?>
                                                                    <div class="col-md-8">
                                                                        <div class="has-default">
                                                                            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
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
                                                                                    'class'=>"form-control ",
                                                                                    $project_user_readonly=>$project_user_readonly
                                                                                ),
                                                                            ));?>
                                                                            <?php echo $form->error($model,'ir_check_date'); ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                                // end role
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if($role_login=="Admin" || $role_login=="Finance"){ ?>
                                                <div class="tab-pane <?php echo $finance_active_pannel; ?>" id="finiance">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <?php echo $form->labelEx($model,'Registered/Issued Date',array('class'=>'col-md-3 col-form-label')); ?>
                                                                <div class="col-md-3">
                                                                    <div class="has-default">
                                                                        <?php
                                                                        $this->widget('zii.widgets.jui.CJuiDatePicker',
                                                                            array(
                                                                                'name'=>'registered_Issued_date',
                                                                                'value'=>Yii::app()->getRequest()->getParam("registered_Issued_date"),
                                                                                'model' => $model,
                                                                                'attribute' => 'registered_Issued_date',//this to insert the value from the field
                                                                                'flat'=>false,//remove to hide the datepicker
                                                                                'options'=>array(
                                                                                    'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                                                    'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                                                ),
                                                                                'htmlOptions'=>array(
                                                                                    'style'=>'',
                                                                                    'class'=>"form-control ",
                                                                                    'placeholder'=>"Please enter Registered/Issued Date",
                                                                                    $finance_user_readonly => $finance_user_readonly
                                                                                ),
                                                                            )
                                                                        );?>
                                                                        <?php echo $form->error($model,'registered_Issued_date'); ?>
                                                                    </div>
                                                                </div>

                                                                <?php echo $form->labelEx($model,'Invoice Bill Number',array('class'=>'col-md-3 col-form-label')); ?>
                                                                <div class="col-md-3">
                                                                    <div class="has-default">
                                                                        <?php echo $form->textField($model,'finance_bill_number',array('class'=>"form-control", 'id'=>"finance_bill_number",'placeholder'=>"Please Enter Bill Number",$finance_user_readonly=>$finance_user_readonly)); ?>
                                                                        <?php echo $form->error($model,'finance_bill_number'); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <?php echo $form->labelEx($model,'Invoice Stage',array('class'=>'col-md-3 col-form-label','style'=>'text-align:center;font-weight: 700;')); ?>
                                                                <?php echo $form->labelEx($model,'Invoice Stage Due Date',array('class'=>'col-md-3 col-form-label','style'=>'text-align:center;font-weight: 700;')); ?>
                                                                <?php echo $form->labelEx($model,'Invoice Stage Amount',array('class'=>'col-md-3 col-form-label','style'=>'text-align:center;font-weight: 700;')); ?>
                                                                <?php echo $form->labelEx($model,'Amount Currency',array('class'=>'col-md-3 col-form-label','style'=>'text-align:center;font-weight: 700;')); ?>

                                                            </div>

                                                            <?php
                                                            $project_status_milestone = Yii::app()->db->createCommand('SELECT *  FROM espl_project_finance_stage where project_id="'.$model->attributes['id'].'"')->queryAll();

                                                            foreach ($project_status_milestone as $project_milestone){ ?>
                                                                <div class="row">
                                                                    <?php echo $form->labelEx($model,$project_milestone['stage_name'].' Due Date',array('class'=>'col-md-3 col-form-label')); ?>
                                                                    <div class="col-md-3">
                                                                        <div class="has-default">
                                                                            <?php
                                                                            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                                'name'=>'finance_stage_date['.$project_milestone['id'].']',
                                                                                'id'=>'finance_stage_date'.$project_milestone['id'],
                                                                                //'value'=>Yii::app()->getRequest()->getParam('project_stage_date'),
                                                                                'value'=>$project_milestone['finance_stage_date'],
                                                                                //'model' => $model,

                                                                                'attribute' => 'finance_stage_date',//this to insert the value from the field
                                                                                'flat'=>false,//remove to hide the datepicker
                                                                                'options'=>array(
                                                                                    'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                                                    'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                                                ),
                                                                                'htmlOptions'=>array(
                                                                                    'style'=>'',
                                                                                    'class'=>"form-control ",
                                                                                    'placeholder'=>"Please enter Invoice Stage  Date",
                                                                                    $finance_user_readonly=>$finance_user_readonly
                                                                                ),
                                                                            ));?>
                                                                            <?php echo $form->error($model,'finance_stage_date'.$project_milestone['id']); ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="has-default">
                                                                            <input type="text" name="finance_stage_amount[<?php echo $project_milestone['id']; ?>]" <?php echo $finance_user_readonly; ?> value="<?php echo $project_milestone['finance_stage_amount']; ?>" class="form-control" placeholder="Please enter invoice amount">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="has-default">
                                                                            <select name="finance_stage_amount_currency[<?php echo $project_milestone['id']; ?>]" <?php echo $finance_user_readonly; ?>  class="form-control selectpicker" data-style="btn select-with-transition">
                                                                                <option value="">Select Currency</option>
                                                                                <?php
                                                                                $currency = Currency::model()->findAll(); //load the model from which u need the data
                                                                                foreach ($currency as $curr){ ?>
                                                                                    <option value="<?php echo $curr['currency_code']; ?>" <?php if($curr['currency_code']==$project_milestone['finance_stage_amount_currency']){ echo "selected"; } ?>>
                                                                                        <?php echo $curr['currency_code']; ?>
                                                                                    </option>
                                                                                <?php }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <hr>
                                                            <div class="row">
                                                                <b>Travel Invoice Details :</b>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="has-default">
                                                                        <select name="EsplProject[travel_invoice_type]" <?php echo $finance_user_readonly; ?>  class="form-control selectpicker" data-style="btn select-with-transition">
                                                                            <option value="">Select Travel Invoice Due Date</option>
                                                                                <option value="Included in Fee" <?php if($model->attributes['travel_invoice_type']=="Included in Fee"){ echo "selected"; } ?>>Included in Fee</option>
                                                                                <option value="Excluded at Actual" <?php if($model->attributes['travel_invoice_type']=="Excluded at Actual"){ echo "selected"; } ?>>Excluded at Actual</option>
                                                                                <option value="Excluded at Cap" <?php if($model->attributes['travel_invoice_type']=="Excluded at Cap"){ echo "selected"; } ?>>Excluded at Cap</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="has-default">
                                                                        <?php
                                                                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                            'name'=>'EsplProject[travel_invoice_date]',
                                                                            'value'=>Yii::app()->getRequest()->getParam("travel_invoice_date"),
                                                                            'model' => $model,
                                                                            'attribute' => 'travel_invoice_date',//this to insert the value from the field
                                                                            'flat'=>false,//remove to hide the datepicker
                                                                            'options'=>array(
                                                                                'dateFormat' => 'yy-mm-dd',//can change the format of date
                                                                                'showAnim'=>'drop',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                                                                            ),
                                                                            'htmlOptions'=>array(
                                                                                'style'=>'',
                                                                                'class'=>"form-control ",
                                                                                'placeholder'=>'Please select travel invoice date',
                                                                                $finance_user_readonly=>$finance_user_readonly
                                                                            ),
                                                                        ));?>
                                                                        <?php echo $form->error($model,'travel_invoice_date'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="has-default">
                                                                        <?php echo $form->textField($model,'travel_invoice_type',array('class'=>"form-control", 'id'=>"travel_invoice_type",'placeholder'=>'Please enter travel amount')); ?>
                                                                        <?php echo $form->error($model,'travel_invoice_type'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="has-default">
                                                                        <select name="EsplProject[travel_invoice_currency]" <?php echo $finance_user_readonly; ?>  class="form-control selectpicker" data-style="btn select-with-transition">
                                                                            <option value="">Select Currency</option>
                                                                            <?php
                                                                            $currency = Currency::model()->findAll(); //load the model from which u need the data
                                                                            foreach ($currency as $curr){ ?>
                                                                                <option value="<?php echo $curr['currency_code']; ?>" <?php if($curr['currency_code']==$model->attributes['travel_invoice_currency']){ echo "selected"; } ?>>
                                                                                    <?php echo $curr['currency_code']; ?>
                                                                                </option>
                                                                            <?php }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                    </div>
                                </div>
                                <?php if($role_login!="Admin"){ ?>
                                    <div class="buttons col-md-12 ">
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('class'=>"btn btn-rose pull-right")); ?>
                                    </div>
                                <?php } ?>
                                <?php $this->endWidget(); ?>
                            </div><!-- form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>