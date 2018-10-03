<div class="wrapper">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/sidebar-1.jpg">

        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">

            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                ESPL
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/faces/avatar.jpg" />
                </div>
                <div class="user-info">
                    <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Tania Andrew
                <b class="caret"></b>
              </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> MP </span>
                                    <span class="sidebar-normal"> My Profile </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> EP </span>
                                    <span class="sidebar-normal"> Edit Profile </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span class="sidebar-mini"> S </span>
                                    <span class="sidebar-normal"> Settings </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="./dashboard.html">
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

                        </ul>
                    </div>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
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
                            <a class="nav-link" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
                                <i class="material-icons">person</i>
                                <p>
                                    <span class="d-lg-none d-md-block">Logout</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    <!--  Google Maps Plugin  -->
