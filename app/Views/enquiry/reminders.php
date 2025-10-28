<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta content="KHM-Touracle" name="description">
		<meta content="Megatrend Knowledge Management Systems Pvt Ltd" name="author">
		<meta name="keywords" content="KHM">
		<!-- Favicon-->
		<link rel="icon" href="<?php echo base_url('assets/images/brand/favicon.png'); ?>" type="image/x-icon"/>

		<!-- Title -->
		<title>KHM - Reminders</title>

		<!-- Bootstrap css -->
		<link href="<?php echo base_url('assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet" />

		<!-- Style css -->
		<link  href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />

		<!-- Default css -->
		<link href="<?php echo base_url('assets/css/default.css'); ?>" rel="stylesheet">

		<!-- Sidemenu css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sidemenu/icon-sidemenu.css'); ?>">

		<!-- Owl-carousel css-->
		<link href="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.css'); ?>" rel="stylesheet" />

		<!-- Bootstrap-daterangepicker css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>">

		<!-- Bootstrap-datepicker css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css'); ?>">

		<!-- Custom scroll bar css -->
		<link href="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet"/>

		<!-- P-scroll css -->
		<link href="<?php echo base_url('assets/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" type="text/css">

		<!-- Font-icons css -->
		<link  href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="<?php echo base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

		<!-- Nice-select css  -->
		<link href="<?php echo base_url('assets/plugins/jquery-nice-select/css/nice-select.css'); ?>" rel="stylesheet"/>

		<!-- Color-palette css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins.css'); ?>"/>

		<link href="<?php echo base_url('assets/plugins/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatable/css/buttons.bootstrap4.min.css'); ?>">
		<link href="<?php echo base_url('assets/plugins/datatable/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/datatable/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />
		
		<script src="<?php echo base_url('assets/tiny_mce/tiny_mce.js');?>"></script>
		<style>
				
		table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before, table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
    		top: 0px !important;
		}
		#report_table {
			width: 100%; /* Ensure the table takes up the full width of its container */
			table-layout: auto; /* Let the browser determine the column widths */
		
		}

		#report_table th, #report_table td {
			white-space: nowrap; /* Prevent text from wrapping */
			text-overflow: ellipsis; /* Add ellipsis (...) for overflowed content */
			overflow: hidden; /* Hide overflowed content */
		}

		.fixed-width-column1 {
			width: 150px; /* Fixed width for specific columns, adjust as needed */
		}

		.auto-width {
			/* No width defined, auto-fit to content */
		}

		#report_table th.auto-width, #report_table td.auto-width {
			width: auto; /* Auto width for content */
			max-width: 200px; /* Optional: Limit max width */
		}
		.custom-modal-width {
			max-width: 90%; /* Adjust as needed */
			width: 90%;
		}

		#btn_gen_report {
			background: #339966;
			color: white;
			border: 1px solid #006600;
			border-radius: 12px;
			backdrop-filter: blur(8px);
			-webkit-backdrop-filter: blur(8px);
			padding: 6px 14px;
			font-size: 16px;
			font-weight: 600;
			float: right;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}

		#btn_gen_report:hover {
			background: #006600;
			transform: scale(1.05);
		}
		</style>

	</head>

	<body class="app sidebar-mini">	

		<!-- Loader -->
		<div id="loading">
			<img src="<?php echo base_url('assets/images/other/loader.svg'); ?>" class="loader-img" alt="Loader">
		</div>

		<div class="modal fade" id="drivercall_modal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog custom-modal-width" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#339966;color:#fff;">
							<h5 class="modal-title" id="example-Modal3">Driver Call Followup</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
									
							
								<div class="row" style="padding-top:5px;">
									<div class="col-lg-12">
										<table class="table" id="table_drivercall_details" style="width: 100%;">
											<thead style="background-color: #c6ecd9;"> 
												<tr>
													<th scope="col">Call Status</th>
													<th scope="col">Call Time</th>
													<th scope="col">Comments</th>
													
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
						</div>
						
					</div>
				</div>
			</div>
		<div class="modal fade" id="departurecall_modal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog custom-modal-width" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#339966;color:#fff;">
							<h5 class="modal-title" id="example-Modal3">Departure Call Followup</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
									
							
								<div class="row" style="padding-top:5px;">
									<div class="col-lg-12">
										<table class="table" id="table_depcall_details" style="width: 100%;">
											<thead style="background-color: #c6ecd9;"> 
												<tr>
													<th scope="col">Call Status</th>
													<th scope="col">Call Time</th>
													<th scope="col">Comments</th>
													
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
						</div>
						
					</div>
				</div>
			</div>

		<div class="modal fade" id="arrival_details_modal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog custom-modal-width" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#339966;color:#fff;">
							<h5 class="modal-title" id="example-Modal3">Arrival Details Followup</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
									
							
								<div class="row" style="padding-top:5px;">
									<div class="col-lg-12">
										<table class="table" id="table_arrival_details" style="width: 100%;">
											<thead style="background-color: #c6ecd9;"> 
												<tr>
													<th scope="col">Call Status</th>
													<th scope="col">Call Time</th>
													<th scope="col">Comments</th>
													
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="modal fade" id="pre_arrivalcall_modal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog custom-modal-width" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#339966;color:#fff;">
							<h5 class="modal-title" id="example-Modal3">Pre Arrival Call Followup</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
									
							
								<div class="row" style="padding-top:5px;">
									<div class="col-lg-12">
										<table class="table" id="table_prearr_details" style="width: 100%;">
											<thead style="background-color: #c6ecd9;"> 
												<tr>
													<th scope="col">Call Status</th>
													<th scope="col">Call Time</th>
													<th scope="col">Comments</th>
													
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
						</div>
						
					</div>
				</div>
			</div>

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

				<!-- Top-header opened -->
				<div class="header-main header sticky">
					<div class="app-header header top-header navbar-collapse ">
						<div class="container-fluid">
							<div class="d-flex">
								<a class="header-brand" href="index.html">
									<img src="<?php echo base_url('assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-logo " alt="Dashlot logo">
									<img src="<?php echo base_url('assets/images/brand/logo1.png'); ?>" class="header-brand-img desktop-logo-1 " alt="Dashlot logo">
									<img src="<?php echo base_url('assets/images/brand/favicon.png'); ?>" class="mobile-logo" alt="Dashlot logo">
									<img src="<?php echo base_url('assets/images/brand/favicon1.png'); ?>" class="mobile-logo-1" alt="Dashlot logo">
								</a>
								<a href="#" data-toggle="sidebar" class="nav-link icon toggle"><i class="fe fe-align-justify fs-20"></i></a>
								<div class="d-flex header-left left-header">
									<div class="d-none d-lg-block horizontal">
										<ul class="nav">
											<li class="">
												<div class="dropdown d-none d-md-flex">
													<a href="#" class="d-flex nav-link pr-0  pt-2 mt-3 country-flag1" data-toggle="dropdown">
														<span class="d-flex"><img src="<?php echo base_url('assets/images/roles.jpg'); ?>" alt="img" class="avatar country-Flag mr-2 align-self-center"></span>
														<div>
															<span class="d-flex fs-14 mr-3 mt-0"><?php echo session('active_role_name'); ?><span><i class="mdi mdi-chevron-down"></i></span></span>
														</div>
													</a>
													<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
													<?php foreach ($all_roles_assn as $data) : ?>
														<a href="#" onclick="switchroles(<?php echo $data['role_id']; ?>,'<?php echo $data['role_name']; ?>');" class="dropdown-item d-flex align-items-center mt-2">
															<div>
																<span><?php echo $data['role_name']; ?></span>
															</div>
														</a>
													<?php endforeach; ?>
														
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="d-flex header-left left-header">
									<div class="d-none d-lg-block horizontal">
										<ul class="nav">
											<li class="">
												<div class="dropdown d-none d-md-flex">
													<a href="#" class="d-flex nav-link pr-0  pt-2 mt-3 country-flag1" data-toggle="dropdown">
														<span class="d-flex"><img src="<?php echo base_url('assets/images/system.jpg'); ?>" alt="img" class="avatar country-Flag mr-2 align-self-center"></span>
														<div>
															<span class="d-flex fs-14 mr-3 mt-0"><?php echo session('system_name'); ?><span><i class="mdi mdi-chevron-down"></i></span></span>
														</div>
													</a>
													<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
														<?php foreach ($all_systems as $datas) : ?>
															<a href="#" onclick="switchsystems(<?php echo $datas['entity_boolean_id']; ?>,'<?php echo $datas['boolean_name']; ?>');" class="dropdown-item d-flex align-items-center mt-2">
																<div>
																	<span><?php echo $datas['boolean_name']; ?></span>
																</div>
															</a>
														<?php endforeach; ?>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="d-flex header-right ml-auto">
									<div class="dropdown header-fullscreen">
										<a class="nav-link icon full-screen-link" id="fullscreen-button">
											<i class="mdi mdi-arrow-collapse fs-20"></i>
										</a>
									</div>
									
									<div class="dropdown drop-profile">
										<a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
											<div class="profile-details mt-1">
												<span class="mr-3 mb-0  fs-15 font-weight-semibold"><?php echo session('user_name'); ?></span>
												<!--<small class="text-muted mr-3">appdeveloper</small>-->
											</div>
											<img class="avatar avatar-md brround" src="<?php echo base_url('assets/images/users/user.png'); ?>" alt="image">
										 </a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated bounceInDown w-250">
											<div class="user-profile bg-header-image border-bottom p-3">
												<div class="user-image text-center">
													<img class="user-images" src="<?php echo base_url('assets/images/users/user.png'); ?>" alt="image">
												</div>
												<div class="user-details text-center">
													<h4 class="mb-0"><?php echo session('user_name'); ?></h4>
													<!--<p class="mb-1 fs-13 text-white-50">Jonathan@gmail.com</p>-->
												</div>
											</div>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon mdi mdi-account-outline "></i> Profile
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon  mdi mdi-settings"></i> Settings
											</a>
											<a class="dropdown-item" href="#">
												<span class="float-right"><span class="badge badge-success">6</span></span>
												<i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
											</a>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
											</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#">
												<i class="dropdown-icon mdi mdi-compass"></i> Need help?
											</a>
											<a class="dropdown-item mb-1" href="<?=site_url('Login/logout');?>">
												<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
											</a>
										</div>
									</div><!-- Profile -->
									<!--<div class="sidebar-link">
										<a href="#" class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
											<i class="fe fe-align-right" ></i>
										</a>
									</div>-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Top-header closed -->

				<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar toggle-sidebar">
					<div class="app-sidebar__user">
						<div class="user-body">
							<img src="<?php echo base_url('assets/images/users/user.png'); ?>" alt="profile-img" class="rounded-circle w-25">
						</div>
						<div class="user-info">
							<a href="#" class=""><span class="app-sidebar__user-name font-weight-semibold"><?php echo session('user_name'); ?></span><br>
							<!--span class="text-muted app-sidebar__user-designation text-sm">App Developer</span>-->
							</a>
						</div>
					</div>
					<ul class="side-menu toggle-menu">
						<?php foreach($parent_menu as $key1 => $val1){ 
							$img_tmp = $val1['entity_trans_id'].".svg";
							?>
							<li class="slide">
								<a class="side-menu__item"  data-toggle="slide" href=""><span class="icon-menu-img"><img src="<?php echo base_url('assets/images/svgs/'.$img_tmp); ?>" class="side_menu_img svg-1" alt="image"></span><span class="side-menu__label"><?php echo $val1['entity_trans_name']; ?></span><i class="angle fa fa-angle-right"></i></a>
								<ul class="slide-menu">
									<?php foreach($sub_menu as $key2 => $val2){ 
										if($val1['entity_trans_id'] == $val2['prs_parent_id']){
											foreach($all_menus as $key3 => $val3){
												if($val3['entity_trans_id'] == $val2['entity_trans_id']){
										?>
											<li><a class="slide-item" href="<?=site_url($val2['menu_link']);?>"><span><?php echo $val2['entity_trans_name']; ?></span></a></li>
									<?php } } } } ?>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</aside>
				<!-- Sidemenu closed -->

				<!-- App-content opened -->
				<div class="app-content icon-content">
					<div class="section">

						<!-- Page-header opened -->
						<div class="page-header">
							<div class="page-leftheader">
								<label style="font-weight: bold;font-style: italic;">From Date</label>
								<input type="date" id="fromDate" class="form-control input-sm">
							</div>
							<div class="page-leftheader" style="padding:5px;">
								<label for="toDate" class="form-label small-label">To Date</label>
                				<input type="date" id="toDate" class="form-control input-sm">
							</div>
							<div class="page-leftheader" style="padding:5px;">
								<label for="toDate" class="form-label small-label">Reminder Type</label>
                				<select id="selectOptionSource" class="form-control input-sm">
									<option value="">All</option>
									<option value="1">Executed</option>
									<option value="2">Non Executed</option>
								</select>
							</div>
							<div class="d-flex header-right ml-auto">
									<div class="dropdown d-md-flex message" style="padding-top:10px;">
										<button type="button" id="btn_gen_report" class="btn btn-success" onclick="generatereport()">Search</button>
									</div>
							</div>
							
						</div>
						<!-- Page-header closed -->
						<div class="row tblheader" style="display:none;">
							<div class="col-md-12 col-lg-12">

								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
										    <table id="customer_followup_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th>Date</th>
														<th>Guest Name</th>
                                                        <th>Ref No</th>
                                                        <th>Status</th>
                                                        <th>Sales Executive</th>
                                                        <th>Arrival</th>
                                                        <th>Pre Arrival</th>
                                                        <th>Departure</th>
                                                        <th>Driver</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
										    <table id="pre_arrival_call_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th>Date</th>
														<th>Guest Name</th>
                                                        <th>Ref No</th>
                                                        <th>Status</th>
                                                        <th>Sales Executive</th>
                                                        <th>Arrival</th>
                                                        <th>Pre Arrival</th>
                                                        <th>Departure</th>
                                                        <th>Driver</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
										    <table id="departure_call_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th>Date</th>
														<th>Guest Name</th>
                                                        <th>Ref No</th>
                                                        <th>Status</th>
                                                        <th>Sales Executive</th>
                                                        <th>Arrival</th>
                                                        <th>Pre Arrival</th>
                                                        <th>Departure</th>
                                                        <th>Driver</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
										    <table id="arrival_call_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th>Date</th>
														<th>Guest Name</th>
                                                        <th>Ref No</th>
                                                        <th>Status</th>
                                                        <th>Sales Executive</th>
                                                        <th>Arrival</th>
                                                        <th>Departure</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
										    <table id="driver_call_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th>Date</th>
														<th>Guest Name</th>
                                                        <th>Ref No</th>
                                                        <th>Status</th>
                                                        <th>Sales Executive</th>
                                                        <th>Arrival</th>
                                                        <th>Pre Arrival</th>
                                                        <th>Departure</th>
                                                        <th>Driver</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="card">
									<div class="card-body">
										<div class="table-responsive">
										    <table id="hotel_reconfirm_call_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th>Confirm Date</th>
														<th>Reconfirm Date</th>
														<th>Cut Off Date</th>
														<th>Guest Name</th>
                                                        <th>Ref No</th>
                                                        <th>Status</th>
                                                        <th>Sales Executive</th>
                                                      
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- section-wrapper -->
							</div>
						</div>
			
						<!-- row closed -->
					</div>
				</div>
				<!-- App-content closed -->
			</div>

			<!-- Footer opened -->
			<footer class="footer-main icon-footer">
				<div class="container">
					<div class="  mt-2 mb-2 text-center">
						Copyright © 2025 <a href="#" class="fs-14 text-primary">KHM</a>. Designed by <a href="https://megatrendkms.co.in" class="fs-14 text-primary" target="_blank">Megatrend Knowledge Management Systems Pvt Ltd</a> All rights reserved.
					</div>
				</div>
			</footer>
			<!-- Footer closed -->
		</div>

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

		<!-- Jquery-scripts -->
		<script src="<?php echo base_url('assets/js/vendors/jquery-3.2.1.min.js'); ?>"></script>

		<!-- Moment js-->
        <script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>

		<!-- Bootstrap-scripts js -->
		<script src="<?php echo base_url('assets/js/vendors/bootstrap.bundle.min.js'); ?>"></script>

		<!-- Sparkline JS-->
		<script src="<?php echo base_url('assets/js/vendors/jquery.sparkline.min.js'); ?>"></script>

		<!-- Bootstrap-daterangepicker js -->
		<script src="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

		<!-- Bootstrap-datepicker js -->
		<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js'); ?>"></script>

		<!-- Chart-circle js -->
		<script src="<?php echo base_url('assets/js/vendors/circle-progress.min.js'); ?>"></script>

		<!-- Rating-star js -->
		<script src="<?php echo base_url('assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

		<!-- Clipboard js -->
		<script src="<?php echo base_url('assets/plugins/clipboard/clipboard.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/clipboard/clipboard.js'); ?>"></script>

		<!-- Prism js -->
		<script src="<?php echo base_url('assets/plugins/prism/prism.js'); ?>"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

		<!-- Nice-select js-->
		<script src="<?php echo base_url('assets/plugins/jquery-nice-select/js/jquery.nice-select.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/jquery-nice-select/js/nice-select.js'); ?>"></script>

        <!-- P-scroll js -->
		<script src="<?php echo base_url('assets/plugins/p-scroll/p-scroll.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/p-scroll/p-scroll-1.js'); ?>"></script>

		<!-- Sidemenu js-->
		<script src="<?php echo base_url('assets/plugins/sidemenu/icon-sidemenu.js'); ?>"></script>

		<!-- JQVMap -->
		<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.world.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.sampledata.js'); ?>"></script>

		<!-- Apexchart js-->
		<script src="<?php echo base_url('assets/js/apexcharts.js'); ?>"></script>

		<!-- Chart js-->
		<script src="<?php echo base_url('assets/plugins/chart/chart.min.js'); ?>"></script>

		<!-- Index js -->
		<script src="<?php echo base_url('assets/js/index.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/index-map.js'); ?>"></script>

		<!-- Rightsidebar js -->
		<script src="<?php echo base_url('assets/plugins/sidebar/sidebar.js'); ?>"></script>

		<!-- Custom js -->
		<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

		<script src="<?php echo base_url('assets/plugins/datatable/js/jquery.dataTables.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.bootstrap4.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/dataTables.buttons.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.bootstrap4.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/jszip.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/pdfmake.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/vfs_fonts.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.html5.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.print.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/js/buttons.colVis.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/dataTables.responsive.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/responsive.bootstrap4.min.js'); ?>"></script>

		<script src="<?php echo base_url('assets/js/datatable.js'); ?>"></script>

	</body>
</html>
<script>
      function switchroles(role_id,role_name) {
        const newUrl = '<?php echo site_url('Dashboard'); ?>'
        $.ajax({
          url: '<?php echo site_url('Dashboard/system_role_change'); ?>',
          type: 'POST',
          data: {role_id:role_id,role_name:role_name},
          success: function(response) {
			location.reload();

          },
          error: function(xhr, status, error) {
            // Handle any errors
            console.error(error);
          }
        });
      }
</script>
<script>
      function switchsystems(system_id,system_name) {
        const newUrl = '<?php echo site_url('Dashboard/add_entity/3'); ?>'
        $.ajax({
          url: '<?php echo site_url('Dashboard/khm_system_change'); ?>',
          type: 'POST',
          data: {system_id:system_id,system_name:system_name},
          success: function(response) {
			location.reload();

          },
          error: function(xhr, status, error) {
            // Handle any errors
            console.error(error);
          }
        });
      }
</script>
<script>
function generatereport() {
    
	if ($.fn.DataTable.isDataTable('#customer_followup_table')) {
        $('#customer_followup_table').DataTable().destroy();
    }
    var selectOptionSource = $("#selectOptionSource").val();
        var fromDate = $("#fromDate").val();
        var toDate = $("#toDate").val();

        if ((fromDate == "") || (toDate == "")) {
            alert("Please select a date range to generate report!!!");
        } else {
			$('.tblheader').show();
            $('#customer_followup_table').DataTable({
                'processing': true,
                'serverSide': true,
                'responsive': true,
                'serverMethod': 'post',
                'pageLength': 10,
				'buttons': [
					'excel'
				],
                'dom': "<'row'<'col-sm-4'B><'col-sm-4 text-center'<'report-title'>><'col-sm-4'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'ajax': {
                    'url': '<?=site_url('Enquiry/reminder_customer_followup');?>',
                    'type': 'POST',
                    'data': function(d) {
                        d.selectOptionSource = selectOptionSource;
                        d.fromDate = fromDate;
                        d.toDate = toDate;
                    }
                },
                
               
                'columns': [{
                        data: 'followup_date'
                    },
					{
                        data: 'guest_name'
                    },
                    {
                        data: 'ref_no'
                    },
                    {
                        data: 'status_name'
                    },
                    {
                        data: 'executive_name'
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_arrival_details" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_pre_arrival_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_departure_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Pre Arrival Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_driver_followup" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
                   
                ],
				'initComplete': function () {
					function formatDate(dateStr) {
						const parts = dateStr.split("-");
						return parts[2] + "-" + parts[1] + "-" + parts[0];
					}

					const formattedFromDate = formatDate(fromDate);
					const formattedToDate = formatDate(toDate);

					$("div.report-title").html(
						'<h5 style="margin-top: 6px;font-weight: bold;font-style: italic;color:#006600">Customer Follow Up call : ' + formattedFromDate + ' to ' + formattedToDate + '</h5>'
					);
				}
            });

        }


	if ($.fn.DataTable.isDataTable('#pre_arrival_call_table')) {
        $('#pre_arrival_call_table').DataTable().destroy();
    }
 
       
		
            $('#pre_arrival_call_table').DataTable({
                'processing': true,
                'serverSide': true,
                'responsive': true,
                'serverMethod': 'post',
                'pageLength': 10,
				'buttons': [
					'excel'
				],
                'dom': "<'row'<'col-sm-4'B><'col-sm-4 text-center'<'report-title-pre'>><'col-sm-4'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'ajax': {
                    'url': '<?=site_url('Enquiry/reminder_pre_arrival');?>',
                    'type': 'POST',
                    'data': function(d) {
                        d.selectOptionSource = selectOptionSource;
                        d.fromDate = fromDate;
                        d.toDate = toDate;
                    }
                },
                
               
                'columns': [{
                        data: 'followup_date'
                    },
					{
                        data: 'guest_name'
                    },
                    {
                        data: 'ref_no'
                    },
                    {
                        data: 'status_name'
                    },
                    {
                        data: 'executive_name'
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_arrival_details" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_pre_arrival_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_departure_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Pre Arrival Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_driver_followup" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
                   
                ],
				'initComplete': function () {
					function formatDate(dateStr) {
						const parts = dateStr.split("-");
						return parts[2] + "-" + parts[1] + "-" + parts[0];
					}

					const formattedFromDate = formatDate(fromDate);
					const formattedToDate = formatDate(toDate);

					$("div.report-title-pre").html(
						'<h5 style="margin-top: 6px;font-weight: bold;font-style: italic;color:#006600">Pre Arrival call : ' + formattedFromDate + ' to ' + formattedToDate + '</h5>'
					);
				}
            });

	if ($.fn.DataTable.isDataTable('#departure_call_table')) {
        $('#departure_call_table').DataTable().destroy();
    }
 
       
		
            $('#departure_call_table').DataTable({
                'processing': true,
                'serverSide': true,
                'responsive': true,
                'serverMethod': 'post',
                'pageLength': 10,
				'buttons': [
					'excel'
				],
                'dom': "<'row'<'col-sm-4'B><'col-sm-4 text-center'<'report-title-dep'>><'col-sm-4'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'ajax': {
                    'url': '<?=site_url('Enquiry/reminder_departure');?>',
                    'type': 'POST',
                    'data': function(d) {
                        d.selectOptionSource = selectOptionSource;
                        d.fromDate = fromDate;
                        d.toDate = toDate;
                    }
                },
                
               
                'columns': [{
                        data: 'followup_date'
                    },
					{
                        data: 'guest_name'
                    },
                    {
                        data: 'ref_no'
                    },
                    {
                        data: 'status_name'
                    },
                    {
                        data: 'executive_name'
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_arrival_details" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_pre_arrival_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_departure_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Pre Arrival Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_driver_followup" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
                   
                ],
				'initComplete': function () {
					function formatDate(dateStr) {
						const parts = dateStr.split("-");
						return parts[2] + "-" + parts[1] + "-" + parts[0];
					}

					const formattedFromDate = formatDate(fromDate);
					const formattedToDate = formatDate(toDate);

					$("div.report-title-dep").html(
						'<h5 style="margin-top: 6px;font-weight: bold;font-style: italic;color:#006600">Departure call : ' + formattedFromDate + ' to ' + formattedToDate + '</h5>'
					);
				}
            });

	if ($.fn.DataTable.isDataTable('#driver_call_table')) {
        $('#driver_call_table').DataTable().destroy();
    }
 
       
		
            $('#driver_call_table').DataTable({
                'processing': true,
                'serverSide': true,
                'responsive': true,
                'serverMethod': 'post',
                'pageLength': 10,
				'buttons': [
					'excel'
				],
                'dom': "<'row'<'col-sm-4'B><'col-sm-4 text-center'<'report-title-driver'>><'col-sm-4'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'ajax': {
                    'url': '<?=site_url('Enquiry/reminder_driver');?>',
                    'type': 'POST',
                    'data': function(d) {
                        d.selectOptionSource = selectOptionSource;
                        d.fromDate = fromDate;
                        d.toDate = toDate;
                    }
                },
                
               
                'columns': [{
                        data: 'followup_date'
                    },
					{
                        data: 'guest_name'
                    },
                    {
                        data: 'ref_no'
                    },
                    {
                        data: 'status_name'
                    },
                    {
                        data: 'executive_name'
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_arrival_details" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_pre_arrival_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_departure_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Pre Arrival Call"></i></a>';
                            
                        }
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_driver_followup" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
                   
                ],
				'initComplete': function () {
					function formatDate(dateStr) {
						const parts = dateStr.split("-");
						return parts[2] + "-" + parts[1] + "-" + parts[0];
					}

					const formattedFromDate = formatDate(fromDate);
					const formattedToDate = formatDate(toDate);

					$("div.report-title-driver").html(
						'<h5 style="margin-top: 6px;font-weight: bold;font-style: italic;color:#006600">Driver Follow Up Call : ' + formattedFromDate + ' to ' + formattedToDate + '</h5>'
					);
				}
            });

	if ($.fn.DataTable.isDataTable('#arrival_call_table')) {
        $('#arrival_call_table').DataTable().destroy();
    }
 
       
		
            $('#arrival_call_table').DataTable({
                'processing': true,
                'serverSide': true,
                'responsive': true,
                'serverMethod': 'post',
                'pageLength': 10,
				'buttons': [
					'excel'
				],
                'dom': "<'row'<'col-sm-4'B><'col-sm-4 text-center'<'report-title-arr'>><'col-sm-4'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'ajax': {
                    'url': '<?=site_url('Enquiry/reminder_arrival');?>',
                    'type': 'POST',
                    'data': function(d) {
                        d.selectOptionSource = selectOptionSource;
                        d.fromDate = fromDate;
                        d.toDate = toDate;
                    }
                },
                
               
                'columns': [{
                        data: 'followup_date'
                    },
					{
                        data: 'guest_name'
                    },
                    {
                        data: 'ref_no'
                    },
                    {
                        data: 'status_name'
                    },
                    {
                        data: 'executive_name'
                    },
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_arrival_details" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Customer Followup Call"></i></a>';
                            
                        }
                    },
				
					{
                        data: 'enquiry_header_id',
                        render: function (data, type, row, meta) {
                        
                            return '<a href="" class="btn_departure_call" data-id="' + data + '" data-cid="' + row.confirm_cs_id + '"><i class="fa fa-eye" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Pre Arrival Call"></i></a>';
                            
                        }
                    }
				
                   
                ],
				'initComplete': function () {
					function formatDate(dateStr) {
						const parts = dateStr.split("-");
						return parts[2] + "-" + parts[1] + "-" + parts[0];
					}

					const formattedFromDate = formatDate(fromDate);
					const formattedToDate = formatDate(toDate);

					$("div.report-title-arr").html(
						'<h5 style="margin-top: 6px;font-weight: bold;font-style: italic;color:#006600">Arrival Details Reminder : ' + formattedFromDate + ' to ' + formattedToDate + '</h5>'
					);
				}
            });

	if ($.fn.DataTable.isDataTable('#hotel_reconfirm_call_table')) {
        $('#hotel_reconfirm_call_table').DataTable().destroy();
    }
 
            $('#hotel_reconfirm_call_table').DataTable({
                'processing': true,
                'serverSide': true,
                'responsive': true,
                'serverMethod': 'post',
                'pageLength': 10,
				'buttons': [
					'excel'
				],
                'dom': "<'row'<'col-sm-4'B><'col-sm-4 text-center'<'report-title-recon'>><'col-sm-4'f>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                'ajax': {
                    'url': '<?=site_url('Enquiry/reminder_hotel_reconfirm');?>',
                    'type': 'POST',
                    'data': function(d) {
                        d.selectOptionSource = selectOptionSource;
                        d.fromDate = fromDate;
                        d.toDate = toDate;
                    }
                },
                
               
                'columns': [{
                        data: 'con_date'
                    },
					{
                        data: 'recon_date'
                    },
                    {
                        data: 'cutoff_date'
                    },
                    {
                        data: 'guest_name'
                    },
                    {
                        data: 'ref_no'
                    },
                    {
                        data: 'status_name'
                    },
                    {
                        data: 'executive_name'
                    }
                   
                ],
				'initComplete': function () {
					function formatDate(dateStr) {
						const parts = dateStr.split("-");
						return parts[2] + "-" + parts[1] + "-" + parts[0];
					}

					const formattedFromDate = formatDate(fromDate);
					const formattedToDate = formatDate(toDate);

					$("div.report-title-recon").html(
						'<h5 style="margin-top: 6px;font-weight: bold;font-style: italic;color:#006600">Hotel Reconformation Date : ' + formattedFromDate + ' to ' + formattedToDate + '</h5>'
					);
				}
            });
        
}
</script>

