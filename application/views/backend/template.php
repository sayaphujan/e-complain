<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-Complaint Muhammadiyah Bligo</title>
        <link href='<?php echo base_url("assets/img/iconmuh.png"); ?>' rel='shortcut icon' type='image/x-icon'/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.3.2 -->        
        <link href="<?php echo base_url('assets/css/rifqi/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets/css/rifqi/font-awesome.min.css'); ?>" rel="stylesheet">
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/rifqi/ionicons.min.css'); ?>" rel="stylesheet">
        <!-- Select2 -->
        <link href="<?php echo base_url('assets/css/rifqi/select2.min.css'); ?>" rel="stylesheet">
        <!-- Bootstrap time Picker -->
 		<link href="<?php echo base_url('assets/css/rifqi/bootstrap-timepicker.min.css'); ?>" rel="stylesheet">
        <!-- DATA TABLES -->    
        <link href="<?php echo base_url('assets/js/rifqi/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet">        
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/rifqi/AdminLTE.min.css'); ?>" rel="stylesheet">
        <!-- AdminLTE Skins. Choose a skin from the css/skins -->
        <link href="<?php echo base_url('assets/css/rifqi/skins/_all-skins.min.css'); ?>" rel="stylesheet">

        <!--datepicker -->
        <link href="<?php echo base_url('assets/js/rifqi/plugins/datepicker/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet" type="text/css">
        <!-- iCheck -->		
        <link href="<?php echo base_url('assets/js/rifqi/plugins/iCheck/all.css'); ?>" rel="stylesheet" type="text/css">
        
        <!-- jvectormap -->
        <link href="<?php echo base_url('assets/js/rifqi/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" >
       
    
        <link href="<?php echo base_url('assets/js/rifqi/plugins/tree-view/jquery.treeview.css'); ?>" rel="stylesheet" type="text/css" >  
        <link href="<?php echo base_url('assets/css/rifqi/bootstrap-combobox.css'); ?>" rel="stylesheet" type="text/css" >
        <!-- css untuk export datatable -->
        <link href="<?php echo base_url('assets/css/rifqi/buttons.dataTables.min.css'); ?>" rel="stylesheet" type="text/css" >
    </head>
    <body class="hold-transition skin-green sidebar-mini">
        <div class="wrapper">
            <?php echo $_header; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php echo $_sidebar; ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <?php echo $_content; ?> 
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> <?php echo CI_VERSION ?>
                </div>
                <strong>Copyright &copy; 2018 <a href="">Mr. Rifqi - E-Complaint Muhammadiyah Bligo</a> - </strong> All rights reserved 
            </footer>
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Create the tabs -->
				<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				  <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
				  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
				  <!-- Home tab content -->
				  <div class="tab-pane" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
					  <li>
						<a href="javascript::;">
						  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
						  <div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
							<p>Will be 23 on April 24th</p>
						  </div>
						</a>
					  </li>
					  <li>
						<a href="javascript::;">
						  <i class="menu-icon fa fa-user bg-yellow"></i>
						  <div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
							<p>New phone +1(800)555-1234</p>
						  </div>
						</a>
					  </li>
					  <li>
						<a href="javascript::;">
						  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
						  <div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
							<p>nora@example.com</p>
						  </div>
						</a>
					  </li>
					  <li>
						<a href="javascript::;">
						  <i class="menu-icon fa fa-file-code-o bg-green"></i>
						  <div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
							<p>Execution time 5 seconds</p>
						  </div>
						</a>
					  </li>
					</ul><!-- /.control-sidebar-menu -->

					<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
					  <li>
						<a href="javascript::;">
						  <h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						  </h4>
						  <div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						  </div>
						</a>
					  </li>
					  <li>
						<a href="javascript::;">
						  <h4 class="control-sidebar-subheading">
							Update Resume
							<span class="label label-success pull-right">95%</span>
						  </h4>
						  <div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						  </div>
						</a>
					  </li>
					  <li>
						<a href="javascript::;">
						  <h4 class="control-sidebar-subheading">
							Laravel Integration
							<span class="label label-warning pull-right">50%</span>
						  </h4>
						  <div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						  </div>
						</a>
					  </li>
					  <li>
						<a href="javascript::;">
						  <h4 class="control-sidebar-subheading">
							Back End Framework
							<span class="label label-primary pull-right">68%</span>
						  </h4>
						  <div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						  </div>
						</a>
					  </li>
					</ul><!-- /.control-sidebar-menu -->

				  </div><!-- /.tab-pane -->
				  <!-- Stats tab content -->
				  <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
				  <!-- Settings tab content -->
				  <div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
					  <h3 class="control-sidebar-heading">General Settings</h3>
					  <div class="form-group">
						<label class="control-sidebar-subheading">
						  Report panel usage
						  <input type="checkbox" class="pull-right" checked>
						</label>
						<p>
						  Some information about this general settings option
						</p>
					  </div><!-- /.form-group -->

					  <div class="form-group">
						<label class="control-sidebar-subheading">
						  Allow mail redirect
						  <input type="checkbox" class="pull-right" checked>
						</label>
						<p>
						  Other sets of options are available
						</p>
					  </div><!-- /.form-group -->

					  <div class="form-group">
						<label class="control-sidebar-subheading">
						  Expose author name in posts
						  <input type="checkbox" class="pull-right" checked>
						</label>
						<p>
						  Allow the user to show his name in blog posts
						</p>
					  </div><!-- /.form-group -->

					  <h3 class="control-sidebar-heading">Chat Settings</h3>

					  <div class="form-group">
						<label class="control-sidebar-subheading">
						  Show me as online
						  <input type="checkbox" class="pull-right" checked>
						</label>
					  </div><!-- /.form-group -->

					  <div class="form-group">
						<label class="control-sidebar-subheading">
						  Turn off notifications
						  <input type="checkbox" class="pull-right">
						</label>
					  </div><!-- /.form-group -->

					  <div class="form-group">
						<label class="control-sidebar-subheading">
						  Delete chat history
						  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
						</label>
					  </div><!-- /.form-group -->
					</form>
				  </div><!-- /.tab-pane -->
				</div>
		</aside><!-- /.control-sidebar -->
			  <!-- Add the sidebar's background. This div must be placed
				   immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/rifqi/bootstrap.min.js'); ?>"></script>
        <!-- select2 -->
        <script src="<?php echo base_url('assets/js/rifqi/select2.full.min.js'); ?>"></script>
        <!-- timepicker -->
        <script src="<?php echo base_url('assets/js/rifqi/bootstrap-timepicker.min.js'); ?>"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
       
        <script src="<?php echo base_url('assets/js/rifqi/plugins/datatables/dataTables.bootstrap.js'); ?>"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
         <!-- InputMask -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/rifqi/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/rifqi/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
        <!-- Datepicker -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/datepicker/moment.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/rifqi/plugins/datepicker/bootstrap-datetimepicker.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/rifqi/plugins/datepicker/locales/id.js'); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/iCheck/icheck.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/fastclick/fastclick.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/rifqi/AdminLTE/app.min.js'); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/js/rifqi/AdminLTE/demo.js'); ?>"></script>
        <!-- treeview -->
        <script src="<?php echo base_url('assets/js/rifqi/plugins/tree-view/jquery.cookie.js'); ?>"></script>  
        <script src="<?php echo base_url('assets/js/rifqi/plugins/tree-view/jquery.treeview.js'); ?>"></script>  
        <script src="<?php echo base_url('assets/js/rifqi/plugins/tree-view/demo.js'); ?>" type="text/javascript" ></script>    
        <script type="text/javascript" src="<?php echo base_url('assets/js/rifqi/bootstrap-combobox.js'); ?>"></script>
        <!-- js export datatables-->
        <script src="<?php echo base_url('assets/js/rifqi/datatables/dataTables.buttons.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/rifqi/datatables/dataTables.select.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/rifqi/datatables/buttons.html5.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/rifqi/datatables/jszip.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/rifqi/datatables/pdfmake.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/rifqi/datatables/vfs_fonts.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/rifqi/datatables/buttons.print.min.js'); ?>"></script>

    </body>
</html>
<script>
    $(function () {
    	$.fn.dataTable.ext.errMode = 'throw';
		$('#tb-datatables').dataTable({
			"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}],
			"oLanguage": {
                    "sSearch": "Search Data :  ",
                    "sZeroRecords": "No records to display",
                    "sEmptyTable": "No data available in table"
                    },
          "dom": 'Bfrtip',
          "select": true,
          "buttons": [
            {
                "extend": 'collection',
                "text": 'Export',
                "buttons": [
                    'copy',
                    'excel',
                    'pdf',
                    'print',
                ]
            }
            ]
		});       
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("[data-mask]").inputmask();
        $('.datepicker').datetimepicker({
  				locale: 'id',
                weekStart: 1,
                todayBtn:  1,
          autoclose: 1,
          todayHighlight: 1,
          startView: 2,
          minView: 2,
          forceParse: 0
        });
    });

    $(function () {
    $('#min-date').datetimepicker();
    $('#max-date').datetimepicker();
    $('#datetimepicker1').datetimepicker();
    $('#datetimepicker2').datetimepicker({
    	format: 'd-m-Y H:i'
    });
    });
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
      showMeridian: false
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

	});

</script>
