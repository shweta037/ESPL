<?php
/* @var $this MethodologiesController */
/* @var $model Methodologies */

$this->breadcrumbs=array(
	'Methodologies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Methodologies', 'url'=>array('index')),
	array('label'=>'Create Methodologies', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#methodologies-grid').yiiGridView('update', {
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
                            <div class="col-md-6"><h4 class="card-title">Methodologies Sub Category</h4></div>
                            <div class="col-md-6"><a href="<?php echo Yii::app()->request->baseUrl; ?>/methodologies/create">
                                    <input class="btn btn-rose" type="button" name="yt0" value="Add Methodologies Sub Category" style="float:right;">
                                </a>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">


                        <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'methodologies-grid',
    'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		//'category_id',
       // 'd.category_name',
		'name',
        'category_name',
		//'is_deleted',
		'created_date',
		'modified_date',

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
