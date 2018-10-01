<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
    'Services'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Service', 'url'=>array('index')),
    array('label'=>'Create Service', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h1>Manage Services</h1>-->

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Manage Services</h4>
                    </div>
                    <div class="card-body">

                        <div class="material-datatables">
                            <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
                            <!--due to jquery min this is not working so i have commented the jquery link in the dashboard footer-->
                            <div class="search-form" style="display:none">
                                <?php $this->renderPartial('_search',array(
                                    'model'=>$model,
                                )); ?>
                            </div><!-- search-form -->

                            <?php $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'service-grid',
                                'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
                               // 'id'=>'datatables',
                                'dataProvider'=>$model->search(),
                                'filter'=>$model,
                                'columns'=>array(
                                    //'id',
                                    'service_name',
                                    'created_date',
                                    'modified_date',
                                    array(
                                        'class'=>'CButtonColumn',
                                        'header' => 'Action',
                                        'template'=>'{view}{update}{delete}{User}',
                                        'buttons'=>array(

                                            'User'=>array(
                                                'lable'=>"User",
                                                'url'=>'',
                                                'visible'=>'$data["status"]==0?true:false',
                                            ),
                                            'update'=>array(
                                                'label'=>'<i class="material-icons"></i>',
                                                'visible'=>'$data["status"]==1?true:false',
                                                'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like')
                                            ),
                                            'delete'=>array(
                                                'visible'=>'$data["status"]==0?true:false',
                                            ),
                                            'view'=>array(
                                                'visible'=>'$data["status"]==0?true:false',
                                            ),
                                        ),

                                    ),

                                ),

                            )); ?>

                        </div>
                    </div></div>
            </div></div>
    </div>
</div>
<script type="text/javascript">
    $.noConflict();

</script>