<script type="text/javascript">
    $(document).on('click', '.btn_arrival_details', function(e) {
        e.preventDefault();
		var enquiry_header_id = $(this).attr('data-id');
		var confirm_cs_id = $(this).attr('data-cid');
		arrival_details_datatable(enquiry_header_id,confirm_cs_id);
    });

	

	function arrival_details_datatable(enquiry_header_id,confirm_cs_id){
		var followup_type_id = 15;
		if ($.fn.DataTable.isDataTable('#table_arrival_details')) {
            $('#table_arrival_details').DataTable().destroy();
        }
        var table = $('#table_arrival_details').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?=site_url('Enquiry/all_call_followup_form');?>',
                'data': {
                    'enquiry_header_id': enquiry_header_id,
					'confirm_cs_id': confirm_cs_id,
					'followup_type_id': followup_type_id
                }
            },
            'columns': [
            
            {
                data: 'call_status'
            },
			{
                data: 'calltime'
            },
			{
                data: 'comments'
            }
            ],
			paging: true, // Ensure paging is enabled
    		pageLength: 10, // Number of rows per page
    		lengthMenu: [5, 10, 25, 50], // Options for rows per page
    		order: [[0, 'asc']] // Default sorting
        });
        $('#arrival_details_modal').modal('show');
	}
