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

<!--<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>-->

</html>
