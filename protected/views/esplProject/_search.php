<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
        <div class="col-md-3">
            <?php
            $project_stage = InvoiceStage::model()->findAll();
            ?>
            <div class="has-default">
                <select class="form-control selectpicker" data-style="btn select-with-transition" name="EsplProject[stage_name]">
                    <option value="">Select Select Project Status Region</option>
                    <?php
                    foreach ($project_stage as $stage){ ?>
                        <option value="<?php echo $stage['stage_name']; ?>"><?php echo $stage['stage_name']; ?></option>
                    <?php } ?>
            </div>
        </div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->