</script>

<script type="text/javascript">
    $(document).on('click', '.btn_pre_arrival_call', function(e) {
        e.preventDefault();
        var enquiry_header_id = $(this).attr('data-id');
		var confirm_cs_id = $(this).attr('data-cid');
		pre_arrival_details_datatable(enquiry_header_id,confirm_cs_id);
    });

	function pre_arrival_details_datatable(enquiry_header_id,confirm_cs_id){
		var followup_type_id = 9;
		if ($.fn.DataTable.isDataTable('#table_prearr_details')) {
            $('#table_prearr_details').DataTable().destroy();
        }
        var table = $('#table_prearr_details').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?=site_url('Enquiry/all_call_followup_form');?>',
                'data': {
                    'enquiry_header_id': enquiry_header_id,
					'confirm_cs_id': confirm_cs_id,
					'followup_type_id': followup_type_id
                }
            },
            'columns': [
            
            {
                data: 'call_status'
            },
			{
                data: 'calltime'
            },
			{
                data: 'comments'
            }
            ],
			paging: true, // Ensure paging is enabled
    		pageLength: 10, // Number of rows per page
    		lengthMenu: [5, 10, 25, 50], // Options for rows per page
    		order: [[0, 'asc']] // Default sorting
        });
        $('#pre_arrivalcall_modal').modal('show');
	}
