<?php
/* @var $this ProductAssignController */
/* @var $model ProductAssign */

$this->breadcrumbs=array(
	'Product Assigns'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProductAssign', 'url'=>array('index')),
	array('label'=>'Create ProductAssign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-assign-grid').yiiGridView('update', {
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
                            <?php  Yii::app()->user->name;?>
                            <div class="col-md-6"><h4 class="card-title">Manage Product</h4></div>
                            <div class="col-md-6"><a href="<?php echo Yii::app()->request->baseUrl; ?>/productAssign/create">
                                    <input class="btn btn-rose" type="button" name="yt0" value="Assign Product" style="float:right;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
                        <div class="search-form" style="display:none">
                            <?php $this->renderPartial('_search',array(
                                'model'=>$model,
                            )); ?>
                        </div><!-- search-form -->
                        <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'product-assign-grid',
                            'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
                            'dataProvider'=>$model->search(),
                            'filter'=>$model,
                            'columns'=>array(
                                'id',
                                'product_id',
                                'employe_id',
                                'assign_date',
                                'created_by',
                                //'created_date',
                                /*
                                'modified_date',
                                */
                                array(
                                    'class'=>'CButtonColumn',
                                    'header' => 'Action',
                                    'template'=>'{update}{delete}',
                                    /*  'buttons'=>array(

                                          'update'=>array(
                                              'label'=>'<i class="material-icons"></i>',
                                              'htmlOptions'=>array('style'=>'width: 50px; text-align: center;margin-right:15px;', 'class'=>'zzz'),
                                              'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like')
                                          ),
                                          'delete'=>array(
                                              'label'=>'<i class="material-icons"></i>',
                                              'htmlOptions'=>array('style'=>'width: 50px; text-align: center;margin-right:15px;', 'class'=>'zzz'),
                                              'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like')
                                          ),
                                          'view'=>array(
                                              'visible'=>'$data["id"]==0?true:false',
                                          ),
                                      ),*/
                                ),
                            ),
                        )); ?>
