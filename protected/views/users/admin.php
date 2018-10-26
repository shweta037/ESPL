<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
;
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
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
                            <div class="col-md-6"><h4 class="card-title">Manage Users</h4></div>
<!--                            --><?php ///echo Yii::app()->user->getId();?>
                            <?php  if( Yii::app()->user->getState('role') =="Admin"){ ?>
                            <div class="col-md-6"><a href="<?php echo Yii::app()->request->baseUrl; ?>/users/create">
                                    <input class="btn btn-rose" type="botton" name="yt0" value="Add Employees" style="float:right;">
                                </a>
                            </div>
                            <?php } ?>
                        </div>


                    </div>
                    <div class="card-body">

                        <div class="material-datatables">
                            <?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
                            <!--due to jquery min this is not working so i have commented the jquery link in the dashboard footer-->
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
    'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'username',
		'email',
		'name',
        'role',
        'total_leave',
        'combo_off',
        'created_by',
        'created_date',
        'modified_date',

        array(
            'class'=>'CButtonColumn',
            'header' => 'Action',
            'template'=>'{Comb Off}{update}',
            'buttons'=>array(
                'Comb Off'=>  array(
                    'label' => 'Comb Off',
                    'visible'=>'Yii::app()->user->role == "Admin"?true:false',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                    'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like'),
                    'url'   => 'Yii::app()->createUrl("users/combo_off", array("id" => $data->id))',

                ),
                'update'=>array(
                    'label'=>'<i class="material-icons"></i>',
                    'htmlOptions'=>array('style'=>'width: 50px; text-align: center;', 'class'=>'zzz'),
                    'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like'),

                ),


            ),


        ),
	),
)); ?>