</script>

<script type="text/javascript">
    $(document).on('click', '.btn_departure_call', function(e) {
        e.preventDefault();
        var enquiry_header_id = $(this).attr('data-id');
		var confirm_cs_id = $(this).attr('data-cid');
		departurecall_details_datatable(enquiry_header_id,confirm_cs_id);
    });


	function departurecall_details_datatable(enquiry_header_id,confirm_cs_id){
		var followup_type_id = 10;
		if ($.fn.DataTable.isDataTable('#table_depcall_details')) {
            $('#table_depcall_details').DataTable().destroy();
        }
        var table = $('#table_depcall_details').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?=site_url('Enquiry/all_call_followup_form');?>',
                'data': {
                    'enquiry_header_id': enquiry_header_id,
					'confirm_cs_id': confirm_cs_id,
					'followup_type_id': followup_type_id
                }
            },
            'columns': [
            
            {
                data: 'call_status'
            },
			{
                data: 'calltime'
            },
			{
                data: 'comments'
            }
            ],
			paging: true, // Ensure paging is enabled
    		pageLength: 10, // Number of rows per page
    		lengthMenu: [5, 10, 25, 50], // Options for rows per page
    		order: [[0, 'asc']] // Default sorting
        });
        $('#departurecall_modal').modal('show');
	}
