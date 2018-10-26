
<div class="wrapper">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/sidebar-1.jpg">
        <div class="logo" style="text-align: center;color: #fff;">ESPL</div>
        <?php
        $role_login_nav = Yii::app()->user->role;
        $id= Yii::app()->user->getId();
        $employee_info = Yii::app()->db->createCommand()
            ->select('name ,address,father_name,title,profile_image,mobile_number,health_benifits,date_of_birth')
            ->from('espl_employee_details')
            ->where('espl_employee_details.user_id=:id', array(':id'=>$id))
            ->queryRow();

        ?>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/dashboard/index"">
                        <i class="material-icons">dashboard</i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                        <i class="material-icons">image</i>
                        <p> Masters
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/service/admin">
                                    <span class="sidebar-mini"> ST </span>
                                    <span class="sidebar-normal"> Service Type </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/country/admin">
                                    <span class="sidebar-mini"> C </span>
                                    <span class="sidebar-normal"> Country </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/currency/admin">
                                    <span class="sidebar-mini"> C </span>
                                    <span class="sidebar-normal"> Currency </span>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/holidays/admin">
                                    <span class="sidebar-mini"> H </span>
                                    <span class="sidebar-normal"> Holidays </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/EsplLeaves/admin">
                                    <span class="sidebar-mini">L M</span>
                                    <span class="sidebar-normal">Manage Leave</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/EsplLeaveManagement/admin">
                                    <span class="sidebar-mini">L M</span>
                                    <span class="sidebar-normal"> Leave Management</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/invoiceStage/admin">
                                    <span class="sidebar-mini">I S</span>
                                    <span class="sidebar-normal"> Invoice Stage </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/methodologiesCategory/admin">
                                    <span class="sidebar-mini">M C</span>
                                    <span class="sidebar-normal">Methodologies Category </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/methodologies/admin">
                                    <span class="sidebar-mini">M S C</span>
                                    <span class="sidebar-normal">Methodologies Sub Category </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/projectRegion/admin">
                                    <span class="sidebar-mini">P R</span>
                                    <span class="sidebar-normal">Project Region </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/proposalStatus/admin">
                                    <span class="sidebar-mini">P S</span>
                                    <span class="sidebar-normal">Project Status </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/serviceSubCategory/admin">
                                    <span class="sidebar-mini">S S C</span>
                                    <span class="sidebar-normal">Service Sub Category </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/EsplClient/admin">
                                    <span class="sidebar-mini"> C P</span>
                                    <span class="sidebar-normal"> Client Profile</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/ProductMaster/admin">
                                    <span class="sidebar-mini"> P M</span>
                                    <span class="sidebar-normal"> Product Master</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                        <i class="material-icons">apps</i>
                        <p> Management
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="componentsExamples">
                        <ul class="nav">
                            <!--<li class="nav-item ">
                                <a class="nav-link" href="<?php /*echo Yii::app()->request->baseUrl; */?>/Status/admin">
                                    <span class="sidebar-mini">P S</span>
                                    <span class="sidebar-normal">Master Status </span>
                                </a>
                            </li>-->
                            <?php if($role_login_nav=="Proposal"){ ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/EsplProposal/admin">
                                    <span class="sidebar-mini">P S</span>
                                    <span class="sidebar-normal">Proposal</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php
                            if($role_login_nav=="Admin" || $role_login_nav=="Finance" || $role_login_nav=="Project"){
                                    if($role_login_nav=="Finance"){
                                        $menu_name = "Finance";
                                    }else{
                                        $menu_name = "Project";
                                    }
                                ?>
                                <li class="nav-item ">
                                    <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/esplProject/admin">
                                        <span class="sidebar-mini">P</span>
                                        <span class="sidebar-normal"><?php echo $menu_name; ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/Users/admin">
                                    <span class="sidebar-mini">P S</span>

                                    <?php if(Yii::app()->user->role == 'Admin'){?>
                                        <span class="sidebar-normal">Employees</span>
                                    <?php }else{ ?>
                                        <span class="sidebar-normal">Profile</span>
                                    <?php  } ?>
                                </a>
                            </li>
                            <?php if($role_login_nav=="Admin"){ ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/productAssign/admin">
                                    <span class="sidebar-mini"> P A</span>
                                    <span class="sidebar-normal"> Product Assign</span>
                                </a>
                            </li>
                            <?php } ?>


                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/projectTimeSheet/admin">
                                    <span class="sidebar-mini"> T S</span>
                                    <span class="sidebar-normal"> Timeshhet</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


<!--  Google Maps Plugin  -->
