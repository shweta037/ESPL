<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="container">
    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
        <div class="card card-login">
            <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Log in</h4>

            </div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
    <div class="col-md-10"><?php echo $form->error($model,'username'); ?></div>
    <div class="col-md-10"> <?php echo $form->error($model,'password'); ?></div>
    <div class="input-group">
        <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
        </div>
		<?php /*echo $form->labelEx($model,'username'); */?>
		<?php echo $form->textField($model,'username' ,array('class'=>'form-control','placeholder'=>"User Name...")); ?>

	</div>
</div>
            </span>
            <span class="bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
	<!--	--><?php /*echo $form->labelEx($model,'password'); */?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control','password'=>"Password...")); ?>

		   </div>
                </span>

            <span class="bmd-form-group">
                  <div class="input-group">
               <div class="input-group-prepend">
                      <span class="input-group-text">

                    </div>
	          <div class="rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	       </div>
                       </span>
        </div>
        <div class="card-footer justify-content-center">
	<div class="buttons">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-rose btn-link btn-lg')); ?>
	</div>

    </div>
<?php $this->endWidget(); ?>
</div><!-- form -->
    </div></div>
</div>