
<!-- End Navbar -->
<?php
$proposal_status = Yii::app()->db->createCommand()
    ->select('count(espl_proposal.id) as total,proposal_status.status_name')
    ->from('proposal_status')
    ->leftjoin('espl_proposal','espl_proposal.proposal_status = proposal_status.id')
    ->group('status_name')
    ->queryAll();
/*
$project_status = Yii::app()->db->createCommand()
    ->select('count(espl_project.id) as total,proposal_status.status_name')
    ->from('proposal_status')
    ->leftjoin('espl_project','espl_project.proposal_status = proposal_status.id')
    ->group('status_name')
    ->queryAll();*/


?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3><span style="color:#000000;">
                    <?php echo "Welcome &nbsp;". ucfirst(Yii::app()->user->getName());?></span></h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($proposal_status as $porposal){ ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon" style=" padding: 0px;">
                                    <i class="material-icons">weekend</i>
                                </div>
                                <p class="card-category"><?php echo $porposal['status_name']; ?> Proposals</p>
                                <h3 class="card-title"><?php echo $porposal['total']; ?></h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">

                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
        <div class="row">
        </div>

            <!--<div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <p class="card-category">Website Visits</p>
                        <h3 class="card-title">75.521</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Google Analytics
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Revenue</p>
                        <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Last 24 Hours
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Followers</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>-->

    </div>
</div>