</script>

<script type="text/javascript">
    $(document).on('click', '.btn_driver_followup', function(e) {
        e.preventDefault();
        var enquiry_header_id = $(this).attr('data-id');
		var confirm_cs_id = $(this).attr('data-cid');
		drivercall_details_datatable(enquiry_header_id,confirm_cs_id);
    });

	function drivercall_details_datatable(enquiry_header_id,confirm_cs_id){
		var followup_type_id = 16;
		if ($.fn.DataTable.isDataTable('#table_drivercall_details')) {
            $('#table_drivercall_details').DataTable().destroy();
        }
        var table = $('#table_drivercall_details').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?=site_url('Enquiry/all_call_followup_form');?>',
                'data': {
                    'enquiry_header_id': enquiry_header_id,
					'confirm_cs_id': confirm_cs_id,
					'followup_type_id': followup_type_id
                }
            },
            'columns': [
            
            {
                data: 'call_status'
            },
			{
                data: 'calltime'
            },
			{
                data: 'comments'
            }
            ],
			paging: true, // Ensure paging is enabled
    		pageLength: 10, // Number of rows per page
    		lengthMenu: [5, 10, 25, 50], // Options for rows per page
    		order: [[0, 'asc']] // Default sorting
        });
        $('#drivercall_modal').modal('show');
	}
</script>



