<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2>Error <?php echo $code; ?></h2>

<!--<div class="error">
<?php /*echo CHtml::encode($message); */?>
</d<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
<link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/apple-icon.png">
<link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/favicon.png">
<title>
    Earthood Services Pvt Ltd
</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/material-dashboard.css?v=2.0.1">
<!-- Documentation extras -->
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/assets-for-demo/demo.css" rel="stylesheet" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/core/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/demo.js"></script>
<!-- iframe removal -->
<style>
    .btn-group, .btn-group-vertical { margin-top: 0px !important;}
</style>
</head>

<body class="">
<?php echo CHtml::encode($message); ?>

<div class="errorSummary">

    <p>

        Sorry, it seems like a(n) <?= $error['code']; ?> error has occured during your request.

    </p>


    <p><strong>Message:</strong> <?= $error['message']; ?></p>

</div>

<footer class="footer ">
    <div class="container">
        <nav class="pull-left">

        </nav>
        <div class="copyright pull-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="http://www.vpdl.com/" target="_blank">Virtual Pages</a> for a better management.
        </div>
    </div>
</footer>
</div>
</div>
</body>
<script type="text/javascript">
    /* $.noConflict();
     jQuery.noConflict();*/

</script>
<!--   Core JS Files   -->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/core/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/core/popper.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/bootstrap-material-design.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<!--  Google Maps Plugin  -->

<!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/nouislider.min.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!-- Plugins for presentation and navigation  -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/assets-for-demo/js/modernizr.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/material-dashboard.js?v=2.0.1"></script>
<!-- Dashboard scripts -->
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>-->
<!-- Library for adding dinamically elements -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jquery.validate.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/nouislider.min.js"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/plugins/fullcalendar.min.js"></script>
<!-- demo init -->


<script type="text/javascript">
    function setFormValidation(id){
        $(id).validate({
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
            },
            errorPlacement : function(error, element) {
                $(element).append(error);
            },
        });
    }

</script>
<script type="text/javascript">

    $(document).ready(function() {

        //init wizard

        demo.initMaterialWizard();

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initCharts();

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //init DateTimePickers
        md.initFormExtendedDatetimepickers();

        demo.initVectorMap();
    });
</script>


</html>
