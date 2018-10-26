<?php
/* @var $this EsplProjectController */
/* @var $model EsplProject */

$this->breadcrumbs=array(
	'Espl Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EsplProject', 'url'=>array('index')),
	array('label'=>'Create EsplProject', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return true;
});
$('.search-form form').submit(function(){
	$('#espl-project-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">Projects</i>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(Yii::app()->user->role=="Finance"){ ?>
                                <h4 class="card-title">Manage Finance</h4>
                                <?php }else{ ?>
                                    <h4 class="card-title">Manage Projects</h4>
                                <?php } ?>
                                <?php if(Yii::app()->user->hasFlash('success')):?>
                                    <b class="flash-success" style="color: #e01717;"><?php echo Yii::app()->user->getFlash('success'); ?></b>
                                <?php endif; ?>
                            </div>

                        </div>


                    </div>
                    <div class="card-body">
                        <?php //echo CHtml::link('Advanced Search','javascript:void(0);',array('class'=>'search-button')); ?>
                            <!--<div class="search-form" style="display: block;">
                                <?php /*$this->renderPartial('_search',array(
                                    'model'=>$model,
                                )); */?>
                            </div>-->
                        <!-- search-form -->

                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'espl-project-grid',
                            'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
                            'dataProvider'=>$model->search(),
                            'filter'=>$model,
                            'columns'=>array(
                                'id',
                                'project_title',
                                'teamleader',
                                'created_date',
                                'modified_date',

                                /*
                                'conditional_sector',
                                'mandatory_sector',
                                'project_region_id',
                                'technical_area',
                                'technical_expert_id',
                                'methodological_expert_id',
                                'financial_expert_id',
                                'local_expert_id',

                                'submission_date',
                                'completeness_check_date',
                                'ir_check_date',
                                'created_date',
                                'modified_date',
                                */


                                array(
                                    'class'=>'CButtonColumn',
                                    'header' => 'Action',
                                    'template'=>'{view}{update}{delete}',
                                    'buttons'=>array(

                                        'update'=>array(
                                            'label'=>'<i class="material-icons"></i>',
                                            'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                                            'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like')
                                        ),
                                        'delete'=>array(
                                            'visible'=>'$data["id"]==0?true:false',
                                        ),
                                        'view'=>array(
                                            'visible'=>'$data["id"]==0?true:false',
                                        ),
                                    ),
                                ),
                            ),
                        )); ?>
