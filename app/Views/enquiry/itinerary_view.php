<?php

use App\Models\Enquiry_m;

$Enquiry_model = new Enquiry_m();
$dep_name = $Enquiry_model->getLocationNamebyid($object_det[0]['departure_location']);
$vehicle_data = json_decode($object_det[0]['vehicle_type_id'], true); // Decode JSON from DB
$d_room_tariff = 0;
$s_room_tariff = 0;

$d_child_tariff = 0;
$s_child_tariff = 0;

$d_child_wb_tariff = 0;
$s_child_wb_tariff = 0;

$d_extra_tariff = 0;
$s_extra_tariff = 0;

if ($iti_edit_id == 1 || $final_save_flag == 1) {
	/*$read_only = "readonly";
	$dis_abled = 'style="pointer-events: none; background-color: #eee;"';
	$dis_abled_temp = 'style="pointer-events: none; background-color: #eee;background-color:#c6ecd9;font-weight:bold;"';*/
	$read_only = "";
	$dis_abled = "";
	$dis_abled_temp = 'style="background-color:#c6ecd9;font-weight:bold;"';
} else {
	$read_only = "";
	$dis_abled = "";
	$dis_abled_temp = 'style="background-color:#c6ecd9;font-weight:bold;"';
}

if ($extension_disable == 1) {
	$read_only_ext = "readonly";
	$dis_abled_ext = 'style="pointer-events: none; background-color: #eee;"';
} else {
	$read_only_ext = "";
	$dis_abled_ext = "";
}
$is_edit = $edit_id ? 1 : 0;
$extension_ref_id = $extension_ref_id ? $extension_ref_id : 0;
$cs_trans_total = 0;
?>
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
	<title>KHM - Itinerary View</title>

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
	<link rel="stylesheet"
		href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>">

	<!-- Bootstrap-datepicker css -->
	<link rel="stylesheet"
		href="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css'); ?>">

	<!-- Custom scroll bar css -->
	<link href="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css'); ?>" rel="stylesheet" />

	<!-- Sidemenu-repsonsive-tabs  css -->
	<link href="<?php echo base_url('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css'); ?>"
		rel="stylesheet">

	<!-- P-scroll css -->
	<link href="<?php echo base_url('assets/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Font-icons css -->
	<link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

	<!-- Rightsidebar css -->
	<link href="<?php echo base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

	<!-- Data table css -->
	<link href="<?php echo base_url('assets/plugins/datatable1/css/dataTables.bootstrap4.min.css'); ?>"
		rel="stylesheet" />
	<link href="<?php echo base_url('assets/plugins/datatable1/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/datatable1/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" />

	<!-- Nice-select css  -->
	<link href="<?php echo base_url('assets/plugins/jquery-nice-select/css/nice-select.css'); ?>" rel="stylesheet" />

	<link href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet" />

	<!-- Color-palette css-->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins.css'); ?>" />
	<script src="<?php echo base_url('assets/tiny_mce/tiny_mce.js'); ?>"></script>

	<style>
		.small-label {
			font-size: 0.7em;
			font-style: italic;
			font-weight: bold;
			color: #003300;
			padding: 0px 0px;
			margin-bottom: 0rem !important;
		}

		.costing-container {
			justify-content: center;
			align-items: center;
			flex-direction: column;
			padding: 5px;
			margin: 5px auto;
		}

		.costing-box {
			border: 2px solid green;
			border-radius: 8px;
			padding: 5px;
			background-color: #f9f9f9;
			width: 100%;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}

		.costing-table .hotel-row {
			border-bottom: 4px double #000000 !important;
		}

		.costing-table {

			width: 100%;
			background-color: #ffffff;
			border-collapse: collapse;
			text-align: center;
		}

		.costing-table th,
		.costing-table td {
			border: 1px solid #2bcf1cff;
			padding: 5px;
		}

		.costing-table th {
			background-color: #f1f1f1;
			font-weight: bold;
		}
	</style>
	<style>
		.table th,
		.text-wrap table th {
			color: #004d00 !important;
		}

		.nice-select {
			border: 1px solid #004d00 !important;
		}

		.custom-modal-width {
			max-width: 90%;
			/* Adjust as needed */
			width: 90%;
		}

		.nice-select .list {
			max-height: 400px !important;
			/* Adjust height as needed */
			overflow-y: auto !important;
			/* Enable scrolling */
		}

		.card-header {
			min-height: 1rem !important;
		}

		.card-body {
			padding: .5rem .5rem !important;
		}

		.table-bordered th,
		.text-wrap table th,
		.table-bordered td,
		.text-wrap table td {
			border: 1px solid #004d00 !important;
			padding: 0.1rem !important;
			text-align: center;
			vertical-align: middle;
		}

		.card {
			background-color: #d9f2e6 !important;
		}

		.card-options a:not(.btn) {
			color: #0b0b0b !important;
		}

		.header .nav-link .badge {

			width: 3rem !important;
			height: 1rem !important;

		}

		.separator {
			display: inline-block;
			width: 2px;
			/* Adjust thickness */
			height: 25px;
			/* Adjust height */
			background-color: #c2d6d6;
			/* Change color if needed */
			margin: 0 10px;
			/* Add spacing */
		}

		.line {
			height: 1px;
			background-color: #c2d6d6;
			width: 100%;
			margin: 0px 0;
		}

		.pulse-secondary {
			background: #025f0d !important;
		}

		.nav-tabs .nav-link.active {
			background: #047058 !important;
		}

		.card {
			border: 1px solid #0ae921 !important;
		}

		select.form-control {
			border: 1px solid #339966;
			/* Default border */
			border-radius: 4px;
		}

		/* On focus (when the dropdown is clicked) */
		.form-control:focus {
			border-color: #006600;
			/* Green border when selected/focused */
			outline: none;
			box-shadow: 0 0 0 5px rgba(21, 236, 68, 0.2);
			/* Optional subtle shadow */
		}

		.form-control {
			border-radius: 10px !important;
		}

		body {
			cursor: pointer;
		}

		.stylish-cursor {
			position: fixed;
			top: 0;
			left: 0;
			width: 16px;
			height: 16px;
			background: rgba(40, 167, 69, 0.6);
			/* Bootstrap green */
			border-radius: 50%;
			pointer-events: none;
			z-index: 9999;
			box-shadow: 0 0 10px rgba(40, 167, 69, 0.8),
				0 0 20px rgba(40, 167, 69, 0.5);
			transform: translate(-50%, -50%);
			transition: transform 0.05s ease-out;
		}

		#btn_savedraft_iti_plan,
		#btn_save_iti_plan {
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

		#btn_savedraft_iti_plan:hover,
		#btn_save_iti_plan:hover {
			background: #006600;
			transform: scale(1.05);
		}

		.tab-menu-heading {
			padding: 0px 0px !important;
		}

		.p-3 {
			padding: 0rem !important;
		}

		.nav-tabs .nav-link.active {
			background: #003300 !important;
		}

		.tabs-menu1 ul li .active {
			border-radius: 10px !important;
		}

		.nav-tabs .nav-link {
			padding: .2rem .5rem !important;
		}

		.nav-tabs .nav-link:hover:not(.disabled) {
			background: #339966;
		}

		.card-header {
			padding: 0rem 0rem !important;
			min-height: 0rem !important;
		}

		#view_cost_sheet_id,
		#gen_cost_sheet_id,
		#tour_view_id,
		.te,
		#cancel_cost_sheet_id,
		#ac_btn_id {
			background: #339966;
			color: white;
			border: 1px solid #006600;
			border-radius: 12px;
			backdrop-filter: blur(8px);
			-webkit-backdrop-filter: blur(8px);
			padding: 6px 14px;
			font-size: 16px;
			font-weight: 600;
			cursor: pointer;
			transition: all 0.3s ease-in-out;

			margin-right: 10px;
			/* ✅ SPACE BETWEEN BUTTONS */
		}

		#btn_total_km {
			background: #006666;
			color: white;
			border: 1px solid #006666;
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

		#view_cost_sheet_id:hover,
		#gen_cost_sheet_id:hover,
		#tour_view_id:hover,
		.te:hover,
		#cancel_cost_sheet_id:hover,
		#ac_btn_id:hover {
			background: #006600;
			transform: scale(1.05);
		}

		.breadcrumb-arrow li:first-child a {
			padding-left: 0px !important;
		}

		.breadcrumb-arrow li:first-child a {
			padding: 0 0px !important;
		}

		.breadcrumb-arrow li:first-child a {

			-webkit-border-radius: 0px 0 0 0px !important;

		}

		.breadcrumb-arrow li a {
			border: 1px solid #fafdfc !important;
		}

		.breadcrumb-arrow li a,
		.breadcrumb-arrow li:not(:first-child) span {
			height: 26px !important;
			padding: 0 3px 0 2px !important;
			line-height: 26px !important;
		}

		.breadcrumb-arrow {
			height: 0px !important;
			padding: 0 !important;
			line-height: 0px !important;
			font-size: 12px !important;
		}

		.breadcrumb-arrow li a:after,
		.breadcrumb-arrow li a:before {
			border-top: 0px solid transparent !important;
			border-bottom: 0px solid transparent !important;
		}

		.breadcrumb-arrow li span {
			padding: 0 3px;
		}

		/*input[type="date"],
		input[type="text"],
		label,
		select,
		option {
			font-size: 11px;
		}*/
		.fixed-save-buttons {
			position: sticky;
			bottom: 0;
			background: #f8f9fa;
			/* Light gray background */
			padding: 15px 20px;
			z-index: 1000;
			border-top: 1px solid #ccc;
			text-align: center;
		}

		.card {
			border: 1px solid #fff !important;
			border-radius: 10px !important;
		}

		.wideget-user-tab.wideget-user-tab3 .tabs-menu1 ul li .active {
			padding: 5px 5px 5px 5px;
			background: #004d00;
			font-weight: bold;
			font-size: 20px;
			color: #fff;
			border: 0;
		}

		.card-body {
			padding: .0rem .0rem !important;
		}

		.nav-tabs {
			margin: 0rem !important;
			justify-content: center !important;
		}

		.tab-menu-heading {
			padding: 20px 8px;
			border: 0px;
		}

		.col,
		.col-1,
		.col-10,
		.col-11,
		.col-12,
		.col-2,
		.col-3,
		.col-4,
		.col-5,
		.col-6,
		.col-7,
		.col-8,
		.col-9,
		.col-auto,
		.col-lg,
		.col-lg-1,
		.col-lg-10,
		.col-lg-11,
		.col-lg-12,
		.col-lg-2,
		.col-lg-3,
		.col-lg-4,
		.col-lg-5,
		.col-lg-6,
		.col-lg-7,
		.col-lg-8,
		.col-lg-9,
		.col-lg-auto,
		.col-md,
		.col-md-1,
		.col-md-10,
		.col-md-11,
		.col-md-12,
		.col-md-2,
		.col-md-3,
		.col-md-4,
		.col-md-5,
		.col-md-6,
		.col-md-7,
		.col-md-8,
		.col-md-9,
		.col-md-auto,
		.col-sm,
		.col-sm-1,
		.col-sm-10,
		.col-sm-11,
		.col-sm-12,
		.col-sm-2,
		.col-sm-3,
		.col-sm-4,
		.col-sm-5,
		.col-sm-6,
		.col-sm-7,
		.col-sm-8,
		.col-sm-9,
		.col-sm-auto,
		.col-xl,
		.col-xl-1,
		.col-xl-10,
		.col-xl-11,
		.col-xl-12,
		.col-xl-2,
		.col-xl-3,
		.col-xl-4,
		.col-xl-5,
		.col-xl-6,
		.col-xl-7,
		.col-xl-8,
		.col-xl-9,
		.col-xl-auto {
			position: relative;
			width: 100%;
			min-height: 1px;
			padding-right: 15px;
			padding-left: 15px;
		}
	</style>
</head>

<body class="app sidebar-mini">
	<?php
	$start_date = date('Y-m-d', strtotime($object_det[0]['start_date']));
	$meal_plan = date('Y-m-d', strtotime($object_det[0]['meal_plan']));
	?>
	<!-- Loader -->
	<div id="loading">
		<img src="<?php echo base_url('assets/images/other/loader.svg'); ?>" class="loader-img" alt="Loader">
	</div>
	<div class="modal fade overflow-hidden" id="modal_tour" tabindex="-1" role="dialog" aria-labelledby="modal-default"
		aria-hidden="true">
		<div class="modal-dialog custom-modal-width" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="example-Modal3">Tour Plan View</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body tab_con">

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-success  ml-auto" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade overflow-hidden" id="modal_qq" tabindex="-1" role="dialog" aria-labelledby="modal-default"
		aria-hidden="true">
		<div class="modal-dialog custom-modal-width" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="example-Modal3">Quick Quote View</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body tab_con_qq">

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-success  ml-auto" data-dismiss="modal">Close</button>
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
								<img src="<?php echo base_url('assets/images/brand/logo.png'); ?>"
									class="header-brand-img desktop-logo " alt="Dashlot logo">
								<img src="<?php echo base_url('assets/images/brand/logo1.png'); ?>"
									class="header-brand-img desktop-logo-1 " alt="Dashlot logo">
								<img src="<?php echo base_url('assets/images/brand/favicon.png'); ?>"
									class="mobile-logo" alt="Dashlot logo">
								<img src="<?php echo base_url('assets/images/brand/favicon1.png'); ?>"
									class="mobile-logo-1" alt="Dashlot logo">
							</a>
							<a href="#" data-toggle="sidebar" class="nav-link icon toggle"><i
									class="fe fe-align-justify fs-20"></i></a>
							<div class="d-flex header-left left-header">
								<div class="d-none d-lg-block horizontal">
									<ul class="nav">
										<li class="">
											<div class="dropdown d-none d-md-flex">
												<a href="#" class="d-flex nav-link pr-0  pt-2 mt-3 country-flag1"
													data-toggle="dropdown">
													<span class="d-flex"><img
															src="<?php echo base_url('assets/images/roles.jpg'); ?>"
															alt="img"
															class="avatar country-Flag mr-2 align-self-center"></span>
													<div>
														<span
															class="d-flex fs-14 mr-3 mt-0"><?php echo session('active_role_name'); ?><span><i
																	class="mdi mdi-chevron-down"></i></span></span>
													</div>
												</a>
												<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
													<?php foreach ($all_roles_assn as $data): ?>
														<a href="#"
															onclick="switchroles(<?php echo $data['role_id']; ?>,'<?php echo $data['role_name']; ?>');"
															class="dropdown-item d-flex align-items-center mt-2">
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
												<a href="#" class="d-flex nav-link pr-0  pt-2 mt-3 country-flag1"
													data-toggle="dropdown">
													<span class="d-flex"><img
															src="<?php echo base_url('assets/images/system.jpg'); ?>"
															alt="img"
															class="avatar country-Flag mr-2 align-self-center"></span>
													<div>
														<span
															class="d-flex fs-14 mr-3 mt-0"><?php echo session('system_name'); ?><span><i
																	class="mdi mdi-chevron-down"></i></span></span>
													</div>
												</a>
												<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
													<?php foreach ($all_systems as $datas): ?>
														<a href="#"
															onclick="switchsystems(<?php echo $datas['entity_boolean_id']; ?>,'<?php echo $datas['boolean_name']; ?>');"
															class="dropdown-item d-flex align-items-center mt-2">
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
								<div class="profile-details mt-1" style="padding-top:10px;">
									<span class="mr-3 mb-0  fs-15 font-weight-bold"
										style="color:#003300;font-weight:bold;">Tour Start Date :
										<?php echo $object_det[0]['start_date']; ?></span>
								</div>
								<div class="profile-details mt-1" style="padding-top:10px;">
									<span class="mr-3 mb-0  fs-15 font-weight-bold" style="color:#003300;">Nights :
										<span
											id="planned_night"></span><?php echo $object_det[0]['no_of_night']; ?></span>

								</div>
								<div class="profile-details mt-1" style="padding-top:10px;">
									<span class="mr-3 mb-0  fs-15 font-weight-bold"
										style="color:#003300;font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tour
										End Date : <?php echo $object_det[0]['end_date']; ?></span>
								</div>
								<div class="dropdown header-fullscreen">
									<a class="nav-link icon full-screen-link" id="fullscreen-button">
										<i class="mdi mdi-arrow-collapse fs-20"></i>
									</a>
								</div>

								<div class="dropdown drop-profile">
									<a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown"
										aria-expanded="false">
										<div class="profile-details mt-1">
											<span
												class="mr-3 mb-0  fs-15 font-weight-semibold"><?php echo session('user_name'); ?></span>
											<!--<small class="text-muted mr-3">appdeveloper</small>-->
										</div>
										<img class="avatar avatar-md brround"
											src="<?php echo base_url('assets/images/users/user.png'); ?>" alt="image">
									</a>
									<div
										class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated bounceInDown w-250">
										<div class="user-profile bg-header-image border-bottom p-3">
											<div class="user-image text-center">
												<img class="user-images"
													src="<?php echo base_url('assets/images/users/user.png'); ?>"
													alt="image">
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

							</div>
						</div>

						<div class="line"></div>
						<div class="d-flex">
							<a class="header-brand" href="<?= site_url('Dashboard'); ?>">

							</a>
							<a href="#" data-toggle="sidebar" class="nav-link icon toggle"></a>


							<div class="d-flex header-left left-header align-items-center gap-3">

								<button class="btn btn-success btn-sm" onclick="history.back()" title="Go Back">
									<i class="fa fa-arrow-left"></i> Back
								</button>

								<button type="button" id="tour_view_id" class="btn btn-success tour_view" style="margin-left: 13px;">
									View Tour Plan
								</button>

								<!-- TOUR EDIT LINK -->
								<a href="<?= site_url('Enquiry/tour_plan/' . $object_id . '/' . $enquiry_details_id); ?>"
									class="btn btn-success te"
									title="Tour Edit">
									<i class="fa fa-edit"></i> Tour Edit
								</a>

								<button type="button" id="btn_total_km" class="btn btn-success">
									Total KM : <span id="btn_total_id"></span>
								</button>

							</div>


							<div class="d-flex header-right ml-auto">
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<span class="separator"></span>
									<p class="h5" style="color:#003300;font-weight:bold;">
										<?php echo $object_det[0]['object_name']; ?></p>
									<span class="separator"></span>
								</div>
								<?php if ($object_det[0]['enq_type_id'] == "3") { ?>
									<div class="dropdown d-md-flex message" style="padding-top:10px;">
										<p class="h5" style="color:#003300;font-weight:bold;">
											<?php echo $object_det[0]['agent_name']; ?></p>
										<span class="separator"></span>
									</div>
								<?php } ?>
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<p class="h5" style="color:#003300;font-weight:bold;">Accom-Total : <span
											id="a_total"></span></p>
									<span class="separator"></span>
								</div>
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<p class="h5" style="color:#003300;font-weight:bold;">Trans-Total : <span
											id="v_total"></span></p>
									<span class="separator"></span>
								</div>

								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<p class="h5" style="color:#003300;font-weight:bold;">Grand Total : <span
											id="g_total"></span></p>
									<span class="separator"></span>
								</div>
							</div>
						</div>
						<div class="line"></div>

						<div class="d-flex">
							<a class="header-brand" href="<?= site_url('Login/logout'); ?>">

							</a>
							<a href="#" data-toggle="sidebar" class="nav-link icon toggle"></a>
							<div class="d-flex header-left left-header">
								<div class="d-none d-lg-block horizontal" style="padding-top:5px;">

									<ol class="breadcrumb breadcrumb-arrow mt-3 bg-light">
										<?php
										$bcount = 1;
										$tour_plan_det_count = count($tour_plan_det);
										foreach ($tour_plan_det as $ttkey => $ttval) {
											$startDates = new DateTime($ttval['check_in_date']);
											$endDates = new DateTime($ttval['check_out_date']);
											while ($startDates < $endDates) {
												$iti_id = $ttval['tour_details_id'] . "_" . $startDates->format('d-m-Y');
												$iti_id_temp = $ttval['tour_details_id'];
										?>

												<li class="bc-card" data-index="<?php echo $iti_id; ?>">
													<a>
														<span class="bc-card-seq"
															style="color:#fff;font-weight:bold;"><?php echo $bcount; ?></span><span
															style="color:#fff;font-weight:bold;">.
															<?php echo $startDates->format('d-m-Y'); ?> - <span
																id="span_bread_id<?php echo $iti_id; ?>"
																style="color:#fff"></span></span>
													</a>
												</li>
										<?php
												$startDates->modify('+1 day');
												$bcount++;
											}
										}
										$iti_id = $iti_id_temp . "_" . $object_det[0]['end_date'];
										?>
										<li class="bc-card" data-index="<?php echo $iti_id; ?>">
											<a>
												<span class="bc-card-seq"
													style="color:#fff;font-weight:bold;"><?php echo $bcount; ?></span><span
													style="color:#fff;font-weight:bold;">.
													<?php echo $object_det[0]['end_date']; ?> - <span
														id="span_bread_id<?php echo $iti_id; ?>"
														style="color:#fff"></span></span>
											</a>
										</li>
									</ol>


								</div>
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
						<img src="<?php echo base_url('assets/images/users/user.png'); ?>" alt="profile-img"
							class="rounded-circle w-25">
					</div>
					<div class="user-info">
						<a href="#" class=""><span
								class="app-sidebar__user-name font-weight-semibold"><?php echo session('user_name'); ?></span><br>
							<!--span class="text-muted app-sidebar__user-designation text-sm">App Developer</span>-->
						</a>
					</div>
				</div>
				<ul class="side-menu toggle-menu">
					<?php foreach ($parent_menu as $key1 => $val1) {
						$img_tmp = $val1['entity_trans_id'] . ".svg";
					?>
						<li class="slide">
							<a class="side-menu__item" data-toggle="slide" href=""><span class="icon-menu-img"><img
										src="<?php echo base_url('assets/images/svgs/' . $img_tmp); ?>"
										class="side_menu_img svg-1" alt="image"></span><span
									class="side-menu__label"><?php echo $val1['entity_trans_name']; ?></span><i
									class="angle fa fa-angle-right"></i></a>
							<ul class="slide-menu">
								<?php foreach ($sub_menu as $key2 => $val2) {
									if ($val1['entity_trans_id'] == $val2['prs_parent_id']) {
										foreach ($all_menus as $key3 => $val3) {
											if ($val3['entity_trans_id'] == $val2['entity_trans_id']) {
								?>
												<li><a class="slide-item"
														href="<?= site_url($val2['menu_link']); ?>"><span><?php echo $val2['entity_trans_name']; ?></span></a>
												</li>
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
				<div class="section business-management mt-5">

					<!-- Page-header opened -->
					<!--<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0"><?php echo $object_class_name; ?></h4>
								<small class="text-muted mt-0">Create / Edit <?php echo $object_class_name; ?></small>
							</div>
							<div class="page-rightheader">
								<div class="ml-3 ml-auto d-flex">
								
									<div class="mt-4 mt-xl-0 mt-lg-4 mt-md-4 mt-md-0">
										<a href="<?= site_url('Enquiry/enquiry_list_view/' . $object_class_id); ?>" class="btn btn-success ml-0 ml-md-4 mt-1 "><i class="typcn typcn-eye mr-1"></i>Enquiry List View</a>
									</div>
								</div>
							
							</div>
						</div>-->


					<!-- Page-header closed -->

					<!-- row opened -->


					<div class="row" style="padding-top:125px;">
						<div class="col-lg-12">

							<div class="wideget-user-tab wideget-user-tab3">
								<div class="tab-menu-heading">
									<div class="tabs-menu1">
										<ul class="nav nav-tabs" id="outer-location-tabs">

											<?php foreach ($tour_plan_det as $tkey => $tval) {
												if ($tkey == 0) {
											?>
													<li class=""><a href="#tab-<?php echo $tval['tour_details_id']; ?>"
															class="nav-link <?php echo $tval['tour_details_id']; ?> active"
															data-toggle="tab"><b><?php echo $tval['geog_name']; ?></b></a></li>

												<?php } else { ?>
													<li><a href="#tab-<?php echo $tval['tour_details_id']; ?>" data-toggle="tab"
															class="nav-link <?php echo $tval['tour_details_id']; ?>"><b><?php echo $tval['geog_name']; ?></b></a>
													</li>
											<?php
												}
											} ?>

										</ul>
									</div>
								</div>
							</div>

							<form id="myTourplanForm" method="POST" action="<?= site_url('Enquiry/saveItinerary'); ?>">
								<input type="hidden" name="hotel_additi" value="">
								<input type="hidden" name="enquiry_header_id"
									value="<?php echo $object_det[0]['enquiry_header_id']; ?>">
								<input type="hidden" name="enquiry_details_id"
									value="<?php echo $object_det[0]['enquiry_details_id']; ?>">
								<input type="hidden" name="is_quick_quote"
									value="<?php echo $object_det[0]['is_quick_quote']; ?>">
								<input type="hidden" name="h_no_of_night"
									value="<?php echo $object_det[0]['no_of_night']; ?>">
								<input type="hidden" name="object_id" value="<?php echo $object_id; ?>">
								<input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
								<input type="hidden" name="is_edit" value="<?php echo $is_edit; ?>">
								<input type="hidden" name="tour_plan_ref_id" value="<?php echo $tour_plan_ref_id; ?>">
								<input type="hidden" name="extension_ref_id_temp"
									value="<?php echo $extension_ref_id_temp; ?>">
								<input type="hidden" name="version_count" value="<?php echo $version_count; ?>">
								<input type="hidden" name="no_of_double_room"
									value="<?php echo $object_det[0]['no_of_double_room']; ?>">
								<input type="hidden" name="no_of_single_room"
									value="<?php echo $object_det[0]['no_of_single_room']; ?>">
								<input type="hidden" id="total_addon_count" name="total_addon_count" value="0">
								<div class="bg-white widget-user mb-0">
									<div class="card-body">
										<div class="border-0">
											<div class="tab-content">


												<?php
												$breadcrumb = '';
												$tpd_count = count($tour_plan_det) - 1;
												$day_count = 1;
												$d_addon_events_pre_array = [];
												foreach ($tour_plan_det as $ttkey => $ttval) {
													$vehicle_details = json_decode($ttval['vehicle_details']);
													$cnt = 0;
												?>
													<div class="tab-pane <?php echo ($ttkey == 0) ? 'show active' : ''; ?>"
														id="tab-<?php echo $ttval['tour_details_id']; ?>">
														<div class="row">
															<div class="col-xl-12">
																<div class="">
																	<!--<div class="card mb-0 box-shadow-0">-->
																	<div class="tab-menu-heading">
																		<div class="tabs-menu1">
																			<!-- Horizontal Itinerary Tabs -->
																			<ul class="nav nav-tabs" role="tablist">
																				<?php
																				$startDate = new DateTime($ttval['check_in_date']);
																				$endDate = new DateTime($ttval['check_out_date']);
																				if ($ttkey == $tpd_count) {
																					$endDate->modify('+1 day');
																				}
																				while ($startDate < $endDate) {
																					$iti_id = $ttval['tour_details_id'] . "_" . $startDate->format('d-m-Y');
																					$iti_id_last = $ttval['tour_details_id'];
																				?>
																					<li class="nav-item">
																						<a href="#tabi-<?php echo $iti_id; ?>"
																							class="nav-link <?php echo ($cnt == 0) ? 'active' : ''; ?>"
																							data-toggle="tab">
																							<b><?php echo $startDate->format('d-m-Y'); ?></b>
																						</a>
																					</li>
																				<?php
																					$startDate->modify('+1 day');
																					$cnt++;
																				}

																				?>

																			</ul>
																		</div>
																	</div>

																	<!-- Tab Content for Itinerary -->
																	<div class="tab-content">
																		<?php
																		$startDate1 = new DateTime($ttval['check_in_date']);
																		$endDate1 = new DateTime($ttval['check_out_date']);

																		if ($ttkey == $tpd_count) {
																			//$endDate1->add(new DateInterval('P1D'));
																			$endDate1->modify('+1 day');
																		}
																		$cnt1 = 0;
																		while ($startDate1 < $endDate1) {
																			$iti_id = $ttval['tour_details_id'] . "_" . $startDate1->format('d-m-Y');
																			foreach ($tariff_details_iti as $tppkey => $tppval) {
																				if ($tppval['tour_date'] == $startDate1->format('Y-m-d')) {
																					$d_room_tariff = $tppval['d_room_tariff'];
																					$s_room_tariff = $tppval['s_room_tariff'];
																					$d_child_tariff = $tppval['d_child_tariff'];
																					$s_child_tariff = $tppval['s_child_tariff'];
																					$d_child_wb_tariff = $tppval['d_child_wb_tariff'];
																					$s_child_wb_tariff = $tppval['s_child_wb_tariff'];
																					$d_extra_tariff = $tppval['d_extra_tariff'];
																					$s_extra_tariff = $tppval['s_extra_tariff'];
																				}
																			}
																			$d_room_tariff_t = 0;
																			$s_room_tariff_t = 0;
																			$d_child_tariff_t = 0;
																			$s_child_tariff_t = 0;
																			$d_child_wb_tariff_t = 0;
																			$s_child_wb_tariff_t = 0;
																			$d_extra_tariff_t = 0;
																			$s_extra_tariff_t = 0;

																			foreach ($tour_plan_tariff as $tppkey => $tppval) {
																				if ($ttval['tour_details_id'] == $tppkey) {
																					foreach ($tour_plan_tariff[$tppkey] as $tpkey => $tpval) {
																						if ($tpval['cost_component_id'] == 6 && $tpval['room_type_id'] == 2) {
																							$d_room_tariff_t = $tpval['quick_quote_tariff'];
																						}
																						if ($tpval['cost_component_id'] == 6 && $tpval['room_type_id'] == 1) {
																							$s_room_tariff_t = $tpval['quick_quote_tariff'];
																						}

																						if ($tpval['cost_component_id'] == 12 && $tpval['room_type_id'] == 2) {
																							$d_child_tariff_t = $tpval['quick_quote_tariff'];
																						}
																						if ($tpval['cost_component_id'] == 12 && $tpval['room_type_id'] == 1) {
																							$s_child_tariff_t = $tpval['quick_quote_tariff'];
																						}

																						if ($tpval['cost_component_id'] == 15 && $tpval['room_type_id'] == 2) {
																							$d_child_wb_tariff_t = $tpval['quick_quote_tariff'];
																						}
																						if ($tpval['cost_component_id'] == 15 && $tpval['room_type_id'] == 1) {
																							$s_child_wb_tariff_t = $tpval['quick_quote_tariff'];
																						}

																						if ($tpval['cost_component_id'] == 9 && $tpval['room_type_id'] == 2) {
																							$d_extra_tariff_t = $tpval['quick_quote_tariff'];
																						}
																						if ($tpval['cost_component_id'] == 9 && $tpval['room_type_id'] == 1) {
																							$s_extra_tariff_t = $tpval['quick_quote_tariff'];
																						}
																					}
																				}
																			}

																			/*if($d_room_tariff == 0){
																						$d_room_tariff = $d_room_tariff_t;
																					}
																					if($s_room_tariff == 0){
																						$s_room_tariff = $s_room_tariff_t;
																					}
																					if($d_child_tariff == 0){
																						$d_child_tariff = $d_child_tariff_t;
																					}
																					if($s_child_tariff == 0){
																						$s_child_tariff = $s_child_tariff_t;
																					}
																					if($d_child_wb_tariff == 0){
																						$d_child_wb_tariff = $d_child_wb_tariff_t;
																					}
																					if($s_child_wb_tariff == 0){
																						$s_child_wb_tariff = $s_child_wb_tariff_t;
																					}
																					if($d_extra_tariff == 0){
																						$d_extra_tariff = $d_extra_tariff_t;
																					}
																					if($s_extra_tariff == 0){
																						$s_extra_tariff = $s_extra_tariff_t;
																					}*/
																			$permit = 0;
																			if (!empty($tour_plan_tariff)) {

																				$d_room_tariff = $d_room_tariff_t;

																				$s_room_tariff = $s_room_tariff_t;

																				$d_child_tariff = $d_child_tariff_t;

																				$s_child_tariff = $s_child_tariff_t;

																				$d_child_wb_tariff = $d_child_wb_tariff_t;

																				$s_child_wb_tariff = $s_child_wb_tariff_t;

																				$d_extra_tariff = $d_extra_tariff_t;

																				$s_extra_tariff = $s_extra_tariff_t;
																			}


																			//$tac_double = ($object_det[0]['no_of_double_room']*$d_room_tariff) + ($object_det[0]['no_of_child_with_bed']*$d_child_tariff) + ($object_det[0]['no_of_child_without_bed']*$d_child_wb_tariff) + ($object_det[0]['no_of_extra_bed']*$d_extra_tariff);
																			//$tac_single = ($object_det[0]['no_of_single_room']*$s_room_tariff);

																			if ($ttval['tax_status'] == 1) {
																				$tot_d = $d_room_tariff + ($object_det[0]['no_of_child_with_bed'] * $d_child_tariff) + ($object_det[0]['no_of_child_without_bed'] * $d_child_wb_tariff) + ($object_det[0]['no_of_extra_bed'] * $d_extra_tariff);
																				if ($tot_d >= 7500) {
																					$d_gst = 18;
																					$d_gstval = ($d_gst / 100) * $tot_d;
																					$tac_double = ($tot_d + $d_gstval) * $object_det[0]['no_of_double_room'];
																				} else {
																					$tac_double = ($object_det[0]['no_of_double_room'] * $d_room_tariff) + ($object_det[0]['no_of_child_with_bed'] * $d_child_tariff) + ($object_det[0]['no_of_child_without_bed'] * $d_child_wb_tariff) + ($object_det[0]['no_of_extra_bed'] * $d_extra_tariff);
																				}

																				$tot_s = $s_room_tariff;
																				if ($tot_s >= 7500) {
																					$s_gst = 18;
																					$s_gstval = ($s_gst / 100) * $tot_s;
																					$tac_single = ($tot_s + $s_gstval) * $object_det[0]['no_of_single_room'];
																				} else {
																					$tac_single = ($object_det[0]['no_of_single_room'] * $s_room_tariff);
																				}
																			} else {
																				$tac_double = ($object_det[0]['no_of_double_room'] * $d_room_tariff) + ($object_det[0]['no_of_child_with_bed'] * $d_child_tariff) + ($object_det[0]['no_of_child_without_bed'] * $d_child_wb_tariff) + ($object_det[0]['no_of_extra_bed'] * $d_extra_tariff);
																				$tac_single = ($object_det[0]['no_of_single_room'] * $s_room_tariff);
																			}


																			$tac = $tac_double + $tac_single;
																			$spcl_tariff = 0;
																			$hot_fac_id = 0;
																			$hot_fac_tariff = 0;
																			$sight_id = 0;
																			$sight_tariff = 0;
																			$daily_addon = 0;
																			$remarks = '';
																			$transport_remarks = '';
																			$hotel_facility_ids = '';
																			$child_with_bed = $object_det[0]['no_of_child_with_bed'];
																			$child_without_bed = $object_det[0]['no_of_child_without_bed'];
																			$extra_bed = $object_det[0]['no_of_extra_bed'];
																			$double_room = $object_det[0]['no_of_double_room'];
																			$single_room = $object_det[0]['no_of_single_room'];
																			$d_vehicles = [];
																			$d_hotels = [];
																			$d_spcl_events = [];
																			$d_addon_events = [];
																			$saved_vehicles = [];

																			$special_event_name = '';
																			$hotel_exist = $ttval['hotel_id'];
																			$room_cat_exist = $ttval['room_category_id'];
																			$room_cat_list_draft = $ttval['room_cat_list'];

																			if (!empty($itinerary_details_draft)) {
																				foreach ($itinerary_details_draft as $dkey => $dval) {
																					if ($startDate1->format('Y-m-d') == $dval['tour_date']) {
																						$permit = $dval['permit'];
																						$child_with_bed = $dval['child_with_bed'];
																						$child_without_bed = $dval['child_without_bed'];
																						$extra_bed = $dval['extra_bed'];
																						$double_room = $dval['double_room'];
																						$single_room = $dval['single_room'];
																						$hotel_facility_ids = $dval['hotel_facility_ids'];

																						$remarks = $dval['remarks'];
																						$transport_remarks = $dval['transport_remarks'];
																						$special_event_name = $dval['special_event_name'];
																						$d_vehicle_details = $dval['vehicle_details'];
																						$d_hotel_details = $dval['hotel_details'];
																						$d_special_events = $dval['json_special_event'];
																						$d_addons_events = $dval['json_addons'];
																						$hotel_exist = $dval['hotel_id'];
																						$room_cat_list_draft = $dval['room_cat_list_draft'];
																						$room_cat_exist = $dval['room_category_id'];
																						$d_vehicles = json_decode($d_vehicle_details);
																						$saved_vehicles = json_decode($d_vehicle_details, true);


																						$d_hotels = json_decode($d_hotel_details);
																						$d_spcl_events = json_decode($d_special_events);
																						$d_addon_events = json_decode($d_addons_events);

																						foreach ($dval['cost'] as $costkey => $costval) {
																							if ($costval['cost_component_id'] == 6 && $costval['room_type_id'] == 2) {
																								$d_room_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 6 && $costval['room_type_id'] == 1) {
																								$s_room_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 12 && $costval['room_type_id'] == 2) {
																								$d_child_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 12 && $costval['room_type_id'] == 1) {
																								$s_child_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 15 && $costval['room_type_id'] == 2) {
																								$d_child_wb_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 15 && $costval['room_type_id'] == 1) {
																								$s_child_wb_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 9 && $costval['room_type_id'] == 2) {
																								$d_extra_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 9 && $costval['room_type_id'] == 1) {
																								$s_extra_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 17 && $costval['room_type_id'] == 1) {
																								$spcl_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 18 && $costval['room_type_id'] == 1) {
																								$hot_fac_id = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 19 && $costval['room_type_id'] == 1) {
																								$hot_fac_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 21 && $costval['room_type_id'] == 1) {
																								$sight_id = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 22 && $costval['room_type_id'] == 1) {
																								$sight_tariff = $costval['tariff'];
																							}
																							if ($costval['cost_component_id'] == 23 && $costval['room_type_id'] == 1) {
																								$daily_addon = $costval['tariff'];
																							}

																							if ($ttval['tax_status'] == 1) {
																								$tot_d = $d_room_tariff + ($child_with_bed * $d_child_tariff) + ($child_without_bed * $d_child_wb_tariff) + ($extra_bed * $d_extra_tariff);
																								if ($tot_d >= 7500) {
																									$d_gst = 18;
																									$d_gstval = ($d_gst / 100) * $tot_d;
																									$tac_double1 = ($tot_d + $d_gstval) * $double_room;
																								} else {
																									$tac_double1 = ($double_room * $d_room_tariff) + ($child_with_bed * $d_child_tariff) + ($child_without_bed * $d_child_wb_tariff) + ($extra_bed * $d_extra_tariff);
																								}

																								$tot_s = $s_room_tariff;
																								if ($tot_s >= 7500) {
																									$s_gst = 18;
																									$s_gstval = ($s_gst / 100) * $tot_s;
																									$tac_single1 = ($tot_s + $s_gstval) * $single_room;
																								} else {
																									$tac_single1 = ($single_room * $s_room_tariff);
																								}
																							} else {
																								$tac_double1 = ($double_room * $d_room_tariff) + ($child_with_bed * $d_child_tariff) + ($child_without_bed * $d_child_wb_tariff) + ($extra_bed * $d_extra_tariff);
																								$tac_single1 = ($single_room * $s_room_tariff);
																							}

																							$tac = $tac_double1 + $tac_single1;
																						}
																					}
																				}
																			} else {
																				if (!empty($previous_itinerary_details_save)) {
																					foreach ($previous_itinerary_details_save as $p_key => $p_val) {
																						if ($startDate1->format('Y-m-d') == $p_val['tour_date']) {

																							if ($ttval['hotel_id'] == $p_val['hotel_id']) {
																								$d_addons_events_pre = $p_val['json_addons'];
																								$d_addon_events_pre = json_decode($d_addons_events_pre);
																								$d_addon_events_pre_array_temp = json_decode($d_addons_events_pre, true);

																								foreach ($d_addon_events_pre_array_temp as $p_arr_k => $p_arr_v) {
																									if ($startDate1->format('Y-m-d') == $p_arr_v['tour_date']) {
																										$parts_t = explode('_', $p_arr_v['addon_id']);
																										$parts_tt = explode('_', $p_arr_v['addon_idvalue']);
																										$d_addon_events_pre_array[$p_arr_k]['addon_id'] = $ttval['tour_details_id'] . "_" . $parts_t[1];
																										$d_addon_events_pre_array[$p_arr_k]['tour_date'] = $p_arr_v['tour_date'];
																										$d_addon_events_pre_array[$p_arr_k]['addon_event'] = $p_arr_v['addon_event'];
																										$d_addon_events_pre_array[$p_arr_k]['addon_tariff'] = $p_arr_v['addon_tariff'];
																										$d_addon_events_pre_array[$p_arr_k]['addon_idvalue'] = $ttval['tour_details_id'] . "_" . $parts_tt[1] . "_" . $parts_tt[2];
																										$d_addon_events_pre_array[$p_arr_k]['addon_sequence'] = $p_arr_v['addon_sequence'];
																									}
																								}

																								$permit = $p_val['permit'];
																								if ($ttval['tour_location'] == $p_val['tour_location']) {
																									foreach ($p_val['cost'] as $p_costkey => $p_costval) {

																										if ($p_costval['cost_component_id'] == 21 && $p_costval['room_type_id'] == 1) {
																											$sight_id = $p_costval['tariff'];
																										}
																										if ($p_costval['cost_component_id'] == 22 && $p_costval['room_type_id'] == 1) {
																											$sight_tariff = $p_costval['tariff'];
																										}
																									}
																								}
																							}
																						}
																					}
																				}
																			}
																			if ($ttval['tax_status'] == 1) {
																				$tac = $ttval['tac_eighteen'];
																			}


																		?>
																			<div class="tab-pane fade <?php echo ($cnt1 == 0) ? 'show active' : ''; ?>"
																				id="tabi-<?php echo $iti_id; ?>">
																				<div class="p-3">


																					<!-- //nj// -->
																					<div class="col-md-12 col-lg-12 col-xl-12 location-card"
																						data-index="<?php echo $iti_id; ?>">
																						<div class="card">
																							<div class="card-header">
																								<input type="hidden"
																									id="own_arrange<?php echo $iti_id; ?>"
																									name="addloc[<?php echo $iti_id; ?>][own_arrange]"
																									value="0">
																								<input type="hidden"
																									id="tour_details_id<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tour_details_id]"
																									value="<?php echo $ttval['tour_details_id']; ?>">
																								<input type="hidden"
																									id="iti_id<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][iti_id]"
																									value="<?php echo $iti_id; ?>">
																								<input type="hidden"
																									id="tour_date<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tour_date]"
																									value="<?php echo $startDate1->format('Y-m-d'); ?>">
																								<input type="hidden"
																									id="tour_location_id<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tour_location_id]"
																									value="<?php echo $ttval['tour_location']; ?>">
																								<input type="hidden"
																									id="tour_location_name<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tour_location_name]"
																									value="<?php echo $ttval['geog_name']; ?>">
																								<input type="hidden"
																									id="meal_plan_id<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][meal_plan_id]"
																									value="<?php echo $ttval['meal_plan_id']; ?>">
																								<input type="hidden"
																									id="tax_status<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tax_status]"
																									value="<?php echo $ttval['tax_status']; ?>">
																								<input type="hidden"
																									id="tac_eighteen_double<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tac_eighteen_double]"
																									value="<?php echo $ttval['tac_eighteen_double']; ?>">
																								<input type="hidden"
																									id="tac_eighteen_single<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tac_eighteen_single]"
																									value="<?php echo $ttval['tac_eighteen_single']; ?>">
																								<input type="hidden"
																									id="tac_eighteen_total<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][tac_eighteen_total]"
																									value="<?php echo $ttval['tac_eighteen']; ?>">

																								<input type="hidden"
																									id="adult_eighteen_double<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][adult_eighteen_double]"
																									value="<?php echo $ttval['adult_eighteen_double']; ?>">
																								<input type="hidden"
																									id="child_eighteen_double<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][child_eighteen_double]"
																									value="<?php echo $ttval['child_eighteen_double']; ?>">
																								<input type="hidden"
																									id="child_wb_eighteen_double<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][child_wb_eighteen_double]"
																									value="<?php echo $ttval['child_wb_eighteen_double']; ?>">
																								<input type="hidden"
																									id="extra_eighteen_double<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][extra_eighteen_double]"
																									value="<?php echo $ttval['extra_eighteen_double']; ?>">
																								<input type="hidden"
																									id="adult_eighteen_single<?php echo $iti_id; ?>"
																									name="additi[<?php echo $iti_id; ?>][adult_eighteen_single]"
																									value="<?php echo $ttval['adult_eighteen_single']; ?>">
																							</div>
																							<div class="card-body">
																								<div
																									class="ibox teams mb-30 bg-boxshadow">
																									<div
																										class="ibox-content teams">
																										<div
																											id="hotel_dynamic_field">
																											<div id="loading-spinner"
																												style="
																												display: none;
																												position: fixed;
																												top: 50%;
																												left: 50%;
																												z-index: 9999;
																												transform: translate(-50%, -50%);
																											">
																												<div class="spinner-border text-primary"
																													role="status"
																													style="width: 3rem; height: 3rem;">
																													<span
																														class="sr-only">Loading...</span>
																												</div>
																											</div>

																											<?php if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) { ?>
																												<select
																													id="hotelid<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][hotelid]"
																													data-id="<?php echo $iti_id; ?>"
																													class="form-control input-sm hotel_change"
																													style="display:none;">
																													<option
																														value="">
																														Select
																													</option>

																												</select>
																												<select
																													id="roomcat<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][roomcat]"
																													data-id="<?php echo $iti_id; ?>"
																													data-sid="1"
																													class="form-control input-sm room_cat_change"
																													style="display:none;">
																													<option
																														value="">
																														Select
																													</option>

																												</select>

																												<input type="hidden"
																													id="no_of_adult<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][no_of_adult]"
																													value="<?php echo $object_det[0]['no_of_adult']; ?>">
																												<input type="hidden"
																													id="no_of_ch<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][no_of_ch]"
																													value="<?php echo $child_with_bed; ?>">
																												<input type="hidden"
																													id="no_of_cw<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][no_of_cw]"
																													value="<?php echo $child_without_bed; ?>">
																												<input type="hidden"
																													id="no_of_extra<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][no_of_extra]"
																													value="<?php echo $extra_bed; ?>">

																												<input type="hidden"
																													id="double<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][double]"
																													value="<?php echo $double_room; ?>">
																												<input type="hidden"
																													id="d_adult_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][d_adult_rate]"
																													value="0">
																												<input type="hidden"
																													id="d_child_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][d_child_rate]"
																													value="0">
																												<input type="hidden"
																													id="d_child_wb_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][d_child_wb_rate]"
																													value="0">
																												<input type="hidden"
																													id="d_extra_bed_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][d_extra_bed_rate]"
																													value="0">

																												<input type="hidden"
																													id="single<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][single]"
																													value="<?php echo $single_room; ?>">
																												<input type="hidden"
																													id="s_adult_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][s_adult_rate]"
																													value="0">
																												<input type="hidden"
																													id="s_child_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][s_child_rate]"
																													value="0">
																												<input type="hidden"
																													id="s_child_wb_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][s_child_wb_rate]"
																													value="0">
																												<input type="hidden"
																													id="s_extra_bed_rate<?php echo $iti_id; ?>"
																													data-id="<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][s_extra_bed_rate]"
																													value="0">

																												<select
																													id="hotfac<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][hotfac]"
																													class="form-control input-sm hotel_fac_change"
																													data-id="<?php echo $iti_id; ?>"
																													style="display:none;">
																													<option
																														value="">
																														Select
																													</option>

																												</select>

																												<input type="hidden"
																													id="fac_rate<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][fac_rate]"
																													value="0">
																												<textarea
																													id="remarks<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][remarks]"
																													style="display:none;"></textarea>
																												<input type="hidden"
																													id="acc_total<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][acc_total]"
																													class="form-control input-sm"
																													value="0">
																												<button
																													type="button"
																													class="btn btn-success btn-sm add_hotel"
																													data-mp="<?php echo $ttval['meal_plan_id']; ?>"
																													data-tl="<?php echo $ttval['tour_location']; ?>"
																													data-td="<?php echo $startDate1->format('Y-m-d'); ?>"
																													data-id="<?php echo $iti_id; ?>"
																													data-oid="<?php echo $iti_id; ?>"
																													data-hid="<?= htmlspecialchars(json_encode($ttval['hotel_list']), ENT_QUOTES, 'UTF-8') ?>"
																													<?php echo $dis_abled; ?>
																													style="display:none">Add
																													<i
																														class="fa fa-plus ml-2"></i></button>
																												<div class="row"
																													style="display:none;">
																													<div class="col-xl-12"
																														id="hotel_dynamic_fields<?php echo $iti_id; ?>">



																													</div>
																												</div>
																											<?php } else { ?>

																												<div
																													class="row mt-2">

																													<div
																														class="col-xl-12 col-sm-12 col-md-12">
																														<!-- <h4 style="font-weight:bold;font-size:20px;color:#004d00;text-align:center;">Day <?php echo $day_count; ?> - <?php echo $ttval['geog_name']; ?> (Meal Plan : <?php echo $ttval['meal_type_name']; ?>)</h4> -->
																														<h4
																															style="font-weight:bold;font-size:20px;color:#004d00;text-align:center;">
																															Day
																															<?php echo $day_count; ?>
																															-
																															<?php echo $ttval['geog_name']; ?>
																														</h4>
																													</div>

																												</div>

																												<div
																													class="row mt-2">




																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Hotel</label>
																														</div>
																														<span
																															class="text-muted">
																															<select
																																id="hotelid<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][hotelid]"
																																data-id="<?php echo $iti_id; ?>"
																																readonly
																																class="form-control input-sm hotel_change"
																																required
																																<?php echo $dis_abled; ?>>
																																<option
																																	value="">
																																	Select
																																</option>
																																<?php foreach ($ttval['hotel_list'] as $key => $val) {
																																	if ($val['hotel_id'] == $hotel_exist) {
																																?>
																																		<option
																																			value="<?php echo $val['hotel_id']; ?>"
																																			selected>
																																			<?php echo $val['object_name']; ?>
																																		</option>
																																	<?php } else { ?>
																																		<option
																																			value="<?php echo $val['hotel_id']; ?>">
																																			<?php echo $val['object_name']; ?>
																																		</option>
																																<?php }
																																} ?>

																																<?php if ($hotel_exist == 0) { ?>
																																	<option
																																		value="0"
																																		selected>
																																		Own
																																		Arrangements
																																	</option>
																																<?php } else { ?>
																																	<option
																																		value="0">
																																		Own
																																		Arrangements
																																	</option>
																																<?php } ?>
																															</select>
																														</span>
																													</div>



																													<!-- <div class="col-xl-2 col-sm-12 col-md-2">
																														<div class="teams-rank"><label class="small-label">Room Category</label></div>
																														<select id="roomcat<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][roomcat]" data-id="<?php echo $iti_id; ?>" data-sid="1" readonly class="form-control input-sm room_cat_change" required <?php echo $dis_abled; ?>>
																															<option value="">Select</option>
																															<?php foreach ($room_cat_list_draft as $key => $val) {
																																if ($val['room_category_id'] == $room_cat_exist) {
																															?>
																																	<option value="<?php echo $val['room_category_id']; ?>" selected><?php echo $val['room_category_name']; ?></option>
																																<?php } else { ?>
																																	<option value="<?php echo $val['room_category_id']; ?>"><?php echo $val['room_category_name']; ?></option>
																															<?php }
																															} ?>


																															<?php if ($room_cat_exist == 0) { ?>
																																<option value="0" selected>Own Arrangements</option>
																															<?php } else { ?>
																																<option value="0">Own Arrangements</option>
																															<?php } ?>
																														</select>

																													</div> -->
																													<!-- Hidden Room Category Dropdown -->
																													<input
																														type="hidden"
																														id="roomcat<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][roomcat]"
																														data-id="<?php echo $iti_id; ?>"
																														data-sid="1"
																														value="<?php echo $room_cat_exist; ?>">

																													<!-- New Room Count Display Field -->
																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">No
																																Of
																																Rooms</label>
																														</div>
																														<?php
																														// Calculate total rooms
																														$total_rooms = $object_det[0]['no_of_double_room'] + $object_det[0]['no_of_single_room'];

																														// Build display text
																														$room_text_parts = array();
																														if ($object_det[0]['no_of_double_room'] > 0) {
																															$room_text_parts[] = $object_det[0]['no_of_double_room'] . ' D';
																														}
																														if ($object_det[0]['no_of_single_room'] > 0) {
																															$room_text_parts[] = $object_det[0]['no_of_single_room'] . ' S';
																														}
																														$room_display_text = !empty($room_text_parts) ? implode(' + ', $room_text_parts) : '0';
																														?>
																														<input
																															type="text"
																															id="room_count_display<?php echo $iti_id; ?>"
																															value="<?php echo $total_rooms; ?> (<?php echo $room_display_text; ?>)"
																															class="form-control input-sm"
																															readonly
																															style="background-color: #f5f5f5; font-weight: bold;">
																													</div>


																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">No
																																Of
																																Adult</label>
																														</div>
																														<input
																															type="text"
																															id="no_of_adult<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][no_of_adult]"
																															value="<?php echo $object_det[0]['no_of_adult']; ?>"
																															class="form-control input-sm"
																															maxlength="2"
																															readonly>
																													</div>
																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">C.With
																																Bed
																																Qty</label>
																														</div>
																														<input
																															type="text"
																															id="no_of_ch<?php echo $iti_id; ?>"
																															data-id="<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][no_of_ch]"
																															value="<?php echo $child_with_bed; ?>"
																															class="form-control input-sm"
																															maxlength="2"
																															readonly
																															required
																															<?php echo $read_only; ?>>
																													</div>
																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">C.Without
																																Bed
																																Qty</label>
																														</div>
																														<input
																															type="text"
																															id="no_of_cw<?php echo $iti_id; ?>"
																															data-id="<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][no_of_cw]"
																															value="<?php echo $child_without_bed; ?>"
																															class="form-control input-sm"
																															maxlength="2"
																															readonly
																															required
																															<?php echo $read_only; ?>>
																													</div>
																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Extra
																																Bed
																																Qty</label>
																														</div>
																														<input
																															type="text"
																															id="no_of_extra<?php echo $iti_id; ?>"
																															data-id="<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][no_of_extra]"
																															value="<?php echo $extra_bed; ?>"
																															class="form-control input-sm"
																															maxlength="2"
																															readonly
																															required
																															<?php echo $read_only; ?>>
																													</div>

																												</div>

																												<div
																													class="row mt-2 double_row">
																													<div
																														class="col-xl-1 col-sm-12 col-md-1">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Room
																																Type</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Room
																																Category</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-1 col-sm-12 col-md-1">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Meal
																																Plan</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-1 col-sm-12 col-md-1">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">No
																																Of
																																Rooms</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Daily
																																Room
																																Rate</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">C.With
																																Bed
																																Rate</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-2 col-sm-12 col-md-2">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">C.Without
																																Bed
																																Rate</label>
																														</div>
																													</div>

																													<div
																														class="col-xl-1 col-sm-12 col-md-1">
																														<div
																															class="teams-rank">
																															<label
																																class="small-label">Extra
																																Bed
																																Rate</label>
																														</div>
																													</div>
																												</div>

																												<!-- PRIORITY LOGIC: Check itinerary_expansion_details FIRST, then fallback to tour_expansion_details -->
																												<?php
																												$day_expansions = array();
																												$data_source = 'none'; // Initialize to prevent undefined variable error

																												// PRIORITY 1: Check itinerary_expansion_details first (saved/draft itinerary data from khm_obj_enquiry_tour_itinerary_expansion)
																												if (!empty($itinerary_expansion_details) && isset($itinerary_expansion_details[$ttval['tour_details_id']])) {
																													foreach ($itinerary_expansion_details[$ttval['tour_details_id']] as $exp) {
																														if ($exp['tour_expansion_date'] == $startDate1->format('Y-m-d')) {
																															$day_expansions[] = $exp;
																															$data_source = 'itinerary'; // Mark source as itinerary table
																														}
																													}
																												}

																												// FALLBACK: If no itinerary expansion data, use tour_expansion_details (initial tour plan from khm_obj_enquiry_tour_expansion)
																												if (empty($day_expansions) && isset($tour_expansion_details[$ttval['tour_details_id']])) {
																													foreach ($tour_expansion_details[$ttval['tour_details_id']] as $exp) {
																														if ($exp['tour_expansion_date'] == $startDate1->format('Y-m-d')) {
																															$day_expansions[] = $exp;
																															$data_source = 'tour'; // Mark source as tour table
																														}
																													}
																												}

																												// Calculate totals from expansion data
																												$expansion_hotel_total = 0;
																												$double_expansions = array();
																												$single_expansions = array();

																												if (!empty($day_expansions)) {
																													foreach ($day_expansions as $exp) {
																														$expansion_hotel_total += (int)($exp['double_total_rate'] ?? 0) + (int)($exp['single_total_rate'] ?? 0);

																														// FIXED: Check if record is for DOUBLE room (regardless of rate value)
																														// A record is for double room if it has double_total_rate OR room_rate_double field present
																														$double_total = (int)($exp['double_total_rate'] ?? 0);
																														$double_rate = (int)($exp['room_rate_double'] ?? 0);
																														$single_total = (int)($exp['single_total_rate'] ?? 0);
																														$single_rate = (int)($exp['room_rate_single'] ?? 0);

																														// Add to double if it has any double-specific value > 0
																														// OR if it has double fields but single is zero (it's a double-only record)
																														if (
																															$double_total > 0 || $double_rate > 0 ||
																															(($double_total >= 0 || $double_rate >= 0) && $single_total == 0 && $single_rate == 0)
																														) {
																															$double_expansions[] = $exp;
																														}

																														// Add to single if it has any single-specific value > 0
																														if ($single_total > 0 || $single_rate > 0) {
																															$single_expansions[] = $exp;
																														}
																													}
																												}

																												$tac_base = $expansion_hotel_total + $hot_fac_tariff;
																												$tac = $tac_base;

																												// SIMPLIFIED: Use dynamic mode if we have expansion data
																												$use_dynamic = !empty($day_expansions);

																												// Prepare row data based on BOOKINGS and expansion data
																												if ($use_dynamic) {
																													// For DOUBLE rooms: get the number we need based on booking
																													$double_needed = (int)$object_det[0]['no_of_double_room'];
																													$double_rows = array();

																													if ($double_needed > 0) {
																														if (!empty($double_expansions)) {
																															// Use actual expansion records
																															$double_rows = $double_expansions;

																															// If we have fewer expansion records than needed, duplicate the last one
																															while (count($double_rows) < $double_needed) {
																																$double_rows[] = end($double_expansions);
																															}

																															// If we have more expansion records than needed, trim them
																															if (count($double_rows) > $double_needed) {
																																$double_rows = array_slice($double_rows, 0, $double_needed);
																															}
																														} else {
																															// No specific double expansions, create from day expansions
																															for ($i = 0; $i < $double_needed; $i++) {
																																$double_rows[] = !empty($day_expansions) ? $day_expansions[0] : array();
																															}
																														}
																													}

																													// For SINGLE rooms: get the number we need based on booking
																													$single_needed = (int)$object_det[0]['no_of_single_room'];
																													$single_rows = array();

																													if ($single_needed > 0) {
																														if (!empty($single_expansions)) {
																															// Use actual expansion records
																															$single_rows = $single_expansions;

																															// If we have fewer expansion records than needed, duplicate the last one
																															while (count($single_rows) < $single_needed) {
																																$single_rows[] = end($single_expansions);
																															}

																															// If we have more expansion records than needed, trim them
																															if (count($single_rows) > $single_needed) {
																																$single_rows = array_slice($single_rows, 0, $single_needed);
																															}
																														} else {
																															// No specific single expansions, create from day expansions
																															for ($i = 0; $i < $single_needed; $i++) {
																																$single_rows[] = !empty($day_expansions) ? end($day_expansions) : array();
																															}
																														}
																													}
																												} else {
																													// Static mode - no expansion data at all
																													$double_rows = array();
																													$single_rows = array();
																												}

																												// Debug output (remove in production)
																												echo "<!-- Debug Info: Data Source=" . $data_source . ", Use Dynamic=" . ($use_dynamic ? 'YES' : 'NO') . ", Double Rows=" . count($double_rows) . ", Single Rows=" . count($single_rows) . ", Day Expansions=" . count($day_expansions) . " -->";
																												?>

																												<!-- HEADER ROW FOR ROOM DETAILS -->
																												<!-- <div class="row mt-2 double_row">
																														<div class="col-xl-1 col-sm-12 col-md-1">
																															<div class="teams-rank"><label class="small-label">Room Type</label></div>
																														</div>
																														<div class="col-xl-2 col-sm-12 col-md-2">
																															<div class="teams-rank"><label class="small-label">Room Category</label></div>
																														</div>
																														<div class="col-xl-1 col-sm-12 col-md-1">
																															<div class="teams-rank"><label class="small-label">Meal Plan</label></div>
																														</div>
																														<div class="col-xl-1 col-sm-12 col-md-1">
																															<div class="teams-rank"><label class="small-label">No Of Rooms</label></div>
																														</div>
																														<div class="col-xl-2 col-sm-12 col-md-2">
																															<div class="teams-rank"><label class="small-label">Daily Room Rate</label></div>
																														</div>
																														<div class="col-xl-2 col-sm-12 col-md-2">
																															<div class="teams-rank"><label class="small-label">C.With Bed Rate</label></div>
																														</div>
																														<div class="col-xl-2 col-sm-12 col-md-2">
																															<div class="teams-rank"><label class="small-label">C.Without Bed Rate</label></div>
																														</div>
																														<div class="col-xl-1 col-sm-12 col-md-1">
																															<div class="teams-rank"><label class="small-label">Extra Bed Rate</label></div>
																														</div>
																															</div> -->

																												<!-- DOUBLE ROOM ROWS SECTION -->
																												<!-- DOUBLE ROOM ROWS SECTION -->
																												<?php if ($object_det[0]['no_of_double_room'] > 0 && $use_dynamic && !empty($double_rows)) { ?>
																													<?php
																													// DYNAMIC MODE: Multiple rows from expansion data
																													foreach ($double_rows as $d_index => $d_exp) {
																														$d_room_no = 1;
																														$d_room_tariff = !empty($d_exp) ? (int) ($d_exp['room_rate_double'] ?? $d_room_tariff) : $d_room_tariff;
																														$d_child_tariff = !empty($d_exp) ? (int) ($d_exp['child_with_bed_double'] ?? $d_child_tariff) : $d_child_tariff;
																														$d_child_wb_tariff = !empty($d_exp) ? (int) ($d_exp['child_without_bed_double'] ?? $d_child_wb_tariff) : $d_child_wb_tariff;
																														$d_extra_tariff = !empty($d_exp) ? (int) ($d_exp['extra_bed_double'] ?? $d_extra_tariff) : $d_extra_tariff;
																														$d_room_cat = !empty($d_exp) ? ($d_exp['room_category_id'] ?? $room_cat_exist) : $room_cat_exist;
																														$d_meal_plan = !empty($d_exp) ? ($d_exp['meal_plan_id'] ?? $ttval['meal_plan_id']) : $ttval['meal_plan_id'];

																														// Get room category name
																														$d_room_cat_name = '';
																														foreach ($room_cat_list_draft as $key => $val) {
																															if ($val['room_category_id'] == $d_room_cat) {
																																$d_room_cat_name = $val['room_category_name'];
																																break;
																															}
																														}

																														// FIXED (Robust): Resolve meal plan name dynamically from $meal_plans array with key fallbacks
																														$d_meal_plan_name = $ttval['meal_type_name']; // Default fallback
																														if (!empty($meal_plans)) {
																															foreach ($meal_plans as $mp) {
																																// Handle array or object structure
																																$mp_id = is_array($mp) ? ($mp['meal_plan_id'] ?? 0) : ($mp->meal_plan_id ?? 0);
																																if ((int)$mp_id === (int)$d_meal_plan) {
																																	// Try common keys in order
																																	$d_meal_plan_name = is_array($mp) ? ($mp['meal_type_name'] ?? ($mp['name'] ?? ($mp['meal_plan_name'] ?? ''))) : ($mp->meal_type_name ?? ($mp->name ?? ($mp->meal_plan_name ?? '')));
																																	break;
																																}
																															}
																														}


																													?>
																														<div
																															class="row mt-2 double_row">
																															<input
																																type="hidden"
																																id="d_room_cat_<?php echo $iti_id . '_' . $d_index; ?>"
																																name="additi[<?php echo $iti_id; ?>][d_room_cat][<?php echo $d_index; ?>]"
																																class="d_room_cat_hidden"
																																value="<?php echo $d_room_cat; ?>">
																															<input
																																type="hidden"
																																id="d_meal_plan_<?php echo $iti_id . '_' . $d_index; ?>"
																																name="additi[<?php echo $iti_id; ?>][d_meal_plan][<?php echo $d_index; ?>]"
																																class="d_meal_plan_hidden"
																																value="<?php echo $d_meal_plan; ?>">

																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	value="Double"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	value="<?php echo $d_room_cat_name; ?>"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	value="<?php echo $d_meal_plan_name; ?>"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	id="double_<?php echo $iti_id . '_' . $d_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][double][<?php echo $d_index; ?>]"
																																	value="<?php echo $d_room_no; ?>"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	id="d_adult_rate_<?php echo $iti_id . '_' . $d_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][d_adult_rate][<?php echo $d_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	readonly
																																	value="<?php echo $d_room_tariff; ?>"
																																	required
																																	<?php echo $read_only; ?>>
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	id="d_child_rate_<?php echo $iti_id . '_' . $d_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][d_child_rate][<?php echo $d_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	readonly
																																	value="<?php echo $d_child_tariff; ?>"
																																	required
																																	<?php echo $read_only; ?>>
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	id="d_child_wb_rate_<?php echo $iti_id . '_' . $d_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][d_child_wb_rate][<?php echo $d_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	readonly
																																	value="<?php echo $d_child_wb_tariff; ?>"
																																	required
																																	<?php echo $read_only; ?>>
																															</div>
																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	id="d_extra_bed_rate_<?php echo $iti_id . '_' . $d_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][d_extra_bed_rate][<?php echo $d_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	readonly
																																	value="<?php echo $d_extra_tariff; ?>"
																																	required
																																	<?php echo $read_only; ?>>
																															</div>
																														</div>
																													<?php } ?>
																												<?php } elseif ($object_det[0]['no_of_double_room'] > 0) { ?>
																													<!-- STATIC MODE: Single row -->
																													<div
																														class="row mt-2 double_row">
																														<input
																															type="hidden"
																															id="d_room_cat_<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][d_room_cat][0]"
																															class="d_room_cat_hidden"
																															value="<?php echo $room_cat_exist; ?>">
																														<input
																															type="hidden"
																															id="d_meal_plan_<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][d_meal_plan][0]"
																															class="d_meal_plan_hidden"
																															value="<?php echo $ttval['meal_plan_id']; ?>">

																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																value="Double"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<?php
																															$static_room_cat_name = '';
																															foreach ($room_cat_list_draft as $key => $val) {
																																if ($val['room_category_id'] == $room_cat_exist) {
																																	$static_room_cat_name = $val['room_category_name'];
																																	break;
																																}
																															}
																															?>
																															<input
																																type="text"
																																value="<?php echo $static_room_cat_name; ?>"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																value="<?php echo $ttval['meal_type_name']; ?>"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																id="double<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][double]"
																																value="<?php echo $double_room; ?>"
																																readonly
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<input
																																type="text"
																																id="d_adult_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][d_adult_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																readonly
																																value="<?php echo $d_room_tariff; ?>"
																																required
																																<?php echo $read_only; ?>>
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<input
																																type="text"
																																id="d_child_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][d_child_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																readonly
																																value="<?php echo $d_child_tariff; ?>"
																																required
																																<?php echo $read_only; ?>>
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<input
																																type="text"
																																id="d_child_wb_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][d_child_wb_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																readonly
																																value="<?php echo $d_child_wb_tariff; ?>"
																																required
																																<?php echo $read_only; ?>>
																														</div>
																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																id="d_extra_bed_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][d_extra_bed_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																readonly
																																value="<?php echo $d_extra_tariff; ?>"
																																required
																																<?php echo $read_only; ?>>
																														</div>
																													</div>
																												<?php } else { ?>
																													<!-- NO DOUBLE ROOMS -->
																													<input type="hidden"
																														id="double<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][double]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="d_adult_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][d_adult_rate]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="d_child_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][d_child_rate]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="d_child_wb_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][d_child_wb_rate]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="d_extra_bed_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][d_extra_bed_rate]"
																														value="0"
																														readonly>
																												<?php } ?>

																												<!-- SINGLE ROOM ROWS SECTION - KEEP ONLY THIS ONE -->
																												<?php if ($object_det[0]['no_of_single_room'] > 0 && $use_dynamic && !empty($single_rows)) { ?>
																													<?php
																													// DYNAMIC MODE: Multiple rows from expansion data
																													foreach ($single_rows as $s_index => $s_exp) {
																														$s_room_no = 1;
																														$s_room_tariff = !empty($s_exp) ? (int) ($s_exp['room_rate_single'] ?? $s_room_tariff) : $s_room_tariff;
																														$s_child_tariff = !empty($s_exp) ? (int) ($s_exp['child_with_bed_single'] ?? 0) : 0;
																														$s_child_wb_tariff = !empty($s_exp) ? (int) ($s_exp['child_without_bed_single'] ?? 0) : 0;
																														$s_extra_tariff = !empty($s_exp) ? (int) ($s_exp['extra_bed_single'] ?? 0) : 0;
																														$s_room_cat = !empty($s_exp) ? ($s_exp['room_category_id'] ?? $room_cat_exist) : $room_cat_exist;
																														$s_meal_plan = !empty($s_exp) ? ($s_exp['meal_plan_id'] ?? $ttval['meal_plan_id']) : $ttval['meal_plan_id'];

																														// Get room category name
																														$s_room_cat_name = '';
																														foreach ($room_cat_list_draft as $key => $val) {
																															if ($val['room_category_id'] == $s_room_cat) {
																																$s_room_cat_name = $val['room_category_name'];
																																break;
																															}
																														}

																														$s_meal_plan_name = $ttval['meal_type_name']; // Default fallback
																														if (!empty($meal_plans)) {
																															foreach ($meal_plans as $mp) {
																																// Handle array or object structure
																																$mp_id = is_array($mp) ? ($mp['meal_plan_id'] ?? 0) : ($mp->meal_plan_id ?? 0);
																																if ((int)$mp_id === (int)$s_meal_plan) {
																																	// Try common keys in order
																																	$s_meal_plan_name = is_array($mp) ? ($mp['meal_type_name'] ?? ($mp['name'] ?? ($mp['meal_plan_name'] ?? ''))) : ($mp->meal_type_name ?? ($mp->name ?? ($mp->meal_plan_name ?? '')));
																																	break;
																																}
																															}
																														}
																														// Debug (remove in production): Reuse the same script for single (only once)

																													?>
																														<div
																															class="row mt-2 single_row">
																															<input
																																type="hidden"
																																id="s_room_cat_<?php echo $iti_id . '_' . $s_index; ?>"
																																name="additi[<?php echo $iti_id; ?>][s_room_cat][<?php echo $s_index; ?>]"
																																class="s_room_cat_hidden"
																																value="<?php echo $s_room_cat; ?>">
																															<input
																																type="hidden"
																																id="s_meal_plan_<?php echo $iti_id . '_' . $s_index; ?>"
																																name="additi[<?php echo $iti_id; ?>][s_meal_plan][<?php echo $s_index; ?>]"
																																class="s_meal_plan_hidden"
																																value="<?php echo $s_meal_plan; ?>">

																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	value="Single"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	value="<?php echo $s_room_cat_name; ?>"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	value="<?php echo $s_meal_plan_name; ?>"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	id="single_<?php echo $iti_id . '_' . $s_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][single][<?php echo $s_index; ?>]"
																																	value="<?php echo $s_room_no; ?>"
																																	class="form-control input-sm"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	id="s_adult_rate_<?php echo $iti_id . '_' . $s_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][s_adult_rate][<?php echo $s_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	readonly
																																	value="<?php echo $s_room_tariff; ?>"
																																	required
																																	<?php echo $read_only; ?>>
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	id="s_child_rate_<?php echo $iti_id . '_' . $s_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][s_child_rate][<?php echo $s_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	value="<?php echo $s_child_tariff; ?>"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-2 col-sm-12 col-md-2">
																																<input
																																	type="text"
																																	id="s_child_wb_rate_<?php echo $iti_id . '_' . $s_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][s_child_wb_rate][<?php echo $s_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	value="<?php echo $s_child_wb_tariff; ?>"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																															<div
																																class="col-xl-1 col-sm-12 col-md-1">
																																<input
																																	type="text"
																																	id="s_extra_bed_rate_<?php echo $iti_id . '_' . $s_index; ?>"
																																	data-id="<?php echo $iti_id; ?>"
																																	name="additi[<?php echo $iti_id; ?>][s_extra_bed_rate][<?php echo $s_index; ?>]"
																																	class="form-control input-sm"
																																	maxlength="6"
																																	value="<?php echo $s_extra_tariff; ?>"
																																	readonly
																																	style="background-color: #f5f5f5;">
																															</div>
																														</div>
																													<?php } ?>
																												<?php } elseif ($object_det[0]['no_of_single_room'] > 0) { ?>
																													<!-- STATIC MODE: Single row -->
																													<div
																														class="row mt-2 single_row">
																														<input
																															type="hidden"
																															id="s_room_cat_<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][s_room_cat][0]"
																															class="s_room_cat_hidden"
																															value="<?php echo $room_cat_exist; ?>">
																														<input
																															type="hidden"
																															id="s_meal_plan_<?php echo $iti_id; ?>"
																															name="additi[<?php echo $iti_id; ?>][s_meal_plan][0]"
																															class="s_meal_plan_hidden"
																															value="<?php echo $ttval['meal_plan_id']; ?>">

																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																value="Single"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<?php
																															$static_s_room_cat_name = '';
																															foreach ($room_cat_list_draft as $key => $val) {
																																if ($val['room_category_id'] == $room_cat_exist) {
																																	$static_s_room_cat_name = $val['room_category_name'];
																																	break;
																																}
																															}
																															?>
																															<input
																																type="text"
																																value="<?php echo $static_s_room_cat_name; ?>"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																value="<?php echo $ttval['meal_type_name']; ?>"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																id="single<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][single]"
																																value="<?php echo $single_room; ?>"
																																class="form-control input-sm"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<input
																																type="text"
																																id="s_adult_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][s_adult_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																readonly
																																value="<?php echo $s_room_tariff; ?>"
																																required
																																<?php echo $read_only; ?>>
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<input
																																type="text"
																																id="s_child_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][s_child_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																value="0"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-2 col-sm-12 col-md-2">
																															<input
																																type="text"
																																id="s_child_wb_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][s_child_wb_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																value="0"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																														<div
																															class="col-xl-1 col-sm-12 col-md-1">
																															<input
																																type="text"
																																id="s_extra_bed_rate<?php echo $iti_id; ?>"
																																data-id="<?php echo $iti_id; ?>"
																																name="additi[<?php echo $iti_id; ?>][s_extra_bed_rate]"
																																class="form-control input-sm"
																																maxlength="6"
																																value="0"
																																readonly
																																style="background-color: #f5f5f5;">
																														</div>
																													</div>
																												<?php } else { ?>
																													<!-- NO SINGLE ROOMS -->
																													<input type="hidden"
																														id="single<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][single]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="s_adult_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][s_adult_rate]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="s_child_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][s_child_rate]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="s_child_wb_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][s_child_wb_rate]"
																														value="0"
																														readonly>
																													<input type="hidden"
																														id="s_extra_bed_rate<?php echo $iti_id; ?>"
																														name="additi[<?php echo $iti_id; ?>][s_extra_bed_rate]"
																														value="0"
																														readonly>
																												<?php } ?>



																										</div>
																										<?php
																												$cur_fac = $Enquiry_model->getHotelFacilitybyhotelid($hotel_exist);
																										?>
																										<div
																											class="row mt-2 single_row">

																											<div
																												class="col-xl-4 col-sm-12 col-md-4">
																												<div
																													class="teams-rank">
																													<label
																														class="small-label">Hotel
																														Facility</label>
																												</div>
																												<select
																													id="hotfac<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][hotfac]"
																													class="form-control input-sm hotel_fac_change_new"
																													data-id="<?php echo $iti_id; ?>"
																													data-std="<?php echo $startDate1->format('Y-m-d'); ?>"
																													<?php echo $dis_abled; ?>>
																													<option
																														value="">
																														Select
																													</option>
																													<?php foreach ($cur_fac as $ckey => $cval): ?>
																														<option
																															value="<?php echo $cval['hotel_facility_id']; ?>">
																															<?php echo $cval['facility_name']; ?>
																														</option>
																													<?php endforeach; ?>
																												</select>
																											</div>


																											<div
																												class="col-xl-2 col-sm-12 col-md-2">
																												<div
																													class="teams-rank">
																													<label
																														class="small-label">Total
																														Facility
																														Rate</label>
																												</div>
																												<input
																													type="text"
																													id="fac_rate<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][fac_rate]"
																													class="form-control input-sm"
																													maxlength="6"
																													value="<?php echo $hot_fac_tariff; ?>"
																													readonly>
																											</div>

																											<div
																												class="col-xl-4 col-sm-12 col-md-4">
																												<div
																													class="teams-rank">
																													<label
																														class="small-label">Remarks</label>
																												</div>
																												<textarea
																													id="remarks<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][remarks]"
																													class="form-control"
																													rows="1"
																													<?php echo $read_only; ?>><?php echo $remarks; ?></textarea>
																											</div>

																											<div
																												class="col-xl-1 col-sm-12 col-md-1">
																												<div
																													class="teams-rank">
																													<label
																														class="small-label">Total</label>
																												</div>
																												<input
																													type="text"
																													id="acc_total<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][acc_total]"
																													class="form-control input-sm"
																													value="<?php echo $tac; ?>"
																													readonly>
																											</div>
																											<div class="col-xl-1 col-sm-12 col-md-1"
																												style="padding-top:20px;">
																												<button
																													type="button"
																													class="btn btn-success btn-sm add_hotel"
																													data-mp="<?php echo $ttval['meal_plan_id']; ?>"
																													data-tl="<?php echo $ttval['tour_location']; ?>"
																													data-td="<?php echo $startDate1->format('Y-m-d'); ?>"
																													data-id="<?php echo $iti_id; ?>"
																													data-oid="<?php echo $iti_id; ?>"
																													data-hid="<?= htmlspecialchars(json_encode($ttval['hotel_list']), ENT_QUOTES, 'UTF-8') ?>"
																													<?php echo $dis_abled; ?>>Add <i
																														class="fa fa-plus ml-2"></i></button>
																											</div>
																										</div>

																										<div class="row">
																											<div class="col-xl-12"
																												id="addon_add_dynamic<?php echo $iti_id; ?>">



																											</div>
																										</div>

																										<div class="row">
																											<div class="col-xl-12"
																												id="hotel_dynamic_fields<?php echo $iti_id; ?>">



																											</div>
																										</div>
																									<?php } ?>
																									<?php
																									if ($use_dynamic && !empty($day_expansions)) {
																										$first_exp = $day_expansions[0];
																										$vehicle_details = json_decode($first_exp['vehicle_details_json']);

																										// Add safety check
																										if (!is_array($vehicle_details) && !is_object($vehicle_details)) {
																											$vehicle_details = [];
																										}
																									}
																									?>

																									<?php if ($object_det[0]['is_vehicle_required'] == 1) { ?>
																										<?php
																										$newdateObj = DateTime::createFromFormat('d-m-Y', $object_det[0]['end_date']);
																										$newdateObj->modify('-1 day');
																										$newendDate = $newdateObj->format('d-m-Y');
																										$newdateObj1 = DateTime::createFromFormat('d-m-Y', $object_det[0]['start_date']);
																										$newendDate1 = $newdateObj1->format('d-m-Y');

																										// FIXED: Properly expand vehicles based on vehicle_count
																										$expanded_vehicles = [];
																										$veh_header_value = '';

																										if (!empty($vehicle_details)) {
																											foreach ($vehicle_details as $vindex => $vmodel) {
																												// Get the count for this vehicle (default to 1 if not set)
																												$vehicle_count = isset($vmodel->vehicle_count) ? (int)$vmodel->vehicle_count : 1;

																												// Expand this vehicle into multiple instances based on count
																												for ($i = 0; $i < $vehicle_count; $i++) {
																													$expanded_vehicles[] = $vmodel;
																												}

																												// Get header from first vehicle
																												if ($vindex == 0) {
																													if ($ttkey == $tpd_count) {
																														if ($cnt1 == 0) {
																															if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) {
																																$pre_to_cur = isset($vmodel->pre_to_cur) ? $vmodel->pre_to_cur : 0;
																																$cur_to_dep = isset($vmodel->cur_to_dep) ? $vmodel->cur_to_dep : 0;
																																$dep_to_arr = isset($vmodel->dep_to_arr) ? $vmodel->dep_to_arr : 0;
																																$veh_header_value = " (Previous Location to Current Location - " . $pre_to_cur . "KM, Location to Departure - " . $cur_to_dep . "KM, Departure to Hub Location - " . $dep_to_arr . "KM)";
																															} else if ($startDate1->format('d-m-Y') == $newendDate1) {
																																$hub_to_arr = isset($vmodel->hub_to_arr) ? $vmodel->hub_to_arr : 0;
																																$arr_to_loc = isset($vmodel->arr_to_loc) ? $vmodel->arr_to_loc : 0;
																																$veh_header_value = " (Hub Location to Arrival - " . $hub_to_arr . "KM, Arrival to Location - " . $arr_to_loc . "KM)";
																															} else {
																																$pre_to_cur = isset($vmodel->pre_to_cur) ? $vmodel->pre_to_cur : 0;
																																$veh_header_value = " (Previous Location to Current Location - " . $pre_to_cur . "KM)";
																															}
																														} else {
																															if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) {
																																$cur_to_dep = isset($vmodel->cur_to_dep) ? $vmodel->cur_to_dep : 0;
																																$dep_to_arr = isset($vmodel->dep_to_arr) ? $vmodel->dep_to_arr : 0;
																																$veh_header_value = " (Location to Departure - " . $cur_to_dep . "KM, Departure to Hub Location - " . $dep_to_arr . "KM)";
																															} else {
																																$veh_header_value = " (Current location is same as previous location, Tour travel = 0 KM)";
																															}
																														}
																													} else {
																														if ($cnt1 == 0) {
																															$veh_header_value = isset($vmodel->veh_header) ? $vmodel->veh_header : '';
																														} else {
																															$veh_header_value = " (Current location is same as previous location, Tour travel = 0 KM)";
																														}
																													}
																												}
																											}
																										}

																										echo '<center><h5 style="padding-top:10px;">Vehicle Details' . $veh_header_value . '</h5></center>';
																										echo '<input type="hidden" id="veh_header' . $iti_id . '" name="additi[' . $iti_id . '][veh_header]" value="' . $veh_header_value . '">';
																										?>

																										<input type="hidden" id="veh_header<?php echo $iti_id; ?>" name="addloc[<?php echo $iti_id; ?>][veh_header]" value="">

																										<!-- Column Headers -->
																										<div class="row mt-2 single_row">
																											<div class="col-xl-1 col-sm-12 col-md-1"></div>
																											<div class="col-xl-3 col-sm-12 col-md-3">
																												<div class="teams-rank">
																													<label class="small-label">Vehicle Model</label>
																												</div>
																											</div>
																											<div class="col-xl-2 col-sm-12 col-md-2">
																												<div class="teams-rank">
																													<label class="small-label">Daily Rent</label>
																												</div>
																											</div>
																											<div class="col-xl-1 col-sm-12 col-md-1">
																												<div class="teams-rank">
																													<label class="small-label">Max KM/Day</label>
																												</div>
																											</div>
																											<div class="col-xl-1 col-sm-12 col-md-1">
																												<div class="teams-rank">
																													<label class="small-label">Distance</label>
																												</div>
																											</div>
																											<div class="col-xl-1 col-sm-12 col-md-1">
																												<div class="teams-rank">
																													<label class="small-label">Extra KM</label>
																												</div>
																											</div>
																											<div class="col-xl-1 col-sm-12 col-md-1">
																												<div class="teams-rank">
																													<label class="small-label">Ad Hoc Rate</label>
																												</div>
																											</div>
																											<div class="col-xl-2 col-sm-12 col-md-2">
																												<div class="teams-rank">
																													<label class="small-label">Total</label>
																												</div>
																											</div>
																										</div>

																										<?php
																										$grand_veh_total = 0;

																										// Group expanded vehicles by type to assign proper instance indices
																										$type_counters = [];

																										foreach ($expanded_vehicles as $global_vindex => $vmodel) {
																											$veh_type_id = isset($vmodel->veh_type_id) ? $vmodel->veh_type_id : '';

																											// Track instance number for this vehicle type
																											if (!isset($type_counters[$veh_type_id])) {
																												$type_counters[$veh_type_id] = 0;
																											}
																											$instance_index = $type_counters[$veh_type_id];
																											$type_counters[$veh_type_id]++;

																											// Create unique ID for this specific instance
																											$vid = $iti_id . $veh_type_id . "_" . $instance_index;

																											// Extract properties from model
																											$day_rent = isset($vmodel->day_rent) ? (float)$vmodel->day_rent : 0;
																											$max_km_day = isset($vmodel->max_km_day) ? (int)$vmodel->max_km_day : 0;
																											$extra_km_rate = isset($vmodel->extra_km_rate) ? (float)$vmodel->extra_km_rate : 0;
																											$vehicle_model = isset($vmodel->vehicle_model) ? $vmodel->vehicle_model : '';

																											// Distance calculation variables
																											$pre_to_cur = isset($vmodel->pre_to_cur) ? (float)$vmodel->pre_to_cur : 0;
																											$cur_to_dep = isset($vmodel->cur_to_dep) ? (float)$vmodel->cur_to_dep : 0;
																											$dep_to_arr = isset($vmodel->dep_to_arr) ? (float)$vmodel->dep_to_arr : 0;
																											$hub_to_arr = isset($vmodel->hub_to_arr) ? (float)$vmodel->hub_to_arr : 0;
																											$arr_to_loc = isset($vmodel->arr_to_loc) ? (float)$vmodel->arr_to_loc : 0;

																											// Determine if last day or second-last day
																											$is_last_day = ($startDate1->format('d-m-Y') == $object_det[0]['end_date']);
																											$is_second_last_day = false;

																											if (!$is_last_day) {
																												$next_date = clone $startDate1;
																												$next_date->modify('+1 day');
																												$is_second_last_day = ($next_date->format('d-m-Y') == $object_det[0]['end_date']);
																											}

																											// Get instance-specific values or defaults
																											$travel_distance = isset($vmodel->travel_distance) ? (float)$vmodel->travel_distance : 0;
																											$adhoc_rate_temp = isset($vmodel->adhoc_rate) ? (float)$vmodel->adhoc_rate : 0;
																											$checked = "checked";

																											// Split travel_distance based on day
																											$last_day_distance = $cur_to_dep + $dep_to_arr;

																											if ($is_last_day) {
																												$travel_distance_temp = $last_day_distance;
																											} elseif ($is_second_last_day) {
																												$travel_distance_temp = $travel_distance - $last_day_distance;
																											} else {
																												$travel_distance_temp = $travel_distance;
																											}

																											$travel_distance_copy = $travel_distance_temp;

																											// Compute extra kilometers
																											$extra_kilometer_temp = ($travel_distance_temp > $max_km_day) ? $travel_distance_temp - $max_km_day : 0;

																											// Calculate vehicle total
																											$veh_total_temp = $day_rent + ($extra_kilometer_temp * 0) + $adhoc_rate_temp;

																											// Override with draft/saved data if exists
																											if (!empty($itinerary_details_draft)) {
																												$checked = "checked";
																												if (!empty($d_vehicles)) {
																													foreach ($d_vehicles as $drkey => $drval) {
																														if ($drval->chk_vehicle_status == 1) {
																															$checked = "checked";
																														}
																														if ($vid == $drval->chk_vehicle) {
																															$travel_distance_temp = (float)$drval->travel_distance;
																															$adhoc_rate_temp = isset($drval->adhoc_rate) ? (float)$drval->adhoc_rate : $adhoc_rate_temp;
																															$extra_kilometer_temp = ($travel_distance_temp > $max_km_day) ? $travel_distance_temp - $max_km_day : 0;
																															$veh_total_temp = $day_rent + ($extra_kilometer_temp * 0) + $adhoc_rate_temp;
																														}
																													}
																												}
																											} elseif (!empty($previous_itinerary_details_save)) {
																												$checked = "checked";
																												foreach ($previous_itinerary_details_save as $p_key => $p_val) {
																													$iti_id_new = $p_val['tour_details_id'] . "_" . $startDate1->format('d-m-Y');
																													$vid_check = $iti_id_new . $veh_type_id . "_" . $instance_index;
																													$d_vehicle_details_pre = $p_val['vehicle_details'];
																													$d_vehicles_pre = json_decode($d_vehicle_details_pre);
																													if (!empty($d_vehicles_pre)) {
																														foreach ($d_vehicles_pre as $drk => $drv) {
																															if ($drv->chk_vehicle_status == 1) {
																																$checked = "checked";
																															}
																															if ($vid_check == $drv->chk_vehicle) {
																																$travel_distance_temp = $drv->travel_distance;
																																$adhoc_rate_temp = isset($drv->adhoc_rate) ? $drv->adhoc_rate : 0;
																																$extra_kilometer_temp = ($travel_distance_temp > $max_km_day) ? $travel_distance_temp - $max_km_day : 0;
																																$veh_total_temp = $day_rent + ($extra_kilometer_temp * 0) + $adhoc_rate_temp;
																															}
																														}
																													} else {
																														$checked = "";
																													}
																												}
																											}

																											// Force checked for tax status 1
																											if ($ttval['tax_status'] == 1) {
																												$checked = "checked";
																											}

																											$grand_veh_total += $veh_total_temp;
																										?>

																											<div class="row mt-2 single_row">
																												<div class="col-xl-1 col-sm-12 col-md-1">
																													<input type="hidden" name="additi[<?php echo $iti_id; ?>][chk_vehicle_value][<?php echo $vid; ?>]" value="<?php echo $vid; ?>">
																													<input type="hidden" name="additi[<?php echo $iti_id; ?>][chk_vehicle_hidden][<?php echo $vid; ?>]" value="1">
																													<input type="checkbox" id="chk_vehicle<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][chk_vehicle][<?php echo $vid; ?>]"
																														class="chk_vehicle" value="<?php echo $vid; ?>"
																														data-id="<?php echo $iti_id; ?>"
																														checked
																														<?php echo $checked; ?>
																														<?php echo $dis_abled; ?>>
																												</div>
																												<div class="col-xl-3 col-sm-12 col-md-3">
																													<input type="text" id="veh_model<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][veh_model][<?php echo $vid; ?>]"
																														value="<?php echo htmlspecialchars($vehicle_model); ?>"
																														class="form-control input-sm veh_model<?php echo $global_vindex; ?>" readonly>
																													<input type="hidden" id="veh_type_id<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][veh_type_id][<?php echo $vid; ?>]"
																														value="<?php echo $veh_type_id; ?>"
																														class="form-control input-sm veh_type_id<?php echo $global_vindex; ?>">
																													<input type="hidden" id="v_tour_date<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][v_tour_date][<?php echo $vid; ?>]"
																														value="<?php echo $startDate1->format('Y-m-d'); ?>">
																												</div>
																												<div class="col-xl-2 col-sm-12 col-md-2">
																													<input type="text" id="day_rent<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][day_rent][<?php echo $vid; ?>]"
																														value="<?php echo $day_rent; ?>"
																														class="form-control input-sm cls_daily day_rent<?php echo $global_vindex; ?>"
																														maxlength="5" readonly>
																												</div>
																												<div class="col-xl-1 col-sm-12 col-md-1">
																													<input type="text" id="max_km_day<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][max_km_day][<?php echo $vid; ?>]"
																														value="<?php echo $max_km_day; ?>"
																														class="form-control input-sm max_km_day<?php echo $global_vindex; ?>"
																														maxlength="5" readonly>
																												</div>
																												<div class="col-xl-1 col-sm-12 col-md-1">
																													<input type="text" id="travel_distance<?php echo $vid; ?>"
																														v_id="<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][travel_distance][<?php echo $vid; ?>]"
																														value="<?php echo $travel_distance_temp; ?>"
																														class="form-control input-sm"
																														data-base="<?php echo $travel_distance_temp; ?>" maxlength="5">
																													<input type="hidden" id="c_travel_distance_copy<?php echo $vid; ?>"
																														v_id="<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][c_travel_distance_copy][<?php echo $vid; ?>]"
																														value="<?php echo $travel_distance_copy; ?>"
																														class="form-control input-sm"
																														data-base="<?php echo $travel_distance_copy; ?>" maxlength="5">
																												</div>
																												<div class="col-xl-1 col-sm-12 col-md-1">
																													<input type="text" id="extra_kilometer<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][extra_kilometer][<?php echo $vid; ?>]"
																														value="<?php echo $extra_kilometer_temp; ?>"
																														class="form-control input-sm extra_kilometer<?php echo $global_vindex; ?>"
																														maxlength="5" readonly>
																												</div>
																												<input type="hidden" id="extra_km_rate<?php echo $vid; ?>"
																													name="additi[<?php echo $iti_id; ?>][extra_km_rate][<?php echo $vid; ?>]"
																													value="<?php echo $extra_km_rate; ?>"
																													class="form-control input-sm extra_km_rate<?php echo $global_vindex; ?>"
																													maxlength="5" readonly>
																												<input type="hidden" id="extra_km_rate_hidden<?php echo $vid; ?>"
																													name="additi[<?php echo $iti_id; ?>][extra_km_rate_hidden][<?php echo $vid; ?>]"
																													value="<?php echo $extra_km_rate; ?>">
																												<div class="col-xl-1 col-sm-12 col-md-1">
																													<?php if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) { ?>
																														<input type="text" id="adhoc_rate<?php echo $vid; ?>"
																															name="additi[<?php echo $iti_id; ?>][adhoc_rate][<?php echo $vid; ?>]"
																															data-vid="<?php echo $vid; ?>"
																															value="<?php echo $adhoc_rate_temp; ?>"
																															class="form-control input-sm adhoc_rate_input"
																															maxlength="5" <?php echo $read_only; ?>>
																													<?php } else { ?>
																														<input type="text" id="adhoc_rate<?php echo $vid; ?>"
																															name="additi[<?php echo $iti_id; ?>][adhoc_rate][<?php echo $vid; ?>]"
																															data-vid="<?php echo $vid; ?>"
																															value="0"
																															class="form-control input-sm"
																															maxlength="5" readonly style="background-color: #f5f5f5;">
																													<?php } ?>
																												</div>
																												<div class="col-xl-2 col-sm-12 col-md-2">
																													<input type="text" id="veh_total<?php echo $vid; ?>"
																														name="additi[<?php echo $iti_id; ?>][veh_total][<?php echo $vid; ?>]"
																														value="<?php echo $veh_total_temp; ?>"
																														class="form-control input-sm veh_total<?php echo $global_vindex; ?>"
																														maxlength="5" readonly>
																												</div>
																											</div>

																										<?php
																										}
																										?>

																									<?php } else { ?>
																										<!-- No vehicles required -->
																										<input type="hidden" id="veh_model<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][veh_model][0]" value="">
																										<input type="hidden" id="veh_type_id<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][veh_type_id][0]" value="">
																										<input type="hidden" id="v_tour_date<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][v_tour_date][0]" value="">
																										<input type="hidden" id="veh_count<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][veh_count][0]" value="0">
																										<input type="hidden" id="day_rent<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][day_rent][0]" value="0">
																										<input type="hidden" id="max_km_day<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][max_km_day][0]" value="0">
																										<input type="hidden" id="extra_km_rate<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][extra_km_rate][0]" value="0">
																										<input type="hidden" id="adhoc_rate<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][adhoc_rate][0]" value="0">
																										<input type="hidden" id="veh_total<?php echo $iti_id; ?>0" name="additi[<?php echo $iti_id; ?>][veh_total][0]" value="0">
																									<?php } ?>


																									<div
																										class="row mt-2 single_row">

																										<!-- <div class="col-xl-2 col-sm-12 col-md-2">
																											<div class="teams-rank"><label class="small-label">Sight Seeing</label></div>
																											<?php
																											$default_ss_distance = 0;
																											if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) {
																												$ss_default_temp = $dep_ss;
																											} else {
																												$ss_default_temp = $ttval['ss'];
																											}
																											if ($cnt1 == 0) {
																												$first_tour_location = $ttval['tour_location'] . "111";
																											?>
																												<select id="sight<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][sight]" class="form-control input-sm ss_change" data-id="<?php echo $iti_id; ?>" <?php echo $dis_abled; ?>>
																													<option value="<?php echo $first_tour_location; ?>"><?php echo $ttval['geog_name']; ?></option>
																													<?php foreach ($ss_default_temp as $skey => $sval) {
																														if ($sval['sightseeing_id'] == $sight_id) {
																													?>
																															<option value="<?php echo $sval['sightseeing_id']; ?>" selected><?php echo $sval['object_name']; ?></option>
																														<?php } else { ?>
																															<option value="<?php echo $sval['sightseeing_id']; ?>"><?php echo $sval['object_name']; ?></option>
																													<?php }
																													} ?>

																												</select>
																											<?php } else if ($cnt1 == 1) {
																												if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) {
																													$selected_last = "";
																												} else {
																													$selected_last = "selected";
																												}
																											?>
																												<select id="sight<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][sight]" class="form-control input-sm ss_change" data-id="<?php echo $iti_id; ?>" <?php echo $dis_abled; ?>>
																													<option value="">Select</option>
																													<?php foreach ($ss_default_temp as $skey => $sval) {
																														if ($sight_id > 0) {
																															if ($sval['sightseeing_id'] == $sight_id) {
																													?>
																																<option value="<?php echo $sval['sightseeing_id']; ?>" <?php echo $selected_last; ?>><?php echo $sval['object_name']; ?></option>
																															<?php } else { ?>
																																<option value="<?php echo $sval['sightseeing_id']; ?>"><?php echo $sval['object_name']; ?></option>
																															<?php }
																														} else {
																															if ($sval['is_default_ss'] == 1) {
																																$default_ss_distance = $sval['sightseeing_distance'];
																															?>
																																<option value="<?php echo $sval['sightseeing_id']; ?>" <?php echo $selected_last; ?>><?php echo $sval['object_name']; ?></option>
																															<?php } else { ?>
																																<option value="<?php echo $sval['sightseeing_id']; ?>"><?php echo $sval['object_name']; ?></option>
																													<?php }
																														}
																													} ?>

																												</select>
																											<?php } else { ?>
																												<select id="sight<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][sight]" class="form-control input-sm ss_change" data-id="<?php echo $iti_id; ?>" <?php echo $dis_abled; ?>>
																													<option value="">Select</option>
																													<?php foreach ($ss_default_temp as $skey => $sval) {
																														if ($sval['sightseeing_id'] == $sight_id) {
																													?>
																															<option value="<?php echo $sval['sightseeing_id']; ?>" selected><?php echo $sval['object_name']; ?></option>
																														<?php } else { ?>
																															<option value="<?php echo $sval['sightseeing_id']; ?>"><?php echo $sval['object_name']; ?></option>
																													<?php }
																													} ?>

																												</select>
																											<?php } ?>
																										</div>


																										<div class="col-xl-2 col-sm-12 col-md-2">
																											<div class="teams-rank"><label class="small-label">Distance</label></div>
																											<?php if ($cnt1 == 0) {
																											?>
																												<input type="text" id="ss_distance<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][ss_distance]" class="form-control input-sm cls_ss_distance" data-id="<?php echo $iti_id; ?>" maxlength="6" value="<?php echo $sight_tariff ? $sight_tariff : 0; ?>">
																												<?php } else if ($cnt1 == 1) {
																												if ($sight_id > 0) {
																												?>

																													<input type="text" id="ss_distance<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][ss_distance]" class="form-control input-sm cls_ss_distance" data-id="<?php echo $iti_id; ?>" maxlength="6" value="<?php echo $sight_tariff; ?>">
																												<?php } else { ?>
																													<input type="text" id="ss_distance<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][ss_distance]" class="form-control input-sm cls_ss_distance" data-id="<?php echo $iti_id; ?>" maxlength="6" value="<?php echo $default_ss_distance; ?>">
																												<?php }
																											} else { ?>
																												<input type="text" id="ss_distance<?php echo $iti_id; ?>" name="additi[<?php echo $iti_id; ?>][ss_distance]" class="form-control input-sm cls_ss_distance" data-id="<?php echo $iti_id; ?>" maxlength="6" value="<?php echo $sight_tariff; ?>">
																											<?php } ?>
																										</div> -->

																										<!-- //nj// -->
																										<!-- Sight Seeing Location -->
																										<div
																											class="col-xl-2 col-sm-12 col-md-2">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Sight
																													Seeing
																													Location</label>
																											</div>
																											<select
																												id="sight_selector<?php echo $iti_id; ?>"
																												class="form-control input-sm"
																												data-id="<?php echo $iti_id; ?>"
																												style="width: 100%;"
																												<?php echo $dis_abled; ?>>
																												<option
																													value="">
																													Select
																													Sightseeing
																												</option>
																												<?php foreach ($ss_default_temp as $skey => $sval) { ?>
																													<option
																														value="<?php echo $sval['sightseeing_id']; ?>"
																														data-name="<?php echo htmlspecialchars($sval['object_name']); ?>"
																														data-is-pax="<?php echo $sval['is_pax']; ?>"
																														data-tariff="<?php echo $sval['tariff']; ?>"
																														data-distance="<?php echo $sval['sightseeing_distance']; ?>">
																														<?php echo $sval['object_name']; ?>
																														<?php if ($sval['is_pax'] == 1) { ?>
																															(PAX:
																															₹<?php echo ($sval['tariff']); ?>/person)
																														<?php } else { ?>
																															(<?php echo $sval['sightseeing_distance']; ?>
																															km)
																														<?php } ?>
																													</option>
																												<?php } ?>
																											</select>
																										</div>

																										<!-- Actions -->
																										<div
																											class="col-xl-1 col-sm-12 col-md-1">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Actions</label>
																											</div>
																											<button
																												type="button"
																												class="btn btn-success btn-sm add_sightseeing_btn"
																												data-id="<?php echo $iti_id; ?>"
																												style="width: 100%;">
																												Add <i
																													class="fa fa-plus ml-2"></i>
																											</button>
																										</div>

																										<!-- Hidden fields -->
																										<input type="hidden"
																											id="ss_total_distance<?php echo $iti_id; ?>"
																											name="additi[<?php echo $iti_id; ?>][ss_total_distance]"
																											value="0">

																										<input type="hidden"
																											id="ss_remarks<?php echo $iti_id; ?>"
																											name="additi[<?php echo $iti_id; ?>][ss_remarks]">

																										<input type="hidden"
																											id="ss_grand_total<?php echo $iti_id; ?>"
																											name="additi[<?php echo $iti_id; ?>][ss_grand_total]"
																											value="0">

																										<input type="hidden"
																											id="ss_data_json<?php echo $iti_id; ?>"
																											name="additi[<?php echo $iti_id; ?>][ss_data_json]"
																											value="">


																										<div
																											class="col-xl-2 col-sm-12 col-md-2" style="display: none;">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Special
																													Event
																													Name</label>
																											</div>
																											<input
																												type="text"
																												id="spcl_event<?php echo $iti_id; ?>"
																												name="additi[<?php echo $iti_id; ?>][spcl_event]"
																												class="form-control input-sm"
																												maxlength="30"
																												value="<?php echo $special_event_name; ?>"
																												<?php echo $read_only; ?>>
																										</div>
																										<div
																											class="col-xl-1 col-sm-12 col-md-1"
																											style="display: none;">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Tariff</label>
																											</div>
																											<input
																												type="text"
																												id="spcl_tariff<?php echo $iti_id; ?>"
																												name="additi[<?php echo $iti_id; ?>][spcl_tariff]"
																												class="form-control input-sm"
																												value="<?php echo $spcl_tariff; ?>"
																												<?php echo $read_only; ?>>
																										</div>
																										<div class="col-xl-2 col-sm-12 col-md-1">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Special event</label>
																											</div>
																											<button
																												type="button"
																												class="btn btn-success btn-sm add_spcl"
																												data-std="<?php echo $startDate1->format('Y-m-d'); ?>"
																												data-oid="<?php echo $iti_id; ?>"
																												data-id="<?php echo $iti_id; ?>">Add
																												<i
																													class="fa fa-plus ml-2"></i></button>
																										</div>

																										<?php

																										if ($startDate1->format('d-m-Y') == $object_det[0]['end_date']) { ?>

																											<div
																												class="col-xl-2 col-sm-12 col-md-2">
																												<div
																													class="teams-rank">
																													<label
																														class="small-label">Other
																														Charges</label>
																												</div>
																												<input
																													type="hidden"
																													id="daily_addon<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][daily_addon]"
																													class="form-control input-sm"
																													maxlength="6"
																													value="<?php echo $daily_addon; ?>"
																													<?php echo $read_only; ?>>
																												<input
																													type="text"
																													id="permit<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][permit]"
																													class="form-control input-sm"
																													maxlength="6"
																													value="<?php echo $permit; ?>">
																											</div>
																										<?php } else { ?>
																											<div
																												class="col-xl-2 col-sm-12 col-md-2">
																												<div
																													class="teams-rank">
																													<label
																														class="small-label">Extra
																														Charges</label>
																												</div>
																												<input
																													type="text"
																													id="daily_addon<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][daily_addon]"
																													class="form-control input-sm"
																													maxlength="6"
																													value="<?php echo $daily_addon; ?>"
																													<?php echo $read_only; ?>>
																												<input
																													type="hidden"
																													id="permit<?php echo $iti_id; ?>"
																													name="additi[<?php echo $iti_id; ?>][permit]"
																													value="0">
																											</div>
																										<?php } ?>

																										<div
																											class="col-xl-2 col-sm-12 col-md-2">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Grand
																													Total</label>
																											</div>
																											<?php
																											if ($object_det[0]['is_vehicle_required'] == 0) {
																												$grand_veh_total = 0;
																											}
																											?>
																											<?php
																											$is_last_day = ($startDate1->format('d-m-Y') == $object_det[0]['end_date']);
																											$display_grand_total = $is_last_day ? $grand_veh_total : ($tac + $grand_veh_total);
																											?>
																											<input
																												type="text"
																												id="grand_total<?php echo $iti_id; ?>"
																												name="additi[<?php echo $iti_id; ?>][grand_total]"
																												class="form-control input-sm grand_total"
																												value="<?php echo $display_grand_total; ?>"
																												readonly
																												style="background-color: #004d00; color: white; font-weight: bold; font-style: italic;font-size: 20px;">
																										</div>

																									</div>
																									<!-- Dynamic Rows Container -->
																									<div id="ss_dynamic_rows<?php echo $iti_id; ?>"
																										class="ss-rows-container">
																										<!-- Dynamic rows will be added here -->
																									</div>
																									<div class="row">
																										<div class="col-xl-12"
																											id="spcl_add_dynamic<?php echo $iti_id; ?>">



																										</div>
																									</div>

																									<div
																										class="row mt-2 single_row">
																										<div
																											class="col-xl-12 col-sm-12 col-md-12">
																											<div
																												class="teams-rank">
																												<label
																													class="small-label">Transport
																													Description</label>
																											</div>
																											<textarea
																												id="transport_remarks<?php echo $iti_id; ?>"
																												name="additi[<?php echo $iti_id; ?>][transport_remarks]"
																												class="form-control"
																												rows="1"
																												<?php echo $read_only; ?>><?php echo $transport_remarks; ?></textarea>
																										</div>
																									</div>


																									</div>
																								</div>
																							</div>
																						</div>

																					</div>

																				</div>
																			</div>

																		<?php
																			$startDate1->modify('+1 day');
																			$cnt1++;
																			$day_count++;
																		} ?>

																	</div>

																	<!--</div>-->
																</div>
															</div>
														</div>
													</div>
												<?php } ?>



											</div>
										</div>
									</div>
								</div>

								<?php if (empty($iti_edit_id)) { ?>
									<div class="fixed-save-buttons">
										<!--<button type="submit" id="btn_savedraft_iti_plan" class="btn btn-warning mr-2">Next>></button>-->
										<button type="button" id="btn_savedraft_iti_plan" class="btn btn-warning mr-2">Save
											& Next >></button>
										<button type="submit" id="btn_save_iti_plan" class="btn btn-success"
											style="display: none;">Final Save</button>
										<input type="hidden" name="submit_type" id="submit_type" value="">
									</div>
								<?php } ?>
							</form>


							<!-------------------------------------------------------------------------------------------------------------->

							<!-- //nj// -->
							<hr />
							<?php
							// === HELPER FUNCTION: Group expansion rooms by base properties, with smart combining for uniform supplements ===

							// === FIXED HELPER FUNCTION: Group expansion rooms with proper tax handling ===
							function groupExpansionRooms($expansions, $val, $object_det, $room_type = 'double')
							{
								$grouped = [];
								if (empty($expansions)) {
									return $grouped;
								}

								// Check if tax status is active
								$tax_status = isset($val['tax_status']) && $val['tax_status'] == 1;

								// Base grouping key: room_category, meal_plan, adult_rate (excluding child rates for combining)
								$base_grouped = [];
								foreach ($expansions as $exp) {
									$room_cat = $exp['room_category_name'] ?? 'N/A';
									$meal = $exp['meal_plan_name'] ?? 'N/A';
									if ($room_type === 'double') {
										$adult_rate = $exp['room_rate_double'] ?? 0;
									} else {
										$adult_rate = $exp['room_rate_single'] ?? 0;
									}
									$base_key = sprintf('%s|%s|%s', $room_cat, $meal, $adult_rate);

									if (!isset($base_grouped[$base_key])) {
										$base_grouped[$base_key] = [
											'expansions' => [],
											'adult_rate_pre' => $adult_rate,
											'room_cat' => $room_cat,
											'meal' => $meal
										];
									}
									$base_grouped[$base_key]['expansions'][] = $exp;
								}

								// Process each base group
								foreach ($base_grouped as $bkey => $bgroup) {
									$exps = $bgroup['expansions'];
									$total_rooms = count($exps);
									if ($total_rooms == 0) continue;

									$first_exp = $exps[0];
									$gst = $first_exp['gst'] ?? 0;

									// FIXED: Use appropriate multiplier based on tax status
									if ($tax_status) {
										// For tax status = 1, rates are PRE-tax, need to add GST
										$multi = 1 + ($gst / 100);
									} else {
										// For tax status = 0, rates already include everything
										$multi = 1;
									}

									$adult_rate_pre = $bgroup['adult_rate_pre'];
									$adult_rate_post = $adult_rate_pre * $multi;

									// Initialize child aggregates
									$cwb_unique_nonzero = [];
									$cwo_unique_nonzero = [];
									$extra_unique_nonzero = [];
									$cwb_map = [];
									$cwo_map = [];
									$extra_map = [];

									if ($room_type === 'double') {
										// Aggregate child with bed
										foreach ($exps as $exp) {
											$r = $exp['child_with_bed_double'] ?? 0;
											if ($r > 0) {
												$cwb_unique_nonzero[] = $r;
												$cwb_map[$r] = ($cwb_map[$r] ?? 0) + 1;
											}
										}
										$cwb_unique = array_unique($cwb_unique_nonzero);
										$cwb_can = count($cwb_unique) <= 1;

										// Child without bed
										foreach ($exps as $exp) {
											$r = $exp['child_without_bed_double'] ?? 0;
											if ($r > 0) {
												$cwo_unique_nonzero[] = $r;
												$cwo_map[$r] = ($cwo_map[$r] ?? 0) + 1;
											}
										}
										$cwo_unique = array_unique($cwo_unique_nonzero);
										$cwo_can = count($cwo_unique) <= 1;

										// Extra bed
										foreach ($exps as $exp) {
											$r = $exp['extra_bed_double'] ?? 0;
											if ($r > 0) {
												$extra_unique_nonzero[] = $r;
												$extra_map[$r] = ($extra_map[$r] ?? 0) + 1;
											}
										}
										$extra_unique = array_unique($extra_unique_nonzero);
										$extra_can = count($extra_unique) <= 1;
									} else {
										// Single: no children
										$cwb_can = $cwo_can = $extra_can = true;
									}

									$all_can_combine = $cwb_can && $cwo_can && $extra_can;

									// FIXED: Calculate group total properly
									if ($tax_status) {
										// Tax status = 1: Use grand_total from expansion data (already includes GST)
										$group_total_post = 0;
										foreach ($exps as $exp) {
											// For double occupancy
											if ($room_type === 'double') {
												$group_total_post += $exp['double_total_rate'] ?? 0;
											} else {
												// For single occupancy
												$group_total_post += $exp['single_total_rate'] ?? 0;
											}
										}
									} else {
										// Tax status = 0: Calculate manually (rates already complete)
										$group_total_post = $adult_rate_post * $total_rooms;

										if ($room_type === 'double') {
											$cwb_rate_pre = !empty($cwb_unique) ? $cwb_unique[0] : 0;
											$cwb_count = $cwb_map[$cwb_rate_pre] ?? 0;
											$cwb_rate_post = $cwb_rate_pre * $multi;
											$group_total_post += $cwb_rate_post * $cwb_count;

											$cwo_rate_pre = !empty($cwo_unique) ? $cwo_unique[0] : 0;
											$cwo_count = $cwo_map[$cwo_rate_pre] ?? 0;
											$cwo_rate_post = $cwo_rate_pre * $multi;
											$group_total_post += $cwo_rate_post * $cwo_count;

											$extra_rate_pre = !empty($extra_unique) ? $extra_unique[0] : 0;
											$extra_count = $extra_map[$extra_rate_pre] ?? 0;
											$extra_rate_post = $extra_rate_pre * $multi;
											$group_total_post += $extra_rate_post * $extra_count;
										}
									}

									if ($all_can_combine) {
										// Combined mode
										$cwb_rate_pre = !empty($cwb_unique) ? $cwb_unique[0] : 0;
										$cwb_count = $cwb_map[$cwb_rate_pre] ?? 0;
										$cwb_rate_post = $cwb_rate_pre * $multi;

										$cwo_rate_pre = !empty($cwo_unique) ? $cwo_unique[0] : 0;
										$cwo_count = $cwo_map[$cwo_rate_pre] ?? 0;
										$cwo_rate_post = $cwo_rate_pre * $multi;

										$extra_rate_pre = !empty($extra_unique) ? $extra_unique[0] : 0;
										$extra_count = $extra_map[$extra_rate_pre] ?? 0;
										$extra_rate_post = $extra_rate_pre * $multi;

										$combined_data = [
											'room_category_name' => $bgroup['room_cat'],
											'meal_plan_name' => $bgroup['meal'],
											'gst' => $gst,
											'room_rate_double' => $adult_rate_pre,
											'child_with_bed_double' => $cwb_rate_pre,
											'child_without_bed_double' => $cwo_rate_pre,
											'extra_bed_double' => $extra_rate_pre
										];
										if ($room_type === 'single') {
											$combined_data['room_rate_single'] = $adult_rate_pre;
										}

										$grouped[] = [
											'data' => $combined_data,
											'room_count' => $total_rooms,
											'total' => $group_total_post,
											'cwb_actual_count' => $cwb_count,
											'cwo_actual_count' => $cwo_count,
											'extra_actual_count' => $extra_count,
											'is_combined' => true
										];
									} else {
										// Fallback: sub-group by full supplement config
										$sub_grouped = [];
										foreach ($exps as $exp) {
											$cwb_r = $exp['child_with_bed_double'] ?? 0;
											$cwo_r = $exp['child_without_bed_double'] ?? 0;
											$extra_r = $exp['extra_bed_double'] ?? 0;
											$full_sub_key = sprintf('%s|%s|%s', $cwb_r, $cwo_r, $extra_r);

											if (!isset($sub_grouped[$full_sub_key])) {
												$sub_grouped[$full_sub_key] = [
													'data' => $exp,
													'room_count' => 0,
													'total' => 0.0
												];
											}

											$sub_grouped[$full_sub_key]['room_count']++;

											// FIXED: Use grand_total if tax_status = 1
											if ($tax_status) {
												if ($room_type === 'double') {
													$sub_room_total = $exp['double_total_rate'] ?? 0;
												} else {
													$sub_room_total = $exp['single_total_rate'] ?? 0;
												}
											} else {
												// Calculate manually
												$sub_adult_post = $adult_rate_post;
												$sub_cwb_post = ($cwb_r * $multi);
												$sub_cwo_post = ($cwo_r * $multi);
												$sub_extra_post = ($extra_r * $multi);
												$sub_room_total = $sub_adult_post + $sub_cwb_post + $sub_cwo_post + $sub_extra_post;
											}

											$sub_grouped[$full_sub_key]['total'] += $sub_room_total;
										}

										// Handle zero supplement merging
										$zero_sub_key = '0|0|0';
										$skipped_count = 0;
										$skipped_total = 0.0;
										if (isset($sub_grouped[$zero_sub_key]) && count($sub_grouped) > 1) {
											$skipped_count = $sub_grouped[$zero_sub_key]['room_count'];
											$skipped_total = $sub_grouped[$zero_sub_key]['total'];
											unset($sub_grouped[$zero_sub_key]);
										}

										if ($skipped_count > 0 && !empty($sub_grouped)) {
											$first_sub_key = array_key_first($sub_grouped);
											$sub_grouped[$first_sub_key]['room_count'] += $skipped_count;
											$sub_grouped[$first_sub_key]['total'] += $skipped_total;
										}

										foreach ($sub_grouped as $sub) {
											$grouped[] = [
												'data' => $sub['data'],
												'room_count' => $sub['room_count'],
												'total' => $sub['total']
											];
										}
									}
								}

								return $grouped;
							}

							$pax_count_exist = 0;
							if (!empty($itinerary_details_save)) {
								$rt_count = 0;
								if ($object_det[0]['no_of_double_room'] > 0) {
									$rt_count++;
								}
								if ($object_det[0]['no_of_single_room'] > 0) {
									$rt_count++;
								}
							?>
								<div class="costing-container">
									<h4 style="text-align:center; color: #004d00; font-weight: bold; font-style: italic;font-size: 20px;">
										Costing Sheet</h4>
									<div class="table-responsive costing-box">
										<table class="table table-bordered costing-table">
											<thead>
												<tr>
													<th>Day</th>
													<th>Date</th>
													<th>Destination</th>
													<th>Remarks</th>
													<th>Hotel</th>
													<th>Room Type</th>
													<th>Room Category</th>
													<th>Meal Plan</th>
													<th>No Of Adult</th>
													<th>No:Of Rooms</th>
													<th>Adult Rate</th>
													<?php if ($object_det[0]['no_of_child_with_bed'] > 0) {
														$pax_count_exist++; ?>
														<th>No:Of Child with Bed</th>
														<th>Child with Bed Rate</th>
													<?php } ?>
													<?php if ($object_det[0]['no_of_child_without_bed'] > 0) {
														$pax_count_exist++; ?>
														<th>No:Of Child without Bed</th>
														<th>Child without Bed Rate</th>
													<?php } ?>
													<?php if ($object_det[0]['no_of_extra_bed'] > 0) {
														$pax_count_exist++; ?>
														<th>No:Of Extra Bed</th>
														<th>Extra Bed Rate</th>
													<?php } ?>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$k = 1;
												$cs_acc_total = 0;
												$bifur_double_total = 0;
												$bifur_single_total = 0;
												$bifur_child_total = 0;
												$bifur_child_wb_total = 0;
												$bifur_extra_total = 0;
												$itinerary_details_save_count = count($itinerary_details_save);

												// initialize counters
												$json_addons = [];
												$special_event_count = 0;
												$addon_count = 0;

												// Loop up to the second-to-last item to exclude the last day
												for ($key = 0; $key < $itinerary_details_save_count - 1; $key++) {
													$val = $itinerary_details_save[$key];

													$tour_details_id = $val['tour_details_id'];
													$tour_date = $val['tour_date'];
													$itinerary_details_id = $val['itinerary_details_id'] ?? null;

													// PRIORITY LOGIC: Check itinerary_expansion_details FIRST, then fallback to tour_expansion_details
													$expansion_data = [];
													$data_source = '';

													// PRIORITY 1: Check itinerary_expansion_details
													if (!empty($itinerary_expansion_details[$tour_details_id])) {
														foreach ($itinerary_expansion_details[$tour_details_id] as $exp) {
															if ($exp['tour_expansion_date'] === $tour_date) {
																$expansion_data[] = $exp;
																$data_source = 'itinerary';
															}
														}
													}

													// FALLBACK: If no itinerary expansion data, use tour_expansion_details
													if (empty($expansion_data) && !empty($tour_expansion_details[$tour_details_id])) {
														foreach ($tour_expansion_details[$tour_details_id] as $exp) {
															if ($exp['tour_expansion_date'] === $tour_date) {
																$expansion_data[] = $exp;
																$data_source = 'tour';
															}
														}
													}

													// Separate double/single expansions
													$double_expansions = [];
													$single_expansions = [];
													if (!empty($expansion_data)) {
														foreach ($expansion_data as $exp) {
															$double_rate = (int)($exp['room_rate_double'] ?? 0);
															$single_rate = (int)($exp['room_rate_single'] ?? 0);

															if ($double_rate > 0) {
																$double_expansions[] = $exp;
															}
															if ($single_rate > 0) {
																$single_expansions[] = $exp;
															}
														}
													}

													// Calculate row counts for grouped expansions
													$double_row_count = 0;
													$single_row_count = 0;
													if (!empty($double_expansions)) {
														$grouped_doubles = groupExpansionRooms($double_expansions, $val, $object_det, 'double');
														$double_row_count = count($grouped_doubles);
													} else {
														$double_row_count = (isset($val['double_room']) && $val['double_room'] > 0 ? 1 : 0);
													}
													if (!empty($single_expansions)) {
														$grouped_singles = groupExpansionRooms($single_expansions, $val, $object_det, 'single');
														$single_row_count = count($grouped_singles);
													} else {
														$single_row_count = (isset($val['single_room']) && $val['single_room'] > 0 ? 1 : 0);
													}
													$total_rows = $double_row_count + $single_row_count;

													// Skip this day entirely if no rows needed
													if ($total_rows === 0) {
														continue;
													}

													$row_counter = 0;
													$double_adult_shown = false;  // NEW: Track if double adult cell is shown
													$single_adult_shown = false;

													// Calculate adult counts for display
													$total_single_rooms = 0;
													if (!empty($single_expansions)) {
														$grouped_singles_temp = groupExpansionRooms($single_expansions, $val, $object_det, 'single');
														foreach ($grouped_singles_temp as $sg) {
															$total_single_rooms += $sg['room_count'];
														}
													} else if (isset($val['single_room'])) {
														$total_single_rooms = $val['single_room'];
													}

													$adults_for_double = $object_det[0]['no_of_adult'] - $total_single_rooms;
													$adults_for_single = $total_single_rooms;

													// === RENDER GROUPED DOUBLE ROOM ROWS ===
													if ($double_row_count > 0) {
														if (!empty($double_expansions)) {
															// Group double expansions
															foreach ($grouped_doubles as $g_idx => $group) {
																$d_exp = $group['data'];
																$room_count = $group['room_count'];
																$group_total = $group['total'];

																$d_room_cat_name = $d_exp['room_category_name'] ?? 'N/A';
																$d_meal_plan_name = $d_exp['meal_plan_name'] ?? 'N/A';

																// Compute displays (post GST)
																$tax_status = isset($val['tax_status']) && $val['tax_status'] == 1;
																$gst = $d_exp['gst'] ?? 0;
																$multi = $tax_status ? (1 + ($gst / 100)) : 1;

																$d_adult_rate_pre = $d_exp['room_rate_double'] ?? 0;
																$d_adult_rate_display = $d_adult_rate_pre * $multi;

																$d_child_rate_pre = $d_exp['child_with_bed_double'] ?? 0;
																$d_child_rate_display = $d_child_rate_pre * $multi;

																$d_child_wb_rate_pre = $d_exp['child_without_bed_double'] ?? 0;
																$d_child_wb_rate_display = $d_child_wb_rate_pre * $multi;

																$d_extra_rate_pre = $d_exp['extra_bed_double'] ?? 0;
																$d_extra_rate_display = $d_extra_rate_pre * $multi;

																// Child counts: use actual_count if combined, else original logic
																$child_no = isset($group['cwb_actual_count']) ? $group['cwb_actual_count'] : (($d_child_rate_pre > 0) ? $room_count : 0);
																$child_wb_no = isset($group['cwo_actual_count']) ? $group['cwo_actual_count'] : (($d_child_wb_rate_pre > 0) ? $room_count : 0);
																$extra_no = isset($group['extra_actual_count']) ? $group['extra_actual_count'] : (($d_extra_rate_pre > 0) ? $room_count : 0);

																// Update bifurcation totals
																$bifur_double_total += ($d_adult_rate_pre * $room_count);
																$bifur_child_total += ($d_child_rate_pre * $child_no);
																$bifur_child_wb_total += ($d_child_wb_rate_pre * $child_wb_no);
																$bifur_extra_total += ($d_extra_rate_pre * $extra_no);
																$is_last_double = ($g_idx === count($grouped_doubles) - 1);
																$row_class = ($is_last_double && $single_row_count === 0) ? ' class="hotel-row"' : '';
												?>
																<tr <?php echo $row_class; ?>>
																	<?php if ($row_counter === 0) { ?>
																		<td rowspan="<?php echo $total_rows; ?>"><?php echo $k; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo $val['geog_name']; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>"><?php echo $val['remarks']; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo $val['object_name'] ? $val['object_name'] : "Own Arrangements"; ?>
																		</td>
																	<?php } ?>
																	<td>Double</td>
																	<td><?php echo $d_room_cat_name; ?></td>
																	<td><?php echo $d_meal_plan_name; ?></td>
																	<?php if (!$double_adult_shown) {
																		$double_adult_shown = true; ?>
																		<td rowspan="<?php echo $double_row_count; ?>"><?php echo $adults_for_double; ?></td>
																	<?php } ?>
																	<td><?php echo $room_count; ?></td>
																	<td><?php echo ($d_adult_rate_display); ?></td>
																	<?php if ($object_det[0]['no_of_child_with_bed'] > 0) { ?>
																		<td><?php echo $child_no; ?></td>
																		<td><?php echo ($d_child_rate_display); ?></td>
																	<?php } ?>
																	<?php if ($object_det[0]['no_of_child_without_bed'] > 0) { ?>
																		<td><?php echo $child_wb_no; ?></td>
																		<td><?php echo ($d_child_wb_rate_display); ?></td>
																	<?php } ?>
																	<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																		<td><?php echo $extra_no; ?></td>
																		<td><?php echo ($d_extra_rate_display); ?></td>
																	<?php } ?>
																	<td><?php echo ($group_total); ?></td>
																</tr>
															<?php
																$cs_acc_total += $group_total;
																$row_counter++;
															}
														} else {
															// STATIC MODE: Original ungrouped logic remains unchanged
															$room_t_d = $child_t_d = $child_wb_t_d = $extra_t_d = 0;
															if (!empty($val['cost'])) {
																foreach ($val['cost'] as $cval) {
																	if ($cval['cost_component_id'] == "6" && $cval['room_type_id'] == "2")
																		$room_t_d = $cval['tariff'];
																	if ($cval['cost_component_id'] == "12" && $cval['room_type_id'] == "2")
																		$child_t_d = $cval['tariff'];
																	if ($cval['cost_component_id'] == "15" && $cval['room_type_id'] == "2")
																		$child_wb_t_d = $cval['tariff'];
																	if ($cval['cost_component_id'] == "9" && $cval['room_type_id'] == "2")
																		$extra_t_d = $cval['tariff'];
																}
															}

															if (isset($val['tax_status']) && $val['tax_status'] == 1) {
																$room_t_d_display = $val['adult_eighteen_double'] ?? $room_t_d;
																$child_t_d_display = $val['child_eighteen_double'] ?? $child_t_d;
																$child_wb_t_d_display = $val['child_wb_eighteen_double'] ?? $child_wb_t_d;
																$extra_t_d_display = $val['extra_eighteen_double'] ?? $extra_t_d;
																$dtotal = $val['tac_eighteen_double'] ?? 0;
															} else {
																$room_t_d_display = $room_t_d;
																$child_t_d_display = $child_t_d;
																$child_wb_t_d_display = $child_wb_t_d;
																$extra_t_d_display = $extra_t_d;
																$dtotal = ($val['double_room'] * $room_t_d) + ($val['child_with_bed'] * $child_t_d) +
																	($val['child_without_bed'] * $child_wb_t_d) + ($val['extra_bed'] * $extra_t_d);
															}

															$bifur_double_total += ($val['double_room'] * $room_t_d);
															$bifur_child_total += ($val['child_with_bed'] * $child_t_d);
															$bifur_child_wb_total += ($val['child_without_bed'] * $child_wb_t_d);
															$bifur_extra_total += ($val['extra_bed'] * $extra_t_d);
															?>
															<?php $row_class = ($single_row_count === 0) ? ' class="hotel-row"' : ''; ?>
															?>
															<tr <?php echo $row_class; ?>>
																<?php if ($row_counter === 0) { ?>
																	<td rowspan="<?php echo $total_rows; ?>"><?php echo $k; ?></td>
																	<td rowspan="<?php echo $total_rows; ?>">
																		<?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
																	<td rowspan="<?php echo $total_rows; ?>">
																		<?php echo $val['geog_name']; ?></td>
																	<td rowspan="<?php echo $total_rows; ?>"><?php echo $val['remarks']; ?></td>
																	<td rowspan="<?php echo $total_rows; ?>">
																		<?php echo $val['object_name'] ? $val['object_name'] : "Own Arrangements"; ?>
																	</td>
																<?php } ?>
																<td>Double</td>
																<td><?php echo $val['room_category_name']; ?></td>
																<td><?php echo $val['meal_plan_name']; ?></td>
																<?php if (!$double_adult_shown) {
																	$double_adult_shown = true; ?>
																	<td rowspan="<?php echo $double_row_count; ?>"><?php echo $adults_for_double; ?></td>
																<?php } ?>
																<td><?php echo $val['double_room']; ?></td>
																<td><?php echo ($room_t_d_display); ?></td>
																<?php if ($object_det[0]['no_of_child_with_bed'] > 0) { ?>
																	<td><?php echo $val['child_with_bed']; ?></td>
																	<td><?php echo ($child_t_d_display); ?></td>
																<?php } ?>
																<?php if ($object_det[0]['no_of_child_without_bed'] > 0) { ?>
																	<td><?php echo $val['child_without_bed']; ?></td>
																	<td><?php echo ($child_wb_t_d_display); ?></td>
																<?php } ?>
																<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																	<td><?php echo $val['extra_bed']; ?></td>
																	<td><?php echo ($extra_t_d_display); ?></td>
																<?php } ?>
																<td><?php echo ($dtotal); ?></td>
															</tr>
															<?php
															$cs_acc_total += $dtotal;
															$row_counter++;
														}
													}


													// === RENDER GROUPED SINGLE ROOM ROWS ===
													if ($single_row_count > 0) {
														if (!empty($single_expansions)) {
															// Group single expansions
															foreach ($grouped_singles as $s_idx => $group) {
																$s_exp = $group['data'];
																$room_count = $group['room_count'];
																$group_total = $group['total'];

																$s_room_cat_name = $s_exp['room_category_name'] ?? 'N/A';
																$s_meal_plan_name = $s_exp['meal_plan_name'] ?? 'N/A';

																// Compute displays for single
																$tax_status = isset($val['tax_status']) && $val['tax_status'] == 1;
																$gst = $s_exp['gst'] ?? 0;
																$multi = $tax_status ? (1 + ($gst / 100)) : 1;

																$s_adult_rate_pre = isset($s_exp['room_rate_single']) ? $s_exp['room_rate_single'] : ($s_exp['room_rate_double'] ?? 0);
																$s_adult_rate_display = $s_adult_rate_pre * $multi;

																// Children always 0 for single
																$s_child_rate_display = 0;
																$s_child_wb_rate_display = 0;
																$s_extra_rate_display = 0;
																$s_child_no = 0;
																$s_child_wb_no = 0;
																$s_extra_no = 0;

																$bifur_single_total += ($s_adult_rate_pre * $room_count);

																// Check if this is the last single row
																$is_last_single = ($s_idx === count($grouped_singles) - 1);
																$row_class = $is_last_single ? ' class="hotel-row"' : '';
															?>
																<tr<?php echo $row_class; ?>>
																	<?php if ($row_counter === 0 && $double_row_count == 0) { ?>
																		<td rowspan="<?php echo $total_rows; ?>"><?php echo $k; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo $val['geog_name']; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>"><?php echo $val['remarks']; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo $val['object_name'] ? $val['object_name'] : "Own Arrangements"; ?>
																		</td>
																	<?php } ?>
																	<td>Single</td>
																	<td><?php echo $s_room_cat_name; ?></td>
																	<td><?php echo $s_meal_plan_name; ?></td>
																	<?php if (!$single_adult_shown) {
																		$single_adult_shown = true; ?>
																		<td rowspan="<?php echo $single_row_count; ?>"><?php echo $adults_for_single; ?></td>
																	<?php } ?>
																	<td><?php echo $room_count; ?></td>
																	<td><?php echo ($s_adult_rate_display); ?></td>
																	<?php if ($object_det[0]['no_of_child_with_bed'] > 0) { ?>
																		<td><?php echo $s_child_no; ?></td>
																		<td><?php echo ($s_child_rate_display); ?></td>
																	<?php } ?>
																	<?php if ($object_det[0]['no_of_child_without_bed'] > 0) { ?>
																		<td><?php echo $s_child_wb_no; ?></td>
																		<td><?php echo ($s_child_wb_rate_display); ?></td>
																	<?php } ?>
																	<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																		<td><?php echo $s_extra_no; ?></td>
																		<td><?php echo ($s_extra_rate_display); ?></td>
																	<?php } ?>
																	<td><?php echo ($group_total); ?></td>
																	</tr>
																<?php
																$cs_acc_total += $group_total;
																$row_counter++;
															}
														} else {
															// SHOW TOUR PLAN DATA (NO EXPANSION - STATIC ROW)
															$room_t_s = $child_t_s = $child_wb_t_s = $extra_t_s = 0;
															if (!empty($val['cost'])) {
																foreach ($val['cost'] as $cval) {
																	if ($cval['cost_component_id'] == "6" && $cval['room_type_id'] == "1")
																		$room_t_s = $cval['tariff'];
																	if ($cval['cost_component_id'] == "12" && $cval['room_type_id'] == "1")
																		$child_t_s = $cval['tariff'];
																	if ($cval['cost_component_id'] == "15" && $cval['room_type_id'] == "1")
																		$child_wb_t_s = $cval['tariff'];
																	if ($cval['cost_component_id'] == "9" && $cval['room_type_id'] == "1")
																		$extra_t_s = $cval['tariff'];
																}
															}

															if (isset($val['tax_status']) && $val['tax_status'] == 1) {
																$room_t_s_display = $val['adult_eighteen_single'] ?? $room_t_s;
																$stotal = $val['tac_eighteen_single'] ?? 0;
															} else {
																$room_t_s_display = $room_t_s;
																$stotal = ($val['single_room'] * $room_t_s);
															}

															$bifur_single_total += ($val['single_room'] * $room_t_s);
																?>
																<tr class="hotel-row">
																	<?php if ($row_counter === 0) { ?>
																		<td rowspan="<?php echo $total_rows; ?>"><?php echo $k; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo date("d-m-Y", strtotime($val['tour_date'])); ?></td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo $val['geog_name']; ?></td>
																		<td rowspan="<?php echo $total_rows; ?>"><?php echo $val['remarks']; ?>
																		</td>
																		<td rowspan="<?php echo $total_rows; ?>">
																			<?php echo $val['object_name'] ? $val['object_name'] : "Own Arrangements"; ?>
																		</td>
																	<?php } ?>

																	<td>Single</td>
																	<td><?php echo $val['room_category_name']; ?></td>
																	<td><?php echo $val['meal_plan_name']; ?></td>
																	<?php if (!$single_adult_shown) {
																		$single_adult_shown = true; ?>
																		<td rowspan="<?php echo $single_row_count; ?>"><?php echo $adults_for_single; ?></td>
																	<?php } ?>
																	<td><?php echo $val['single_room']; ?></td>
																	<td><?php echo ($room_t_s_display); ?></td>

																	<?php if ($object_det[0]['no_of_child_with_bed'] > 0) { ?>
																		<td>0</td>
																		<td><?php echo ($child_t_s); ?></td>
																	<?php } ?>

																	<?php if ($object_det[0]['no_of_child_without_bed'] > 0) { ?>
																		<td>0</td>
																		<td><?php echo ($child_wb_t_s); ?></td>
																	<?php } ?>

																	<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																		<td>0</td>
																		<td><?php echo ($extra_t_s); ?></td>
																	<?php } ?>

																	<td><?php echo ($stotal); ?></td>
																</tr>
													<?php
															$cs_acc_total += $stotal;
															$row_counter++;
														}
													}

													$k++; // Increment day counter
												}
													?>
											</tbody>
											<tfoot>
												<tr>
													<?php
													$colspan_count = ($pax_count_exist * 2) + 11;
													?>
													<th colspan="<?php echo $colspan_count; ?>">Total Accommodation Cost
													</th>
													<th><?php echo ($cs_acc_total); ?></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

								<?php
								// Count addons
								foreach ($itinerary_details_save as $keyh => $valh) {
									$addonDetailsAll = json_decode($valh['json_addons'] ?? '[]');
									if (!empty($addonDetailsAll)) {
										$addon_count += count($addonDetailsAll);
									}

									$dhot_details = json_decode($valh['hotel_details']);
									if (!empty($dhot_details)) {
										foreach ($dhot_details as $keyd => $vald) {
											if (!empty($vald->hotfac)) {
												$addon_count++;
											}
										}
									}
								}

								if ($addon_count > 0) {
									$fac_count = 1;
								?>
									<div class="costing-container">
										<div class="table-responsive costing-box">
											<table class="table table-bordered costing-table">
												<tr>
													<th>Si No</th>
													<th>Date</th>
													<th>Destination</th>
													<th>Hotel</th>
													<th>Hotel Facility</th>
													<th>Tariff</th>
												</tr>
												<?php
												$fac_name_temp = "";
												$cs_addon_total = 0;
												$adn_count = 1;

												foreach ($itinerary_details_save as $keyh => $valh) {
													foreach ($valh['cost'] as $chkey => $chval) {
														if ($chval['cost_component_id'] == "19" && $chval['room_type_id'] == "1") {
															$hotel_fac_rate = $chval['tariff'];
															$cs_addon_total = $cs_addon_total + $hotel_fac_rate;
														}
													}

													$addon_tourDate = $valh['tour_date'];
													$addonDetailsAll = json_decode($valh['json_addons'] ?? '[]');
													$addon_events = array_filter(
														$addonDetailsAll,
														fn($v) => $v->tour_date == $addon_tourDate
													);

													if (!empty($addon_events)) {
														foreach ($addon_events as $adn) { ?>
															<tr>
																<td style="border:1px solid black;"><?php echo $adn_count++; ?></td>
																<td style="border:1px solid black;">
																	<?php echo date("d-m-Y", strtotime($valh['tour_date'])); ?></td>
																<td><?php echo $valh['geog_name']; ?></td>
																<td><?php echo $valh['object_name']; ?></td>
																<td style="border:1px solid black;"><?php echo $adn->addon_event; ?></td>
																<td style="border:1px solid black;text-align:right;">
																	<?php echo $adn->addon_tariff; ?></td>
															</tr>
															<?php
														}
													}

													$dhot_details = json_decode($valh['hotel_details']);
													if (!empty($dhot_details)) {
														foreach ($dhot_details as $keyd => $vald) {
															if ($vald->tour_date == $valh['tour_date']) {
																if (!empty($vald->hotfac)) {
																	$fac_name = $Enquiry_model->getHotelFacilityName($vald->hotfac);
																	if (!empty($fac_name)) {
																		$fac_name_temp = $fac_name[0]['facility_name'];
																	}
															?>
																	<tr>
																		<td><?php echo $fac_count++; ?></td>
																		<td><?php echo date("d-m-Y", strtotime($vald->tour_date)); ?></td>
																		<td><?php echo $valh['geog_name']; ?></td>
																		<td><?php echo $valh['object_name']; ?></td>
																		<td><?php echo $fac_name_temp; ?></td>
																		<td><?php echo $vald->fac_rate; ?></td>
																	</tr>
												<?php
																}
															}
															$cs_addon_total = $cs_addon_total + $vald->fac_rate;
														}
													}
												} ?>
												<tr>
													<th colspan="5">Total Hotel Facility Cost</th>
													<th style="text-align:right;"><?php echo ($cs_addon_total); ?></th>
												</tr>
											</table>
										</div>
									</div>
								<?php
								}
								// Count sightseeing entries (with pax=1)
								$sightseeing_count = 0;
								foreach ($itinerary_details_save as $keyh => $valh) {
									$ss_data = json_decode($valh['ss_data_json'] ?? '[]', true);
									if (!empty($ss_data)) {
										foreach ($ss_data as $ss) {
											// Filter for pax=1 (assuming 'is_pax' field indicates per pax, or always 1)
											if (isset($ss['is_pax']) && $ss['is_pax'] == 1) {
												$sightseeing_count++;
											} else {
												// If no 'is_pax', assume all are with pax=1
												$sightseeing_count++;
											}
										}
									}
								}

								if ($sightseeing_count > 0) {
								?>
									<div class="costing-container">
										<div class="table-responsive costing-box">
											<table class="table table-bordered costing-table">
												<tr>
													<th>Si No</th>
													<th>Date</th>
													<th>Destination</th>
													<th>Sightseeing</th>
													<th>Tariff</th>
												</tr>
												<?php
												$ss_count = 1;
												$cs_sightseeing_total = 0;

												foreach ($itinerary_details_save as $keyh => $valh) {
													$ss_data = json_decode($valh['ss_data_json'] ?? '[]', true);
													if (!empty($ss_data)) {
														foreach ($ss_data as $ss) {
															// Filter for pax=1
															if (isset($ss['is_pax']) && $ss['is_pax'] == 1) {
																// $tariff = isset($ss['pax_cost']) ? floatval($ss['pax_cost']) : (isset($ss['cost']) ? floatval($ss['cost']) : 0);
																$tariff = isset($ss['pax_cost']) ? intval($ss['pax_cost']) : (isset($ss['cost']) ? intval($ss['cost']) : 0);

																if ($tariff > 0) {
												?>
																	<tr>
																		<td><?php echo $ss_count++; ?></td>
																		<td><?php echo date("d-m-Y", strtotime($valh['tour_date'])); ?></td>
																		<td><?php echo $valh['geog_name']; ?></td>
																		<td><?php echo $ss['name']; ?></td>
																		<!-- <td style="text-align:right;"><?php echo ($tariff); ?></td> -->
																		<td style="text-align:right;"><?php echo ($tariff); ?></td>
																	</tr>
																<?php
																	$cs_sightseeing_total += $tariff;
																}
															} else {
																// If no 'is_pax', assume pax=1 and include
																$tariff = isset($ss['pax_cost']) ? floatval($ss['pax_cost']) : (isset($ss['cost']) ? floatval($ss['cost']) : 0);
																if ($tariff > 0) {
																?>
																	<tr>
																		<td><?php echo $ss_count++; ?></td>
																		<td><?php echo date("d-m-Y", strtotime($valh['tour_date'])); ?></td>
																		<td><?php echo $valh['geog_name']; ?></td>
																		<td><?php echo $ss['name']; ?></td>
																		<!-- <td style="text-align:right;"><?php echo ($tariff); ?></td> -->
																		<td style="text-align:right;"><?php echo ($tariff); ?></td>
																	</tr>
												<?php
																	$cs_sightseeing_total += $tariff;
																}
															}
														}
													}
												} ?>
												<tr>
													<th colspan="4">Total Sightseeing Cost (with Pax)</th>
													<!-- <th style="text-align:right;"><?php echo ($cs_sightseeing_total); ?></th> -->
													<th style="text-align:right;"><?php echo ($cs_sightseeing_total); ?></th>
												</tr>
											</table>
										</div>
									</div>
								<?php
								}
								?>


								<?php if ($object_det[0]['is_vehicle_required'] == 1) { ?>
									<div class="costing-container">
										<div class="table-responsive costing-box">
											<table class="table table-bordered costing-table">
												<tr>
													<th>Day</th>
													<th>Date</th>
													<th>Description</th>
													<th>Destination</th>
													<th>KM Used</th>
													<th>Vehicle Model</th>
													<th>Rate</th>
												</tr>

												<?php
												$cs_trans_total = 0;
												$total_extra_klm_cost = 0;
												$total_permit = 0;
												$total_sightseeing_cost = 0;
												$total_adhoc_rate = 0;
												$dayNo = 1;
												$itinerary_details_save_cnt = count($itinerary_details_save);

												// Initialize totals for extra km calculation across all days
												$total_travel_distance_all = 0.0;
												$total_max_km_day_all = 0.0;
												$extra_km_rate = 0.0; // Will take the first available rate

												foreach ($itinerary_details_save as $dkey => $day) {
													if ($dkey >= $itinerary_details_save_cnt) {
														continue;
													}
													$total_permit = $total_permit + $day['permit'];

													// Get sightseeing data from ss_data_json
													$ss_data = json_decode($day['ss_data_json'] ?? '[]', true);
													$ss_names = [];
													$day_ss_cost = 0;

													if (!empty($ss_data)) {
														foreach ($ss_data as $ss) {
															if (!empty($ss['name'])) {
																$ss_names[] = $ss['name'];
															}
															// Add sightseeing cost if available
															if (isset($ss['pax_cost'])) {
																$day_ss_cost += floatval($ss['pax_cost']);
															}
														}
													}

													$ss_name_display = !empty($ss_names) ? implode(', ', $ss_names) : '';
													$total_sightseeing_cost += $day_ss_cost;

													$tourDate = $day['tour_date'];
													$vDetailsAll = json_decode($day['vehicle_details'] ?? '[]');

													$vehicles = array_filter(
														$vDetailsAll,
														fn($v) => $v->tour_date == $tourDate
													);

													if (!$vehicles) {
														continue;
													}

													// Accumulate totals for extra km
													foreach ($vehicles as $v) {
														$travel_distance = (float)($v->travel_distance ?? 0);
														$max_km_day = (float)($v->max_km_day ?? 0);

														$total_travel_distance_all += $travel_distance;
														$total_max_km_day_all += $max_km_day;

														// Get rate from first available vehicle
														if ($extra_km_rate == 0) {
															$extra_km_rate = (float)($v->extra_km_rate ?? 0);
														}
													}

													$rowspan = count($vehicles);
													$first = true;

													foreach ($vehicles as $v) {
														echo '<tr>';

														if ($first) {
															echo '<td rowspan="' . $rowspan . '">' . $dayNo . '</td>';
															echo '<td rowspan="' . $rowspan . '">' . date('d-m-Y', strtotime($tourDate)) . '</td>';
															echo '<td rowspan="' . $rowspan . '">' . $day['transport_remarks'] . '</td>';

															// Display destination with sightseeing names
															if (date("d-m-Y", strtotime($tourDate)) == date("d-m-Y", strtotime($object_det[0]['end_date']))) {
																if (!empty($ss_name_display)) {
																	$final_destination = $ss_name_display . " - " . $dep_name[0]['geog_name'];
																} else {
																	$final_destination = $dep_name[0]['geog_name'];
																}
																echo '<td rowspan="' . $rowspan . '">' . $final_destination . '</td>';
															} else {
																$destination = !empty($ss_name_display) ? $ss_name_display : $day['geog_name'];
																echo '<td rowspan="' . $rowspan . '">' . $destination . '</td>';
															}

															$dayNo++;
															$first = false;
														}

														echo '<td>' . $v->travel_distance . '</td>';
														echo '<td>' . $v->vehicle_model . '</td>';
														// echo '<td>' . number_format($v->day_rent, 2) . '</td>';
														echo '<td>' . ($v->day_rent) . '</td>';
														echo '</tr>';
														$cs_trans_total = $cs_trans_total + $v->day_rent;
														if (isset($v->adhoc_rate) && $v->adhoc_rate > 0) {
															$total_adhoc_rate += $v->adhoc_rate;
														}
													}
												}

												// Calculate total extra kilometers across ALL days
												$total_extra_kilometer = max(0, $total_travel_distance_all - $total_max_km_day_all);
												$total_extra_klm_cost = $total_extra_kilometer * $extra_km_rate;
												$cs_trans_total += $total_extra_klm_cost;

												// Display extra kilometer row only if there's actual extra km
												if ($total_extra_kilometer > 0) {
													echo '<tr>';
													echo '<td colspan="4">Extra Kilometer (Rate: ' . $extra_km_rate . ')</td>';
													echo '<td>' . round($total_extra_kilometer, 2) . '</td>';
													echo '<td></td>';
													echo '<td>' . number_format($total_extra_klm_cost, 0) . '</td>';
													echo '</tr>';
												}
												?>
												?>

												<?php if ($total_sightseeing_cost > 0) { ?>
													<tr>
														<th colspan="6">Total Sightseeing Cost</th>
														<!-- <th><?php echo ($total_sightseeing_cost); ?></th> -->
														<th><?php echo ($total_sightseeing_cost); ?></th>
													</tr>
												<?php } ?>

												<tr>
													<th colspan="6">Other Charges / Permit</th>
													<th><?php echo ($total_permit); ?></th>
												</tr>
												<tr>
													<th colspan="6">Total Transportation Cost</th>
													<th><?php echo ($cs_trans_total + $total_adhoc_rate + $total_permit + $total_sightseeing_cost); ?>
													</th>
												</tr>
											</table>
										</div>
									</div>
							<?php }
							} ?>
							<form id="myTourplanForm1" method="POST" action="<?= site_url('Enquiry/generateCostingSheet'); ?>">
								<input type="hidden" id="no_of_night_hidden" name="no_of_night_hidden" value="<?php echo $object_det[0]['no_of_night']; ?>">
								<input type="hidden" id="tac_hidden" name="tac_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['tac'] ?? '0'); ?>">
								<input type="hidden" id="ttc_hidden" name="ttc_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['ttc'] ?? '0'); ?>">
								<input type="hidden" id="extraklm_hidden" name="extraklm_hidden" value="<?php echo $total_extra_klm_cost; ?>">
								<input type="hidden" id="permit_hidden" name="permit_hidden" value="<?php echo $total_permit; ?>">
								<input type="hidden" id="spcl_hidden" name="spcl_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['special_event'] ?? '0'); ?>">
								<input type="hidden" id="daily_hidden" name="daily_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['extra_charge'] ?? '0'); ?>">
								<input type="hidden" id="extension_ref_id" name="extension_ref_id" value="<?php echo $extension_ref_id; ?>">
								<input type="hidden" name="enquiry_header_id_t" value="<?php echo $object_det[0]['enquiry_header_id']; ?>">
								<input type="hidden" name="enquiry_details_id_t" value="<?php echo $object_det[0]['enquiry_details_id']; ?>">
								<input type="hidden" name="object_id_t" value="<?php echo $object_id; ?>">
								<input type="hidden" id="bifurcation_status" name="bifurcation_status" value="0">
								<input type="hidden" id="tnr_hidden" name="tnr_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['total_rate'] ?? '0'); ?>">
								<input type="hidden" id="tcs_hidden" name="tcs_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['tcs_value'] ?? '0'); ?>">
								<input type="hidden" id="tpc_with_tcs_hidden" name="tpc_with_tcs_hidden" value="<?php echo empty($iti_cost_datas) ? '0' : ($iti_cost_datas[0]['tpc_with_tcs'] ?? ($iti_cost_datas[0]['tpc'] ?? '0')); ?>">

								<?php if (!empty($itinerary_details_save)) {
									if (empty($iti_cost_datas)) {
								?>
										<div class="costing-container" style="background-color:#003300;">
											<div class="table-responsive costing-box">
												<table class="table">
													<tr>
														<th>
															<h5 style="font-weight:bold;color:#003300;">Total Acc Cost : <span id="tac_span"></span></h5>
														</th>
														<th>
															<h5 style="font-weight:bold;color:#003300;">Total Trans Cost : <span id="ttc_span"></span></h5>
														</th>
														<th>
															<h5 style="font-weight:bold;color:#003300;">Special Event : <span id="spcl_span"></span></h5>
														</th>
														<th>
															<h5 style="font-weight:bold;color:#003300;">Extra Charge : <span id="daily_span"></span></h5>
														</th>
														<th>
															<h5 style="font-weight:bold;color:#003300;">Total Net Rate : <span id="tnr_span"></span></h5>
														</th>
													</tr>
												</table>
												<table class="table">
													<tr>
														<td>
															<h5 style="font-weight:bold;color:#003300;">Markup(%)</h5>
														</td>
														<td><input type="text" id="margin_value" name="margin_value" class="form-control input-sm" maxlength="6" value="<?php echo $mark_up; ?>" <?php echo $read_only_ext; ?>></td>
														<td><input type="text" id="margin_total" name="margin_total" class="form-control input-sm" maxlength="6" readonly></td>
													</tr>
													<tr>
														<td>
															<h5 style="font-weight:bold;color:#003300;">Tour Addon</h5>
														</td>
														<td><input type="text" id="tour_addon_value" name="tour_addon_value" class="form-control input-sm" maxlength="6" value="0" <?php echo $read_only_ext; ?>></td>
														<td><input type="text" id="tour_addon_total" name="tour_addon_total" class="form-control input-sm" maxlength="6" readonly></td>
													</tr>
													<tr>
														<td>
															<h5 style="font-weight:bold;color:#003300;">Total</h5>
														</td>
														<td></td>
														<td><input type="text" id="total_final" name="total_final" class="form-control input-sm" maxlength="6" readonly></td>
													</tr>
													<tr>
														<td>
															<h5 style="font-weight:bold;color:#003300;">GST</h5>
														</td>
														<td>
															<select id="gst_value" name="gst_value" class="form-control input-sm" <?php echo $dis_abled_ext; ?>>
																<option value="5">5%</option>
																<option value="18">18%</option>
															</select>
														</td>
														<td><input type="text" id="gst_final" name="gst_final" class="form-control input-sm" maxlength="6" readonly></td>
													</tr>
													<tr>
														<td>
															<h5 style="font-weight:bold;color:#003300;">Total Package Cost</h5>
														</td>
														<td></td>
														<td><input type="text" id="tpc" name="tpc" class="form-control input-sm" maxlength="6" readonly></td>
													</tr>
													<tr>
														<td>
															<h5 style="font-weight:bold;color:#003300;">TCS</h5>
														</td>
														<td>
															<input type="checkbox" id="tcs_checkbox" name="tcs_checkbox" value="0" <?php echo $dis_abled_ext; ?>> 5%
														</td>
														<td><input type="text" id="tcs_final" name="tcs_final" class="form-control input-sm" maxlength="6" value="0" readonly></td>
													</tr>
													<tr id="final_tpc_row" style="display: none;">
														<td>
															<h5 style="font-weight:bold;color:#003300;">Total Package Cost(With TCS)</h5>
														</td>
														<td></td>
														<td><input type="text" id="tpc_with_tcs" name="tpc_with_tcs" class="form-control input-sm" maxlength="6" readonly value="0"></td>
													</tr>
												</table>
											<?php } else { ?>
												<div class="costing-container" style="background-color:#003300;">
													<div class="table-responsive costing-box">
														<table class="table">
															<tr>
																<th>
																	<h5 style="font-weight:bold;color:#003300;">Total Acc Cost : <span id="tac_span"><?php echo $iti_cost_datas[0]['tac'] ?? ''; ?></span></h5>
																</th>
																<th>
																	<h5 style="font-weight:bold;color:#003300;">Total Trans Cost : <span id="ttc_span"><?php echo $iti_cost_datas[0]['ttc'] ?? ''; ?></span></h5>
																</th>
																<th>
																	<?php
																	// Extract special events from itinerary_details_save
																	$special_events_list = [];
																	if (!empty($itinerary_details_save)) {
																		foreach ($itinerary_details_save as $iti_detail) {
																			$json_special_event = $iti_detail['json_special_event'] ?? '[]';
																			$events = json_decode($json_special_event, true);

																			if (!empty($events) && is_array($events)) {
																				foreach ($events as $event) {
																					// KEY IS 'spcl_event' not 'special_event'
																					if (isset($event['spcl_event']) && !empty(trim($event['spcl_event']))) {
																						$special_events_list[] = trim($event['spcl_event']);
																					}
																				}
																			}
																		}
																	}

																	// Get unique special event names
																	$unique_special_events = array_unique(array_filter($special_events_list));
																	?>

																	<h5 style="font-weight:bold;color:#003300;">
																		Special Event:
																		<span id="spcl_span">
																			<?php echo $iti_cost_datas[0]['special_event'] ?? ''; ?>
																		</span>
																		<?php if (!empty($unique_special_events)): ?>
																			(<?php echo implode(', ', $unique_special_events); ?>)
																		<?php endif; ?>
																	</h5>
																</th>
																<th>
																	<h5 style="font-weight:bold;color:#003300;">Extra Charge : <span id="daily_span"><?php echo $iti_cost_datas[0]['extra_charge'] ?? ''; ?></span></h5>
																</th>
																<th>
																	<h5 style="font-weight:bold;color:#003300;">Total Net Rate : <span id="tnr_span"><?php echo $iti_cost_datas[0]['total_rate'] ?? ''; ?></span></h5>
																</th>
															</tr>
														</table>
														<table class="table">
															<tr>
																<td>
																	<h5 style="font-weight:bold;color:#003300;">Markup(%)</h5>
																</td>
																<td><input type="text" id="margin_value" name="margin_value" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['margin_per'] ?? $mark_up; ?>" <?php echo $read_only_ext; ?>></td>
																<td><input type="text" id="margin_total" name="margin_total" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['margin_value'] ?? '0'; ?>" readonly></td>
															</tr>
															<tr>
																<td>
																	<h5 style="font-weight:bold;color:#003300;">Tour Addon</h5>
																</td>
																<td><input type="text" id="tour_addon_value" name="tour_addon_value" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['tour_addon'] ?? '0'; ?>" <?php echo $read_only_ext; ?>></td>
																<td><input type="text" id="tour_addon_total" name="tour_addon_total" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['tour_addon'] ?? '0'; ?>" readonly></td>
															</tr>
															<tr>
																<td>
																	<h5 style="font-weight:bold;color:#003300;">Total</h5>
																</td>
																<td></td>
																<td><input type="text" id="total_final" name="total_final" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['total_rate'] ?? '0'; ?>" readonly></td>
															</tr>
															<tr>
																<td>
																	<h5 style="font-weight:bold;color:#003300;">GST</h5>
																</td>
																<td>
																	<select id="gst_value" name="gst_value" class="form-control input-sm" <?php echo $dis_abled_ext; ?>>
																		<?php
																		$saved_gst_per = $iti_cost_datas[0]['gst_per'] ?? '18'; // Default to 18 if not set
																		if ($saved_gst_per == "5") { ?>
																			<option value="5" selected>5%</option>
																			<option value="18">18%</option>
																		<?php } else { ?>
																			<option value="5">5%</option>
																			<option value="18" selected>18%</option>
																		<?php } ?>
																	</select>
																</td>
																<td><input type="text" id="gst_final" name="gst_final" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['gst_value'] ?? '0'; ?>" readonly></td>
															</tr>
															<tr>
																<td>
																	<h5 style="font-weight:bold;color:#003300;">Total Package Cost</h5>
																</td>
																<td></td>
																<td><input type="text" id="tpc" name="tpc" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['tpc'] ?? '0'; ?>" readonly></td>
															</tr>
															<tr>
																<td>
																	<h5 style="font-weight:bold;color:#003300;">TCS</h5>
																</td>
																<td>
																	<input type="checkbox" id="tcs_checkbox" name="tcs_checkbox" value="1" <?php echo ($iti_cost_datas[0]['is_tcs'] ?? 0) ? 'checked' : ''; ?> <?php echo $dis_abled_ext; ?>> 5%
																</td>
																<td><input type="text" id="tcs_final" name="tcs_final" class="form-control input-sm" maxlength="6" value="<?php echo $iti_cost_datas[0]['tcs_value'] ?? '0'; ?>" readonly></td>
															</tr>
															<tr id="final_tpc_row" style="display: <?php echo ($iti_cost_datas[0]['is_tcs'] ?? 0) ? 'table-row' : 'none'; ?>;">
																<td>
																	<h5 style="font-weight:bold;color:#003300;"> Total Package Cost(With TCS)</h5>
																</td>
																<td></td>
																<td><input type="text" id="tpc_with_tcs" name="tpc_with_tcs" class="form-control input-sm" maxlength="6" readonly value="<?php echo $iti_cost_datas[0]['tpc_with_tcs'] ?? ($iti_cost_datas[0]['tpc'] ?? '0'); ?>"></td>
															</tr>
														</table>

												<?php
											}
										} ?>
													</div>
												</div>

												<!---------------------------------------Bifurcation----------------------------------------------------------------------->
												<?php
												if (!empty($itinerary_details_save)) {
													$ttc_bifur = $cs_trans_total + $total_permit;
													$no_of_pax_bifur = $object_det[0]['no_of_adult'];
													$total_no_of_pax_bifur = $object_det[0]['no_of_adult'] + $object_det[0]['no_of_child_with_bed'] + $object_det[0]['no_of_child_without_bed'];
												?>
													<div class="costing-container" style="display:none;" id="bifur_div">
														<h4 style="text-align:center; color: #004d00; font-weight: bold; font-style: italic;font-size: 20px;">Bifurcation</h4>
														<div class="table-responsive costing-box">
															<table class="table table-bordered costing-table">
																<tr>
																	<th>Si No</th>
																	<th>No Of Pax</th>
																	<th>Total Cost</th>
																	<th>Per Person</th>
																</tr>
																<tr>
																	<td>Transportation cost</td>
																	<td>
																		<input type="text" id="no_of_pax_b" name="no_of_pax_b" value="<?php echo $no_of_pax_bifur; ?>" style="width:50px;">
																	</td>
																	<td>
																		<span id="ttc_bifur_span"><?php echo $ttc_bifur; ?></span>
																		<input type="hidden" id="ttc_bifur_hd" name="ttc_bifur_hd" value="<?php echo $ttc_bifur; ?>">
																	</td>
																	<td>
																		<span id="ttc_bifur_span_pp"><?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?></span>
																		<input type="hidden" id="ttc_bifur_hd_pp" name="ttc_bifur_hd_pp" value="<?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?>">
																	</td>
																</tr>
																<tr>
																	<td>Sight Seeing cost</td>
																	<td>
																		<input type="text" id="no_of_pax_bs" name="no_of_pax_bs" value="<?php echo $total_no_of_pax_bifur; ?>" style="width:50px;">
																	</td>
																	<td>
																		<span id="bifur_ss_span"></span>
																		<input type="hidden" id="bifur_ss_hidden" name="bifur_ss_hidden" value="0">
																	</td>
																	<td>
																		<span id="bifur_ss_span_pp"></span>
																		<input type="hidden" id="bifur_ss_hidden_pp" name="bifur_ss_hidden_pp" value="0">
																	</td>
																</tr>
																<tr>
																	<td>Round Off</td>
																	<td>
																		<input type="text" id="no_of_pax_br" name="no_of_pax_br" value="<?php echo $total_no_of_pax_bifur; ?>" style="width:50px;">
																	</td>
																	<td>
																		<span id="round_off_span"></span>
																		<input type="hidden" id="round_off_hidden" name="round_off_hidden" value="0">
																	</td>
																	<td>
																		<span id="round_off_span_pp"></span>
																		<input type="hidden" id="round_off_hidden_pp" name="round_off_hidden_pp" value="0">
																	</td>
																</tr>
															</table>
														</div>

														<div class="table-responsive costing-box">
															<table class="table table-bordered costing-table">
																<tr>
																	<th>Si No</th>
																	<th>No Of Pax</th>
																	<th>Cost</th>
																	<th>Per Person</th>
																	<th>Vehicle</th>
																	<th>sight Seeing</th>
																	<th>Total</th>
																	<th>Margin</th>
																	<th>Net Total</th>
																	<th>Round Off</th>
																	<th>GSTIN</th>
																	<th>Grand Total</th>
																</tr>
																<tr>
																	<td>Double</td>
																	<td>
																		<span id="by_double_pax_span"><?php echo $object_det[0]['no_of_double_room'] * 2; ?></span>
																		<input type="hidden" id="by_double_pax_hidden" name="by_double_pax_hidden" value="<?php echo $object_det[0]['no_of_double_room'] * 2; ?>">
																	</td>
																	<td>
																		<span id="bifur_double_total_span"><?php echo $bifur_double_total; ?></span>
																		<input type="hidden" id="bifur_double_total_hidden" name="bifur_double_total_hidden" value="<?php echo $bifur_double_total; ?>">
																	</td>
																	<td>
																		<span id="bifur_double_pp_span"><?php echo round($bifur_double_total / ($object_det[0]['no_of_double_room'] * 2), 2); ?></span>
																		<input type="hidden" id="bifur_double_pp_hidden" name="bifur_double_pp_hidden" value="<?php echo round($bifur_double_total / ($object_det[0]['no_of_double_room'] * 2), 2); ?>">
																	</td>
																	<td>
																		<span id="ttc_bifur_span_double_span"><?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?></span>
																		<input type="hidden" id="ttc_bifur_double_hd" name="ttc_bifur_double_hd" value="<?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?>">
																	</td>
																	<td>
																		<span id="ss_bifur_double_span_pp">0</span>
																		<input type="hidden" id="ss_bifur_double_hd_pp" name="ss_bifur_double_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="total_bifur_double_span_pp">0</span>
																		<input type="hidden" id="total_bifur_double_hd_pp" name="total_bifur_double_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="margin_bifur_double_span_pp">0</span>
																		<input type="hidden" id="margin_bifur_double_hd_pp" name="margin_bifur_double_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="net_bifur_double_span_pp">0</span>
																		<input type="hidden" id="net_bifur_double_hd_pp" name="net_bifur_double_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="round_bifur_double_span_pp">0</span>
																		<input type="hidden" id="round_bifur_double_hd_pp" name="round_bifur_double_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="gst_bifur_double_span_pp">0</span>
																		<input type="hidden" id="gst_bifur_double_hd_pp" name="gst_bifur_double_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="grand_bifur_double_span_pp">0</span>
																		<input type="hidden" id="grand_bifur_double_hd_pp" name="grand_bifur_double_hd_pp" value="0">
																	</td>
																</tr>
																<tr>
																	<td>Single</td>
																	<td>
																		<span id="by_single_pax_span"><?php echo $object_det[0]['no_of_single_room']; ?></span>
																		<input type="hidden" id="by_single_pax_hidden" name="by_single_pax_hidden" value="<?php echo $object_det[0]['no_of_single_room']; ?>">
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_single_room'] > 0) { ?>
																			<span id="bifur_single_total_span"><?php echo $bifur_single_total; ?></span>
																			<input type="hidden" id="bifur_single_total_hidden" name="bifur_single_total_hidden" value="<?php echo $bifur_single_total; ?>">
																		<?php } else { ?>
																			<span id="bifur_single_total_span">0</span>
																			<input type="hidden" id="bifur_single_total_hidden" name="bifur_single_total_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_single_room'] > 0) { ?>
																			<span id="bifur_single_pp_span"><?php echo round($bifur_single_total / ($object_det[0]['no_of_single_room']), 2); ?></span>
																			<input type="hidden" id="bifur_single_pp_hidden" name="bifur_single_pp_hidden" value="<?php echo round($bifur_single_total / ($object_det[0]['no_of_single_room']), 2); ?>">
																		<?php } else { ?>
																			<span id="bifur_single_pp_span">0</span>
																			<input type="hidden" id="bifur_single_pp_hidden" name="bifur_single_pp_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_single_room'] > 0) { ?>
																			<span id="ttc_bifur_span_single_span"><?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?></span>
																			<input type="hidden" id="ttc_bifur_single_hd" name="ttc_bifur_single_hd" value="<?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?>">
																		<?php } else { ?>
																			<span id="ttc_bifur_span_single_span">0</span>
																			<input type="hidden" id="ttc_bifur_single_hd" name="ttc_bifur_single_hd" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<span id="ss_bifur_single_span_pp">0</span>
																		<input type="hidden" id="ss_bifur_single_hd_pp" name="ss_bifur_single_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="total_bifur_single_span_pp">0</span>
																		<input type="hidden" id="total_bifur_single_hd_pp" name="total_bifur_single_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="margin_bifur_single_span_pp">0</span>
																		<input type="hidden" id="margin_bifur_single_hd_pp" name="margin_bifur_single_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="net_bifur_single_span_pp">0</span>
																		<input type="hidden" id="net_bifur_single_hd_pp" name="net_bifur_single_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="round_bifur_single_span_pp">0</span>
																		<input type="hidden" id="round_bifur_single_hd_pp" name="round_bifur_single_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="gst_bifur_single_span_pp">0</span>
																		<input type="hidden" id="gst_bifur_single_hd_pp" name="gst_bifur_single_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="grand_bifur_single_span_pp">0</span>
																		<input type="hidden" id="grand_bifur_single_hd_pp" name="grand_bifur_single_hd_pp" value="0">
																	</td>
																</tr>
																<tr>
																	<td>Child</td>
																	<td>
																		<span id="by_child_pax_span"><?php echo $object_det[0]['no_of_child_with_bed']; ?></span>
																		<input type="hidden" id="by_child_pax_hidden" name="by_child_pax_hidden" value="<?php echo $object_det[0]['no_of_child_with_bed']; ?>">
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_child_with_bed'] > 0) { ?>
																			<span id="bifur_child_total_span"><?php echo $bifur_child_total; ?></span>
																			<input type="hidden" id="bifur_child_total_hidden" name="bifur_child_total_hidden" value="<?php echo $bifur_child_total; ?>">
																		<?php } else { ?>
																			<span id="bifur_child_total_span">0</span>
																			<input type="hidden" id="bifur_child_total_hidden" name="bifur_child_total_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_child_with_bed'] > 0) { ?>
																			<span id="bifur_child_pp_span"><?php echo round($bifur_child_total / ($object_det[0]['no_of_child_with_bed']), 2); ?></span>
																			<input type="hidden" id="bifur_child_pp_hidden" name="bifur_child_pp_hidden" value="<?php echo round($bifur_child_total / ($object_det[0]['no_of_child_with_bed']), 2); ?>">
																		<?php } else { ?>
																			<span id="bifur_child_pp_span">0</span>
																			<input type="hidden" id="bifur_child_pp_hidden" name="bifur_child_pp_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<span id="ttc_bifur_span_child_span">0</span>
																		<input type="hidden" id="ttc_bifur_child_hd" name="ttc_bifur_child_hd" value="0">
																	</td>
																	<td>
																		<span id="ss_bifur_child_span_pp">0</span>
																		<input type="hidden" id="ss_bifur_child_hd_pp" name="ss_bifur_child_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="total_bifur_child_span_pp">0</span>
																		<input type="hidden" id="total_bifur_child_hd_pp" name="total_bifur_child_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="margin_bifur_child_span_pp">0</span>
																		<input type="hidden" id="margin_bifur_child_hd_pp" name="margin_bifur_child_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="net_bifur_child_span_pp">0</span>
																		<input type="hidden" id="net_bifur_child_hd_pp" name="net_bifur_child_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="round_bifur_child_span_pp">0</span>
																		<input type="hidden" id="round_bifur_child_hd_pp" name="round_bifur_child_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="gst_bifur_child_span_pp">0</span>
																		<input type="hidden" id="gst_bifur_child_hd_pp" name="gst_bifur_child_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="grand_bifur_child_span_pp">0</span>
																		<input type="hidden" id="grand_bifur_child_hd_pp" name="grand_bifur_child_hd_pp" value="0">
																	</td>
																</tr>
																<tr>
																	<td>Child WB</td>
																	<td>
																		<span id="by_child_wb_pax_span"><?php echo $object_det[0]['no_of_child_without_bed']; ?></span>
																		<input type="hidden" id="by_child_wb_pax_hidden" name="by_child_wb_pax_hidden" value="<?php echo $object_det[0]['no_of_child_without_bed']; ?>">
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_child_without_bed'] > 0) { ?>
																			<span id="bifur_child_wb_total_span"><?php echo $bifur_child_wb_total; ?></span>
																			<input type="hidden" id="bifur_child_wb_total_hidden" name="bifur_child_wb_total_hidden" value="<?php echo $bifur_child_wb_total; ?>">
																		<?php } else { ?>
																			<span id="bifur_child_wb_total_span">0</span>
																			<input type="hidden" id="bifur_child_wb_total_hidden" name="bifur_child_wb_total_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_child_without_bed'] > 0) { ?>
																			<span id="bifur_child_wb_pp_span"><?php echo round($bifur_child_wb_total / ($object_det[0]['no_of_child_without_bed']), 2); ?></span>
																			<input type="hidden" id="bifur_child_wb_pp_hidden" name="bifur_child_wb_pp_hidden" value="<?php echo round($bifur_child_wb_total / ($object_det[0]['no_of_child_without_bed']), 2); ?>">
																		<?php } else { ?>
																			<span id="bifur_child_wb_pp_span">0</span>
																			<input type="hidden" id="bifur_child_wb_pp_hidden" name="bifur_child_wb_pp_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<span id="ttc_bifur_span_child_wb_span">0</span>
																		<input type="hidden" id="ttc_bifur_child_wb_hd" name="ttc_bifur_child_wb_hd" value="0">
																	</td>
																	<td>
																		<span id="ss_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="ss_bifur_child_wb_hd_pp" name="ss_bifur_child_wb_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="total_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="total_bifur_child_wb_hd_pp" name="total_bifur_child_wb_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="margin_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="margin_bifur_child_wb_hd_pp" name="margin_bifur_child_wb_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="net_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="net_bifur_child_wb_hd_pp" name="net_bifur_child_wb_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="round_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="round_bifur_child_wb_hd_pp" name="round_bifur_child_wb_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="gst_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="gst_bifur_child_wb_hd_pp" name="gst_bifur_child_wb_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="grand_bifur_child_wb_span_pp">0</span>
																		<input type="hidden" id="grand_bifur_child_wb_hd_pp" name="grand_bifur_child_wb_hd_pp" value="0">
																	</td>
																</tr>
																<tr>
																	<td>Extra</td>
																	<td>
																		<span id="by_extra_pax_span"><?php echo $object_det[0]['no_of_extra_bed']; ?></span>
																		<input type="hidden" id="by_extra_pax_hidden" name="by_extra_pax_hidden" value="<?php echo $object_det[0]['no_of_extra_bed']; ?>">
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																			<span id="bifur_extra_total_span"><?php echo $bifur_extra_total; ?></span>
																			<input type="hidden" id="bifur_extra_total_hidden" name="bifur_extra_total_hidden" value="<?php echo $bifur_extra_total; ?>">
																		<?php } else { ?>
																			<span id="bifur_extra_total_span">0</span>
																			<input type="hidden" id="bifur_extra_total_hidden" name="bifur_extra_total_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																			<span id="bifur_extra_pp_span"><?php echo round($bifur_extra_total / ($object_det[0]['no_of_extra_bed']), 2); ?></span>
																			<input type="hidden" id="bifur_extra_pp_hidden" name="bifur_extra_pp_hidden" value="<?php echo round($bifur_extra_total / ($object_det[0]['no_of_extra_bed']), 2); ?>">
																		<?php } else { ?>
																			<span id="bifur_extra_pp_span">0</span>
																			<input type="hidden" id="bifur_extra_pp_hidden" name="bifur_extra_pp_hidden" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<?php if ($object_det[0]['no_of_extra_bed'] > 0) { ?>
																			<span id="ttc_bifur_span_extra_span"><?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?></span>
																			<input type="hidden" id="ttc_bifur_extra_hd" name="ttc_bifur_extra_hd" value="<?php echo round($ttc_bifur / $no_of_pax_bifur, 2); ?>">
																		<?php } else { ?>
																			<span id="ttc_bifur_span_extra_span">0</span>
																			<input type="hidden" id="ttc_bifur_extra_hd" name="ttc_bifur_extra_hd" value="0">
																		<?php } ?>
																	</td>
																	<td>
																		<span id="ss_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="ss_bifur_extra_hd_pp" name="ss_bifur_extra_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="total_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="total_bifur_extra_hd_pp" name="total_bifur_extra_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="margin_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="margin_bifur_extra_hd_pp" name="margin_bifur_extra_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="net_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="net_bifur_extra_hd_pp" name="net_bifur_extra_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="round_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="round_bifur_extra_hd_pp" name="round_bifur_extra_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="gst_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="gst_bifur_extra_hd_pp" name="gst_bifur_extra_hd_pp" value="0">
																	</td>
																	<td>
																		<span id="grand_bifur_extra_span_pp">0</span>
																		<input type="hidden" id="grand_bifur_extra_hd_pp" name="grand_bifur_extra_hd_pp" value="0">
																	</td>
																</tr>
															</table>
														</div>
													</div>

													<!------------------------------------------------------------------------------------->
													<table class="table">
														<tr>
															<th>
																<button type="button" id="calculate_bifur" class="btn btn-dark btn-sm">Show Bifurcation</button>
															</th>
															<th>
																<button type="button" id="recalculate_bifur" class="btn btn-primary btn-sm" style="display:none">Calculate Bifurcation</button>
															</th>
															<th>
																<input type="text" id="cs_name" name="cs_name" class="form-control input-sm" maxlength="50" placeholder="Enter Costing Sheet Name">
															</th>
															<th>
																<?php if ($final_save_flag == 0) { ?>
																	<a href="<?= site_url('Enquiry/enquiry_list_view/10'); ?>" id="cancel_cost_sheet_id" data-toggle="tooltip" data-original-title="Itinerary Details" style="float:left;">Cancel</a>
																<?php } ?>
																<?php if ($final_save_flag == 1 || $iti_edit_id == 1) {
																	if ($extension_disable == 0) {
																?>
																		<button type="" id="view_cost_sheet_id" class="btn btn-success" style="float:right;">Save Costing Sheet</button>
																<?php }
																} ?>
															</th>
														</tr>
													</table>
												<?php } ?>
							</form>

							<input type="hidden" id="is_saved_load" value="<?php echo empty($iti_cost_datas) ? '0' : '1'; ?>">
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
					Copyright © 2025 <a href="#" class="fs-14 text-primary">KHM</a>. Designed by <a
						href="https://megatrendkms.co.in" class="fs-14 text-primary" target="_blank">Megatrend Knowledge
						Management Systems Pvt Ltd</a> All rights reserved.
				</div>
			</div>
		</footer>
		<!-- Footer closed -->
	</div>

	<!-- Back to top -->
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

	<!-- Sidemenu-respoansive-tabs js -->
	<script
		src="<?php echo base_url('assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js'); ?>"></script>

	<!-- Leftmenu js -->
	<script src="<?php echo base_url('assets/js/left-menu.js'); ?>"></script>

	<!-- Data tables -->
	<script src="<?php echo base_url('assets/plugins/datatable1/js/jquery.dataTables.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable1/js/dataTables.bootstrap4.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable1/js/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable1/js/buttons.bootstrap4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable1/dataTables.responsive.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/datatable1/responsive.bootstrap4.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/editable.js'); ?>"></script>

	<!-- Rightsidebar js -->
	<script src="<?php echo base_url('assets/plugins/sidebar/sidebar.js'); ?>"></script>

	<!-- Custom js -->
	<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
	<script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/select2.js'); ?>"></script>

</body>

</html>
<script>
	function selectagent() {
		var change_value = $('#agent_state').val();
		if (change_value == "") {
			alert('Select a state!');
		} else {
			$.ajax({
				url: "<?= site_url('Enquiry/getAgents'); ?>",
				method: "POST",
				data: {
					location_id: change_value
				},
				success: function(data) {
					$('#agent_id').html(data);
				}
			});
		}
	}
</script>

<script>
	function select_vehicle() {
		var change_value = $('#hub_location').val();
		if (hub_location == "") {
			alert('Select Hub Location!');
		} else {
			$.ajax({
				url: "<?= site_url('Enquiry/getVehicleTypes'); ?>",
				method: "POST",
				data: {
					location_id: change_value
				},
				success: function(data) {
					$('#vehicle_type').html(data);
				}
			});
		}
	}
</script>

<script>
	function selectagentdet() {
		var agent_id = $('#agent_id').val();
		if (agent_id == "") {
			alert('Select Agent');
		} else {
			$.ajax({
				url: '<?= site_url('Enquiry/getAgentDetails'); ?>',
				type: 'POST',
				data: {
					agent_id: agent_id
				},
				dataType: 'json',
				success: function(data) {
					var address_temp = data[0].entity_address;
					$('#agent_address').text(address_temp);
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		}
	}
</script>
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
		const newUrl = '<?php echo site_url('Enquiry/add_object_enquiry/10'); ?>'
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
	$(document).ready(function() {
		function calculateTotalPax() {
			var noOfAdult = parseInt($('#no_of_adult').val()) || 0;
			var noOfChildWithBed = parseInt($('#no_of_child_with_bed').val()) || 0;
			var noOfChildWithoutBed = parseInt($('#no_of_child_without_bed').val()) || 0;

			var totalPax = noOfAdult + noOfChildWithBed + noOfChildWithoutBed;
			$('#total_no_of_pax').val(totalPax);
		}

		$('#no_of_adult, #no_of_child_with_bed, #no_of_child_without_bed').on('input', calculateTotalPax);
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		var i = 0;
		$('#vehicle_type').on('change', function() {
			var v_id = $("#vehicle_type").val();
			$('#vehicle_dynamic_head').html('<tr><th>Vehicle Type</th><th>Count</th><th>Remove</th></tr>');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>/Enquiry/get_vehicle_name",
				data: {
					v_id: v_id
				},
				dataType: 'json',
				success: function(response) {
					i++;
					$('#vehicle_dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="hidden" name="addmore[' + i + '][v_id]" value="' + response[0].vehicle_type_id + '"/><input type="text" name="addmore[' + i + '][v_name]" value="' + response[0].vehicle_model_name + '" class="form-control form-control-sm"></td><td><select class="form-control select2 custom-select" name="addmore[' + i + '][v_count]" aria-label="Default select example"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_agency_remove">X</button></td></tr>');
				}
			});
		});
		$(document).on('click', '.btn_agency_remove', function() {
			var button_id = $(this).attr("id");
			$('#row' + button_id + '').remove();
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#btn_back").click(function() {
			$('.nav a[href="#tab-5"]').tab('show');
		});
	});
</script>
<script>
	$(document).ready(function() {
		function toggleVehicleFields() {
			var isVehicleRequired = $("#is_vehicle_req").val();
			if (isVehicleRequired === "1") {
				$("#hub_location, #vehicle_type").prop("disabled", false);
			} else {
				$("#hub_location, #vehicle_type").prop("disabled", true).val(""); // Clear selection when disabled
				$("#vehicle_dynamic_field").html('');
			}
		}

		// Call on page load (in case of pre-selected value)
		toggleVehicleFields();

		// Attach change event
		$("#is_vehicle_req").change(function() {
			toggleVehicleFields();
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#no_of_days, #tour_start_date').on('input change', function() {
			var startDate = $('#tour_start_date').val();
			var noOfDays = parseInt($('#no_of_days').val());

			if (startDate && noOfDays > 0) {
				var startDateObj = new Date(startDate);
				startDateObj.setDate(startDateObj.getDate() + noOfDays);

				var yyyy = startDateObj.getFullYear();
				var mm = String(startDateObj.getMonth() + 1).padStart(2, '0');
				var dd = String(startDateObj.getDate()).padStart(2, '0');
				var endDate = yyyy + '-' + mm + '-' + dd;

				$('#tour_end_date').val(endDate);
			} else {
				if (startDate == null || startDate == '' || startDate == 'undefined') {
					var alerttHTML = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<span class="alert-inner--icon"><i class="fe fe-info"></i></span>
					<span class="alert-inner--text">Required</span>
					<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>`;

					$('#startdate-alert').html(alerttHTML);
					setTimeout(function() {
						$(".alert").fadeOut("slow", function() {
							$(this).remove();
						});
					}, 2000);
				}
				$('#tour_end_date').val('');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z]+(\.[a-zA-Z]+)+$/;

		$("#guest_email").on("input keyup", function() {
			var email = $(this).val();

			if (emailPattern.test(email)) {
				$("#email_error").hide();
				$(this).css("border", "2px solid green");
			} else {
				$("#email_error").show();
				$(this).css("border", "2px solid red");
			}
		});

		// Clear field when clicking outside if invalid
		$("#guest_email").on("blur", function() {
			var email = $(this).val();

			if (!emailPattern.test(email)) {
				$(this).val(""); // Clear input
				$(this).css("border", ""); // Reset border color
				$("#email_error").hide(); // Hide error message
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$("#guest_mobile").on("keyup", function() {
			var mobile = $(this).val();

			// Remove non-numeric characters
			mobile = mobile.replace(/\D/g, '');
			$(this).val(mobile); // Set cleaned value back

			// Check if exactly 10 digits
			if (mobile.length === 10) {
				$("#mobile_error").hide();
				$(this).css("border", "2px solid green");
			} else {
				$("#mobile_error").show();
				$(this).css("border", "2px solid red");
			}
		});

		// Clear field if invalid when clicking outside
		$("#guest_mobile").on("blur", function() {
			var mobile = $(this).val();

			if (mobile.length !== 10) {
				$(this).val(""); // Clear input
				$(this).css("border", ""); // Reset border color
				$("#mobile_error").hide(); // Hide error message
			}
		});
	});
</script>

<script>
	$(document).on('change', '.hotel_change', function() {
		var hotel_id = $(this).val();
		var id = $(this).attr('data-id');
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		$.ajax({
			url: "<?= site_url('Enquiry/getTourRoomCategory'); ?>",
			method: "POST",
			dataType: "json", // Add this to automatically parse JSON
			data: {
				hotel_id: hotel_id,
				no_of_double_room: no_of_double_room,
				no_of_single_room: no_of_single_room
			},
			success: function(data) {
				// Extract the HTML output from the JSON response
				$('#roomcat' + id).html(data.output);

				// Optional: Use hotel_status if needed
				if (data.hotel_status == 0) {
					console.log('No rooms available');
				}
			}
		});
		$.ajax({
			url: "<?= site_url('Enquiry/getHotelfacilities'); ?>",
			method: "POST",
			data: {
				hotel_id: hotel_id,
			},
			success: function(data) {
				$('#hotfac' + id).html(data);
				$('#hotfac' + id).trigger('change');
			}
		});

	});
</script>
<script>
	$(document).on('change', '.hotel_change_draft', function() {
		var hotel_id = $(this).val();
		var id = $(this).attr('data-id');
		var rid = $(this).attr('data-rid');
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		$.ajax({
			url: "<?= site_url('Enquiry/getTourRoomCategoryDraft'); ?>",
			method: "POST",
			data: {
				hotel_id: hotel_id,
				rid: rid,
				no_of_double_room: no_of_double_room,
				no_of_single_room: no_of_single_room
			},
			success: function(data) {
				$('#roomcat' + id).html(data);
			}
		});

		$.ajax({
			url: "<?= site_url('Enquiry/getHotelfacilities'); ?>",
			method: "POST",
			data: {
				hotel_id: hotel_id,
			},
			success: function(data) {
				$('#hotfac' + id).html(data);
				$('#hotfac' + id).trigger('change');
			}
		});

	});
</script>
<script>
	$(document).on('change', '.hotel_cat_change', function() {
		var hotel_cat_id = $(this).val();
		var id = $(this).attr('data-id');
		var tour_location_id = $('#tour_location_id' + id).val();
		var is_quick_quote = <?php echo $object_det[0]['is_quick_quote'] ? $object_det[0]['is_quick_quote'] : 0; ?>;
		$.ajax({
			url: "<?= site_url('Enquiry/getTourHotels'); ?>",
			method: "POST",
			data: {
				hotel_cat_id: hotel_cat_id,
				is_quick_quote: is_quick_quote,
				tour_location_id: tour_location_id
			},
			success: function(data) {
				$('#hotelid' + id).html(data);
				$('#roomcat' + id).empty().append('<option value="">Select</option>');
				$('#hotelid' + id).trigger('change');
			}
		});
	});
</script>
<script>
	$(document).on('change', '.hotel_cat_change_draft', function() {
		var hotel_cat_id = $(this).val();
		var id = $(this).attr('data-id');
		var hid = $(this).attr('data-hid');
		var tour_location_id = $('#tour_location_id' + id).val();
		var is_quick_quote = <?php echo $object_det[0]['is_quick_quote'] ? $object_det[0]['is_quick_quote'] : 0; ?>;
		$.ajax({
			url: "<?= site_url('Enquiry/getTourHotelsDraft'); ?>",
			method: "POST",
			data: {
				hotel_cat_id: hotel_cat_id,
				is_quick_quote: is_quick_quote,
				tour_location_id: tour_location_id,
				hid: hid
			},
			success: function(data) {
				$('#hotelid' + id).html(data);
				$('#roomcat' + id).empty().append('<option value="">Select</option>');
				$('#hotelid' + id).trigger('change');
			}
		});
	});
</script>
<!-- <script>
	$(document).on('change', '.room_cat_change', function() {
		var iti_edit_id = <?php echo isset($iti_edit_id) && $iti_edit_id !== '' ? $iti_edit_id : 0; ?>;
		var id = $(this).attr('data-id');
		var sid = $(this).attr('data-sid');
		if (sid == "2") {

			var dataIndex = $(this).closest('[data-index]').data('index');
			var first_hotel = $('#hotelid' + dataIndex).val();
			var first_rc = $('#roomcat' + dataIndex).val();

			var $row = $(this).closest('.dynamic-added');
			var currentId = $row.attr('id');
			var selectedHotel = $row.find('.hotel').val();
			var selectedRoomCat = $row.find('.room_cat').val();
			var isDuplicate = false;

			$('[data-index="' + dataIndex + '"] .dynamic-added').each(function() {
				var rowId = $(this).attr('id');
				if (rowId !== currentId) {
					var hotel = $(this).find('.hotel').val();
					var roomcat = $(this).find('.room_cat').val();
					if (hotel === selectedHotel && roomcat === selectedRoomCat) {
						isDuplicate = true;
						return false;
					}
				}
			});
			if (selectedHotel === first_hotel && selectedRoomCat === first_rc) {
				isDuplicate = true;
			}

			if (isDuplicate) {
				alert("This hotel and room category combination already exists.");
				$row.find('.room_cat').val('');
			} else {
				var room_cat_id = $(this).val();
				if (room_cat_id == 0) {
					$('#own_arrange' + id).val(1);
					$('#d_adult_rate' + id).val(0).prop('readonly', true);
					$('#d_child_rate' + id).val(0).prop('readonly', true);
					$('#d_child_wb_rate' + id).val(0).prop('readonly', true);
					$('#d_extra_bed_rate' + id).val(0).prop('readonly', true);

					$('#s_adult_rate' + id).val(0).prop('readonly', true);
					$('#s_child_rate' + id).val(0).prop('readonly', true);
					$('#s_child_wb_rate' + id).val(0).prop('readonly', true);
					$('#s_extra_bed_rate' + id).val(0).prop('readonly', true);

				} else {
					$('#own_arrange' + id).val(0);
					if (iti_edit_id == 0) {
						$('#d_adult_rate' + id).prop('readonly', false);
						$('#d_child_rate' + id).prop('readonly', false);
						$('#d_child_wb_rate' + id).prop('readonly', false);
						$('#d_extra_bed_rate' + id).prop('readonly', false);

						$('#s_adult_rate' + id).prop('readonly', false);
					}
					//$('#s_child_rate'+id).prop('readonly', false);
					//$('#s_child_wb_rate'+id).prop('readonly', false);
					//$('#s_extra_bed_rate'+id).prop('readonly', false);

					var mealplan = $('#meal_plan_id' + id).val();
					var hotel_id = $('#hotelid' + id).val();
					var double = $('#double' + id).val();
					var single = $('#single' + id).val();
					var tour_date = $('#tour_date' + id).val();
					var tour_location_id = $('#tour_location_id' + id).val();
					var tax_status = $('#tax_status' + id).val();

					$.ajax({
						url: "<?= site_url('Enquiry/getTourTariffDetailsbydate'); ?>",
						method: "POST",
						data: {
							hotel_id: hotel_id,
							room_cat_id: room_cat_id,
							mealplan: mealplan,
							double: double,
							single: single,
							id: id,
							tour_location_id: tour_location_id,
							tour_date: tour_date
						},
						dataType: 'json',
						success: function(data) {
							//if(data.length > 0){

							var no_of_ch = parseInt($('#no_of_ch' + id).val()) || 0;
							var no_of_cw = parseInt($('#no_of_cw' + id).val()) || 0;
							var no_of_extra = parseInt($('#no_of_extra' + id).val()) || 0;

							var ndouble = parseInt($('#double' + id).val());
							var nsingle = parseInt($('#single' + id).val());
							var room_r = parseInt(data.d_room_tariff);
							var child_r = parseInt(data.d_child_tariff);
							var child_wb_r = parseInt(data.d_child_wb_tariff);
							var extra_r = parseInt(data.d_extra_tariff);

							$('#d_adult_rate' + id).val(data.d_room_tariff);
							$('#d_child_rate' + id).val(data.d_child_tariff);
							$('#d_child_wb_rate' + id).val(data.d_child_wb_tariff);
							$('#d_extra_bed_rate' + id).val(data.d_extra_tariff);
							if (tax_status == 1) {
								var tot_d = room_r + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
								if (tot_d >= 7500) {
									var gst = 18;
									var gstval = (gst / 100) * tot_d;
									var total_double = (tot_d + gstval) * ndouble;
								} else {
									var total_double = (ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
								}
							} else {
								var total_double = (ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
							}


							$('#s_adult_rate' + id).val(data.s_room_tariff);
							$('#s_child_rate' + id).val(data.s_child_tariff);
							$('#s_child_wb_rate' + id).val(data.s_child_wb_tariff);
							$('#s_extra_bed_rate' + id).val(data.s_extra_tariff);
							if (tax_status == 1) {
								var tot_s = parseInt(data.s_room_tariff);
								if (tot_s >= 7500) {
									var gst = 18;
									var gstval = (gst / 100) * tot_s;
									var total_single = (tot_s + gstval) * nsingle;
								} else {
									var total_single = parseInt(data.s_room_tariff) * parseInt(nsingle);
								}
							} else {
								var total_single = parseInt(data.s_room_tariff) * parseInt(nsingle);
							}


							$('#acc_total' + id).val(total_double + total_single);
							setTimeout(() => calculateGrandTotal(dataIndex), 300);
							//}
						}
					});

				}
			}
		} else {
			var dataIndex = $(this).closest('[data-index]').data('index');
			var room_cat_id = $(this).val();
			if (room_cat_id == 0) {
				$('#own_arrange' + id).val(1);
				$('#d_adult_rate' + id).val(0).prop('readonly', true);
				$('#d_child_rate' + id).val(0).prop('readonly', true);
				$('#d_child_wb_rate' + id).val(0).prop('readonly', true);
				$('#d_extra_bed_rate' + id).val(0).prop('readonly', true);

				$('#s_adult_rate' + id).val(0).prop('readonly', true);
				$('#s_child_rate' + id).val(0).prop('readonly', true);
				$('#s_child_wb_rate' + id).val(0).prop('readonly', true);
				$('#s_extra_bed_rate' + id).val(0).prop('readonly', true);

			} else {
				$('#own_arrange' + id).val(0);
				if (iti_edit_id == 0) {
					$('#d_adult_rate' + id).prop('readonly', false);
					$('#d_child_rate' + id).prop('readonly', false);
					$('#d_child_wb_rate' + id).prop('readonly', false);
					$('#d_extra_bed_rate' + id).prop('readonly', false);

					$('#s_adult_rate' + id).prop('readonly', false);
				}
				//$('#s_child_rate'+id).prop('readonly', false);
				//$('#s_child_wb_rate'+id).prop('readonly', false);
				//$('#s_extra_bed_rate'+id).prop('readonly', false);

				var mealplan = $('#meal_plan_id' + id).val();
				var hotel_id = $('#hotelid' + id).val();
				var double = $('#double' + id).val();
				var single = $('#single' + id).val();
				var tour_date = $('#tour_date' + id).val();
				var tour_location_id = $('#tour_location_id' + id).val();
				var tax_status = $('#tax_status' + id).val();

				$.ajax({
					url: "<?= site_url('Enquiry/getTourTariffDetailsbydate'); ?>",
					method: "POST",
					data: {
						hotel_id: hotel_id,
						room_cat_id: room_cat_id,
						mealplan: mealplan,
						double: double,
						single: single,
						id: id,
						tour_location_id: tour_location_id,
						tour_date: tour_date
					},
					dataType: 'json',
					success: function(data) {
						//if(data.length > 0){

						var no_of_ch = parseInt($('#no_of_ch' + id).val()) || 0;
						var no_of_cw = parseInt($('#no_of_cw' + id).val()) || 0;
						var no_of_extra = parseInt($('#no_of_extra' + id).val()) || 0;

						var ndouble = parseInt($('#double' + id).val());
						var nsingle = parseInt($('#single' + id).val());
						var room_r = parseInt(data.d_room_tariff);
						var child_r = parseInt(data.d_child_tariff);
						var child_wb_r = parseInt(data.d_child_wb_tariff);
						var extra_r = parseInt(data.d_extra_tariff);

						$('#d_adult_rate' + id).val(data.d_room_tariff);
						$('#d_child_rate' + id).val(data.d_child_tariff);
						$('#d_child_wb_rate' + id).val(data.d_child_wb_tariff);
						$('#d_extra_bed_rate' + id).val(data.d_extra_tariff);

						//var total_double = (ndouble*room_r) + (no_of_ch*child_r) + (no_of_cw*child_wb_r) + (no_of_extra*extra_r);
						if (tax_status == 1) {
							var tot_d = room_r + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
							if (tot_d >= 7500) {
								var gst = 18;
								var gstval = (gst / 100) * tot_d;
								var total_double = (tot_d + gstval) * ndouble;
							} else {
								var total_double = (ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
							}
						} else {
							var total_double = (ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
						}


						$('#s_adult_rate' + id).val(data.s_room_tariff);
						$('#s_child_rate' + id).val(data.s_child_tariff);
						$('#s_child_wb_rate' + id).val(data.s_child_wb_tariff);
						$('#s_extra_bed_rate' + id).val(data.s_extra_tariff);
						//var total_single = parseInt(data.s_room_tariff)*parseInt(nsingle);
						if (tax_status == 1) {
							var tot_s = parseInt(data.s_room_tariff);
							if (tot_s >= 7500) {
								var gst = 18;
								var gstval = (gst / 100) * tot_s;
								var total_single = (tot_s + gstval) * nsingle;
							} else {
								var total_single = parseInt(data.s_room_tariff) * parseInt(nsingle);
							}
						} else {
							var total_single = parseInt(data.s_room_tariff) * parseInt(nsingle);
						}

						$('#acc_total' + id).val(total_double + total_single);
						setTimeout(() => calculateGrandTotal(dataIndex), 300);
						//}
					}
				});

			}
		}
	});
</script> -->
<script>
	$(document).on('change', '.room_cat_change', function() {
		var iti_edit_id = <?php echo isset($iti_edit_id) && $iti_edit_id !== '' ? $iti_edit_id : 0; ?>;
		var id = $(this).attr('data-id');
		var sid = $(this).attr('data-sid');
		var room_cat_id = $(this).val();

		if (sid == "2") {
			// Dynamic added rows logic (existing code remains same)
			var dataIndex = $(this).closest('[data-index]').data('index');
			var first_hotel = $('#hotelid' + dataIndex).val();
			var first_rc = $('#roomcat' + dataIndex).val();

			var $row = $(this).closest('.dynamic-added');
			var currentId = $row.attr('id');
			var selectedHotel = $row.find('.hotel').val();
			var selectedRoomCat = $row.find('.room_cat').val();
			var isDuplicate = false;

			$('[data-index="' + dataIndex + '"] .dynamic-added').each(function() {
				var rowId = $(this).attr('id');
				if (rowId !== currentId) {
					var hotel = $(this).find('.hotel').val();
					var roomcat = $(this).find('.room_cat').val();
					if (hotel === selectedHotel && roomcat === selectedRoomCat) {
						isDuplicate = true;
						return false;
					}
				}
			});

			if (selectedHotel === first_hotel && selectedRoomCat === first_rc) {
				isDuplicate = true;
			}

			if (isDuplicate) {
				alert("This hotel and room category combination already exists.");
				$row.find('.room_cat').val('');
			} else {
				if (room_cat_id == 0) {
					$row.find('.own_arrange').val(1);
					$row.find('.d_adult_rate').val(0).prop('readonly', true);
					$row.find('.d_child_rate').val(0).prop('readonly', true);
					$row.find('.d_child_wb_rate').val(0).prop('readonly', true);
					$row.find('.d_extra_bed_rate').val(0).prop('readonly', true);

					$row.find('.s_adult_rate').val(0).prop('readonly', true);
					$row.find('.s_child_rate').val(0).prop('readonly', true);
					$row.find('.s_child_wb_rate').val(0).prop('readonly', true);
					$row.find('.s_extra_bed_rate').val(0).prop('readonly', true);

					var this_total = 0;
					$row.find('.acc_total').val(this_total);
					setTimeout(() => calculateGrandTotal(dataIndex), 300);
				} else {
					$row.find('.own_arrange').val(0);
					if (iti_edit_id == 0) {
						$row.find('.d_adult_rate').prop('readonly', false);
						$row.find('.d_child_rate').prop('readonly', false);
						$row.find('.d_child_wb_rate').prop('readonly', false);
						$row.find('.d_extra_bed_rate').prop('readonly', false);
						$row.find('.s_adult_rate').prop('readonly', false);
					}

					var mealplan = $('#meal_plan_id' + id).val();
					var hotel_id = $row.find('.hotel').val();
					var doubleInput = $row.find('.double');
					var double = doubleInput.length ? parseInt(doubleInput.val() || 0) : 0;
					var singleInput = $row.find('.single');
					var single = singleInput.length ? parseInt(singleInput.val() || 0) : 0;
					var tour_date = $('#tour_date' + id).val();
					var tour_location_id = $('#tour_location_id' + id).val();
					var tax_status = $('#tax_status' + id).val();
					var no_of_ch = parseInt($('#no_of_ch' + id).val() || 0);
					var no_of_cw = parseInt($('#no_of_cw' + id).val() || 0);
					var no_of_extra = parseInt($('#no_of_extra' + id).val() || 0);

					$.ajax({
						url: "<?= site_url('Enquiry/getTourTariffDetailsbydate'); ?>",
						method: "POST",
						data: {
							hotel_id: hotel_id,
							room_cat_id: room_cat_id,
							mealplan: mealplan,
							double: double,
							single: single,
							id: id,
							tour_location_id: tour_location_id,
							tour_date: tour_date
						},
						dataType: 'json',
						success: function(data) {
							var ndouble = parseInt(double);
							var nsingle = parseInt(single);
							var room_r = parseInt(data.d_room_tariff || 0);
							var child_r = parseInt(data.d_child_tariff || 0);
							var child_wb_r = parseInt(data.d_child_wb_tariff || 0);
							var extra_r = parseInt(data.d_extra_tariff || 0);

							$row.find('.d_adult_rate').val(data.d_room_tariff);
							$row.find('.d_child_rate').val(data.d_child_tariff);
							$row.find('.d_child_wb_rate').val(data.d_child_wb_tariff);
							$row.find('.d_extra_bed_rate').val(data.d_extra_tariff);

							var total_double;
							if (tax_status == 1) {
								var tot_d = room_r + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
								if (tot_d >= 7500) {
									var gst = 18;
									var gstval = (gst / 100) * tot_d;
									total_double = (tot_d + gstval) * ndouble;
								} else {
									total_double = (ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
								}
							} else {
								total_double = (ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);
							}

							$row.find('.s_adult_rate').val(data.s_room_tariff);
							$row.find('.s_child_rate').val(data.s_child_tariff);
							$row.find('.s_child_wb_rate').val(data.s_child_wb_tariff);
							$row.find('.s_extra_bed_rate').val(data.s_extra_tariff);

							var total_single;
							if (tax_status == 1) {
								var tot_s = parseInt(data.s_room_tariff || 0);
								if (tot_s >= 7500) {
									var gst = 18;
									var gstval = (gst / 100) * tot_s;
									total_single = (tot_s + gstval) * nsingle;
								} else {
									total_single = parseInt(data.s_room_tariff || 0) * parseInt(nsingle);
								}
							} else {
								total_single = parseInt(data.s_room_tariff || 0) * parseInt(nsingle);
							}

							var this_total = total_double + total_single;
							$row.find('.acc_total').val(this_total);
							setTimeout(() => calculateGrandTotal(dataIndex), 300);
						}
					});
				}
			}
		} else {
			// Main form logic with hidden field updates
			var dataIndex = $(this).closest('[data-index]').data('index');
			var $locationCard = $('.location-card[data-index="' + dataIndex + '"]');

			// **UPDATE ALL HIDDEN ROOM CATEGORY FIELDS**
			$locationCard.find('.d_room_cat_hidden').val(room_cat_id);
			$locationCard.find('.s_room_cat_hidden').val(room_cat_id);

			if (room_cat_id == 0) {
				$('#own_arrange' + dataIndex).val(1);
				$locationCard.find('input[id^="d_adult_rate_' + dataIndex + '_"], #d_adult_rate' + dataIndex).val(0).prop('readonly', true);
				$locationCard.find('input[id^="d_child_rate_' + dataIndex + '_"], #d_child_rate' + dataIndex).val(0).prop('readonly', true);
				$locationCard.find('input[id^="d_child_wb_rate_' + dataIndex + '_"], #d_child_wb_rate' + dataIndex).val(0).prop('readonly', true);
				$locationCard.find('input[id^="d_extra_bed_rate_' + dataIndex + '_"], #d_extra_bed_rate' + dataIndex).val(0).prop('readonly', true);

				$locationCard.find('input[id^="s_adult_rate_' + dataIndex + '_"], #s_adult_rate' + dataIndex).val(0).prop('readonly', true);
				$locationCard.find('input[id^="s_child_rate_' + dataIndex + '_"], #s_child_rate' + dataIndex).val(0).prop('readonly', true);
				$locationCard.find('input[id^="s_child_wb_rate_' + dataIndex + '_"], #s_child_wb_rate' + dataIndex).val(0).prop('readonly', true);
				$locationCard.find('input[id^="s_extra_bed_rate_' + dataIndex + '_"], #s_extra_bed_rate' + dataIndex).val(0).prop('readonly', true);

				$('#acc_total' + dataIndex).val(0);
				setTimeout(() => calculateGrandTotal(dataIndex), 300);
			} else {
				$('#own_arrange' + dataIndex).val(0);
				if (iti_edit_id == 0) {
					$locationCard.find('input[id^="d_adult_rate_' + dataIndex + '_"], #d_adult_rate' + dataIndex).prop('readonly', false);
					$locationCard.find('input[id^="d_child_rate_' + dataIndex + '_"], #d_child_rate' + dataIndex).prop('readonly', false);
					$locationCard.find('input[id^="d_child_wb_rate_' + dataIndex + '_"], #d_child_wb_rate' + dataIndex).prop('readonly', false);
					$locationCard.find('input[id^="d_extra_bed_rate_' + dataIndex + '_"], #d_extra_bed_rate' + dataIndex).prop('readonly', false);
					$locationCard.find('input[id^="s_adult_rate_' + dataIndex + '_"], #s_adult_rate' + dataIndex).prop('readonly', false);
				}

				var mealplan = $('#meal_plan_id' + dataIndex).val();
				var hotel_id = $('#hotelid' + dataIndex).val();
				var tour_date = $('#tour_date' + dataIndex).val();
				var tour_location_id = $('#tour_location_id' + dataIndex).val();
				var tax_status = $('#tax_status' + dataIndex).val();

				// **ALSO UPDATE MEAL PLAN IN HIDDEN FIELDS**
				$locationCard.find('.d_meal_plan_hidden').val(mealplan);
				$locationCard.find('.s_meal_plan_hidden').val(mealplan);

				// Get total children and extra bed counts
				var no_of_ch = parseInt($('#no_of_ch' + dataIndex).val() || 0);
				var no_of_cw = parseInt($('#no_of_cw' + dataIndex).val() || 0);
				var no_of_extra = parseInt($('#no_of_extra' + dataIndex).val() || 0);

				// Get all double room inputs
				var doubleInputs = $locationCard.find('input[id^="double_' + dataIndex + '_"], #double' + dataIndex);
				var totalDoubleRooms = 0;
				doubleInputs.each(function() {
					totalDoubleRooms += parseInt($(this).val() || 0);
				});

				// Get all single room inputs
				var singleInputs = $locationCard.find('input[id^="single_' + dataIndex + '_"], #single' + dataIndex);
				var totalSingleRooms = 0;
				singleInputs.each(function() {
					totalSingleRooms += parseInt($(this).val() || 0);
				});

				$.ajax({
					url: "<?= site_url('Enquiry/getTourTariffDetailsbydate'); ?>",
					method: "POST",
					data: {
						hotel_id: hotel_id,
						room_cat_id: room_cat_id,
						mealplan: mealplan,
						double: totalDoubleRooms,
						single: totalSingleRooms,
						id: dataIndex,
						tour_location_id: tour_location_id,
						tour_date: tour_date
					},
					dataType: 'json',
					success: function(data) {
						var room_r = parseInt(data.d_room_tariff || 0);
						var child_r = parseInt(data.d_child_tariff || 0);
						var child_wb_r = parseInt(data.d_child_wb_tariff || 0);
						var extra_r = parseInt(data.d_extra_tariff || 0);
						var s_room_r = parseInt(data.s_room_tariff || 0);

						var total_double = 0;
						var total_single = 0;

						// INTELLIGENT DISTRIBUTION LOGIC FOR MULTIPLE DOUBLE ROOMS
						if (doubleInputs.length > 1) {
							var remaining_ch = no_of_ch;
							var remaining_cw = no_of_cw;
							var remaining_extra = no_of_extra;

							doubleInputs.each(function(index) {
								var $currentRow = $(this).closest('.row');
								var roomCount = parseInt($(this).val() || 0);

								var row_ch = 0;
								var row_cw = 0;
								var row_extra = 0;

								if (remaining_ch > 0) {
									row_ch = Math.min(remaining_ch, 1);
									remaining_ch -= row_ch;

									if (remaining_cw > 0) {
										row_cw = Math.min(remaining_cw, 1);
										remaining_cw -= row_cw;
									}
								} else if (remaining_extra > 0) {
									row_extra = Math.min(remaining_extra, 1);
									remaining_extra -= row_extra;
								}

								$currentRow.find('input[id^="d_adult_rate"]').val(room_r);
								$currentRow.find('input[id^="d_child_rate"]').val(row_ch > 0 ? child_r : 0);
								$currentRow.find('input[id^="d_child_wb_rate"]').val(row_cw > 0 ? child_wb_r : 0);
								$currentRow.find('input[id^="d_extra_bed_rate"]').val(row_extra > 0 ? extra_r : 0);

								var row_total = (room_r * roomCount) + (row_ch * child_r) + (row_cw * child_wb_r) + (row_extra * extra_r);

								if (tax_status == 1) {
									var per_room = room_r + (row_ch * child_r) + (row_cw * child_wb_r) + (row_extra * extra_r);
									if (per_room >= 7500) {
										var gst = 18;
										var gstval = (gst / 100) * per_room;
										total_double += (per_room + gstval) * roomCount;
									} else {
										total_double += row_total;
									}
								} else {
									total_double += row_total;
								}
							});
						} else {
							var roomCount = parseInt(doubleInputs.val() || 0);

							$locationCard.find('input[id^="d_adult_rate_' + dataIndex + '_"], #d_adult_rate' + dataIndex).val(room_r);
							$locationCard.find('input[id^="d_child_rate_' + dataIndex + '_"], #d_child_rate' + dataIndex).val(child_r);
							$locationCard.find('input[id^="d_child_wb_rate_' + dataIndex + '_"], #d_child_wb_rate' + dataIndex).val(child_wb_r);
							$locationCard.find('input[id^="d_extra_bed_rate_' + dataIndex + '_"], #d_extra_bed_rate' + dataIndex).val(extra_r);

							var tot_d = room_r + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r);

							if (tax_status == 1 && tot_d >= 7500) {
								var gst = 18;
								var gstval = (gst / 100) * tot_d;
								total_double = (tot_d + gstval) * roomCount;
							} else {
								total_double = tot_d * roomCount;
							}
						}

						$locationCard.find('input[id^="s_adult_rate_' + dataIndex + '_"], #s_adult_rate' + dataIndex).val(s_room_r);
						$locationCard.find('input[id^="s_child_rate_' + dataIndex + '_"], #s_child_rate' + dataIndex).val(0);
						$locationCard.find('input[id^="s_child_wb_rate_' + dataIndex + '_"], #s_child_wb_rate' + dataIndex).val(0);
						$locationCard.find('input[id^="s_extra_bed_rate_' + dataIndex + '_"], #s_extra_bed_rate' + dataIndex).val(0);

						if (singleInputs.length > 0) {
							if (tax_status == 1 && s_room_r >= 7500) {
								var gst = 18;
								var gstval = (gst / 100) * s_room_r;
								total_single = (s_room_r + gstval) * totalSingleRooms;
							} else {
								total_single = s_room_r * totalSingleRooms;
							}
						}

						$('#acc_total' + dataIndex).val(total_double + total_single);
						setTimeout(() => calculateGrandTotal(dataIndex), 300);
					}
				});
			}
		}
	});
</script>



<script>
	function double_total_update(id, dataIndex) {
		var double = parseInt($('#double' + id).val()) || 0;
		var single = parseInt($('#single' + id).val()) || 0;
		var tax_status = parseInt($('#tax_status' + id).val()) || 0;

		var no_of_ch = parseInt($('#no_of_ch' + id).val()) || 0;
		var no_of_cw = parseInt($('#no_of_cw' + id).val()) || 0;
		var no_of_extra = parseInt($('#no_of_extra' + id).val()) || 0;

		let maxDouble = <?php echo $object_det[0]['no_of_double_room']; ?>;
		let maxSingle = <?php echo $object_det[0]['no_of_single_room']; ?>;

		let maxChild = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
		let maxChild_wb = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
		let maxExtra = <?php echo $object_det[0]['no_of_extra_bed']; ?>;

		/***********child */
		let currentChildVal = parseInt($('#no_of_ch' + id).val()) || 0;
		let totalChildUsed = 0;
		$('[data-index="' + dataIndex + '"] input[id^="no_of_ch"]').each(function() {
			let rowIdch = $(this).attr('id').replace('no_of_ch', '');
			let valch = parseInt($(this).val()) || 0;
			if (rowIdch !== id) {
				totalChildUsed += valch;
			}
		});
		let maxAllowedForCurrentch = maxChild - totalChildUsed;
		if (currentChildVal > maxAllowedForCurrentch) {
			alert("Only " + maxAllowedForCurrentch + " Child with bed room(s) available for this day.");
			$('#no_of_ch' + id).val(maxAllowedForCurrentch);
			currentChildVal = maxAllowedForCurrentch;
		}
		/***********child End*/

		/***********child Without bed*/
		let currentChildwbVal = parseInt($('#no_of_cw' + id).val()) || 0;
		let totalChildwbUsed = 0;
		$('[data-index="' + dataIndex + '"] input[id^="no_of_cw"]').each(function() {
			let rowIdchw = $(this).attr('id').replace('no_of_cw', '');
			let valchw = parseInt($(this).val()) || 0;
			if (rowIdchw !== id) {
				totalChildwbUsed += valchw;
			}
		});
		let maxAllowedForCurrentchw = maxChild_wb - totalChildwbUsed;
		if (currentChildwbVal > maxAllowedForCurrentchw) {
			alert("Only " + maxAllowedForCurrentchw + " Child without bed room(s) available for this day.");
			$('#no_of_cw' + id).val(maxAllowedForCurrentchw);
			currentChildwbVal = maxAllowedForCurrentchw;
		}
		/***********child Without bed end*/

		/***********Extra bed*/
		let currentExtraVal = parseInt($('#no_of_extra' + id).val()) || 0;
		let totalExtraUsed = 0;
		$('[data-index="' + dataIndex + '"] input[id^="no_of_extra"]').each(function() {
			let rowIde = $(this).attr('id').replace('no_of_extra', '');
			let vale = parseInt($(this).val()) || 0;
			if (rowIde !== id) {
				totalExtraUsed += vale;
			}
		});
		let maxAllowedForCurrente = maxExtra - totalExtraUsed;
		if (currentExtraVal > maxAllowedForCurrente) {
			alert("Only " + maxAllowedForCurrente + " Extra bed room(s) available for this day.");
			$('#no_of_extra' + id).val(maxAllowedForCurrente);
			currentExtraVal = maxAllowedForCurrente;
		}
		/***********Extra bed end*/

		let currentDoubleVal = parseInt($('#double' + id).val()) || 0;
		let currentSingleVal = parseInt($('#single' + id).val()) || 0;
		let totalDoubleUsed = 0;
		$('[data-index="' + dataIndex + '"] input[id^="double"]').each(function() {
			let rowIdd = $(this).attr('id').replace('double', '');
			let vald = parseInt($(this).val()) || 0;
			if (rowIdd !== id) {
				totalDoubleUsed += vald;
			}
		});
		let maxAllowedForCurrent = maxDouble - totalDoubleUsed;
		if (currentDoubleVal > maxAllowedForCurrent) {
			alert("Only " + maxAllowedForCurrent + " double room(s) available for this day.");
			$('#double' + id).val(maxAllowedForCurrent);
			currentDoubleVal = maxAllowedForCurrent;
		}

		let totalSingleUsed = 0;
		$('[data-index="' + dataIndex + '"] input[id^="single"]').each(function() {
			let rowIds = $(this).attr('id').replace('single', '');
			let vals = parseInt($(this).val()) || 0;
			if (rowIds !== id) {
				totalSingleUsed += vals;
			}
		});
		let maxAllowedForCurrents = maxSingle - totalSingleUsed;
		if (currentSingleVal > maxAllowedForCurrents) {
			alert("Only " + maxAllowedForCurrents + " single room(s) available for this day.");
			$('#single' + id).val(maxAllowedForCurrents);
			currentSingleVal = maxAllowedForCurrents;
		}

		var room = parseInt($('#d_adult_rate' + id).val()) || 0;
		var child = parseInt($('#d_child_rate' + id).val()) || 0;
		var child_wb = parseInt($('#d_child_wb_rate' + id).val()) || 0;
		var extra = parseInt($('#d_extra_bed_rate' + id).val()) || 0;
		//var dtotal = (double*room) + (no_of_ch*child) + (no_of_cw*child_wb) + (no_of_extra*extra);

		if (tax_status == 1) {
			var tot_d = room + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra);
			if (tot_d >= 7500) {
				var gst = 18;
				var gstval = (gst / 100) * tot_d;
				var dtotal = (tot_d + gstval) * double;
			} else {
				var dtotal = (double * room) + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra);
			}
		} else {
			var dtotal = (double * room) + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra);
		}

		var sroom = parseInt($('#s_adult_rate' + id).val()) || 0;
		//var stotal = single*sroom;

		if (tax_status == 1) {
			var tot_s = sroom;
			if (tot_s >= 7500) {
				var gst = 18;
				var gstval = (gst / 100) * tot_s;
				var stotal = (tot_s + gstval) * single;
			} else {
				var stotal = single * sroom;
			}
		} else {
			var stotal = single * sroom;
		}


		$('#acc_total' + id).val(dtotal + stotal);
		setTimeout(() => calculateGrandTotal(dataIndex), 300);

	}
	$(document).on('input', '[id^="double"],[id^="single"],[id^="no_of_ch"],[id^="no_of_cw"],[id^="no_of_extra"],[id^="d_adult_rate"], [id^="d_child_rate"], [id^="d_child_wb_rate"], [id^="d_extra_bed_rate"], [id^="s_adult_rate"], [id^="s_child_rate"], [id^="s_child_wb_rate"], [id^="s_extra_bed_rate"]', function() {
		//var id = this.id.replace(/^[a-z_]+/, '');
		if ($(this).val() === '' || $(this).val() === null) {
			$(this).val(0);
		}
		var id = $(this).data('id');
		var dataIndex = $(this).closest('[data-index]').data('index');
		double_total_update(id, dataIndex);
	});
</script>


<script>
	function night_single_total_update(id) {
		var no_of_night = parseInt($('#no_of_night' + id).val()) || 0;
		var single = parseInt($('#single' + id).val()) || 0;
		var room = parseInt($('#s_adult_rate' + id).val()) || 0;
		var child = parseInt($('#s_child_rate' + id).val()) || 0;
		var child_wb = parseInt($('#s_child_wb_rate' + id).val()) || 0;
		var extra = parseInt($('#s_extra_bed_rate' + id).val()) || 0;
		var total = (single * room) * no_of_night;
		$('#s_total_rate' + id).val(total);

		var dvalue = parseInt($('#d_total_rate' + id).val());
		//$('#loc_total'+id).text(total+dvalue);
		var veh_grand_totalloc = get_veh_grand_total_byloc(id);
		var actotals = total + dvalue;
		$('#loc_total' + id).text(actotals + " + " + veh_grand_totalloc);
		var accom_grand_total = get_accom_grand_total();
		$('#a_total').text(accom_grand_total);

		var veh_grand_total = get_veh_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);
	}
	$(document).on('input', '[id^="no_of_night"]', function() {
		var id = this.id.match(/\d+/)[0];
		var no_of_nights = <?php echo $object_det[0]['no_of_night']; ?>;
		var totalNights = calculateTotalNights();
		$('#planned_night').text(totalNights + " / ");
		if (totalNights == no_of_nights) {
			$("#btn_save_tour_plan").show();
			$('#btn_add_bt').prop('disabled', true);
		} else {
			$("#btn_save_tour_plan").hide();
			$('#btn_add_bt').prop('disabled', false);
		}
		night_single_total_update(id);
	});
</script>

<script type="text/javascript">
	$(document).on('keyup', '.cls_daily', function(e) {
		var id = $(this).attr('data-id');
		var cid = $(this).attr('data-cid');

		var extra_kilometer = parseInt($('#extra_kilometer' + id).val());
		var extra_km_rate = parseInt($('#extra_km_rate' + id).val());
		var extra_cost = extra_kilometer * extra_km_rate;

		var day_rent = parseInt($('#day_rent' + id).val());
		var veh_count = parseInt($('#veh_count' + id).val());
		var no_of_night = parseInt($('#no_of_night' + cid).val());
		var total = (veh_count * day_rent) * no_of_night;
		$('#veh_total' + id).val(total + extra_cost);

		var veh_grand_total = get_veh_grand_total();
		veh_grand_total += parseFloat($('#extraklm_hidden').val()) || 0;
		veh_grand_total += parseFloat($('#permit_hidden').val()) || 0;
		$('#v_total').text(veh_grand_total);

		var accom_grand_total = get_accom_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);

		var veh_grand_totalloc = get_veh_grand_total_byloc(cid);
		var accom_grand_totalloc = get_accom_grand_total_byloc(cid);
		$('#loc_total' + cid).text(accom_grand_totalloc + " + " + veh_grand_totalloc);

	});
</script>
<script type="text/javascript">
	$(document).on('keyup', '.cls_dist', function(e) {
		var id = $(this).attr('data-id');
		var cid = $(this).attr('data-cid');
		var extra_klm = 0;
		var max_km_day = parseInt($('#max_km_day' + id).val());
		var travel_distance = parseInt($('#travel_distance' + id).val());
		if (travel_distance > max_km_day) {
			extra_klm = travel_distance - max_km_day;
		} else {
			extra_klm = 0;
		}

		$('#extra_kilometer' + id).val(extra_klm);
		var extra_km_rate = parseInt($('#extra_km_rate' + id).val());
		var extra_cost = extra_klm * extra_km_rate;

		var day_rent = parseInt($('#day_rent' + id).val());
		var veh_count = parseInt($('#veh_count' + id).val());
		var no_of_night = parseInt($('#no_of_night' + cid).val());
		var total = (veh_count * day_rent) * no_of_night;
		$('#veh_total' + id).val(total + extra_cost);

		var veh_grand_total = get_veh_grand_total();
		veh_grand_total += parseFloat($('#extraklm_hidden').val()) || 0;
		veh_grand_total += parseFloat($('#permit_hidden').val()) || 0;
		$('#v_total').text(veh_grand_total);

		var accom_grand_total = get_accom_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);

		var veh_grand_totalloc = get_veh_grand_total_byloc(cid);
		var accom_grand_totalloc = get_accom_grand_total_byloc(cid);
		$('#loc_total' + cid).text(accom_grand_totalloc + " + " + veh_grand_totalloc);
	});
</script>

<script>
	$(document).on('change', '.mp_change', function() {
		var id = $(this).attr('data-id');
		var no_of_night = $('#no_of_night' + id)
		var room_cat_id = $('#roomcat' + id).val();
		var no_of_night = $('#no_of_night' + id).val();
		var hotel_id = $('#hotelid' + id).val();
		var mealplan = $(this).val();
		var checkin = $('#checkin' + id).val();
		var checkout = $('#checkout' + id).val();
		var double = $('#double' + id).val();
		var single = $('#single' + id).val();
		var vid;
		var veh_total = 0;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required == 1) {
			var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		} else {
			var vehicle_models = null;
		}
		if (no_of_night == '' || no_of_night == null || no_of_night == 'undefined') {
			alert("Please enter number of nights");
			$("#roomcat" + id)[0].selectedIndex = 0;
		} else if (no_of_night == 0) {
			alert("Number of nights must be greater than zero");
			$('#no_of_night' + id).val('');
		} else {
			$.ajax({
				url: "<?= site_url('Enquiry/getTourTariffDetails'); ?>",
				method: "POST",
				data: {
					hotel_id: hotel_id,
					room_cat_id: room_cat_id,
					mealplan: mealplan,
					checkin: checkin,
					checkout: checkout,
					no_of_night: no_of_night,
					double: double,
					single: single,
					vehicle_models: vehicle_models
				},
				dataType: 'json',
				success: function(data) {
					//if(data.length > 0){
					var no_of_ch = parseInt($('#no_of_ch' + id).val()) || 0;
					var no_of_cw = parseInt($('#no_of_cw' + id).val()) || 0;
					var no_of_extra = parseInt($('#no_of_extra' + id).val()) || 0;

					var ndouble = parseInt($('#double' + id).val());
					var nsingle = parseInt($('#single' + id).val());
					var room_r = parseInt(data.d_room_tariff);
					var child_r = parseInt(data.d_child_tariff);
					var child_wb_r = parseInt(data.d_child_wb_tariff);
					var extra_r = parseInt(data.d_extra_tariff);

					$('#d_adult_rate' + id).val(data.d_room_tariff);
					$('#d_child_rate' + id).val(data.d_child_tariff);
					$('#d_child_wb_rate' + id).val(data.d_child_wb_tariff);
					$('#d_extra_bed_rate' + id).val(data.d_extra_tariff);
					var total_double = ((ndouble * room_r) + (no_of_ch * child_r) + (no_of_cw * child_wb_r) + (no_of_extra * extra_r)) * parseInt(no_of_night);
					$('#d_total_rate' + id).val(total_double);

					$('#s_adult_rate' + id).val(data.s_room_tariff);
					$('#s_child_rate' + id).val(data.s_child_tariff);
					$('#s_child_wb_rate' + id).val(data.s_child_wb_tariff);
					$('#s_extra_bed_rate' + id).val(data.s_extra_tariff);
					var total_single = (parseInt(data.s_room_tariff) * parseInt(nsingle)) * parseInt(no_of_night);
					$('#s_total_rate' + id).val(total_single);
					$('#loc_total' + id).text(total_double + total_single);


					var veh_grand_tot = 0;
					if (data.vehicles.length > 0) {
						$.each(data.vehicles, function(index, item) {
							vid = id + item.vehicle_type_id;
							veh_total = (parseInt(item.vehicle_count) * parseInt(item.rate_per_day)) * parseInt(no_of_night);
							$('#day_rent' + vid).val(item.rate_per_day);
							$('#max_km_day' + vid).val(item.max_km_day);
							$('#extra_km_rate' + vid).val(item.extra_km_rate);
							$('#veh_total' + vid).val(veh_total);
							veh_grand_tot = veh_grand_tot + veh_total;
						});
					}
					var accom_temp = total_double + total_single;
					$('#loc_total' + id).text(accom_temp + " + " + veh_grand_tot);
					var accom_grand_total = get_accom_grand_total();
					$('#a_total').text(accom_grand_total);

					var veh_grand_total = get_veh_grand_total();
					veh_grand_total += parseFloat($('#extraklm_hidden').val()) || 0;
					veh_grand_total += parseFloat($('#permit_hidden').val()) || 0;
					$('#v_total').text(veh_grand_total);

					var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
					$('#g_total').text(g_total);
					//}
				}
			});
		}
	});
</script>
<script>
	$(document).on('click', '.save_location', function() {
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var is_quick_quote = <?php echo $object_det[0]['is_quick_quote'] ? $object_det[0]['is_quick_quote'] : 0; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var enquiry_header_id = <?php echo $object_det[0]['enquiry_header_id']; ?>;
		var enquiry_details_id = <?php echo $object_det[0]['enquiry_details_id']; ?>;
		var id = $(this).attr('data-id');

		var pre_tour_location = $('#tour_location_id' + id).val();
		var pre_no_of_night = $('#no_of_night' + id).val();
		var pre_checkin = $('#checkin' + id).val();
		var pre_checkout = $('#checkout' + id).val();
		var pre_hotelid = $('#hotelid' + id).val();
		var pre_roomcat = $('#roomcat' + id).val();

		var pre_d_adult_rate = $('#d_adult_rate' + id).val();
		var pre_s_adult_rate = $('#s_adult_rate' + id).val();
		var pre_d_child_rate = $('#d_child_rate' + id).val();
		var pre_s_child_rate = $('#s_child_rate' + id).val();
		var pre_d_child_wb_rate = $('#d_child_wb_rate' + id).val();
		var pre_s_child_wb_rate = $('#s_child_wb_rate' + id).val();
		var pre_d_extra_bed_rate = $('#d_extra_bed_rate' + id).val();
		var pre_s_extra_bed_rate = $('#s_extra_bed_rate' + id).val();

		var pre_room_type = [{
			"double": no_of_double_room,
			"single": no_of_single_room
		}];
		var pre_vehicle_details = [];
		$.each(vehicle_models, function(veh_index, veh_model) {
			var vid = id + veh_model.vehicle_type_id;
			var pre_veh_model = $('#veh_model' + vid).val();
			var pre_veh_count = $('#veh_count' + vid).val();
			var pre_day_rent = $('#day_rent' + vid).val();
			var pre_max_km_day = $('#max_km_day' + vid).val();
			var pre_extra_km_rate = $('#extra_km_rate' + vid).val();
			var pre_veh_total = $('#veh_total' + vid).val();
			pre_vehicle_details.push({
				"day_rent": pre_day_rent,
				"veh_total": pre_veh_total,
				"vehicle_count": pre_veh_count,
				"vehicle_model": pre_veh_model
			});
		});

		$.ajax({
			url: '<?= site_url('Enquiry/saveTourLocation'); ?>',
			type: 'POST',
			data: {
				enquiry_header_id: enquiry_header_id,
				enquiry_details_id: enquiry_details_id,
				tour_location: pre_tour_location,
				no_of_days: pre_no_of_night,
				check_in_date: pre_checkin,
				check_out_date: pre_checkout,
				hotel_id: pre_hotelid,
				room_category_id: pre_roomcat,
				room_type: pre_room_type,
				vehicle_details: pre_vehicle_details,
				location_sequence: id,

				d_adult_rate: pre_d_adult_rate,
				s_adult_rate: pre_s_adult_rate,
				d_child_rate: pre_d_child_rate,
				s_child_rate: pre_s_child_rate,
				d_child_wb_rate: pre_d_child_wb_rate,
				s_child_wb_rate: pre_s_child_wb_rate,
				d_extra_bed_rate: pre_d_extra_bed_rate,
				s_extra_bed_rate: pre_s_extra_bed_rate,
				is_quick_quote: is_quick_quote,

				is_active: 1,
				is_draft: 1,
				enterprise_id: 1
			},
			dataType: 'json',
			success: function(data) {
				alert("updated");
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});

	});
</script>
<script>
	// Set saved values on page load
	$(document).ready(function() {
		<?php if (!empty($saved_ss_ids)) { ?>
			$('#sight<?php echo $iti_id; ?>').val(<?php echo json_encode($saved_ss_ids); ?>).trigger('change');
		<?php } ?>
	});
</script>
<script>
	$(document).on('click', '.draft_view', function() {
		var enquiry_header_id = <?php echo $object_det[0]['enquiry_header_id']; ?>;
		var enquiry_details_id = <?php echo $object_det[0]['enquiry_details_id']; ?>;
		var hotel_categories = <?php echo json_encode($hotel_categories); ?>;
		var hotel_category_exist = <?php echo $object_det[0]['hotel_category']; ?>;
		var meal_plan_exist = <?php echo $object_det[0]['meal_plan']; ?>;
		var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;
		var total_no_of_pax = <?php echo $object_det[0]['total_no_of_pax']; ?>;
		var enquiry_header_id = <?php echo $object_det[0]['enquiry_header_id']; ?>;
		var enquiry_details_id = <?php echo $object_det[0]['enquiry_details_id']; ?>;
		var no_of_adult = <?php echo $object_det[0]['no_of_adult']; ?>;
		var no_of_child_with_bed = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
		var no_of_child_without_bed = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var no_of_extra_bed = <?php echo $object_det[0]['no_of_extra_bed']; ?>;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var is_quick_quote = <?php echo $object_det[0]['is_quick_quote'] ? $object_det[0]['is_quick_quote'] : 0; ?>;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;

		var child_t_d = 0;
		var child_t_s = 0;

		var child_wb_t_d = 0;
		var child_wb_t_s = 0;

		var extra_t_d = 0;
		var extra_t_s = 0;

		var room_t_d = 0;
		var room_t_s = 0;

		var start_date = <?= json_encode($start_date); ?>;
		var totalDays = 0;

		var vid_t;
		var v_day_rent;
		var v_max_km_day;
		var v_extra_km_rate;
		var v_veh_total;
		var v_veh_header;
		var plus = " + ";
		$('#btn_add_bt').prop('disabled', false);
		$.ajax({
			url: '<?= site_url('Enquiry/loadTourLocation'); ?>',
			type: 'POST',
			data: {
				enquiry_header_id: enquiry_header_id,
				enquiry_details_id: enquiry_details_id
			},
			dataType: 'json',
			success: function(response) {
				// Clear existing location cards if necessary
				$('.tour_plan_div').empty();
				var newCard = ``;
				var breadcrumb = ``;
				$.each(response, function(index, item) {
					// Create a new location card element
					var vehicleDetails = JSON.parse(item.vehicle_details);
					var count = index + 1;
					if (count > 0) {
						//$("#btn_save_tour_plan").show();
						$("#btn_savedraft_tour_plan").show();
					} else {
						//$("#btn_save_tour_plan").hide();
						$("#btn_savedraft_tour_plan").hide();
					}
					var isFirst = count === 1;
					var prevCheckout = $('.tour_plan_div .location-card:last input[name^="addloc["][name$="[checkout]"]').val();
					var checkinDate = isFirst ? start_date : prevCheckout || '';
					ep_sel = '';
					cp_sel = '';
					map_sel = '';
					ap_sel = '';
					if (item.meal_plan_id == 1) {
						ep_sel = "selected";
					}
					if (item.meal_plan_id == 2) {
						cp_sel = "selected";
					}
					if (item.meal_plan_id == 3) {
						map_sel = "selected";
					}
					if (item.meal_plan_id == 4) {
						ap_sel = "selected";
					}

					$.each(item.cost, function(index1, item3) {
						var vtots = 0;
						if ((item3.cost_component_id == "6" || item3.cost_component_id == "7") && item3.room_type_id == "2") {
							room_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "12" || item3.cost_component_id == "13") && item3.room_type_id == "2") {
							child_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "15" || item3.cost_component_id == "16") && item3.room_type_id == "2") {
							child_wb_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "9" || item3.cost_component_id == "10") && item3.room_type_id == "2") {
							extra_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "6" || item3.cost_component_id == "7") && item3.room_type_id == "1") {
							room_t_s = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "12" || item3.cost_component_id == "13") && item3.room_type_id == "1") {
							child_t_s = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "15" || item3.cost_component_id == "16") && item3.room_type_id == "1") {
							child_wb_t_s = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "9" || item3.cost_component_id == "10") && item3.room_type_id == "1") {
							extra_t_s = item3.quick_quote_tariff;
						}
					});
					var room_total = parseInt(no_of_double_room) * parseInt(room_t_d);
					var child_total = parseInt(no_of_child_with_bed) * parseInt(child_t_d);
					var child_wb_total = parseInt(no_of_child_without_bed) * parseInt(child_wb_t_d);
					var extra_total = parseInt(no_of_extra_bed) * parseInt(extra_t_d);
					var d_totals = (room_total + child_total + child_wb_total + extra_total) * parseInt(item.no_of_days);
					var s_totals = (parseInt(no_of_single_room) * parseInt(room_t_s)) * parseInt(item.no_of_days);
					newCard += `
					
						<div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
							<div class="card">
								<div class="card-header" style="background-color:#c2d6d6;">
									<input type="hidden" id="own_arrange${count}" name="addloc[${count}][own_arrange]" value="${item.is_own_arrangement}">
									<input type="hidden" id="tour_location_id${count}" name="addloc[${count}][tour_location_id]" value="${item.tour_location}">
									<input type="hidden" id="location_sequence${count}" name="addloc[${count}][location_sequence]" value="${count}">
									<div class="card-title"><span class="card-seq" style="color:#339966;">${count}</span>. <span style="color:#339966;">${item.geog_name}</span></div>
									<div class="card-options">
										<a href="#" class="card-options-remove"><i class="fe fe-x"></i></a>
									</div>
								</div>
								<div class="card-body">
									<div class="ibox teams mb-30 bg-boxshadow">
										<div class="ibox-content teams">
											<div class="row mt-2">
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Checkin</b></div>
													<span class="text-muted">
														<input type="date" value="${item.check_in_date}" id="checkin${count}" name="addloc[${count}][checkin]" class="form-control input-sm" required readonly>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Nights</b></div>
													<span class="text-muted">
														<input type="text" id="no_of_night${count}" name="addloc[${count}][no_of_night]" value="${item.no_of_days}" class="form-control input-sm no_of_night" maxlength="2" oninput="validateNumericInput(this); calculateCheckout(${count});" required>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Checkout</b></div>
													<span class="text-muted">
														<input type="date" id="checkout${count}" value="${item.check_out_date}" name="addloc[${count}][checkout]" class="form-control input-sm" required readonly>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Hotel Category</b></div>
														<select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search input-sm hotel_cat_change_draft" data-id="${count}" data-hid="${item.hotel_id}" required>
														<option value="">Select</option>
														</select>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Hotel</b></div>
													<span class="text-muted">
														<select id="hotelid${count}" name="addloc[${count}][hotelid]" class="form-control select2-show-search input-sm hotel_change_draft" data-rid="${item.room_category_id}" data-id="${count}" required>
														<option value="">Select</option>
														</select>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Room Category</b></div>
														<select id="roomcat${count}" name="addloc[${count}][roomcat]" class="form-control select2-show-search input-sm" data-id="${count}" required>
														<option value="">Select</option>
														</select>
												</div>
											</div>

										
											<div class="row mt-2">
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Meal Plan</b></div>
													<span class="text-muted">
														<select id="mealplan${count}" name="addloc[${count}][mealplan]" class="form-control select2-show-search input-sm mp_change" data-id="${count}" required>
														<option value="">Select</option>
														<option value="1" ${ep_sel}>EP</option>
														<option value="2" ${cp_sel}>CP</option>
														<option value="3" ${map_sel}>MAP</option>
														<option value="4" ${ap_sel}>AP</option>
														</select>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>No Of Adult</b></div>
													<input type="text" id="no_of_adult${count}" name="addloc[${count}][no_of_adult]" value="${no_of_adult}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.With Bed Qty</b></div>
													<input type="text" id="no_of_ch${count}" name="addloc[${count}][no_of_ch]" value="${no_of_child_with_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.Without Bed Qty</b></div>
													<input type="text" id="no_of_cw${count}" name="addloc[${count}][no_of_cw]" value="${no_of_child_without_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Extra Bed Qty</b></div>
													<input type="text" id="no_of_extra${count}" name="addloc[${count}][no_of_extra]" value="${no_of_extra_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Total Pax</b></div>
													<input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly>
												</div>
												
											</div>`;
					if (no_of_double_room > 0) {

						newCard += `<div class="row mt-2 double_row">
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Double Room</b></div>
														<input type="text" id="double${count}" name="addloc[${count}][double]" value="${no_of_double_room}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
													</div>
										
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Daily Room Rate</b></div>
														<input type="text" id="d_adult_rate${count}" name="addloc[${count}][d_adult_rate]" value="${room_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" required>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>C.With Bed Rate</b></div>
														<input type="text" id="d_child_rate${count}" name="addloc[${count}][d_child_rate]" value="${child_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);">
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>C.Without Bed Rate</b></div>
														<input type="text" id="d_child_wb_rate${count}" name="addloc[${count}][d_child_wb_rate]" value="${child_wb_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);">
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Extra Bed Rate</b></div>
														<input type="text" id="d_extra_bed_rate${count}" name="addloc[${count}][d_extra_bed_rate]" value="${extra_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);">
													</div>
														<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Total</b></div>
														<input type="text" id="d_total_rate${count}" name="addloc[${count}][d_total_rate]" value="${d_totals}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
													</div>
													
												</div>`;
					} else {
						newCard += `<input type="hidden" id="double${count}" name="addloc[${count}][double]" value="0">
															<input type="hidden" id="d_adult_rate${count}" name="addloc[${count}][d_adult_rate]" value="0">
															<input type="hidden" id="d_child_rate${count}" name="addloc[${count}][d_child_rate]" value="0">
															<input type="hidden" id="d_child_wb_rate${count}" name="addloc[${count}][d_child_wb_rate]" value="0">
															<input type="hidden" id="d_extra_bed_rate${count}" name="addloc[${count}][d_extra_bed_rate]" value="0">
															<input type="hidden" id="d_total_rate${count}" name="addloc[${count}][d_total_rate]" value="0">`;
					}
					if (no_of_single_room > 0) {
						newCard += `<div class="row mt-2 single_row">
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Single Room</b></div>
													<input type="text" id="single${count}" name="addloc[${count}][single]" value="${no_of_single_room}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
									
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Daily Room Rate</b></div>
													<input type="text" id="s_adult_rate${count}" name="addloc[${count}][s_adult_rate]" value="${room_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);">
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.With Bed Rate</b></div>
													<input type="text" id="s_child_rate${count}" name="addloc[${count}][s_child_rate]" value="${child_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.Without Bed Rate</b></div>
													<input type="text" id="s_child_wb_rate${count}" name="addloc[${count}][s_child_wb_rate]" value="${child_wb_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Extra Bed Rate</b></div>
													<input type="text" id="s_extra_bed_rate${count}" name="addloc[${count}][s_extra_bed_rate]" value="${extra_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Total</b></div>
													<input type="text" id="s_total_rate${count}" name="addloc[${count}][s_total_rate]" value="${s_totals}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												
											</div>`;
					} else {
						newCard += `<input type="hidden" id="single${count}" name="addloc[${count}][single]" value="0">
															<input type="hidden" id="s_adult_rate${count}" name="addloc[${count}][s_adult_rate]" value="0">
															<input type="hidden" id="s_child_rate${count}" name="addloc[${count}][s_child_rate]" value="0">
															<input type="hidden" id="s_child_wb_rate${count}" name="addloc[${count}][s_child_wb_rate]" value="0">
															<input type="hidden" id="s_extra_bed_rate${count}" name="addloc[${count}][s_extra_bed_rate]" value="0">
															<input type="hidden" id="s_total_rate${count}" name="addloc[${count}][s_total_rate]" value="0">`;
					}
					if (is_vehicle_required == 1) {
						vtots = 0;
						$.each(vehicle_models, function(vindex, vmodel) {

							$.each(vehicleDetails, function(v_index, v_item) {
								if (vmodel.vehicle_type_id == v_item.veh_type_id) {
									vid_t = count + vmodel.vehicle_type_id;
									v_day_rent = v_item.day_rent;
									v_max_km_day = v_item.max_km_day;
									v_travel_distance = v_item.travel_distance;
									v_extra_kilometer = v_item.extra_kilometer;
									v_extra_km_rate = v_item.extra_km_rate;
									v_veh_total = v_item.veh_total;
									v_veh_header = v_item.veh_header;
									vtots = parseInt(vtots) + parseInt(v_veh_total);
								}
							});
							if (vindex == 0) {
								newCard += `
													<div class="row mt-2">
														<div class="col-xl-1 col-sm-12 col-md-1">
														<a id="loadvehs${count}" class="nav-link load_vehs_click" data-id="${count}"><i class="fa fa-refresh"></i></a>
														</div>
														<div class="col-xl-11 col-sm-12 col-md-11"><h5 style="color:#003300;">Vehicle Details<span id="v_from_to${count}">${v_veh_header}</span></h5>
														</div>
													</div>
												
												<input type="hidden" id="veh_header${count}" name="addloc[${count}][veh_header]" value="${v_veh_header}">
												<div class="row mt-2 single_row">
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Vehicle Model</b></div>
													</div>		
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Vehicle Count</b></div>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Daily Rent</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Max KM/Day</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Distance</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Extra KM</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Extra KM Rate</b></div>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Total</b></div>
													</div>
												</div>
														`;
							}
							vid = count + vmodel.vehicle_type_id;
							newCard += `<div class="row mt-2 single_row">
													<div class="col-xl-2 col-sm-12 col-md-2">
														
														<input type="text" id="veh_model${vid}" name="addloc[${count}][veh_model][${vindex}]" value="${vmodel.vehicle_model_name}" class="form-control input-sm veh_model${vindex}" readonly>
														<input type="hidden" id="veh_type_id${vid}" name="addloc[${count}][veh_type_id][${vindex}]" value="${vmodel.vehicle_type_id}" class="form-control input-sm veh_type_id${vindex}">
													</div>
										
													<div class="col-xl-2 col-sm-12 col-md-2">
														
														<input type="text" id="veh_count${vid}" name="addloc[${count}][veh_count][${vindex}]" value="${vmodel.vehicle_count}" class="form-control input-sm veh_count${vindex}" maxlength="2" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
													
														<input type="text" id="day_rent${vid}" name="addloc[${count}][day_rent][${vindex}]" value="${v_day_rent}" class="form-control input-sm cls_daily day_rent${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this);">
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
													
														<input type="text" id="max_km_day${vid}" name="addloc[${count}][max_km_day][${vindex}]" value="${v_max_km_day}" class="form-control input-sm max_km_day${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
													
														<input type="text" id="travel_distance${vid}" name="addloc[${count}][travel_distance][${vindex}]" value="${v_travel_distance}" class="form-control input-sm cls_dist travel_distance${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this);">
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
													
														<input type="text" id="extra_kilometer${vid}" name="addloc[${count}][extra_kilometer][${vindex}]" value="${v_extra_kilometer}" class="form-control input-sm extra_kilometer${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														
														<input type="text" id="extra_km_rate${vid}" name="addloc[${count}][extra_km_rate][${vindex}]" value="${v_extra_km_rate}" class="form-control input-sm extra_km_rate${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														
														<input type="text" id="veh_total${vid}" name="addloc[${count}][veh_total][${vindex}]" value="${v_veh_total}" class="form-control input-sm veh_total${vindex}" maxlength="5" oninput="validateNumericInput(this);"readonly>
													</div>
													
												</div>`;

						});
					} else {
						newCard += `<input type="hidden" id="veh_model${count}0" name="addloc[${count}][veh_model][0]" value="">
															<input type="hidden" id="veh_count${count}0" name="addloc[${count}][veh_count][0]" value="0">
															<input type="hidden" id="day_rent${count}0" name="addloc[${count}][day_rent][0]" value="0">
															<input type="hidden" id="max_km_day${count}0" name="addloc[${count}][max_km_day][0]" value="0">
															<input type="hidden" id="extra_km_rate${count}0" name="addloc[${count}][extra_km_rate][0]" value="0">
															<input type="hidden" id="veh_total${count}0" name="addloc[${count}][veh_total][0]" value="0">`;
					}
					newCard += `
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					`;

					breadcrumb += `
						
						<li class="bc-card" data-index="${count}">
							<a>
								<span class="bc-card-seq" style="color:#fff">${count}</span>.<span style="color:#fff">${item.geog_name}(<span id="span_night_id${count}" style="color:#fff">${item.no_of_days}</span>)<span id="loc_total${count}" style="color:#fff">${d_totals + s_totals} ${plus} ${vtots}</span></span>
							</a>
						</li>
					`;

					$('.dyn_list').html(breadcrumb);

					setTimeout(function() {
						var hotelCat = $('#hotelcat' + count);
						console.log("Dropdown found?", hotelCat.length);

						if (hotelCat.length > 0) {
							hotelCat.empty();
							hotelCat.append('<option value="">Select</option>');

							$.each(hotel_categories, function(hIndex, hotelcat) {
								var selected = (hotelcat.hotel_category_id == item.hot_cat_id) ? "selected" : "";
								hotelCat.append('<option value="' + hotelcat.hotel_category_id + '" ' + selected + '>' + hotelcat.hotel_category_name + '</option>');
							});

							hotelCat.trigger('change');
						} else {
							console.log("Dropdown not found. Ensure it exists before updating.");
						}
					}, 500);
				});
				$(".tour_plan_div").append(newCard);

				var totalNights = calculateTotalNights();
				if (totalNights == no_of_night) {
					$("#btn_save_tour_plan").show();
					$('#btn_add_bt').prop('disabled', true);
				} else {
					$("#btn_save_tour_plan").hide();
					$('#btn_add_bt').prop('disabled', false);
				}

				updateSequenceNumbers();
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});
	});
</script>

<script>
	function get_accom_grand_total() {
		var grand_tot = 0;
		$('.tour_plan_div .location-card').each(function(index) {
			let id = index + 1;

			var double_value = parseInt($('#d_total_rate' + id).val());
			var single_value = parseInt($('#s_total_rate' + id).val());
			grand_tot = grand_tot + double_value + single_value;

		});
		return grand_tot;
	}
</script>
<script>
	function get_veh_grand_total() {
		var grand_tot = 0;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var vid;
		var id;
		var grand_tot = 0;
		var vsum;
		$('.tour_plan_div .location-card').each(function(index) {
			id = index + 1;
			vsum = 0;
			$.each(vehicle_models, function(veh_index, veh_model) {
				vid = id + veh_model.vehicle_type_id;
				vsum = vsum + parseInt($('#veh_total' + vid).val());
			});
			grand_tot = grand_tot + vsum;
		});
		return grand_tot;
	}

	function get_veh_grand_total_byloc(idt) {
		var grand_tot = 0;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var vid;
		var id;
		var grand_tot = 0;
		var vsum;
		$('.tour_plan_div .location-card').each(function(index) {
			id = index + 1;
			if (id == idt) {
				vsum = 0;
				$.each(vehicle_models, function(veh_index, veh_model) {
					vid = id + veh_model.vehicle_type_id;
					vsum = vsum + parseInt($('#veh_total' + vid).val());
				});
				grand_tot = grand_tot + vsum;
			}
		});
		return grand_tot;
	}

	function get_accom_grand_total_byloc(idt) {
		var grand_tot = 0;
		$('.tour_plan_div .location-card').each(function(index) {
			let id = index + 1;
			if (id == idt) {
				var double_value = parseInt($('#d_total_rate' + id).val());
				var single_value = parseInt($('#s_total_rate' + id).val());
				grand_tot = grand_tot + double_value + single_value;
			}

		});
		return grand_tot;
	}
</script>

<script>
	$(document).on('click', '.load_vehs_click', function() {
		var id = $(this).attr('data-id');
		var no_of_night = $('#no_of_night' + id).val();
		var checkin = $('#checkin' + id).val();
		var checkout = $('#checkout' + id).val();
		var vehicle_from_location = <?php echo $object_det[0]['vehicle_from_location']; ?>;
		var arrival_location = <?php echo $object_det[0]['arrival_location']; ?>;
		var departure_location = <?php echo $object_det[0]['departure_location']; ?>;
		var tour_location_id = $('#tour_location_id' + id).val();
		if (id > 1) {
			var pid = parseInt(id) - 1;
			var previous_location_id = $('#tour_location_id' + pid).val();
		} else {
			var previous_location_id = null;
		}
		var duration = <?php echo $object_det[0]['no_of_night']; ?>;
		var totalNights = calculateTotalNights();
		var vid;
		var veh_total = 0;
		var extra_klm = 0;
		var extra_cost = 0;
		var veh_totals = 0;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required == 1) {
			var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		} else {
			var vehicle_models = null;
		}
		if (no_of_night == '' || no_of_night == null || no_of_night == 'undefined') {
			alert("Please enter number of nights");
			$("#roomcat" + id)[0].selectedIndex = 0;
		} else if (no_of_night == 0) {
			alert("Number of nights must be greater than zero");
			$('#no_of_night' + id).val('');
		} else {
			$.ajax({
				url: "<?= site_url('Enquiry/getVehicleTariffDetails'); ?>",
				method: "POST",
				data: {
					no_of_night: no_of_night,
					vehicle_models: vehicle_models,
					id: id,
					duration: duration,
					totalNights: totalNights,
					tour_location_id: tour_location_id,
					vehicle_from_location: vehicle_from_location,
					arrival_location: arrival_location,
					departure_location: departure_location,
					checkin: checkin,
					checkout: checkout,
					previous_location_id: previous_location_id
				},
				dataType: 'json',
				success: function(data) {
					console.log(data);
					//if(data.length > 0){
					var total_double = parseInt($('#d_total_rate' + id).val());
					var total_single = parseInt($('#s_total_rate' + id).val());

					if (data.distance_type == 1) {
						var v_from_to_data = " - (Hub Location to Arrival - " + data.dist1 + " KM, Arrival to Location - " + data.dist2 + " KM, Location to Departure - " + data.dist3 + " KM, Departure to Hub Location - " + data.dist4 + "KM)";
						$('#v_from_to' + id).html(v_from_to_data);
						$('#veh_header' + id).val(v_from_to_data);
					} else if (data.distance_type == 2) {
						var v_from_to_data = " - (Hub Location to Arrival - " + data.dist1 + " KM, Arrival to Location - " + data.dist2 + " KM)";
						$('#v_from_to' + id).html(v_from_to_data);
						$('#veh_header' + id).val(v_from_to_data);
					} else if (data.distance_type == 3) {
						var v_from_to_data = " - (Location to Departure - " + data.dist1 + " KM, Departure to Hub Location - " + data.dist2 + "KM)";
						$('#v_from_to' + id).html(v_from_to_data);
						$('#veh_header' + id).val(v_from_to_data);
					} else {
						var v_from_to_data = " - (Previous Location to Current Location - " + data.total_distance + " KM)";
						$('#v_from_to' + id).html(v_from_to_data);
						$('#veh_header' + id).val(v_from_to_data);
					}
					var veh_grand_tot = 0;
					if (data.vehicles.length > 0) {

						$.each(data.vehicles, function(index, item) {
							if (parseInt(data.total_distance, 10) > parseInt(item.max_km_day, 10)) {
								extra_klm = parseInt(data.total_distance) - parseInt(item.max_km_day);
							} else {
								extra_klm = 0;
							}
							extra_cost = parseInt(extra_klm) * parseInt(item.extra_km_rate);
							vid = id + item.vehicle_type_id;
							veh_totals = (parseInt(item.vehicle_count) * parseInt(item.rate_per_day)) * parseInt(no_of_night);
							veh_total = veh_totals + parseInt(extra_cost);
							$('#day_rent' + vid).val(item.rate_per_day);
							$('#max_km_day' + vid).val(item.max_km_day);
							$('#extra_km_rate' + vid).val(item.extra_km_rate);
							$('#veh_total' + vid).val(veh_total);
							$('#travel_distance' + vid).val(data.total_distance);
							$('#extra_kilometer' + vid).val(extra_klm);
							veh_grand_tot = veh_grand_tot + veh_total;
						});
					}
					var accom_temp = total_double + total_single;
					$('#loc_total' + id).text(accom_temp + " + " + veh_grand_tot);
					var veh_grand_total = get_veh_grand_total();
					veh_grand_total += parseFloat($('#extraklm_hidden').val()) || 0;
					veh_grand_total += parseFloat($('#permit_hidden').val()) || 0;
					$('#v_total').text(veh_grand_total);
					var accom_grand_total = get_accom_grand_total();
					$('#a_total').text(accom_grand_total);
					var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
					$('#g_total').text(g_total);
					//}
				}
			});
		}
	});
</script>

<script>
	$(document).on('change', '.hotel_fac_change', function() {
		var facility_ids = $(this).val(); // array of selected facility ids
		var id = $(this).attr('data-id');

		if (facility_ids && facility_ids.length > 0) {
			$.ajax({
				url: "<?= site_url('Enquiry/getHotelFacilityTariff'); ?>",
				method: "POST",
				data: {
					facility_ids: facility_ids
				},
				dataType: 'json',
				success: function(data) {
					var total = 0;
					if (data.length > 0) {
						for (var i = 0; i < data.length; i++) {
							total += parseFloat(data[i].tariff);
						}
					}
					$('#fac_rate' + id).val(total);
				},
				error: function(xhr, status, error) {
					console.error("Tariff fetch error:", error);
					$('#fac_rate' + id).val(0);
				}
			});
		} else {
			$('#fac_rate' + id).val(0);
		}
	});
</script>


<script>
	$(document).ready(function() {
		// Define a reusable function
		function toggleVehicleFields(checkbox) {
			var isChecked = $(checkbox).is(':checked');
			var vid = $(checkbox).val();

			const fields = [
				'#veh_model' + vid,
				'#day_rent' + vid,
				'#max_km_day' + vid,
				'#travel_distance' + vid,
				'#extra_kilometer' + vid,
				'#extra_km_rate' + vid,
				'#veh_total' + vid
			];

			fields.forEach(function(selector) {
				$(selector).prop('disabled', !isChecked);
				$(selector).css('background-color', isChecked ? '#ffffff' : '#669999');
			});


		}

		// Trigger on checkbox change
		$(document).on('change', '.chk_vehicle', function() {
			toggleVehicleFields(this);
		});

		// Call once on document ready for all .chk_vehicle checkboxes
		var itinerary_details_draft = <?php echo json_encode($itinerary_details_draft); ?>;
		if (Array.isArray(itinerary_details_draft) && itinerary_details_draft.length > 0) {
			$('.chk_vehicle').each(function() {
				toggleVehicleFields(this);
				var vid = $(this).attr('data-id');
				setTimeout(() => calculateGrandTotal(vid), 300);
			});
			$('input[id^="ss_distance"]').trigger('input');
			//$('.ss_change').trigger('change');
		}
	});
</script>
<script>
	function updateTotalAccommodationCost() {
		setTimeout(function() {
			let totalAccommodationCost = 0;
			let totalTransportationCost = 0;
			let specialEventTotal = 0;
			let dailyAddonTotal = 0;
			let totalNetRate = 0;
			let travel_distanceCost = 0;

			// Sum all visible and hidden fac_rate inputs


			$('input[id^="travel_distance"]').each(function() {
				travel_distanceCost += parseInt($(this).val()) || 0;
			});

			// $('input[id^="fac_rate"]').each(function() {
			// 	totalAccommodationCost += parseFloat($(this).val()) || 0;
			// });
			//NJ//
			// Sum all visible and hidden total inputs
			$('input[id^="acc_total"]').each(function() {
				totalAccommodationCost += parseFloat($(this).val()) || 0;
			});
			// Update the span

			$('#btn_total_km').text("Total KM : " + travel_distanceCost);

			$('#tac_span').text(totalAccommodationCost);
			$('#tac_hidden').val(totalAccommodationCost);
			$('#a_total').text(totalAccommodationCost);

			$('input.chk_vehicle:checked').each(function() {
				const vid = $(this).val();
				const vehTotal = parseFloat($('#veh_total' + vid).val()) || 0;
				totalTransportationCost += vehTotal;
			});

			totalTransportationCost += parseFloat($('#extraklm_hidden').val()) || 0;
			totalTransportationCost += parseFloat($('#permit_hidden').val()) || 0;
			$('#ttc_span').text(totalTransportationCost);
			$('#ttc_hidden').val(totalTransportationCost);
			$('#v_total').text(totalTransportationCost);

			$('input[id^="spcl_tariff"]').each(function() {
				specialEventTotal += parseFloat($(this).val()) || 0;
			});
			$('#spcl_span').text(specialEventTotal);
			$('#spcl_hidden').val(specialEventTotal);

			$('input[id^="daily_addon"]').each(function() {
				dailyAddonTotal += parseFloat($(this).val()) || 0;
			});
			$('#daily_span').text(dailyAddonTotal);
			$('#daily_hidden').val(dailyAddonTotal);

			/*********************Bifur********************/
			var no_of_adult_b = <?php echo $object_det[0]['no_of_adult']; ?>;
			var no_of_child_with_bed_b = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
			var no_of_child_without_bed_b = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
			var total_no_of_pax_bifur = parseInt(no_of_adult_b) + parseInt(no_of_child_with_bed_b) + parseInt(no_of_child_without_bed_b);
			var round_off_bifur = parseFloat($('#tour_addon_value').val());
			var bifur_ss = specialEventTotal + dailyAddonTotal;
			$('#bifur_ss_span').text(bifur_ss);
			$('#bifur_ss_hidden').val(bifur_ss);
			$('#bifur_ss_span_pp').text((bifur_ss / total_no_of_pax_bifur));
			$('#bifur_ss_hidden_pp').val((bifur_ss / total_no_of_pax_bifur));

			$('#round_off_span').text(round_off_bifur);
			$('#round_off_hidden').val(round_off_bifur);
			$('#round_off_span_pp').text((round_off_bifur / total_no_of_pax_bifur));
			$('#round_off_hidden_pp').val((round_off_bifur / total_no_of_pax_bifur));
			/*********************Bifur********************/

			$('input.grand_total').each(function() {
				totalNetRate += parseFloat($(this).val()) || 0;
			});

			totalNetRate += specialEventTotal;
			totalNetRate += parseFloat($('#extraklm_hidden').val()) || 0;
			totalNetRate += parseFloat($('#permit_hidden').val()) || 0;
			$('#tnr_span').text(totalNetRate);
			$('#tnr_hidden').val(totalNetRate);
			$('#g_total').text(totalNetRate);
		}, 300);
	}


	function calculateGrandTotal(vid) {
		let total = 0;

		// Use vid as a prefix selector within that tab
		const $scope = $(`[data-index="${vid}"]`);

		if ($scope.length) {
			// 1. Checked vehicle totals within this vid
			$scope.find('.chk_vehicle:checked').each(function() {
				const v = $(this).val();
				const vehTotal = parseFloat($('#veh_total' + v).val()) || 0;
				console.log(`Vehicle ${v} total: ${vehTotal}`); // Debug log
				total += vehTotal;
			});

			// 2. acc_total (accommodation)
			$scope.find('input[id^="acc_total"]').each(function() {
				total += parseFloat($(this).val()) || 0;
			});

			// 3. PAX-based sightseeing grand total (THIS WAS MISSING!)
			const ssGrandTotal = parseFloat($('#ss_grand_total' + vid).val()) || 0;
			console.log(`Sightseeing grand total for ${vid}: ${ssGrandTotal}`); // Debug log
			total += ssGrandTotal;

			// 4. spcl_tariff (special tariff)
			// $scope.find('input[id^="spcl_tariff"]').each(function() {
			// 	total += parseFloat($(this).val()) || 0;
			// });

			// 5. daily_addon
			$scope.find('input[id^="daily_addon"]').each(function() {
				total += parseFloat($(this).val()) || 0;
			});

			// Update grand total field
			$scope.find('.grand_total').val(total);
			$('#span_bread_id' + vid).text(total);

			console.log(`Grand total for ${vid}: ${total}`); // Debug log
		}

		// Update overall totals
		updateTotalAccommodationCost();
		setTimeout(function() {
			updateMarginTotal();
			updateTourAddonTotal();
			updateGSTandTotalPackageCost();
		}, 300);
	}
	//NJ//
	$(document).on('input change', 'input[id^="no_of_ch"], input[id^="no_of_cw"], input[id^="no_of_extra"]', function() {
		var dataIndex = $(this).closest('[data-index]').data('index');
		var $locationCard = $('.location-card[data-index="' + dataIndex + '"]');

		// Get room category
		var room_cat_id = $('#roomcat' + dataIndex).val();

		if (room_cat_id && room_cat_id != 0) {
			// Trigger room category change to recalculate
			$('#roomcat' + dataIndex).trigger('change');
		}
	});

	// Recalculate when room rates change manually
	$(document).on('input change', 'input[id^="d_adult_rate"], input[id^="d_child_rate"], input[id^="d_child_wb_rate"], input[id^="d_extra_bed_rate"], input[id^="s_adult_rate"]', function() {
		var dataIndex = $(this).closest('[data-index]').data('index');
		var $locationCard = $('.location-card[data-index="' + dataIndex + '"]');

		// Get values
		var tax_status = $('#tax_status' + dataIndex).val();
		var no_of_ch = parseInt($('#no_of_ch' + dataIndex).val() || 0);
		var no_of_cw = parseInt($('#no_of_cw' + dataIndex).val() || 0);
		var no_of_extra = parseInt($('#no_of_extra' + dataIndex).val() || 0);

		var total_double = 0;
		var total_single = 0;

		// Get all double room rows
		var doubleRows = $locationCard.find('.double_row');
		doubleRows.each(function() {
			var $row = $(this);
			var roomInput = $row.find('input[id^="double"]');

			if (roomInput.length && roomInput.val()) {
				var roomCount = parseInt(roomInput.val() || 0);
				var room_r = parseInt($row.find('input[id^="d_adult_rate"]').val() || 0);
				var child_r = parseInt($row.find('input[id^="d_child_rate"]').val() || 0);
				var child_wb_r = parseInt($row.find('input[id^="d_child_wb_rate"]').val() || 0);
				var extra_r = parseInt($row.find('input[id^="d_extra_bed_rate"]').val() || 0);

				// Calculate row total based on actual values in fields
				var row_ch = child_r > 0 ? 1 : 0;
				var row_cw = child_wb_r > 0 ? 1 : 0;
				var row_extra = extra_r > 0 ? 1 : 0;

				var row_total = (room_r * roomCount) + (row_ch * child_r) + (row_cw * child_wb_r) + (row_extra * extra_r);

				if (tax_status == 1) {
					var per_room = room_r + (row_ch * child_r) + (row_cw * child_wb_r) + (row_extra * extra_r);
					if (per_room >= 7500) {
						var gst = 18;
						var gstval = (gst / 100) * per_room;
						total_double += (per_room + gstval) * roomCount;
					} else {
						total_double += row_total;
					}
				} else {
					total_double += row_total;
				}
			}
		});

		// Calculate single room total
		var singleRows = $locationCard.find('.single_row');
		singleRows.each(function() {
			var $row = $(this);
			var roomInput = $row.find('input[id^="single"]');

			if (roomInput.length && roomInput.val()) {
				var roomCount = parseInt(roomInput.val() || 0);
				var s_room_r = parseInt($row.find('input[id^="s_adult_rate"]').val() || 0);

				if (tax_status == 1 && s_room_r >= 7500) {
					var gst = 18;
					var gstval = (gst / 100) * s_room_r;
					total_single += (s_room_r + gstval) * roomCount;
				} else {
					total_single += s_room_r * roomCount;
				}
			}
		});

		$('#acc_total' + dataIndex).val(total_double + total_single);

		// Trigger recalculation
		setTimeout(() => {
			calculateGrandTotal(dataIndex);
			updateTotalAccommodationCost();
		}, 300);
	});

	// Recalculate when facility rate changes
	$(document).on('input change', 'input[id^="fac_rate"]', function() {
		var dataIndex = $(this).closest('[data-index]').data('index');
		setTimeout(() => {
			calculateGrandTotal(dataIndex);
			updateTotalAccommodationCost();
		}, 300);
	});

	// Recalculate when special tariff changes
	$(document).on('input change', 'input[id^="spcl_tariff"]', function() {
		var dataIndex = $(this).closest('[data-index]').data('index');
		setTimeout(() => {
			calculateGrandTotal(dataIndex);
			updateTotalAccommodationCost();
		}, 300);
	});

	// Recalculate when daily addon changes
	$(document).on('input change', 'input[id^="daily_addon"], input[id^="permit"]', function() {
		var dataIndex = $(this).closest('[data-index]').data('index');
		setTimeout(() => {
			calculateGrandTotal(dataIndex);
			updateTotalAccommodationCost();
		}, 300);
	});
	//////
	$(document).on('change', '.hotel_fac_change', function() {
		var vid = $(this).attr('data-id');
		var dataIndex = $(this).closest('[data-index]').data('index');
		setTimeout(() => calculateGrandTotal(dataIndex), 300);
	});

	$(document).on('click', '.chk_vehicle', function() {
		var vid = $(this).attr('data-id');
		setTimeout(() => calculateGrandTotal(vid), 300);
	});

	$(document).on('change', '.ss_change', function() {
		var vid = $(this).data('id');
		setTimeout(() => calculateGrandTotal(vid), 300);
	});

	$(document).on('input', 'input[id^="ss_distance"]', function() {
		var vid = $(this).attr('id').replace('ss_distance', '');
		setTimeout(() => calculateGrandTotal(vid), 300);
	});

	$(document).on('input', 'input[id^="spcl_tariff"]', function() {
		var vid = $(this).attr('id').replace('spcl_tariff', '');
		setTimeout(() => calculateGrandTotal(vid), 300);
	});

	$(document).on('input', 'input[id^="spcl_tariff"]', function() {
		$('input[id^="spcl_tariff"]').each(function() {
			var vid = $(this).attr('id').replace('spcl_tariff', '');
			setTimeout(() => calculateGrandTotal(vid), 300);
		});
	});

	$(document).on('input', 'input[id^="daily_addon"]', function() {
		var vid = $(this).attr('id').replace('daily_addon', '');
		setTimeout(() => calculateGrandTotal(vid), 300);
	});

	$(document).on('input', 'input[id^="travel_distance"]', function() {
		var vid = $(this).attr('id').replace('travel_distance', '');
		setTimeout(() => calculateGrandTotal(vid), 300);
	});
</script>
<script>
	$(document).ready(function() {

		$("#btn_savedraft_iti_plan").click(function() {
			$("#submit_type").val("draft");
		});

		$("#btn_save_iti_plan").click(function() {
			$("#submit_type").val("final");
		});

	});
</script>
<script>
	$(document).ready(function() {
		$(document).on('change', '.chk_vehicle', function() {
			let isChecked = $(this).is(':checked');
			let checkboxName = $(this).attr('name');
			let hiddenName = checkboxName.replace('chk_vehicle', 'chk_vehicle_hidden');

			// Set value to 1 if checked, else 0
			$('input[name="' + hiddenName + '"]').val(isChecked ? '1' : '0');
		});
	});
</script>

<script>
	$(document).ready(function() {
		var lastTourDetailsId = "<?= end($tour_plan_det)['tour_details_id']; ?>";

		var lastInnerTabId = "<?php
								$last = end($tour_plan_det);
								$start = new DateTime($last['check_in_date']);
								$end = new DateTime($last['check_out_date']);
								$end->modify('+1 day');
								$lastInner = '';
								while ($start < $end) {
									$lastInner = $last['tour_details_id'] . '_' . $start->format('d-m-Y');
									$start->modify('+1 day');
								}
								echo $lastInner;
								?>";

		function toggleFinalSaveButton() {
			const activeOuter = $('.tabs-menu1 .nav a.active').attr('href');
			const activeInner = $('.tab-pane.show.active .nav-link.active').attr('href');

			if (activeOuter === "#tab-" + lastTourDetailsId && activeInner === "#tabi-" + lastInnerTabId) {
				$('#btn_save_iti_plan').show();
				$('#btn_savedraft_iti_plan').hide();
			} else {
				$('#btn_save_iti_plan').hide();
				$('#btn_savedraft_iti_plan').show();
			}
		}

		toggleFinalSaveButton();
		$('a[data-toggle="tab"]').on('shown.bs.tab', toggleFinalSaveButton);
	});
</script>
<script>
	function updateMarginTotal() {
		var tnr = parseFloat($('#tnr_hidden').val()) || 0;
		var margin_value = parseFloat($('#margin_value').val()) || 0;
		var tour_addon_value = parseFloat($('#tour_addon_total').val()) || 0;
		var marginPercent = (margin_value / 100) * tnr;
		$('#margin_total').val(marginPercent);
		var total_final = tnr + marginPercent + tour_addon_value;
		$('#total_final').val(total_final);

		var gst_value = parseFloat($('#gst_value').val()) || 0;
		var gst_final = (gst_value / 100) * total_final;
		$('#gst_final').val(gst_final);

		var tpc = total_final + gst_final;
		//$('#tpc').val(tpc);
		$('#tpc').val(parseInt(tpc));
	}

	$(document).on('input', '#margin_value', function() {
		updateMarginTotal();
	});

	function updateTourAddonTotal() {
		var tnr = parseFloat($('#tnr_hidden').val()) || 0;
		var margin_value = parseFloat($('#margin_value').val()) || 0;
		var tour_addon_value = parseFloat($('#tour_addon_value').val()) || 0;
		$('#tour_addon_total').val(tour_addon_value);

		var no_of_adult = <?php echo $object_det[0]['no_of_adult']; ?>;
		var no_of_child_with_bed = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
		var no_of_child_without_bed = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
		var total_pax = parseInt(no_of_adult) + parseInt(no_of_child_with_bed) + parseInt(no_of_child_without_bed);
		var total_pax_px = tour_addon_value / total_pax;
		$('#round_off_span').text(tour_addon_value);
		$('#round_off_hidden').val(tour_addon_value);
		$('#round_off_span_pp').text(total_pax_px);
		$('#round_off_hidden_pp').val(total_pax_px);


		var marginPercent = (margin_value / 100) * tnr;
		$('#margin_total').val(marginPercent);
		var total_final = tnr + marginPercent + tour_addon_value;
		$('#total_final').val(total_final);

		var gst_value = parseFloat($('#gst_value').val()) || 0;
		var gst_final = (gst_value / 100) * total_final;
		$('#gst_final').val(gst_final);

		var tpc = total_final + gst_final;
		//$('#tpc').val(tpc);
		$('#tpc').val(parseInt(tpc));
	}
	$(document).on('input', '#tour_addon_value', function() {
		updateTourAddonTotal();
	});

	function updateGSTandTotalPackageCost() {
		var totalFinal = parseFloat($('#total_final').val()) || 0;
		var gst_value = parseFloat($('#gst_value').val()) || 0;
		var gstPercent = (gst_value / 100) * totalFinal;
		var totalPackageCost = totalFinal + gstPercent;
		$('#gst_final').val(gstPercent);
		//$('#tpc').val(totalPackageCost);
		$('#tpc').val(parseInt(totalPackageCost));
	}
	$(document).on('change', '#gst_value', function() {
		updateGSTandTotalPackageCost();
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		var i = 0;
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_adult = <?php echo $object_det[0]['no_of_adult']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var no_of_ch = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
		var no_of_cw = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
		var no_of_extra = <?php echo $object_det[0]['no_of_extra_bed']; ?>;

		var iti_edit_id = <?php echo isset($iti_edit_id) && $iti_edit_id !== '' ? $iti_edit_id : 0; ?>;
		if (iti_edit_id == 1) {
			var read_only = "readonly";
			var dis_abled = 'style="pointer-events: none; background-color: #eee;"';
		} else {
			var read_only = "";
			var dis_abled = "";
		}
		$('.add_hotel').on('click', function() {

			var $btn = $(this);
			var sequenceAttr = $btn.attr('data-sequence');
			if (sequenceAttr !== undefined && sequenceAttr !== '') {
				i = parseInt(sequenceAttr);
			} else {
				i++;
			}
			var html = '';
			//i++;
			var id_t = $(this).attr('data-id');
			var hotelRowCount = $('#hotel_dynamic_fields' + id_t + ' .dynamic-added').length;
			if (hotelRowCount >= 2) {
				$btn.prop('disabled', true);
				return;
			}


			var tour_date = $(this).attr('data-td');
			var tour_location_id = $(this).attr('data-tl');
			var meal_plan_id = $(this).attr('data-mp');
			var old_id = $(this).attr('data-oid');
			var hlist = JSON.parse($(this).attr('data-hid'));
			var id = id_t + "_" + i;
			html += '<div id="row' + id + '" class="dynamic-added card" data-index="' + id_t + '">';
			html += '<div class="row mt-2">';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<input type="hidden" id="id' + id + '" name="hotel_additi[' + i + '][id]" value="' + id_t + '">';
			html += '<input type="hidden" id="sequence' + id + '" name="hotel_additi[' + i + '][sequence]" value="' + i + '">';
			html += '<input type="hidden" id="idvalue' + id + '" name="hotel_additi[' + i + '][idvalue]" value="' + id + '">';
			html += '<input type="hidden" id="own_arrange' + id + '" name="hotel_additi[' + i + '][own_arrange]" value="0">';
			html += '<input type="hidden" id="tour_date' + id + '" name="hotel_additi[' + i + '][tour_date]" value="' + tour_date + '">';
			html += '<input type="hidden" id="tour_location_id' + id + '" name="hotel_additi[' + i + '][tour_location_id]" value="' + tour_location_id + '">';
			html += '<input type="hidden" id="meal_plan_id' + id + '" name="hotel_additi[' + i + '][meal_plan_id]" value="' + meal_plan_id + '">';

			html += '<div class="teams-rank"><b>Hotel</b></div>';
			html += '<select id="hotelid' + id + '" name="hotel_additi[' + i + '][hotelid]" data-id="' + id + '" class="form-control input-sm hotel_change hotel" required ' + dis_abled + '>';
			html += '<option value="">Select</option>';
			$.each(hlist, function(index, item) {
				html += '<option value="' + item.hotel_id + '">' + item.object_name + '</option>';
			});
			html += '</select>';
			html += '</div>';

			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Room Category</b></div>';
			html += '<select id="roomcat' + id + '" name="hotel_additi[' + i + '][roomcat]" data-id="' + id + '" data-sid="2" class="form-control input-sm room_cat_change room_cat" required ' + dis_abled + '>';
			html += '<option value="">Select</option>';

			html += '</select>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>No Of Adult</b></div>';
			html += '<input type="text" id="no_of_adult' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][no_of_adult]" value="' + no_of_adult + '" class="form-control input-sm" maxlength="2" readonly>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>C.With Bed Qty</b></div>';
			html += '<input type="text" id="no_of_ch' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][no_of_ch]" value="0" class="form-control input-sm" maxlength="2" required ' + read_only + '>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>C.Without Bed Qty</b></div>';
			html += '<input type="text" id="no_of_cw' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][no_of_cw]" value="0" class="form-control input-sm" maxlength="2" required ' + read_only + '>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Extra Bed Qty</b></div>';
			html += '<input type="text" id="no_of_extra' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][no_of_extra]" value="0" class="form-control input-sm" maxlength="2" required ' + read_only + '>';
			html += '</div>';

			html += '</div>';

			html += '<div class="row mt-2">';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Room Type</b></div>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>No Of Rooms</b></div>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Daily Room Rate</b></div>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>C.With Bed Rate</b></div>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>C.Without Bed Rate</b></div>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Extra Bed Rate</b></div>';
			html += '</div>';
			html += '</div>';
			if (no_of_double_room > 0) {
				html += '<div class="row mt-2">';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" value="Double" class="form-control input-sm" maxlength="2" readonly>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="double' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][double]" class="form-control input-sm" maxlength="6" value="0" required ' + read_only + '>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="d_adult_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][d_adult_rate]" class="form-control input-sm" maxlength="6" value="" required ' + read_only + '>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="d_child_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][d_child_rate]" class="form-control input-sm" maxlength="6" value="" required ' + read_only + '>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="d_child_wb_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][d_child_wb_rate]" class="form-control input-sm" maxlength="6" value="" required ' + read_only + '>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="d_extra_bed_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][d_extra_bed_rate]" class="form-control input-sm" maxlength="6" value="" required ' + read_only + '>';
				html += '</div>';
				html += '</div>';
			} else {
				html += '<input type="hidden" id="double' + id + '" name="hotel_additi[' + i + '][double]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="d_adult_rate' + id + '" name="hotel_additi[' + i + '][d_adult_rate]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="d_child_rate' + id + '" name="hotel_additi[' + i + '][d_child_rate]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="d_child_wb_rate' + id + '" name="hotel_additi[' + i + '][d_child_wb_rate]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="d_extra_bed_rate' + id + '" name="hotel_additi[' + i + '][d_extra_bed_rate]" class="form-control input-sm" maxlength="6" value="0">';
			}
			if (no_of_single_room > 0) {
				html += '<div class="row mt-2">';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" value="Single" class="form-control input-sm" maxlength="2" readonly>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="single' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][single]" class="form-control input-sm" maxlength="6" value="0" required ' + read_only + '>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="s_adult_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][s_adult_rate]" class="form-control input-sm" maxlength="6" value="" required ' + read_only + '>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="s_child_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][s_child_rate]" class="form-control input-sm" maxlength="6" value="" readonly>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="s_child_wb_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][s_child_wb_rate]" class="form-control input-sm" maxlength="6" value="" readonly>';
				html += '</div>';
				html += '<div class="col-xl-2 col-sm-12 col-md-2">';
				html += '<input type="text" id="s_extra_bed_rate' + id + '" data-id="' + id + '" name="hotel_additi[' + i + '][s_extra_bed_rate]" class="form-control input-sm" maxlength="6" value="" readonly>';
				html += '</div>';
				html += '</div>';
			} else {
				html += '<input type="hidden" id="single' + id + '" name="hotel_additi[' + i + '][single]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="s_adult_rate' + id + '" name="hotel_additi[' + i + '][s_adult_rate]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="s_child_rate' + id + '" name="hotel_additi[' + i + '][s_child_rate]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="s_child_wb_rate' + id + '" name="hotel_additi[' + i + '][s_child_wb_rate]" class="form-control input-sm" maxlength="6" value="0">';
				html += '<input type="hidden" id="s_extra_bed_rate' + id + '" name="hotel_additi[' + i + '][s_extra_bed_rate]" class="form-control input-sm" maxlength="6" value="0">';
			}

			html += '<div class="row mt-2">';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Hotel Facility</b></div>';
			html += '<select id="hotfac' + id + '" name="hotel_additi[' + i + '][hotfac]" class="form-control input-sm hotel_fac_change hot_fac" data-id="' + id + '" ' + dis_abled + '>';
			html += '<option value="">Select</option>';

			html += '</select>';
			html += '</div>';
			html += '<div class="col-xl-2 col-sm-12 col-md-2">';
			html += '<div class="teams-rank"><b>Facility Rate</b></div>';
			html += '<input type="text" id="fac_rate' + id + '" name="hotel_additi[' + i + '][fac_rate]" class="form-control input-sm" maxlength="6" value="" readonly>';
			html += '</div>';
			html += '<div class="col-xl-6 col-sm-12 col-md-6">';
			html += '<div class="teams-rank"><b>Remarks</b></div>';
			html += '<textarea id="remarks' + id + '" name="hotel_additi[' + i + '][remarks]" class="form-control input-sm" ' + read_only + '></textarea>';
			html += '</div>';
			html += '<div class="col-xl-1 col-sm-12 col-md-1">';
			html += '<div class="teams-rank"><b>Total</b></div>';
			html += '<input type="text" id="acc_total' + id + '" name="hotel_additi[' + i + '][acc_total]" class="form-control input-sm" maxlength="6" value="" readonly>';
			html += '</div>';
			html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
			html += '<button type="button" name="remove" id="' + id + '" data-oid="' + old_id + '" data-nid="' + id + '" class="btn btn-danger btn-sm btn_agency_remove" ' + dis_abled + '>X</button>';
			html += '</div>';
			html += '</div>';


			html += '</div>';
			$('#hotel_dynamic_fields' + id_t).append(html);

		});
		$(document).on('click', '.btn_agency_remove', function() {
			var button_id = $(this).attr("id");
			var old_id = $(this).attr('data-oid');
			var id = $(this).attr('data-nid');
			$('#row' + button_id + '').remove();

			var hotelCount = $('#hotel_dynamic_fields' + old_id + ' .dynamic-added').length;
			if (hotelCount < 2) {
				$('.add_hotel[data-id="' + old_id + '"]').prop('disabled', false);
			}

			setTimeout(() => calculateGrandTotal(old_id), 300);
		});
	});
</script>
<script>
	function waitForElement(selector, callback) {
		let attempts = 0;
		const maxAttempts = 20;
		const interval = setInterval(function() {
			if ($(selector).length) {
				clearInterval(interval);
				callback($(selector));
			}
			if (++attempts >= maxAttempts) {
				clearInterval(interval);
				console.warn("Element not found after max attempts:", selector);
			}
		}, 200);
	}

	$(document).ready(function() {
		const d_hotels = <?php echo json_encode($d_hotels); ?>;
		console.log(d_hotels);

		if (Array.isArray(d_hotels) && d_hotels.length > 0) {
			setTimeout(() => {
				$.each(d_hotels, function(index, item) {
					const selector =
						'.add_hotel' +
						'[data-mp="' + item.meal_plan_id + '"]' +
						'[data-tl="' + item.tour_location_id + '"]' +
						'[data-td="' + item.tour_date + '"]' +
						'[data-id="' + item.id + '"]' +
						'[data-oid="' + item.id + '"]';

					const $btn = $(selector);

					if ($btn.length > 0) {
						console.log("Triggering add for:", item.idvalue);
						$btn.attr('data-sequence', item.sequence);
						$btn.trigger("click");
						$btn.removeAttr('data-sequence');
						// Wait for dynamic block to render
						waitForElement('#hotelid' + item.idvalue, function() {
							const id = item.idvalue;

							$('#hotelid' + id).val(item.hotelid).trigger('change');

							// Wait again for hotel dropdown to load room/facility
							setTimeout(() => {
								$('#roomcat' + id).val(item.roomcat).trigger('change');
								$('#hotfac' + id).val(item.hotfac).trigger('change');


								// Wait a little before setting rate inputs
								setTimeout(() => {
									$('#no_of_ch' + id).val(item.no_of_ch);
									$('#no_of_cw' + id).val(item.no_of_cw);
									$('#no_of_extra' + id).val(item.no_of_extra);
									$('#double' + id).val(item.double);
									$('#single' + id).val(item.single);

									$('#d_adult_rate' + id).val(item.d_adult_rate);
									$('#d_child_rate' + id).val(item.d_child_rate);
									$('#d_child_wb_rate' + id).val(item.d_child_wb_rate);
									$('#d_extra_bed_rate' + id).val(item.d_extra_bed_rate);

									$('#s_adult_rate' + id).val(item.s_adult_rate);
									$('#s_child_rate' + id).val(item.s_child_rate);
									$('#s_child_wb_rate' + id).val(item.s_child_wb_rate);
									$('#s_extra_bed_rate' + id).val(item.s_extra_bed_rate);

									$('#remarks' + id).val(item.remarks);

									// Set total last (readonly, no .trigger needed)
									$('#acc_total' + id).val(item.total);

									console.log("Set all fields for ID:", id);
								}, 400);
							}, 400);
						});
					} else {
						console.warn("Add button not found for selector:", selector);
					}
				});
			}, 500);
		}
	});
</script>
<script>
	$(document).ready(function() {
		$('#myTourplanForm').on('submit', function(e) {
			var $saveDraft = $('#btn_savedraft_iti_plan');
			var $finalSave = $('#btn_save_iti_plan');
			$saveDraft.prop('disabled', true);
			$finalSave.prop('disabled', true);
			if ($saveDraft.is(':visible')) {
				$saveDraft.html('<i class="fa fa-spinner fa-spin"></i> Saving...');
			}
			if ($finalSave.is(':visible')) {
				$finalSave.html('<i class="fa fa-spinner fa-spin"></i> Finalizing...');
			}

			let isValid = true;
			$('.location-card').each(function() {
				const $card = $(this);
				const dataIndex = $card.data('index');
				var dates_new = dataIndex.split("_");

				let sumDouble = 0;
				let sumSingle = 0;
				let sumCH = 0;
				let sumCW = 0;
				let sumExtra = 0;

				let maxDouble = <?php echo $object_det[0]['no_of_double_room']; ?>;
				let maxSingle = <?php echo $object_det[0]['no_of_single_room']; ?>;
				let maxCH = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
				let maxCW = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
				let maxExtra = <?php echo $object_det[0]['no_of_extra_bed']; ?>;

				$card.find('input[id^="double"]').each(function() {
					sumDouble += parseInt($(this).val()) || 0;
				});

				$card.find('input[id^="single"]').each(function() {
					sumSingle += parseInt($(this).val()) || 0;
				});

				$card.find('input[id^="no_of_ch"]').each(function() {
					sumCH += parseInt($(this).val()) || 0;
				});

				$card.find('input[id^="no_of_cw"]').each(function() {
					sumCW += parseInt($(this).val()) || 0;
				});

				$card.find('input[id^="no_of_extra"]').each(function() {
					sumExtra += parseInt($(this).val()) || 0;
				});

				if (sumDouble !== maxDouble) {
					alert("Total Double Room count must be " + maxDouble + " for date: " + dates_new[1]);
					isValid = false;
					return false;
				}

				if (sumSingle !== maxSingle) {
					alert("Total Single Room count must be " + maxSingle + " for date: " + dates_new[1]);
					isValid = false;
					return false;
				}

				if (sumCH !== maxCH) {
					alert("Total Child with Bed count must be " + maxCH + " for date: " + dates_new[1]);
					isValid = false;
					return false;
				}

				if (sumCW !== maxCW) {
					alert("Total Child without Bed count must be " + maxCW + " for date: " + dates_new[1]);
					isValid = false;
					return false;
				}

				if (sumExtra !== maxExtra) {
					alert("Total Extra Bed count must be " + maxExtra + " for date: " + dates_new[1]);
					isValid = false;
					return false;
				}
			});

			if (!isValid) {
				e.preventDefault();
				$saveDraft.prop('disabled', false);
				$finalSave.prop('disabled', false);
				if ($saveDraft.is(':visible')) {
					$saveDraft.html('Save Draft');
				}
				if ($finalSave.is(':visible')) {
					$finalSave.html('Finalize');
				}
			}
		});
	});
</script>

<script>
	async function initDynamicHotels() {
		await sleep(5000);

		setTimeout(() => {
			$('input[id^="ss_distance"]').trigger('input');
			updateTotalAccommodationCost();
			updateMarginTotal();
			updateTourAddonTotal();
			updateGSTandTotalPackageCost();
		}, 100);

	}

	function sleep(ms) {
		return new Promise(resolve => setTimeout(resolve, ms));
	}

	$(document).ready(function() {
		initDynamicHotels();
	});
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		const cursor = document.createElement("div");
		cursor.classList.add("stylish-cursor");
		document.body.appendChild(cursor);

		document.addEventListener("mousemove", function(e) {
			cursor.style.top = `${e.clientY}px`;
			cursor.style.left = `${e.clientX}px`;
		});
	});
</script>
<script>
	$('form').on('submit', function(e) {
		// Find the first invalid element
		let $firstInvalid = $(this).find(':invalid').first();

		if ($firstInvalid.length) {
			// Prevent form submission
			e.preventDefault();

			// Get the tab pane that contains the invalid element
			let $tabPane = $firstInvalid.closest('.tab-pane');

			if ($tabPane.length) {
				// Get the ID of the tab pane
				let tabId = $tabPane.attr('id');

				// Activate the corresponding tab (assuming Bootstrap 4/5 tabs)
				$('a[href="#' + tabId + '"]').tab('show');

				// Optionally focus the invalid input
				$firstInvalid.focus();
			}
		}
	});
</script>

<script>
	$(document).ready(function() {
		$('#loading-spinner').show(); // Show spinner

		initDynamicHotels().then(() => {
			$('#loading-spinner').hide(); // Hide spinner after loading is done
		});
	});
</script>

<script>
	/*$(document).ready(function () {
	$('#myTourplanForm').on('submit', function (e) {
		let $form = $(this);
		let $firstInvalid = $form.find(':invalid').first();

		if ($firstInvalid.length) {
			e.preventDefault();

			// Find the closest inner tab-pane (date tab)
			let $innerTabPane = $firstInvalid.closest('.tab-pane');
			if (!$innerTabPane.length) return;

			let innerTabId = $innerTabPane.attr('id');

			// Activate date tab
			let $innerTabLink = $('a[href="#' + innerTabId + '"][data-toggle="tab"]');
			if ($innerTabLink.length) {
				$innerTabLink.tab('show');
			}

			// Then find outer tab-pane (location tab) and activate
			setTimeout(function () {
				let $outerTabPane = $innerTabPane.parents('.tab-pane').first();
				if (!$outerTabPane.length) return;

				let outerTabId = $outerTabPane.attr('id');
				let $outerTabLink = $('a[href="#' + outerTabId + '"][data-toggle="tab"]');

				if ($outerTabLink.length) {
					$outerTabLink.tab('show');

					// Re-show the inner tab after outer is shown
					setTimeout(function () {
						$innerTabLink.tab('show');
						$firstInvalid[0].focus();
					}, 150);
				} else {
					// If outer tab doesn't exist (only one level deep), just focus
					$firstInvalid[0].focus();
				}
			}, 150);
		}
	});
});*/
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.select_make_current').on('change', function() {
			var d_adult_rate = 0;
			var d_child_rate = 0;
			var d_child_wb_rate = 0;
			var d_extra_bed_rate = 0;

			var s_adult_rate = 0;
			var s_child_rate = 0;
			var s_child_wb_rate = 0;
			var s_extra_bed_rate = 0;

			var special_tariff = 0;
			var hotel_fac_id = 0;
			var hotel_fac_rate = 0;
			var ss_id = 0;
			var ss_distance = 0;
			var daily_addon = 0;

			var maxDouble = <?php echo $object_det[0]['no_of_double_room']; ?>;
			var maxSingle = <?php echo $object_det[0]['no_of_single_room']; ?>;
			var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
			var id = $(this).attr('data-id');
			var itinerary_id = $('#make_current' + id).val();
			if (itinerary_id == null || itinerary_id == '' || itinerary_id == 'undefined') {
				alert("Please Select Edit History");
			} else {
				$.ajax({
					url: "<?= site_url('Enquiry/getItineraryDetailsById'); ?>",
					method: "POST",
					data: {
						itinerary_id: itinerary_id
					},
					dataType: 'json',
					success: function(data) {
						$('#hotelid' + id).val(data[0].hotel_id).trigger('change');
						setTimeout(function() {
							$('#roomcat' + id).val(data[0].room_category_id).trigger('change');
						}, 300);

						$('#no_of_ch' + id).val(data[0].child_with_bed);
						$('#no_of_cw' + id).val(data[0].child_without_bed);
						$('#no_of_extra' + id).val(data[0].extra_bed);

						$.each(data[0].cost, function(index, val) {
							if (val.cost_component_id == 6 && val.room_type_id == 2) {
								d_adult_rate = val.tariff;
							}
							if (val.cost_component_id == 12 && val.room_type_id == 2) {
								d_child_rate = val.tariff;
							}
							if (val.cost_component_id == 15 && val.room_type_id == 2) {
								d_child_wb_rate = val.tariff;
							}
							if (val.cost_component_id == 9 && val.room_type_id == 2) {
								d_extra_bed_rate = val.tariff;
							}

							if (val.cost_component_id == 6 && val.room_type_id == 1) {
								s_adult_rate = val.tariff;
							}
							if (val.cost_component_id == 12 && val.room_type_id == 1) {
								s_child_rate = val.tariff;
							}
							if (val.cost_component_id == 15 && val.room_type_id == 1) {
								s_child_wb_rate = val.tariff;
							}
							if (val.cost_component_id == 9 && val.room_type_id == 1) {
								s_extra_bed_rate = val.tariff;
							}

							if (val.cost_component_id == 17 && val.room_type_id == 1) {
								special_tariff = val.tariff;
							}

							if (val.cost_component_id == 18 && val.room_type_id == 1) {
								hotel_fac_id = val.tariff;
							}
							if (val.cost_component_id == 19 && val.room_type_id == 1) {
								hotel_fac_rate = val.tariff;
							}

							if (val.cost_component_id == 21 && val.room_type_id == 1) {
								ss_id = val.tariff;
							}
							if (val.cost_component_id == 22 && val.room_type_id == 1) {
								ss_distance = val.tariff;
							}

							if (val.cost_component_id == 23 && val.room_type_id == 1) {
								daily_addon = val.tariff;
							}

						});

						if (maxDouble > 0) {
							$('#double' + id).val(data[0].double_room);
							$('#d_adult_rate' + id).val(d_adult_rate);
							$('#d_child_rate' + id).val(d_child_rate);
							$('#d_child_wb_rate' + id).val(d_child_wb_rate);
							$('#d_extra_bed_rate' + id).val(d_extra_bed_rate);
						}
						if (maxSingle > 0) {
							$('#single' + id).val(data[0].single_room);
							$('#s_adult_rate' + id).val(s_adult_rate);
							$('#s_child_rate' + id).val(s_child_rate);
							$('#s_child_wb_rate' + id).val(s_child_wb_rate);
							$('#s_extra_bed_rate' + id).val(s_extra_bed_rate);
						}

						if (hotel_fac_id > 0) {
							setTimeout(function() {
								$('#hotfac' + id).val(hotel_fac_id).trigger('change');
							}, 300);

							$('#fac_rate' + id).val(hotel_fac_rate);
						}
						$('#remarks' + id).val(data[0].remarks);
						$('#spcl_event' + id).val(data[0].special_event_name);
						if (ss_id > 0) {
							setTimeout(function() {
								$('#sight' + id).val(ss_id).trigger('change');
							}, 300);
							$('#ss_distance' + id).val(ss_distance);
						}
						$('#spcl_tariff' + id).val(special_tariff);
						$('#daily_addon' + id).val(daily_addon);

						var vehicleDetails = JSON.parse(data[0].vehicle_details);
						var v_flag;
						var chkbox;
						$.each(vehicle_models, function(vindex, vmodel) {
							chkbox = $('#chk_vehicle' + id + vmodel.vehicle_type_id + '_0');
							chkbox.prop('checked', true).trigger('change');
							v_flag = 0;
							$.each(vehicleDetails, function(v_index, v_item) {
								if (vmodel.vehicle_type_id == v_item.veh_type_id) {
									v_flag = 1;
								}
							});
							if (v_flag == 0) {
								var chkbox = $('#chk_vehicle' + id + vmodel.vehicle_type_id + '_0');
								if (chkbox.length > 0) {
									chkbox.prop('checked', false).trigger('change');
								}
							}
						});
						var hotelDetails = data[0].hotel_details;
						if (typeof hotelDetails === 'string') {
							hotelDetails = JSON.parse(hotelDetails);
						}
						var hotelDetails_len = hotelDetails.length;


						const container = $('#hotel_dynamic_fields' + id);
						if (container.children().length > 0) {
							container.find('.btn_agency_remove').each(function() {
								var button_id = $(this).attr("id");
								$('#row' + button_id + '').remove();
							});
						}

						if (Array.isArray(hotelDetails) && hotelDetails.length > 0) {
							setTimeout(() => {
								if ($('.add_hotel').length === 0) {
									console.warn("Add buttons not rendered yet. Retrying...");
									return;
								}
								$.each(hotelDetails, function(index, item) {
									const selector =
										'.add_hotel' +
										'[data-mp="' + item.meal_plan_id + '"]' +
										'[data-tl="' + item.tour_location_id + '"]' +
										'[data-td="' + item.tour_date + '"]' +
										'[data-id="' + item.id + '"]' +
										'[data-oid="' + item.id + '"]';

									const $btn = $(selector);

									if ($btn.length > 0) {
										console.log("Triggering add for:", item.idvalue);
										$btn.attr('data-sequence', item.sequence);
										$btn.trigger("click");
										$btn.removeAttr('data-sequence');
										// Wait for dynamic block to render
										waitForElement('#hotelid' + item.idvalue, function() {
											const id = item.idvalue;

											$('#hotelid' + id).val(item.hotelid).trigger('change');

											// Wait again for hotel dropdown to load room/facility
											setTimeout(() => {
												$('#roomcat' + id).val(item.roomcat).trigger('change');
												$('#hotfac' + id).val(item.hotfac).trigger('change');

												// Wait a little before setting rate inputs
												setTimeout(() => {
													$('#no_of_ch' + id).val(item.no_of_ch);
													$('#no_of_cw' + id).val(item.no_of_cw);
													$('#no_of_extra' + id).val(item.no_of_extra);
													$('#double' + id).val(item.double);
													$('#single' + id).val(item.single);

													$('#d_adult_rate' + id).val(item.d_adult_rate);
													$('#d_child_rate' + id).val(item.d_child_rate);
													$('#d_child_wb_rate' + id).val(item.d_child_wb_rate);
													$('#d_extra_bed_rate' + id).val(item.d_extra_bed_rate);

													$('#s_adult_rate' + id).val(item.s_adult_rate);
													$('#s_child_rate' + id).val(item.s_child_rate);
													$('#s_child_wb_rate' + id).val(item.s_child_wb_rate);
													$('#s_extra_bed_rate' + id).val(item.s_extra_bed_rate);

													$('#remarks' + id).val(item.remarks);

													// Set total last (readonly, no .trigger needed)
													$('#acc_total' + id).val(item.total);

													console.log("Set all fields for ID:", id);
												}, 400);
											}, 400);
										});
									} else {
										console.warn("Add button not found for selector:", selector);
									}
								});
							}, 500);

						}

						var dataIndex = $(this).closest('[data-index]').data('index');
						setTimeout(() => calculateGrandTotal(dataIndex), 500);
					}
				});
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		// Initially disable the save button if cost sheet name is empty
		function toggleSaveButton() {
			const csName = $('#cs_name').val().trim();
			const saveButton = $('#view_cost_sheet_id');
			if (csName === '') {
				saveButton.prop('disabled', true);
			} else {
				saveButton.prop('disabled', false);
			}
		}

		// Listen for changes on the input field
		$('#cs_name').on('input', toggleSaveButton);

		// Initial check
		toggleSaveButton();

		// Handle form submit
		$('#myTourplanForm1').on('submit', function() {
			$('#gen_cost_sheet_id, #view_cost_sheet_id').prop('disabled', true);
			if ($('#gen_cost_sheet_id').is(':visible')) {
				$('#gen_cost_sheet_id').html('<i class="fa fa-spinner fa-spin"></i> Saving...');
			}
			if ($('#view_cost_sheet_id').is(':visible')) {
				$('#view_cost_sheet_id').html('<i class="fa fa-spinner fa-spin"></i> Updating...');
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#btn_savedraft_iti_plan').click(function() {
			console.log("👉 Clicked Next >>");

			// ✅ Step 1: Get outer location tabs (e.g., Cochin, Munnar, Cherai)
			var $outerTabs = $('#outer-location-tabs .nav-link');
			var $currentOuterNav = $outerTabs.filter('.active');
			var $currentOuterLi = $currentOuterNav.closest('li');
			var $nextOuterLi = $currentOuterLi.next('li');

			if (!$currentOuterNav.length) {
				console.log("❌ No active outer location tab found.");
				return;
			}

			var currentOuterTabId = $currentOuterNav.attr('href'); // e.g., #tab-190
			console.log("✅ Correct OUTER tab ID:", currentOuterTabId);

			var $activeOuterPane = $(currentOuterTabId);

			// ✅ Step 2: Get inner date tabs inside current outer tab
			var $innerTabs = $activeOuterPane.find('ul.nav-tabs .nav-link');
			var $currentInnerNav = $innerTabs.filter('.active');
			var $currentInnerLi = $currentInnerNav.closest('li');
			var $nextInnerLi = $currentInnerLi.next('li');

			if ($nextInnerLi.length) {
				console.log("➡️ Moving to NEXT inner date tab");
				$nextInnerLi.find('a.nav-link').tab('show');
			} else if ($nextOuterLi.length) {
				var $nextOuterNav = $nextOuterLi.find('a.nav-link');
				var nextOuterTabId = $nextOuterNav.attr('href');
				console.log("➡️ Moving to NEXT OUTER location tab:", nextOuterTabId);
				$nextOuterNav.tab('show');

				// Activate the first date tab of the new outer location
				setTimeout(function() {
					var $newOuterPane = $(nextOuterTabId);
					var $firstInnerTab = $newOuterPane.find('ul.nav-tabs .nav-link').first();
					if ($firstInnerTab.length) {
						console.log("✅ Activating first inner date tab:", $firstInnerTab.attr('href'));
						$firstInnerTab.tab('show');
					} else {
						console.log("⚠️ No inner date tabs found in next outer tab");
					}
				}, 300);
			} else {
				console.log("✅ You are on the LAST outer and LAST inner tab.");
				$('#btn_savedraft_iti_plan').hide();
				$('#btn_save_iti_plan').show();
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#calculate_bifur').click(function() {

			let status = $("#bifurcation_status").val();

			if (status == "0") {
				// Show div and update status
				$("#bifur_div").show();
				$("#bifurcation_status").val("1");
				$(this).text("Hide Bifurcation");
				$("#recalculate_bifur").show();
			} else {
				// Hide div and reset status
				$("#bifur_div").hide();
				$("#bifurcation_status").val("0");
				$(this).text("Show Bifurcation");
				$("#recalculate_bifur").hide();
			}

		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#recalculate_bifur').click(function() {

			var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
			var no_of_child_with_bed = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
			var no_of_child_without_bed = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
			var no_of_extra_bed = <?php echo $object_det[0]['no_of_extra_bed']; ?>;
			var bifur_ss_hidden_pp = $('#bifur_ss_hidden_pp').val();
			var bifur_double_pp = $('#bifur_double_pp_hidden').val();
			var ttc_bifur_double = $('#ttc_bifur_double_hd').val();

			var bifur_single_pp = $('#bifur_single_pp_hidden').val();
			var ttc_bifur_single = $('#ttc_bifur_single_hd').val();

			var bifur_child_pp = $('#bifur_child_pp_hidden').val();
			var ttc_bifur_child = $('#ttc_bifur_child_hd').val();

			var bifur_child_wb_pp = $('#bifur_child_wb_pp_hidden').val();
			var ttc_bifur_child_wb = $('#ttc_bifur_child_wb_hd').val();

			var bifur_extra_pp = $('#bifur_extra_pp_hidden').val();
			var ttc_bifur_extra = $('#ttc_bifur_extra_hd').val();

			var margin_value = parseInt($('#margin_value').val());
			var gst_value = parseInt($('#gst_value').val());
			var round_off_pp = parseFloat($('#round_off_hidden_pp').val());

			$('#ss_bifur_double_span_pp').text(bifur_ss_hidden_pp);
			$('#ss_bifur_double_hd_pp').val(bifur_ss_hidden_pp);

			$('#ss_bifur_single_span_pp').text(bifur_ss_hidden_pp);
			$('#ss_bifur_single_hd_pp').val(bifur_ss_hidden_pp);

			$('#ss_bifur_child_span_pp').text(bifur_ss_hidden_pp);
			$('#ss_bifur_child_hd_pp').val(bifur_ss_hidden_pp);

			$('#ss_bifur_child_wb_span_pp').text(bifur_ss_hidden_pp);
			$('#ss_bifur_child_wb_hd_pp').val(bifur_ss_hidden_pp);

			$('#ss_bifur_extra_span_pp').text(bifur_ss_hidden_pp);
			$('#ss_bifur_extra_hd_pp').val(bifur_ss_hidden_pp);

			var total_bifur_double = parseFloat(bifur_double_pp) + parseFloat(ttc_bifur_double) + parseFloat(bifur_ss_hidden_pp);
			var total_bifur_single = parseFloat(bifur_single_pp) + parseFloat(ttc_bifur_single) + parseFloat(bifur_ss_hidden_pp);
			var total_bifur_child = parseFloat(bifur_child_pp) + parseFloat(ttc_bifur_child) + parseFloat(bifur_ss_hidden_pp);
			var total_bifur_child_wb = parseFloat(bifur_child_wb_pp) + parseFloat(ttc_bifur_child_wb) + parseFloat(bifur_ss_hidden_pp);
			var total_bifur_extra = parseFloat(bifur_extra_pp) + parseFloat(ttc_bifur_extra) + parseFloat(bifur_ss_hidden_pp);

			$('#total_bifur_double_span_pp').text(total_bifur_double);
			$('#total_bifur_double_hd_pp').val(total_bifur_double);
			var margin_double = total_bifur_double * (margin_value / 100);
			$('#margin_bifur_double_span_pp').text(margin_double);
			$('#margin_bifur_double_hd_pp').val(margin_double);
			var net_double = total_bifur_double + margin_double;
			$('#net_bifur_double_span_pp').text(net_double);
			$('#net_bifur_double_hd_pp').val(net_double);
			$('#round_bifur_double_span_pp').text(round_off_pp);
			$('#round_bifur_double_hd_pp').val(round_off_pp);
			if (gst_value > 0) {
				var gst_double = (net_double + round_off_pp) * (gst_value / 100);
			} else {
				var gst_double = 0;
			}
			$('#gst_bifur_double_span_pp').text(gst_double);
			$('#gst_bifur_double_hd_pp').val(gst_double);
			var grand_double = net_double + round_off_pp + gst_double;
			$('#grand_bifur_double_span_pp').text(parseInt(grand_double));
			$('#grand_bifur_double_hd_pp').val(parseInt(grand_double));

			if (no_of_single_room > 0) {
				$('#total_bifur_single_span_pp').text(total_bifur_single);
				$('#total_bifur_single_hd_pp').val(total_bifur_single);
				var margin_single = total_bifur_single * (margin_value / 100);
				$('#margin_bifur_single_span_pp').text(margin_single);
				$('#margin_bifur_single_hd_pp').val(margin_single);
				var net_single = total_bifur_single + margin_single;
				$('#net_bifur_single_span_pp').text(net_single);
				$('#net_bifur_single_hd_pp').val(net_single);
				$('#round_bifur_single_span_pp').text(round_off_pp);
				$('#round_bifur_single_hd_pp').val(round_off_pp);
				if (gst_value > 0) {
					var gst_single = (net_single + round_off_pp) * (gst_value / 100);
				} else {
					var gst_single = 0;
				}
				$('#gst_bifur_single_span_pp').text(gst_single);
				$('#gst_bifur_single_hd_pp').val(gst_single);
				var grand_single = net_single + round_off_pp + gst_single;
				$('#grand_bifur_single_span_pp').text(parseInt(grand_single));
				$('#grand_bifur_single_hd_pp').val(parseInt(grand_single));
			}
			if (no_of_child_with_bed > 0) {
				$('#total_bifur_child_span_pp').text(total_bifur_child);
				$('#total_bifur_child_hd_pp').val(total_bifur_child);
				var margin_child = total_bifur_child * (margin_value / 100);
				$('#margin_bifur_child_span_pp').text(margin_child);
				$('#margin_bifur_child_hd_pp').val(margin_child);
				var net_child = total_bifur_child + margin_child;
				$('#net_bifur_child_span_pp').text(net_child);
				$('#net_bifur_child_hd_pp').val(net_child);
				$('#round_bifur_child_span_pp').text(round_off_pp);
				$('#round_bifur_child_hd_pp').val(round_off_pp);
				if (gst_value > 0) {
					var gst_child = (net_child + round_off_pp) * (gst_value / 100);
				} else {
					var gst_child = 0;
				}
				$('#gst_bifur_child_span_pp').text(gst_child);
				$('#gst_bifur_child_hd_pp').val(gst_child);
				var grand_child = net_child + round_off_pp + gst_child;
				$('#grand_bifur_child_span_pp').text(parseInt(grand_child));
				$('#grand_bifur_child_hd_pp').val(parseInt(grand_child));
			}
			if (no_of_child_without_bed > 0) {
				$('#total_bifur_child_wb_span_pp').text(total_bifur_child_wb);
				$('#total_bifur_child_wb_hd_pp').val(total_bifur_child_wb);
				var margin_child_wb = total_bifur_child_wb * (margin_value / 100);
				$('#margin_bifur_child_wb_span_pp').text(margin_child_wb);
				$('#margin_bifur_child_wb_hd_pp').val(margin_child_wb);
				var net_child_wb = total_bifur_child_wb + margin_child_wb;
				$('#net_bifur_child_wb_span_pp').text(net_child_wb);
				$('#net_bifur_child_wb_hd_pp').val(net_child_wb);
				$('#round_bifur_child_wb_span_pp').text(round_off_pp);
				$('#round_bifur_child_wb_hd_pp').val(round_off_pp);
				if (gst_value > 0) {
					var gst_child_wb = (net_child_wb + round_off_pp) * (gst_value / 100);
				} else {
					var gst_child_wb = 0;
				}
				$('#gst_bifur_child_wb_span_pp').text(gst_child_wb);
				$('#gst_bifur_child_wb_hd_pp').val(gst_child_wb);
				var grand_child_wb = net_child_wb + round_off_pp + gst_child_wb;
				$('#grand_bifur_child_wb_span_pp').text(parseInt(grand_child_wb));
				$('#grand_bifur_child_wb_hd_pp').val(parseInt(grand_child_wb));
			}

			if (no_of_extra_bed > 0) {
				$('#total_bifur_extra_span_pp').text(total_bifur_extra);
				$('#total_bifur_extra_hd_pp').val(total_bifur_extra);
				var margin_extra = total_bifur_extra * (margin_value / 100);
				$('#margin_bifur_extra_span_pp').text(margin_extra);
				$('#margin_bifur_extra_hd_pp').val(margin_extra);
				var net_extra = total_bifur_extra + margin_extra;
				$('#net_bifur_extra_span_pp').text(net_extra);
				$('#net_bifur_extra_hd_pp').val(net_extra);
				$('#round_bifur_extra_span_pp').text(round_off_pp);
				$('#round_bifur_extra_hd_pp').val(round_off_pp);
				if (gst_value > 0) {
					var gst_extra = (net_extra + round_off_pp) * (gst_value / 100);
				} else {
					var gst_extra = 0;
				}
				$('#gst_bifur_extra_span_pp').text(gst_extra);
				$('#gst_bifur_extra_hd_pp').val(gst_extra);
				var grand_extra = net_extra + round_off_pp + gst_extra;
				$('#grand_bifur_extra_span_pp').text(parseInt(grand_extra));
				$('#grand_bifur_extra_hd_pp').val(parseInt(grand_extra));
			}
		});
	});
</script>
<!-- nj -->
<script>
	$(document).ready(function() {
		// Track expansion source per tour
		var expansionSource = <?php echo json_encode($expansion_source ?? []); ?>;
		console.log('Expansion Source:', expansionSource);
		// ---------- Utilities ----------
		function pf(v) {
			var n = parseFloat(v);
			return isFinite(n) ? n : 0;
		}
		// Select2 init
		$('.ss_selector').select2({
			placeholder: 'Select Sightseeing Location',
			allowClear: true,
			width: '100%'
		});
		// -------- Helper to determine if should add SS to vehicle --------
		function shouldAddSSToVehicle(tourDetailsId) {
			var source = expansionSource[tourDetailsId] || 'tour_expansion';
			console.log('shouldAddSSToVehicle for tour', tourDetailsId, 'source:', source, 'shouldAdd:', source === 'tour_expansion');
			return source === 'tour_expansion';
		}
		// -------- Extract tour_details_id from vehicle id --------
		function getTourDetailsIdFromVid(vid) {
			// vid format: "1601_01-01-2026127_0" or similar
			// Extract the first part before any underscore (tour_details_id)
			var match = vid.toString().match(/^(\d+)/);
			return match ? match[1] : null;
		}
		// ----------------- Row HTML generator (defensive mapping) -----------------
		function createSSRowHTML(rowId, itiId, ss) {
			var isPax = (typeof ss.is_pax !== 'undefined') ? Number(ss.is_pax) :
				(typeof ss.is_pax_flag !== 'undefined') ? Number(ss.is_pax_flag) :
				(ss.type && ss.type.toString().toLowerCase().indexOf('pax') !== -1) ? 1 : 0;
			var name = ss.name || ss.title || ss.sightseeing_name || ss.sightseeing || ('SS-' + (ss.sightseeing_id || ''));
			var cost = pf(ss.cost || ss.calculated_value || ss.total_cost || 0);
			var totalPax = <?php echo $object_det[0]['no_of_adult'] + $object_det[0]['no_of_child_with_bed'] + $object_det[0]['no_of_child_without_bed'] + $object_det[0]['no_of_child_below_five']; ?>;
			var distance_km = pf(ss.distance_km || ss.distance || ss.km || 0);
			var tariff = pf(ss.tariff || ss.rate || 0);
			var calculated = isPax === 1 ? cost : distance_km;
			// var displayValue = isPax === 1 ? (tariff+' * '+totalPax+' = '+'₹' + cost) : (distance_km + ' km');
			var displayValue = isPax === 1 ? (tariff + ' x ' + totalPax) : (distance_km);
			return '\
				<div class="row align-items-center mb-2 ss-dynamic-row" \
				id="ss_row_' + rowId + '" \
				data-row-id="' + rowId + '" \
				data-ss-id="' + (ss.sightseeing_id || ss.id || '') + '" \
				data-is-pax="' + isPax + '" \
				data-tariff="' + tariff + '" \
				data-distance="' + distance_km + '" \
				data-calculated="' + calculated + '" \
				style="background-color: #f8f9fa; padding: 10px; border-radius: 5px; border: 1px solid #dee2e6;">\
				<div class="col-xl-4 col-sm-12 col-md-4">\
				<label class="small-label" style="font-weight: bold; margin-bottom: 5px;">Sightseeing Name</label>\
				<input type="text" class="form-control input-sm" value="' + name + '" readonly style="background-color: white; border: 1px solid #ced4da;">\
				</div>\
				<div class="col-xl-3 col-sm-12 col-md-2">\
				<label class="small-label" style="font-weight: bold; margin-bottom: 5px;">' + (isPax === 1 ? 'Tariff' : 'Distance(km)') + '</label>\
				<input type="text" class="form-control input-sm" value="' + displayValue + '" readonly style="background-color: white; border: 1px solid #ced4da; text-align: center;">\
				</div>\
				<div class="col-xl-3 col-sm-12 col-md-3" style="display:none;">\
				<label class="small-label" style="font-weight: bold; margin-bottom: 5px;">Remarks</label>\
				<textarea class="form-control input-sm ss-row-remarks" rows="1" style="border: 1px solid #ced4da;">' + (ss.remarks || '') + '</textarea>\
				</div>\
				<div class="col-xl-3 col-sm-12 col-md-2">\
				<label class="small-label" style="font-weight: bold; margin-bottom: 5px;">Total Pax Rate</label>\
				<input type="text" class="form-control input-sm ss-row-total" value="' + (isPax === 1 ? cost : '0.00') + '" readonly style="background-color: #d1ecf1; font-weight: bold; text-align: center; border: 1px solid #bee5eb;">\
				</div>\
				<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">\
				<button type="button" class="btn btn-danger btn-sm remove_ss_row" data-row-id="' + rowId + '" data-iti-id="' + itiId + '" style="width:100%; padding:6px;"><i class="fa fa-times"></i></button>\
				</div>\
				</div>';
		}
		// -------- Ensure base stored (FIXED - aware of expansion source) --------
		function ensureBaseStored(vid, iti_id, tourDetailsId, shouldAddSS, savedSsTotalHint) {
			var $dist = $('#travel_distance' + vid);
			if (!$dist.length) {
				console.log('ensureBaseStored: No travel_distance element found for vid:', vid);
				return;
			}

			if ($dist.data('base-stored')) {
				console.log('ensureBaseStored: Base already stored for vid:', vid);
				return;
			}
			var displayed = pf($dist.val());
			var trueBase = displayed;
			console.log('ensureBaseStored: vid=', vid, 'displayed=', displayed, 'shouldAddSS=', shouldAddSS, 'tourDetailsId=', tourDetailsId);
			// For itinerary_expansion (saved/edited): displayed already includes SS, so derive base by subtracting
			// For tour_expansion (fresh load): displayed is base, don't subtract
			if (!shouldAddSS) {
				// From itinerary_expansion: try to derive base by subtracting saved SS
				var savedHint = pf(savedSsTotalHint);
				if (!savedHint && window.savedSightseeing && window.savedSightseeing[iti_id]) {
					var ssInfo = window.savedSightseeing[iti_id];
					savedHint = pf(ssInfo.ss_total_distance || ssInfo.saved_ss_total || 0);
				}
				if (savedHint > 0) {
					var candidate = displayed - savedHint;
					if (candidate >= 0) {
						trueBase = candidate;
						console.log('ensureBaseStored (itinerary_expansion): derived base:', displayed, '-', savedHint, '=', trueBase);
					} else {
						console.log('ensureBaseStored (itinerary_expansion): candidate negative, keeping displayed:', displayed);
					}
				} else {
					console.log('ensureBaseStored (itinerary_expansion): no saved hint, using displayed as base');
				}
			} else {
				// From tour_expansion: displayed is already the base
				console.log('ensureBaseStored (tour_expansion): displayed is base:', displayed);
			}
			if (trueBase < 0) trueBase = 0;
			$dist.data('true-base', +trueBase);
			$dist.data('base-stored', true);
			$dist.data('true-base-source', shouldAddSS ? 'tour_expansion_base' : 'itinerary_expansion_derived');
			var $copy2 = $('#c_travel_distance_copy' + vid);
			if ($copy2.length) $copy2.val(trueBase);
			console.log('ensureBaseStored DONE: vid=', vid, 'trueBase=', trueBase);
		}
		// -------- Update vehicle distances (FIXED: Always add current SS to base) + NEW: Show travel distance & rate --------
		function updateVehicleDistances(iti_id, tourDetailsId, selectedSsDistance, savedSsTotalHint) {
			console.log('updateVehicleDistances -> iti_id:', iti_id, 'tourDetailsId:', tourDetailsId, 'selectedSsDistance:', selectedSsDistance, 'savedSsTotalHint:', savedSsTotalHint);

			var shouldAddSS = shouldAddSSToVehicle(tourDetailsId);
			console.log('shouldAddSS for this tour:', shouldAddSS);
			$('[id^="travel_distance"]').each(function() {
				var $dist = $(this);
				var id = $dist.attr('id') || '';
				var vid = $dist.attr('v_id') || id;

				if (!vid || (id.indexOf(iti_id) === -1 && (vid || '').indexOf(iti_id) === -1)) {
					return; // Not for this itinerary
				}
				console.log('Processing travel_distance for vid:', vid, 'iti_id:', iti_id);
				// Ensure base is stored
				ensureBaseStored(vid, iti_id, tourDetailsId, shouldAddSS, savedSsTotalHint);
				var base = pf($dist.data('true-base'));
				console.log(' Base from data:', base);

				// FIXED: Always add current SS to base (handles both expansion types correctly)
				var newTotal = base + pf(selectedSsDistance);

				$dist.val(newTotal);
				console.log(' Setting travel_distance to:', newTotal, '(base:', base, '+ current SS:', selectedSsDistance, ')');
				var maxKm = pf($('#max_km_day' + vid).val());
				var extra = Math.max(0, newTotal - maxKm);
				$('#extra_kilometer' + vid).val(extra);
				var vehTotal = 0;
				if (typeof calculateVehicleTotalEnhanced === 'function') {
					try {
						vehTotal = calculateVehicleTotalEnhanced(vid);
					} catch (e) {
						console.error('Error in calculateVehicleTotalEnhanced:', e);
					}
				} else if (typeof calculateVehicleTotal === 'function') {
					try {
						calculateVehicleTotal(vid);
						vehTotal = pf($('#veh_total' + vid).val()); // Fallback capture
					} catch (e) {
						console.error('Error in calculateVehicleTotal:', e);
					}
				}
				// NEW: Log travel distance + rate for visibility
				console.log('TRAVEL DISTANCE RATE SUMMARY for VID ' + vid + ': Distance = ' + newTotal + ' km (incl. SS: ' + pf(selectedSsDistance) + ' km), Vehicle Rate = ₹' + vehTotal);

				// NEW: Optional UI display - Append a span next to the input if not exists
				// var $container = $dist.closest('.form-group, .input-group, td, .col');  // Adapt to your HTML structure
				// var $rateSpan = $container.find('.travel-rate-display');
				// if ($rateSpan.length === 0) {
				//     $rateSpan = $('<span class="travel-rate-display" style="margin-left: 10px; font-size: 0.9em; color: #28a745; font-weight: bold;"></span>');
				//     $dist.after($rateSpan);
				// }
				// $rateSpan.text(newTotal + ' km | ₹' + vehTotal);

				console.log('updateVehicleDistances: vid', vid, 'base', base, 'currentSS', selectedSsDistance, '=>', newTotal);
			});
		}
		// ----------------- Update sightseeing totals (always pass SS to vehicles; ensureBaseStored prevents doubling) -----------------
		function updateSightseeingTotals(iti_id, tourDetailsId) {
			console.log('updateSightseeingTotals for iti', iti_id, 'tour', tourDetailsId);

			var totalDistance = 0;
			var totalPaxCost = 0;
			var sightseeingData = [];
			$('#ss_dynamic_rows' + iti_id + ' .ss-dynamic-row').each(function() {
				var $row = $(this);
				var ssId = $row.attr('data-ss-id') || $row.data('ss-id') || '';
				var isPax = parseInt($row.attr('data-is-pax') || $row.data('is-pax') || 0) || 0;
				var tariff = pf($row.attr('data-tariff') || $row.data('tariff') || 0);
				var distance = pf($row.attr('data-distance') || $row.data('distance') || 0);
				var calculated = pf($row.attr('data-calculated') || $row.data('calculated') || 0);
				var remarks = $row.find('.ss-row-remarks').val() || '';
				var ssName = $row.find('input').first().val() || '';
				var item = {
					sightseeing_id: ssId,
					name: ssName,
					is_pax: isPax,
					tariff: tariff,
					distance: distance,
					calculated_value: calculated,
					remarks: remarks,
					cost: 0,
					distance_km: 0
				};
				if (isPax === 1) {
					totalPaxCost += calculated;
					item.cost = calculated;
				} else {
					totalDistance += calculated;
					item.distance_km = calculated;
				}
				sightseeingData.push(item);
			});
			console.log('Totals -> distance:', totalDistance, 'paxCost:', totalPaxCost);
			$('#ss_total_distance' + iti_id).val(totalDistance);
			$('#ss_grand_total' + iti_id).val(totalPaxCost);
			$('#ss_data_json' + iti_id).val(JSON.stringify(sightseeingData));
			var savedSsTotalHint = 0;
			try {
				if (window.savedSightseeing && window.savedSightseeing[iti_id]) {
					var s = window.savedSightseeing[iti_id];
					savedSsTotalHint = pf(s.ss_total_distance || s.saved_ss_total || 0);
				}
			} catch (e) {
				savedSsTotalHint = 0;
			}
			console.log('updateSightseeingTotals -> passing selected SS distance to vehicles:', totalDistance, 'saved hint:', savedSsTotalHint, 'tourDetailsId:', tourDetailsId);

			// FIXED: Pass tourDetailsId so updateVehicleDistances knows the expansion source
			updateVehicleDistances(iti_id, tourDetailsId, totalDistance, savedSsTotalHint);
			setTimeout(function() {
				calculateGrandTotal(iti_id);
			}, 300);
		}
		// -------- Vehicle calculators -----------------
		function calculateVehicleTotalEnhanced(vid) {
			var dayRent = pf($('#day_rent' + vid).val());
			var extraKm = pf($('#extra_kilometer' + vid).val());
			var extraKmRate = pf($('#extra_km_rate_hidden' + vid).val());
			var adhocRate = pf($('#adhoc_rate' + vid).val());
			// var vehTotal = dayRent + (extraKm * extraKmRate) + adhocRate;
			var vehTotal = dayRent + adhocRate;
			$('#veh_total' + vid).val(vehTotal);
			return vehTotal;
		}

		function calculateVehicleTotal(vid) {
			var dayRent = pf($('#day_rent' + vid).val());
			var extraKm = pf($('#extra_kilometer' + vid).val());
			var extraKmRate = pf($('#extra_km_rate_hidden' + vid).val());
			var adhocRate = pf($('#adhoc_rate' + vid).val());
			// var vehTotal = dayRent + (extraKm * extraKmRate) + adhocRate;
			var vehTotal = dayRent + adhocRate;
			$('#veh_total' + vid).val(vehTotal);
		}
		// ----------------- Grand total -----------------
		function calculateGrandTotal(iti_id) {
			console.log('Calculating grand total for:', iti_id);

			var accTotal = pf($('#acc_total' + iti_id).val());
			var vehicleTotal = 0;

			// Sum all checked vehicles for this itinerary
			$('.chk_vehicle:checked').each(function() {
				var vid = $(this).val() || '';
				if (vid.indexOf(iti_id) === 0 || vid.startsWith(iti_id)) {
					var vehTotal = pf($('#veh_total' + vid).val());
					console.log('Adding vehicle', vid, 'total:', vehTotal);
					vehicleTotal += vehTotal;
				}
			});

			var dailyAddon = pf($('#daily_addon' + iti_id).val());
			var permit = pf($('#permit' + iti_id).val());
			var spclTariff = pf($('#spcl_tariff' + iti_id).val());
			var facRate = pf($('#fac_rate' + iti_id).val());
			var ssGrandTotal = pf($('#ss_grand_total' + iti_id).val());

			console.log('Components:', {
				accTotal,
				vehicleTotal,
				ssGrandTotal,
				dailyAddon,
				permit,
				spclTariff,
				facRate
			});
			$('input[id^="spcl_tariff"]').each(function() {
				specialEventTotal += parseFloat($(this).val()) || 0;
			});

			// var grandTotal = accTotal + vehicleTotal + ssGrandTotal + dailyAddon + permit + spclTariff + facRate;
			var grandTotal = accTotal + vehicleTotal + ssGrandTotal + dailyAddon;

			// Update the grand total field
			$('#grand_total' + iti_id).val(grandTotal);

			// Update breadcrumb display
			$('#span_bread_id' + iti_id).text('₹' + grandTotal);

			console.log('Grand total for', iti_id, ':', grandTotal);

			return grandTotal;
		}
		// ------------- Add / Remove SS rows -------------
		$(document).on('click', '.add_sightseeing_btn', function() {
			var iti_id = $(this).data('id');
			var tourDetailsId = $('#tour_details_id' + iti_id).val();

			console.log('Add SS button clicked for iti', iti_id, 'tourDetailsId:', tourDetailsId);

			var $selector = $('#sight_selector' + iti_id);
			var selectedOption = $selector.find('option:selected');
			if (!selectedOption.val()) {
				alert('Please select a sightseeing location first');
				return;
			}
			if (!window.ssRowCounters) window.ssRowCounters = {};
			if (!window.ssRowCounters[iti_id]) window.ssRowCounters[iti_id] = 0;
			window.ssRowCounters[iti_id]++;
			var rowId = iti_id + '_ss_' + window.ssRowCounters[iti_id];
			var ssId = selectedOption.val();
			var ssName = selectedOption.data('name') || selectedOption.text();
			var isPax = parseInt(selectedOption.data('is-pax')) || 0;
			var tariff = pf(selectedOption.data('tariff')) || 0;
			var distance = pf(selectedOption.data('distance')) || 0;
			var totalPax = <?php echo $object_det[0]['no_of_adult'] + $object_det[0]['no_of_child_with_bed'] + $object_det[0]['no_of_child_without_bed'] + $object_det[0]['no_of_child_below_five']; ?>;
			var calculatedValue = (isPax === 1) ? (tariff * totalPax) : distance;
			var ssData = {
				sightseeing_id: ssId,
				name: ssName,
				is_pax: isPax,
				tariff: tariff,
				distance: distance,
				calculated_value: calculatedValue,
				remarks: '',
				cost: isPax === 1 ? calculatedValue : 0,
				distance_km: isPax === 1 ? 0 : calculatedValue
			};
			$('#ss_dynamic_rows' + iti_id).append(createSSRowHTML(rowId, iti_id, ssData));
			$selector.val(null).trigger('change');
			setTimeout(function() {
				updateSightseeingTotals(iti_id, tourDetailsId);
			}, 200);
		});
		$(document).on('click', '.remove_ss_row', function() {
			var rowId = $(this).data('row-id');
			var itiId = $(this).data('iti-id');
			var tourDetailsId = $('#tour_details_id' + itiId).val();

			$('#ss_row_' + rowId).remove();
			setTimeout(function() {
				updateSightseeingTotals(itiId, tourDetailsId);
			}, 200);
		});
		// Manual travel_distance edits should update hidden copy and recalc
		$(document).on('input change', '[id^="travel_distance"]', function() {
			var $this = $(this);
			var vid = $this.attr('v_id') || $this.attr('id');
			if (!vid) return;
			var match = vid.toString().match(/^(\d+)/);
			if (!match) return;
			var itiId = match[1];
			var tourDetailsId = $('#tour_details_id' + itiId).val();

			var currentSS = pf($('#ss_total_distance' + itiId).val());
			var currentDist = pf($this.val());
			var base = currentDist - currentSS;
			if (base < 0) base = 0;

			$('#c_travel_distance_copy' + vid).val(base);
			$this.data('base-distance', base);
			$this.data('true-base', base);

			var maxKm = pf($('#max_km_day' + vid).val());
			var extraKm = Math.max(0, currentDist - maxKm);
			$('#extra_kilometer' + vid).val(extraKm);

			try {
				if (typeof calculateVehicleTotalEnhanced === 'function') calculateVehicleTotalEnhanced(vid);
				else calculateVehicleTotal(vid);
			} catch (e) {
				console.error(e);
			}
		});
		// Vehicle checkbox change
		$(document).on('change', '.chk_vehicle', function() {
			var vid = $(this).val() || '';
			var match = vid.toString().match(/^(\d+)/);
			if (!match) return;
			var itiId = match[1];
			var tourDetailsId = $('#tour_details_id' + itiId).val();

			setTimeout(function() {
				updateSightseeingTotals(itiId, tourDetailsId);
			}, 120);
			setTimeout(function() {
				calculateGrandTotal(itiId);
			}, 300);
		});
		// ---------------- Load saved sightseeing (robust) ----------------
		window.savedSightseeing = window.savedSightseeing || {};
		var savedSightseeingData = <?php echo json_encode($saved_sightseeing_by_date ?? []); ?>;
		console.log('SavedSightseeingData raw:', savedSightseeingData);
		$.each(savedSightseeingData, function(tourDetailsId, dateData) {
			console.log('Processing tourDetailsId:', tourDetailsId, 'with dates:', Object.keys(dateData));

			$.each(dateData, function(tourDate, ssInfo) {
				var itiId = null;

				// Find matching itinerary ID by tour_details_id and tour_date
				$('[id^="tour_date"]').each(function() {
					var $this = $(this);
					var thisItiId = $this.attr('id').replace('tour_date', '');
					var thisTourDate = $this.val();
					var thisTourDetailsId = $('#tour_details_id' + thisItiId).val();

					if (thisTourDetailsId == tourDetailsId && thisTourDate == tourDate) {
						itiId = thisItiId;
						return false;
					}
				});
				if (!itiId) {
					console.log('No itinerary id found for tourDetailsId', tourDetailsId, 'date', tourDate);
					return;
				}
				console.log('Found itiId:', itiId, 'for tourDetailsId:', tourDetailsId, 'date:', tourDate);
				if (!ssInfo || !ssInfo.sightseeing || ssInfo.sightseeing.length === 0) {
					console.log('No sightseeing array for iti', itiId);
					return;
				}
				console.log('Loading saved sightseeing for iti', itiId, 'tourDetailsId:', tourDetailsId, 'items', ssInfo.sightseeing.length);
				window.savedSightseeing[itiId] = ssInfo;
				// append rows
				if (!window.ssRowCounters) window.ssRowCounters = {};
				if (!window.ssRowCounters[itiId]) window.ssRowCounters[itiId] = 0;
				ssInfo.sightseeing.forEach(function(ss) {
					window.ssRowCounters[itiId]++;
					var rowId = itiId + '_ss_' + window.ssRowCounters[itiId];
					$('#ss_dynamic_rows' + itiId).append(createSSRowHTML(rowId, itiId, ss));
				});
				// After append: call updateSightseeingTotals which will pass selectedSS and ensureBaseStored will derive base using saved hint
				setTimeout(function() {
					updateSightseeingTotals(itiId, tourDetailsId);
				}, 150);
			});
		});
		// After load, ensure base stored for travel inputs present on page
		$('[id^="ss_dynamic_rows"]').each(function() {
			var containerId = $(this).attr('id');
			var iti_id = containerId.replace('ss_dynamic_rows', '');
			$('[id^="travel_distance"]').each(function() {
				var $dist = $(this);
				var id = $dist.attr('id') || '';
				var vid = $dist.attr('v_id') || id;
				if (id.indexOf(iti_id) !== -1 || (vid || '').indexOf(iti_id) !== -1) {
					var tourDetailsId = $('#tour_details_id' + iti_id).val();
					var shouldAddSS = shouldAddSSToVehicle(tourDetailsId);
					var savedSsTotalHint = 0;
					try {
						if (window.savedSightseeing && window.savedSightseeing[iti_id]) {
							var s = window.savedSightseeing[iti_id];
							savedSsTotalHint = pf(s.ss_total_distance || s.saved_ss_total || 0);
						}
					} catch (e) {
						savedSsTotalHint = 0;
					}
					ensureBaseStored(vid, iti_id, tourDetailsId, shouldAddSS, savedSsTotalHint);
				}
			});
		});
		// Initialization for fresh vs saved
		$('[id^="ss_data_json"]').each(function() {
			var iti_id = $(this).attr('id').replace('ss_data_json', '');
			var savedData = $(this).val();
			var tourDetailsId = $('#tour_details_id' + iti_id).val();
			// Always call updateSightseeingTotals to handle base + currentSS consistently
			// If savedData, assume rows already loaded or parse/append if needed; here we assume load saved handles append
			setTimeout(function() {
				updateSightseeingTotals(iti_id, tourDetailsId);
			}, 300);
			setTimeout(function() {
				calculateGrandTotal(iti_id);
			}, 1000);
		});
		setTimeout(function() {
			updateTotalAccommodationCost && updateTotalAccommodationCost();
		}, 2000);
	}); // document.ready
</script>




<style>
	.ss-rows-container {
		min-height: 20px;
		margin-top: 15px;
		padding: 0;
	}

	.ss-dynamic-row {
		background-color: #f8f9fa;
		border: 1px solid #dee2e6;
		border-radius: 4px;
		padding: 15px;
		margin-bottom: 10px;
		transition: all 0.3s ease;
	}

	.ss-dynamic-row:hover {
		background-color: #e9ecef !important;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}

	/* PAX-based rows - light green */
	.ss-dynamic-row.pax-based {
		background-color: #d4edda;
		border-color: #c3e6cb;
	}

	.ss-dynamic-row.pax-based:hover {
		background-color: #c3e6cb !important;
	}

	/* Distance-based rows - light blue */
	.ss-dynamic-row.distance-based {
		background-color: #d1ecf1;
		border-color: #bee5eb;
	}

	.ss-dynamic-row.distance-based:hover {
		background-color: #bee5eb !important;
	}

	.small-label {
		font-size: 12px;
		font-weight: 600;
		color: #495057;
		margin-bottom: 5px;
		display: block;
	}

	/* Remove any negative margins that might push content outside */
	.ss-rows-container .row {
		margin-left: 0;
		margin-right: 0;
	}

	.ss-rows-container .col-xl-3,
	.ss-rows-container .col-xl-2,
	.ss-rows-container .col-xl-1 {
		padding-left: 10px;
		padding-right: 10px;
	}
</style>
<script>
	$(document).on('input', '#no_of_pax_b', function() {
		var pax = parseFloat($(this).val());
		var totalCost = parseFloat($('#ttc_bifur_hd').val());

		if (!isNaN(pax) && pax > 0) {
			var perPerson = (totalCost / pax);

			// Update span
			$('#ttc_bifur_span_pp').text(perPerson);

			// Update hidden input
			$('#ttc_bifur_hd_pp').val(perPerson);
		} else {
			// Reset if invalid
			$('#ttc_bifur_span_pp').text('0.00');
			$('#ttc_bifur_hd_pp').val('0.00');
		}
	});
</script>



<!-- <script type="text/javascript">
$(document).ready(function () {

    // global sequence counter (syncs with preloaded data)
    var globalSpclCounter = 0;

    // ---------- ADD SPECIAL EVENT ----------
    $(document).on('click', '.add_spcl', function () {

        var $btn = $(this);

        var id_t      = $btn.attr('data-id');   // e.g. 2115_07-02-2026
        var tour_date = $btn.attr('data-std');
        var old_id    = $btn.attr('data-oid');
        var seqAttr   = $btn.attr('data-sequence');

        if (!id_t) return;

        // decide sequence
        var seq;
        if (seqAttr !== undefined && seqAttr !== '') {
            seq = parseInt(seqAttr, 10);
            if (seq > globalSpclCounter) globalSpclCounter = seq;
        } else {
            globalSpclCounter++;
            seq = globalSpclCounter;
        }

        var unique_id = id_t + '_' + seq;

        // 🚨 DUPLICATE PREVENTION
        if ($('#rowsp' + unique_id).length > 0) {
            console.log('Special event already exists:', unique_id);
            return;
        }

        var html = '';
        html += '<div id="rowsp' + unique_id + '" class="dynamic-added card" data-index="' + id_t + '">';
        html += '<div class="row mt-2">';

        html += '<div class="col-xl-2 col-sm-12 col-md-2">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_id]" value="' + id_t + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_sequence]" value="' + seq + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_idvalue]" value="' + unique_id + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][tour_date]" value="' + tour_date + '">';
        html += '</div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2">';
        html += '<div class="teams-rank"><b>Special Event Name</b></div>';
        html += '<input type="text" id="spcl_event' + unique_id + '" ';
        html += 'name="spcl_additi[' + unique_id + '][spcl_event]" ';
        html += 'class="form-control input-sm" maxlength="50">';
        html += '</div>';

        html += '<div class="col-xl-1 col-sm-12 col-md-1">';
        html += '<div class="teams-rank"><b>Tariff</b></div>';
        html += '<input type="text" id="spcl_tariff' + unique_id + '" ';
        html += 'name="spcl_additi[' + unique_id + '][spcl_tariff]" ';
        html += 'class="form-control input-sm" maxlength="7">';
        html += '</div>';

        html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
        html += '<button type="button" id="' + unique_id + '" ';
        html += 'data-nid="' + id_t + '" ';
        html += 'class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
        html += '</div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

        html += '</div></div>';

        $('#spcl_add_dynamic' + id_t).append(html);
    });

    // ---------- REMOVE SPECIAL EVENT ----------
    $(document).on('click', '.btn_spcl_remove', function () {
        var unique_id = $(this).attr('id');
        $('#rowsp' + unique_id).remove();

        // recalc totals if needed
        $('input[id^="spcl_tariff"]').each(function () {
            var vid = $(this).attr('id').replace('spcl_tariff', '');
            setTimeout(() => calculateGrandTotal(vid), 200);
        });
    });

    // ---------- PRELOAD SAVED SPECIAL EVENTS ----------
    const d_spcl_events = <?php echo json_encode($d_spcl_events); ?>;

    if (Array.isArray(d_spcl_events) && d_spcl_events.length > 0) {
        setTimeout(() => {
            $.each(d_spcl_events, function (index, item) {

                const selector =
                    '.add_spcl' +
                    '[data-id="' + item.spcl_id + '"]' +
                    '[data-std="' + item.tour_date + '"]';

                const $btn = $(selector);
                if (!$btn.length) return;

                var unique_id = item.spcl_idvalue;

                // mark sequence and trigger click
                $btn.attr('data-sequence', item.spcl_sequence);
                $btn.trigger('click');
                $btn.removeAttr('data-sequence');

                // populate values
                $('#spcl_event' + unique_id).val(item.spcl_event);
                $('#spcl_tariff' + unique_id).val(item.spcl_tariff);

                // sync counter
                if (item.spcl_sequence > globalSpclCounter) {
                    globalSpclCounter = item.spcl_sequence;
                }
            });
        }, 500);
    }
});
</script>

<script>
$(document).ready(function() {
    // initialize global counter from hidden field if present
    var globalCounter = parseInt($('#total_addon_count').val(), 10) || 0;

    var iti_edit_id = <?php echo isset($iti_edit_id) && $iti_edit_id !== '' ? $iti_edit_id : 0; ?>;
    var read_only = iti_edit_id == 1 ? "readonly" : "";
    var dis_abled = iti_edit_id == 1 ? 'style="pointer-events: none; background-color: #eee;"' : "";

    // helper to sum tariffs for a given base id_t (eg '2115_07-02-2026')
    function updateFacRateFor(id_t) {
        var total = 0;
        $('.addon_class' + id_t).each(function() {
            total += parseFloat($(this).val()) || 0;
        });
        $('#fac_rate' + id_t).val(total);
    }

    // Add / prefill handler
    $('.hotel_fac_change_new').on('change', function() {
        var addonTotal = 0;
        var $btn = $(this);

        var sequenceAttr = $btn.attr('data-sequence'); // optional pre-provided sequence
        var id_t = $btn.attr('data-id');                // e.g. 2115_07-02-2026
        var tour_date = $btn.attr('data-std');          // e.g. 2026-02-07
        if (!id_t) return;

        var seq;
        if (sequenceAttr !== undefined && sequenceAttr !== '') {
            seq = parseInt(sequenceAttr, 10);
            // ensure globalCounter at least seq
            if (seq > globalCounter) globalCounter = seq;
        } else {
            // generate new global sequence
            globalCounter++;
            seq = globalCounter;
        }

        // persist counter
        $('#total_addon_count').val(globalCounter);

        var unique_id = id_t + '_' + seq; // stable unique id used everywhere

        // DUPLICATE PREVENTION: if this unique row already exists, do not insert again
        if ($('#rowaddon' + unique_id).length > 0) {
            // If preloaded row exists, but sequenceAttr was passed to indicate we should
            // populate its fields, we'll still fill the values below (if ajax returns).
            console.log('Addon already exists, skipping insert:', unique_id);
        } else {
            // build HTML using unique_id as array key (so server receives stable keys)
            var html = '';
            html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card" data-index="' + id_t + '">';
            html += '<div class="row mt-2">';

            html += '<div class="col-xl-2 col-sm-12 col-md-2">';
            html += '<div class="teams-rank"><b>Facility Name</b></div>';
            html += '<input type="text" id="addon_event' + unique_id + '" data-id="' + unique_id + '" name="addon_additi[' + unique_id + '][addon_event]" value="" class="form-control input-sm" maxlength="50" ' + read_only + '>';
            html += '</div>';

            html += '<div class="col-xl-1 col-sm-12 col-md-1">';
            html += '<div class="teams-rank"><b>Tariff</b></div>';
            html += '<input type="text" id="addon_tariff' + unique_id + '" data-id="' + unique_id + '" name="addon_additi[' + unique_id + '][addon_tariff]" value="" class="form-control input-sm addon_class' + id_t + '" maxlength="7">';
            html += '</div>';

            html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
            html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + id_t + '" data-nid="' + id_t + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
            html += '</div>';

            html += '<div class="col-xl-2 col-sm-12 col-md-2">';
            html += '<input type="hidden" id="addon_id' + unique_id + '" name="addon_additi[' + unique_id + '][addon_id]" value="' + id_t + '">';
            html += '<input type="hidden" id="addon_sequence' + unique_id + '" name="addon_additi[' + unique_id + '][addon_sequence]" value="' + seq + '">';
            html += '<input type="hidden" id="addon_idvalue' + unique_id + '" name="addon_additi[' + unique_id + '][addon_idvalue]" value="' + unique_id + '">';
            html += '<input type="hidden" id="tour_date' + unique_id + '" name="addon_additi[' + unique_id + '][tour_date]" value="' + tour_date + '">';
            html += '</div>';

            // filler cols
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

            html += '</div></div>';

            $('#addon_add_dynamic' + id_t).append(html);
        }

        // If a facility is selected, fetch tariff and populate (works for both preloaded and newly-added)
        var facility_id = $btn.val();
        if (facility_id > 0) {
            $.ajax({
                url: "<?= site_url('Enquiry/getHotelFaciliyTariffNew'); ?>",
                method: "POST",
                data: { facility_id: facility_id },
                dataType: 'json',
                success: function(data) {
                    // populate the inputs for this unique row
                    $('#addon_event' + unique_id).val(data && data[0] ? data[0].facility_name : '');
                    $('#addon_tariff' + unique_id).val(data && data[0] ? data[0].tariff : '');

                    // recalc totals for this date group
                    updateFacRateFor(id_t);
                },
                error: function(xhr, status, error) {
                    console.error("Tariff fetch error:", error);
                    updateFacRateFor(id_t);
                }
            });
        } else {
            // nothing selected — ensure rate zeroed for this date
            updateFacRateFor(id_t);
        }
    });

    // Remove handler — remove the correct unique row, then update totals
    $(document).on('click', '.btn_addon_remove', function() {
        var button_id = $(this).attr("id"); // this should be the unique_id string
        var id_t = $(this).attr('data-nid');
        if (!button_id) return;

        $('#rowaddon' + button_id).remove();
        // do NOT force globalCounter decrement (keeps uniqueness). If you want
        // to compact sequences later, do that on server or in a separate clean-up routine.

        // recalc totals for this date group
        if (id_t) updateFacRateFor(id_t);
    });

    // When any tariff input changes, update the day's rate
    $(document).on('input', 'input[id^="addon_tariff"]', function() {
        var fullId = this.id.replace('addon_tariff', ''); // unique_id
        // unique_id format is: <id_t>_<seq>. We need base id_t (everything before last _)
        var lastUnd = fullId.lastIndexOf('_');
        var id_t = lastUnd > 0 ? fullId.substring(0, lastUnd) : fullId;
        updateFacRateFor(id_t);
    });

    // Optional: If you preload addons on page load with sequence numbers, ensure you set
    // #total_addon_count to at least the max sequence so new generated seq values remain unique.
    (function syncInitialCounter() {
        var maxSeen = 0;
        $('input[name$="[addon_sequence]"]').each(function() {
            var v = parseInt($(this).val(), 10) || 0;
            if (v > maxSeen) maxSeen = v;
        });
        if (maxSeen > globalCounter) {
            globalCounter = maxSeen;
            $('#total_addon_count').val(globalCounter);
        }
    })();

});
</script> -->


<script>
	$(document).ready(function() {
		const d_addon_events = <?php echo json_encode($d_addon_events); ?>;
		if (Array.isArray(d_addon_events) && d_addon_events.length > 0) {
			setTimeout(() => {
				$.each(d_addon_events, function(index, item) {
					const selector =
						'.hotel_fac_change_new' +
						'[data-id="' + item.addon_id + '"]' +
						'[data-std="' + item.tour_date + '"]';


					const $btn = $(selector);
					var id = item.addon_idvalue;
					if ($btn.length > 0) {

						$btn.attr('data-sequence', item.addon_sequence);
						$btn.trigger("change");
						$btn.removeAttr('data-sequence');
						$('#addon_event' + id).val(item.addon_event);
						$('#addon_tariff' + id).val(item.addon_tariff).trigger('input');
					} else {
						console.warn("Add button not found for selector:", selector);
					}
				});
			}, 500);
		} else {
			const d_addon_events_pre = <?php echo json_encode($d_addon_events_pre_array); ?>;
			console.log(d_addon_events_pre);
			if (Array.isArray(d_addon_events_pre) && d_addon_events_pre.length > 0) {

				setTimeout(() => {
					$.each(d_addon_events_pre, function(index, item) {
						const selector =
							'.hotel_fac_change_new' +
							'[data-id="' + item.addon_id + '"]' +
							'[data-std="' + item.tour_date + '"]';


						const $btn = $(selector);
						console.log(item.addon_id);
						var id = item.addon_idvalue;
						if ($btn.length > 0) {

							$btn.attr('data-sequence', item.addon_sequence);
							$btn.trigger("change");
							$btn.removeAttr('data-sequence');
							$('#addon_event' + id).val(item.addon_event);
							$('#addon_tariff' + id).val(item.addon_tariff).trigger('input');
						} else {
							console.warn("Add button not found for selector:", selector);
						}
					});
				}, 500);
			}

		}
	});
</script>
<script>
	$(document).ready(function() {

		// Handle Ad Hoc Rate input changes
		$(document).on('input', '.adhoc_rate_input', function() {
			var vid = $(this).data('vid');
			calculateVehicleTotal(vid);
			recalculateGrandTotal();
		});

		// Handle travel distance changes
		$(document).on('input', '[id^="travel_distance"]', function() {
			var vid = $(this).attr('v_id');
			var travel_distance = parseFloat($(this).val()) || 0;
			var max_km_day = parseFloat($('#max_km_day' + vid).val()) || 0;

			// Calculate extra kilometers
			var extra_km = travel_distance > max_km_day ? (travel_distance - max_km_day) : 0;
			$('#extra_kilometer' + vid).val(extra_km);

			// Recalculate vehicle total
			calculateVehicleTotal(vid);
			recalculateGrandTotal();
		});

		// Handle vehicle checkbox changes
		$(document).on('change', '.chk_vehicle', function() {
			recalculateGrandTotal();
		});

		// Calculate individual vehicle total
		// function calculateVehicleTotal(vid) {
		// 	var day_rent = parseFloat($('#day_rent' + vid).val()) || 0;
		// 	var extra_kilometer = parseFloat($('#extra_kilometer' + vid).val()) || 0;
		// 	var extra_km_rate_hidden = parseFloat($('#extra_km_rate_hidden' + vid).val()) || 0;
		// 	var adhoc_rate = parseFloat($('#adhoc_rate' + vid).val()) || 0;

		// 	// Calculate: Day Rent + (Extra KM × Extra KM Rate) + Ad Hoc
		// 	var veh_total = day_rent + (extra_kilometer * extra_km_rate_hidden) + adhoc_rate;

		// 	// Update the vehicle total field
		// 	$('#veh_total' + vid).val(veh_total);
		// }

		// Recalculate grand total for all itineraries
		function recalculateGrandTotal() {
			// Group by itinerary ID
			var itinerary_totals = {};

			$('.chk_vehicle:checked').each(function() {
				var vid = $(this).val();
				var veh_total = parseFloat($('#veh_total' + vid).val()) || 0;

				// Extract itinerary ID from vehicle ID
				var match = vid.match(/^(\d+)/);
				if (match) {
					var iti_id = match[1];
					if (!itinerary_totals[iti_id]) {
						itinerary_totals[iti_id] = 0;
					}
					itinerary_totals[iti_id] += veh_total;
				}
			});

			// Update grand totals for each itinerary
			$.each(itinerary_totals, function(iti_id, veh_total) {
				var acc_total = parseFloat($('#acc_total' + iti_id).val()) || 0;
				var grand_total = acc_total + veh_total;
				$('#grand_total' + iti_id).val(grand_total);
			});
		}

		// Initial calculation on page load
		$('[id^="veh_total"]').each(function() {
			var vid = $(this).attr('id').replace('veh_total', '');
			calculateVehicleTotal(vid);
		});

		recalculateGrandTotal();
	});
</script>

<script>
	$(document).ready(function() {
		var isSavedLoad = parseInt($('#is_saved_load').val()) === 1;
		if (!isSavedLoad) {
			calculateCosting(); // Only run on fresh load (no saved data)
		}

		// Recalculate when margin or other inputs change
		$('#margin_value, #tour_addon_value, #gst_value').on('input change', function() {
			calculateCosting();
		});

		// Recalculate when TCS checkbox is clicked
		$('#tcs_checkbox').on('change', function() {
			calculateCosting();
		});

		// Main costing calculation function
		function calculateCosting() {
			// STEP 1: Get base values
			var tnr = parseFloat($('#tnr_hidden').val()) || 0;
			var marginPercent = parseFloat($('#margin_value').val()) || 0;
			var tourAddon = parseFloat($('#tour_addon_value').val()) || 0;

			// STEP 2: Calculate margin amount
			var marginAmount = parseFloat(((tnr * marginPercent / 100) * 100) / 100);
			$('#margin_total').val(marginAmount);

			// STEP 3: Calculate tour addon total
			$('#tour_addon_total').val(tourAddon);

			// STEP 4: Calculate TOTAL (TNR + Margin + Tour Addon)
			var total = parseInt(((tnr + marginAmount + tourAddon) * 100) / 100);
			$('#total_final').val(total);

			// STEP 5: Calculate GST on TOTAL
			var gstPercent = parseFloat($('#gst_value').val()) || 0;
			var gstAmount = parseInt(((total * gstPercent / 100) * 100) / 100);
			$('#gst_final').val(gstAmount);

			// STEP 6: Calculate TPC (Total Package Cost = Total + GST)
			var tpc = parseInt((total + gstAmount) * 100) / 100;
			$('#tpc').val(tpc);

			// STEP 7: Calculate TCS if checkbox is checked (TCS is calculated on TPC)
			var tcsChecked = $('#tcs_checkbox').is(':checked');
			var tcsRate = 0.05; // 5%
			var tcsAmount = 0;

			if (tcsChecked) {
				tcsAmount = parseInt((tpc * tcsRate * 100) / 100);
			}

			$('#tcs_final').val(tcsAmount);
			$('#tcs_hidden').val(tcsAmount);

			// STEP 8: Calculate FINAL TPC (TPC + TCS)
			var tpcWithTcs = parseInt(((tpc + tcsAmount) * 100) / 100);
			$('#tpc_with_tcs').val(tpcWithTcs);
			$('#tpc_with_tcs_hidden').val(tpcWithTcs);

			// Show/hide the Final TPC row based on TCS checkbox
			var finalRow = $('#final_tpc_row');
			if (tcsChecked) {
				finalRow.show();
			} else {
				finalRow.hide();
				// When TCS is unchecked, set Final TPC to regular TPC
				$('#tpc_with_tcs').val(tpc);
				$('#tpc_with_tcs_hidden').val(tpc);
			}
		}
	});
</script>
<script type="text/javascript">
	/*$(document).on('click', '.tour_view', function(e) {
        e.preventDefault();
		var tourPlanDet = <?php echo json_encode($tour_plan_det); ?>;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var html = '';
		html += '<table class="table table-bordered table-responsive-md table-striped mb-0 text-nowrap">';
		html += '<tr>';
		html += '<th colspan="7" style="text-align:center;"> Accommodation </th>';
		html += '</tr>';
		html += '<tr>';
						html += '<th> Si No </th>';
						html += '<th> Location </th>';
						html += '<th> Start Date </th>';
						html += '<th> Nights </th>';
						html += '<th> End Date </th>';
						html += '<th> Hotel </th>';
						html += '<th> Room Category </th>';
					html += '</tr>';
		$.each(tourPlanDet, function (index, item) {
			var sino = index + 1;
			
					
					html += '<tr>';
						html += '<td>'+sino+'</td>';
						html += '<td>'+item.geog_name+'</td>';
						html += '<td>'+item.check_in_date+'</td>';
						html += '<td>'+item.no_of_days+'</td>';
						html += '<td>'+item.check_out_date+'</td>';
						html += '<td>'+item.object_name+'</td>';
						html += '<td>'+item.room_category_name+'</td>';
					html += '</tr>';
					
					
		});
		html += '</table>';

		html += '<table class="table table-bordered table-responsive-md table-striped mb-0 text-nowrap">';
		html += '<tr>';
		html += '<th colspan="7" style="text-align:center;"> Transportation </th>';
		html += '</tr>';
		html += '<tr>';
						html += '<th> Si No </th>';
						html += '<th> Vehicle Model </th>';
						html += '<th> Vehicle Count </th>';
					html += '</tr>';
		$.each(vehicle_models, function (index1, item1) {
			var sino = index1 + 1;		
					html += '<tr>';
						html += '<td>'+sino+'</td>';
						html += '<td>'+item1.vehicle_model_name+'</td>';
						html += '<td>'+item1.vehicle_count+'</td>';
					
					html += '</tr>';
						
		});
		html += '</table>';
		$('.tab_con').html(html);
        $('#modal_tour').modal('show');
    });*/

	$(document).on('click', '.tour_view', function() {
		var enquiry_header_id = <?php echo $object_det[0]['enquiry_header_id']; ?>;
		var enquiry_details_id = <?php echo $object_det[0]['enquiry_details_id']; ?>;
		var hotel_categories = <?php echo json_encode($hotel_categories); ?>;
		var hotel_category_exist = <?php echo $object_det[0]['hotel_category']; ?>;
		var meal_plan_exist = <?php echo $object_det[0]['meal_plan']; ?>;
		var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;
		var total_no_of_pax = <?php echo $object_det[0]['total_no_of_pax']; ?>;
		var enquiry_header_id = <?php echo $object_det[0]['enquiry_header_id']; ?>;
		var enquiry_details_id = <?php echo $object_det[0]['enquiry_details_id']; ?>;
		var no_of_adult = <?php echo $object_det[0]['no_of_adult']; ?>;
		var no_of_child_with_bed = <?php echo $object_det[0]['no_of_child_with_bed']; ?>;
		var no_of_child_without_bed = <?php echo $object_det[0]['no_of_child_without_bed']; ?>;
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var no_of_extra_bed = <?php echo $object_det[0]['no_of_extra_bed']; ?>;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var is_quick_quote = <?php echo $object_det[0]['is_quick_quote'] ? $object_det[0]['is_quick_quote'] : 0; ?>;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;

		var child_t_d = 0;
		var child_t_s = 0;

		var child_wb_t_d = 0;
		var child_wb_t_s = 0;

		var extra_t_d = 0;
		var extra_t_s = 0;

		var room_t_d = 0;
		var room_t_s = 0;

		var start_date = <?= json_encode($start_date); ?>;
		var totalDays = 0;

		var vid_t;
		var v_day_rent;
		var v_max_km_day;
		var v_extra_km_rate;
		var v_veh_total;
		var v_veh_header;


		$.ajax({
			url: '<?= site_url('Enquiry/loadTourLocation'); ?>',
			type: 'POST',
			data: {
				enquiry_header_id: enquiry_header_id,
				enquiry_details_id: enquiry_details_id
			},
			dataType: 'json',
			success: function(response) {
				// Clear existing location cards if necessary

				var newCard = ``;
				$.each(response, function(index, item) {
					// Create a new location card element
					var vehicleDetails = JSON.parse(item.vehicle_details);
					var count = index + 1;

					var isFirst = count === 1;
					var prevCheckout = $('.tour_plan_div .location-card:last input[name^="addloc["][name$="[checkout]"]').val();
					var checkinDate = isFirst ? start_date : prevCheckout || '';
					ep_sel = '';
					cp_sel = '';
					map_sel = '';
					ap_sel = '';
					if (item.meal_plan_id == 1) {
						ep_sel = "selected";
					}
					if (item.meal_plan_id == 2) {
						cp_sel = "selected";
					}
					if (item.meal_plan_id == 3) {
						map_sel = "selected";
					}
					if (item.meal_plan_id == 4) {
						ap_sel = "selected";
					}
					$.each(item.cost, function(index1, item3) {
						if ((item3.cost_component_id == "6" || item3.cost_component_id == "7") && item3.room_type_id == "2") {
							room_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "12" || item3.cost_component_id == "13") && item3.room_type_id == "2") {
							child_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "15" || item3.cost_component_id == "16") && item3.room_type_id == "2") {
							child_wb_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "9" || item3.cost_component_id == "10") && item3.room_type_id == "2") {
							extra_t_d = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "6" || item3.cost_component_id == "7") && item3.room_type_id == "1") {
							room_t_s = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "12" || item3.cost_component_id == "13") && item3.room_type_id == "1") {
							child_t_s = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "15" || item3.cost_component_id == "16") && item3.room_type_id == "1") {
							child_wb_t_s = item3.quick_quote_tariff;
						}
						if ((item3.cost_component_id == "9" || item3.cost_component_id == "10") && item3.room_type_id == "1") {
							extra_t_s = item3.quick_quote_tariff;
						}
					});
					var room_total = parseInt(no_of_double_room) * parseInt(room_t_d);
					var child_total = parseInt(no_of_child_with_bed) * parseInt(child_t_d);
					var child_wb_total = parseInt(no_of_child_without_bed) * parseInt(child_wb_t_d);
					var extra_total = parseInt(no_of_extra_bed) * parseInt(extra_t_d);
					if (item.tax_status == 1) {
						var tot_d = parseInt(room_t_d) + child_total + child_wb_total + extra_total;
						var tot_s = parseInt(room_t_s);
						if (tot_d >= 7500) {
							var gst = 18;
							var gstval = (gst / 100) * tot_d;
							var total_doubles = (tot_d + gstval) * parseInt(no_of_double_room);
							var d_totals = total_doubles * parseInt(item.no_of_days);
						} else {
							var d_totals = (room_total + child_total + child_wb_total + extra_total) * parseInt(item.no_of_days);
						}

						if (tot_s >= 7500) {
							var gst = 18;
							var gstval = (gst / 100) * tot_s;
							var total_singles = (tot_s + gstval) * parseInt(no_of_single_room);
							var s_totals = total_singles * parseInt(item.no_of_days);
						} else {
							var s_totals = (parseInt(no_of_single_room) * parseInt(room_t_s)) * parseInt(item.no_of_days);
						}

					} else {
						var d_totals = (room_total + child_total + child_wb_total + extra_total) * parseInt(item.no_of_days);
						var s_totals = (parseInt(no_of_single_room) * parseInt(room_t_s)) * parseInt(item.no_of_days);
					}

					newCard += `
					
						<div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
							<div class="card">
								<div class="card-header">
									<input type="hidden" id="own_arrange${count}" name="addloc[${count}][own_arrange]" value="${item.is_own_arrangement}">
									<input type="hidden" id="tour_location_id${count}" name="addloc[${count}][tour_location_id]" value="${item.tour_location}">
									<input type="hidden" id="location_sequence${count}" name="addloc[${count}][location_sequence]" value="${count}">
									<div class="card-title"><span class="card-seq" style="color:#339966;">${count}</span>. <span style="color:#339966;">${item.geog_name}</span></div>
								</div>
								<div class="card-body">
									<div class="ibox teams mb-30 bg-boxshadow">
										<div class="ibox-content teams">
											<div class="row mt-2">
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Checkin</b></div>
													<span class="text-muted">
														<input type="date" value="${item.check_in_date}" id="checkin${count}" name="addloc[${count}][checkin]" class="form-control input-sm" required readonly>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Nights</b></div>
													<span class="text-muted">
														<input type="text" id="no_of_night${count}" name="addloc[${count}][no_of_night]" value="${item.no_of_days}" class="form-control input-sm no_of_night" maxlength="2" oninput="validateNumericInput(this); calculateCheckout(${count});" readonly>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Checkout</b></div>
													<span class="text-muted">
														<input type="date" id="checkout${count}" value="${item.check_out_date}" name="addloc[${count}][checkout]" class="form-control input-sm" required readonly>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Hotel Category</b></div>
														<select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search input-sm hotel_cat_change_draft" data-id="${count}" data-hid="${item.hotel_id}" readonly>
														<option value="">Select</option>
														</select>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Hotel</b></div>
													<span class="text-muted">
														<select id="hotelid${count}" name="addloc[${count}][hotelid]" class="form-control select2-show-search input-sm hotel_change_draft" data-rid="${item.room_category_id}" data-id="${count}" readonly>
														<option value="">Select</option>
														</select>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Room Category</b></div>
														<select id="roomcat${count}" name="addloc[${count}][roomcat]" class="form-control select2-show-search input-sm" data-id="${count}" readonly>
														<option value="">Select</option>
														</select>
												</div>
											</div>

										
											<div class="row mt-2">
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Meal Plan</b></div>
													<span class="text-muted">
														<select id="mealplan${count}" name="addloc[${count}][mealplan]" class="form-control select2-show-search input-sm mp_change" data-id="${count}" readonly>
														<option value="">Select</option>
														<option value="1" ${ep_sel}>EP</option>
														<option value="2" ${cp_sel}>CP</option>
														<option value="3" ${map_sel}>MAP</option>
														<option value="4" ${ap_sel}>AP</option>
														</select>
													</span>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>No Of Adult</b></div>
													<input type="text" id="no_of_adult${count}" name="addloc[${count}][no_of_adult]" value="${no_of_adult}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.With Bed Qty</b></div>
													<input type="text" id="no_of_ch${count}" name="addloc[${count}][no_of_ch]" value="${no_of_child_with_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.Without Bed Qty</b></div>
													<input type="text" id="no_of_cw${count}" name="addloc[${count}][no_of_cw]" value="${no_of_child_without_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Extra Bed Qty</b></div>
													<input type="text" id="no_of_extra${count}" name="addloc[${count}][no_of_extra]" value="${no_of_extra_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Total Pax</b></div>
													<input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly>
												</div>
												
											</div>`;
					if (no_of_double_room > 0) {

						newCard += `<div class="row mt-2 double_row">
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Double Room</b></div>
														<input type="text" id="double${count}" name="addloc[${count}][double]" value="${no_of_double_room}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
													</div>
										
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Daily Room Rate</b></div>
														<input type="text" id="d_adult_rate${count}" name="addloc[${count}][d_adult_rate]" value="${room_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>C.With Bed Rate</b></div>
														<input type="text" id="d_child_rate${count}" name="addloc[${count}][d_child_rate]" value="${child_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>C.Without Bed Rate</b></div>
														<input type="text" id="d_child_wb_rate${count}" name="addloc[${count}][d_child_wb_rate]" value="${child_wb_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Extra Bed Rate</b></div>
														<input type="text" id="d_extra_bed_rate${count}" name="addloc[${count}][d_extra_bed_rate]" value="${extra_t_d}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
													</div>
														<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Total</b></div>
														<input type="text" id="d_total_rate${count}" name="addloc[${count}][d_total_rate]" value="${d_totals}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
													</div>
													
												</div>`;
					} else {
						newCard += `<input type="hidden" id="double${count}" name="addloc[${count}][double]" value="0">
															<input type="hidden" id="d_adult_rate${count}" name="addloc[${count}][d_adult_rate]" value="0">
															<input type="hidden" id="d_child_rate${count}" name="addloc[${count}][d_child_rate]" value="0">
															<input type="hidden" id="d_child_wb_rate${count}" name="addloc[${count}][d_child_wb_rate]" value="0">
															<input type="hidden" id="d_extra_bed_rate${count}" name="addloc[${count}][d_extra_bed_rate]" value="0">
															<input type="hidden" id="d_total_rate${count}" name="addloc[${count}][d_total_rate]" value="0">`;
					}
					if (no_of_single_room > 0) {
						newCard += `<div class="row mt-2 single_row">
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Single Room</b></div>
													<input type="text" id="single${count}" name="addloc[${count}][single]" value="${no_of_single_room}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
												</div>
									
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Daily Room Rate</b></div>
													<input type="text" id="s_adult_rate${count}" name="addloc[${count}][s_adult_rate]" value="${room_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.With Bed Rate</b></div>
													<input type="text" id="s_child_rate${count}" name="addloc[${count}][s_child_rate]" value="${child_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>C.Without Bed Rate</b></div>
													<input type="text" id="s_child_wb_rate${count}" name="addloc[${count}][s_child_wb_rate]" value="${child_wb_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Extra Bed Rate</b></div>
													<input type="text" id="s_extra_bed_rate${count}" name="addloc[${count}][s_extra_bed_rate]" value="${extra_t_s}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
													<div class="teams-rank"><b>Total</b></div>
													<input type="text" id="s_total_rate${count}" name="addloc[${count}][s_total_rate]" value="${s_totals}" class="form-control input-sm" maxlength="6" oninput="validateNumericInput(this);" readonly>
												</div>
												
											</div>`;
					} else {
						newCard += `<input type="hidden" id="single${count}" name="addloc[${count}][single]" value="0">
															<input type="hidden" id="s_adult_rate${count}" name="addloc[${count}][s_adult_rate]" value="0">
															<input type="hidden" id="s_child_rate${count}" name="addloc[${count}][s_child_rate]" value="0">
															<input type="hidden" id="s_child_wb_rate${count}" name="addloc[${count}][s_child_wb_rate]" value="0">
															<input type="hidden" id="s_extra_bed_rate${count}" name="addloc[${count}][s_extra_bed_rate]" value="0">
															<input type="hidden" id="s_total_rate${count}" name="addloc[${count}][s_total_rate]" value="0">`;
					}
					if (is_vehicle_required == 1) {

						$.each(vehicle_models, function(vindex, vmodel) {
							$.each(vehicleDetails, function(v_index, v_item) {
								if (vmodel.vehicle_type_id == v_item.veh_type_id) {
									vid_t = count + vmodel.vehicle_type_id;
									v_day_rent = v_item.day_rent;
									v_max_km_day = v_item.max_km_day;
									v_travel_distance = v_item.travel_distance;
									v_extra_kilometer = v_item.extra_kilometer;
									v_extra_km_rate = v_item.extra_km_rate;
									v_veh_total = v_item.veh_total;
									v_veh_header = v_item.veh_header;
								}
							});
							if (vindex == 0) {
								newCard += `
												<center><div class="col-md-12 col-lg-12 col-xl-12"style="padding-top:10px;"><h5 style="color:#003300;">Vehicle Details<span id="v_from_to${count}">${v_veh_header}</span></h5></div></center>
												<input type="hidden" id="veh_header${count}" name="addloc[${count}][veh_header]" value="${v_veh_header}">
												<div class="row mt-2 single_row">
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Vehicle Model</b></div>
												    </div>		
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Vehicle Count</b></div>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Daily Rent</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Max KM/Day</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Distance</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Extra KM</b></div>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Extra KM Rate</b></div>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														<div class="teams-rank"><b>Total</b></div>
													</div>
												</div>
														`;
							}
							vid = count + vmodel.vehicle_type_id;
							newCard += `<div class="row mt-2 single_row">
													<div class="col-xl-2 col-sm-12 col-md-2">
														
														<input type="text" id="veh_model${vid}" name="addloc[${count}][veh_model][${vindex}]" value="${vmodel.vehicle_model_name}" class="form-control input-sm veh_model${vindex}" readonly>
														<input type="hidden" id="veh_type_id${vid}" name="addloc[${count}][veh_type_id][${vindex}]" value="${vmodel.vehicle_type_id}" class="form-control input-sm veh_type_id${vindex}">
													</div>
										
													<div class="col-xl-2 col-sm-12 col-md-2">
														
														<input type="text" id="veh_count${vid}" name="addloc[${count}][veh_count][${vindex}]" value="${vmodel.vehicle_count}" class="form-control input-sm veh_count${vindex}" maxlength="2" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
													
														<input type="text" id="day_rent${vid}" name="addloc[${count}][day_rent][${vindex}]" value="${v_day_rent}" class="form-control input-sm cls_daily day_rent${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
													
														<input type="text" id="max_km_day${vid}" name="addloc[${count}][max_km_day][${vindex}]" value="${v_max_km_day}" class="form-control input-sm max_km_day${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
													
														<input type="text" id="travel_distance${vid}" name="addloc[${count}][travel_distance][${vindex}]" value="${v_travel_distance}" class="form-control input-sm cls_dist travel_distance${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
													
														<input type="text" id="extra_kilometer${vid}" name="addloc[${count}][extra_kilometer][${vindex}]" value="${v_extra_kilometer}" class="form-control input-sm extra_kilometer${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-1 col-sm-12 col-md-2">
														
														<input type="text" id="extra_km_rate${vid}" name="addloc[${count}][extra_km_rate][${vindex}]" value="${v_extra_km_rate}" class="form-control input-sm extra_km_rate${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly>
													</div>
													<div class="col-xl-2 col-sm-12 col-md-2">
														
														<input type="text" id="veh_total${vid}" name="addloc[${count}][veh_total][${vindex}]" value="${v_veh_total}" class="form-control input-sm veh_total${vindex}" maxlength="5" oninput="validateNumericInput(this);"readonly>
													</div>
													
												</div>`;
						});
					} else {
						newCard += `<input type="hidden" id="veh_model${count}0" name="addloc[${count}][veh_model][0]" value="">
															<input type="hidden" id="veh_count${count}0" name="addloc[${count}][veh_count][0]" value="0">
															<input type="hidden" id="day_rent${count}0" name="addloc[${count}][day_rent][0]" value="0">
															<input type="hidden" id="max_km_day${count}0" name="addloc[${count}][max_km_day][0]" value="0">
															<input type="hidden" id="extra_km_rate${count}0" name="addloc[${count}][extra_km_rate][0]" value="0">
															<input type="hidden" id="veh_total${count}0" name="addloc[${count}][veh_total][0]" value="0">`;
					}
					newCard += `
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					`;
					setTimeout(function() {
						var hotelCat = $('#hotelcat' + count);
						console.log("Dropdown found?", hotelCat.length);

						if (hotelCat.length > 0) {
							hotelCat.empty();
							hotelCat.append('<option value="">Select</option>');

							$.each(hotel_categories, function(hIndex, hotelcat) {
								var selected = (hotelcat.hotel_category_id == item.hot_cat_id) ? "selected" : "";
								hotelCat.append('<option value="' + hotelcat.hotel_category_id + '" ' + selected + '>' + hotelcat.hotel_category_name + '</option>');
							});

							hotelCat.trigger('change');
						} else {
							console.log("Dropdown not found. Ensure it exists before updating.");
						}
					}, 500);
				});
				//$(".tour_plan_div").append(newCard);

				$('.tab_con').html(newCard);
				$('#modal_tour').modal('show');
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
		});
	});
</script>

<script>
	// Pass saved sightseeing data to JavaScript
	var savedSightseeingData = <?= json_encode($saved_sightseeing_by_date) ?>;

	console.log('SavedSightseeingData from PHP:', savedSightseeingData);

	// The structure should be:
	// savedSightseeingData[tour_details_id][tour_date] = {
	//     sightseeing: [...],
	//     saved_ss_ids: [...],
	//     ss_total_distance: 400,
	//     ss_pax_cost: 0,
	//     ss_total_cost: 0,
	//     special_event_name: "12",
	//     json_special_event: [{...}],
	//     json_addons: [{...}, {...}],
	//     hotel_facility_ids: "",
	//     is_saved: true,
	//     data_source: "previous"
	// }
</script>

<!-- <script type="text/javascript">
$(document).ready(function() {

    // Global sequence counters (in case user adds new ones later)
    var addonGlobalSeq = 0;
    var spclGlobalSeq = 0;

    // Loop through every tour_details_id in savedSightseeingData
    $.each(savedSightseeingData, function(tour_details_id, datesData) {

        $.each(datesData, function(tour_date, dayData) {
            // Convert YYYY-MM-DD to dd-mm-YYYY
            var parts = tour_date.split('-');
            if (parts.length !== 3) return true; // skip invalid date

            var day = parts[2];
            var month = parts[1];
            var year = parts[0];
            var dmy = day + '-' + month + '-' + year; // e.g., 06-02-2026

            var iti_id = tour_details_id + '_' + dmy;

            // ===================================================================
            // 1. LOAD HOTEL FACILITY ADD-ONS (json_addons)
            // ===================================================================
            var addonContainer = $('#addon_add_dynamic' + iti_id);
            if (addonContainer.length > 0 && dayData.json_addons && $.isArray(dayData.json_addons) && dayData.json_addons.length > 0) {

                dayData.json_addons.forEach(function(addon) {
                    addonGlobalSeq++;
                    var sequence = addonGlobalSeq;

                    // Use addon_idvalue if available, otherwise fallback
                    var unique_id = addon.addon_idvalue || (iti_id + '_addon_' + sequence);
                    var row_id = 'rowaddon' + unique_id;

                    var html = '';
                    html += '<div id="' + row_id + '" class="dynamic-added card" data-index="' + addon.addon_id + '">';
                    html += '<div class="row mt-2">';

                    // Facility Name
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Facility Name</b></div>';
                    html += '<input type="text" id="addon_event' + unique_id + '" name="addon_additi[' + sequence + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    // Tariff
                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" id="addon_tariff' + unique_id + '" name="addon_additi[' + sequence + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
                    html += '</div>';

                    // Remove Button
                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + addon.addon_id + '" data-nid="' + iti_id + '" data-cid="' + sequence + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
                    html += '</div>';

                    // Hidden Fields
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][addon_id]" value="' + addon.addon_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][addon_sequence]" value="' + sequence + '">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][addon_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][tour_date]" value="' + tour_date + '">';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '</div></div>';

                    addonContainer.append(html);
                });

                // Update Total Facility Rate
                var addonTotal = 0;
                $('.addon_class' + iti_id).each(function() {
                    addonTotal += parseFloat($(this).val()) || 0;
                });
                $('#fac_rate' + iti_id).val(addonTotal);

                // Update global addon count if higher
                if (addonGlobalSeq > $('#total_addon_count').val()) {
                    $('#total_addon_count').val(addonGlobalSeq);
                }
            }

            // ===================================================================
            // 2. LOAD SPECIAL EVENTS (json_special_event)
            // ===================================================================
            var spclContainer = $('#spcl_add_dynamic' + iti_id);
            if (spclContainer.length > 0 && dayData.json_special_event && $.isArray(dayData.json_special_event) && dayData.json_special_event.length > 0) {

                dayData.json_special_event.forEach(function(event) {
                    spclGlobalSeq++;
                    var sequence = spclGlobalSeq;

                    var unique_id = event.spcl_idvalue || (iti_id + '_spcl_' + sequence);
                    var row_id = 'rowsp' + unique_id;

                    var html = '';
                    html += '<div id="' + row_id + '" class="dynamic-added card" data-index="' + iti_id + '">';
                    html += '<div class="row mt-2">';

                    // Hidden Fields
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][spcl_id]" value="' + event.spcl_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][spcl_sequence]" value="' + sequence + '">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][spcl_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][tour_date]" value="' + tour_date + '">';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>'; // spacer

                    // Special Event Name
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Special Event Name</b></div>';
                    html += '<input type="text" id="spcl_event' + unique_id + '" name="spcl_additi[' + sequence + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    // Tariff
                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" id="spcl_tariff' + unique_id + '" name="spcl_additi[' + sequence + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
                    html += '</div>';

                    // Remove Button
                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + iti_id + '" data-nid="' + iti_id + '" data-cid="' + sequence + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '</div></div>';

                    spclContainer.append(html);
                });
            }

        });
    });
});
</script> -->


<!-- <script type="text/javascript">
$(document).ready(function() {

    // Prevent duplicate loading – we will mark containers as "loaded"
    // This ensures rows are added ONLY on first page load, not on every refresh/save

    // ===================================================================
    // 1. LOAD SAVED HOTEL FACILITY ADD-ONS (json_addons)
    // ===================================================================
    $.each(savedSightseeingData, function(tour_details_id, datesData) {
        $.each(datesData, function(tour_date, dayData) {
            var parts = tour_date.split('-');
            if (parts.length !== 3) return true;

            var dmy = parts[2] + '-' + parts[1] + '-' + parts[0]; // dd-mm-yyyy
            var iti_id = tour_details_id + '_' + dmy;

            var container = $('#addon_add_dynamic' + iti_id);

            // Only proceed if container exists and hasn't been loaded yet
            if (container.length > 0 && !container.data('addons-loaded') && dayData.json_addons && $.isArray(dayData.json_addons)) {

                dayData.json_addons.forEach(function(addon) {
                    // Use the original addon_idvalue – this is unique and stable
                    var unique_id = addon.addon_idvalue;
                    if (!unique_id) return; // safety

                    // Prevent duplicate row if somehow already exists
                    if ($('#rowaddon' + unique_id).length > 0) return;

                    var sequence = addon.addon_sequence || 1;

                    var html = '';
                    html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card" data-index="' + addon.addon_id + '">';
                    html += '<div class="row mt-2">';

                    // Facility Name
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Facility Name</b></div>';
                    html += '<input type="text" id="addon_event' + unique_id + '" name="addon_additi[' + sequence + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    // Tariff
                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" id="addon_tariff' + unique_id + '" name="addon_additi[' + sequence + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
                    html += '</div>';

                    // Remove Button
                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + addon.addon_id + '" data-nid="' + iti_id + '" data-cid="' + sequence + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
                    html += '</div>';

                    // Hidden fields
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][addon_id]" value="' + addon.addon_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][addon_sequence]" value="' + sequence + '">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][addon_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + sequence + '][tour_date]" value="' + tour_date + '">';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '</div></div>';

                    container.append(html);
                });

                // Update total facility rate
                var total = 0;
                $('.addon_class' + iti_id).each(function() {
                    total += parseFloat($(this).val()) || 0;
                });
                $('#fac_rate' + iti_id).val(total);

                // Mark this container as loaded
                container.data('addons-loaded', true);
            }

            // ===================================================================
            // 2. LOAD SAVED SPECIAL EVENTS (json_special_event)
            // ===================================================================
            var spclContainer = $('#spcl_add_dynamic' + iti_id);

            if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && dayData.json_special_event && $.isArray(dayData.json_special_event)) {

                dayData.json_special_event.forEach(function(event) {
                    var unique_id = event.spcl_idvalue;
                    if (!unique_id) return;

                    if ($('#rowsp' + unique_id).length > 0) return; // prevent duplicate

                    var sequence = event.spcl_sequence || 1;

                    var html = '';
                    html += '<div id="rowsp' + unique_id + '" class="dynamic-added card" data-index="' + iti_id + '">';
                    html += '<div class="row mt-2">';

                    // Hidden fields
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][spcl_id]" value="' + event.spcl_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][spcl_sequence]" value="' + sequence + '">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][spcl_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + sequence + '][tour_date]" value="' + tour_date + '">';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    // Event Name
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Special Event Name</b></div>';
                    html += '<input type="text" id="spcl_event' + unique_id + '" name="spcl_additi[' + sequence + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    // Tariff
                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" id="spcl_tariff' + unique_id + '" name="spcl_additi[' + sequence + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
                    html += '</div>';

                    // Remove Button
                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + iti_id + '" data-nid="' + iti_id + '" data-cid="' + sequence + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '</div></div>';

                    spclContainer.append(html);
                });

                // Mark as loaded
                spclContainer.data('spcl-loaded', true);
            }
        });
    });

    // Your existing manual add buttons still work normally
    // (no changes needed to .hotel_fac_change_new or .add_spcl handlers)
});
</script> -->

<!-- <script type="text/javascript">
$(document).ready(function() {

    var maxAddonIndex = 0; // Track the highest index used

    // ===================================================================
    // AUTO-LOAD SAVED HOTEL FACILITY ADD-ONS + SPECIAL EVENTS
    // ===================================================================
    $.each(savedSightseeingData, function(tour_details_id, datesData) {
        $.each(datesData, function(tour_date, dayData) {
            var parts = tour_date.split('-');
            if (parts.length !== 3) return true;

            var dmy = parts[2] + '-' + parts[1] + '-' + parts[0];
            var iti_id = tour_details_id + '_' + dmy;

            // ==================== HOTEL FACILITY ADD-ONS ====================
            var addonContainer = $('#addon_add_dynamic' + iti_id);

            if (addonContainer.length > 0 && 
                !addonContainer.data('addons-loaded') && 
                dayData.json_addons && 
                $.isArray(dayData.json_addons) && 
                dayData.json_addons.length > 0) {

                dayData.json_addons.forEach(function(addon) {
                    // Use original addon_sequence if valid, otherwise generate
                    var seq = parseInt(addon.addon_sequence) || 0;
                    if (seq > maxAddonIndex) maxAddonIndex = seq;

                    var unique_id = addon.addon_idvalue || (iti_id + '_addon_' + seq);
                    if ($('#rowaddon' + unique_id).length > 0) return; // prevent dup

                    var html = '';
                    html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card" data-index="' + addon.addon_id + '">';
                    html += '<div class="row mt-2">';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Facility Name</b></div>';
                    html += '<input type="text" id="addon_event' + unique_id + '" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" id="addon_tariff' + unique_id + '" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + addon.addon_id + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + addon.addon_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '</div></div>';

                    addonContainer.append(html);
                });

                // Update total
                var total = 0;
                $('.addon_class' + iti_id).each(function() {
                    total += parseFloat($(this).val()) || 0;
                });
                $('#fac_rate' + iti_id).val(total);

                addonContainer.data('addons-loaded', true);
            }

            // ==================== SPECIAL EVENTS ====================
            var spclContainer = $('#spcl_add_dynamic' + iti_id);

            if (spclContainer.length > 0 && 
                !spclContainer.data('spcl-loaded') && 
                dayData.json_special_event && 
                $.isArray(dayData.json_special_event)) {

                dayData.json_special_event.forEach(function(event) {
                    var unique_id = event.spcl_idvalue;
                    if (!unique_id || $('#rowsp' + unique_id).length > 0) return;

                    var seq = parseInt(event.spcl_sequence) || 1;

                    var html = '';
                    html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
                    html += '<div class="row mt-2">';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + event.spcl_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
                    html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Special Event Name</b></div>';
                    html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" id="' + unique_id + '" data-oid="' + iti_id + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '</div></div>';

                    spclContainer.append(html);
                });

                spclContainer.data('spcl-loaded', true);
            }
        });
    });

    // ===================================================================
    // CRITICAL: Sync the global counter used by your manual "Add" button
    // ===================================================================
    if (maxAddonIndex > 0) {
        $('#total_addon_count').val(maxAddonIndex);
        // Also update the global 'i' if it's declared in your code
        if (typeof i !== 'undefined') {
            i = maxAddonIndex;
        }
    }
});
</script> -->

<!-- <script type="text/javascript">
$(document).ready(function() {

    var maxAddonSeq = 0;  // Will track highest addon_sequence from saved data

    // ===================================================================
    // AUTO-LOAD SAVED HOTEL FACILITY ADD-ONS & SPECIAL EVENTS
    // ===================================================================
    $.each(savedSightseeingData, function(tour_details_id, datesData) {
        $.each(datesData, function(tour_date, dayData) {
            var parts = tour_date.split('-');
            if (parts.length !== 3) return true;

            var dmy = parts[2] + '-' + parts[1] + '-' + parts[0]; // dd-mm-yyyy
            var iti_id = tour_details_id + '_' + dmy;

            // ==================== HOTEL FACILITY ADD-ONS ====================
            var addonContainer = $('#addon_add_dynamic' + iti_id);

            if (addonContainer.length > 0 && 
                !addonContainer.data('addons-loaded') && 
                dayData.json_addons && 
                $.isArray(dayData.json_addons) && 
                dayData.json_addons.length > 0) {

                dayData.json_addons.forEach(function(addon) {
                    var seq = parseInt(addon.addon_sequence) || 1;
                    if (seq > maxAddonSeq) maxAddonSeq = seq;

                    var unique_id = addon.addon_idvalue;
                    if (!unique_id || $('#rowaddon' + unique_id).length > 0) return;

                    var html = '';
                    html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card" data-index="' + addon.addon_id + '">';
                    html += '<div class="row mt-2">';

                    // Facility Name
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Facility Name</b></div>';
                    html += '<input type="text" id="addon_event' + unique_id + '" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    // Tariff
                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" id="addon_tariff' + unique_id + '" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
                    html += '</div>';

                    // Remove Button
                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + addon.addon_id + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
                    html += '</div>';

                    // Hidden Fields
                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + addon.addon_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '</div></div>';

                    addonContainer.append(html);
                });

                // Update facility total
                var total = 0;
                $('.addon_class' + iti_id).each(function() {
                    total += parseFloat($(this).val()) || 0;
                });
                $('#fac_rate' + iti_id).val(total);

                addonContainer.data('addons-loaded', true);
            }

            // ==================== SPECIAL EVENTS ====================
            var spclContainer = $('#spcl_add_dynamic' + iti_id);

            if (spclContainer.length > 0 && 
                !spclContainer.data('spcl-loaded') && 
                dayData.json_special_event && 
                $.isArray(dayData.json_special_event)) {

                dayData.json_special_event.forEach(function(event) {
                    var unique_id = event.spcl_idvalue;
                    if (!unique_id || $('#rowsp' + unique_id).length > 0) return;

                    var seq = parseInt(event.spcl_sequence) || 1;

                    var html = '';
                    html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
                    html += '<div class="row mt-2">';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + event.spcl_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
                    html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
                    html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Special Event Name</b></div>';
                    html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<div class="teams-rank"><b>Tariff</b></div>';
                    html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" id="' + unique_id + '" data-oid="' + iti_id + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                    html += '</div></div>';

                    spclContainer.append(html);
                });

                spclContainer.data('spcl-loaded', true);
            }
        });
    });

    // ===================================================================
    // CRITICAL: SYNC GLOBAL COUNTER WITH HIGHEST SAVED SEQUENCE
    // ===================================================================
    if (maxAddonSeq > 0) {
        // Update hidden field
        $('#total_addon_count').val(maxAddonSeq);

        // Also update the global 'i' variable used in your add handler
        if (typeof i !== 'undefined') {
            i = maxAddonSeq;  // So next manual add uses max+1
        } else {
            // If 'i' is not declared globally, declare it
            window.i = maxAddonSeq;
        }
    }
});
</script> -->


<!-- <script type="text/javascript">
	$(document).ready(function() {

		var maxAddonSeq = 0;

		// We will collect all saved add-ons and special events by date
		var addonsByDate = {};
		var specialEventsByDate = {};

		// First, collect all saved data grouped by tour_date (YYYY-MM-DD)
		$.each(savedSightseeingData, function(tour_details_id, datesData) {
			$.each(datesData, function(tour_date, dayData) {
				if (!addonsByDate[tour_date]) {
					addonsByDate[tour_date] = [];
					specialEventsByDate[tour_date] = [];
				}

				if (dayData.json_addons && $.isArray(dayData.json_addons)) {
					addonsByDate[tour_date] = addonsByDate[tour_date].concat(dayData.json_addons);
				}
				if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
					specialEventsByDate[tour_date] = specialEventsByDate[tour_date].concat(dayData.json_special_event);
				}
			});
		});

		// Now process each visible day on the current page
		$('[id^="addon_add_dynamic"]').each(function() {
			var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2055_06-02-2026
			var iti_id = containerId.replace('addon_add_dynamic', ''); // 2055_06-02-2026
			var currentTourPlanId = iti_id.split('_')[0]; // 2055


			// Extract date part: 06-02-2026 → 2026-02-06
			var parts = iti_id.split('_');
			if (parts.length < 2) return;

			var dmy = parts[1]; // 06-02-2026
			var dateParts = dmy.split('-');
			if (dateParts.length !== 3) return;

			var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-02-06

			var addonContainer = $(this);
			var spclContainer = $('#spcl_add_dynamic' + iti_id);

			// Prevent reloading if already done
			if (addonContainer.data('addons-loaded')) return;

			// ==================== LOAD HOTEL FACILITY ADD-ONS ====================
			if (addonsByDate[tour_date] && addonsByDate[tour_date].length > 0) {
				addonsByDate[tour_date].forEach(function(addon) {
					var seq = parseInt(addon.addon_sequence) || 1;
					if (seq > maxAddonSeq) maxAddonSeq = seq;

					var seq = parseInt(addon.addon_sequence) || 1;

					// rebuild addon_id
					var newAddonId = currentTourPlanId + '_' + dmy;

					// rebuild addon_idvalue
					var unique_id = newAddonId + '_' + seq;

					if (!unique_id || $('#rowaddon' + unique_id).length > 0) return;

					var html = '';
					html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Facility Name</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
					html += '</div>';

					var currentTourPlanId = iti_id.split('_')[0]; // eg: 2055
					var dmy = parts[1]; // 06-02-2026

					var newAddonId = currentTourPlanId + '_' + dmy;
					var unique_id = newAddonId + '_' + seq;
					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';



					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + newAddonId + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';

					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					addonContainer.append(html);
				});

				// Update total
				var total = 0;
				$('.addon_class' + iti_id).each(function() {
					total += parseFloat($(this).val()) || 0;
				});
				$('#fac_rate' + iti_id).val(total);
			}

			// ==================== LOAD SPECIAL EVENTS ====================
			if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && specialEventsByDate[tour_date]) {
				specialEventsByDate[tour_date].forEach(function(event) {
					var seq = parseInt(event.spcl_sequence) || 1;

					// rebuild special event IDs using CURRENT tour plan
					var newSpclId = currentTourPlanId + '_' + dmy;
					var unique_id = newSpclId + '_' + seq;

					if (!unique_id || $('#rowsp' + unique_id).length > 0) return;

					var seq = parseInt(event.spcl_sequence) || 1;

					var html = '';
					html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + newSpclId + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';

					html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Special Event Name</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';

					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					spclContainer.append(html);
				});
				spclContainer.data('spcl-loaded', true);
			}

			addonContainer.data('addons-loaded', true);
		});

		// Sync global counter
		if (maxAddonSeq > 0) {
			$('#total_addon_count').val(maxAddonSeq);
			if (typeof i !== 'undefined') {
				i = maxAddonSeq;
			} else {
				window.i = maxAddonSeq;
			}
		}
	});
</script> -->

<!-- <script type="text/javascript">
	$(document).ready(function() {

		var maxAddonSeq = 0;

		// We will collect all saved add-ons and special events by date
		var addonsByDate = {};
		var specialEventsByDate = {};

		// First, collect all saved data grouped by tour_date (YYYY-MM-DD)
		$.each(savedSightseeingData, function(tour_details_id, datesData) {
			$.each(datesData, function(tour_date, dayData) {
				if (!addonsByDate[tour_date]) {
					addonsByDate[tour_date] = [];
					specialEventsByDate[tour_date] = [];
				}

				if (dayData.json_addons && $.isArray(dayData.json_addons)) {
					addonsByDate[tour_date] = addonsByDate[tour_date].concat(dayData.json_addons);
				}
				if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
					specialEventsByDate[tour_date] = specialEventsByDate[tour_date].concat(dayData.json_special_event);
				}
			});
		});

		// Now process each visible day on the current page
		$('[id^="addon_add_dynamic"]').each(function() {
			var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2055_06-02-2026
			var iti_id = containerId.replace('addon_add_dynamic', ''); // 2055_06-02-2026
			var currentTourPlanId = iti_id.split('_')[0]; // 2055


			// Extract date part: 06-02-2026 → 2026-02-06
			var parts = iti_id.split('_');
			if (parts.length < 2) return;

			var dmy = parts[1]; // 06-02-2026
			var dateParts = dmy.split('-');
			if (dateParts.length !== 3) return;

			var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-02-06

			var addonContainer = $(this);
			var spclContainer = $('#spcl_add_dynamic' + iti_id);

			// Prevent reloading if already done
			if (addonContainer.data('addons-loaded')) return;

			// ==================== LOAD HOTEL FACILITY ADD-ONS ====================
			if (addonsByDate[tour_date] && addonsByDate[tour_date].length > 0) {
				addonsByDate[tour_date].forEach(function(addon) {
					var seq = parseInt(addon.addon_sequence) || 1;
					if (seq > maxAddonSeq) maxAddonSeq = seq;

					var seq = parseInt(addon.addon_sequence) || 1;

					// rebuild addon_id
					var newAddonId = currentTourPlanId + '_' + dmy;

					// rebuild addon_idvalue
					var unique_id = newAddonId + '_' + seq;

					if (!unique_id || $('#rowaddon' + unique_id).length > 0) return;

					var html = '';
					html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Facility Name</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
					html += '</div>';

					var currentTourPlanId = iti_id.split('_')[0]; // eg: 2055
					var dmy = parts[1]; // 06-02-2026

					var newAddonId = currentTourPlanId + '_' + dmy;
					var unique_id = newAddonId + '_' + seq;
					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';



					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + newAddonId + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';

					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					addonContainer.append(html);
				});

				// Update total
				var total = 0;
				$('.addon_class' + iti_id).each(function() {
					total += parseFloat($(this).val()) || 0;
				});
				$('#fac_rate' + iti_id).val(total);
			}

			// ==================== LOAD SPECIAL EVENTS ====================
			if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && specialEventsByDate[tour_date] && specialEventsByDate[tour_date].length > 0) {
				// FIXED: Deduplicate events by unique_id before processing
				var uniqueEvents = [];
				var processedIds = new Set();
				specialEventsByDate[tour_date].forEach(function(event) {
					var seq = parseInt(event.spcl_sequence) || 1;
					var newSpclId = currentTourPlanId + '_' + dmy;
					var unique_id = newSpclId + '_' + seq;

					// Skip if already processed (prevents duplicates across loads)
					if (processedIds.has(unique_id)) return;
					processedIds.add(unique_id);

					uniqueEvents.push({
						event: event,
						seq: seq,
						newSpclId: newSpclId,
						unique_id: unique_id
					});
				});

				uniqueEvents.forEach(function(item) {
					var event = item.event;
					var seq = item.seq;
					var newSpclId = item.newSpclId;
					var unique_id = item.unique_id;

					// Additional check: Skip if row already exists in DOM
					if ($('#rowsp' + unique_id).length > 0) return;

					var html = '';
					html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + newSpclId + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';

					html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Special Event Name</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';

					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					spclContainer.append(html);
				});
				spclContainer.data('spcl-loaded', true);
			}

			addonContainer.data('addons-loaded', true);
		});

		// Sync global counter
		if (maxAddonSeq > 0) {
			$('#total_addon_count').val(maxAddonSeq);
			if (typeof i !== 'undefined') {
				i = maxAddonSeq;
			} else {
				window.i = maxAddonSeq;
			}
		}
	});
</script> -->

<!-- <script type="text/javascript">
	$(document).ready(function() {

		var maxAddonSeq = 0;

		// We will collect all saved add-ons and special events by date
		var addonsByDate = {};
		var specialEventsByDate = {};

		// FIXED: Collect data properly - filter by tour_date match
		$.each(savedSightseeingData, function(tour_details_id, datesData) {
			$.each(datesData, function(tour_date, dayData) {
				if (!addonsByDate[tour_date]) {
					addonsByDate[tour_date] = [];
					specialEventsByDate[tour_date] = [];
				}

				// Add addons for this date
				if (dayData.json_addons && $.isArray(dayData.json_addons)) {
					addonsByDate[tour_date] = addonsByDate[tour_date].concat(dayData.json_addons);
				}

				// FIXED: Filter special events to only include those matching this tour_date
				if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
					dayData.json_special_event.forEach(function(event) {
						// Only add event if its tour_date matches the current date key
						if (event.tour_date === tour_date) {
							specialEventsByDate[tour_date].push(event);
						}
					});
				}
			});
		});

		// Now process each visible day on the current page
		$('[id^="addon_add_dynamic"]').each(function() {
			var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2055_06-02-2026
			var iti_id = containerId.replace('addon_add_dynamic', ''); // 2055_06-02-2026
			var currentTourPlanId = iti_id.split('_')[0]; // 2055

			// Extract date part: 06-02-2026 → 2026-02-06
			var parts = iti_id.split('_');
			if (parts.length < 2) return;

			var dmy = parts[1]; // 06-02-2026
			var dateParts = dmy.split('-');
			if (dateParts.length !== 3) return;

			var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-02-06

			var addonContainer = $(this);
			var spclContainer = $('#spcl_add_dynamic' + iti_id);

			// Prevent reloading if already done
			if (addonContainer.data('addons-loaded')) return;

			// ==================== LOAD HOTEL FACILITY ADD-ONS ====================
			if (addonsByDate[tour_date] && addonsByDate[tour_date].length > 0) {
				addonsByDate[tour_date].forEach(function(addon) {
					var seq = parseInt(addon.addon_sequence) || 1;
					if (seq > maxAddonSeq) maxAddonSeq = seq;

					// rebuild addon_id
					var newAddonId = currentTourPlanId + '_' + dmy;

					// rebuild addon_idvalue
					var unique_id = newAddonId + '_' + seq;

					if (!unique_id || $('#rowaddon' + unique_id).length > 0) return;

					var html = '';
					html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Facility Name</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + newAddonId + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					addonContainer.append(html);
				});

				// Update total
				var total = 0;
				$('.addon_class' + iti_id).each(function() {
					total += parseFloat($(this).val()) || 0;
				});
				$('#fac_rate' + iti_id).val(total);
			}

			// ==================== LOAD SPECIAL EVENTS ====================
			if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && specialEventsByDate[tour_date] && specialEventsByDate[tour_date].length > 0) {
				// FIXED: Build unique events map using unique_id as key to prevent duplicates
				var uniqueEventsMap = {};
				
				specialEventsByDate[tour_date].forEach(function(event) {
					var seq = parseInt(event.spcl_sequence) || 1;
					var newSpclId = currentTourPlanId + '_' + dmy;
					var unique_id = newSpclId + '_' + seq;

					// Store in map - this automatically handles duplicates
					// Only add if not already in map and not in DOM
					if (!uniqueEventsMap[unique_id] && $('#rowsp' + unique_id).length === 0) {
						uniqueEventsMap[unique_id] = {
							event: event,
							seq: seq,
							newSpclId: newSpclId,
							unique_id: unique_id
						};
					}
				});

				// Now render each unique event
				$.each(uniqueEventsMap, function(key, item) {
					var event = item.event;
					var seq = item.seq;
					var newSpclId = item.newSpclId;
					var unique_id = item.unique_id;

					var html = '';
					html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + newSpclId + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
					html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Special Event Name</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					spclContainer.append(html);
				});
				
				spclContainer.data('spcl-loaded', true);
			}

			addonContainer.data('addons-loaded', true);
		});

		// Sync global counter
		if (maxAddonSeq > 0) {
			$('#total_addon_count').val(maxAddonSeq);
			if (typeof i !== 'undefined') {
				i = maxAddonSeq;
			} else {
				window.i = maxAddonSeq;
			}
		}
	});
</script> -->

<!-- <script type="text/javascript">
	$(document).ready(function() {

		var maxAddonSeq = 0;

		// We will collect all saved add-ons and special events by date
		var addonsByDate = {};
		var specialEventsByDate = {};

		// FIXED: Collect data properly - filter by tour_date match and data_source
		$.each(savedSightseeingData, function(tour_details_id, datesData) {
			$.each(datesData, function(tour_date, dayData) {
				if (!addonsByDate[tour_date]) {
					addonsByDate[tour_date] = [];
					specialEventsByDate[tour_date] = [];
				}

				// Only process if data_source is "previous", skip if "saved"
				if (dayData.data_source !== 'previous') {
					return; // Skip this date if data_source is not "previous"
				}

				// Add addons for this date
				if (dayData.json_addons && $.isArray(dayData.json_addons)) {
					addonsByDate[tour_date] = addonsByDate[tour_date].concat(dayData.json_addons);
				}

				// FIXED: Filter special events to only include those matching this tour_date
				if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
					dayData.json_special_event.forEach(function(event) {
						// Only add event if its tour_date matches the current date key
						if (event.tour_date === tour_date) {
							specialEventsByDate[tour_date].push(event);
						}
					});
				}
			});
		});

		// Now process each visible day on the current page
		$('[id^="addon_add_dynamic"]').each(function() {
			var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2055_06-02-2026
			var iti_id = containerId.replace('addon_add_dynamic', ''); // 2055_06-02-2026
			var currentTourPlanId = iti_id.split('_')[0]; // 2055

			// Extract date part: 06-02-2026 → 2026-02-06
			var parts = iti_id.split('_');
			if (parts.length < 2) return;

			var dmy = parts[1]; // 06-02-2026
			var dateParts = dmy.split('-');
			if (dateParts.length !== 3) return;

			var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-02-06

			var addonContainer = $(this);
			var spclContainer = $('#spcl_add_dynamic' + iti_id);

			// Prevent reloading if already done
			if (addonContainer.data('addons-loaded')) return;

			// ==================== LOAD HOTEL FACILITY ADD-ONS ====================
			if (addonsByDate[tour_date] && addonsByDate[tour_date].length > 0) {
				addonsByDate[tour_date].forEach(function(addon) {
					var seq = parseInt(addon.addon_sequence) || 1;
					if (seq > maxAddonSeq) maxAddonSeq = seq;

					// rebuild addon_id
					var newAddonId = currentTourPlanId + '_' + dmy;

					// rebuild addon_idvalue
					var unique_id = newAddonId + '_' + seq;

					if (!unique_id || $('#rowaddon' + unique_id).length > 0) return;

					var html = '';
					html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Facility Name</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + newAddonId + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					addonContainer.append(html);
				});

				// Update total
				var total = 0;
				$('.addon_class' + iti_id).each(function() {
					total += parseFloat($(this).val()) || 0;
				});
				$('#fac_rate' + iti_id).val(total);
			}

			// ==================== LOAD SPECIAL EVENTS ====================
			if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && specialEventsByDate[tour_date] && specialEventsByDate[tour_date].length > 0) {
				// FIXED: Build unique events map using unique_id as key to prevent duplicates
				var uniqueEventsMap = {};
				
				specialEventsByDate[tour_date].forEach(function(event) {
					var seq = parseInt(event.spcl_sequence) || 1;
					var newSpclId = currentTourPlanId + '_' + dmy;
					var unique_id = newSpclId + '_' + seq;

					// Store in map - this automatically handles duplicates
					// Only add if not already in map and not in DOM
					if (!uniqueEventsMap[unique_id] && $('#rowsp' + unique_id).length === 0) {
						uniqueEventsMap[unique_id] = {
							event: event,
							seq: seq,
							newSpclId: newSpclId,
							unique_id: unique_id
						};
					}
				});

				// Now render each unique event
				$.each(uniqueEventsMap, function(key, item) {
					var event = item.event;
					var seq = item.seq;
					var newSpclId = item.newSpclId;
					var unique_id = item.unique_id;

					var html = '';
					html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + newSpclId + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
					html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Special Event Name</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					spclContainer.append(html);
				});
				
				spclContainer.data('spcl-loaded', true);
			}

			addonContainer.data('addons-loaded', true);
		});

		// Sync global counter
		if (maxAddonSeq > 0) {
			$('#total_addon_count').val(maxAddonSeq);
			if (typeof i !== 'undefined') {
				i = maxAddonSeq;
			} else {
				window.i = maxAddonSeq;
			}
		}
	});
</script> -->

<!-- <script type="text/javascript">
	$(document).ready(function() {

		var maxAddonSeq = 0;

		// We will collect all saved add-ons and special events by date
		var addonsByDate = {};
		var specialEventsByDate = {};

		// FIXED: Collect data properly - filter by tour_date match and data_source
		$.each(savedSightseeingData, function(tour_details_id, datesData) {
			$.each(datesData, function(tour_date, dayData) {
				if (!addonsByDate[tour_date]) {
					addonsByDate[tour_date] = [];
					specialEventsByDate[tour_date] = [];
				}

				// Only process if data_source is "previous", skip if "saved"
				if (dayData.data_source !== 'previous') {
					return; // Skip this date if data_source is not "previous"
				}

				// FIXED: Filter addons to only include those matching this tour_date
				if (dayData.json_addons && $.isArray(dayData.json_addons)) {
					dayData.json_addons.forEach(function(addon) {
						// Only add addon if its tour_date matches the current date key
						if (addon.tour_date === tour_date) {
							addonsByDate[tour_date].push(addon);
						}
					});
				}

				// FIXED: Filter special events to only include those matching this tour_date
				if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
					dayData.json_special_event.forEach(function(event) {
						// Only add event if its tour_date matches the current date key
						if (event.tour_date === tour_date) {
							specialEventsByDate[tour_date].push(event);
						}
					});
				}
			});
		});

		// Now process each visible day on the current page
		$('[id^="addon_add_dynamic"]').each(function() {
			var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2055_06-02-2026
			var iti_id = containerId.replace('addon_add_dynamic', ''); // 2055_06-02-2026
			var currentTourPlanId = iti_id.split('_')[0]; // 2055

			// Extract date part: 06-02-2026 → 2026-02-06
			var parts = iti_id.split('_');
			if (parts.length < 2) return;

			var dmy = parts[1]; // 06-02-2026
			var dateParts = dmy.split('-');
			if (dateParts.length !== 3) return;

			var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-02-06

			var addonContainer = $(this);
			var spclContainer = $('#spcl_add_dynamic' + iti_id);

			// Prevent reloading if already done
			if (addonContainer.data('addons-loaded')) return;

			// ==================== LOAD HOTEL FACILITY ADD-ONS ====================
			if (addonsByDate[tour_date] && addonsByDate[tour_date].length > 0) {
				addonsByDate[tour_date].forEach(function(addon) {
					var seq = parseInt(addon.addon_sequence) || 1;
					if (seq > maxAddonSeq) maxAddonSeq = seq;

					// rebuild addon_id
					var newAddonId = currentTourPlanId + '_' + dmy;

					// rebuild addon_idvalue
					var unique_id = newAddonId + '_' + seq;

					if (!unique_id || $('#rowaddon' + unique_id).length > 0) return;

					var html = '';
					html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Facility Name</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_event]" value="' + addon.addon_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="addon_additi[' + seq + '][addon_tariff]" value="' + addon.addon_tariff + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_id]" value="' + newAddonId + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][addon_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="addon_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					addonContainer.append(html);
				});

				// Update total
				var total = 0;
				$('.addon_class' + iti_id).each(function() {
					total += parseFloat($(this).val()) || 0;
				});
				$('#fac_rate' + iti_id).val(total);
			}

			// ==================== LOAD SPECIAL EVENTS ====================
			if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && specialEventsByDate[tour_date] && specialEventsByDate[tour_date].length > 0) {
				// FIXED: Build unique events map using unique_id as key to prevent duplicates
				var uniqueEventsMap = {};
				
				specialEventsByDate[tour_date].forEach(function(event) {
					var seq = parseInt(event.spcl_sequence) || 1;
					var newSpclId = currentTourPlanId + '_' + dmy;
					var unique_id = newSpclId + '_' + seq;

					// Store in map - this automatically handles duplicates
					// Only add if not already in map and not in DOM
					if (!uniqueEventsMap[unique_id] && $('#rowsp' + unique_id).length === 0) {
						uniqueEventsMap[unique_id] = {
							event: event,
							seq: seq,
							newSpclId: newSpclId,
							unique_id: unique_id
						};
					}
				});

				// Now render each unique event
				$.each(uniqueEventsMap, function(key, item) {
					var event = item.event;
					var seq = item.seq;
					var newSpclId = item.newSpclId;
					var unique_id = item.unique_id;

					var html = '';
					html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
					html += '<div class="row mt-2">';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_id]" value="' + newSpclId + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_sequence]" value="' + seq + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][spcl_idvalue]" value="' + unique_id + '">';
					html += '<input type="hidden" name="spcl_additi[' + seq + '][tour_date]" value="' + tour_date + '">';
					html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2">';
					html += '<div class="teams-rank"><b>Special Event Name</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_event]" value="' + event.spcl_event + '" class="form-control input-sm" maxlength="50" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1">';
					html += '<div class="teams-rank"><b>Tariff</b></div>';
					html += '<input type="text" name="spcl_additi[' + seq + '][spcl_tariff]" value="' + event.spcl_tariff + '" class="form-control input-sm" maxlength="7" readonly>';
					html += '</div>';

					html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
					html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
					html += '</div>';

					html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
					html += '</div></div>';

					spclContainer.append(html);
				});
				
				spclContainer.data('spcl-loaded', true);
			}

			addonContainer.data('addons-loaded', true);
		});

		// Sync global counter
		if (maxAddonSeq > 0) {
			$('#total_addon_count').val(maxAddonSeq);
			if (typeof i !== 'undefined') {
				i = maxAddonSeq;
			} else {
				window.i = maxAddonSeq;
			}
		}
	});
</script> -->

<!-- <script type="text/javascript">
$(document).ready(function() {

    var maxAddonSeq = 0;

    // FIXED: Group by tour_details_id + tour_date to prevent cross-contamination
    var addonsByTourAndDate = {};
    var specialEventsByTourAndDate = {};

    // Collect data with composite keys
    $.each(savedSightseeingData, function(tour_details_id, datesData) {
        $.each(datesData, function(tour_date, dayData) {
            // FIXED: Process BOTH "saved" and "previous" data sources
            // Only skip if explicitly marked as NOT saved (is_saved: false)
            if (!dayData.is_saved) {
                console.log('Skipping non-saved data for tour_details_id:', tour_details_id, 'tour_date:', tour_date);
                return;
            }

            console.log('Processing data for tour_details_id:', tour_details_id, 'tour_date:', tour_date, 'source:', dayData.data_source);

            // FIXED: Group addons by their OWN tour_date (not the dayData's tour_date)
            // This ensures addons appear in the correct date's container
            if (dayData.json_addons && $.isArray(dayData.json_addons)) {
                console.log('Found', dayData.json_addons.length, 'addons in dayData for', tour_date);
                dayData.json_addons.forEach(function(addon) {
                    // CRITICAL FIX: Use addon's own tour_date for grouping
                    var addonCompositeKey = tour_details_id + '_' + addon.tour_date;
                    if (!addonsByTourAndDate[addonCompositeKey]) {
                        addonsByTourAndDate[addonCompositeKey] = [];
                    }
                    addonsByTourAndDate[addonCompositeKey].push(addon);
                    console.log('Added addon:', addon.addon_event, 'to key:', addonCompositeKey, '(addon date:', addon.tour_date, ')');
                });
            }

            // FIXED: Group special events by their OWN tour_date (not the dayData's tour_date)
            // This ensures events appear in the correct date's container
            if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
                console.log('Found', dayData.json_special_event.length, 'special events in dayData for', tour_date);
                dayData.json_special_event.forEach(function(event) {
                    // CRITICAL FIX: Use event's own tour_date for grouping
                    var eventCompositeKey = tour_details_id + '_' + event.tour_date;
                    if (!specialEventsByTourAndDate[eventCompositeKey]) {
                        specialEventsByTourAndDate[eventCompositeKey] = [];
                    }
                    specialEventsByTourAndDate[eventCompositeKey].push(event);
                    console.log('Added event:', event.spcl_event, 'to key:', eventCompositeKey, '(event date:', event.tour_date, ')');
                });
            }
        });
    });

    console.log('Final addonsByTourAndDate:', addonsByTourAndDate);
    console.log('Final specialEventsByTourAndDate:', specialEventsByTourAndDate);

    // Process each visible day on the current page
    $('[id^="addon_add_dynamic"]').each(function() {
        var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2126_10-01-2026
        var iti_id = containerId.replace('addon_add_dynamic', ''); // 2126_10-01-2026
        var currentTourPlanId = iti_id.split('_')[0]; // 2126

        // Extract date: 10-01-2026 → 2026-01-10
        var parts = iti_id.split('_');
        if (parts.length < 2) return;

        var dmy = parts[1]; // 10-01-2026
        var dateParts = dmy.split('-');
        if (dateParts.length !== 3) return;

        var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-01-10

        var addonContainer = $(this);
        var spclContainer = $('#spcl_add_dynamic' + iti_id);

        // Prevent reloading if already done
        if (addonContainer.data('addons-loaded')) {
            console.log('Addons already loaded for', iti_id);
            return;
        }

        // FIXED: Use composite key for lookup (now correctly grouped by addon's tour_date)
        var compositeKey = currentTourPlanId + '_' + tour_date;
        console.log('Looking up data for composite key:', compositeKey);

        // ==================== LOAD HOTEL FACILITY ADD-ONS ====================
        if (addonsByTourAndDate[compositeKey] && addonsByTourAndDate[compositeKey].length > 0) {
            console.log('Loading', addonsByTourAndDate[compositeKey].length, 'addons for', compositeKey);
            
            addonsByTourAndDate[compositeKey].forEach(function(addon) {
                console.log('Processing addon:', addon);
                
                var seq = parseInt(addon.addon_sequence) || 1;
                if (seq > maxAddonSeq) maxAddonSeq = seq;

                // FIXED: Since grouped by addon's tour_date, it matches current tour_date
                // But keep using addon's date for consistency in ID generation
                var addonDate_dmy = addon.tour_date.split('-').reverse().join('-'); // 2026-01-10 → 10-01-2026
                var newAddonId = currentTourPlanId + '_' + addonDate_dmy;
                var unique_id = addon.addon_idvalue || (newAddonId + '_' + seq);

                console.log('Addon unique_id:', unique_id, 'for date:', addon.tour_date);

                // Skip if already exists
                if ($('#rowaddon' + unique_id).length > 0) {
                    console.log('Addon row already exists:', unique_id);
                    return;
                }

                // FIXED: Use unique_id as array key (not seq)
                var html = '';
                html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
                html += '<div class="row mt-2">';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<div class="teams-rank"><b>Facility Name</b></div>';
                html += '<input type="text" name="addon_additi[' + unique_id + '][addon_event]" value="' + (addon.addon_event || '') + '" class="form-control input-sm" maxlength="50" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                html += '<div class="teams-rank"><b>Tariff</b></div>';
                html += '<input type="text" name="addon_additi[' + unique_id + '][addon_tariff]" value="' + (addon.addon_tariff || '') + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
                html += '</div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][addon_id]" value="' + (addon.addon_id || newAddonId) + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][addon_sequence]" value="' + seq + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][addon_idvalue]" value="' + unique_id + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][tour_date]" value="' + addon.tour_date + '">';
                html += '</div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                html += '</div></div>';

                addonContainer.append(html);
                console.log('Appended addon row:', unique_id, 'to container for', iti_id);
            });

            // Update total
            var total = 0;
            $('.addon_class' + iti_id).each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            $('#fac_rate' + iti_id).val(total);
            console.log('Updated total for', iti_id, ':', total);
        } else {
            console.log('No addons found for', compositeKey);
        }

        // ==================== LOAD SPECIAL EVENTS ====================
        if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && 
            specialEventsByTourAndDate[compositeKey] && specialEventsByTourAndDate[compositeKey].length > 0) {
            
            console.log('Loading', specialEventsByTourAndDate[compositeKey].length, 'special events for', compositeKey);
            
            var uniqueEventsMap = {};
            
            specialEventsByTourAndDate[compositeKey].forEach(function(event) {
                console.log('Processing special event:', event);
                
                var seq = parseInt(event.spcl_sequence) || 1;
                
                // FIXED: Since grouped by event's tour_date, it matches current tour_date
                // But keep using event's date for consistency in ID generation
                var eventDate_dmy = event.tour_date.split('-').reverse().join('-');
                var newSpclId = currentTourPlanId + '_' + eventDate_dmy;
                var unique_id = event.spcl_idvalue || (newSpclId + '_' + seq);

                console.log('Event unique_id:', unique_id, 'for date:', event.tour_date);

                // Store in map to prevent duplicates
                if (!uniqueEventsMap[unique_id] && $('#rowsp' + unique_id).length === 0) {
                    uniqueEventsMap[unique_id] = {
                        event: event,
                        seq: seq,
                        newSpclId: event.spcl_id || newSpclId,
                        unique_id: unique_id
                    };
                }
            });

            console.log('Unique events map:', uniqueEventsMap);

            // Render each unique event
            $.each(uniqueEventsMap, function(key, item) {
                var event = item.event;
                var seq = item.seq;
                var newSpclId = item.newSpclId;
                var unique_id = item.unique_id;

                var html = '';
                html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
                html += '<div class="row mt-2">';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_id]" value="' + newSpclId + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_sequence]" value="' + seq + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_idvalue]" value="' + unique_id + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][tour_date]" value="' + event.tour_date + '">';
                html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<div class="teams-rank"><b>Special Event Name</b></div>';
                html += '<input type="text" name="spcl_additi[' + unique_id + '][spcl_event]" value="' + (event.spcl_event || '') + '" class="form-control input-sm" maxlength="50" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                html += '<div class="teams-rank"><b>Tariff</b></div>';
                html += '<input type="text" name="spcl_additi[' + unique_id + '][spcl_tariff]" value="' + (event.spcl_tariff || '') + '" class="form-control input-sm" maxlength="7" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
                html += '</div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                html += '</div></div>';

                spclContainer.append(html);
                console.log('Appended special event row:', unique_id, 'to container for', iti_id);
            });
            
            spclContainer.data('spcl-loaded', true);
        } else {
            console.log('No special events found for', compositeKey, 'or already loaded');
        }

        addonContainer.data('addons-loaded', true);
    });

    // Sync global counter
    if (maxAddonSeq > 0) {
        $('#total_addon_count').val(maxAddonSeq);
        if (typeof i !== 'undefined') {
            i = maxAddonSeq;
        } else {
            window.i = maxAddonSeq;
        }
    }
    
    console.log('Addon loading complete. Max sequence:', maxAddonSeq);
});
</script> -->

<!-- SCRIPT 2: Add special events dynamically (user clicks) -->
<!-- <script type="text/javascript">
$(document).ready(function () {

    var globalSpclCounter = 0;

    // ---------- ADD SPECIAL EVENT ----------
    $(document).on('click', '.add_spcl', function () {

        var $btn = $(this);

        var id_t      = $btn.attr('data-id');   // e.g. 2479_10-01-2026
        var tour_date = $btn.attr('data-std');
        var old_id    = $btn.attr('data-oid');
        var seqAttr   = $btn.attr('data-sequence');

        if (!id_t) return;

        // Decide sequence
        var seq;
        if (seqAttr !== undefined && seqAttr !== '') {
            seq = parseInt(seqAttr, 10);
            if (seq > globalSpclCounter) globalSpclCounter = seq;
        } else {
            globalSpclCounter++;
            seq = globalSpclCounter;
        }

        var unique_id = id_t + '_' + seq;

        // Duplicate prevention
        if ($('#rowsp' + unique_id).length > 0) {
            console.log('Special event already exists:', unique_id);
            return;
        }

        // CRITICAL FIX: Use unique_id as array key (not seq)
        var html = '';
        html += '<div id="rowsp' + unique_id + '" class="dynamic-added card" data-index="' + id_t + '">';
        html += '<div class="row mt-2">';

        html += '<div class="col-xl-2 col-sm-12 col-md-2">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_id]" value="' + id_t + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_sequence]" value="' + seq + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_idvalue]" value="' + unique_id + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][tour_date]" value="' + tour_date + '">';
        html += '</div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2">';
        html += '<div class="teams-rank"><b>Special Event Name</b></div>';
        html += '<input type="text" id="spcl_event' + unique_id + '" ';
        html += 'name="spcl_additi[' + unique_id + '][spcl_event]" ';
        html += 'class="form-control input-sm" maxlength="50">';
        html += '</div>';

        html += '<div class="col-xl-1 col-sm-12 col-md-1">';
        html += '<div class="teams-rank"><b>Tariff</b></div>';
        html += '<input type="text" id="spcl_tariff' + unique_id + '" ';
        html += 'name="spcl_additi[' + unique_id + '][spcl_tariff]" ';
        html += 'class="form-control input-sm" maxlength="7">';
        html += '</div>';

        html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
        html += '<button type="button" id="' + unique_id + '" ';
        html += 'data-nid="' + id_t + '" ';
        html += 'class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
        html += '</div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

        html += '</div></div>';

        $('#spcl_add_dynamic' + id_t).append(html);
    });

    // ---------- REMOVE SPECIAL EVENT ----------
    $(document).on('click', '.btn_spcl_remove', function () {
        var unique_id = $(this).attr('id');
        $('#rowsp' + unique_id).remove();

        // Recalc totals if needed
        $('input[id^="spcl_tariff"]').each(function () {
            var vid = $(this).attr('id').replace('spcl_tariff', '');
            setTimeout(() => calculateGrandTotal(vid), 200);
        });
    });

    // ---------- PRELOAD SAVED SPECIAL EVENTS ----------
    const d_spcl_events = <?php echo json_encode($d_spcl_events); ?>;

    if (Array.isArray(d_spcl_events) && d_spcl_events.length > 0) {
        setTimeout(() => {
            $.each(d_spcl_events, function (index, item) {

                const selector =
                    '.add_spcl' +
                    '[data-id="' + item.spcl_id + '"]' +
                    '[data-std="' + item.tour_date + '"]';

                const $btn = $(selector);
                if (!$btn.length) return;

                var unique_id = item.spcl_idvalue;

                // Mark sequence and trigger click
                $btn.attr('data-sequence', item.spcl_sequence);
                $btn.trigger('click');
                $btn.removeAttr('data-sequence');

                // Populate values
                $('#spcl_event' + unique_id).val(item.spcl_event);
                $('#spcl_tariff' + unique_id).val(item.spcl_tariff);

                // Sync counter
                if (item.spcl_sequence > globalSpclCounter) {
                    globalSpclCounter = item.spcl_sequence;
                }
            });
        }, 500);
    }
});
</script> -->

<!-- SCRIPT 3: Add/remove hotel facility addons dynamically -->
<!-- <script>
$(document).ready(function() {
    // Initialize global counter from hidden field if present
    var globalCounter = parseInt($('#total_addon_count').val(), 10) || 0;

    var iti_edit_id = <?php echo isset($iti_edit_id) && $iti_edit_id !== '' ? $iti_edit_id : 0; ?>;
    var read_only = iti_edit_id == 1 ? "readonly" : "";
    var dis_abled = iti_edit_id == 1 ? 'style="pointer-events: none; background-color: #eee;"' : "";

    // Helper to sum tariffs for a given base id_t (eg '2479_10-01-2026')
    function updateFacRateFor(id_t) {
        var total = 0;
        $('.addon_class' + id_t).each(function() {
            total += parseFloat($(this).val()) || 0;
        });
        $('#fac_rate' + id_t).val(total);
    }

    // Add / prefill handler
    $('.hotel_fac_change_new').on('change', function() {
        var addonTotal = 0;
        var $btn = $(this);

        var sequenceAttr = $btn.attr('data-sequence');
        var id_t = $btn.attr('data-id');        // e.g. 2479_10-01-2026
        var tour_date = $btn.attr('data-std');  // e.g. 2026-01-10
        if (!id_t) return;

        var seq;
        if (sequenceAttr !== undefined && sequenceAttr !== '') {
            seq = parseInt(sequenceAttr, 10);
            if (seq > globalCounter) globalCounter = seq;
        } else {
            globalCounter++;
            seq = globalCounter;
        }

        // Persist counter
        $('#total_addon_count').val(globalCounter);

        var unique_id = id_t + '_' + seq; // Stable unique id

        // Duplicate prevention
        if ($('#rowaddon' + unique_id).length > 0) {
            console.log('Addon already exists, skipping insert:', unique_id);
        } else {
            // CRITICAL FIX: Use unique_id as array key (not seq)
            var html = '';
            html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card" data-index="' + id_t + '">';
            html += '<div class="row mt-2">';

            html += '<div class="col-xl-2 col-sm-12 col-md-2">';
            html += '<div class="teams-rank"><b>Facility Name</b></div>';
            html += '<input type="text" id="addon_event' + unique_id + '" data-id="' + unique_id + '" name="addon_additi[' + unique_id + '][addon_event]" value="" class="form-control input-sm" maxlength="50" ' + read_only + '>';
            html += '</div>';

            html += '<div class="col-xl-1 col-sm-12 col-md-1">';
            html += '<div class="teams-rank"><b>Tariff</b></div>';
            html += '<input type="text" id="addon_tariff' + unique_id + '" data-id="' + unique_id + '" name="addon_additi[' + unique_id + '][addon_tariff]" value="" class="form-control input-sm addon_class' + id_t + '" maxlength="7">';
            html += '</div>';

            html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
            html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + id_t + '" data-nid="' + id_t + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
            html += '</div>';

            html += '<div class="col-xl-2 col-sm-12 col-md-2">';
            html += '<input type="hidden" id="addon_id' + unique_id + '" name="addon_additi[' + unique_id + '][addon_id]" value="' + id_t + '">';
            html += '<input type="hidden" id="addon_sequence' + unique_id + '" name="addon_additi[' + unique_id + '][addon_sequence]" value="' + seq + '">';
            html += '<input type="hidden" id="addon_idvalue' + unique_id + '" name="addon_additi[' + unique_id + '][addon_idvalue]" value="' + unique_id + '">';
            html += '<input type="hidden" id="tour_date' + unique_id + '" name="addon_additi[' + unique_id + '][tour_date]" value="' + tour_date + '">';
            html += '</div>';

            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

            html += '</div></div>';

            $('#addon_add_dynamic' + id_t).append(html);
        }

        // Fetch tariff and populate
        var facility_id = $btn.val();
        if (facility_id > 0) {
            $.ajax({
                url: "<?= site_url('Enquiry/getHotelFaciliyTariffNew'); ?>",
                method: "POST",
                data: { facility_id: facility_id },
                dataType: 'json',
                success: function(data) {
                    $('#addon_event' + unique_id).val(data && data[0] ? data[0].facility_name : '');
                    $('#addon_tariff' + unique_id).val(data && data[0] ? data[0].tariff : '');
                    updateFacRateFor(id_t);
                },
                error: function(xhr, status, error) {
                    console.error("Tariff fetch error:", error);
                    updateFacRateFor(id_t);
                }
            });
        } else {
            updateFacRateFor(id_t);
        }
    });

    // Remove handler
    $(document).on('click', '.btn_addon_remove', function() {
        var button_id = $(this).attr("id");
        var id_t = $(this).attr('data-nid');
        if (!button_id) return;

        $('#rowaddon' + button_id).remove();

        if (id_t) updateFacRateFor(id_t);
    });

    // When any tariff input changes, update the day's rate
    $(document).on('input', 'input[id^="addon_tariff"]', function() {
        var fullId = this.id.replace('addon_tariff', '');
        var lastUnd = fullId.lastIndexOf('_');
        var id_t = lastUnd > 0 ? fullId.substring(0, lastUnd) : fullId;
        updateFacRateFor(id_t);
    });

    // Sync initial counter
    (function syncInitialCounter() {
        var maxSeen = 0;
        $('input[name$="[addon_sequence]"]').each(function() {
            var v = parseInt($(this).val(), 10) || 0;
            if (v > maxSeen) maxSeen = v;
        });
        if (maxSeen > globalCounter) {
            globalCounter = maxSeen;
            $('#total_addon_count').val(globalCounter);
        }
    })();

});
</script> -->



<script type="text/javascript">
$(document).ready(function() {

    var maxAddonSeq = 0;

    // FIXED: Group by tour_details_id + tour_date to prevent cross-contamination
    var addonsByTourAndDate = {};
    var specialEventsByTourAndDate = {};
    var sightseeingByTourAndDate = {};

    // Collect data with composite keys
    $.each(savedSightseeingData, function(tour_details_id, datesData) {
        $.each(datesData, function(tour_date, dayData) {
            // FIXED: Process BOTH "saved" and "previous" data sources
            // Only skip if explicitly marked as NOT saved (is_saved: false)
            if (!dayData.is_saved) {
                console.log('Skipping non-saved data for tour_details_id:', tour_details_id, 'tour_date:', tour_date);
                return;
            }

            console.log('Processing data for tour_details_id:', tour_details_id, 'tour_date:', tour_date, 'source:', dayData.data_source, 'location_id:', dayData.location_id, 'hotel_id:', dayData.hotel_id);

            // FIXED: Group addons by their OWN tour_date (not the dayData's tour_date)
            // This ensures addons appear in the correct date's container
            // Filter by location_id and hotel_id match
            if (dayData.json_addons && $.isArray(dayData.json_addons)) {
                console.log('Found', dayData.json_addons.length, 'addons in dayData for', tour_date);
                dayData.json_addons.forEach(function(addon) {
                    // CRITICAL FIX: Use addon's own tour_date for grouping
                    // Only include if location_id and hotel_id match the dayData's
                    if (addon.location_id == dayData.location_id && addon.hotel_id == dayData.hotel_id) {
                        var addonCompositeKey = tour_details_id + '_' + addon.tour_date;
                        if (!addonsByTourAndDate[addonCompositeKey]) {
                            addonsByTourAndDate[addonCompositeKey] = [];
                        }
                        addonsByTourAndDate[addonCompositeKey].push(addon);
                        console.log('Added addon:', addon.addon_event, 'to key:', addonCompositeKey, '(addon date:', addon.tour_date, ')');
                    } else {
                        console.log('Skipping addon due to location/hotel mismatch:', addon.addon_event, 'addon loc:', addon.location_id, 'day loc:', dayData.location_id);
                    }
                });
            }

            // FIXED: Group special events by their OWN tour_date (not the dayData's tour_date)
            // This ensures events appear in the correct date's container
            // Filter by location_id and hotel_id match
            if (dayData.json_special_event && $.isArray(dayData.json_special_event)) {
                console.log('Found', dayData.json_special_event.length, 'special events in dayData for', tour_date);
                dayData.json_special_event.forEach(function(event) {
                    // CRITICAL FIX: Use event's own tour_date for grouping
                    // Only include if location_id and hotel_id match the dayData's
                    if (event.location_id == dayData.location_id && event.hotel_id == dayData.hotel_id) {
                        var eventCompositeKey = tour_details_id + '_' + event.tour_date;
                        if (!specialEventsByTourAndDate[eventCompositeKey]) {
                            specialEventsByTourAndDate[eventCompositeKey] = [];
                        }
                        specialEventsByTourAndDate[eventCompositeKey].push(event);
                        console.log('Added event:', event.spcl_event, 'to key:', eventCompositeKey, '(event date:', event.tour_date, ')');
                    } else {
                        console.log('Skipping event due to location/hotel mismatch:', event.spcl_event, 'event loc:', event.location_id, 'day loc:', dayData.location_id);
                    }
                });
            }

            // Handle sightseeing loading based on location_id and hotel_id
            // Assuming sightseeing items are for this dayData's date, but filter if they have individual dates/loc/hotel
            if (dayData.saved_ss_ids && dayData.sightseeing && $.isArray(dayData.sightseeing)) {
                console.log('Found', dayData.saved_ss_ids.length, 'saved sightseeing IDs for', tour_date);
                // Group by tour_date (dayData's date, assuming no per-item date)
                var ssCompositeKey = tour_details_id + '_' + tour_date;
                if (!sightseeingByTourAndDate[ssCompositeKey]) {
                    sightseeingByTourAndDate[ssCompositeKey] = {
                        saved_ss_ids: dayData.saved_ss_ids,
                        sightseeing: dayData.sightseeing.filter(function(ss_item) {
                            // Filter sightseeing items by location_id and hotel_id if present
                            return (!ss_item.location_id || ss_item.location_id == dayData.location_id) &&
                                   (!ss_item.hotel_id || ss_item.hotel_id == dayData.hotel_id);
                        }),
                        location_id: dayData.location_id,
                        hotel_id: dayData.hotel_id,
                        ss_pax_cost: dayData.ss_pax_cost || 0,
                        ss_total_cost: dayData.ss_total_cost || 0,
                        ss_total_distance: dayData.ss_total_distance || 0
                    };
                }
                console.log('Added sightseeing data to key:', ssCompositeKey, 'filtered items:', sightseeingByTourAndDate[ssCompositeKey].sightseeing.length);
            }
        });
    });

    console.log('Final addonsByTourAndDate:', addonsByTourAndDate);
    console.log('Final specialEventsByTourAndDate:', specialEventsByTourAndDate);
    console.log('Final sightseeingByTourAndDate:', sightseeingByTourAndDate);

    // Process each visible day on the current page
    $('[id^="addon_add_dynamic"]').each(function() {
        var containerId = $(this).attr('id'); // e.g., addon_add_dynamic2179_10-01-2026
        var iti_id = containerId.replace('addon_add_dynamic', ''); // 2179_10-01-2026
        var currentTourPlanId = iti_id.split('_')[0]; // 2179

        // Extract date: 10-01-2026 → 2026-01-10
        var parts = iti_id.split('_');
        if (parts.length < 2) return;

        var dmy = parts[1]; // 10-01-2026
        var dateParts = dmy.split('-');
        if (dateParts.length !== 3) return;

        var tour_date = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // 2026-01-10

        var addonContainer = $(this);
        var spclContainer = $('#spcl_add_dynamic' + iti_id);
        // Assuming sightseeing container exists with similar naming
        var ssContainer = $('#sightseeing_add_dynamic' + iti_id);

        // Prevent reloading if already done
        if (addonContainer.data('addons-loaded')) {
            console.log('Addons already loaded for', iti_id);
            return;
        }

        // FIXED: Use composite key for lookup (now correctly grouped by item's tour_date)
        var compositeKey = currentTourPlanId + '_' + tour_date;
        console.log('Looking up data for composite key:', compositeKey);

        // ==================== LOAD HOTEL FACILITY ADD-ONS ====================
        if (addonsByTourAndDate[compositeKey] && addonsByTourAndDate[compositeKey].length > 0) {
            console.log('Loading', addonsByTourAndDate[compositeKey].length, 'addons for', compositeKey);
            
            addonsByTourAndDate[compositeKey].forEach(function(addon) {
                console.log('Processing addon:', addon);
                
                var seq = parseInt(addon.addon_sequence) || 1;
                if (seq > maxAddonSeq) maxAddonSeq = seq;

                var addonDate_dmy = addon.tour_date.split('-').reverse().join('-');
                var newAddonId = currentTourPlanId + '_' + addonDate_dmy;
                var unique_id = addon.addon_idvalue || (newAddonId + '_' + seq);

                console.log('Addon unique_id:', unique_id, 'for date:', addon.tour_date);

                // Skip if already exists
                if ($('#rowaddon' + unique_id).length > 0) {
                    console.log('Addon row already exists:', unique_id);
                    return;
                }

                var html = '';
                html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card">';
                html += '<div class="row mt-2">';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<div class="teams-rank"><b>Facility Name</b></div>';
                html += '<input type="text" name="addon_additi[' + unique_id + '][addon_event]" value="' + (addon.addon_event || '') + '" class="form-control input-sm" maxlength="50" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                html += '<div class="teams-rank"><b>Tariff</b></div>';
                html += '<input type="text" name="addon_additi[' + unique_id + '][addon_tariff]" value="' + (addon.addon_tariff || '') + '" class="form-control input-sm addon_class' + iti_id + '" maxlength="7" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                html += '<button type="button" id="' + unique_id + '" data-oid="' + newAddonId + '" data-nid="' + iti_id + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
                html += '</div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][addon_id]" value="' + (addon.addon_id || newAddonId) + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][addon_sequence]" value="' + seq + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][addon_idvalue]" value="' + unique_id + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][tour_date]" value="' + addon.tour_date + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][location_id]" value="' + (addon.location_id || '') + '">';
                html += '<input type="hidden" name="addon_additi[' + unique_id + '][hotel_id]" value="' + (addon.hotel_id || '') + '">';
                html += '</div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                html += '</div></div>';

                addonContainer.append(html);
                console.log('Appended addon row:', unique_id, 'to container for', iti_id);
            });

            // Update total
            var total = 0;
            $('.addon_class' + iti_id).each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            $('#fac_rate' + iti_id).val(total);
            console.log('Updated total for', iti_id, ':', total);
        } else {
            console.log('No addons found for', compositeKey);
        }

        // ==================== LOAD SPECIAL EVENTS ====================
        if (spclContainer.length > 0 && !spclContainer.data('spcl-loaded') && 
            specialEventsByTourAndDate[compositeKey] && specialEventsByTourAndDate[compositeKey].length > 0) {
            
            console.log('Loading', specialEventsByTourAndDate[compositeKey].length, 'special events for', compositeKey);
            
            var uniqueEventsMap = {};
            
            specialEventsByTourAndDate[compositeKey].forEach(function(event) {
                console.log('Processing special event:', event);
                
                var seq = parseInt(event.spcl_sequence) || 1;
                
                var eventDate_dmy = event.tour_date.split('-').reverse().join('-');
                var newSpclId = currentTourPlanId + '_' + eventDate_dmy;
                var unique_id = event.spcl_idvalue || (newSpclId + '_' + seq);

                console.log('Event unique_id:', unique_id, 'for date:', event.tour_date);

                // Store in map to prevent duplicates
                if (!uniqueEventsMap[unique_id] && $('#rowsp' + unique_id).length === 0) {
                    uniqueEventsMap[unique_id] = {
                        event: event,
                        seq: seq,
                        newSpclId: event.spcl_id || newSpclId,
                        unique_id: unique_id
                    };
                }
            });

            console.log('Unique events map:', uniqueEventsMap);

            // Render each unique event
            $.each(uniqueEventsMap, function(key, item) {
                var event = item.event;
                var seq = item.seq;
                var newSpclId = item.newSpclId;
                var unique_id = item.unique_id;

                var html = '';
                html += '<div id="rowsp' + unique_id + '" class="dynamic-added card">';
                html += '<div class="row mt-2">';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_id]" value="' + newSpclId + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_sequence]" value="' + seq + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_idvalue]" value="' + unique_id + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][tour_date]" value="' + event.tour_date + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][location_id]" value="' + (event.location_id || '') + '">';
                html += '<input type="hidden" name="spcl_additi[' + unique_id + '][hotel_id]" value="' + (event.hotel_id || '') + '">';
                html += '</div><div class="col-xl-2 col-sm-12 col-md-2"></div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                html += '<div class="teams-rank"><b>Special Event Name</b></div>';
                html += '<input type="text" name="spcl_additi[' + unique_id + '][spcl_event]" value="' + (event.spcl_event || '') + '" class="form-control input-sm" maxlength="50" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                html += '<div class="teams-rank"><b>Tariff</b></div>';
                html += '<input type="text" name="spcl_additi[' + unique_id + '][spcl_tariff]" value="' + (event.spcl_tariff || '') + '" class="form-control input-sm" maxlength="7" readonly>';
                html += '</div>';

                html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                html += '<button type="button" id="' + unique_id + '" data-oid="' + newSpclId + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
                html += '</div>';

                html += '<div class="col-xl-2 col-sm-12 col-md-2"></div><div class="col-xl-2 col-sm-12 col-md-2"></div>';
                html += '</div></div>';

                spclContainer.append(html);
                console.log('Appended special event row:', unique_id, 'to container for', iti_id);
            });
            
            spclContainer.data('spcl-loaded', true);
        } else {
            console.log('No special events found for', compositeKey, 'or already loaded');
        }

        // ==================== LOAD SIGHTSEEING ====================
        if (ssContainer.length > 0 && !ssContainer.data('ss-loaded') && 
            sightseeingByTourAndDate[compositeKey]) {
            
            var ssData = sightseeingByTourAndDate[compositeKey];
            console.log('Loading sightseeing for', compositeKey, 'saved_ss_ids:', ssData.saved_ss_ids, 'location_id:', ssData.location_id, 'hotel_id:', ssData.hotel_id);
            
            // Use saved_ss_ids to render corresponding sightseeing items
            ssData.saved_ss_ids.forEach(function(ss_id) {
                var ss_item = ssData.sightseeing.find(function(item) { 
                    return item.ss_id == ss_id || item.id == ss_id; // Adjust based on actual property name for ss_id
                }) || {};
                var ss_unique_id = iti_id + '_ss_' + ss_id; // Unique ID including iti_id for consistency
                if ($('#rowss' + ss_unique_id).length === 0) {
                    var html = '';
                    html += '<div id="rowss' + ss_unique_id + '" class="dynamic-added card">';
                    html += '<div class="row mt-2">';

                    html += '<div class="col-xl-4 col-sm-12 col-md-4">';
                    html += '<div class="teams-rank"><b>Sightseeing Name</b></div>';
                    html += '<input type="text" name="ss_additi[' + ss_unique_id + '][ss_event]" value="' + (ss_item.name || ss_item.ss_name || ss_id) + '" class="form-control input-sm" maxlength="100" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Pax Cost</b></div>';
                    html += '<input type="text" name="ss_additi[' + ss_unique_id + '][ss_pax_cost]" value="' + (ss_item.pax_cost || ssData.ss_pax_cost || 0) + '" class="form-control input-sm ss_pax_class' + iti_id + '" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Total Cost</b></div>';
                    html += '<input type="text" name="ss_additi[' + ss_unique_id + '][ss_total_cost]" value="' + (ss_item.total_cost || ssData.ss_total_cost || 0) + '" class="form-control input-sm ss_total_class' + iti_id + '" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-2 col-sm-12 col-md-2">';
                    html += '<div class="teams-rank"><b>Distance</b></div>';
                    html += '<input type="text" name="ss_additi[' + ss_unique_id + '][ss_distance]" value="' + (ss_item.distance || ssData.ss_total_distance || 0) + '" class="form-control input-sm" readonly>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
                    html += '<button type="button" id="' + ss_unique_id + '" data-sid="' + ss_id + '" class="btn btn-danger btn-sm btn_ss_remove">X</button>';
                    html += '</div>';

                    html += '<div class="col-xl-1 col-sm-12 col-md-1">';
                    html += '<input type="hidden" name="ss_additi[' + ss_unique_id + '][ss_id]" value="' + ss_id + '">';
                    html += '<input type="hidden" name="ss_additi[' + ss_unique_id + '][tour_date]" value="' + tour_date + '">';
                    html += '<input type="hidden" name="ss_additi[' + ss_unique_id + '][location_id]" value="' + ssData.location_id + '">';
                    html += '<input type="hidden" name="ss_additi[' + ss_unique_id + '][hotel_id]" value="' + ssData.hotel_id + '">';
                    html += '</div>';

                    html += '</div></div>';

                    ssContainer.append(html);
                    console.log('Appended sightseeing row:', ss_unique_id);
                }
            });
            
            // Update totals
            var totalPaxCost = 0;
            var totalSsCost = ssData.ss_total_cost || 0;
            var totalDistance = ssData.ss_total_distance || 0;
            $('.ss_pax_class' + iti_id).each(function() {
                totalPaxCost += parseFloat($(this).val()) || 0;
            });
            // Assuming fields exist: #ss_pax_total + iti_id, #ss_total_cost + iti_id, #ss_total_distance + iti_id
            $('#ss_pax_total' + iti_id).val(totalPaxCost);
            $('#ss_total_cost' + iti_id).val(totalSsCost);
            $('#ss_total_distance' + iti_id).val(totalDistance);
            console.log('Updated SS totals for', iti_id, ': pax', totalPaxCost, 'total cost', totalSsCost, 'distance', totalDistance);
            
            ssContainer.data('ss-loaded', true);
        } else {
            console.log('No sightseeing found for', compositeKey, 'or already loaded');
        }

        addonContainer.data('addons-loaded', true);
    });

    // Sync global counter
    if (maxAddonSeq > 0) {
        $('#total_addon_count').val(maxAddonSeq);
        if (typeof i !== 'undefined') {
            i = maxAddonSeq;
        } else {
            window.i = maxAddonSeq;
        }
    }
    
    console.log('Loading complete. Max sequence:', maxAddonSeq);
});
</script>

<!-- SCRIPT 2: Add special events dynamically (user clicks) -->
<script type="text/javascript">
$(document).ready(function () {

    var globalSpclCounter = 0;

    // ---------- ADD SPECIAL EVENT ----------
    $(document).on('click', '.add_spcl', function () {

        var $btn = $(this);

        var id_t      = $btn.attr('data-id');   // e.g. 2479_10-01-2026
        var tour_date = $btn.attr('data-std');
        var old_id    = $btn.attr('data-oid');
        var seqAttr   = $btn.attr('data-sequence');

        if (!id_t) return;

        // Decide sequence
        var seq;
        if (seqAttr !== undefined && seqAttr !== '') {
            seq = parseInt(seqAttr, 10);
            if (seq > globalSpclCounter) globalSpclCounter = seq;
        } else {
            globalSpclCounter++;
            seq = globalSpclCounter;
        }

        var unique_id = id_t + '_' + seq;

        // Duplicate prevention
        if ($('#rowsp' + unique_id).length > 0) {
            console.log('Special event already exists:', unique_id);
            return;
        }

        // CRITICAL FIX: Use unique_id as array key (not seq)
        var html = '';
        html += '<div id="rowsp' + unique_id + '" class="dynamic-added card" data-index="' + id_t + '">';
        html += '<div class="row mt-2">';

        html += '<div class="col-xl-2 col-sm-12 col-md-2">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_id]" value="' + id_t + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_sequence]" value="' + seq + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][spcl_idvalue]" value="' + unique_id + '">';
        html += '<input type="hidden" name="spcl_additi[' + unique_id + '][tour_date]" value="' + tour_date + '">';
        html += '</div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2">';
        html += '<div class="teams-rank"><b>Special Event Name</b></div>';
        html += '<input type="text" id="spcl_event' + unique_id + '" ';
        html += 'name="spcl_additi[' + unique_id + '][spcl_event]" ';
        html += 'class="form-control input-sm" maxlength="50">';
        html += '</div>';

        html += '<div class="col-xl-1 col-sm-12 col-md-1">';
        html += '<div class="teams-rank"><b>Tariff</b></div>';
        html += '<input type="text" id="spcl_tariff' + unique_id + '" ';
        html += 'name="spcl_additi[' + unique_id + '][spcl_tariff]" ';
        html += 'class="form-control input-sm" maxlength="7">';
        html += '</div>';

        html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
        html += '<button type="button" id="' + unique_id + '" ';
        html += 'data-nid="' + id_t + '" ';
        html += 'class="btn btn-danger btn-sm btn_spcl_remove">X</button>';
        html += '</div>';

        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
        html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

        html += '</div></div>';

        $('#spcl_add_dynamic' + id_t).append(html);
    });

    // ---------- REMOVE SPECIAL EVENT ----------
    $(document).on('click', '.btn_spcl_remove', function () {
        var unique_id = $(this).attr('id');
        $('#rowsp' + unique_id).remove();

        // Recalc totals if needed
        $('input[id^="spcl_tariff"]').each(function () {
            var vid = $(this).attr('id').replace('spcl_tariff', '');
            setTimeout(() => calculateGrandTotal(vid), 200);
        });
    });

    // ---------- PRELOAD SAVED SPECIAL EVENTS ----------
    const d_spcl_events = <?php echo json_encode($d_spcl_events); ?>;

    if (Array.isArray(d_spcl_events) && d_spcl_events.length > 0) {
        setTimeout(() => {
            $.each(d_spcl_events, function (index, item) {

                const selector =
                    '.add_spcl' +
                    '[data-id="' + item.spcl_id + '"]' +
                    '[data-std="' + item.tour_date + '"]';

                const $btn = $(selector);
                if (!$btn.length) return;

                var unique_id = item.spcl_idvalue;

                // Mark sequence and trigger click
                $btn.attr('data-sequence', item.spcl_sequence);
                $btn.trigger('click');
                $btn.removeAttr('data-sequence');

                // Populate values
                $('#spcl_event' + unique_id).val(item.spcl_event);
                $('#spcl_tariff' + unique_id).val(item.spcl_tariff);

                // Sync counter
                if (item.spcl_sequence > globalSpclCounter) {
                    globalSpclCounter = item.spcl_sequence;
                }
            });
        }, 500);
    }

    // ---------- REMOVE SIGHTSEEING ----------
    $(document).on('click', '.btn_ss_remove', function () {
        var unique_id = $(this).attr('id');
        var ss_id = $(this).attr('data-sid');
        $('#rowss' + unique_id).remove();

        // Recalc SS totals for the day
        var iti_id = unique_id.split('_ss_')[0]; // e.g., 2179_10-01-2026
        if (iti_id) {
            var totalPaxCost = 0;
            var totalSsCost = 0;
            var totalDistance = 0;
            $('.ss_pax_class' + iti_id).each(function() {
                totalPaxCost += parseFloat($(this).val()) || 0;
            });
            $('.ss_total_class' + iti_id).each(function() {
                totalSsCost += parseFloat($(this).val()) || 0;
            });
            // Assuming distance is per item, sum similarly if class added
            // $('.ss_distance_class' + iti_id).each(...);
            $('#ss_pax_total' + iti_id).val(totalPaxCost);
            $('#ss_total_cost' + iti_id).val(totalSsCost);
            // Update grand total if needed
            setTimeout(() => calculateGrandTotal(iti_id), 200);
        }
    });
});
</script>

<!-- SCRIPT 3: Add/remove hotel facility addons dynamically -->
<script>
$(document).ready(function() {
    // Initialize global counter from hidden field if present
    var globalCounter = parseInt($('#total_addon_count').val(), 10) || 0;

    var iti_edit_id = <?php echo isset($iti_edit_id) && $iti_edit_id !== '' ? $iti_edit_id : 0; ?>;
    var read_only = iti_edit_id == 1 ? "readonly" : "";
    var dis_abled = iti_edit_id == 1 ? 'style="pointer-events: none; background-color: #eee;"' : "";

    // Helper to sum tariffs for a given base id_t (eg '2479_10-01-2026')
    function updateFacRateFor(id_t) {
        var total = 0;
        $('.addon_class' + id_t).each(function() {
            total += parseFloat($(this).val()) || 0;
        });
        $('#fac_rate' + id_t).val(total);
    }

    // Add / prefill handler
    $('.hotel_fac_change_new').on('change', function() {
        var addonTotal = 0;
        var $btn = $(this);

        var sequenceAttr = $btn.attr('data-sequence');
        var id_t = $btn.attr('data-id');        // e.g. 2479_10-01-2026
        var tour_date = $btn.attr('data-std');  // e.g. 2026-01-10
        if (!id_t) return;

        var seq;
        if (sequenceAttr !== undefined && sequenceAttr !== '') {
            seq = parseInt(sequenceAttr, 10);
            if (seq > globalCounter) globalCounter = seq;
        } else {
            globalCounter++;
            seq = globalCounter;
        }

        // Persist counter
        $('#total_addon_count').val(globalCounter);

        var unique_id = id_t + '_' + seq; // Stable unique id

        // Duplicate prevention
        if ($('#rowaddon' + unique_id).length > 0) {
            console.log('Addon already exists, skipping insert:', unique_id);
        } else {
            // CRITICAL FIX: Use unique_id as array key (not seq)
            var html = '';
            html += '<div id="rowaddon' + unique_id + '" class="dynamic-added card" data-index="' + id_t + '">';
            html += '<div class="row mt-2">';

            html += '<div class="col-xl-2 col-sm-12 col-md-2">';
            html += '<div class="teams-rank"><b>Facility Name</b></div>';
            html += '<input type="text" id="addon_event' + unique_id + '" data-id="' + unique_id + '" name="addon_additi[' + unique_id + '][addon_event]" value="" class="form-control input-sm" maxlength="50" ' + read_only + '>';
            html += '</div>';

            html += '<div class="col-xl-1 col-sm-12 col-md-1">';
            html += '<div class="teams-rank"><b>Tariff</b></div>';
            html += '<input type="text" id="addon_tariff' + unique_id + '" data-id="' + unique_id + '" name="addon_additi[' + unique_id + '][addon_tariff]" value="" class="form-control input-sm addon_class' + id_t + '" maxlength="7">';
            html += '</div>';

            html += '<div class="col-xl-1 col-sm-12 col-md-1" style="padding-top:20px;">';
            html += '<button type="button" name="remove" id="' + unique_id + '" data-oid="' + id_t + '" data-nid="' + id_t + '" data-cid="' + seq + '" class="btn btn-danger btn-sm btn_addon_remove">X</button>';
            html += '</div>';

            html += '<div class="col-xl-2 col-sm-12 col-md-2">';
            html += '<input type="hidden" id="addon_id' + unique_id + '" name="addon_additi[' + unique_id + '][addon_id]" value="' + id_t + '">';
            html += '<input type="hidden" id="addon_sequence' + unique_id + '" name="addon_additi[' + unique_id + '][addon_sequence]" value="' + seq + '">';
            html += '<input type="hidden" id="addon_idvalue' + unique_id + '" name="addon_additi[' + unique_id + '][addon_idvalue]" value="' + unique_id + '">';
            html += '<input type="hidden" id="tour_date' + unique_id + '" name="addon_additi[' + unique_id + '][tour_date]" value="' + tour_date + '">';
            html += '</div>';

            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';
            html += '<div class="col-xl-2 col-sm-12 col-md-2"></div>';

            html += '</div></div>';

            $('#addon_add_dynamic' + id_t).append(html);
        }

        // Fetch tariff and populate
        var facility_id = $btn.val();
        if (facility_id > 0) {
            $.ajax({
                url: "<?= site_url('Enquiry/getHotelFaciliyTariffNew'); ?>",
                method: "POST",
                data: { facility_id: facility_id },
                dataType: 'json',
                success: function(data) {
                    $('#addon_event' + unique_id).val(data && data[0] ? data[0].facility_name : '');
                    $('#addon_tariff' + unique_id).val(data && data[0] ? data[0].tariff : '');
                    updateFacRateFor(id_t);
                },
                error: function(xhr, status, error) {
                    console.error("Tariff fetch error:", error);
                    updateFacRateFor(id_t);
                }
            });
        } else {
            updateFacRateFor(id_t);
        }
    });

    // Remove handler
    $(document).on('click', '.btn_addon_remove', function() {
        var button_id = $(this).attr("id");
        var id_t = $(this).attr('data-nid');
        if (!button_id) return;

        $('#rowaddon' + button_id).remove();

        if (id_t) updateFacRateFor(id_t);
    });

    // When any tariff input changes, update the day's rate
    $(document).on('input', 'input[id^="addon_tariff"]', function() {
        var fullId = this.id.replace('addon_tariff', '');
        var lastUnd = fullId.lastIndexOf('_');
        var id_t = lastUnd > 0 ? fullId.substring(0, lastUnd) : fullId;
        updateFacRateFor(id_t);
    });

    // Sync initial counter
    (function syncInitialCounter() {
        var maxSeen = 0;
        $('input[name$="[addon_sequence]"]').each(function() {
            var v = parseInt($(this).val(), 10) || 0;
            if (v > maxSeen) maxSeen = v;
        });
        if (maxSeen > globalCounter) {
            globalCounter = maxSeen;
            $('#total_addon_count').val(globalCounter);
        }
    })();

});
</script>
