<?php
/* @var $this ProjectTimeSheetController */
/* @var $model ProjectTimeSheet */

$this->breadcrumbs=array(
    'Project Time Sheets'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List ProjectTimeSheet', 'url'=>array('index')),
    array('label'=>'Create ProjectTimeSheet', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#project-time-sheet-grid').yiiGridView('update', {
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
                            <i class="material-icons">Timesheet</i>
                        </div>
                        <div class="row">
                            <?php  Yii::app()->user->name;?>
                            <div class="col-md-6">
                                <?php
                                $projectid1 = CHttpRequest::getParam('id');
                                $project_name = Yii::app()->db->createCommand()
                                    ->select('project_title')
                                    ->from('espl_proposal')
                                    ->join('espl_project','espl_project.proposal_id = espl_proposal.id')
                                    ->where('espl_project.id=:id', array(':id'=>$projectid1))
                                    ->queryRow();
                                ?>
                                <h4 class="card-title">Project Timesheet Details (<?php echo $project_name['project_title']; ?>)</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/projectTimeSheet/admin">
                                    <input class="btn btn-primary" type="button" name="yt0" value="<< Back" style="float:right;">
                                </a>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/projectTimeSheet/create/<?php echo $projectid1; ?>">
                                    <input class="btn btn-info" type="button" name="yt0" value="Add Time" style="float:right;">
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
                        </div>
                        <?php
                        /* echo "<pre>";
                         print_r($model);*/
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'project-time-sheet-grid',
                            'itemsCssClass'=>'table table-striped table-no-bordered table-hover dataTable dtr-inline',
                            'dataProvider'=>$model->search(),
                            'filter'=>$model,
                            'columns'=>array(
                                //'id',
                                'timesheet_date',
                                'totalhrs',
                                'created_date',
                               /* array(
                                    'class'=>'CButtonColumn',
                                    'header' => 'Action',
                                    'template'=>'{update1}',
                                    'buttons'=>array(
                                        'update1'=>array(
                                            'label'=>'<input class="btn btn-rose" type="button" name="yt0" value="Edit">',
                                            'htmlOptions'=>array('style'=>'width: 50px; text-align: center;margin-right:15px;', 'class'=>'zzz'),
                                            'option'=>array('class'=>'btn btn-link btn-info btn-just-icon like'),
                                            'url'   => 'Yii::app()->createUrl("projectTimeSheet/update", array("id" => $data->id))',
                                        )
                                    )

                                ),*/
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
