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
	<link rel="icon" href="<?php echo base_url('assets/images/brand/favicon.png'); ?>" type="image/x-icon" />

	<!-- Title -->
	<title>Payment View</title>

	<!-- Bootstrap css -->
	<link href="<?php echo base_url('assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet" />

	<!-- Style css -->
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />

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
	<link href="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet" />

	<!-- P-scroll css -->
	<link href="<?php echo base_url('assets/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Font-icons css -->
	<link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

	<!-- Rightsidebar css -->
	<link href="<?php echo base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

	<!-- Nice-select css  -->
	<link href="<?php echo base_url('assets/plugins/jquery-nice-select/css/nice-select.css'); ?>" rel="stylesheet" />

	<!-- Color-palette css-->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins.css'); ?>" />
	<link href="<?php echo base_url('assets/plugins/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />
	<link rel="stylesheet" href="https://pn-ciamis.go.id/asset/DataTables/extensions/Responsive/css/responsive.dataTables.css">
	<link rel="stylesheet" href="https://pn-ciamis.go.id/asset/DataTables/extensions/Buttons/css/buttons.dataTables.css">
	<script src="<?php echo base_url('assets/tiny_mce/tiny_mce.js'); ?>"></script>
	<style>
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			top: 0px !important;
		}

		#payment_table {
			width: 100%;
			/* Ensure the table takes up the full width of its container */
			table-layout: auto;
			/* Let the browser determine the column widths */

		}

		#payment_table th,
		#payment_table td {
			white-space: nowrap;
			/* Prevent text from wrapping */
			text-overflow: ellipsis;
			/* Add ellipsis (...) for overflowed content */
			overflow: hidden;
			/* Hide overflowed content */
		}

		.fixed-width-column1 {
			width: 150px;
			/* Fixed width for specific columns, adjust as needed */
		}

		.auto-width {
			/* No width defined, auto-fit to content */
		}

		#payment_table th.auto-width,
		#payment_table td.auto-width {
			width: auto;
			/* Auto width for content */
			max-width: 200px;
			/* Optional: Limit max width */
		}

		.custom-modal-width {
			max-width: 90%;
			/* Adjust as needed */
			width: 90%;
		}

		#send_multiple_iti,
		#save_cs_btn,
		#save_iti_btn,
		#add_new_payment,
		#btn_save_payment,
		#btn_update_p_history {
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

		#send_multiple_iti:hover,
		#save_cs_btn:hover,
		#save_iti_btn:hover,
		#add_new_payment:hover,
		#btn_save_payment:hover,
		#btn_update_p_history:hover {
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

	<div class="modal fade" id="addpaymentmodal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#339966;color:#fff;">
					<h5 class="modal-title" id="example-Modal3">Add New Payment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<label class="form-control-label" style="font-weight: bold;">Date</label>
							<input class="form-control input-sm" type="date" id="payment_date">
						</div>
						<div class="col-lg-6">
							<label class="form-control-label" style="font-weight: bold;">Amount</label>
							<input class="form-control input-sm" type="text" id="payment_amount">
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<label class="form-control-label" style="font-weight: bold;">Payment Type</label>
							<select class="form-control input-sm" name="payment_type" id="payment_type">
								<option value="">Select</option>
								<option value="1">Direct</option>
								<option value="2">Bank</option>
								<option value="3">Website</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label class="form-control-label" style="font-weight: bold;">Bank Account</label>
							<select class="form-control input-sm" name="payment_bank" id="payment_bank">
								<option value="">Select</option>
								<option value="1">HDFC-00208620000029</option>
								<option value="2">ICICI (New A/c)-027705002910</option>
								<option value="3">Cash</option>
								<option value="4">Transfer from other package</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<label class="form-control-label" style="font-weight: bold;">Payment Details</label>
							<textarea class="form-control" id="payment_details"></textarea>
						</div>
					</div>
					<div class="row" style="padding-top:10px;">
						<div class="col-lg-12">
							<button type="button" id="btn_save_payment" class="btn btn-success input-sm">SAVE</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<div class="modal fade" id="paymenthistorymodal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog custom-modal-width" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#339966;color:#fff;">
					<h5 class="modal-title" id="example-Modal3">Payment History</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row pay_his_div" style="display:none;">
						<div class="col-md-12 col-lg-12">
							<div class="card" style="background-color:#e0e0eb;">
								<div class="card-body">

									<div class="row">
										<div class="col-lg-2">
											<label class="form-control-label" style="font-weight: bold;">Date</label>
											<input class="form-control input-sm" type="date" id="p_date">
										</div>
										<div class="col-lg-2">
											<label class="form-control-label" style="font-weight: bold;">Amount</label>
											<input class="form-control input-sm" type="text" id="p_amount">
										</div>
										<div class="col-lg-1">
											<input type="hidden" name="hd_payment_id" id="hd_payment_id" value="">
											<input type="hidden" name="hd_enqheader_id" id="hd_enqheader_id" value="">
											<label class="form-control-label" style="font-weight: bold;">Payment Type</label>
											<select class="form-control input-sm" name="p_type" id="p_type">
												<option value="1">Direct</option>
												<option value="2">Bank</option>
												<option value="3">Website</option>
											</select>
										</div>
										<div class="col-lg-2">
											<label class="form-control-label" style="font-weight: bold;">Bank Account</label>
											<select class="form-control input-sm" name="p_bank" id="p_bank">
												<option value="1">HDFC-00208620000029</option>
												<option value="2">ICICI (New A/c)-027705002910</option>
												<option value="3">Cash</option>
												<option value="4">Transfer from other package</option>
											</select>
										</div>
										<div class="col-lg-2">
											<label class="form-control-label" style="font-weight: bold;">Payment Details</label>
											<textarea class="form-control input-sm" id="p_details"></textarea>
										</div>
										<div class="col-lg-2">
											<label class="form-control-label" style="font-weight: bold;">Edit Reason</label>
											<textarea class="form-control input-sm" id="e_reasons"></textarea>
										</div>
										<div class="col-lg-1" style="padding-top:25px;">
											<button type="button" id="btn_update_p_history" class="btn btn-success input-sm">Update</button>
										</div>
									</div>


								</div>
							</div>
						</div>
					</div>
					<div id="pay-alert"></div>

					<div class="row">
						<div class="col-lg-12">
							<table class="table" id="table_payment_history" style="width: 100%;">
								<thead style="background-color: #c6ecd9;">
									<tr>
										<th scope="col">Date</th>
										<th scope="col">Payment Type</th>
										<th scope="col">Bank</th>
										<th scope="col">Description</th>
										<th scope="col">Amount</th>
										<th scope="col">Status</th>

										<th scope="col">Remarks</th>
										<?php if ($parent_id == 11) { ?>
											<th scope="col">Action</th>
										<?php } else { ?>
											<th scope="col">Edit</th>
										<?php } ?>
										<th scope="col">Edit Reason</th>

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
										<a class="dropdown-item mb-1" href="<?= site_url('Login/logout'); ?>">
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
					<?php foreach ($parent_menu as $key1 => $val1) {
						$img_tmp = $val1['entity_trans_id'] . ".svg";
					?>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href=""><span class="icon-menu-img"><img src="<?php echo base_url('assets/images/svgs/' . $img_tmp); ?>" class="side_menu_img svg-1" alt="image"></span><span class="side-menu__label"><?php echo $val1['entity_trans_name']; ?></span><i class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<?php foreach ($sub_menu as $key2 => $val2) {
									if ($val1['entity_trans_id'] == $val2['prs_parent_id']) {
										foreach ($all_menus as $key3 => $val3) {
											if ($val3['entity_trans_id'] == $val2['entity_trans_id']) {
								?>
												<li><a class="slide-item" href="<?= site_url($val2['menu_link']); ?>"><span><?php echo $val2['entity_trans_name']; ?></span></a></li>
								<?php }
										}
									}
								} ?>
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
							<button class="btn btn-success btn-sm" onclick="history.back()" title="Go Back"><i class="fa fa-arrow-left"></i> Back</button>

						</div>
						<div class="d-flex header-right ml-auto">
							<div>
								<?php if ($parent_id < 11) {
									if ($add_per == 1) {
								?>
										<button type="button" id="add_new_payment" class="btn btn-success">Add New Payment</button>
								<?php }
								} ?>
							</div>

						</div>

					</div>
					<!-- Page-header closed -->

					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">

								<div class="card-body">
									<div class="table-responsive">
										<table id="payment_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
												<tr>
													<th scope="col">Ref No</th>
													<th scope="col">Guest Name</th>


													<th scope="col">Check In</th>
													<th scope="col">Check Out</th>
													<th scope="col">Total Amount</th>
													<th scope="col">Paid Amount</th>


													<th scope="col">Balance</th>
													<th scope="col">Status</th>
													<th scope="col">Added By</th>
													<th scope="col">Invoice No</th>
													<th scope="col">Agent Name</th>
													<th scope="col">Executive</th>
													<th scope="col">SOP Executive</th>
													<th scope="col">Actions</th>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>


									</div>
								</div>
								<!-- table-wrapper -->
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

	<script src="<?php echo base_url('assets/plugins/datatable/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable/datatable.js'); ?>"></script>

	<script src="https://pn-ciamis.go.id/asset/DataTables/extensions/Responsive/js/dataTables.responsive.js"></script>
	<script src="https://pn-ciamis.go.id/asset/DataTables/extensions/Buttons/js/dataTables.buttons.js"></script>
	<script src="https://pn-ciamis.go.id/asset/DataTables/extensions/Buttons/js/buttons.colVis.js"></script>

</body>

</html>
<script>
	function switchroles(role_id, role_name) {
		const newUrl = '<?php echo site_url('Dashboard'); ?>'
		$.ajax({
			url: '<?php echo site_url('Dashboard/system_role_change'); ?>',
			type: 'POST',
			data: {
				role_id: role_id,
				role_name: role_name
			},
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
	function switchsystems(system_id, system_name) {
		const newUrl = '<?php echo site_url('Dashboard/add_entity/3'); ?>'
		$.ajax({
			url: '<?php echo site_url('Dashboard/khm_system_change'); ?>',
			type: 'POST',
			data: {
				system_id: system_id,
				system_name: system_name
			},
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
	let global_all_approved = 0; // Global flag to store overall approval status

	$(document).ready(function() {
		cs_confirm_table();
	});

	function cs_confirm_table() {
		var enquiry_header_id = "<?php echo $enquiry_header_id; ?>";
		var cs_confirmed_id = "<?php echo $cs_confirmed_id; ?>";

		if ($.fn.DataTable.isDataTable('#payment_table')) {
			$('#payment_table').DataTable().destroy();
		}

		$('#payment_table').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			serverMethod: 'post',
			pageLength: 10,
			dom: 'Bfrtip',
			buttons: ['colvis'],
			ajax: {
				url: '<?= site_url('Enquiry/payment_list_view'); ?>',
				type: 'POST',
				data: {
					enquiry_header_id: enquiry_header_id,
					cs_confirmed_id: cs_confirmed_id
				},
				dataSrc: function(json) {
					global_all_approved = json.all_approved;
					return json.aaData;
				}
			},
			columnDefs: [{
				orderable: false,
				targets: [3, 4]
			}],
			columns: [{
					data: 'ref_no'
				},
				{
					data: 'guest_name'
				},
				{
					data: 'checkin'
				},
				{
					data: 'checkout'
				},
				{
					data: 'total_amount'
				},
				{
					data: 'paidamount'
				},
				{
					data: null,
					render: function(data, type, row, meta) {
						const total = parseFloat(row.total_amount) || 0;
						const paid = parseFloat(row.paidamount) || 0;
						return (total - paid).toFixed(2);
					},
					title: 'Balance'
				},
				{
					data: 'approved_status',
					render: function(data, type, row, meta) {
						if (data == 1)
							return '<label class="text-success">Approved</label>';
						else
							return '<label class="text-danger">Pending</label>';
					}
				},
				{
					data: 'added_by_name'
				},
				{
					data: 'ref_no'
				},
				{
					data: 'agent_name'
				},
				{
					data: 'executive_name'
				},
				{
					data: 'sop_name'
				},
				{
					data: 'enquiry_header_id',
					render: function(data, type, row, meta) {
						if (data) {
							return '<button type="button" data-id="' + data + '" class="btn btn-success btn-sm payment_history">History</button>';
						}
						return '';
					}
				}
			]
		});
	}

	$(document).on('click', '#add_new_payment', function(e) {
		$('#addpaymentmodal').modal({
			show: true,
			backdrop: 'static',
			keyboard: false
		});
	});
</script>

<script type="text/javascript">
	$(document).on('click', '#btn_save_payment', function(e) {
		e.preventDefault();
		var enquiry_header_id = <?= json_encode($enquiry_header_id); ?>;
		var cs_confirmed_id = <?= json_encode($cs_confirmed_id); ?>;

		var payment_date = $('#payment_date').val();
		var payment_amount = $('#payment_amount').val();
		var payment_type = $('#payment_type').val();
		var payment_bank = $('#payment_bank').val();
		var payment_details = $('#payment_details').val();
		if (payment_date == '' || payment_date == null || payment_date == 'undefined') {
			alert("Please select payment date");
		} else if (payment_amount == '' || payment_amount == null || payment_amount == 'undefined') {
			alert("Please Enter Amount");
		} else if (payment_type == '' || payment_type == null || payment_type == 'undefined') {
			alert("Please select payment type");
		} else if (payment_bank == '' || payment_bank == null || payment_bank == 'undefined') {
			alert("Please select Bank");
		} else {
			$.ajax({
				url: '<?= site_url('Enquiry/savePaymentDetails'); ?>',
				method: 'POST',
				data: {
					enquiry_header_id: enquiry_header_id,
					cs_confirmed_id: cs_confirmed_id,
					payment_date: payment_date,
					payment_amount: payment_amount,
					payment_type: payment_type,
					payment_bank: payment_bank,
					payment_details: payment_details
				},
				dataType: 'json',
				success: function(response) {
					if (response == 1) {
						alert("Payment Saved");
						$('#payment_date').val('');
						$('#payment_amount').val('');
						$('#payment_type').val('');
						$('#payment_bank').val('');
						$('#payment_details').val('');
						cs_confirm_table();
					} else {
						alert("Please try again");
					}
				},
				error: function(xhr, status, error) {
					console.error('Error', error);
				}
			});
		}

	});
</script>

<script type="text/javascript">
	$(document).on('click', '.payment_history', function(e) {
		e.preventDefault();
		var enquiry_header_id = $(this).attr('data-id');
		payment_history_datatable(enquiry_header_id);
	});

	$(document).on('click', '#btn_update_p_history', function(e) {
		e.preventDefault();
		var payment_id = $('#hd_payment_id').val();
		var enquiry_header_id = $('#hd_enqheader_id').val();
		var payment_date = $('#p_date').val();
		var paid_amount = $('#p_amount').val();
		var payment_type = $('#p_type').val();
		var payment_bank = $('#p_bank').val();
		var payment_details = $('#p_details').val();
		var edit_reason = $('#e_reasons').val();

		if (edit_reason == '' || edit_reason == null || edit_reason == 'undefined') {
			alert("Please Enter Edit Reason");
		} else {
			$.ajax({
				url: '<?= site_url('Enquiry/updatePaymentHistoryDet'); ?>',
				method: 'POST',
				data: {
					payment_id: payment_id,
					enquiry_header_id: enquiry_header_id,
					payment_date: payment_date,
					paid_amount: paid_amount,
					payment_type: payment_type,
					payment_bank: payment_bank,
					payment_details: payment_details,
					edit_reason: edit_reason
				},
				dataType: 'json',
				success: function(response) {
					if (response == 1) {
						alertHtml = `<div class="alert alert-success alert-dismissible fade show" role="alert">
								<span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
								<span class="alert-inner--text"><strong>Success!</strong> Updated.</span>
								<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>`;

						payment_history_datatable(enquiry_header_id);
						$('.hot_con_div').hide();
					} else {
						alertHtml = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<span class="alert-inner--icon"><i class="fe fe-info"></i></span>
								<span class="alert-inner--text"><strong>Warning!</strong> Please try again!</span>
								<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>`;
					}
					$('#pay-alert').html(alertHtml);
					setTimeout(function() {
						$(".alert").fadeOut("slow", function() {
							$(this).remove();
						});
					}, 2000);
				},
				error: function(xhr, status, error) {
					console.error('Error adding node:', error);
				}
			});
		}
	});

	function payment_history_datatable(enquiry_header_id) {
		var parent_id = "<?php echo $parent_id; ?>";
		var edit_per = "<?php echo $edit_per; ?>";
		if ($.fn.DataTable.isDataTable('#table_payment_history')) {
			$('#table_payment_history').DataTable().destroy();
		}
		var table = $('#table_payment_history').DataTable({
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			'ajax': {
				'url': '<?= site_url('Enquiry/payment_history_view'); ?>',
				'data': {
					'enquiry_header_id': enquiry_header_id
				}
			},
			'columns': [

				{
					data: 'pdate'
				},
				{
					data: 'payment_type',
					render: function(data, type, row, meta) {
						if (data == "1") {
							var payment_type_name = "Direct";
						} else if (data == "2") {
							var payment_type_name = "Bank";
						} else if (data == "3") {
							var payment_type_name = "Website";
						} else {
							var payment_type_name = "";
						}
						return '' + payment_type_name + '';
					}
				},
				{
					data: 'payment_bank',
					render: function(data, type, row, meta) {
						if (data == "1") {
							var payment_bank_name = "HDFC-00208620000029";
						} else if (data == "2") {
							var payment_bank_name = "ICICI (New A/c)-027705002910";
						} else if (data == "3") {
							var payment_bank_name = "Cash";
						} else if (data == "4") {
							var payment_bank_name = "Transfer from other package";
						} else {
							var payment_bank_name = "";
						}
						return '' + payment_bank_name + '';
					}
				},
				{
					data: 'payment_details'
				},
				{
					data: 'paid_amount'
				},
				{
					data: 'approved_status',
					render: function(data, type, row, meta) {
						if (data == "0") {
							return '<label class="text-danger">Not Approved</label>';
						} else if (data == "1") {
							return '<label class="text-success">Approved</label>';
						} else {
							return '';
						}
					}
				},
				{
					data: 'remarks'
				},
				{
					data: 'payment_id',
					render: function(data, type, row, meta) {
						if (edit_per == 1) {
							if (parent_id == 11) {
								if (row.approved_status == 1) {
									return `
								<select class="form-control input-sm approve_action" data-id="${data}" data-eid="${row.enquiry_header_id}">
									<option value="">Select</option>
									<option value="0">Revert</option>
								</select>							
							`;
								} else if (row.approved_status == 0) {
									return `
								<select class="form-control input-sm approve_action" data-id="${data}" data-eid="${row.enquiry_header_id}">
									<option value="">Select</option>
									<option value="1">Approve</option>
									<option value="2">Not Approve</option>
								</select>							
							`;
								} else {
									return `
								<select class="form-control input-sm approve_action" data-id="${data}" data-eid="${row.enquiry_header_id}">
									<option value="">Select</option>
									<option value="0">Revert</option>
								</select>							
							`;
								}
							} else {
								return `<a href="#" class="nav-link edit_pay_history" data-id="${data}"><i class="fa fa-edit fa-sm"></i></a>`;
							}
						} else {
							return '<a href="javascript:void(0)" class="btn btn-success btn-sm text-white disabled" style="pointer-events: none; opacity: 0.6;"><i class="fa fa-edit"></i></a>';
						}
					}
				},
				{
					data: 'edit_reason'
				},

			],
			paging: true, // Ensure paging is enabled
			pageLength: 10, // Number of rows per page
			lengthMenu: [5, 10, 25, 50], // Options for rows per page
			order: [
				[0, 'asc']
			] // Default sorting
		});

		$('#paymenthistorymodal').modal('show');
		$('.pay_his_div').hide();

		$('#paymenthistorymodal').on('hidden.bs.modal', function() {
			location.reload(); // refresh the current page
		});
	}
</script>
<script type="text/javascript">
	$(document).on('click', '.edit_pay_history', function(e) {
		e.preventDefault();
		$('.pay_his_div').show();
		var payment_id = $(this).attr('data-id');
		$('#hd_payment_id').val(payment_id);

		$.ajax({
			url: '<?= site_url('Enquiry/getPaymentHistoryData'); ?>',
			method: 'POST',
			data: {
				payment_id: payment_id
			},
			dataType: 'json',
			success: function(response) {
				if (response.length > 0) {
					var ptype = response[0].payment_type;
					$('#p_type').val(ptype).trigger('change');
					var pbank = response[0].payment_bank;
					$('#p_bank').val(pbank).trigger('change');
					$('#p_date').val(response[0].payment_date);
					$('#p_details').text(response[0].payment_details);
					$('#p_amount').val(response[0].paid_amount);
					$('#hd_enqheader_id').val(response[0].enquiry_header_id);
				} else {
					$('#p_type').val('').trigger('change');
					$('#p_bank').val('').trigger('change');
					$('#p_date').val('');
					$('#p_details').text('');
					$('#p_amount').val('');
				}
			},
			error: function(xhr, status, error) {
				console.error('Error', error);
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).on('change', '.approve_action', function(e) {
		e.preventDefault();

		var payment_id = $(this).attr('data-id');
		var enquiry_header_id = $(this).attr('data-eid');
		var selectedValue = $(this).val();

		if (selectedValue === "") {
			alert("Please select an action.");
			return;
		}

		var remarks = prompt("Please enter remarks:");
		if (remarks === null || remarks.trim() === "") {
			alert("Remarks are required.");
			return;
		}

		$.ajax({
			type: "POST",
			url: '<?= site_url('Enquiry/approveActionSubmit'); ?>',
			data: {
				payment_id: payment_id,
				selectedValue: selectedValue,
				remarks: remarks
			},
			dataType: 'json',
			success: function(response) {
				if (response == 1) {
					alert("Updated");
					payment_history_datatable(enquiry_header_id);
				} else {
					alert("Please try again");
				}
			}
		});
	});
</script>