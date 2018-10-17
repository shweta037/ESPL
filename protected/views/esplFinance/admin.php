<?php
/* @var $this EsplFinanceController */
/* @var $model EsplFinance */

$this->breadcrumbs=array(
	'Espl Finances'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EsplFinance', 'url'=>array('index')),
	array('label'=>'Create EsplFinance', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#espl-finance-grid').yiiGridView('update', {
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
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><h4 class="card-title">Manage Invoice</h4></div>
                            <div class="col-md-6"><a href="<?php echo Yii::app()->request->baseUrl; ?>/EsplFinance/create">
                                    <input class="btn btn-rose" type="button" name="yt0" value="Add Finance" style="float:right;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="search-form" style="display:none">
                        <?php $this->renderPartial('_search',array(
                            'model'=>$model,
                        )); ?>
                        </div><!-- search-form -->

                            <?php $this->widget('zii.widgets.grid.CGridView', array(
                                'id'=>'espl-finance-grid',
                                'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
                                'dataProvider'=>$model->search(),
                                'filter'=>$model,
                                'columns'=>array(
                                    'id',
                                    'project_id',
                                    'registerd_issue_date',
                                    'travel_invoice_due_date',
                                    'created_by',
                                    'created_date',
                                    /*
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


</div>
</div></div>
</div></div>
</div>
</div>
<script type="text/javascript">
    $.noConflict();

</script>
