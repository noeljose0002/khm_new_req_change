<?php
$vehicle_data = json_decode($object_det[0]['vehicle_type_id'], true); // Decode JSON from DB
$is_edit = $edit_id ? $edit_id : 0;
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
	<title>KHM - Enquiry</title>

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

	<!-- Sidemenu-repsonsive-tabs  css -->
	<link href="<?php echo base_url('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css'); ?>" rel="stylesheet">

	<!-- P-scroll css -->
	<link href="<?php echo base_url('assets/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Font-icons css -->
	<link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

	<!-- Rightsidebar css -->
	<link href="<?php echo base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

	<!-- Data table css -->
	<link href="<?php echo base_url('assets/plugins/datatable1/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />
	<link href="<?php echo base_url('assets/plugins/datatable1/css/buttons.bootstrap4.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/plugins/datatable1/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" />

	<!-- Nice-select css  -->
	<link href="<?php echo base_url('assets/plugins/jquery-nice-select/css/nice-select.css'); ?>" rel="stylesheet" />

	<link href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet" />

	<!-- Color-palette css-->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins.css'); ?>" />
	<script src="<?php echo base_url('assets/tiny_mce/tiny_mce.js'); ?>"></script>
	<style>
		.room-label-col {
			flex: 0 0 14.2857%;
			max-width: 14.2857%;
		}

		.gst-visible .room-label-col {
			flex: 0 0 14.2857%;
			max-width: 14.2857%;
		}

		select.input-sm+.select2-container {
			width: 100% !important;
			/* Force full width of parent container for responsiveness on zoom/resize */
		}

		.cardy {
			background: #c2d6d6;
		}

		select.input-sm+.select2-container .select2-selection--single {
			border: 1px solid #0c502e !important;
			border-radius: 10px !important;
			min-height: 30px !important;
			/* Stick with min-height for zoom flexibility */
			display: flex !important;
			align-items: center !important;
			padding-left: 8px !important;
			background-color: #fff !important;
			transition: box-shadow 0.3s ease, border-color 0.3s ease !important;
			box-sizing: border-box !important;
			width: 100% !important;
			/* Ensure selection matches container width */
		}

		/* Rendered text adjustments remain the same */
		select.input-sm+.select2-container .select2-selection__rendered {
			line-height: 1.4 !important;
			font-size: 13px !important;
			color: #000 !important;
			padding: 0 !important;
			height: auto !important;
			white-space: nowrap !important;
			/* Prevent text wrapping if it's causing stretch issues; adjust to normal if needed */
			overflow: hidden !important;
			/* Hide overflow to keep it tidy on zoom */
		}

		/* Dropdown arrow - keep relative */
		select.input-sm+.select2-container .select2-selection__arrow {
			height: 100% !important;
			top: 0 !important;
			width: 20px !important;
			display: flex !important;
			align-items: center !important;
			justify-content: center !important;
			flex-shrink: 0 !important;
			/* Prevent arrow from shrinking on narrow zooms */
		}

		/* Open/Focus states unchanged */
		select.input-sm+.select2.select2-container--open .select2-selection,
		select.input-sm+.select2.select2-container--focus .select2-selection {
			border-color: #0c502e !important;
			box-shadow: 0 0 0 4px rgba(21, 236, 68, 0.2) !important;
		}

		/* Ensure dropdown itself is also responsive */
		select.input-sm+.select2-container .select2-dropdown {
			width: auto !important;
			/* Let it match selection width naturally */
			min-width: 100% !important;
			/* At minimum, full width of trigger */
		}

		.textlef {
			margin-left: 16% !important;
		}

		/* Override form-control styles specifically for inputs inside .total-col-room */
		.total-col .form-control.input-sm {
			height: 30px !important;
			/* Match your desired height */
			min-height: 30px !important;
			/* For zoom flexibility */
			border: 1px solid #0c502e !important;
			/* Custom border */
			border-radius: 10px !important;
			/* Rounded corners */
			display: flex !important;
			align-items: left !important;
			/* Center content vertically */
			background-color: #fff !important;
			/* White background */
			width: 87% !important;
			/* Full width stretch */
			box-sizing: border-box !important;
			/* Include padding/border in width */
			margin-left: 15% !important;
			/* Override any default margins; adjust if needed */
			padding: 0 8px !important;
			/* Add internal padding for text alignment */
			font-size: 13px !important;
			/* Small input font */

			text-align: left !important;

			/* Center numeric input if desired */
			/* For readonly inputs: subtle focus styles */
			&:focus {
				border-color: #0c502e !important;
				box-shadow: 0 0 0 0.2rem rgba(21, 236, 68, 0.2) !important;
				/* Subtle glow */
			}
		}

		/* Ensure the label (.teams-rank) doesn't interfere with input stretching */
		.total-col .teams-rank.col-room {
			width: 100% !important;
			box-sizing: border-box !important;
			margin-bottom: 5px !important;
			/* Space between label and input */
			text-align: left !important;
			font-weight: bold !important;
		}

		/* Parent .total-col-room flex responsiveness (from previous fixes) */
		.total-col {
			margin-left: -9px !important;
			flex: 1 !important;
			min-width: 180px;
			width: auto !important;
			box-sizing: border-box !important;
			flex-basis: 0 !important;
			flex-grow: 1 !important;
			flex-shrink: 1 !important;
		}

		.total-col-room .form-control.input-sm {
			height: 30px !important;
			/* Match your desired height */
			min-height: 30px !important;
			/* For zoom flexibility */
			border: 1px solid #0c502e !important;
			/* Custom border */
			border-radius: 10px !important;
			/* Rounded corners */
			display: flex !important;
			align-items: left !important;
			/* Center content vertically */
			background-color: #fff !important;
			/* White background */
			width: 87% !important;
			/* Full width stretch */
			box-sizing: border-box !important;
			/* Include padding/border in width */
			margin-left: 0 !important;
			/* Override any default margins; adjust if needed */
			padding: 0 8px !important;
			/* Add internal padding for text alignment */
			font-size: 13px !important;
			/* Small input font */

			text-align: left !important;

			/* Center numeric input if desired */
			/* For readonly inputs: subtle focus styles */
			&:focus {
				border-color: #0c502e !important;
				box-shadow: 0 0 0 0.2rem rgba(21, 236, 68, 0.2) !important;
				/* Subtle glow */
			}
		}

		/* Ensure the label (.teams-rank) doesn't interfere with input stretching */
		.total-col-room .teams-rank.col-room {
			width: 100% !important;
			box-sizing: border-box !important;
			margin-bottom: 5px !important;
			/* Space between label and input */
			text-align: left !important;
			font-weight: bold !important;
		}

		/* Parent .total-col-room flex responsiveness (from previous fixes) */
		.total-col-room {
			margin-left: -9px !important;
			flex: 1 !important;
			min-width: 180px;
			width: auto !important;
			box-sizing: border-box !important;
			flex-basis: 0 !important;
			flex-grow: 1 !important;
			flex-shrink: 1 !important;
		}




		.col-room {
			margin-left: 4px;
		}

		/* Label (like Total(D), Grand Total(D)) */


		.total-col .form-control {
			height: 41px;
			border: 1px solid #0c502e;
			border-radius: 10px;
			display: flex;
			align-items: center;
			background-color: #fff;
		}

		/* select[id^="hotelcat"]+.select2 .select2-selection,
		select[id^="hotelid"]+.select2 .select2-selection,
		select[id^="roomcat_common"]+.select2 .select2-selection,
		select[id^="roomcat"]+.select2 .select2-selection,
		select[id^="mealplan"]+.select2 .select2-selection{
			border: 1px solid #0c502e !important;
			border-radius: 10px !important;
			height: 30px !important;
			display: flex;
			align-items: center;
			padding-left: 8px;
			background-color: #fff;
			transition: box-shadow 0.3s ease, border-color 0.3s ease;
		
		}

		select[id^="hotelcat"]+.select2 .select2-selection__rendered ,
		select[id^="hotelid"]+.select2 .select2-selection__rendered ,
		select[id^="roomcat_common"]+.select2 .select2-selection__rendered ,
		select[id^="roomcat"]+.select2 .select2-selection__rendered ,
		select[id^="mealplan"]+.select2 .select2-selection__rendered {
			color: #000 !important;
			line-height: 20px !important;
			font-size: 14px;
		}

		
		select[id^="hotelcat"]+.select2.select2-container--open .select2-selection,
		select[id^="hotelcat"]+.select2.select2-container--focus .select2-selection,
		select[id^="hotelid"]+.select2.select2-container--open .select2-selection,
		select[id^="hotelid"]+.select2.select2-container--focus .select2-selection,
		select[id^="roomcat_common"]+.select2.select2-container--open .select2-selection,
		select[id^="roomcat_common"]+.select2.select2-container--focus .select2-selection,
		select[id^="roomcat"]+.select2.select2-container--open .select2-selection,
		select[id^="roomcat"]+.select2.select2-container--focus .select2-selection,
		select[id^="mealplan"]+.select2.select2-container--open .select2-selection,
		select[id^="mealplan"]+.select2.select2-container--focus .select2-selection
		 {
			border-color: #0c502e !important;
			box-shadow: 0 0 0 4px rgba(21, 236, 68, 0.2)!important;
			
		} */

		.table th,
		.text-wrap table th {
			color: #009933 !important;
		}

		.nice-select {
			border: 1px solid #045511 !important;
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
			border: 1px solid #078f1a !important;
			padding: 0.1rem !important;
			text-align: center;
			vertical-align: middle;
		}

		.card {
			background-color: #e0eee0 !important;
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

		#btn_savedraft_tour_plan,
		#btn_save_tour_plan,
		#tour_view_id,
		#tour_edit_id,
		#qq_edit_id,
		#go_to_iti,
		#btn_add_bt,
		#copy_tour_plan,
		#edit_cur_tour_plan_btn,
		#spinner_draft,
		.dyna {
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

		.dyna {
			padding: 8px 14px;
			margin: auto;
		}

		#btn_savedraft_tour_plan:hover,
		#btn_save_tour_plan:hover,
		#tour_view_id:hover,
		#tour_view_id:hover,
		#qq_edit_id:hover,
		#go_to_iti:hover,
		#btn_add_bt:hover,
		#copy_tour_plan:hover,
		#edit_cur_tour_plan_btn:hover,
		.dyna:hover {
			background: #006600;
			transform: scale(1.05);
		}

		.modal-backdrop.modal-stack {
			z-index: 1049 !important;
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

	<div class="modal fade auto-off " id="diff_season_modal" tabindex="-1" role="dialog" aria-labelledby="diff_season_modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel-11">Different season/weekends exist</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body" id="season_name_placeholder">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade overflow-hidden" id="modal_tour" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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

	<div class="modal fade overflow-hidden" id="modal_qq" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
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

	<div class="modal fade" id="seasonsmodal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog custom-modal-width" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="example-Modal3"><span id="ssn_header"></span> - Season</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-lg-3">
							<input type="hidden" name="hd_hotel_id_ssn" id="hd_hotel_id_ssn" value="">
							<input type="hidden" name="hd_object_id_ssn" id="hd_object_id_ssn" value="">
							<label class="form-control-label">Start Date</label>
							<input class="form-control" type="date" id="ssn_start_date">
						</div>
						<div class="col-lg-3">
							<label class="form-control-label">End Date</label>
							<input class="form-control" type="date" id="ssn_end_date">
						</div>
						<div class="col-lg-3">
							<label class="form-control-label">Season Name</label>
							<input class="form-control" type="text" id="season_name">
						</div>
						<div class="col-lg-3">

							<button type="button" id="btn_seasons" class="btn btn-success" style="float:right;">Add New Season</button>
						</div>
					</div>



					<div class="row" style="padding-top:5px;">
						<div class="col-lg-12">
							<table class="table" id="table_seasons" style="width: 100%;">
								<thead style="background-color:#c6ecd9;">
									<tr>
										<th scope="col">Start Date</th>
										<th scope="col">End Date</th>
										<th scope="col">Season Name</th>
										<th scope="col">Tariff</th>
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
							<!-- At top end  there is tour startdate nights  end date  -->

							<div class="d-flex header-right ml-auto">
								<div class="profile-details mt-1" style="padding-top:10px;">
									<!-- from enquiry table data is passed  as object_det (enquiry details) then 0the array start_date value is taken -->
									<span class="mr-3 mb-0  fs-15 font-weight-bold" style="color:#003300;">Tour Start Date : <?php echo $object_det[0]['start_date']; ?></span>
								</div>
								<div class="profile-details mt-1" style="padding-top:10px;">
									<!-- from enquiry table data is passed  as object_det (enquiry details) then 0the array start_date value is taken but there is a catch here id  is injected why because based on the calculated nights location it changes  -->
									<span class="mr-3 mb-0  fs-15 font-weight-bold" style="color:#003300;">Nights : <span id="planned_night"></span><?php echo $object_det[0]['no_of_night']; ?></span>

								</div>
								<div class="profile-details mt-1" style="padding-top:10px;">
									<!-- from enquiry table data is passed  as object_det(enquiry details) then 0the array end_date value is taken -->
									<span class="mr-3 mb-0  fs-15 font-weight-bold" style="color:#003300;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tour End Date : <?php echo $object_det[0]['end_date']; ?></span>
								</div>
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

							</div>
						</div>

						<div class="line"></div>
						<div class="d-flex">
							<a class="header-brand" href="index.html">

							</a>
							<a href="#" data-toggle="sidebar" class="nav-link icon toggle"></a>
							<div class="d-flex header-left left-header">
								<div class="d-none d-lg-block horizontal" style="padding-top:7px;">
									<button class="btn btn-success btn-sm" onclick="history.back()" title="Go Back"><i class="fa fa-arrow-left"></i> Back</button>
								</div>
							</div>
							<div class="d-flex header-right ml-auto">
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<span class="separator"></span>
									<p class="h5" style="color:#003300;font-weight:bold;">Guest Name : <?php echo $object_det[0]['object_name']; ?></p>
									<span class="separator"></span>
								</div>
								<?php if ($object_det[0]['enq_type_id'] == "3") { ?>
									<div class="dropdown d-md-flex message" style="padding-top:10px;">
										<p class="h5" style="color:#003300;font-weight:bold;">Agent Name : <?php echo $object_det[0]['agent_name']; ?></p>
										<span class="separator"></span>
									</div>
								<?php } ?>
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<p class="h5" style="color:#003300;font-weight:bold;">Accom-Total : <span id="a_total"></span></p>
									<span class="separator"></span>
								</div>
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<p class="h5" style="color:#003300;font-weight:bold;">Trans-Total : <span id="v_total"></span></p>
									<span class="separator"></span>
								</div>
								<div class="dropdown d-md-flex message" style="padding-top:10px;">
									<p class="h5" style="color:#003300;font-weight:bold;">Grand Total : <span id="g_total"></span></p>
									<span class="separator"></span>
								</div>
							</div>
						</div>
						<div class="line"></div>
						<div class="d-flex justify-content-center">
							<button class="btn btn-primary" id="spinner_draft" type="button" style="display: none;">
								<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
								Importing Datas...Please wait...
							</button>
						</div>
						<div class="d-flex">
							<a class="header-brand" href="index.html">

							</a>
							<a href="#" data-toggle="sidebar" class="nav-link icon toggle"></a>
							<div class="d-flex header-left left-header">
								<div class="d-none d-lg-block horizontal" style="padding-top:5px;">

									<ol class="breadcrumb breadcrumb-arrow mt-3 bg-light dyn_list">

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
							<div class="wideget-user-tab wideget-user-tab3 border-bottom">
								<div class="tab-menu-heading">
									<div class="tabs-menu1">
										<ul class="nav">
											<li class=""><a href="#tab-5" class="h5 active" data-toggle="tab"><b>Tour Details</b></a></li>

										</ul>
									</div>
								</div>
							</div>
							<form id="myTourplanForm" method="POST" action="<?= site_url('Enquiry/saveTourPlan'); ?>">
								<input type="hidden" name="enquiry_header_id" value="<?php echo $object_det[0]['enquiry_header_id']; ?>">
								<input type="hidden" name="enquiry_details_id" value="<?php echo $object_det[0]['enquiry_details_id']; ?>">
								<input type="hidden" name="is_quick_quote" value="<?php echo $object_det[0]['is_quick_quote']; ?>">
								<input type="hidden" name="object_id" value="<?php echo $object_id; ?>">
								<input type="hidden" name="edit_id" value="<?php echo $is_edit; ?>">
								<input type="hidden" name="no_of_double_room" value="<?php echo $object_det[0]['no_of_double_room']; ?>">
								<input type="hidden" name="no_of_single_room" value="<?php echo $object_det[0]['no_of_single_room']; ?>">
								<div class="bg-white widget-user mb-0">
									<div class="card-body">
										<div class="border-0">
											<div class="tab-content">
												<div class="tab-pane active" id="tab-5">
													<div class="profile-log-switch">
														<!-- Row-->
														<div class="row">
															<div class="col-xl-12 ">
																<?php if (!empty($pre_tour_plan) && empty($cur_tour_plan)) { ?>
																	<h6 style="font-style: italic;color:#cc3399;">*You can either import current tour plan using the 'Import Tour Plan' button or create a new tour plan.</h6>
																<?php } ?>
															</div>
														</div>
														<div class="row">
															<div class="col-xl-12 ">
																<div class="">

																	<div class="card mb-0 box-shadow-0">
																		<?php if (!empty($tour_plan_det) && $is_edit == 0) { ?>
																			<div class="d-flex table-responsive p-3">
																				<div class="btn-group mr-2">
																					<a href="#" id="tour_view_id" class="tour_view">Tour Plan View</a>
																				</div>

																				<?php if ($object_det[0]['is_quick_quote'] == 1) { ?>
																					<div class="btn-group mr-2">

																						<a href="#" id="qq_edit_id" class="qq_view">Quick Quote View</a>

																					</div>
																				<?php } ?>
																				<div class="btn-group mr-2">

																					<a href="<?= site_url('Enquiry/itinerary/' . $object_id . '/0'); ?>" id="go_to_iti">Go to Itinerary</a>
																				</div>
																			</div>
																		<?php } ?>
																		<?php if (!empty($tour_plan_draft_det)) { ?>
																			<div class="d-flex table-responsive p-3">
																				<div class="btn-group mr-2">
																					<i class="btn btn-primary draft_view">Get tour plan from draft</i>
																				</div>
																			</div>
																		<?php } ?>

																		<?php if (!empty($tour_plan_det) && $is_edit > 0) { ?>
																			<div class="d-flex table-responsive p-3">
																				<div class="btn-group mr-2">
																					<i class="btn btn-primary draft_view" id="edit_cur_tour_plan_btn">Edit Current Tour Plan</i>
																				</div>
																			</div>
																		<?php } ?>

																		<?php if (empty($tour_plan_det) || $is_edit > 0) { ?>
																			<div class="card-header">
																				<div class="d-flex align-items-center w-100">
																					<div style="width: 60%;">
																						<select class="form-control select2-show-search" name="tour_location" id="tour_location" data-placeholder="Search and add tour locations from here" style="width:80%;">
																							<option value="">Select</option>
																							<?php
																							if (!empty($all_locations)) {
																								foreach ($all_locations as $keys => $vals) {
																									echo '<option value="' . $vals['geog_id'] . '">' . $vals['geog_name'] . '</option>';
																								}
																							} else {
																							?>
																								<option value="">Location not found</option>
																							<?php } ?>

																						</select>
																					</div>



																					<div class="form-check ml-2">
																						<input class="form-check-input " type="checkbox" id="dynamicNeeded" />
																						<label class="btn btn-success dyna" for="dynamicNeeded">Dynamic needed</label>
																					</div>

																					<div class="ml-2">
																						<button type="button" class="btn btn-success pt-2 pb-2" id="btn_add_bt">Add Location<i class="fa fa-plus ml-2"></i></button>
																					</div>

																					<?php if (!empty($pre_tour_plan) && empty($cur_tour_plan)) { ?>
																						<div class="ml-2">
																							<button type="button" class="btn btn-success pt-2 pb-2" id="copy_tour_plan">Import Tour Plan<i class="fa fa-save ml-2"></i></button>
																						</div>
																					<?php } ?>
																				</div>
																			</div>
																		<?php } ?>
																	</div>



																	<span id="hotel_alert"></span>
																	<div class="d-flex justify-content-center">
																		<button class="btn btn-primary" id="csspinner" type="button" style="display: none;">
																			<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
																			Tour plan loading...
																		</button>
																	</div>
																	<div class="row tour_plan_div" style="padding-top:15px;">
																	</div>


																</div>
															</div>
														</div>


														<!--</div>-->
														<button type="submit" id="btn_savedraft_tour_plan" class="btn btn-success" style="float:left;display:none;">Save As Draft</button>
														<button type="submit" id="btn_save_tour_plan" class="btn btn-success" style="float:right;display:none;">Final Save</button>
														<input type="hidden" name="submit_type" id="submit_type" value="">
														<!-- End Row -->
													</div>
												</div>



											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- row closed -->
				</div>
			</div>
			<!-- App-content closed -->
		</div>

		<!-- Right-sidebar-->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="p-3">
				<a href="#" class="text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
			</div>
			<div class="tab-menu-heading  siderbar-tabs border-0">
				<div class="tabs-menu ">
					<!-- Tabs -->
					<ul class="nav panel-tabs">
						<li class=""><a href="#tab" class="active show" data-toggle="tab">Profile</a></li>
						<li class=""><a href="#tab1" data-toggle="tab" class="">Friends</a></li>
						<li><a href="#tab2" data-toggle="tab" class="">Activity</a></li>
						<li><a href="#tab3" data-toggle="tab" class="">Todo</a></li>
					</ul>
				</div>
			</div>
			<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
				<div class="tab-content border-top">
					<div class="tab-pane active" id="tab">
						<div class="card-body p-0">
							<div class="header-user text-center mt-4 pb-4">
								<span class="avatar avatar-xxl brround"><img src="<?php echo base_url('assets/images/users/2.jpg'); ?>" alt="Profile-img" class="avatar avatar-xxl brround"></span>
								<div class="dropdown-item text-center font-weight-semibold user h3 mb-0">Jonathan Mills</div>
								<small>App Developer</small>
								<div class="card-body mb-6">
									<div class="form-group ">
										<label class="form-label  text-left">Offline/Online</label>
										<select class="form-control mb-4 nice-select " data-placeholder="Choose one">
											<option value="1">Online</option>
											<option value="2">Offline</option>
										</select>
									</div>
									<div class="form-group mt-3">
										<label class="form-label text-left">Website</label>
										<select class="form-control nice-select " data-placeholder="Choose one">
											<option value="1">Spruko.com</option>
											<option value="2">sprukosoft.com</option>
											<option value="3">sprukotechnologies.com</option>
											<option value="4">sprukoinfo.com</option>
											<option value="5">sprukotech.com</option>
										</select>
									</div>
								</div>
							</div>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon mdi mdi-account-edit"></i> Edit Profile
							</a>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon mdi mdi-account-outline"></i> Spruko technologies
							</a>
							<a class="dropdown-item border-top" href="#">
								<i class="dropdown-icon  mdi mdi-account-plus"></i> Add Another Account
							</a>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
							</a>
							<a class="dropdown-item  border-top" href="#">
								<i class="dropdown-icon zmdi zmdi-pin-help"></i> Need Help?
							</a>
							<div class="card-body border-top">
								<h4>Gallery</h4>
								<div class="row mt-4">
									<div class="col-12">
										<div class="avatar-list">
											<ul>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/users/5.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/photos/2.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/photos/3.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/photos/5.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/photos/3.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/photos/15.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image" data-image-src="<?php echo base_url('assets/images/photos/16.jpg'); ?>"></a></li>
												<li><a href="#" class="avatar avatar-lg cover-image">+48</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body border-top border-bottom">
								<div class="row">
									<div class="col-4 text-center">
										<a class="" href=""><i class="dropdown-icon mdi  mdi-message-outline fs-20 m-0 leading-tight"></i></a>
										<div>Inbox</div>
									</div>
									<div class="col-4 text-center">
										<a class="" href=""><i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight"></i></a>
										<div>Settings</div>
									</div>
									<div class="col-4 text-center">
										<a class="" href=""><i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight"></i></a>
										<div>Sign out</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab1">
						<div class="chat">
							<div class="contacts_card">
								<div class="input-group mb-0 p-3">
									<input type="text" placeholder="Search..." class="form-control search">
									<div class="input-group-prepend mr-0">
										<span class="input-group-text  search_btn  btn-secondary"><i class="fa fa-search text-white"></i></span>
									</div>
								</div>
								<ul class="contacts mb-0">
									<li class="active">
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/12.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Maryam Naz</h5>
												<small class="text-muted">is online</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/2.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class=" online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Sahar Darya</h5>
												<small class="text-muted">left 7 mins ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/5.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Maryam Naz</h5>
												<small class="text-muted">online</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/7.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Yolduz Rafi</h5>
												<small class="text-muted">online</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>02-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/8.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Nargis Hawa</h5>
												<small class="text-muted">30 mins ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>02-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/3.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Khadija Mehr</h5>
												<small class="text-muted">50 mins ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/14.jpg'); ?>" class="rounded-circle user_img" alt="img">
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Petey Cruiser</h5>
												<small class="text-muted">1hr ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight w-100">
											<div class="img_cont">
												<img src="<?php echo base_url('assets/images/users/11.jpg'); ?>" class="rounded-circle user_img" alt="img">
											</div>
											<div class="user_info">
												<h5 class="mt-1 mb-1">Khadija Mehr</h5>
												<small class="text-muted">2hr ago</small>
											</div>
											<div class="float-right text-right ml-auto mt-auto mb-auto"><small>03-02-2019</small></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab2">
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-primary brround avatar-md">CH</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>New Websites is Created</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">30 mins ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-danger brround avatar-md">N</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare For the Next Project</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">2 hours ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-info brround avatar-md">S</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Decide the live Discussion Time</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">3 hours ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-warning brround avatar-md">K</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Team Review meeting</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">4 hours ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-success brround avatar-md">R</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">1 days ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center  border-bottom p-4">
							<div class="">
								<span class="avatar bg-pink brround avatar-md">MS</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">1 days ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-purple brround avatar-md">L</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">45 mintues ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center border-bottom p-4">
							<div class="">
								<span class="avatar bg-primary brround avatar-md">CH</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>New Websites is Created</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">30 mins ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
						<div class="list d-flex align-items-center p-4">
							<div class="">
								<span class="avatar bg-blue brround avatar-md">U</span>
							</div>
							<div class="wrapper w-100 ml-3">
								<p class="mb-0 d-flex">
									<b>Prepare for Presentation</b>
								</p>
								<div class="d-flex justify-content-between align-items-center">
									<div class="d-flex align-items-center">
										<i class="mdi mdi-clock text-muted mr-1"></i>
										<small class="text-muted ml-auto">2 days ago</small>
										<p class="mb-0"></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab3">
						<div class="">
							<div class="d-flex p-3">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
									<span class="custom-control-label">Do Even More..</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox2" value="option2" checked="">
									<span class="custom-control-label">Find an idea.</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox3" value="option3" checked="">
									<span class="custom-control-label">Hangout with friends</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox4" value="option4">
									<span class="custom-control-label">Do Something else</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox5" value="option5">
									<span class="custom-control-label">Eat healthy, Eat Fresh..</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox6" value="option6" checked="">
									<span class="custom-control-label">Finsh something more..</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox7" value="option7" checked="">
									<span class="custom-control-label">Do something more</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox8" value="option8">
									<span class="custom-control-label">Updated more files</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox9" value="option9">
									<span class="custom-control-label">System updated</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="d-flex p-3 border-top border-bottom">
								<label class="custom-control custom-checkbox mb-0">
									<input type="checkbox" class="custom-control-input" name="example-checkbox10" value="option10">
									<span class="custom-control-label">Settings Changings...</span>
								</label>
								<span class="ml-auto">
									<a href="#"><i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i></a>
									<a href="#"><i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i></a>
								</span>
							</div>
							<div class="text-center pt-5">
								<a href="#" class="btn btn-primary">Add more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Right-sidebar-closed -->

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
	<script src="<?php echo base_url('assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js'); ?>"></script>

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
	$(document).ready(function() {
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required == 1) {
			$('#btn_savedraft_tour_plan').on('click', function(e) {
				let isValid = true;
				// $('.load_vehs_click').each(function() {
				// 	if ($(this).attr('data-loaded') !== 'true') {
				// 		alert('Please refresh vehicle details (click refresh icon) for all locations before saving.');
				// 		isValid = false;
				// 		return false; // break loop
				// 	}
				// });

				if (!isValid) {
					e.preventDefault();
				} else {
					$("#submit_type").val("draft");
				}
			});

			$('#btn_save_tour_plan').on('click', function(e) {
				let isValid = true;
				// $('.load_vehs_click').each(function() {
				// 	if ($(this).attr('data-loaded') !== 'true') {
				// 		alert('Please refresh vehicle details (click refresh icon) for all locations before saving.');
				// 		isValid = false;
				// 		return false; // break loop
				// 	}
				// });

				if (!isValid) {
					e.preventDefault();
				} else {
					$('#submit_type').val('final');
				}
			});
		} else {
			$("#btn_savedraft_tour_plan").click(function() {
				$("#submit_type").val("draft");
			});

			$("#btn_save_tour_plan").click(function() {
				$("#submit_type").val("final");
			});
		}

		var tour_plan_draft_det = <?php echo json_encode($tour_plan_draft_det); ?>;
		var tour_plan_div = $('.tour_plan_div .location-card').val();
		if (Array.isArray(tour_plan_draft_det) && tour_plan_draft_det.length > 0) {
			$('#btn_add_bt').prop('disabled', true);
		} else {
			$('#btn_add_bt').prop('disabled', false);
		}
	});
</script>

<script>
	// Get DOM refs
	const dynamicCheckbox = document.getElementById('dynamicNeeded');
	const addBtn = document.getElementById('btn_add_bt');

	// Variable that will hold the current checkbox state (true/false)
	// Initialize from the checkbox's current state
	let isDynamic = !!dynamicCheckbox.checked;

	// Keep variable in sync if user toggles the checkbox
	dynamicCheckbox.addEventListener('change', () => {
		isDynamic = dynamicCheckbox.checked;
		// optional: expose globally if other scripts need it
		window.isDynamic = isDynamic;
		console.log('dynamic toggled ->', isDynamic);
		toggleNightsVisibility(); // Toggle visibility on checkbox change
	});

	// On button click, read the variable and act accordingly
	addBtn.addEventListener('click', (e) => {
		e.preventDefault();
		// Ensure variable is up-to-date (in case code changed it elsewhere)
		isDynamic = !!dynamicCheckbox.checked;
		window.isDynamic = isDynamic; // optional global
		console.log('Add Location clicked. isDynamic =', isDynamic);

		if (isDynamic) {
			// call your dynamic creation function, e.g. createDynamicLocation();
			// createDynamicLocation();
			console.log('-> create dynamic location');
		} else {
			// call your static behaviour, e.g. createStaticLocation();
			// createStaticLocation();
			console.log('-> create static location');
		}
	});

	// Export helper if you want to get the value programmatically
	function getIsDynamic() {
		return !!dynamicCheckbox.checked;
	}
	// Example export
	window.getIsDynamic = getIsDynamic;

	// Add event handler for day_rent input to synchronize across all nights
	$(document).on('input', '[id^="day_rent"]', function() {
		var $input = $(this);
		var vid = $input.attr('id').replace('day_rent', ''); // Extract vid (e.g., count + night + vehicle_type_id)
		var count = $input.attr('data-cid'); // Location card index
		var night = parseInt($input.attr('data-night')); // Current night
		var vindex = parseInt($input.attr('data-veh-index')); // Vehicle index
		var vehicle_type_id = $(`#veh_type_id${vid}`).val(); // Get vehicle_type_id
		var newDayRent = parseFloat($input.val()) || 0; // New day rent value

		// Validate numeric input
		validateNumericInput(this);

		// Update day_rent for the same vehicle model across all nights in this location card
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		for (let n = 1; n <= no_of_night; n++) {
			if (n !== night) { // Skip the current night since it's already being updated
				var otherVid = `${count}${n}${vehicle_type_id}`;
				var $otherDayRent = $(`#day_rent${otherVid}`);
				if ($otherDayRent.length) {
					$otherDayRent.val(newDayRent);
					// Recalculate vehicle totals for this night and vehicle
					updateVehicleTotals(count, n, vindex);
				}
			}
		}

		// Update vehicle totals for the current night
		updateVehicleTotals(count, night, vindex);

		// Update vehicle summary and grand totals
		updateVehicleSummary(count);
		get_veh_grand_total();

		// Update the overall grand total
		var accom_grand_total = parseFloat($('#a_total').text()) || 0;
		var veh_grand_total = parseFloat($('#v_total').text()) || 0;
		$('#g_total').text((accom_grand_total + veh_grand_total));
		calculateVehicleExtraKmCharges();
	});
</script>
<script>
	// New handler for room category changes
	$(document).on('change', '.room_cat_change', function() {
		var $select = $(this);
		var roomCatVal = $select.val();
		var rid = $select.attr('data-id');
		var count = $select.attr('count-id') || $select.data('count');
		var night = parseInt($select.attr('data-night'));
		var roomIndex = parseInt($select.attr('data-room-index'));

		// **CRITICAL: Get room type from data attribute**
		var type = $select.attr('data-type');

		console.log('=== Room Cat Change ===');
		console.log('rid:', rid, 'count:', count, 'night:', night, 'roomIndex:', roomIndex, 'type:', type, 'value:', roomCatVal);

		// **VALIDATION: Ensure type is defined**
		if (!type) {
			console.error('Room type (data-type) is not defined for room category dropdown with rid:', rid);
			console.log('Attempting to determine type from DOM...');

			var $parentRow = $select.closest('.row, .form-group, [class*="room"]');
			if ($parentRow.find('[id^="d_adult_rate"]').length > 0 || $select.attr('id').includes('d_roomcat')) {
				type = 'double';
			} else if ($parentRow.find('[id^="s_adult_rate"]').length > 0 || $select.attr('id').includes('s_roomcat')) {
				type = 'single';
			} else {
				console.error('Unable to determine room type. Please add data-type attribute to the dropdown.');
				showAlert('error', 'Unable to determine room type. Please contact support.');
				return;
			}
			console.log('Determined type from DOM:', type);
		}

		// **CHECK: Skip if this change was triggered programmatically to prevent infinite loop**
		if ($select.data('programmatic-change')) {
			console.log('Skipping propagation for programmatic change - rid:', rid);
			$select.removeData('programmatic-change');
		} else {
			// **STATIC MODE: Propagate room category to ALL rooms across ALL nights OF THE SAME TYPE**
			if (!getIsDynamic()) {
				var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

				console.log('Static mode propagation - Room Type:', type, 'Total Nights:', no_of_night);

				// Loop through ALL nights
				for (let n = 1; n <= no_of_night; n++) {
					// Get total double and single rooms for this night
					var totalDoubleRooms = parseInt($(`#double${count}${n}`).val()) || 0;
					var totalSingleRooms = parseInt($(`#single${count}${n}`).val()) || 0;

					console.log(`Night ${n}: Total double rooms = ${totalDoubleRooms}, Total single rooms = ${totalSingleRooms}`);

					// Calculate room index range based on type
					var startIndex, endIndex;
					if (type === 'double') {
						startIndex = 1;
						endIndex = totalDoubleRooms;
					} else { // single
						startIndex = totalDoubleRooms + 1;
						endIndex = totalDoubleRooms + totalSingleRooms;
					}

					console.log(`Processing ${type} rooms from index ${startIndex} to ${endIndex}`);

					// Loop through rooms of the SAME TYPE for this night
					for (let r = startIndex; r <= endIndex; r++) {
						// Skip the current room that user is changing
						if (n === night && r === roomIndex) {
							console.log('Skipping current room - Night:', n, 'Room:', r);
							continue;
						}

						var otherRid = `${count}${n}${r}`;
						var prefix = type === 'double' ? 'd_' : 's_';

						// **IMPROVED: Use more specific selector with type prefix in ID**
						var roomCatId = `${prefix}roomcat${otherRid}`;
						var $otherRoomCat = $(`#${roomCatId}`);

						console.log(`Checking Night ${n}, Room ${r} (${type}):`, {
							otherRid: otherRid,
							roomCatId: roomCatId,
							found: $otherRoomCat.length > 0
						});

						// Verify this is the correct room type by checking rate field
						if ($otherRoomCat.length > 0) {
							var $rateField = $(`#${prefix}adult_rate${otherRid}`);

							if ($rateField.length > 0) {
								// Confirm this dropdown belongs to the same container as the rate field
								var $roomCatContainer = $otherRoomCat.closest('.row, .form-group, div[class*="room"], div[id*="room"]');
								var $rateContainer = $rateField.closest('.row, .form-group, div[class*="room"], div[id*="room"]');

								// Check if they share the same container or are in the same section
								var sameContainer = $roomCatContainer[0] === $rateContainer[0];

								if (sameContainer) {
									console.log('Propagating value:', roomCatVal, 'to', roomCatId);
									$otherRoomCat.data('programmatic-change', true)
										.data('skip-mealplan-alert', true)
										.val(roomCatVal);

									// Update Select2 if it's being used
									if ($otherRoomCat.hasClass('select2-hidden-accessible')) {
										$otherRoomCat.trigger('change.select2');
									}

									$otherRoomCat.trigger('change');
								} else {
									console.warn('Container mismatch - skipping', roomCatId);
								}
							} else {
								console.log(`Rate field #${prefix}adult_rate${otherRid} does not exist - room ${r} doesn't exist for night ${n}`);
							}
						} else {
							// Fallback: Try alternative selectors
							console.log('Primary selector failed, trying alternative...');

							// Try with data-type attribute
							$otherRoomCat = $(`#roomcat${otherRid}[data-type="${type}"]`);

							if ($otherRoomCat.length === 0) {
								// Try finding by proximity to rate field
								var $rateField = $(`#${prefix}adult_rate${otherRid}`);
								if ($rateField.length > 0) {
									var $container = $rateField.closest('.row, .form-group, div[class*="room"], div[id*="room"]');
									$otherRoomCat = $container.find(`[id="roomcat${otherRid}"]`).first();

									if ($otherRoomCat.length > 0) {
										console.log('Found roomcat by proximity to rate field');
										console.log('Propagating value:', roomCatVal, 'to roomcat', otherRid);
										$otherRoomCat.data('programmatic-change', true)
											.data('skip-mealplan-alert', true)
											.val(roomCatVal)
											.trigger('change');
									}
								}
							} else {
								console.log('Found with data-type attribute');
								console.log('Propagating value:', roomCatVal, 'to roomcat', otherRid);
								$otherRoomCat.data('programmatic-change', true)
									.data('skip-mealplan-alert', true)
									.val(roomCatVal)
									.trigger('change');
							}

							if ($otherRoomCat.length === 0) {
								console.warn('Room category dropdown not found for:', otherRid, 'type:', type);
							}
						}
					}
				}

				console.log('Propagation complete');
			} else {
				console.log('Dynamic mode - No propagation needed');
			}
		}

		// **Process the current room (whether user-triggered or programmatic)**
		if (!roomCatVal || roomCatVal === "" || roomCatVal === "0") {
			console.log('Room category cleared - resetting rates');
			var prefix = type === 'double' ? 'd_' : 's_';
			$(`#${prefix}adult_rate${rid}`).val(0);
			$(`#${prefix}child_rate${rid}`).val(0);
			$(`#${prefix}child_wb_rate${rid}`).val(0);
			$(`#${prefix}extra_bed_rate${rid}`).val(0);
			updateRoomTotals(count, night, roomIndex);
			return;
		}

		// **FIX: If in static mode and this is first room, update the display total**
		if (!getIsDynamic() && roomIndex === 1) {
			console.log('Static mode - updating display total after room category change');
			setTimeout(function() {
				updateStaticModeDisplayTotal(count);
			}, 100);
		}


		// Trigger meal plan change to fetch rates
		var prefix = type === 'double' ? 'd_' : 's_';
		var mealPlanId = `${prefix}mealplan${rid}`;
		var $mealPlan = $(`#${mealPlanId}`);

		// Fallback selectors
		if ($mealPlan.length === 0) {
			$mealPlan = $(`#mealplan${rid}[data-type="${type}"]`);
		}
		if ($mealPlan.length === 0) {
			$mealPlan = $(`#mealplan${rid}`);
		}

		console.log('Checking meal plan - selector:', mealPlanId, 'found:', $mealPlan.length > 0, 'value:', $mealPlan.val());

		if ($mealPlan.length > 0 && $mealPlan.val() && $mealPlan.val() !== "" && $mealPlan.val() !== "0") {
			console.log('Triggering meal plan change to fetch rates');
			$mealPlan.trigger('change');
		} else {
			console.log('Meal plan not selected - rates will be fetched when meal plan is selected');
			// Don't show alert for programmatic changes or when meal plan simply hasn't been selected yet
			// Only show alert if this was a user-initiated change to room category
			if (!$select.data('skip-mealplan-alert')) {
				// Check if this is the original user change (not propagated)
				var isOriginalChange = (night === parseInt($select.attr('data-night')) &&
					roomIndex === parseInt($select.attr('data-room-index')));
				if (isOriginalChange) {
					showAlert('info', 'Please select a meal plan to fetch rates for this room category.');
				}
			}
		}

		// Clean up the skip-alert flag
		$select.removeData('skip-mealplan-alert');
	});

	function toggleGSTColumns(show) {
		if (show) {
			$('.gst-column').show();
			$('.night-section').addClass('gst-visible');
		} else {
			$('.gst-column').hide();
			$('.night-section').removeClass('gst-visible');
		}
	}
</script>
<script>
	function calculateAllNightsDoubleTotal(count) {
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		var allNightsTotal = 0;
		console.log('Calculating sum of dd_total_rate across all nights for location:', count, 'Nights:', no_of_night);
		// Sum up dd_total_rate from each night
		for (let night = 1; night <= no_of_night; night++) {
			var nightTotal = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
			allNightsTotal += nightTotal;
			console.log(`Night ${night} dd_total_rate:`, nightTotal);
		}
		console.log('Total sum of all dd_total_rate:', allNightsTotal);
		return allNightsTotal;
	}

	// **NEW FUNCTION: Calculate SUM of grand totals for all single rooms across all nights**
	function calculateAllNightsSingleTotal(count) {
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		var allNightsTotal = 0;
		console.log('Calculating sum of ss_total_rate across all nights for location:', count, 'Nights:', no_of_night);
		// Sum up ss_total_rate from each night
		for (let night = 1; night <= no_of_night; night++) {
			var nightTotal = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
			allNightsTotal += nightTotal;
			console.log(`Night ${night} ss_total_rate:`, nightTotal);
		}
		console.log('Total sum of all ss_total_rate:', allNightsTotal);
		return allNightsTotal;
	}

	// FIX: Define global flag for draft loading
	var isDraftLoading = false; // Set to true during draft load, false after

	// FIX: Debounce utility for input events
	function debounce(fn, delay) {
		let timer;
		return function(...args) {
			clearTimeout(timer);
			timer = setTimeout(() => fn.apply(this, args), delay);
		};
	}
	var debouncedUpdateRoomTotals = debounce(function(count, night, roomIndex) {
		updateRoomTotals(count, night, roomIndex);
		// Trigger other updates after debounce
		if (!getIsDynamic()) {
			updateStaticModeDisplayTotal(count);
		}
		updateGrandtotalBoth();
		var veh_grand_total = get_veh_grand_total();
		$(`#loc_total${count}`).text(updateGrandtotalBoth(count) + " + " + veh_grand_total);
		$('#v_total').text(veh_grand_total);
		$('#g_total').text((updateGrandtotalBoth() + veh_grand_total));
		calculateVehicleExtraKmCharges();
	}, 300);

	  $(document).on('input', '.no_of_night', function () {
        checkTotalNights();
    });
	$(document).on('click', '#btn_add_bt', function(e) {
		// checkTotalNights()
		e.preventDefault();
		var tour_plan_div = $('.tour_plan_div').val();
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
		var vehicle_from_location_id = <?php echo $object_det[0]['vehicle_from_location'] ? $object_det[0]['vehicle_from_location'] : 0; ?>;
		var arrival_location_id = <?php echo $object_det[0]['arrival_location']; ?>;
		var departure_location_id = <?php echo $object_det[0]['departure_location']; ?>;
		var start_date = <?= json_encode($start_date); ?>;
		var tour_location_id = $('#tour_location').val();
		if (!tour_location_id) {
			alert("Please select location");
			return;
		}
		var $spinner = $('#csspinner');
		$('#btn_add_bt').attr('disabled', true);
		$spinner.show();
		$.ajax({
			url: '<?= site_url('Enquiry/getLocationName'); ?>',
			method: 'POST',
			data: {
				tour_location_id: tour_location_id,
				hotel_category_exist: hotel_category_exist
			},
			dataType: 'json',
			success: function(response) {
				if (response.length > 0) {
					var count = $('.tour_plan_div .location-card').length + 1;
					var isFirst = count === 1;
					var prevCheckout = $('.tour_plan_div .location-card:last input[name^="addloc["][name$="[checkout]"]').val();
					var checkinDate = isFirst ? start_date : prevCheckout || '';
					var ep_sel = meal_plan_exist == 1 ? "selected" : "";
					var cp_sel = meal_plan_exist == 2 ? "selected" : "";
					var map_sel = meal_plan_exist == 3 ? "selected" : "";
					var ap_sel = meal_plan_exist == 4 ? "selected" : "";
					var newCard = `
          <div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
            <div class="card">
              <div class="card-header cardy">
                <div id="eighteen_div_d${count}"></div>
                <div id="eighteen_div_s${count}"></div>
                <input type="hidden" id="tax_status${count}" name="addloc[${count}][tax_status]" value="0">
                <input type="hidden" id="own_arrange${count}" name="addloc[${count}][own_arrange]" value="0">
                <input type="hidden" id="tour_location_id${count}" name="addloc[${count}][tour_location_id]" value="${response[0].geog_id}">
                <input type="hidden" id="location_sequence${count}" name="addloc[${count}][location_sequence]" value="${count}">
                <div class="card-title"><span class="card-seq" style="color:#339966;">${count}</span>. <span style="color:#339966;">${response[0].geog_name}</span></div>
                <div class="card-options">
                  <a href="#" class="card-options-remove"><i class="fe fe-x"></i></a>
                </div>
              </div>
              <div class="card-body">
                <div class="ibox teams mb-30 bg-boxshadow">
                  <div class="ibox-content teams">
                    <div class="row mt-2">
					<div class="col-xl col-sm-12 col-md-2">
					<div class="teams-rank"><b>Hotel Category</b></div>
					<select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search input-sm hotel_cat_change" data-id="${count}" required>
					<option value="">Select</option>
					</select>
					</div>
					<div class="col-xl col-sm-12 col-md-2">
					<div class="teams-rank"><b>Hotel</b></div>
					<span class="text-muted">
					<select id="hotelid${count}" name="addloc[${count}][hotelid]" class="form-control select2-show-search input-sm hotel_change" data-id="${count}" required>
					<option value="">Select</option>
					</select>
					</span>
					</div>
					<div class="col-xl col-sm-12 col-md-2">
					<div class="teams-rank"><b>Room Category</b></div>
					<select id="roomcat_common${count}" name="addloc[${count}][roomcat_common]" class="form-control select2-show-search input-sm room_cat_common_change" data-id="${count}">
					<option value="">Select</option>
					</select>
					</div>
					<div class="col-xl col-sm-12 col-md-2">
					<div class="teams-rank"><b>Checkin</b></div>
					<span class="text-muted">
					<input type="date" value="${checkinDate}" id="checkin${count}" name="addloc[${count}][checkin]" class="form-control input-sm" required readonly>
					</span>
					</div>
					<div class="col-xl col-sm-12 col-md-2">
					<div class="teams-rank"><b>Nights</b></div>
					<span class="text-muted">
					<input type="text" id="no_of_night${count}" name="addloc[${count}][no_of_night]" class="form-control input-sm no_of_night" count-id="${count}" maxlength="2" oninput="validateNumericInput(this); calculateCheckout(${count}); updateNightlyDetails(${count});" required>
					</span>
					</div>
					
					<div class="col-xl col-sm-12 col-md-2">
					  <div class="teams-rank"><b>Checkout</b></div>
					  <span class="text-muted">
						<input type="date" id="checkout${count}" name="addloc[${count}][checkout]" class="form-control input-sm" required readonly>
					  </span>
					</div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-xl col-sm-12 col-md-2">
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
                      <div class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>No Of Adult</b></div>
                        <input type="text" id="no_of_adult${count}" name="addloc[${count}][no_of_adult]" value="${no_of_adult}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
                      </div>
                      <div class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>C.With Bed Qty</b></div>
                        <input type="text" id="no_of_ch${count}" name="addloc[${count}][no_of_ch]" value="${no_of_child_with_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
                      </div>
                      <div class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>C.Without Bed Qty</b></div>
                        <input type="text" id="no_of_cw${count}" name="addloc[${count}][no_of_cw]" value="${no_of_child_without_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
                      </div>
                      <div class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>Extra Bed Qty</b></div>
                        <input type="text" id="no_of_extra${count}" name="addloc[${count}][no_of_extra]" value="${no_of_extra_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
                      </div>
                      <div class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>Total Pax</b></div>
                        <input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly>
                        <br>
                      </div>
                    </div>
                    <div class="nightly-details" id="nightly-details${count}"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        `;
					$(".tour_plan_div").append(newCard);
					$('html, body').animate({
						scrollTop: $('.tour_plan_div .location-card:last').offset().top
					}, 500);
					$('#tour_location').val('').trigger('change');
					var breadcrumb = `
          <li class="bc-card" data-index="${count}">
            <a>
              <span class="bc-card-seq" style="color:#fff">${count}</span>.<span style="color:#fff">${response[0].geog_name}(<span id="span_night_id${count}" style="color:#fff"></span>)<span id="loc_total${count}" style="color:#fff"></span></span>
            </a>
          </li>
        `;
					$('.dyn_list').append(breadcrumb);
					var hotelCat = $('#hotelcat' + count);
					hotelCat.empty();
					if (hotel_categories.length > 1) {
						$.each(hotel_categories, function(index, hotelcat) {
							hotelCat.append('<option value="' + hotelcat.hotel_category_id + '"' + (hotelcat.hotel_category_id == hotel_category_exist ? ' selected' : '') + '>' + hotelcat.hotel_category_name + '</option>');
						});
					} else {
						hotelCat.append('<option value="">Hotel Category Not Found</option>');
					}
					hotelCat.trigger('change');
					$(`.location-card[data-index="${count}"] .select2-show-search`).select2();
					var totalNights = calculateTotalNights();
					$('#planned_night').text(totalNights + " / ");
					if (totalNights == no_of_night) {
						$("#btn_save_tour_plan").show();
						$("#btn_savedraft_tour_plan").show();
						$('#btn_add_bt').prop('disabled', true);
					} else {
						$("#btn_save_tour_plan").hide();
						$("#btn_savedraft_tour_plan").show();
						$('#btn_add_bt').prop('disabled', false);
					}
					// Manually update totals (new card is empty, but for consistency)
					var accom_grand_total = updateGrandtotalBoth();
					$('#a_total').text(accom_grand_total);
					var veh_grand_total = get_veh_grand_total();
					$('#v_total').text(veh_grand_total);
					$('#g_total').text((accom_grand_total + veh_grand_total));
					// Toggle visibility for the new card
					toggleNightsVisibility();
					calculateVehicleExtraKmCharges();
				} else {
					var halert = `<div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
          <span class="alert-inner--text">No hotels configured at this location with this hotel category</span>
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>`;
					$('#hotel_alert').html(halert);
					setTimeout(function() {
						$(".alert").fadeOut("slow", function() {
							$(this).remove();
						});
					}, 2000);
				}
			},
			complete: function() {
				$('#btn_add_bt').attr('disabled', false);
				$spinner.hide();
			},
			error: function(xhr, status, error) {
				console.error('Error adding node:', error);
				showAlert('danger', 'Failed to add location. Please try again.');
			}
		});
	});

	// Function to generate HTML for a single night
	function generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, checkinDate) {
		var nightDate = new Date(checkinDate);
		nightDate.setDate(nightDate.getDate() + night - 1);
		var day = nightDate.getDate().toString().padStart(2, '0');
		var month = (nightDate.getMonth() + 1).toString().padStart(2, '0');
		var year = nightDate.getFullYear().toString().slice(-2);
		var nightDateStr = `${day}/${month}/${year}`;
		var nightlyHtml = '';
		nightlyHtml += `<div class="night-section" data-night="${night}">
			<h3 style="color:#0000CD; text-align: center;"><b>Night ${night} (${nightDateStr}) </b><a href="#" class="close-night-btn" style="float: right; font-size: 12px;"><i class="fe fe-x"></i></a></h3>
			<div class="card p-3 mb-3" id="card_night_${count}_${night}">
			<div class="container-fluid px-2">`;
		// Double Rooms
		if (no_of_double_room > 0) {
			nightlyHtml += `<div class="row mt-2 double_row">`;
			nightlyHtml += `<div class="container-fluid px-2">
				<div class="row">
					<div class="col-xl col-sm-12 col-md-2 ps-2 room-label-col">
						<div class="teams-rank"><b>Double Room</b></div>
						<input type="text" id="double${count}${night}" name="addloc[${count}][nights][${night}][double]" value="${no_of_double_room}" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}">
					</div>
				</div>
			</div>
			</div>`;
			for (let i = 1; i <= no_of_double_room; i++) {
				let rid = `${count}${night}${i}`;
				nightlyHtml += ` <div class="row mt-2 align-items-center">
				<div style="display:none;" class="col-xl col-sm-12 col-md-2 room-type-col">
				<div class="teams-rank"><b>Double Rooms</b></div>
				<input type="text" id="double${rid}" name="addloc[${count}][nights][${night}][double][${i}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${i}">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Room Category</b></div>
				<select id="roomcat${rid}" name="addloc[${count}][nights][${night}][roomcat][${i}]" class="form-control select2-show-search input-sm room_cat_change" data-type="double" count-id="${count}" data-id="${rid}" data-night="${night}" data-room-index="${i}" required>
					<option value="">Select</option>
				</select>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Meal Plan</b></div>
				<select id="mealplan${rid}" name="addloc[${count}][nights][${night}][mealplan][${i}]" class="form-control select2-show-search input-sm mp_row_change" data-id="${rid}" data-type="double" data-count="${count}" data-night="${night}" data-room-index="${i}" required>
					<option value="">Select</option>
					<option value="1">EP</option>
					<option value="2">CP</option>
					<option value="3">MAP</option>
					<option value="4">AP</option>
				</select>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Daily Room ₹</b></div>
				<input type="text" id="d_adult_rate${rid}" name="addloc[${count}][nights][${night}][d_adult_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); debouncedUpdateRoomTotals(${count}, ${night}, ${i});" required data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>C.With Bed ₹</b></div>
				<input type="text" id="d_child_rate${rid}" name="addloc[${count}][nights][${night}][d_child_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); debouncedUpdateRoomTotals(${count}, ${night}, ${i});" data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>C.Without Bed ₹</b></div>
				<input type="text" id="d_child_wb_rate${rid}" name="addloc[${count}][nights][${night}][d_child_wb_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); debouncedUpdateRoomTotals(${count}, ${night}, ${i});" data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Extra Bed ₹</b></div>
				<input type="text" id="d_extra_bed_rate${rid}" name="addloc[${count}][nights][${night}][d_extra_bed_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); debouncedUpdateRoomTotals(${count}, ${night}, ${i});" data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2 gst-column" style="display:none; ">
				<div class="teams-rank"><b>Base Total</b></div>
				<input type="text" id="d_base_total${rid}" name="addloc[${count}][nights][${night}][d_base_total][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2 gst-column" style="display:none;">
				<div class="teams-rank"><b>GST %</b></div>
				<input type="text" id="d_gst_per${rid}" name="addloc[${count}][nights][${night}][d_gst_per][${i}]" class="form-control input-sm" data-count="${count}" maxlength="2" readonly data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2 gst-column" style="display:none;">
				<div class="teams-rank"><b>GST ₹</b></div>
				<input type="text" id="d_gst_amt${rid}" name="addloc[${count}][nights][${night}][d_gst_amt][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${i}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Total(D)</b></div>
				<input type="text" id="d_total_rate${rid}" name="addloc[${count}][nights][${night}][d_total_rate][${i}]" class="form-control input-sm d_total_rate" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${i}" value="0">
				</div>
			</div>`;
			}
			nightlyHtml += ` <div class="row mt-3">
    <div class="col-12 d-flex justify-content-end">
        <div class="col-xl col-sm-12 col-md-2 ps-2 room-label-col">
            <div class="teams-rank textlef"><b>Grand Total(D)</b></div>
            <input type="text" id="dd_total_rate${count}${night}" name="addloc[${count}][nights][${night}][dd_total_rate]" value="0" class="form-control input-sm" maxlength="6" readonly data-night="${night}"><br>
        </div>
    </div>
	</div> `;
		} else {
			nightlyHtml += `
				<input type="hidden" id="double${count}${night}" name="addloc[${count}][nights][${night}][double]" value="0" data-night="${night}">
				<input type="hidden" id="d_adult_rate${count}${night}" name="addloc[${count}][nights][${night}][d_adult_rate]" value="0" data-night="${night}">
				<input type="hidden" id="d_child_rate${count}${night}" name="addloc[${count}][nights][${night}][d_child_rate]" value="0" data-night="${night}">
				<input type="hidden" id="d_child_wb_rate${count}${night}" name="addloc[${count}][nights][${night}][d_child_wb_rate]" value="0" data-night="${night}">
				<input type="hidden" id="d_extra_bed_rate${count}${night}" name="addloc[${count}][nights][${night}][d_extra_bed_rate]" value="0" data-night="${night}">
				<input type="hidden" id="d_total_rate${count}${night}" name="addloc[${count}][nights][${night}][d_total_rate]" value="0" data-night="${night}">
				<input type="hidden" id="dd_total_rate${count}${night}" name="addloc[${count}][nights][${night}][dd_total_rate]" value="0" data-night="${night}"> `;
		}
		// Single Rooms
		let double_count = no_of_double_room > 0 ? no_of_double_room : 0;
		if (no_of_single_room > 0) {
			nightlyHtml += `<div class="row mt-2 single_row">`;
			nightlyHtml += `<div class="container-fluid px-2">
		<div class="row">
			<div class="col-xl col-sm-12 col-md-2 ps-2 room-label-col">
				<div class="teams-rank"><b>Single Room</b></div>
				<input type="text" id="single${count}${night}" name="addloc[${count}][nights][${night}][single]" value="${no_of_single_room}" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}">
			</div>
		</div>
	</div>
	</div>`;
			for (let i = 1; i <= no_of_single_room; i++) {
				let seq = double_count + i;
				let sid = `${count}${night}${seq}`;
				nightlyHtml += ` <div class="row mt-2 align-items-center">
				<div style="display:none;" class="col-xl col-sm-12 col-md-2 room-type-col">
				<div class="teams-rank"><b>Single Rooms</b></div>
				<input type="text" id="single${sid}" name="addloc[${count}][nights][${night}][single][${seq}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${seq}">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Room Category</b></div>
				<select id="roomcat${sid}" name="addloc[${count}][nights][${night}][roomcat][${seq}]" class="form-control select2-show-search input-sm room_cat_change" data-type="single" count-id="${count}" data-id="${sid}" data-night="${night}" data-room-index="${seq}" required>
					<option value="">Select</option>
				</select>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Meal Plan</b></div>
				<select id="mealplan${sid}" name="addloc[${count}][nights][${night}][mealplan][${seq}]" class="form-control select2-show-search input-sm mp_row_change" data-id="${sid}" data-type="single" data-count="${count}" data-night="${night}" data-room-index="${seq}" required>
					<option value="">Select</option>
					<option value="1">EP</option>
					<option value="2">CP</option>
					<option value="3">MAP</option>
					<option value="4">AP</option>
				</select>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Daily Room ₹</b></div>
				<input type="text" id="s_adult_rate${sid}" name="addloc[${count}][nights][${night}][s_adult_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); debouncedUpdateRoomTotals(${count}, ${night}, ${seq});" data-night="${night}" data-room-index="${seq}" value="0">
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>C.With Bed ₹</b></div>
				<input type="text" id="s_child_rate${sid}" name="addloc[${count}][nights][${night}][s_child_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" data-night="${night}" data-room-index="${seq}" value="0" readonly>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>C.Without Bed ₹</b></div>
				<input type="text" id="s_child_wb_rate${sid}" name="addloc[${count}][nights][${night}][s_child_wb_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" data-night="${night}" data-room-index="${seq}" value="0" readonly>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Extra Bed ₹</b></div>
				<input type="text" id="s_extra_bed_rate${sid}" name="addloc[${count}][nights][${night}][s_extra_bed_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" data-night="${night}" data-room-index="${seq}" value="0" readonly>
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2 gst-column" style="display:none;">
				<div class="teams-rank"><b>Base Total</b></div>
				<input type="text" id="s_base_total${sid}" name="addloc[${count}][nights][${night}][s_base_total][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${seq}" value="0" readonly >
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2 gst-column" style="display:none;">
				<div class="teams-rank"><b>GST %</b></div>
				<input type="text" id="s_gst_per${sid}" name="addloc[${count}][nights][${night}][s_gst_per][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="2" readonly data-night="${night}" data-room-index="${seq}" value="0" readonly >
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2 gst-column" style="display:none;">
				<div class="teams-rank"><b>GST ₹</b></div>
				<input type="text" id="s_gst_amt${sid}" name="addloc[${count}][nights][${night}][s_gst_amt][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${seq}" value="0" readonly >
				</div>
				<div class="col-xl col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Total(S)</b></div>
				<input type="text" id="s_total_rate${sid}" name="addloc[${count}][nights][${night}][s_total_rate][${seq}]" class="form-control input-sm s_total_rate" data-count="${count}" maxlength="6" data-night="${night}" data-room-index="${seq}" value="0" readonly>
				</div>
			</div>`;
			}
			nightlyHtml += ` <div class="row mt-3">
    <div class="col-12 d-flex justify-content-end">
        <div class="col-xl col-sm-12 col-md-2 ps-2 room-label-col">
            <div class="teams-rank textlef"><b>Grand Total(S)</b></div>
            <input type="text" id="ss_total_rate${count}${night}" name="addloc[${count}][nights][${night}][ss_total_rate]" value="0" class="form-control input-sm" maxlength="6" readonly data-night="${night}"><br>
        </div>
    </div>
	</div> `;
		} else {
			nightlyHtml += `
			<input type="hidden" id="single${count}${night}" name="addloc[${count}][nights][${night}][single]" value="0" data-night="${night}">
			<input type="hidden" id="s_adult_rate${count}${night}" name="addloc[${count}][nights][${night}][s_adult_rate]" value="0" data-night="${night}">
			<input type="hidden" id="s_child_rate${count}${night}" name="addloc[${count}][nights][${night}][s_child_rate]" value="0" data-night="${night}">
			<input type="hidden" id="s_child_wb_rate${count}${night}" name="addloc[${count}][nights][${night}][s_child_wb_rate]" value="0" data-night="${night}">
			<input type="hidden" id="s_extra_bed_rate${count}${night}" name="addloc[${count}][nights][${night}][s_extra_bed_rate]" value="0" data-night="${night}">
			<input type="hidden" id="s_total_rate${count}${night}" name="addloc[${count}][nights][${night}][s_total_rate]" value="0" data-night="${night}">
			<input type="hidden" id="ss_total_rate${count}${night}" name="addloc[${count}][nights][${night}][ss_total_rate]" value="0" data-night="${night}"> `;
		}
		// Vehicle Details (keeping existing code)
		if (is_vehicle_required == 1) {
			nightlyHtml += ` <div class="row mt-2 vehicle-details-section">
			<div class="col-12 text-center ps-2">
				<a id="loadvehs${count}${night}" class="nav-link load_vehs_click d-inline-block me-2" data-id="${count}" data-night="${night}" data-loaded="false">
				<i class="fa fa-refresh"></i>
				</a>
				<h5 class="d-inline-block" style="color:#003300; margin: 0; vertical-align: middle;"> Vehicle Details<span id="v_from_to${count}${night}"></span> </h5>
			</div>
			</div>
			<input type="hidden" id="veh_header${count}${night}" name="addloc[${count}][nights][${night}][veh_header]" value="" data-night="${night}">
			<input type="hidden" id="pre_to_cur${count}${night}" name="addloc[${count}][nights][${night}][pre_to_cur]" value="" data-night="${night}">
			<input type="hidden" id="cur_to_dep${count}${night}" name="addloc[${count}][nights][${night}][cur_to_dep]" value="" data-night="${night}">
			<input type="hidden" id="dep_to_arr${count}${night}" name="addloc[${count}][nights][${night}][dep_to_arr]" value="" data-night="${night}">
			<input type="hidden" id="hub_to_arr${count}${night}" name="addloc[${count}][nights][${night}][hub_to_arr]" value="" data-night="${night}">
			<input type="hidden" id="arr_to_loc${count}${night}" name="addloc[${count}][nights][${night}][arr_to_loc]" value="" data-night="${night}">
			<div class="row mt-2 single_row vehicle-rows">
			<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Vehicle Model</b></div>
			</div>
			<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Vehicle Count</b></div>
			</div>
			<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Daily Rent</b></div>
			</div>
			<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Max KM/Day</b></div>
			</div>
			<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Distance</b></div>
			</div>
			<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Extra KM</b></div>
			</div>
			<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Extra KM Rate</b></div>
			</div>
			<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<div class="teams-rank"><b>Total</b></div>
			</div>
			</div> `;
			$.each(vehicle_models, function(vindex, vmodel) {
				let vid = `${count}${night}${vmodel.vehicle_type_id}`;
				nightlyHtml += ` <div class="row mt-2 single_row align-items-center vehicle-row">
				<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<input type="text" id="veh_model${vid}" name="addloc[${count}][nights][${night}][veh_model][${vindex}]" value="${vmodel.vehicle_model_name}" class="form-control input-sm veh_model${vindex}" readonly data-night="${night}" data-veh-index="${vindex}">
				<input type="hidden" id="veh_type_id${vid}" name="addloc[${count}][nights][${night}][veh_type_id][${vindex}]" value="${vmodel.vehicle_type_id}" class="form-control input-sm veh_type_id${vindex}" data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<input type="text" id="veh_count${vid}" name="addloc[${count}][nights][${night}][veh_count][${vindex}]" value="${vmodel.vehicle_count}" class="form-control input-sm veh_count${vindex}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<input type="text" id="day_rent${vid}" name="addloc[${count}][nights][${night}][day_rent][${vindex}]" value="0" class="form-control input-sm cls_daily day_rent${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this); updateVehicleTotals(${count}, ${night}, ${vindex});" data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<input type="text" id="max_km_day${vid}" name="addloc[${count}][nights][${night}][max_km_day][${vindex}]" value="0" class="form-control input-sm max_km_day${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<input type="text" id="travel_distance${vid}" name="addloc[${count}][nights][${night}][travel_distance][${vindex}]" value="0" class="form-control input-sm cls_dist travel_distance${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this); updateVehicleTotals(${count}, ${night}, ${vindex});" data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<input type="text" id="extra_kilometer${vid}" name="addloc[${count}][nights][${night}][extra_kilometer][${vindex}]" value="0" class="form-control input-sm extra_kilometer${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
				<input type="text" id="extra_km_rate${vid}" name="addloc[${count}][nights][${night}][extra_km_rate][${vindex}]" value="0" class="form-control readonly input-sm extra_km_rate${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${night}" data-veh-index="${vindex}">
				</div>
				<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
				<input type="text" id="veh_total${vid}" name="addloc[${count}][nights][${night}][veh_total][${vindex}]" value="0" class="form-control input-sm munn${vindex}" maxlength="5" readonly data-night="${night}" data-veh-index="${vindex}">
				</div>
			</div>`;
			});
			nightlyHtml += ` <div class="row mt-3">
			<div class="col-12 d-flex justify-content-end">
				<div class="col-xl-1.3 col-sm-12 col-md-2">
				<div class="teams-rank"><b>Grand Total(Vehicle)</b></div>
				<input type="text" id="veh_grand_total${count}${night}" name="addloc[${count}][nights][${night}][veh_grand_total]" value="0" class="form-control input-sm" maxlength="6" readonly data-night="${night}">
				</div>
			</div>
			</div> `;
		} else {
			nightlyHtml += `
			<input type="hidden" id="veh_model${count}${night}0" name="addloc[${count}][nights][${night}][veh_model][0]" value="" data-night="${night}">
			<input type="hidden" id="veh_count${count}${night}0" name="addloc[${count}][nights][${night}][veh_count][0]" value="0" data-night="${night}">
			<input type="hidden" id="day_rent${count}${night}0" name="addloc[${count}][nights][${night}][day_rent][0]" value="0" data-night="${night}">
			<input type="hidden" id="max_km_day${count}${night}0" name="addloc[${count}][nights][${night}][max_km_day][0]" value="0" data-night="${night}">
			<input type="hidden" id="extra_km_rate${count}${night}0" name="addloc[${count}][nights][${night}][extra_km_rate][0]" value="0" data-night="${night}">
			<input type="hidden" id="veh_total${count}${night}0" name="addloc[${count}][nights][${night}][veh_total][0]" value="0" data-night="${night}">
			<input type="hidden" id="veh_grand_total${count}${night}" name="addloc[${count}][nights][${night}][veh_grand_total]" value="0" data-night="${night}"> `;
		}
		nightlyHtml += `</div></div></div>`;
		return nightlyHtml;
	}


	// Function to collect all night data for a location
	function collectAllNightData(count) {
		var nightData = {};
		$(`[name^="addloc[${count}][nights]"]`).each(function() {
			var $el = $(this);
			var name = $el.attr('name');
			var val = $el.val();
			var match = name.match(/addloc\[\d+\]\[nights\]\[(\d+)\](.*)/);
			if (match) {
				var night = parseInt(match[1]);
				var subPath = match[2];
				if (!nightData[night]) {
					nightData[night] = {};
				}
				nightData[night][subPath] = val;
			}
		});
		return nightData;
	}

	// Function to propagate room data in static mode
	function propagateRoomData(count, night, type) {
		var firstRidStr = count + '' + night + '1';
		var numRooms = parseInt($(`#${type}${count}${night}`).val()) || 0;
		if (numRooms < 2) return;
		// Get values from first room
		var rcVal = $(`#roomcat${firstRidStr}`).val();
		var mpVal = $(`#mealplan${firstRidStr}`).val();
		var ratePrefix = (type === 'double' ? 'd_' : 's_');
		var adultVal = $(`#${ratePrefix}adult_rate${firstRidStr}`).val() || '';
		var childVal = $(`#${ratePrefix}child_rate${firstRidStr}`).val() || '';
		var childWbVal = $(`#${ratePrefix}child_wb_rate${firstRidStr}`).val() || '';
		var extraVal = $(`#${ratePrefix}extra_bed_rate${firstRidStr}`).val() || '';
		// Propagate to other rooms
		for (let i = 2; i <= numRooms; i++) {
			var thisRidStr = count + '' + night + i;
			$(`#roomcat${thisRidStr}`).val(rcVal);
			$(`#mealplan${thisRidStr}`).val(mpVal);
			$(`#${ratePrefix}adult_rate${thisRidStr}`).val(adultVal);
			$(`#${ratePrefix}child_rate${thisRidStr}`).val(childVal);
			$(`#${ratePrefix}child_wb_rate${thisRidStr}`).val(childWbVal);
			$(`#${ratePrefix}extra_bed_rate${thisRidStr}`).val(extraVal);
			updateRoomTotals(count, night, i);
		}
	}

	// Pre-select meal plan if exists
	var meal_plan_exist = <?php echo $object_det[0]['meal_plan']; ?>;
	$(document).ready(function() {
		if (meal_plan_exist && meal_plan_exist !== "0" && meal_plan_exist !== "") {
			console.log('Pre-selecting meal plan:', meal_plan_exist);
			// Select all meal plan dropdowns with class 'mp_row_change'
			$('.mp_row_change').each(function() {
				var $mealPlanDropdown = $(this);
				// Set the value
				$mealPlanDropdown.val(meal_plan_exist);
				// If using Select2, trigger it properly
				if ($mealPlanDropdown.hasClass('select2-hidden-accessible')) {
					$mealPlanDropdown.trigger('change.select2');
				}
				console.log('Meal plan set for dropdown:', $mealPlanDropdown.attr('id'), 'Value:', meal_plan_exist);
			});
		}
	});

	// **NEW FUNCTION: Update static mode display with total across all nights**
	function updateStaticModeDisplayTotal(count) {
		var $firstNightSection = $(`#nightly-details${count} .night-section[data-night="1"]`);
		if (!$firstNightSection.length) return;

		// Calculate totals across ALL nights using GRAND TOTALS
		var allNightsDoubleTotal = calculateAllNightsDoubleTotal(count);
		var allNightsSingleTotal = calculateAllNightsSingleTotal(count);

		console.log('Updating static display:', {
			count: count,
			doubleTotal: allNightsDoubleTotal,
			singleTotal: allNightsSingleTotal
		});

		// Update the displayed total in first row (double room) - d_total_rate field
		var $firstDoubleRow = $firstNightSection.find('.row.mt-2.align-items-center').filter(function() {
			return $(this).find('input[id^="d_adult_rate"]').length > 0;
		}).first();

		if ($firstDoubleRow.length) {
			var $doubleTotalField = $firstDoubleRow.find('input[id^="d_total_rate"]');
			if ($doubleTotalField.length) {
				$doubleTotalField.val(Math.round(allNightsDoubleTotal));
				console.log('Updated double total field to:', allNightsDoubleTotal);
			}
		}

		// Update the displayed total in first row (single room) - s_total_rate field
		var $firstSingleRow = $firstNightSection.find('.row.mt-2.align-items-center').filter(function() {
			return $(this).find('input[id^="s_adult_rate"]').length > 0;
		}).first();

		if ($firstSingleRow.length) {
			var $singleTotalField = $firstSingleRow.find('input[id^="s_total_rate"]');
			if ($singleTotalField.length) {
				$singleTotalField.val(Math.round(allNightsSingleTotal));
				console.log('Updated single total field to:', allNightsSingleTotal);
			}
		}
	}

	function calculateDoubleGrandTotalStatic(count, night) {
		var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		if (double_qty === 0) {
			$(`#dd_total_rate${count}${night}`).val(0);
			return;
		}
		// Get rates from FIRST room (they're all the same in static mode)
		var firstRid = `${count}${night}1`;
		var d_adult_rate = parseFloat($(`#d_adult_rate${firstRid}`).val()) || 0;
		var d_child_rate = parseFloat($(`#d_child_rate${firstRid}`).val()) || 0;
		var d_child_wb_rate = parseFloat($(`#d_child_wb_rate${firstRid}`).val()) || 0;
		var d_extra_bed_rate = parseFloat($(`#d_extra_bed_rate${firstRid}`).val()) || 0;
		// FIX: Use distribution for child/extra beds like dynamic mode
		var dd_total = 0;
		for (let i = 1; i <= double_qty; i++) {
			var childCount = calculateDistribution(no_of_ch, double_qty, i);
			var childWbCount = calculateDistribution(no_of_cw, double_qty, i);
			var extraCount = calculateDistribution(no_of_extra, double_qty, i);
			dd_total += d_adult_rate + (childCount * d_child_rate) + (childWbCount * d_child_wb_rate) + (extraCount * d_extra_bed_rate);
		}
		console.log(`Double Grand Total Calc for Night ${night}: dd_total = ${dd_total}`);
		$(`#dd_total_rate${count}${night}`).val(Math.round(dd_total));
	}

	// FIX: Similar for single
	function calculateSingleGrandTotalStatic(count, night) {
		var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		var single_qty = parseInt($(`#single${count}${night}`).val()) || 0;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		if (single_qty === 0) {
			$(`#ss_total_rate${count}${night}`).val(0);
			return;
		}
		// Get rates from FIRST single room
		var firstSingleRoomIndex = double_qty + 1;
		var firstRid = `${count}${night}${firstSingleRoomIndex}`;
		var s_adult_rate = parseFloat($(`#s_adult_rate${firstRid}`).val()) || 0;
		var s_child_rate = parseFloat($(`#s_child_rate${firstRid}`).val()) || 0;
		var s_child_wb_rate = parseFloat($(`#s_child_wb_rate${firstRid}`).val()) || 0;
		var s_extra_bed_rate = parseFloat($(`#s_extra_bed_rate${firstRid}`).val()) || 0;
		// FIX: Use distribution
		var ss_total = 0;
		for (let i = 1; i <= single_qty; i++) {
			var childCount = calculateDistribution(no_of_ch, single_qty, i);
			var childWbCount = calculateDistribution(no_of_cw, single_qty, i);
			var extraCount = calculateDistribution(no_of_extra, single_qty, i);
			ss_total += s_adult_rate + (childCount * s_child_rate) + (childWbCount * s_child_wb_rate) + (extraCount * s_extra_bed_rate);
		}
		console.log(`Single Grand Total Calc for Night ${night}: ss_total = ${ss_total}`);
		$(`#ss_total_rate${count}${night}`).val(Math.round(ss_total));
	}

	function generateVehicleSummary(count, no_of_night, vehicle_models) {
		// **ADD: Remove any existing summary first (defensive check)**
		$(`#vehicle-summary-${count}`).remove();
		// Build night labels with vehicle details
		var nightLabels = '';
		for (let i = 1; i <= no_of_night; i++) {
			var vFromTo = $(`#v_from_to${count}${i}`).text().trim();
			if (vFromTo && vFromTo !== '') {
				vFromTo = vFromTo.replace(/^\s*-\s*/, '');
				nightLabels += vFromTo;
			} else {
				nightLabels += `N${i}`;
			}
			if (i < no_of_night) {
				nightLabels += ' + ';
			}
		}
		var summaryHtml = `
		<div class="vehicle-summary-section mt-4" id="vehicle-summary-${count}">
			<div style="text-align: center; margin-bottom: 15px;">
				<a href="#" class="refresh-vehicle-summary d-inline-block me-2" data-count="${count}" style="font-size: 16px; color: #003300; text-decoration: none; vertical-align: middle;" title="Refresh Vehicle Data">
					<i class="fa fa-refresh"></i>
				</a>
				<h5 class="d-inline-block" style="color:#003300; margin: 0; vertical-align: middle;" id="vehicle-summary-header-${count}">Vehicle Summary (${nightLabels})</h5>
			</div>
			<div class="card p-3 mb-3">
				<div class="container-fluid px-2">
					<div class="row mt-2 single_row">
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Vehicle Model</b></div>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Vehicle Count</b></div>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Total Days</b></div>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Daily Rent</b></div>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Total Distance</b></div>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Extra KM Rate</b></div>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Total Extra KM</b></div>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Grand Total</b></div>
						</div>
					</div>`;
		$.each(vehicle_models, function(vindex, vmodel) {
			summaryHtml += `
					<div class="row mt-2 single_row align-items-center">
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_model_name]" value="${vmodel.vehicle_model_name}" class="form-control input-sm" readonly>
							<input type="hidden" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_type_id]" value="${vmodel.vehicle_type_id}">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_count]" value="${vmodel.vehicle_count}" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_days]" id="summary_days_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][daily_rent]" id="summary_rent_${count}_${vindex}" value="0" class="form-control input-sm summary-daily-rent" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_distance]" id="summary_distance_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][extra_km_rate]" id="summary_extra_km_rate_${count}_${vindex}" readonly value="0" class="form-control input-sm summary-extra-km-rate" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_extra_km]" id="summary_extra_km_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" name="addloc[${count}][vehicle_summary][${vindex}][grand_total]" id="summary_total_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
						</div>
					</div>`;
		});
		summaryHtml += `
					<div class="row mt-3">
						<div class="col-12 d-flex justify-content-end">
							<div class="col-xl-2 col-sm-12 col-md-2">
								<div class="teams-rank"><b>Overall Vehicle Total</b></div>
								<input type="text" name="addloc[${count}][vehicle_summary_total]" id="summary_overall_total_${count}" value="0" class="form-control input-sm" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`;
		return summaryHtml;
	}

	// Event listener for daily rent changes in summary
	$(document).on('change', '.summary-daily-rent', function() {
		var count = $(this).data('count');
		var vindex = $(this).data('vindex');
		updateAllNightsDailyRent(count, vindex);
	});

	// Event listener for extra KM rate changes in summary
	$(document).on('change', '.summary-extra-km-rate', function() {
		var count = $(this).data('count');
		var vindex = $(this).data('vindex');
		updateAllNightsExtraKmRate(count, vindex);
	});

	// Optional: Also update on input for real-time feedback
	$(document).on('input', '.summary-daily-rent, .summary-extra-km-rate', function() {
		var count = $(this).data('count');
		var vindex = $(this).data('vindex');
		if ($(this).hasClass('summary-daily-rent')) {
			updateAllNightsDailyRent(count, vindex);
		} else {
			updateAllNightsExtraKmRate(count, vindex);
		}
	});

	// Function to update extra KM rate across all nights
	function updateAllNightsExtraKmRate(count, vindex) {
		var extraKmRate = parseFloat($(`#summary_extra_km_rate_${count}_${vindex}`).val()) || 0;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var vehicle_type_id = vehicle_models[vindex].vehicle_type_id;
		// Update extra KM rate for all nights
		for (let night = 1; night <= no_of_night; night++) {
			var vid = `${count}${night}${vehicle_type_id}`;
			$(`#extra_km_rate${vid}`).val(extraKmRate);
			updateVehicleTotals(count, night, vindex);
		}
		// Update vehicle summary
		updateVehicleSummary(count);
	}

	// Function to update daily rent across all nights
	function updateAllNightsDailyRent(count, vindex) {
		var dailyRent = parseFloat($(`#summary_rent_${count}_${vindex}`).val()) || 0;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var vehicle_type_id = vehicle_models[vindex].vehicle_type_id;
		// Update daily rent for all nights
		for (let night = 1; night <= no_of_night; night++) {
			var vid = `${count}${night}${vehicle_type_id}`;
			$(`#day_rent${vid}`).val(dailyRent);
			updateVehicleTotals(count, night, vindex);
		}
		// Update vehicle summary
		updateVehicleSummary(count);
	}

	// Refresh vehicle summary handler
	$(document).on('click', '.refresh-vehicle-summary', function(e) {
		e.preventDefault();
		var count = $(this).attr('data-count');
		var $spinner = $('#csspinner');
		$spinner.show();
		// Trigger click on all load_vehs_click for this location
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		var clicksCompleted = 0;
		for (let night = 1; night <= no_of_night; night++) {
			var $loadBtn = $(`#loadvehs${count}${night}`);
			if ($loadBtn.length > 0) {
				// Simulate click with a small delay
				setTimeout(function() {
					$loadBtn.trigger('click');
					clicksCompleted++;
					// Update summary after last click
					if (clicksCompleted === no_of_night) {
						setTimeout(function() {
							updateVehicleSummary(count);
							$spinner.hide();
							showAlert('success', 'Vehicle data refreshed successfully!');
						}, 500);
					}
				}, night * 200); // Stagger the clicks
			}
		}
		// If no nights or no load buttons, just hide spinner
		if (no_of_night === 0) {
			$spinner.hide();
			showAlert('warning', 'No nights configured to refresh.');
		}
	});

	// Update vehicle summary function - FIXED VERSION
	// Update vehicle summary function - FIXED VERSION
	function updateVehicleSummary(count) {
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required != 1) return;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		if (no_of_night < 1) {
			$(`#vehicle-summary-${count}`).hide();
			return;
		}

		// FIX: Hide in dynamic mode
		var showSummary = !getIsDynamic();
		if (showSummary) {
			$(`#vehicle-summary-${count}`).show();
		} else {
			$(`#vehicle-summary-${count}`).hide();
		}

		// Update header with vehicle details
		var nightLabels = [];
		for (let i = 1; i <= no_of_night; i++) {
			var vFromTo = $(`#v_from_to${count}${i}`).text().trim();
			if (vFromTo && vFromTo !== '') {
				vFromTo = vFromTo.replace(/^\s*-\s*/, '');
				nightLabels.push(vFromTo);
			} else {
				nightLabels.push(`N${i}`);
			}
		}

		// FIX: Update only the span text, preserve the icon (no duplicate icons)
		var $header = $(`#vehicle-summary-header-${count}`);
		var $textSpan = $header.find('span');

		if ($textSpan.length > 0) {
			// Update existing span
			$textSpan.text('Vehicle Summary (' + nightLabels.join(' + ') + ')');
		} else {
			// Fallback: Update h5 to contain only the text span, icon is outside
			$header.html('<span>Vehicle Summary (' + nightLabels.join(' + ') + ')</span>');
		}

		$header.css({
			'text-align': 'center',
			'display': 'inline-block',
			'vertical-align': 'middle' // Align with the icon in the parent div
		});

		var overallTotal = 0;
		$.each(vehicle_models, function(vindex, vmodel) {
			var totalDays = 0;
			var dailyRent = 0;
			var totalDistance = 0;
			var totalExtraKm = 0;
			var extraKmRate = 0;
			var totalAmount = 0;

			// Sum up values from ALL nights
			for (let night = 1; night <= no_of_night; night++) {
				var vid = `${count}${night}${vmodel.vehicle_type_id}`;
				var dayRent = parseFloat($(`#day_rent${vid}`).val()) || 0;
				var distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
				var extraKm = parseFloat($(`#extra_kilometer${vid}`).val()) || 0;
				var vehTotal = parseFloat($(`#veh_total${vid}`).val()) || 0;
				var kmRate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;

				if (dayRent > 0 || distance > 0) {
					totalDays++;
				}

				// Take first night's values for rates
				if (night === 1 || dailyRent === 0) {
					dailyRent = dayRent;
				}
				if (night === 1) {
					extraKmRate = kmRate;
				}

				totalDistance += distance;
				totalExtraKm += extraKm;
				totalAmount += vehTotal;
			}

			// Update summary fields (only if not currently being edited)
			var $rentField = $(`#summary_rent_${count}_${vindex}`);
			var $rateField = $(`#summary_extra_km_rate_${count}_${vindex}`);

			if (!$rentField.is(':focus')) {
				$rentField.val(dailyRent);
			}
			if (!$rateField.is(':focus')) {
				$rateField.val(extraKmRate);
			}

			$(`#summary_days_${count}_${vindex}`).val(totalDays);
			$(`#summary_distance_${count}_${vindex}`).val(totalDistance);
			$(`#summary_extra_km_${count}_${vindex}`).val(totalExtraKm);
			$(`#summary_total_${count}_${vindex}`).val(Math.round(totalAmount));

			overallTotal += totalAmount;
		});

		// Update overall total
		$(`#summary_overall_total_${count}`).val(Math.round(overallTotal));
	}
	// Show alert function
	function showAlert(type, message) {
		var iconClass = type === 'success' ? 'fe-check-circle' : type === 'danger' ? 'fe-alert-triangle' : type === 'warning' ? 'fe-alert-circle' : 'fe-info';
		var alertHtml = `
    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
      <span class="alert-inner--icon"><i class="fe ${iconClass}"></i></span>
      <span class="alert-inner--text">${message}</span>
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>`;
		$('#hotel_alert').html(alertHtml);
		setTimeout(function() {
			$(".alert").fadeOut("slow", function() {
				$(this).remove();
			});
		}, 3000);
	}

	if (typeof validateNumericInput !== 'function') {
		function validateNumericInput(input) {
			input.value = input.value.replace(/\D/g, '');
		}
	}

	// Update vehicle totals function
	function updateVehicleTotals(count, night, vindex) {
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var vehicle_type_id = vehicle_models[vindex].vehicle_type_id;
		var vid = `${count}${night}${vehicle_type_id}`;
		var day_rent = parseFloat($(`#day_rent${vid}`).val()) || 0;
		var travel_distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
		var max_km_day = parseFloat($(`#max_km_day${vid}`).val()) || 0;
		var extra_km_rate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;
		var extra_kilometer = travel_distance > max_km_day ? travel_distance - max_km_day : 0;
		var v_count = parseInt($(`#veh_count${vid}`).val()) || 1;
		$(`#extra_kilometer${vid}`).val(extra_kilometer);
		var veh_total = day_rent * v_count;
		$(`#veh_total${vid}`).val(veh_total);
		// Update grand total for vehicles in this night
		var veh_grand_total = 0;
		$(`#nightly-details${count} .night-section[data-night="${night}"] input[id^="veh_total"]`).each(function() {
			veh_grand_total += parseFloat($(this).val()) || 0;
		});
		$(`#veh_grand_total${count}${night}`).val(veh_grand_total);
		// Update vehicle summary
		updateVehicleSummary(count);
		// Update overall vehicle grand total
		get_veh_grand_total();
		// Update extra km charges if that function exists
		if (typeof calculateVehicleExtraKmCharges === 'function') {
			calculateVehicleExtraKmCharges();
		}
	}

	// Helper to get dynamic mode state
	function getIsDynamic() {
		var checkbox = document.getElementById('dynamicNeeded'); // Use the correct ID from the top of your script
		if (!checkbox) {
			console.warn('Dynamic checkbox not found; defaulting to false');
			return false;
		}
		return checkbox.checked;
	}

	// Make it globally available if needed
	window.getIsDynamic = getIsDynamic;

	// ADDITIONAL FUNCTION: Ensure vehicle summary data is included in form submission
	function ensureVehicleSummaryInForm() {
		$('.location-card').each(function() {
			var count = $(this).attr('data-index');
			var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			if (no_of_night < 1) return;
			// Force update of vehicle summary data before form submission
			updateVehicleSummary(count);
			console.log('Vehicle Summary Data for location ' + count + ':', {
				overall_total: $(`#summary_overall_total_${count}`).val(),
				vehicle_count: vehicle_models.length
			});
		});
	}

	// Call this function before form submission
	$(document).on('click', '#btn_save_tour_plan, #btn_savedraft_tour_plan', function(e) {
		// Ensure vehicle summary data is updated
		ensureVehicleSummaryInForm();
		// Add a small delay to ensure DOM is updated
		setTimeout(function() {
			// Debug: Log all vehicle summary form data
			$('input[name^="addloc"][name*="vehicle_summary"]').each(function() {
				console.log('Vehicle Summary Field:', $(this).attr('name'), '=', $(this).val());
			});
		}, 100);
	});

	// Updated updateRoomTotals function with fix for static mode totals
	function calculateDistribution(totalItems, totalRooms, roomIndex) {
		if (totalItems === 0 || totalRooms === 0) return 0;

		var count = 0;
		for (let i = 1; i <= totalItems; i++) {
			var targetRoom = ((i - 1) % totalRooms) + 1;
			if (targetRoom === roomIndex) count++;
		}
		return count;
	}

	// **UPDATED: Set rates with round-robin zeros applied**
	// Call this function RIGHT AFTER getting rates from AJAX
	function setRoomRatesWithRoundRobin(count, night, roomIndex, type, rates) {
		var rid = `${count}${night}${roomIndex}`;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;

		console.log('setRoomRatesWithRoundRobin:', {
			rid,
			type,
			no_of_ch,
			no_of_cw,
			no_of_extra
		});

		if (type === 'double') {
			var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;

			// Calculate what this room gets in round-robin
			var childCount = calculateDistribution(no_of_ch, double_qty, roomIndex);
			var childWbCount = calculateDistribution(no_of_cw, double_qty, roomIndex);
			var extraCount = calculateDistribution(no_of_extra, double_qty, roomIndex);

			console.log('Double room distribution:', {
				childCount,
				childWbCount,
				extraCount
			});

			// Set adult rate (always gets value)
			$(`#d_adult_rate${rid}`).prop("readonly", false).val(rates.room_r || 0);

			// Set child with bed rate - 0 if this room doesn't get any
			if (childCount > 0) {
				$(`#d_child_rate${rid}`).prop("readonly", false).val(rates.child_r || 0);
			} else {
				$(`#d_child_rate${rid}`).prop("readonly", false).val(0);
			}

			// Set child without bed rate - 0 if this room doesn't get any
			if (childWbCount > 0) {
				$(`#d_child_wb_rate${rid}`).prop("readonly", false).val(rates.child_wb_r || 0);
			} else {
				$(`#d_child_wb_rate${rid}`).prop("readonly", false).val(0);
			}

			// Set extra bed rate - 0 if this room doesn't get any
			if (extraCount > 0) {
				$(`#d_extra_bed_rate${rid}`).prop("readonly", false).val(rates.extra_r || 0);
			} else {
				$(`#d_extra_bed_rate${rid}`).prop("readonly", false).val(0);
			}

			console.log('Double room rates set:', {
				adult: $(`#d_adult_rate${rid}`).val(),
				child: $(`#d_child_rate${rid}`).val(),
				childWb: $(`#d_child_wb_rate${rid}`).val(),
				extra: $(`#d_extra_bed_rate${rid}`).val()
			});

		} else if (type === 'single') {
			var single_qty = parseInt($(`#single${count}${night}`).val()) || 0;

			// Single rooms: typically only adult rate, others are 0
			$(`#s_adult_rate${rid}`).prop("readonly", false).val(rates.room_r || 0);
			$(`#s_child_rate${rid}`).prop("readonly", true).val(0);
			$(`#s_child_wb_rate${rid}`).prop("readonly", true).val(0);
			$(`#s_extra_bed_rate${rid}`).prop("readonly", true).val(0);

			console.log('Single room rates set:', {
				adult: $(`#s_adult_rate${rid}`).val(),
				child: 0,
				childWb: 0,
				extra: 0
			});
		}
	}

	// Updated updateRoomTotals - ONLY calculates totals, doesn't modify rates
	function updateRoomTotals(count, night, roomIndex) {
		var rid = `${count}${night}${roomIndex}`;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		var single_qty = parseInt($(`#single${count}${night}`).val()) || 0;
		var tax_status = parseInt($(`#tax_status${count}`).val()) || 0;

		console.log('updateRoomTotals called:', {
			count,
			night,
			roomIndex,
			rid
		});

		if ($(`#d_adult_rate${rid}`).length > 0) {
			// Double room - READ current values
			var d_adult_rate = parseFloat($(`#d_adult_rate${rid}`).val()) || 0;
			var d_child_rate = parseFloat($(`#d_child_rate${rid}`).val()) || 0;
			var d_child_wb_rate = parseFloat($(`#d_child_wb_rate${rid}`).val()) || 0;
			var d_extra_bed_rate = parseFloat($(`#d_extra_bed_rate${rid}`).val()) || 0;

			// Calculate distribution
			var childCount = calculateDistribution(no_of_ch, double_qty, roomIndex);
			var childWbCount = calculateDistribution(no_of_cw, double_qty, roomIndex);
			var extraCount = calculateDistribution(no_of_extra, double_qty, roomIndex);

			// Calculate base total - if rate is 0, contribution is 0
			var baseTotal = d_adult_rate +
				(childCount * d_child_rate) +
				(childWbCount * d_child_wb_rate) +
				(extraCount * d_extra_bed_rate);

			$(`#d_base_total${rid}`).val(Math.round(baseTotal));

			// Apply GST
			var finalTotal = baseTotal;
			var gstPercent = 0;
			var gstAmount = 0;

			if (tax_status == 1 && baseTotal > 0) {
				gstPercent = baseTotal >= 7500 ? 18 : 5;
				gstAmount = (gstPercent / 100) * baseTotal;
				finalTotal = baseTotal + gstAmount;

				$(`#d_gst_per${rid}`).val(gstPercent);
				$(`#d_gst_amt${rid}`).val(Math.round(gstAmount));
			} else {
				$(`#d_gst_per${rid}`).val(0);
				$(`#d_gst_amt${rid}`).val(0);
			}

			$(`#d_total_rate${rid}`).val(Math.round(finalTotal));
			calculateDoubleGrandTotal(count, night);

		} else if ($(`#s_adult_rate${rid}`).length > 0) {
			// Single room - READ current values
			var s_adult_rate = parseFloat($(`#s_adult_rate${rid}`).val()) || 0;
			var s_child_rate = parseFloat($(`#s_child_rate${rid}`).val()) || 0;
			var s_child_wb_rate = parseFloat($(`#s_child_wb_rate${rid}`).val()) || 0;
			var s_extra_bed_rate = parseFloat($(`#s_extra_bed_rate${rid}`).val()) || 0;

			var baseTotal = s_adult_rate;
			$(`#s_base_total${rid}`).val(Math.round(baseTotal));

			// Apply GST
			var finalTotal = baseTotal;
			var gstPercent = 0;
			var gstAmount = 0;

			if (tax_status == 1 && baseTotal > 0) {
				gstPercent = baseTotal >= 7500 ? 18 : 5;
				gstAmount = (gstPercent / 100) * baseTotal;
				finalTotal = baseTotal + gstAmount;

				$(`#s_gst_per${rid}`).val(gstPercent);
				$(`#s_gst_amt${rid}`).val(Math.round(gstAmount));
			} else {
				$(`#s_gst_per${rid}`).val(0);
				$(`#s_gst_amt${rid}`).val(0);
			}

			$(`#s_total_rate${rid}`).val(Math.round(finalTotal));
			calculateSingleGrandTotal(count, night);
		}

		updateGrandtotalBoth();
	}
	// **NEW FUNCTION: Set rates to 0 for non-allocated fields**
	// This should be called AFTER rates are fetched from AJAX
	function applyRoundRobinZeros(count, night, roomIndex, type) {
		var rid = `${count}${night}${roomIndex}`;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;

		if (type === 'double') {
			var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;

			// Calculate what this room gets
			var childCount = calculateDistribution(no_of_ch, double_qty, roomIndex);
			var childWbCount = calculateDistribution(no_of_cw, double_qty, roomIndex);
			var extraCount = calculateDistribution(no_of_extra, double_qty, roomIndex);

			console.log('Applying zeros for double room:', {
				rid,
				childCount,
				childWbCount,
				extraCount
			});

			// Set to 0 if this room doesn't get any
			if (childCount === 0) {
				$(`#d_child_rate${rid}`).val(0);
			}
			if (childWbCount === 0) {
				$(`#d_child_wb_rate${rid}`).val(0);
			}
			if (extraCount === 0) {
				$(`#d_extra_bed_rate${rid}`).val(0);
			}
		} else if (type === 'single') {
			// Single rooms: child/extra should always be 0 (they're readonly)
			$(`#s_child_rate${rid}`).val(0);
			$(`#s_child_wb_rate${rid}`).val(0);
			$(`#s_extra_bed_rate${rid}`).val(0);
		}
	}

	function calculateDoubleGrandTotal(count, night) {
		var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		var tax_status = parseInt($(`#tax_status${count}`).val()) || 0;
		var dd_total = 0;
		console.log('calculateDoubleGrandTotal:', {
			count,
			night,
			double_qty,
			tax_status
		});
		for (let i = 1; i <= double_qty; i++) {
			var rid = `${count}${night}${i}`;
			// Get the already calculated total (which includes GST if applicable)
			var roomTotal = parseFloat($(`#d_total_rate${rid}`).val()) || 0;
			dd_total += roomTotal;
			console.log(`Room ${i} total:`, roomTotal);
		}
		console.log('Double grand total:', dd_total);
		$(`#dd_total_rate${count}${night}`).val(Math.round(dd_total));
	}

	function calculateSingleGrandTotal(count, night) {
		var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		var single_qty = parseInt($(`#single${count}${night}`).val()) || 0;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		var tax_status = parseInt($(`#tax_status${count}`).val()) || 0;
		var ss_total = 0;
		console.log('calculateSingleGrandTotal:', {
			count,
			night,
			single_qty,
			tax_status
		});
		for (let i = 1; i <= single_qty; i++) {
			var roomIndex = double_qty + i;
			var rid = `${count}${night}${roomIndex}`;
			// Get the already calculated total (which includes GST if applicable)
			var roomTotal = parseFloat($(`#s_total_rate${rid}`).val()) || 0;
			ss_total += roomTotal;
			console.log(`Room ${roomIndex} total:`, roomTotal);
		}
		console.log('Single grand total:', ss_total);
		$(`#ss_total_rate${count}${night}`).val(Math.round(ss_total));
	}

	// Update the grand total calculation for the entire location
	function updateGrandtotalBoth(specificCount = null) {
		var accom_grand_total = 0;
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			if (specificCount && count != specificCount) return;
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			var cardTotal = 0;
			for (let night = 1; night <= no_of_night; night++) {
				// Get the grand totals for this night (already calculated correctly in updateRoomTotals)
				var dd_total = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
				var ss_total = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
				cardTotal += dd_total + ss_total;
			}
			if (specificCount) {
				// Return just this card's total
				return cardTotal;
			}
			accom_grand_total += cardTotal;
			// Update the location breadcrumb total
			$(`#loc_total${count}`).text(cardTotal.toFixed(2));
		});
		if (!specificCount) {
			$('#a_total').text(accom_grand_total.toFixed(2));
		}
		return accom_grand_total;
	}

	function updateNightlyDetails(count) {
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
		var checkinDate = $(`#checkin${count}`).val();
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var nightlyDetails = $(`#nightly-details${count}`);
		var currentNights = nightlyDetails.find('.night-section').length;
		// Update breadcrumb with number of nights
		$(`#span_night_id${count}`).text(no_of_night > 0 ? no_of_night : '');
		if (no_of_night < 1) {
			nightlyDetails.empty();
			$(`#vehicle-summary-${count}`).remove();
			updateGrandtotalBoth();
			get_veh_grand_total();
			return;
		}
		// Add new nights if increased
		for (let night = currentNights + 1; night <= no_of_night; night++) {
			var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, checkinDate);
			nightlyDetails.append(nightlyHtml);
			var commonOptions = $(`#roomcat_common${count}`).html();
			$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
				$(this).html(commonOptions);
			});
			$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();
		}
		// Remove extra nights if decreased
		if (no_of_night < currentNights) {
			for (let night = currentNights; night > no_of_night; night--) {
				nightlyDetails.find(`.night-section[data-night="${night}"]`).remove();
			}
		}
		// **FIX: Remove existing vehicle summary BEFORE regenerating**
		if (is_vehicle_required == 1) {
			// Remove existing summary to regenerate with updated night labels
			$(`#vehicle-summary-${count}`).remove();
			// **ADD: Also remove any orphaned vehicle summaries**
			nightlyDetails.find('.vehicle-summary-section').remove();
			var summaryHtml = generateVehicleSummary(count, no_of_night, vehicle_models);
			nightlyDetails.append(summaryHtml);
			updateVehicleSummary(count);
		}
		// Set individual meal plans based on common meal plan
		var commonMeal = $(`#mealplan${count}`).val();
		if (commonMeal) {
			$(`#nightly-details${count} .mp_row_change`).val(commonMeal).trigger('change');
		}
		var commonRoom = $(`#roomcat_common${count}`).val();
		if (commonRoom) {
			$(`#nightly-details${count} .room_cat_change`).val(commonRoom).trigger('change');
		}
		// Update totals
		updateGrandtotalBoth();
		get_veh_grand_total();
		// FIX: Update loc_total here
		var cardTotal = updateGrandtotalBoth(count);
		$(`#loc_total${count}`).text(cardTotal);
		// Toggle visibility after updating nights
		toggleNightsVisibility();
		calculateVehicleExtraKmCharges();
	}

	// Also update the vehicle load callback to refresh summary
	$(document).on('click', '.load_vehs_click', function() {
		var count = $(this).attr('data-id');
		setTimeout(function() {
			updateVehicleSummary(count);
		}, 500);
	});

	// Function to toggle visibility of nights based on checkbox
	function toggleNightsVisibility() {
	var showAll = getIsDynamic(); // true if checked (dynamic), false otherwise

	console.log('Toggling nights visibility: dynamic=', showAll);

	$('.location-card').each(function() {
		var $locationCard = $(this);
		var count = $locationCard.attr('data-index');

		// CRITICAL: Force location card visible at start
		$locationCard.show().css('display', 'block');

		// Also ensure the nightly-details container is visible
		$(`#nightly-details${count}`).show().css('display', 'block');

		var noOfNight = parseInt($(`#no_of_night${count}`).val()) || 0;

		// If no nights specified, ensure card stays visible and clear all night inputs
		if (noOfNight === 0) {
			$locationCard.show().css('display', 'block');
			$(`#nightly-details${count}`).show().css('display', 'block');
			
			// Clear all night-specific inputs
			for (let n = 1; n <= 10; n++) { // Assuming max 10 nights; adjust if needed
				$(`#double${count}${n}`).val(0);
				$(`#single${count}${n}`).val(0);
			}
			return; // Skip processing if no nights
		}

		$(`#nightly-details${count} .night-section`).each(function() {
			var $nightSection = $(this);
			var night = parseInt($nightSection.attr('data-night'));

			// CRITICAL: Hide nights beyond the current no_of_night and clear values
			if (night > noOfNight) {
				$nightSection.hide();
				
				// Set quantities and related inputs to 0 for hidden nights to prevent carryover
				$(`#double${count}${night}`).val(0).trigger('change');
				$(`#single${count}${night}`).val(0).trigger('change');
				
				// Clear room totals and other night-specific fields if needed
				$nightSection.find('input[id^="d_total_rate"], input[id^="s_total_rate"], input[id^="dd_total_rate"], input[id^="ss_total_rate"]').val(0);
				$nightSection.find('.mp_row_change').val('');
				
				return;
			}

			if (night > 1) {
				if (showAll) {
					// Show everything for nights > 1 when dynamic
					$nightSection.show();
				} else {
					// Hide entire night section when not dynamic
					$nightSection.hide();
					
					// In static mode, still set quantities but calculations will aggregate
					// (No need to clear here since avg will be set uniformly below)
				}
			} else {
				// Night 1 - ALWAYS show the section
				$nightSection.show();

				if (!showAll) {
					// Aggregate quantities for static mode (average across nights)
					let totalDouble = 0;
					let totalSingle = 0;
					for (let n = 1; n <= noOfNight; n++) {
						totalDouble += parseInt($(`#double${count}${n}`).val() || 0);
						totalSingle += parseInt($(`#single${count}${n}`).val() || 0);
					}
					const avgDouble = noOfNight > 0 ? Math.round(totalDouble / noOfNight) : 0;
					const avgSingle = noOfNight > 0 ? Math.round(totalSingle / noOfNight) : 0;

					// Set uniform quantity across all nights (only up to noOfNight)
					for (let n = 1; n <= noOfNight; n++) {
						$(`#double${count}${n}`).val(avgDouble).trigger('change');
						$(`#single${count}${n}`).val(avgSingle).trigger('change');
					}

					// Static mode: Hide night header, count rows, and grand room totals
					$nightSection.find('> h3').hide();
					$nightSection.find('.double_row, .single_row').hide(); // Hide room count rows
					$nightSection.find('input[id^="dd_total_rate"], input[id^="ss_total_rate"]').closest('.row').hide(); // Hide grand room totals

					// For double rooms - hide all room input rows except the first
					var $doubleRoomRows = $nightSection.find('.row.mt-2.align-items-center').filter(function() {
						return $(this).find('[id^="roomcat"]').length > 0 &&
							$(this).find('[id^="d_adult_rate"]').length > 0;
					});
					$doubleRoomRows.each(function(index) {
						if (index > 0) {
							$(this).hide();
						}
					});

					// For single rooms - hide all room input rows except the first
					var $singleRoomRows = $nightSection.find('.row.mt-2.align-items-center').filter(function() {
						return $(this).find('[id^="roomcat"]').length > 0 &&
							$(this).find('[id^="s_adult_rate"]').length > 0;
					});
					$singleRoomRows.each(function(index) {
						if (index > 0) {
							$(this).hide();
						}
					});

					// Static mode: Show quantity and adjust for first visible rows
					var $firstDoubleRow = $nightSection.find('.row.mt-2.align-items-center').filter(function() {
						return $(this).find('input[id^="d_adult_rate"]').length > 0;
					}).first();
					if ($firstDoubleRow.length) {
						var $roomTypeColDouble = $firstDoubleRow.find('.room-type-col');
						$roomTypeColDouble.show();
						var doubleQtyInput = $roomTypeColDouble.find('input');
						doubleQtyInput.val(avgDouble);
						var ddTotal = calculateAllNightsDoubleTotal(count);
						$firstDoubleRow.find('input.d_total_rate').val(Math.round(ddTotal));
					}

					var $firstSingleRow = $nightSection.find('.row.mt-2.align-items-center').filter(function() {
						return $(this).find('input[id^="s_adult_rate"]').length > 0;
					}).first();
					if ($firstSingleRow.length) {
						var $roomTypeColSingle = $firstSingleRow.find('.room-type-col');
						$roomTypeColSingle.show();
						var singleQtyInput = $roomTypeColSingle.find('input');
						singleQtyInput.val(avgSingle);
						var ssTotal = calculateAllNightsSingleTotal(count);
						$firstSingleRow.find('input.s_total_rate').val(Math.round(ssTotal));
					}

				} else {
					// Dynamic mode for night 1: Show everything
					$nightSection.find('> h3').show();
					$nightSection.find('.double_row, .single_row').show(); // Show count rows
					$nightSection.find('input[id^="dd_total_rate"], input[id^="ss_total_rate"]').closest('.row').show(); // Show grand room totals
					$nightSection.find('.row.mt-2.align-items-center').show();
				}
			}
		});

		// Dynamic mode: Ensure all nights show full details and revert per-room quantities
		if (showAll) {
			for (let n = 1; n <= noOfNight; n++) {
				var $nightSec = $(`#nightly-details${count} .night-section[data-night="${n}"]`);
				$nightSec.find('> h3').show();
				$nightSec.find('.double_row, .single_row').show();
				$nightSec.find('input[id^="dd_total_rate"], input[id^="ss_total_rate"]').closest('.row').show();
				$nightSec.find('.row.mt-2.align-items-center').show();

				// Revert room type columns to hidden and per-room qty=1
				$nightSec.find('.room-type-col').hide();
				$nightSec.find('input[id^="double"], input[id^="single"]').not(`#double${count}${n}, #single${count}${n}`).val(1);
			}

			// Re-update per-room totals for all rooms across all nights
			for (let n = 1; n <= noOfNight; n++) {
				var numDouble = parseInt($(`#double${count}${n}`).val()) || 0;
				for (let i = 1; i <= numDouble; i++) {
					rtc_updateRoomTotals(count, n, i);
				}
				var numSingle = parseInt($(`#single${count}${n}`).val()) || 0;
				var doubleCount = numDouble;
				for (let i = 1; i <= numSingle; i++) {
					rtc_updateRoomTotals(count, n, doubleCount + i);
				}
			}
		} else {
			// Static mode: Recalculate all rooms and grand totals for consistency
			for (let n = 1; n <= noOfNight; n++) {
				var numDouble = parseInt($(`#double${count}${n}`).val()) || 0;
				for (let roomIdx = 1; roomIdx <= numDouble; roomIdx++) {
					rtc_updateRoomTotals(count, n, roomIdx);
				}
				var numSingle = parseInt($(`#single${count}${n}`).val()) || 0;
				for (let roomIdx = 1; roomIdx <= numSingle; roomIdx++) {
					rtc_updateRoomTotals(count, n, numDouble + roomIdx);
				}

				// Recalculate grand totals for each night
				calculateDoubleGrandTotalStatic(count, n);
				calculateSingleGrandTotalStatic(count, n);
			}

			// Update the static mode display
			updateStaticModeDisplayTotal(count);
		}

		// Handle vehicle visibility based on dynamic state
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required == 1) {
			if (!showAll) {
				// Static mode: Hide all vehicle details except Vehicle Summary
				$(`#nightly-details${count} .vehicle-details-section`).hide();
				$(`#nightly-details${count} .vehicle-rows`).hide();
				$(`#nightly-details${count} .vehicle-row`).hide();

				// Hide vehicle grand total in all nights (static mode)
				$(`#nightly-details${count} .night-section [id^="veh_grand_total"]`).closest('.row').hide();

				// Show Vehicle Summary
				$(`#vehicle-summary-${count}`).show();
			} else {
				// Dynamic mode: Show all vehicle details, hide Vehicle Summary
				$(`#nightly-details${count} .vehicle-details-section`).show();
				$(`#nightly-details${count} .vehicle-rows`).show();
				$(`#nightly-details${count} .vehicle-row`).show();

				// Hide vehicle grand total in all nights (dynamic mode)
				$(`#nightly-details${count} .night-section [id^="veh_grand_total"]`).closest('.row').hide();

				// Hide Vehicle Summary in dynamic mode
				$(`#vehicle-summary-${count}`).hide();
			}
		}

		// CRITICAL: Force card and parent containers to be visible at end
		$locationCard.show().css('display', 'block');
		$locationCard.parent().show().css('display', 'block'); // Show parent container too
		$(`#nightly-details${count}`).show().css('display', 'block');

		// Ensure the card body and ibox are also visible
		$locationCard.find('.card-body').show().css('display', 'block');
		$locationCard.find('.ibox').show().css('display', 'block');

		// Update location totals
		var cardTotal = updateGrandtotalBoth(count);
		var veh_grand_total = get_veh_grand_total();
		$(`#loc_total${count}`).text(cardTotal + " + " + veh_grand_total);
	});

	// Update global totals
	$('#v_total').text(get_veh_grand_total());
	$('#a_total').text(updateGrandtotalBoth());
	$('#g_total').text((updateGrandtotalBoth() + get_veh_grand_total()));

	console.log('Nights visibility toggle complete');
	// $('.load_vehs_click').trigger('click');
}

	// ===== REMOVE: Event listener that prevented manual toggle =====
	// Normal checkbox behavior - no restrictions
	$(document).on('change', '#dynamic_nights_checkbox', function() {
		toggleNightsVisibility();
	});

	// Function to calculate total nights
	function calculateTotalNights() {
		var totalNights = 0;
		$('.no_of_night').each(function() {
			var nights = parseInt($(this).val()) || 0;
			totalNights += nights;
		});
		return totalNights;
	}
  function checkTotalNights() {
        var totalNights = calculateTotalNights();
		 var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;

		// alert(no_of_night);
        if (totalNights == no_of_night) {
            $('.dyna').show();
			$('#dynamicNeeded').show();
        } else {
            $('.dyna').hide();
			$('#dynamicNeeded').hide();
        }
    }

    // Initially hide the button
    $('.dyna').hide();
	$('#dynamicNeeded').hide();

	// Function to calculate location count
	function calculateLocationCount() {
		var totalCount = $('.tour_plan_div .location-card').length;
		return totalCount;
	}

	// Function to calculate total nights up to a specific ID
	function calculateTotalNights_new(id) {
		var totalNights = 0;
		for (let i = 1; i <= parseInt(id); i++) {
			var nights = parseInt($(`#no_of_night${i}`).val()) || 0;
			totalNights += nights;
		}
		return totalNights;
	}

	var tourStartDate = (function() {
		// Try server-provided start date (PHP). Fallbacks below prevent "undefined".
		var phpStart = '<?php echo isset($object_det[0]["check_in_date"]) ? $object_det[0]["check_in_date"] : ""; ?>';
		if (phpStart && phpStart !== '') return phpStart;
		// If the DOM has #checkin1 at load, use it
		if ($('#checkin1').length) return $('#checkin1').val();
		// final fallback: empty string (no-op)
		return '';
	})();

	// Single card-options-remove handler (FIX: Removed duplicate)
	$(document).on("click", ".card-options-remove", function(e) {
		e.preventDefault();
		var card = $(this).closest(".location-card");
		// capture sequence (data-index) or fallback to DOM index
		var removedSeqAttr = parseInt(card.attr("data-index"), 10);
		var removedSeq = Number.isFinite(removedSeqAttr) ? removedSeqAttr : card.index();
		// Capture the current first card's checkin BEFORE removing anything
		var currentFirstCheckin = '';
		var firstCard = $('.tour_plan_div .location-card').first();
		if (firstCard.length) {
			// look for an input whose id starts with "checkin" inside the first card
			var firstCheckinInput = firstCard.find('input[id^="checkin"]');
			if (firstCheckinInput.length) currentFirstCheckin = firstCheckinInput.val();
		}
		// Remove the card from DOM
		card.remove();
		// Remove matching list entries (dyn_list)
		$('.dyn_list li').each(function() {
			var txt = $(this).text().trim();
			if (txt.startsWith(removedSeq + ".")) {
				$(this).remove();
			}
		});
		// Re-number remaining cards (assumes updateSequenceNumbers reassigns data-index and element ids)
		updateSequenceNumbers();
		var remainingCards = $('.tour_plan_div .location-card');
		if (remainingCards.length === 0) {
			$("#btn_save_tour_plan, #btn_savedraft_tour_plan").hide();
		} else {
			// If the first card was removed, set the new first checkin to tourStartDate (prefer) or fallback to previous first checkin
			if (removedSeq === 1) {
				var newFirstSeq = 1;
				var valueToSet = (typeof tourStartDate !== 'undefined' && tourStartDate) ? tourStartDate : currentFirstCheckin;
				if (valueToSet && $(`#checkin${newFirstSeq}`).length) {
					$(`#checkin${newFirstSeq}`).val(valueToSet);
				}
			}
			// **FIX: Recalculate checkouts for each remaining card using their new sequence**
			// Use a flag to prevent multiple vehicle summary regenerations
			window.isRecalculating = true; // FIX: Global flag to prevent recursion
			remainingCards.each(function(i) {
				var seq = i + 1;
				// **REMOVED: Clearing vehicle summaries here was causing loss of summaries on remaining cards after renumbering.**
				// Summaries are already preserved and renumbered in updateSequenceNumbers().
				// If regeneration is needed, it should be triggered explicitly in calculateCheckout or elsewhere.
				calculateCheckout(seq);
			});
			window.isRecalculating = false;
		}
		// Update total nights and related UI
		var totalNights = calculateTotalNights();
		$('#planned_night').text(totalNights + " / ");
		var no_of_night = <?php echo (int)$object_det[0]['no_of_night']; ?>;
		if (totalNights === no_of_night) {
			$("#btn_save_tour_plan").show();
			$('#btn_add_bt').prop('disabled', true);
		} else {
			$("#btn_save_tour_plan").hide();
			$('#btn_add_bt').prop('disabled', false);
		}
		updateGrandtotalBoth();
		get_veh_grand_total();
		toggleNightsVisibility();
		calculateVehicleExtraKmCharges();
	});

	// Handle close night button - REMOVED DUPLICATE, use above

	function updateSequenceNumbers() {
		if ($('.tour_plan_div .location-card').length === 0) {
			location.reload();
		}
		var prefixes = ['checkin', 'no_of_night', 'checkout', 'hotelcat', 'hotelid', 'roomcat_common', 'mealplan', 'no_of_adult', 'no_of_ch', 'no_of_cw', 'no_of_extra', 'no_of_pax', 'tax_status', 'own_arrange', 'tour_location_id', 'location_sequence', 'eighteen_div_d', 'eighteen_div_s', 'nightly-details', 'roomcat', 'double', 'single', 'd_adult_rate', 'd_child_rate', 'd_child_wb_rate', 'd_extra_bed_rate', 'd_total_rate', 's_adult_rate', 's_child_rate', 's_child_wb_rate', 's_extra_bed_rate', 's_total_rate', 'dd_total_rate', 'ss_total_rate', 'loadvehs', 'v_from_to', 'veh_header', 'pre_to_cur', 'cur_to_dep', 'dep_to_arr', 'hub_to_arr', 'arr_to_loc', 'veh_model', 'veh_type_id', 'veh_count', 'day_rent', 'max_km_day', 'travel_distance', 'extra_kilometer', 'extra_km_rate', 'veh_total', 'veh_grand_total', 'ster_d_adult_rate', 'ster_n_d_child_rate', 'ster_d_child_rate', 'ster_n_d_child_wb_rate', 'ster_d_child_wb_rate', 'ster_n_d_extra_bed_rate', 'ster_d_extra_bed_rate', 'ster_d_total_rate', 'ster_gst_per', 'ster_g_tot', 'ster_s_adult_rate', 'ster_n_s_child_rate', 'ster_s_child_rate', 'ster_n_s_child_wb_rate', 'ster_s_child_wb_rate', 'ster_n_s_extra_bed_rate', 'ster_s_extra_bed_rate', 'ster_s_total_rate', 'hd_ster_d_id', 'hd_ster_d_adult_rate', 'hd_ster_n_d_child_rate', 'hd_ster_d_child_rate', 'hd_ster_n_d_child_wb_rate', 'hd_ster_d_child_wb_rate', 'hd_ster_n_d_extra_bed_rate', 'hd_ster_d_extra_bed_rate', 'hd_ster_d_total_rate', 'hd_ster_d_gst_per', 'hd_ster_d_g_tot', 'hd_ster_s_id', 'hd_ster_s_adult_rate', 'hd_ster_n_s_child_rate', 'hd_ster_s_child_rate', 'hd_ster_n_s_child_wb_rate', 'hd_ster_s_child_wb_rate', 'hd_ster_n_s_extra_bed_rate', 'hd_ster_s_extra_bed_rate', 'hd_ster_s_total_rate', 'hd_ster_s_gst_per', 'hd_ster_s_g_tot', 'sterling_double', 'sterling_single', 'span_night_id', 'loc_total'];
		$('.tour_plan_div .location-card').each(function(index) {
			let newIndex = index + 1;
			let oldIndex = $(this).attr("data-index");
			let oldStr = oldIndex.toString();
			let newStr = newIndex.toString();
			$(this).attr("data-index", newIndex);
			$(this).find('.card-seq').text(newIndex);
			// Update common card-level fields first
			$(this).find('[id^="own_arrange"]').attr("id", `own_arrange${newIndex}`).attr("name", `addloc[${newIndex}][own_arrange]`);
			$(this).find('[id^="tour_location_id"]').attr("id", `tour_location_id${newIndex}`).attr("name", `addloc[${newIndex}][tour_location_id]`);
			$(this).find('[id^="location_sequence"]').attr("id", `location_sequence${newIndex}`).attr("name", `addloc[${newIndex}][location_sequence]`).val(newIndex);
			$(this).find('[id^="checkin"]').not('[id*="ster"]').attr("id", `checkin${newIndex}`).attr("name", `addloc[${newIndex}][checkin]`);
			$(this).find('[id^="no_of_night"]').attr("id", `no_of_night${newIndex}`).attr("name", `addloc[${newIndex}][no_of_night]`).attr("count-id", newIndex).attr("oninput", `validateNumericInput(this); calculateCheckout(${newIndex}); updateNightlyDetails(${newIndex});`);
			$(this).find('[id^="checkout"]').attr("id", `checkout${newIndex}`).attr("name", `addloc[${newIndex}][checkout]`);
			$(this).find('[id^="hotelcat"]').attr("id", `hotelcat${newIndex}`).attr("name", `addloc[${newIndex}][hotelcat]`).attr("data-id", newIndex);
			$(this).find('[id^="hotelid"]').attr("id", `hotelid${newIndex}`).attr("name", `addloc[${newIndex}][hotelid]`).attr("data-id", newIndex);
			$(this).find('[id^="roomcat_common"]').attr("id", `roomcat_common${newIndex}`).attr("name", `addloc[${newIndex}][roomcat_common]`).attr("data-id", newIndex);
			$(this).find('[id^="mealplan"]').first().attr("id", `mealplan${newIndex}`).attr("name", `addloc[${newIndex}][mealplan]`).attr("data-id", newIndex);
			$(this).find('[id^="no_of_adult"]').attr("id", `no_of_adult${newIndex}`).attr("name", `addloc[${newIndex}][no_of_adult]`);
			$(this).find('[id^="no_of_ch"]').first().attr("id", `no_of_ch${newIndex}`).attr("name", `addloc[${newIndex}][no_of_ch]`);
			$(this).find('[id^="no_of_cw"]').first().attr("id", `no_of_cw${newIndex}`).attr("name", `addloc[${newIndex}][no_of_cw]`);
			$(this).find('[id^="no_of_extra"]').first().attr("id", `no_of_extra${newIndex}`).attr("name", `addloc[${newIndex}][no_of_extra]`);
			$(this).find('[id^="no_of_pax"]').attr("id", `no_of_pax${newIndex}`).attr("name", `addloc[${newIndex}][no_of_pax]`);
			$(this).find('[id^="tax_status"]').attr("id", `tax_status${newIndex}`).attr("name", `addloc[${newIndex}][tax_status]`);
			$(this).find('[id^="eighteen_div_d"]').attr("id", `eighteen_div_d${newIndex}`);
			$(this).find('[id^="eighteen_div_s"]').attr("id", `eighteen_div_s${newIndex}`);
			$(this).find('[id^="nightly-details"]').attr("id", `nightly-details${newIndex}`);
			// **CRITICAL FIX: Update nightly details with proper regex pattern matching**
			var nightlyDetailsContainer = $(this).find(`#nightly-details${newIndex}`);
			// Update all elements within nightly details that have IDs starting with old count
			nightlyDetailsContainer.find('[id]').each(function() {
				var $elem = $(this);
				var oldId = $elem.attr('id');
				// Match pattern: prefix + oldCount + night + roomIndex (e.g., "roomcat" + "2" + "1" + "5" = "roomcat215")
				// We need to replace the count part (first digit after prefix)
				var matched = false;
				for (var p = 0; p < prefixes.length; p++) {
					var prefix = prefixes[p];
					// Check if ID starts with this prefix followed by oldStr
					if (oldId.startsWith(prefix + oldStr)) {
						var restOfId = oldId.substring((prefix + oldStr).length);
						var newId = prefix + newStr + restOfId;
						$elem.attr('id', newId);
						matched = true;
						break;
					}
				}
				// If not matched by prefix list, try general pattern for room-related fields
				if (!matched && /^\D+\d+/.test(oldId)) {
					// Extract prefix (non-digits) and numeric part
					var prefixMatch = oldId.match(/^(\D+)(\d+.*)$/);
					if (prefixMatch) {
						var idPrefix = prefixMatch[1];
						var numericPart = prefixMatch[2];
						// Check if numeric part starts with oldStr
						if (numericPart.startsWith(oldStr)) {
							var newId = idPrefix + newStr + numericPart.substring(oldStr.length);
							$elem.attr('id', newId);
						}
					}
				}
			});
			// **CRITICAL FIX: Update name attributes in nightly details**
			nightlyDetailsContainer.find('[name]').each(function() {
				var $elem = $(this);
				var oldName = $elem.attr('name');
				if (oldName && oldName.includes(`addloc[${oldStr}]`)) {
					var newName = oldName.replace(`addloc[${oldStr}]`, `addloc[${newStr}]`);
					$elem.attr('name', newName);
				}
			});
			// **CRITICAL FIX: Update data-count, data-id, count-id attributes in nightly details**
			nightlyDetailsContainer.find('[data-count]').each(function() {
				$(this).attr('data-count', newIndex);
			});
			nightlyDetailsContainer.find('[data-id]').each(function() {
				var oldDataId = $(this).attr('data-id');
				if (oldDataId && oldDataId.startsWith(oldStr)) {
					var newDataId = newStr + oldDataId.substring(oldStr.length);
					$(this).attr('data-id', newDataId);
				}
			});
			nightlyDetailsContainer.find('[count-id]').each(function() {
				$(this).attr('count-id', newIndex);
			});
			// **CRITICAL FIX: Update data-cid attributes**
			nightlyDetailsContainer.find('[data-cid]').each(function() {
				$(this).attr('data-cid', newIndex);
			});
			// **CRITICAL FIX: Update oninput attributes**
			nightlyDetailsContainer.find('[oninput]').each(function() {
				var oldOninput = $(this).attr('oninput');
				if (oldOninput) {
					// Replace function calls with old count to new count
					var newOninput = oldOninput.replace(new RegExp(`\\b${oldStr}\\b`, 'g'), newStr);
					$(this).attr('oninput', newOninput);
				}
			});
			// Update vehicle summary IDs if they exist
			var vehicleSummary = $(this).find(`[id^="vehicle-summary-"]`);
			if (vehicleSummary.length) {
				vehicleSummary.attr('id', `vehicle-summary-${newIndex}`);
				vehicleSummary.find('[id^="vehicle-summary-header-"]').attr('id', `vehicle-summary-header-${newIndex}`);
				vehicleSummary.find('[id^="summary_"]').each(function() {
					var oldSummaryId = $(this).attr('id');
					if (oldSummaryId) {
						var newSummaryId = oldSummaryId.replace(new RegExp(`_${oldStr}_`), `_${newStr}_`);
						$(this).attr('id', newSummaryId);
					}
				});
				// Update vehicle summary name attributes
				vehicleSummary.find('[name^="addloc"]').each(function() {
					var oldSummaryName = $(this).attr('name');
					if (oldSummaryName) {
						var newSummaryName = oldSummaryName.replace(`addloc[${oldStr}]`, `addloc[${newStr}]`);
						$(this).attr('name', newSummaryName);
					}
				});
			}
		});
		// Update breadcrumb list
		$('.dyn_list .bc-card').each(function(index1) {
			let bcIndex = index1 + 1;
			$(this).attr("data-index", bcIndex);
			$(this).find('.bc-card-seq').text(bcIndex);
			$(this).find('[id^="span_night_id"]').attr("id", `span_night_id${bcIndex}`);
			$(this).find('[id^="loc_total"]').attr("id", `loc_total${bcIndex}`);
		});
		// Reinitialize Select2
		$('.tour_plan_div .select2-show-search').select2('destroy');
		$('.tour_plan_div .select2-show-search').select2();
		// Update totals
		var accom_grand_total = updateGrandtotalBoth();
		$('#a_total').text(accom_grand_total);
		var veh_grand_total = get_veh_grand_total();
		$('#v_total').text(veh_grand_total);
		$('#g_total').text((accom_grand_total + veh_grand_total));
		toggleNightsVisibility();
		calculateVehicleExtraKmCharges();
	}

	function calculateCheckout(count) {
		// FIX: Prevent recursion
		if (typeof window.isRecalculating !== 'undefined' && window.isRecalculating) {
			return;
		}
		var totalDuration = <?php echo $object_det[0]['no_of_night']; ?>;
		var sum = 0;
		$(".no_of_night").each(function() {
			let nights = parseInt($(this).val()) || 0;
			sum += nights;
		});
		if (sum > totalDuration) {
			alert("Total nights exceed the allowed duration!");
			$(`#no_of_night${count}`).val('');
			updateNightlyDetails(count);
			updateGrandtotalBoth();
			get_veh_grand_total();
			var totalNights = calculateTotalNights();
			$('#planned_night').text(totalNights + " / ");
			if (totalNights == totalDuration) {
				$("#btn_save_tour_plan").show();
				$('#btn_add_bt').prop('disabled', true);
			} else {
				$("#btn_save_tour_plan").hide();
				$('#btn_add_bt').prop('disabled', false);
			}
			return;
		}
		var checkin = document.getElementById(`checkin${count}`)?.value;
		var nights = document.getElementById(`no_of_night${count}`)?.value;
		var checkoutField = document.getElementById(`checkout${count}`);
		if (checkin && nights) {
			var checkinDate = new Date(checkin);
			checkinDate.setDate(checkinDate.getDate() + parseInt(nights, 10));
			var checkoutDate = checkinDate.toISOString().split('T')[0];
			checkoutField.value = checkoutDate;
			// Update checkin for subsequent locations
			$('.tour_plan_div .location-card').each(function(index) {
				if (index >= count) {
					var nextIndex = index + 1;
					var nextCheckinField = document.getElementById(`checkin${nextIndex}`);
					var prevCheckout = document.getElementById(`checkout${nextIndex - 1}`)?.value;
					if (nextCheckinField && prevCheckout) {
						nextCheckinField.value = prevCheckout;
					}
					updateNightlyDetails(nextIndex);
				}
			});
		}
		updateNightlyDetails(count);
		updateGrandtotalBoth();
		get_veh_grand_total();
		calculateVehicleExtraKmCharges();
		var totalNights = calculateTotalNights();
		$('#planned_night').text(totalNights + " / ");
		if (totalNights == totalDuration) {
			$("#btn_save_tour_plan").show();
			$('#btn_add_bt').prop('disabled', true);
		} else {
			$("#btn_save_tour_plan").hide();
			$('#btn_add_bt').prop('disabled', false);
		}
	}

	// Function to update accommodation grand totals - unchanged

	// Function to update vehicle grand totals
	function get_veh_grand_total() {
		var veh_grand_total = 0;
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			for (let night = 1; night <= no_of_night; night++) {
				var $elem = $(`#veh_grand_total${count}${night}`);
				if ($elem.length > 0) {
					var veh_total = parseFloat($elem.val()) || 0;
					veh_grand_total += veh_total;
				}
			}
		});
		// Update display
		$('#v_total').text(Math.round(veh_grand_total));
		// Update grand total
		var accom_total = parseFloat($('#a_total').text()) || 0;
		$('#g_total').text(Math.round(accom_total + veh_grand_total));
		return veh_grand_total;
	}

	// Function to allow only numeric input
	function validateNumericInput(input) {
		input.value = input.value.replace(/\D/g, '');
	}

	// Optimized meal plan change handler
	$(document).on('change', '.mp_row_change', function() {
		if (isDraftLoading) {
			console.log('Skipping meal plan change during draft load');
			return;
		}
		var mealplan = $(this).val();
		var rid = $(this).attr('data-id');
		var count = $(this).attr('data-count');
		var type = $(this).attr('data-type');
		var $spinner = $('#csspinner');
		var $mealplanSelect = $(this);
		var night = parseInt($(this).attr('data-night'));
		var roomIndex = parseInt($(this).attr('data-room-index'));
		console.log('=== Meal Plan Change ===');
		console.log('rid:', rid, 'count:', count, 'night:', night, 'roomIndex:', roomIndex, 'type:', type, 'value:', mealplan);
		// Skip if programmatic change
		if ($mealplanSelect.data('programmatic-change')) {
			console.log('Skipping programmatic change for rid:', rid);
			$mealplanSelect.removeData('programmatic-change');
			return;
		} else {
			// STATIC MODE: Optimized propagation
			if (!getIsDynamic()) {
				var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
				console.log('Static mode propagation - Room Type:', type, 'Total Nights:', no_of_night);
				// **OPTIMIZATION 1: Collect all target elements first (READ phase)**
				var propagationTargets = [];
				for (let n = 1; n <= no_of_night; n++) {
					var totalDoubleRooms = parseInt($(`#double${count}${n}`).val()) || 0;
					var totalSingleRooms = parseInt($(`#single${count}${n}`).val()) || 0;
					console.log(`Night ${n}: Total double rooms = ${totalDoubleRooms}, Total single rooms = ${totalSingleRooms}`);
					var startIndex, endIndex;
					if (type === 'double') {
						startIndex = 1;
						endIndex = totalDoubleRooms;
					} else {
						startIndex = totalDoubleRooms + 1;
						endIndex = totalDoubleRooms + totalSingleRooms;
					}
					console.log(`Processing ${type} rooms from index ${startIndex} to ${endIndex}`);
					for (let r = startIndex; r <= endIndex; r++) {
						if (n === night && r === roomIndex) {
							console.log('Skipping current room - Night:', n, 'Room:', r);
							continue;
						}
						var otherRid = `${count}${n}${r}`;
						var mealPlanId = `mealplan${otherRid}`; // FIX: No prefix
						var $otherMealPlan = $(`#${mealPlanId}`);
						console.log(`Checking Night ${n}, Room ${r} (${type}):`, {
							otherRid: otherRid,
							mealPlanId: mealPlanId,
							found: $otherMealPlan.length > 0
						});
						// **OPTIMIZATION 2: Only propagate if value is different**
						if ($otherMealPlan.length > 0 && $otherMealPlan.val() !== mealplan) {
							propagationTargets.push({
								element: $otherMealPlan,
								value: mealplan,
								rid: otherRid
							});
						}
					}
				}
				// **OPTIMIZATION 3: Batch all propagation updates (WRITE phase)**
				if (propagationTargets.length > 0) {
					console.log(`Batching ${propagationTargets.length} propagation updates`);
					batchDOMUpdate(function() {
						propagationTargets.forEach(function(target) {
							console.log('Propagating meal plan value:', target.value, 'to', target.rid);
							target.element.data('programmatic-change', true).val(target.value);
							if (target.element.hasClass('select2-hidden-accessible')) {
								target.element.trigger('change.select2');
							}
							target.element.trigger('change');
						});
					});
				}
				console.log('Meal plan propagation complete');
			} else {
				console.log('Dynamic mode - No propagation needed');
			}
		}
		// Process the current room
		$spinner.show();
		$mealplanSelect.prop('disabled', true);
		// Reset totals if mealplan is empty
		if (mealplan === "" || mealplan === "0") {
			$(`#d_total_rate${rid}`).val(0);
			$(`#s_total_rate${rid}`).val(0);
			updateRoomTotals(count, night, roomIndex);
			updateGrandtotalBoth();
			get_veh_grand_total();
			$(`#loc_total${count}`).text(updateGrandtotalBoth(count) + " + " + 0);
			$('#v_total').text(get_veh_grand_total());
			$('#g_total').text((updateGrandtotalBoth() + get_veh_grand_total()));
			calculateVehicleExtraKmCharges();
			$spinner.hide();
			$mealplanSelect.prop('disabled', false);
			return;
		}
		// Validation
		if ($(`#roomcat${rid}`).length === 0) {
			console.error('Room category dropdown not found for rid:', rid);
			showAlert('error', 'Room category dropdown not found. Please refresh the page.');
			$spinner.hide();
			$mealplanSelect.prop('disabled', false).val("");
			return;
		}
		// **OPTIMIZATION 4: Gather all data in one READ pass**
		var no_of_night = $(`#no_of_night${count}`).val();
		var hotel_id = $(`#hotelid${count}`).val();
		var tax_status = $(`#tax_status${count}`).val();
		var checkin = $(`#checkin${count}`).val();
		var checkout = $(`#checkout${count}`).val();
		var room_cat_id = $(`#roomcat${rid}`).val();
		if (!room_cat_id || room_cat_id === "" || room_cat_id === "0" || room_cat_id === null) {
			console.error('Room category ID is missing or invalid for rid:', rid, 'Value:', room_cat_id);
			showAlert('warning', 'Please select a room category first before choosing a meal plan.');
			$spinner.hide();
			$mealplanSelect.prop('disabled', false).val("");
			return;
		}
		if (!hotel_id || !checkin || !checkout || !no_of_night) {
			console.error('Missing required fields - hotel_id:', hotel_id, 'checkin:', checkin, 'checkout:', checkout, 'no_of_night:', no_of_night);
			showAlert('warning', 'Please ensure hotel, check-in, check-out dates are properly selected.');
			$spinner.hide();
			$mealplanSelect.prop('disabled', false).val("");
			return;
		}
		var double = type === 'double' ? 1 : 0;
		var single = type === 'single' ? 1 : 0;
		var vehicle_from_location = <?php echo $object_det[0]['vehicle_from_location'] ? $object_det[0]['vehicle_from_location'] : 0; ?>;
		var arrival_location = <?php echo $object_det[0]['arrival_location']; ?>;
		var departure_location = <?php echo $object_det[0]['departure_location']; ?>;
		var tour_location_id = $(`#tour_location_id${count}`).val();
		var previous_location_id = count > 1 ? $(`#tour_location_id${parseInt(count) - 1}`).val() : null;
		var duration = <?php echo $object_det[0]['no_of_night']; ?>;
		var totalNights = calculateTotalNights();
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var vehicle_models = is_vehicle_required == 1 ? <?php echo json_encode($vehicle_data); ?> : null;
		// **OPTIMIZATION 5: AJAX with batched DOM updates in success**
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
				vehicle_models: vehicle_models,
				id: rid,
				duration: duration,
				totalNights: totalNights,
				tour_location_id: tour_location_id,
				previous_location_id: previous_location_id,
				vehicle_from_location: vehicle_from_location,
				arrival_location: arrival_location,
				departure_location: departure_location
			},
			dataType: 'json',
			success: function(data) {
				if (data.different_season == 1) {
					var html_data = '<p>' + data.season_name1 + '</p>';
					html_data += '<p>' + data.season_name2 + '</p>';
					$('#season_name_placeholder').html(html_data);
					$('#diff_season_modal').modal('show');
					$(`#no_of_night${count}`).val(1);
					calculateCheckout(count);
					$(`#mealplan${rid}`).trigger('change');
					return;
				}
				// **OPTIMIZATION 6: Read all values first**
				var no_of_ch = parseInt($(`#no_of_ch${count}`).val()) || 0;
				var no_of_cw = parseInt($(`#no_of_cw${count}`).val()) || 0;
				var no_of_extra = parseInt($(`#no_of_extra${count}`).val()) || 0;
				var room_qty = type === 'double' ? (parseInt($(`#double${count}${night}`).val()) || 0) : (parseInt($(`#single${count}${night}`).val()) || 0);
				// Calculate values
				var room_r = parseInt(data.d_room_tariff) || parseInt(data.s_room_tariff) || 0;
				var child_r = parseInt(data.d_child_tariff) || parseInt(data.s_child_tariff) || 0;
				var child_wb_r = parseInt(data.d_child_wb_tariff) || parseInt(data.s_child_wb_tariff) || 0;
				var extra_r = parseInt(data.d_extra_tariff) || parseInt(data.s_extra_tariff) || 0;
				var effective_room_r = room_r * room_qty;
				var child_with_bed_count = no_of_ch;
				var child_without_bed_count = no_of_cw;
				var extra_bed_count = no_of_extra;
				// **OPTIMIZATION 7: Batch all DOM writes together**
				batchDOMUpdate(function() {
					// Prepare rates object
					var rates = {
						room_r: room_r,
						child_r: child_r,
						child_wb_r: child_wb_r,
						extra_r: extra_r
					};

					// Use the new function that applies round-robin logic automatically
					setRoomRatesWithRoundRobin(count, night, roomIndex, type, rates);

					// Generate sterling only for first room (your existing code)
					// ... keep your existing sterling code here ...
				});
				// **OPTIMIZATION 8: Defer heavy calculations to idle time**
				deferToIdle(function() {
					updateRoomTotals(count, night, roomIndex);
					if (roomIndex === 1 && !getIsDynamic()) {
						propagateRoomData(count, night, type);
						updateStaticModeDisplayTotal(count);
					}
					var singleCardTotal = updateGrandtotalBoth(count);
					$(`#loc_total${count}`).text(singleCardTotal + " + " + 0);
					var veh_grand_total = get_veh_grand_total();
					$('#v_total').text(veh_grand_total);
					var allCardTotal = updateGrandtotalBoth();
					$('#a_total').text(allCardTotal);
					$('#g_total').text((allCardTotal + veh_grand_total));
					calculateVehicleExtraKmCharges();
				});
			},
			error: function(xhr, status, error) {
				console.error('Error fetching tariff details:', error);
				console.error('XHR Response:', xhr.responseText);
				showAlert('danger', 'Error fetching tariff details. Please try again.');
				// FIX: Rollback UI
				$mealplanSelect.prop('disabled', false);
				$(`#roomcat${rid}`).prop('disabled', false);
			},
			complete: function() {
				$spinner.hide();
				$mealplanSelect.prop('disabled', false);
				$(`#roomcat${rid}`).prop('disabled', false);
			}
		});
	});

	// Event handler for rate inputs to propagate in static mode
	// ===== FIXED RATE INPUT HANDLER WITH PROPER STATIC MODE CALCULATION =====
	$(document).on('input', 'input[id^="d_adult_rate"], input[id^="d_child_rate"], input[id^="d_child_wb_rate"], input[id^="d_extra_bed_rate"], input[id^="s_adult_rate"], input[id^="s_child_rate"], input[id^="s_child_wb_rate"], input[id^="s_extra_bed_rate"]', function() {
	var $input = $(this);
	validateNumericInput($input[0]);

	var count = $input.data('count');
	var night = parseInt($input.data('night'));
	var roomIndex = parseInt($input.data('room-index'));
	var fieldId = $input.attr('id');
	var value = $input.val();

	var roomType = fieldId.includes('d_') ? 'double' : 'single';
	var prefix = roomType === 'double' ? 'd_' : 's_';

	console.log('=== Rate Input Change ===');
	console.log('Field:', fieldId, 'Count:', count, 'Night:', night, 'Room Index:', roomIndex, 'Room Type:', roomType, 'Value:', value);

	// **FIX: Compute if this is the first room of its type for the current night**
	var totalDoublesThisNight = parseInt($(`#double${count}${night}`).val()) || 0;
	var firstSingleIndex = totalDoublesThisNight + 1;
	var isFirstOfType = (roomType === 'double' && roomIndex === 1) || (roomType === 'single' && roomIndex === firstSingleIndex);
	console.log('Total Doubles This Night:', totalDoublesThisNight, 'First Single Index:', firstSingleIndex, 'Is First of Type:', isFirstOfType);

	// Dynamic mode or not the first room of type
	if (getIsDynamic() || !isFirstOfType) {
		console.log('Dynamic mode or not first of type - Updating only current room');
		rtc_updateRoomTotals(count, night, roomIndex);
		// Add this callback to update totals after room calculation
		setTimeout(function() {
			updateAllTotals();
		}, 100);
		return;
	}

	// STATIC MODE: Propagate rate change
	console.log('Static mode - Propagating rate change for first room of type');
	var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
	var fieldType = fieldId.replace(prefix, '').split(`${count}${night}${roomIndex}`)[0];

	console.log('Field Type:', fieldType, 'Total Nights:', no_of_night);

	// Loop through ALL nights
	for (let n = 1; n <= no_of_night; n++) {
		var totalDoubleRooms = parseInt($(`#double${count}${n}`).val()) || 0;
		var totalSingleRooms = parseInt($(`#single${count}${n}`).val()) || 0;

		var startIndex, endIndex;
		if (roomType === 'double') {
			startIndex = 1;
			endIndex = totalDoubleRooms;
		} else {
			startIndex = totalDoubleRooms + 1;
			endIndex = totalDoubleRooms + totalSingleRooms;
		}

		console.log(`Night ${n}: Propagating to rooms ${startIndex} to ${endIndex}`);

		for (let r = startIndex; r <= endIndex; r++) {
			var otherRid = `${count}${n}${r}`;
			var otherFieldId = `${prefix}${fieldType}${otherRid}`;
			var $otherField = $(`#${otherFieldId}`);

			if ($otherField.length > 0) {
				$otherField.val(value);
				rtc_updateRoomTotals(count, n, r);
			}
		}

		if (roomType === 'double') {
			calculateDoubleGrandTotalStatic(count, n);
		} else {
			calculateSingleGrandTotalStatic(count, n);
		}
	}

	// **FIX: Update all totals in the correct order**
	updateAllTotals();

	console.log('Rate propagation complete');
});

	// Create a separate function to update all totals
	function updateAllTotals() {
		// First, calculate totals for each card
		$('[id^="loc_total"]').each(function() {
			let cardCount = $(this).attr('id').replace('loc_total', '');
			let singleCardTotal = updateGrandtotalBoth(cardCount) || 0;
			let veh_grand_total = get_veh_grand_total() || 0;
			$(this).text(singleCardTotal + " + " + veh_grand_total);
		});

		// Then calculate grand totals
		let allCardsTotal = 0;
		$('[id^="loc_total"]').each(function() {
			let cardCount = $(this).attr('id').replace('loc_total', '');
			allCardsTotal += (updateGrandtotalBoth(cardCount) || 0);
		});

		let veh_grand_total = get_veh_grand_total() || 0;

		$('#v_total').text(veh_grand_total);
		$('#a_total').text(allCardsTotal);
		$('#g_total').text(allCardsTotal + veh_grand_total);

		calculateVehicleExtraKmCharges();

		console.log('All totals updated - a_total:', allCardsTotal, 'v_total:', veh_grand_total, 'g_total:', allCardsTotal + veh_grand_total);
	}
	// ===== PERFORMANCE OPTIMIZATION UTILITIES =====
	// Batch DOM updates to prevent layout thrashing
	let updateBatchQueue = [];
	let batchTimer = null;

	function batchDOMUpdate(updateFunction) {
		updateBatchQueue.push(updateFunction);
		if (!batchTimer) {
			batchTimer = requestAnimationFrame(function() {
				const queue = updateBatchQueue.slice();
				updateBatchQueue = [];
				batchTimer = null;
				// Execute all queued updates in one paint cycle
				queue.forEach(function(fn) {
					fn();
				});
			});
		}
	}

	// Defer non-critical updates to idle time
	function deferToIdle(callback, timeout) {
		if (window.requestIdleCallback) {
			requestIdleCallback(callback, {
				timeout: timeout || 50
			});
		} else {
			setTimeout(callback, 16); // Fallback for older browsers
		}
	}

		$(document).on('change', '.room_cat_common_change', function() {
		if (isDraftLoading) {
			console.log('Skipping room cat change during draft load');
			return;
		}

		const value = $(this).val();
		const count = $(this).attr('data-id');
		const commonOptions = $(this).html();

		// Prevent recursive updates
		const isUpdating = $(this).data('updating');
		if (isUpdating) return;
		$(this).data('updating', true);

		const $spinner = $('#csspinner');
		$spinner.show();

		console.log('Common room cat change:', { count, value });

		// Update all room category dropdowns for this location
		$(`#nightly-details${count} .room_cat_change`).each(function() {
			const $roomCat = $(this);
			$roomCat.select2('destroy');
			$roomCat.html(commonOptions);
			$roomCat.select2();

			// Mark as programmatic to prevent individual handlers from triggering
			$roomCat.data('programmatic-change', true);
			$roomCat.val(value);
			$roomCat.trigger('change');
		});

		// Wait for all room category changes to complete, then recalculate
		setTimeout(function() {
			const no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			const no_of_ch = parseInt($(`#no_of_ch${count}`).val()) || 0;
			const no_of_cw = parseInt($(`#no_of_cw${count}`).val()) || 0;
			const no_of_extra = parseInt($(`#no_of_extra${count}`).val()) || 0;

			console.log('Recalculating after common room cat change:', {
				count,
				no_of_night,
				no_of_ch,
				no_of_cw,
				no_of_extra
			});

			// In static mode, recalculate ALL nights
			if (!getIsDynamic()) {
				console.log('Static mode: Recalculating all nights after room cat change');

				for (let night = 1; night <= no_of_night; night++) {
					// Get room quantities for this night
					const numDouble = parseInt($(`#double${count}${night}`).val()) || 0;
					const numSingle = parseInt($(`#single${count}${night}`).val()) || 0;

					// Recalculate each double room with round-robin
					for (let roomIdx = 1; roomIdx <= numDouble; roomIdx++) {
						rtc_updateRoomTotals(count, night, roomIdx);
					}

					// Recalculate each single room
					for (let roomIdx = 1; roomIdx <= numSingle; roomIdx++) {
						rtc_updateRoomTotals(count, night, numDouble + roomIdx);
					}

					// Recalculate grand totals for each night
					calculateDoubleGrandTotalStatic(count, night);
					calculateSingleGrandTotalStatic(count, night);
				}

				// Update the static mode display
				updateStaticModeDisplayTotal(count);

			} else {
				// Dynamic mode: recalculate each room for each night
				console.log('Dynamic mode: Recalculating all rooms');

				for (let night = 1; night <= no_of_night; night++) {
					const numDouble = parseInt($(`#double${count}${night}`).val()) || 0;
					const numSingle = parseInt($(`#single${count}${night}`).val()) || 0;

					// Recalculate each double room with round-robin
					for (let roomIdx = 1; roomIdx <= numDouble; roomIdx++) {
						rtc_updateRoomTotals(count, night, roomIdx);
					}

					// Recalculate each single room
					for (let roomIdx = 1; roomIdx <= numSingle; roomIdx++) {
						rtc_updateRoomTotals(count, night, numDouble + roomIdx);
					}
				}
			}

			// Update overall totals
			const cardTotal = updateGrandtotalBoth(count);
			const veh_grand_total = get_veh_grand_total();
			$(`#loc_total${count}`).text(cardTotal + " + " + veh_grand_total);
			$('#v_total').text(veh_grand_total);
			$('#a_total').text(updateGrandtotalBoth());
			$('#g_total').text((updateGrandtotalBoth() + veh_grand_total));

			$spinner.hide();
			$('.room_cat_common_change[data-id="' + count + '"]').removeData('updating');

			console.log('Common room cat change complete');
		}, 500);
	});

	// Fallback for browsers without requestIdleCallback
	if (!window.requestIdleCallback) {
		window.requestIdleCallback = function(cb, options) {
			const start = Date.now();
			return setTimeout(() => {
				cb({
					didTimeout: false,
					timeRemaining: () => Math.max(0, 50 - (Date.now() - start))
				});
			}, 1);
		};
	}
	$(document).on('change', '.mp_change', function() {
	if (isDraftLoading) {
		console.log('Skipping meal plan change during draft load');
		return;
	}

	// Prevent recursive updates
	const isUpdating = $(this).data('updating');
	if (isUpdating) return;
	$(this).data('updating', true);

	var value = $(this).val();
	var count = $(this).attr('data-id');

	var $spinner = $('#csspinner');
	$spinner.show();

	console.log('Common meal plan change:', { count, value });

	// Update all meal plans
	$(`#nightly-details${count} .mp_row_change`).each(function() {
		$(this).data('programmatic-change', true);
		$(this).val(value);
		$(this).trigger('change');
	});

	// Wait for all changes to complete, then recalculate
	setTimeout(function() {
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

		console.log('Recalculating after common meal plan change:', {
			count,
			no_of_night
		});

		// Recalculate in static or dynamic mode
		if (!getIsDynamic()) {
			console.log('Static mode: Recalculating all nights after meal plan change');

			for (let night = 1; night <= no_of_night; night++) {
				// Get room quantities for this night
				const numDouble = parseInt($(`#double${count}${night}`).val()) || 0;
				const numSingle = parseInt($(`#single${count}${night}`).val()) || 0;

				// Recalculate each double room with round-robin
				for (let roomIdx = 1; roomIdx <= numDouble; roomIdx++) {
					rtc_updateRoomTotals(count, night, roomIdx);
				}

				// Recalculate each single room
				for (let roomIdx = 1; roomIdx <= numSingle; roomIdx++) {
					rtc_updateRoomTotals(count, night, numDouble + roomIdx);
				}

				// Recalculate grand totals for each night
				calculateDoubleGrandTotalStatic(count, night);
				calculateSingleGrandTotalStatic(count, night);
			}

			// Update the static mode display
			updateStaticModeDisplayTotal(count);

		} else {
			// Dynamic mode: recalculate each room for each night
			console.log('Dynamic mode: Recalculating all rooms after meal plan change');

			for (let night = 1; night <= no_of_night; night++) {
				const numDouble = parseInt($(`#double${count}${night}`).val()) || 0;
				const numSingle = parseInt($(`#single${count}${night}`).val()) || 0;

				// Recalculate each double room with round-robin
				for (let roomIdx = 1; roomIdx <= numDouble; roomIdx++) {
					rtc_updateRoomTotals(count, night, roomIdx);
				}

				// Recalculate each single room
				for (let roomIdx = 1; roomIdx <= numSingle; roomIdx++) {
					rtc_updateRoomTotals(count, night, numDouble + roomIdx);
				}
			}
		}

		// Update overall totals
		var cardTotal = updateGrandtotalBoth(count);
		var veh_grand_total = get_veh_grand_total();
		$(`#loc_total${count}`).text(cardTotal + " + " + veh_grand_total);
		$('#v_total').text(veh_grand_total);
		$('#g_total').text((updateGrandtotalBoth() + veh_grand_total));

		$spinner.hide();
		$('.mp_change[data-id="' + count + '"]').removeData('updating');

		console.log('Common meal plan change complete');
	}, 800); // Longer delay for AJAX to complete
});

	// **HELPER FUNCTION: Display alerts consistently**
	function showAlert(type, message) {
		var iconClass = type === 'danger' ? 'fe-alert-triangle' : type === 'warning' ? 'fe-alert-circle' : 'fe-info';
		var alertHtml = `
    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
      <span class="alert-inner--icon"><i class="fe ${iconClass}"></i></span>
      <span class="alert-inner--text">${message}</span>
      <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>`;
		// $('#hotel_alert').html(alertHtml);
		setTimeout(function() {
			$(".alert").fadeOut("slow", function() {
				$(this).remove();
			});
		}, 3000);
	}
</script>
<script>
	// Add this to your existing script
	$(document).ready(function() {
		// Remove required attributes from Select2 elements
		function fixSelect2Validation() {
			$('.select2-hidden-accessible').each(function() {
				if ($(this).attr('required')) {
					$(this).removeAttr('required');
				}
			});
		}

		// Fix on page load
		fixSelect2Validation();

		// Fix when new elements are added
		$(document).ajaxComplete(function() {
			setTimeout(fixSelect2Validation, 100);
		});

		// Fix when Select2 is initialized
		$(document).on('select2:open', function(e) {
			fixSelect2Validation();
		});
	});

	// Also update your Select2 initialization to remove required
	$('.select2-show-search').select2().on('select2:open', function() {
		$(this).removeAttr('required');
	});
</script>

<script>
	$(document).on('change', '.hotel_change', function() {
		var hotel_id = $(this).val();
		var id = $(this).attr('data-id');
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var $spinner = $('#csspinner');

		$spinner.show();
		$(this).prop('disabled', true);

		$(`#roomcat_common${id}`).val('').trigger('change');

		if (!hotel_id || hotel_id == '0') {
			$(`#nightly-details${id} .room_cat_change`).each(function() {
				var $select = $(this);
				$select.html('<option value="">Select</option>').select2();
				$select.trigger('change');
			});
			$(`#tax_status${id}`).val(0);

			// Hide GST columns using the toggle function
			toggleGSTColumns(false, id);

			updateGrandtotalBoth();
			get_veh_grand_total();
			$(`#loc_total${id}`).text(updateGrandtotalBoth(id) + " + " + 0);
			$spinner.hide();
			$(this).prop('disabled', false);
			return;
		}

		$.ajax({
			url: "<?= site_url('Enquiry/getTourRoomCategory'); ?>",
			method: "POST",
			data: {
				hotel_id: hotel_id,
				no_of_double_room: no_of_double_room,
				no_of_single_room: no_of_single_room
			},
			dataType: 'json',
			success: function(data) {
				$(`#nightly-details${id} .room_cat_change`).each(function() {
					var $select = $(this);
					$select.html(data.output);
					$select.select2();
					$select.trigger('change');
				});

				$(`#roomcat_common${id}`).html(data.output).select2();

				var taxStatus = parseInt(data.hotel_status) || 0;
				$(`#tax_status${id}`).val(taxStatus);

				console.log('Hotel changed - tax_status:', taxStatus, 'for location:', id);

				// Toggle GST columns based on tax status
				if (taxStatus == 1) {
					toggleGSTColumns(true, id);
				} else {
					toggleGSTColumns(false, id);
				}

				// Trigger visibility toggle to apply GST column visibility
				toggleNightsVisibility();

				updateGrandtotalBoth();
				get_veh_grand_total();
				$(`#loc_total${id}`).text(updateGrandtotalBoth(id) + " + " + 0);
			},
			error: function(xhr, status, error) {
				console.error('Error fetching room categories:', error);
				var errorAlert = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="fe fe-alert-triangle"></i></span>
                <span class="alert-inner--text">Error fetching room categories. Please try again.</span>
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>`;
				$('#hotel_alert').html(errorAlert);
				setTimeout(function() {
					$(".alert").fadeOut("slow", function() {
						$(this).remove();
					});
				}, 2000);

				$(`#nightly-details${id} .room_cat_change`).each(function() {
					var $select = $(this);
					$select.html('<option value="">Select</option>').select2();
					$select.trigger('change');
				});
				$(`#roomcat_common${id}`).html('<option value="">Select</option>').select2();
				$(`#tax_status${id}`).val(0);
				toggleGSTColumns(false, id);
			},
			complete: function() {
				$spinner.hide();
				$(`#hotelid${id}`).prop('disabled', false);
			}
		});
	});

	// Updated toggleGSTColumns function with id parameter
	function toggleGSTColumns(show, id) {
		if (show) {
			$(`#nightly-details${id} .gst-column`).show();
			$(`#nightly-details${id} .night-section`).addClass('gst-visible');
		} else {
			$(`#nightly-details${id} .gst-column`).hide();
			$(`#nightly-details${id} .night-section`).removeClass('gst-visible');
		}
	}
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
			dataType: 'json',
			success: function(data) {
				$('#roomcat' + id).html(data.output);
				$('#tax_status' + id).val(data.hotel_status);
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
<script>
	// Debounce helper to prevent rapid successive calls
	let changeTimeout = null;

	// Helper function: Calculate round-robin distribution
	function rtc_calculateDistribution(totalItems, totalRooms, roomIndex) {
		totalItems = parseInt(totalItems, 10) || 0;
		totalRooms = parseInt(totalRooms, 10) || 0;
		roomIndex = parseInt(roomIndex, 10) || 0;

		if (totalItems === 0 || totalRooms === 0 || roomIndex === 0) return 0;

		let count = 0;
		for (let i = 1; i <= totalItems; i++) {
			const targetRoom = ((i - 1) % totalRooms) + 1;
			if (targetRoom === roomIndex) count++;
		}
		return count;
	}

	// NEW: Clear all rate fields before setting new values
	function rtc_clearRoomRates(count, night, roomIndex, type) {
		const rid = `${count}${night}${roomIndex}`;
		
		if (type === 'double' || type === 'both') {
			$(`#d_adult_rate${rid}`).val(0);
			$(`#d_child_rate${rid}`).val(0);
			$(`#d_child_wb_rate${rid}`).val(0);
			$(`#d_extra_bed_rate${rid}`).val(0);
			$(`#d_base_total${rid}`).val(0);
			$(`#d_gst_per${rid}`).val(0);
			$(`#d_gst_amt${rid}`).val(0);
			$(`#d_total_rate${rid}`).val(0);
		}
		
		if (type === 'single' || type === 'both') {
			$(`#s_adult_rate${rid}`).val(0);
			$(`#s_child_rate${rid}`).val(0);
			$(`#s_child_wb_rate${rid}`).val(0);
			$(`#s_extra_bed_rate${rid}`).val(0);
			$(`#s_base_total${rid}`).val(0);
			$(`#s_gst_per${rid}`).val(0);
			$(`#s_gst_amt${rid}`).val(0);
			$(`#s_total_rate${rid}`).val(0);
		}
		
		console.log(`Cleared rates for ${type} room ${rid}`);
	}

	// IMPROVED: Set rates WITH round-robin logic (consolidated function)
	function rtc_setRoomRatesWithRoundRobin(count, night, roomIndex, type, rates) {
		const rid = `${count}${night}${roomIndex}`;
		const no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		const no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		const no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;

		console.log('rtc_setRoomRatesWithRoundRobin:', {
			rid,
			type,
			no_of_ch,
			no_of_cw,
			no_of_extra,
			rates
		});

		if (type === 'double') {
			const double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
			
			// Calculate what this room gets in round-robin
			const childCount = rtc_calculateDistribution(no_of_ch, double_qty, roomIndex);
			const childWbCount = rtc_calculateDistribution(no_of_cw, double_qty, roomIndex);
			const extraCount = rtc_calculateDistribution(no_of_extra, double_qty, roomIndex);

			console.log('Double room distribution:', {
				roomIndex,
				double_qty,
				childCount,
				childWbCount,
				extraCount
			});

			// Set adult rate (always gets value)
			$(`#d_adult_rate${rid}`).prop("readonly", false).val(rates.room_r || 0);

			// Set child rates - 0 if this room doesn't get any, otherwise use rate
			$(`#d_child_rate${rid}`).prop("readonly", false).val(childCount > 0 ? (rates.child_r || 0) : 0);
			$(`#d_child_wb_rate${rid}`).prop("readonly", false).val(childWbCount > 0 ? (rates.child_wb_r || 0) : 0);
			$(`#d_extra_bed_rate${rid}`).prop("readonly", false).val(extraCount > 0 ? (rates.extra_r || 0) : 0);

			console.log('Double room rates set:', {
				adult: $(`#d_adult_rate${rid}`).val(),
				child: $(`#d_child_rate${rid}`).val(),
				childWb: $(`#d_child_wb_rate${rid}`).val(),
				extra: $(`#d_extra_bed_rate${rid}`).val()
			});

		} else if (type === 'single') {
			// Single rooms: only adult rate, others are always 0
			$(`#s_adult_rate${rid}`).prop("readonly", false).val(rates.room_r || 0);
			$(`#s_child_rate${rid}`).prop("readonly", true).val(0);
			$(`#s_child_wb_rate${rid}`).prop("readonly", true).val(0);
			$(`#s_extra_bed_rate${rid}`).prop("readonly", true).val(0);

			console.log('Single room rates set:', {
				adult: $(`#s_adult_rate${rid}`).val(),
				child: 0,
				childWb: 0,
				extra: 0
			});
		}
	}

	// Update room totals - ONLY calculates totals, doesn't modify rates
	function rtc_updateRoomTotals(count, night, roomIndex) {
		const rid = `${count}${night}${roomIndex}`;
		const no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		const no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		const no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		const double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		const tax_status = parseInt($(`#tax_status${count}`).val()) || 0;

		console.log('rtc_updateRoomTotals called:', { count, night, roomIndex, rid });

		if ($(`#d_adult_rate${rid}`).length > 0) {
			// Double room - READ current values
			const d_adult_rate = parseFloat($(`#d_adult_rate${rid}`).val()) || 0;
			const d_child_rate = parseFloat($(`#d_child_rate${rid}`).val()) || 0;
			const d_child_wb_rate = parseFloat($(`#d_child_wb_rate${rid}`).val()) || 0;
			const d_extra_bed_rate = parseFloat($(`#d_extra_bed_rate${rid}`).val()) || 0;

			// Calculate distribution
			const childCount = rtc_calculateDistribution(no_of_ch, double_qty, roomIndex);
			const childWbCount = rtc_calculateDistribution(no_of_cw, double_qty, roomIndex);
			const extraCount = rtc_calculateDistribution(no_of_extra, double_qty, roomIndex);

			// Calculate base total
			const baseTotal = d_adult_rate +
				(childCount * d_child_rate) +
				(childWbCount * d_child_wb_rate) +
				(extraCount * d_extra_bed_rate);

			$(`#d_base_total${rid}`).val(Math.round(baseTotal));

			// Apply GST
			let finalTotal = baseTotal;
			let gstPercent = 0;
			let gstAmount = 0;

			if (tax_status == 1 && baseTotal > 0) {
				gstPercent = baseTotal >= 7500 ? 18 : 5;
				gstAmount = (gstPercent / 100) * baseTotal;
				finalTotal = baseTotal + gstAmount;
				$(`#d_gst_per${rid}`).val(gstPercent);
				$(`#d_gst_amt${rid}`).val(Math.round(gstAmount));
			} else {
				$(`#d_gst_per${rid}`).val(0);
				$(`#d_gst_amt${rid}`).val(0);
			}

			$(`#d_total_rate${rid}`).val(Math.round(finalTotal));
			calculateDoubleGrandTotal(count, night);

		} else if ($(`#s_adult_rate${rid}`).length > 0) {
			// Single room - READ current values
			const s_adult_rate = parseFloat($(`#s_adult_rate${rid}`).val()) || 0;
			const baseTotal = s_adult_rate;

			$(`#s_base_total${rid}`).val(Math.round(baseTotal));

			// Apply GST
			let finalTotal = baseTotal;
			let gstPercent = 0;
			let gstAmount = 0;

			if (tax_status == 1 && baseTotal > 0) {
				gstPercent = baseTotal >= 7500 ? 18 : 5;
				gstAmount = (gstPercent / 100) * baseTotal;
				finalTotal = baseTotal + gstAmount;
				$(`#s_gst_per${rid}`).val(gstPercent);
				$(`#s_gst_amt${rid}`).val(Math.round(gstAmount));
			} else {
				$(`#s_gst_per${rid}`).val(0);
				$(`#s_gst_amt${rid}`).val(0);
			}

			$(`#s_total_rate${rid}`).val(Math.round(finalTotal));
			calculateSingleGrandTotal(count, night);
		}

		updateGrandtotalBoth();
	}

	$(document).on('change', '.room_cat_change', function() {
		if (isDraftLoading) {
			console.log('Skipping meal plan change during draft load');
			return;
		}

		// Clear any pending timeout
		if (changeTimeout) {
			clearTimeout(changeTimeout);
		}

		const $this = $(this);
		const room_cat_id = $this.val();
		const rid = $this.attr('data-id');
		const count = $this.attr('count-id');
		const $spinner = $('#csspinner');

		// Immediate visual feedback
		$spinner.show();
		$this.prop('disabled', true);

		// Cache frequently accessed DOM elements
		const cachedElements = {
			d_total_rate: $(`#d_total_rate${rid}`),
			s_total_rate: $(`#s_total_rate${rid}`),
			own_arrange: $(`#own_arrange${count}`),
			loc_total: $(`#loc_total${count}`),
			v_total: $('#v_total'),
			a_total: $('#a_total'),
			g_total: $('#g_total'),
			rateFields: {
				d_adult: $(`#d_adult_rate${rid}`),
				d_child: $(`#d_child_rate${rid}`),
				d_child_wb: $(`#d_child_wb_rate${rid}`),
				d_extra_bed: $(`#d_extra_bed_rate${rid}`),
				s_adult: $(`#s_adult_rate${rid}`),
				s_child: $(`#s_child_rate${rid}`),
				s_child_wb: $(`#s_child_wb_rate${rid}`),
				s_extra_bed: $(`#s_extra_bed_rate${rid}`)
			}
		};

		// Reset totals if room_cat_id is empty or 0
		if (room_cat_id === "" || room_cat_id === "0") {
			changeTimeout = setTimeout(() => {
				const nightIndex = parseInt(rid[rid.length - 2], 10);
				const roomIndex = parseInt(rid[rid.length - 1], 10);

				// Batch all updates in a single animation frame
				requestAnimationFrame(() => {
					cachedElements.d_total_rate.val(0);
					cachedElements.s_total_rate.val(0);
					cachedElements.own_arrange.val(1);

					// Use plain loop for better performance
					const fields = Object.values(cachedElements.rateFields);
					for (let i = 0; i < fields.length; i++) {
						fields[i].val(0).prop('readonly', true);
					}

					$(`#sterling_double${count}${nightIndex}${roomIndex}`).empty();
					$(`#sterling_single${count}${nightIndex}${roomIndex}`).empty();
					$(`#eighteen_div_d${count}`).find(`[id$="${rid}"]`).remove();
					$(`#eighteen_div_s${count}`).find(`[id$="${rid}"]`).remove();
				});

				// Defer calculation-heavy operations
				requestIdleCallback(() => {
					rtc_updateRoomTotals(count, nightIndex, roomIndex);
					updateGrandtotalBoth();
					const veh_total = get_veh_grand_total();

					requestAnimationFrame(() => {
						cachedElements.loc_total.text(updateGrandtotalBoth(count) + " + " + 0);
						cachedElements.v_total.text(veh_total);
						cachedElements.g_total.text((updateGrandtotalBoth() + veh_total));
					});
				}, {
					timeout: 50
				});

				$spinner.hide();
				$this.prop('disabled', false);
			}, 0);
			return;
		}

		// Set own_arrange and enable fields
		requestAnimationFrame(() => {
			cachedElements.own_arrange.val(0);
			const fields = Object.values(cachedElements.rateFields);
			for (let i = 0; i < fields.length; i++) {
				fields[i].prop('readonly', false);
			}
		});

		// Gather data for AJAX call
		const ajaxData = {
			hotel_id: $(`#hotelid${count}`).val(),
			room_cat_id: room_cat_id,
			mealplan: $(`#mealplan${count}`).val(),
			checkin: $(`#checkin${count}`).val(),
			checkout: $(`#checkout${count}`).val(),
			no_of_night: $(`#no_of_night${count}`).val(),
			double: $(`#double${count}${rid[rid.length - 2]}`).val() || 0,
			single: $(`#single${count}${rid[rid.length - 2]}`).val() || 0,
			vehicle_from_location: <?php echo $object_det[0]['vehicle_from_location'] ? $object_det[0]['vehicle_from_location'] : 0; ?>,
			arrival_location: <?php echo $object_det[0]['arrival_location']; ?>,
			departure_location: <?php echo $object_det[0]['departure_location']; ?>,
			tour_location_id: $(`#tour_location_id${count}`).val(),
			previous_location_id: count > 1 ? $(`#tour_location_id${parseInt(count) - 1}`).val() : null,
			duration: <?php echo $object_det[0]['no_of_night']; ?>,
			totalNights: calculateTotalNights(),
			id: rid,
			vehicle_models: <?php echo $object_det[0]['is_vehicle_required']; ?> == 1 ? <?php echo json_encode($vehicle_data); ?> : null,
			tax_status: $(`#tax_status${count}`).val()
		};

		// Validate number of nights
		if (!ajaxData.no_of_night || ajaxData.no_of_night === 'undefined') {
			alert("Please enter number of nights");
			$this[0].selectedIndex = 0;
			$spinner.hide();
			$this.prop('disabled', false);
			return;
		} else if (parseInt(ajaxData.no_of_night) === 0) {
			alert("Number of nights must be greater than zero");
			$(`#no_of_night${count}`).val('');
			$this[0].selectedIndex = 0;
			$spinner.hide();
			$this.prop('disabled', false);
			return;
		}

		// Extract night and room index once
		const night = parseInt(rid[rid.length - 2], 10);
		const roomIndex = parseInt(rid[rid.length - 1], 10);

		// Optimized HTML generation using array join
		const createSterlingHTML = (type, rates, counts, ridVal, tot, gst, total) => {
			const effectiveRates = {
				room: rates.room,
				child: counts.child > 0 ? rates.child : 0,
				child_wb: counts.child_wb > 0 ? rates.child_wb : 0,
				extra: counts.extra > 0 ? rates.extra : 0
			};

			const fields = [
				['Room Rate', `ster_${type}_adult_rate`, effectiveRates.room, false, type === 'd'],
				['Child', `ster_n_${type}_child_rate`, counts.child, type === 's', type === 'd', 'cls_child_count'],
				['Child Rate', `ster_${type}_child_rate`, effectiveRates.child, type === 's', type === 'd'],
				['No.Of C.WB', `ster_n_${type}_child_wb_rate`, counts.child_wb, type === 's', type === 'd', 'cls_child_wb_count'],
				['C.WBed Rate', `ster_${type}_child_wb_rate`, effectiveRates.child_wb, type === 's', type === 'd'],
				['No.Of Extra', `ster_n_${type}_extra_bed_rate`, counts.extra, type === 's', type === 'd', 'cls_extra_count'],
				['Extra Rate', `ster_${type}_extra_bed_rate`, effectiveRates.extra, type === 's', type === 'd'],
				['Room wise total', `ster_${type}_total_rate`, tot, true, false],
				['GST%', `ster_${type}_gst_per`, gst, true, false],
				['Room wise total', `ster_${type}_g_tot`, total, true, false, `sterling_${type}_grand`]
			];

			const htmlParts = ['<div class="row"><div class="col-xl-1 col-sm-12 col-md-1"></div>'];

			for (let i = 0; i < fields.length; i++) {
				const [label, id, value, readonly, hasInput, extraClass = ''] = fields[i];
				const readonlyAttr = readonly ? ' readonly' : '';
				const classAttr = extraClass ? extraClass + ' ' : '';
				const oninput = !readonly && hasInput ? ' oninput="validateNumericInput(this);"' : '';

				htmlParts.push(
					'<div class="col-xl-1 col-sm-12 col-md-1">',
					'<div class="teams-rank"><b>', label, '</b></div>',
					'<input type="text" id="', id, ridVal, '" class="', classAttr, 'form-control input-sm" maxlength="7" value="', value, '"', readonlyAttr, oninput, '>',
					'</div>'
				);
			}

			htmlParts.push(
				'<input type="hidden" id="ster_', type, '_id', ridVal, '" value="', ridVal, '">',
				'<div class="col-xl-1 col-sm-12 col-md-1"></div></div>'
			);

			return htmlParts.join('');
		};

		const createHiddenFields = (type, rates, counts, ridVal, tot, gst, total) => {
			const prefix = `hd_ster_addloc_${type}`;
			return [
				`<input type="hidden" id="hd_ster_${type}_id${ridVal}" value="${ridVal}" name="${prefix}[${ridVal}][ster_${type}_id]">`,
				`<input type="hidden" id="hd_ster_${type}_adult_rate${ridVal}" value="${rates.room}" name="${prefix}[${ridVal}][${type}_adult_rate]">`,
				`<input type="hidden" id="hd_ster_n_${type}_child_rate${ridVal}" value="${counts.child}" name="${prefix}[${ridVal}][n_${type}_child_rate]">`,
				`<input type="hidden" id="hd_ster_${type}_child_rate${ridVal}" value="${rates.child}" name="${prefix}[${ridVal}][${type}_child_rate]">`,
				`<input type="hidden" id="hd_ster_n_${type}_child_wb_rate${ridVal}" value="${counts.child_wb}" name="${prefix}[${ridVal}][n_${type}_child_wb_rate]">`,
				`<input type="hidden" id="hd_ster_${type}_child_wb_rate${ridVal}" value="${rates.child_wb}" name="${prefix}[${ridVal}][${type}_child_wb_rate]">`,
				`<input type="hidden" id="hd_ster_n_${type}_extra_bed_rate${ridVal}" value="${counts.extra}" name="${prefix}[${ridVal}][n_${type}_extra_bed_rate]">`,
				`<input type="hidden" id="hd_ster_${type}_extra_bed_rate${ridVal}" value="${rates.extra}" name="${prefix}[${ridVal}][${type}_extra_bed_rate]">`,
				`<input type="hidden" id="hd_ster_${type}_total_rate${ridVal}" value="${tot}" name="${prefix}[${ridVal}][${type}_total_rate]">`,
				`<input type="hidden" id="hd_ster_${type}_gst_per${ridVal}" value="${gst}" name="${prefix}[${ridVal}][${type}_gst_per]">`,
				`<input type="hidden" id="hd_ster_${type}_g_tot${ridVal}" value="${total}" name="${prefix}[${ridVal}][${type}_g_tot]">`
			].join('');
		};

		// Make AJAX call
		changeTimeout = setTimeout(() => {
			$.ajax({
				url: "<?= site_url('Enquiry/getTourTariffDetails'); ?>",
				method: "POST",
				data: ajaxData,
				dataType: 'json',
				success: function(data) {
					if (data.different_season == 1) {
						const html_data = '<p>' + data.season_name1 + '</p><p>' + data.season_name2 + '</p>';
						$('#season_name_placeholder').html(html_data);
						$('#diff_season_modal').modal('show');
						$(`#no_of_night${count}`).val(1);
						calculateCheckout(count);
						$(`#roomcat${rid}`).trigger('change');
						$spinner.hide();
						$(`#roomcat${rid}`).prop('disabled', false);
						return;
					}

					// Parse values once
					const values = {
						no_of_ch: parseInt($(`#no_of_ch${count}`).val()) || 0,
						no_of_cw: parseInt($(`#no_of_cw${count}`).val()) || 0,
						no_of_extra: parseInt($(`#no_of_extra${count}`).val()) || 0,
						nsingle: parseInt(ajaxData.single) || 0,
						room_r: parseInt(data.d_room_tariff) || 0,
						child_r: parseInt(data.d_child_tariff) || 0,
						child_wb_r: parseInt(data.d_child_wb_tariff) || 0,
						extra_r: parseInt(data.d_extra_tariff) || 0
					};

					// Process updates with improved sequencing
					const processUpdates = () => {
						const rates_double = {
							room_r: values.room_r,
							child_r: values.child_r,
							child_wb_r: values.child_wb_r,
							extra_r: values.extra_r
						};

						const rates_single = values.nsingle > 0 ? {
							room_r: parseInt(data.s_room_tariff) || 0,
							child_r: 0,
							child_wb_r: 0,
							extra_r: 0
						} : null;

						console.log('Processing updates for:', { count, night, roomIndex, rates_double, rates_single });

						// STEP 1: Clear existing values FIRST
						rtc_clearRoomRates(count, night, roomIndex, 'both');

						// STEP 2: Set rates with round-robin logic (in a single frame)
						requestAnimationFrame(() => {
							// Set double room rates
							rtc_setRoomRatesWithRoundRobin(count, night, roomIndex, 'double', rates_double);
							
							// Set single room rates if applicable
							if (values.nsingle > 0 && rates_single) {
								rtc_setRoomRatesWithRoundRobin(count, night, roomIndex, 'single', rates_single);
							}

							// STEP 3: Set readonly status for tax mode
							if (ajaxData.tax_status == 1) {
								cachedElements.rateFields.d_adult.prop("readonly", true);
								cachedElements.rateFields.d_child.prop("readonly", true);
								cachedElements.rateFields.d_child_wb.prop("readonly", true);
								cachedElements.rateFields.d_extra_bed.prop("readonly", true);
								if (values.nsingle > 0) {
									cachedElements.rateFields.s_adult.prop("readonly", true);
								}
							}
						});

						// STEP 4: Calculate totals and generate HTML
						if (ajaxData.tax_status == 1) {
							requestIdleCallback(() => {
								// Calculate totals
								rtc_updateRoomTotals(count, night, roomIndex);

								// Prepare HTML generation data
								const double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
								const counts = {
									child: rtc_calculateDistribution(values.no_of_ch, double_qty, roomIndex),
									child_wb: rtc_calculateDistribution(values.no_of_cw, double_qty, roomIndex),
									extra: rtc_calculateDistribution(values.no_of_extra, double_qty, roomIndex)
								};

								const tot_d = parseFloat($(`#d_base_total${rid}`).val()) || 0;
								const gst_d = parseFloat($(`#d_gst_per${rid}`).val()) || 0;
								const total_d = parseFloat($(`#d_total_rate${rid}`).val()) || 0;

								// Generate double room HTML
								requestAnimationFrame(() => {
									const sterling_double = createSterlingHTML('d', rates_double, counts, rid, tot_d, gst_d, total_d);
									const ediv_d = createHiddenFields('d', rates_double, counts, rid, tot_d, gst_d, total_d);

									$(`#sterling_double${count}${night}${roomIndex}`).html(sterling_double);
									$(`#eighteen_div_d${count}`).append(ediv_d);
								});

								// Generate single room HTML if applicable
								if (values.nsingle > 0 && rates_single) {
									const counts_s = { child: 0, child_wb: 0, extra: 0 };
									const tot_s = parseFloat($(`#s_base_total${rid}`).val()) || 0;
									const gst_s = parseFloat($(`#s_gst_per${rid}`).val()) || 0;
									const total_s = parseFloat($(`#s_total_rate${rid}`).val()) || 0;

									requestAnimationFrame(() => {
										const sterling_single = createSterlingHTML('s', rates_single, counts_s, rid, tot_s, gst_s, total_s);
										const ediv_s = createHiddenFields('s', rates_single, counts_s, rid, tot_s, gst_s, total_s);

										$(`#sterling_single${count}${night}${roomIndex}`).html(sterling_single);
										$(`#eighteen_div_s${count}`).append(ediv_s);
									});
								}
							}, { timeout: 100 });

						} else {
							// Non-tax case
							requestAnimationFrame(() => {
								$(`#sterling_double${count}${night}${roomIndex}`).empty();
								$(`#sterling_single${count}${night}${roomIndex}`).empty();
								$(`#eighteen_div_d${count}`).find(`[id$="${rid}"]`).remove();
								$(`#eighteen_div_s${count}`).find(`[id$="${rid}"]`).remove();
							});

							requestIdleCallback(() => {
								rtc_updateRoomTotals(count, night, roomIndex);
							}, { timeout: 100 });
						}

						// STEP 5: Update grand totals
						requestIdleCallback(() => {
							const singleCardTotal = updateGrandtotalBoth(count);
							const allCardTotal = updateGrandtotalBoth();
							const veh_grand_total = get_veh_grand_total();

							requestAnimationFrame(() => {
								cachedElements.loc_total.text(singleCardTotal + " + " + 0);
								cachedElements.v_total.text(veh_grand_total);
								cachedElements.a_total.text(allCardTotal);
								cachedElements.g_total.text((allCardTotal + veh_grand_total));
							});

							calculateVehicleExtraKmCharges();
						}, { timeout: 150 });
					};

					processUpdates();
				},
				error: function(xhr, status, error) {
					console.error('Error fetching tariff details:', error);
					const errorAlert = `
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="alert-inner--icon"><i class="fe fe-alert-triangle"></i></span>
						<span class="alert-inner--text">Error fetching tariff details. Please try again.</span>
						<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>`;
					$('#hotel_alert').html(errorAlert);
					setTimeout(() => $(".alert").fadeOut("slow", function() {
						$(this).remove();
					}), 2000);
				},
				complete: function() {
					$spinner.hide();
					$this.prop('disabled', false);
				}
			});
		}, 0);
	});

	// Fallback for browsers without requestIdleCallback
	if (!window.requestIdleCallback) {
		window.requestIdleCallback = function(cb, options) {
			const start = Date.now();
			return setTimeout(() => {
				cb({
					didTimeout: false,
					timeRemaining: () => Math.max(0, 50 - (Date.now() - start))
				});
			}, 1);
		};
	}
</script>
<script type="text/javascript">
	var isDraftLoading = false; // Global flag to skip handlers during view load

	// Preload common data asynchronously if not already loaded (e.g., fetch vehicle models early)
	$(document).ready(function() {
		// Assuming vehicle_data is already PHP-loaded, but if needed, preload via AJAX
		// For now, rely on PHP echoes; if dynamic, add AJAX preload here
	});

	$(document).on('click', '.tour_view', function() {
		var $this = $(this);
		if ($this.prop('disabled') || isDraftLoading) return; // Prevent if loading or disabled
		$this.prop('disabled', true);
		$('#spinner_draft').show();

		// Close modal if already open (prevent stuck state in edit/view switch)
		if ($('#modal_tour').hasClass('show')) {
			$('#modal_tour').modal('hide');
		}

		// Safe PHP variable initialization (already async via PHP)
		var enquiry_header_id = <?php echo isset($object_det[0]['enquiry_header_id']) ? $object_det[0]['enquiry_header_id'] : 'null'; ?>;
		var enquiry_details_id = <?php echo isset($object_det[0]['enquiry_details_id']) ? $object_det[0]['enquiry_details_id'] : 'null'; ?>;
		var hotel_categories = <?php echo isset($hotel_categories) ? json_encode($hotel_categories) : '[]'; ?>;
		var no_of_night = <?php echo isset($object_det[0]['no_of_night']) ? $object_det[0]['no_of_night'] : '0'; ?>;
		var total_no_of_pax = <?php echo isset($object_det[0]['total_no_of_pax']) ? $object_det[0]['total_no_of_pax'] : '0'; ?>;
		var no_of_adult = <?php echo isset($object_det[0]['no_of_adult']) ? $object_det[0]['no_of_adult'] : '0'; ?>;
		var no_of_child_with_bed = <?php echo isset($object_det[0]['no_of_child_with_bed']) ? $object_det[0]['no_of_child_with_bed'] : '0'; ?>;
		var no_of_child_without_bed = <?php echo isset($object_det[0]['no_of_child_without_bed']) ? $object_det[0]['no_of_child_without_bed'] : '0'; ?>;
		var no_of_double_room = <?php echo isset($object_det[0]['no_of_double_room']) ? $object_det[0]['no_of_double_room'] : '0'; ?>;
		var no_of_single_room = <?php echo isset($object_det[0]['no_of_single_room']) ? $object_det[0]['no_of_single_room'] : '0'; ?>;
		var no_of_extra_bed = <?php echo isset($object_det[0]['no_of_extra_bed']) ? $object_det[0]['no_of_extra_bed'] : '0'; ?>;
		var is_vehicle_required = <?php echo isset($object_det[0]['is_vehicle_required']) ? $object_det[0]['is_vehicle_required'] : '0'; ?>;
		var vehicle_models = <?php echo isset($vehicle_data) ? json_encode($vehicle_data) : '[]'; ?>;

		// Validate critical inputs
		if (!enquiry_header_id || !enquiry_details_id) {
			console.error('Missing enquiry_header_id or enquiry_details_id');
			$('#spinner_draft').hide();
			$this.prop('disabled', false);
			alert('Error: Invalid enquiry data.');
			return;
		}

		// Use Promise for AJAX to make it chainable and async-friendly
		var loadTourPromise = $.ajax({
			url: '<?php echo site_url('Enquiry/loadTourLocation'); ?>',
			type: 'POST',
			data: {
				enquiry_header_id,
				enquiry_details_id
			},
			dataType: 'json'
		});

		loadTourPromise.then(function(response) {
			console.log('=== TOUR VIEW LOAD RESPONSE ===');
			console.log('Full Response:', response);
			if (!response || response.length === 0) {
				showAlert('warning', 'No tour data found.');
				$('#spinner_draft').hide();
				$this.prop('disabled', false); // Re-enable button
				return Promise.reject('No data');
			}

			// Clear existing content
			$('.tab_con').empty();

			// Group data by tour_details_id (sync operation)
			var groupedData = {};
			$.each(response, function(index, item) {
				var tourDetailsId = item.tour_details_id;
				console.log(`Processing item ${index}, tour_details_id: ${tourDetailsId}`);
				console.log('Item room_category_id:', item.room_category_id);
				console.log('Item room_category_name:', item.room_category_name);

				if (!groupedData[tourDetailsId]) {
					groupedData[tourDetailsId] = {
						main: {
							tour_details_id: item.tour_details_id,
							geog_name: item.geog_name || 'Unknown Location',
							geog_id: item.tour_location || '',
							check_in_date: item.check_in_date || '',
							check_out_date: item.check_out_date || '',
							no_of_days: item.no_of_days || 0,
							hotel_id: item.hotel_id || '',
							hot_cat_id: item.hot_cat_id || '',
							room_category_id: item.room_category_id || '',
							tax_status: item.tax_status || 0,
							is_own_arrangement: item.is_own_arrangement || 0,
							tour_location: item.tour_location || '',
							meal_plan_id: item.meal_plan_id || ''
						},
						expansions: [] // Collect all expansions here
					};
					console.log(`Created main data for tour ${tourDetailsId}:`, groupedData[tourDetailsId].main);
				}

				// Handle nested expansions
				if (item.expansion && Array.isArray(item.expansion)) {
					console.log(`Processing ${item.expansion.length} expansions for tour ${tourDetailsId}`);
					$.each(item.expansion, function(eIndex, exp) {
						console.log(`Expansion ${eIndex}:`, exp);
						console.log(`Expansion room_category_id: ${exp.room_category_id}`);
						groupedData[tourDetailsId].expansions.push({
							tour_expansion_id: exp.tour_expansion_id,
							tour_expansion_date: exp.tour_expansion_date,
							expansion_room_category_id: exp.room_category_id || item.room_category_id || '',
							meal_plan_id: exp.meal_plan_id || item.meal_plan_id || '',
							room_rate_double: exp.room_rate_double || 0,
							child_with_bed_double: exp.child_with_bed_double || 0,
							child_without_bed_double: exp.child_without_bed_double || 0,
							extra_bed_double: exp.extra_bed_double || 0,
							double_total_rate: exp.double_total_rate || 0,
							room_rate_single: exp.room_rate_single || 0,
							child_with_bed_single: exp.child_with_bed_single || 0,
							child_without_bed_single: exp.child_without_bed_single || 0,
							extra_bed_single: exp.extra_bed_single || 0,
							single_total_rate: exp.single_total_rate || 0,
							vehicle_details_json: exp.vehicle_details_json || '' // Ensure this is captured
						});
						console.log(`Added expansion with room_category_id: ${exp.room_category_id || item.room_category_id}`);
					});
				}
			});

			console.log('=== GROUPED DATA ===');
			console.log(groupedData);

			// Convert to array
			var tourDetailsArray = Object.keys(groupedData).map(function(key) {
				return groupedData[key];
			});

			// Set loading flag ON
			isDraftLoading = true;

			var viewHtml = '';

			// Loop through each location and create cards (sync for HTML generation)
			$.each(tourDetailsArray, function(index, locationData) {
				var count = index + 1;
				var main = locationData.main;
				var expansions = locationData.expansions; // Raw expansions for grouping in function
				console.log(`\n=== CREATING VIEW CARD ${count} ===`);
				console.log('Main data:', main);
				console.log('Common room_category_id:', main.room_category_id);
				console.log('Number of expansions:', expansions.length);

				var ep_sel = main.meal_plan_id == 1 ? "selected" : "";
				var cp_sel = main.meal_plan_id == 2 ? "selected" : "";
				var map_sel = main.meal_plan_id == 3 ? "selected" : "";
				var ap_sel = main.meal_plan_id == 4 ? "selected" : "";

				// Build card HTML for view (readonly)
				viewHtml += `
				<div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
				<div class="card">
					<div class="card-header cardy">
						<div id="eighteen_div_d${count}"></div>
						<div id="eighteen_div_s${count}"></div>
						<input type="hidden" id="tax_status${count}" value="${main.tax_status}">
						<input type="hidden" id="own_arrange${count}" value="${main.is_own_arrangement}">
						<input type="hidden" id="tour_location_id${count}" value="${main.geog_id}">
						<input type="hidden" id="location_sequence${count}" value="${count}">
						<div class="card-title"><span class="card-seq" style="color:#339966;">${count}</span>. <span style="color:#339966;">${main.geog_name}</span></div>
						<div class="card-options">
							<!-- No remove option in view mode -->
						</div>
					</div>
					<div class="card-body">
						<div class="ibox teams mb-30 bg-boxshadow">
							<div class="ibox-content teams">
								<div class="row mt-2">
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Hotel Category</b></div>
								<select id="hotelcat${count}" class="form-control select2-show-search input-sm hotel_cat_change" data-id="${count}" disabled>
								<option value="">Select</option>
								</select>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Hotel</b></div>
								<span class="text-muted">
								<select id="hotelid${count}" class="form-control select2-show-search input-sm hotel_change" data-id="${count}" disabled>
								<option value="">Select</option>
								</select>
								</span>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Room Category</b></div>
								<select id="roomcat_common${count}" class="form-control select2-show-search input-sm room_cat_common_change" data-id="${count}" disabled>
								<option value="">Select</option>
								</select>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Checkin</b></div>
								<span class="text-muted">
								<input type="date" value="${main.check_in_date}" id="checkin${count}" class="form-control input-sm" required readonly>
								</span>
								</div>
								
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Nights</b></div>
								<span class="text-muted">
								<input type="text" id="no_of_night${count}" value="${main.no_of_days}" class="form-control input-sm no_of_night" count-id="${count}" maxlength="2" readonly>
								</span>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>Checkout</b></div>
									<span class="text-muted">
										<input type="date" id="checkout${count}" value="${main.check_out_date}" class="form-control input-sm" required readonly>
									</span>
								</div>
								</div>
								<div class="row mt-2">
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Meal Plan</b></div>
								<span class="text-muted">
											<select id="mealplan${count}" class="form-control select2-show-search input-sm mp_change" data-id="${count}" disabled>
												<option value="">Select</option>
												<option value="1" ${ep_sel}>EP</option>
												<option value="2" ${cp_sel}>CP</option>
												<option value="3" ${map_sel}>MAP</option>
												<option value="4" ${ap_sel}>AP</option>
											</select>
										</span>
									</div>
									<div class="col-xl col-sm-12 col-md-2">
										<div class="teams-rank"><b>No Of Adult</b></div>
										<input type="text" id="no_of_adult${count}" value="${no_of_adult}" class="form-control input-sm" maxlength="2" readonly>
									</div>
									<div class="col-xl col-sm-12 col-md-2">
										<div class="teams-rank"><b>C.With Bed Qty</b></div>
										<input type="text" id="no_of_ch${count}" value="${no_of_child_with_bed}" class="form-control input-sm" maxlength="2" readonly>
									</div>
									<div class="col-xl col-sm-12 col-md-2">
										<div class="teams-rank"><b>C.Without Bed Qty</b></div>
										<input type="text" id="no_of_cw${count}" value="${no_of_child_without_bed}" class="form-control input-sm" maxlength="2" readonly>
									</div>
									<div class="col-xl col-sm-12 col-md-2">
										<div class="teams-rank"><b>Extra Bed Qty</b></div>
										<input type="text" id="no_of_extra${count}" value="${no_of_extra_bed}" class="form-control input-sm" maxlength="2" readonly>
									</div>
									<div class="col-xl col-sm-12 col-md-2">
										<div class="teams-rank"><b>Total Pax</b></div>
										<input type="text" id="no_of_pax${count}" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" readonly>
									</div>
								</div>
								<div class="nightly-details" id="nightly-details${count}"></div>
							</div>
						</div>
					</div>
				</div>
				</div>
				`;
			});

			// Append all HTML at once (fast DOM update)
			$('.tab_con').html(viewHtml);

			// Show modal early for perceived faster load (non-blocking)
			$('#modal_tour').modal('show');

			// Chain async population using Promises to avoid fixed timeouts
			var populatePromises = [];
			$.each(tourDetailsArray, function(index, locationData) {
				var count = index + 1;
				var main = locationData.main;
				var expansions = locationData.expansions;

				// Create a promise chain for each location's population
				var locationPromise = populateLocationAsync(count, main, expansions, hotel_categories, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models);
				populatePromises.push(locationPromise);
			});

			// Wait for all locations to populate
			return Promise.all(populatePromises).then(function() {
				// Set loading flag OFF
				isDraftLoading = false;

				$('#spinner_draft').hide();
				showAlert('success', 'Tour details loaded successfully!');
				$this.prop('disabled', false); // Re-enable button for reusability
			});
		}).catch(function(error) {
			console.error('Tour load failed:', error);
			isDraftLoading = false;
			$('#spinner_draft').hide();
			$this.prop('disabled', false); // Re-enable on error
			showAlert('danger', 'Error loading tour data. Please try again.');
		});
	});

	// Handle modal close to prevent stuck state (cleanup select2 and spinners)
	$('#modal_tour').on('hidden.bs.modal', function() {
		// Destroy all select2 instances to free resources
		$('.select2-show-search').select2('destroy');
		// Hide any lingering spinners
		$('#spinner_draft').hide();
		// Reset loading flag
		isDraftLoading = false;
		// Clear content to prevent overlap in edit/view switch
		$('.tab_con').empty();
	});

	// Async function to populate a single location (replaces setTimeouts with promises)
	function populateLocationAsync(count, main, expansions, hotel_categories, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models) {
		return new Promise(function(resolve) {
			// Populate hotel categories (sync)
			var hotelCat = $('#hotelcat' + count);
			hotelCat.empty();
			hotelCat.append('<option value="">Select</option>');
			if (hotel_categories.length > 0) {
				$.each(hotel_categories, function(index, hotelcat) {
					var selected = hotelcat.hotel_category_id == main.hot_cat_id ? ' selected' : '';
					hotelCat.append('<option value="' + hotelcat.hotel_category_id + '"' + selected + '>' + hotelcat.hotel_category_name + '</option>');
				});
			}
			console.log(`Hotel category ${main.hot_cat_id} selected for location ${count}`);

			// Initialize Select2 (disabled) - sync
			$(`.location-card[data-index="${count}"] .select2-show-search`).select2({
				// Add passive wheel listener to suppress violation warnings
				dropdownParent: $('#modal_tour').length ? $('#modal_tour') : $(document.body),
				minimumResultsForSearch: Infinity,
				width: '100%',
				// Suppress wheel event violation by marking as passive (if supported)
				wheel: {
					passive: true
				}
			});

			// Simulate hotel category change with promise (async load hotels if needed; assume sync for now)
			var hotelLoadPromise = new Promise(function(hresolve) {
				console.log(`Triggering hotel category change for location ${count} in view mode`);
				hotelCat.trigger('change');
				// If hotel load is async, replace with actual AJAX promise here
				setTimeout(hresolve, 500); // Minimal wait; adjust if actual async
			});

			hotelLoadPromise.then(function() {
				console.log(`\n=== SETTING HOTEL ${main.hotel_id} for location ${count} in view ===`);
				$(`#hotelid${count}`).val(main.hotel_id).trigger('change');

				// Wait for room categories with promise
				var roomLoadPromise = new Promise(function(rresolve) {
					setTimeout(function() {
						console.log(`\n=== SETTING ROOM CATEGORY for location ${count} in view ===`);
						console.log(`Room category ID to set: ${main.room_category_id}`);

						// Check if room categories are loaded
						var roomCatOptions = $(`#roomcat_common${count} option`);
						console.log(`Number of room category options loaded: ${roomCatOptions.length}`);
						roomCatOptions.each(function() {
							console.log(`Option: value="${$(this).val()}", text="${$(this).text()}"`);
						});

						// Set the room category value
						$(`#roomcat_common${count}`).val(main.room_category_id);
						console.log(`Set roomcat_common${count} to: ${main.room_category_id}`);
						console.log(`Current value of roomcat_common${count}: ${$(`#roomcat_common${count}`).val()}`);

						// Trigger change event (for consistency, though disabled)
						$(`#roomcat_common${count}`).trigger('change');
						rresolve();
					}, 500); // Reduced timeout
				});

				roomLoadPromise.then(function() {
					// Generate nightly details with expansion data for view (includes vehicle fix)
					generateNightlyDetailsForView(count, main, expansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models);
					resolve();
				});
			});
		});
	}

	// View-mode safe updateVehicleTotals (skip dynamic checks, no checkboxes needed) - Updated to accept vehicle_models
	function updateVehicleTotalsViewMode(count, night, vindex, vdata, vehicle_models) {
		var vmodel = vehicle_models ? vehicle_models[vindex] : null;
		var vehTypeId = vdata.veh_type_id || (vmodel ? vmodel.vehicle_type_id : '');
		var vid = `${count}${night}${vehTypeId}`;
		// Basic total computation without checkboxes or dynamic logic
		var dayRent = parseFloat(vdata.day_rent || 0);
		var extraKm = parseFloat(vdata.extra_kilometer || 0);
		var extraRate = parseFloat(vdata.extra_km_rate || 0);
		var total = dayRent + (extraKm * extraRate);
		$(`#veh_total${vid}`).val(total.toFixed(2)); // Set computed total if not provided
		// Update any summary without .checked access
		// Assuming updateVehicleSummary can be called safely or skipped; wrap if needed
		try {
			updateVehicleSummary(count, night, vid, false); // Pass false for isDynamic or adjust
		} catch (e) {
			console.warn('Skipping vehicle summary update in view mode:', e);
		}
	}

	// Updated helper function to generate nightly details from draft data for view (fixed vehicle loading)
	// Key fixes: Wrap vehicle updates in try-catch, add veh_header population, use view-mode safe totals
	function generateNightlyDetailsForView(count, main, allExpansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models) {
		console.log(`\n=== GENERATING NIGHTLY DETAILS (VIEW MODE) for location ${count} ===`);
		console.log('Main room_category_id:', main.room_category_id);
		console.log('Number of expansions:', allExpansions.length);
		console.log('Vehicle models:', vehicle_models); // Debug: Check if vehicle_models is loaded

		var nightlyDetails = $(`#nightly-details${count}`);
		nightlyDetails.empty();
		var no_of_days = parseInt(main.no_of_days) || 0;
		var checkInDate = new Date(main.check_in_date);

		// Get option templates from the common selects (must exist)
		var commonRoomOptions = $(`#roomcat_common${count}`).html() || '<option value="">Select</option>';
		var commonMealOptions = $(`#mealplan${count}`).html() || '<option value="">Select</option>';

		// Group expansions by date (ensure tour_expansion_date is properly formatted)
		var expansionsByDate = {};
		allExpansions.forEach(function(exp) {
			// Fix date parsing if needed; assume ISO format
			var expDate = new Date(exp.tour_expansion_date);
			if (isNaN(expDate.getTime())) {
				console.warn('Invalid expansion date:', exp.tour_expansion_date);
				return;
			}
			var expDateStr = expDate.toDateString();
			if (!expansionsByDate[expDateStr]) expansionsByDate[expDateStr] = [];
			expansionsByDate[expDateStr].push(exp);
		});
		console.log('Expansions grouped by date:', expansionsByDate);

		for (let night = 1; night <= no_of_days; night++) {
			var nightDate = new Date(checkInDate);
			nightDate.setDate(checkInDate.getDate() + (night - 1));
			var nightDateStr = nightDate.toDateString();
			var nightExpansions = expansionsByDate[nightDateStr] || [];
			var numDoubles = parseInt(no_of_double_room) || 0;
			var numSingles = parseInt(no_of_single_room) || 0;
			var totalRooms = numDoubles + numSingles;

			console.log(`Night ${night}: ${nightExpansions.length} expansions, total rooms: ${totalRooms}`); // Debug

			// Reuse same UI structure from draft version (ensure generateNightHtml includes vehicle sections if required)
			var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, main.check_in_date);
			nightlyDetails.append(nightlyHtml);

			// Populate each room select's options and mealplan select's options BEFORE initializing Select2
			$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
				$(this).html(commonRoomOptions);
			});
			$(`#nightly-details${count} .night-section[data-night="${night}"] .mp_row_change`).each(function() {
				$(this).html(commonMealOptions);
			});

			// Disable native selects so they are readonly
			$(`#nightly-details${count} .night-section[data-night="${night}"] select`).prop('disabled', true);

			// Initialize select2 for visual only. Use dropdownParent when inside modal to avoid z-index issues.
			$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).each(function() {
				// If Select2 already initialized, destroy and re-init to avoid duplicates
				if ($(this).hasClass('select2-hidden-accessible')) {
					$(this).select2('destroy');
				}
				$(this).select2({
					dropdownParent: $('#modal_tour').length ? $('#modal_tour') : $(document.body),
					minimumResultsForSearch: Infinity,
					width: '100%' // ensure it fits container
						// Add passive wheel listener to suppress violation warnings
						,
					wheel: {
						passive: true
					}
				});
			});

			// Populate expansion data into the fields and set the selects' values (then trigger change for Select2 to update UI)
			if (nightExpansions.length > 0) {
				var roomExpansions = nightExpansions.slice(0, totalRooms);
				var doubleExpansions = roomExpansions.slice(0, numDoubles);
				var singleExpansions = roomExpansions.slice(numDoubles);

				// Fixed: Since vehicle data is embedded in room expansions (no separate vehicle expansion), use the last room expansion's data
				var vehicleExpansion = nightExpansions.length > 0 ? nightExpansions[nightExpansions.length - 1] : null;
				console.log(`Vehicle expansion for night ${night} (from last room):`, vehicleExpansion); // Debug: Check if captured

				// Double rooms
				for (let i = 1; i <= numDoubles; i++) {
					var rid = `${count}${night}${i}`;
					var exp = doubleExpansions[i - 1];
					if (exp) {
						var roomCatId = exp.expansion_room_category_id || main.room_category_id || '';
						var mealPlanId = exp.meal_plan_id || main.meal_plan_id || '';
						$(`#roomcat${rid}`).val(roomCatId).trigger('change.select2');
						$(`#mealplan${rid}`).val(mealPlanId).trigger('change.select2');

						$(`#d_adult_rate${rid}`).val(exp.room_rate_double || 0);
						$(`#d_child_rate${rid}`).val(exp.child_with_bed_double || 0);
						$(`#d_child_wb_rate${rid}`).val(exp.child_without_bed_double || 0);
						$(`#d_extra_bed_rate${rid}`).val(exp.extra_bed_double || 0);
						updateRoomTotals(count, night, i);
						$(`#d_total_rate${rid}`).val(exp.double_total_rate || 0);
					}
				}

				// Single rooms
				for (let i = 1; i <= numSingles; i++) {
					var seq = numDoubles + i;
					var sid = `${count}${night}${seq}`;
					var exp = singleExpansions[i - 1];
					if (exp) {
						var roomCatId = exp.expansion_room_category_id || main.room_category_id || '';
						var mealPlanId = exp.meal_plan_id || main.meal_plan_id || '';
						$(`#roomcat${sid}`).val(roomCatId).trigger('change.select2');
						$(`#mealplan${sid}`).val(mealPlanId).trigger('change.select2');

						$(`#s_adult_rate${sid}`).val(exp.room_rate_single || 0);
						$(`#s_child_rate${sid}`).val(exp.child_with_bed_single || 0);
						$(`#s_child_wb_rate${sid}`).val(exp.child_without_bed_single || 0);
						$(`#s_extra_bed_rate${sid}`).val(exp.extra_bed_single || 0);
						updateRoomTotals(count, night, seq);
						$(`#s_total_rate${sid}`).val(exp.single_total_rate || 0);
					}
				}

				// Fixed Vehicle data loading (readonly) - validate JSON and ensure vehicle_models alignment
				if (is_vehicle_required == 1 && vehicleExpansion && vehicleExpansion.vehicle_details_json && vehicle_models.length > 0) {
					console.log('Parsing vehicle details JSON:', vehicleExpansion.vehicle_details_json);
					try {
						var vehicleDetails = JSON.parse(vehicleExpansion.vehicle_details_json);
						console.log('Parsed vehicle details:', vehicleDetails);

						// NEW: Compute grand total for vehicles as we populate
						var grandVeh = 0;

						// Align with vehicle_models by index or veh_type_id
						$.each(vehicle_models, function(vindex, vmodel) {
							var matchingDetail = vehicleDetails.find(function(vdata) {
								return vdata.veh_type_id == vmodel.vehicle_type_id;
							}) || vehicleDetails[vindex] || {};
							var vdata = matchingDetail;
							var vid = `${count}${night}${vmodel.vehicle_type_id}`;
							console.log(`Setting vehicle ${vindex} (ID: ${vmodel.vehicle_type_id}):`, vdata);

							$(`#day_rent${vid}`).val(vdata.day_rent || 0);
							$(`#travel_distance${vid}`).val(vdata.travel_distance || 0);
							$(`#max_km_day${vid}`).val(vdata.max_km_day || 0);
							$(`#extra_km_rate${vid}`).val(vdata.extra_km_rate || 0);
							var travel = parseFloat(vdata.travel_distance || 0);
							var maxkm = parseFloat(vdata.max_km_day || 0);
							$(`#extra_kilometer${vid}`).val(Math.max(0, travel - maxkm));

							// Load individual header details
							$(`#arr_to_loc${vid}`).val(vdata.arr_to_loc || 0);
							$(`#pre_to_cur${vid}`).val(vdata.pre_to_cur || 0);
							$(`#cur_to_dep${vid}`).val(vdata.cur_to_dep || 0);
							$(`#dep_to_arr${vid}`).val(vdata.dep_to_arr || 0);
							$(`#hub_to_arr${vid}`).val(vdata.hub_to_arr || 0);

							if ($(`#vehicle_model${vid}`).length > 0) {
								$(`#vehicle_model${vid}`).text(vdata.vehicle_model || '');
							}
							$(`#vehicle_count${vid}`).val(vdata.vehicle_count || 1);

							// Set vehicle header display and hidden input
							var vFromToId = `v_from_to${count}${night}`;
							if ($(`#${vFromToId}`).length > 0) {
								$(`#${vFromToId}`).text(vdata.veh_header || '');
							}
							var vehicleHeaderId = `veh_header${count}${night}`;
							if ($(`#${vehicleHeaderId}`).length > 0) {
								$(`#${vehicleHeaderId}`).val(vdata.veh_header || '');
							}

							// FIXED: Set vehicle total directly from saved data
							var vehTotal = parseFloat(vdata.veh_total || 0);
							$(`#veh_total${vid}`).val(vehTotal.toFixed(2));

							// Add to grand total
							grandVeh += vehTotal;

							console.log(`Vehicle ${vindex} total: ${vehTotal}, Running grand total: ${grandVeh}`);
						});

						// Set the grand total after processing all vehicles
						$(`#veh_grand_total${count}${night}`).val(grandVeh.toFixed(2));
						console.log(`Set vehicle grand total for night ${night}: ${grandVeh}`);

					} catch (e) {
						console.error('Error parsing vehicle details for night ' + night + ':', e);
						// Set zero values on error
						$.each(vehicle_models, function(vindex, vmodel) {
							var vid = `${count}${night}${vmodel.vehicle_type_id}`;
							$(`#arr_to_loc${vid}`).val(0);
							$(`#pre_to_cur${vid}`).val(0);
							$(`#cur_to_dep${vid}`).val(0);
							$(`#dep_to_arr${vid}`).val(0);
							$(`#hub_to_arr${vid}`).val(0);
							$(`#veh_total${vid}`).val(0);
						});
						$(`#veh_grand_total${count}${night}`).val(0);
					}
				} else if (is_vehicle_required == 1) {
					console.warn('Vehicle required but no/invalid expansion data for night ' + night);
					// Set zero values
					$.each(vehicle_models, function(vindex, vmodel) {
						var vid = `${count}${night}${vmodel.vehicle_type_id}`;
						$(`#arr_to_loc${vid}`).val(0);
						$(`#pre_to_cur${vid}`).val(0);
						$(`#cur_to_dep${vid}`).val(0);
						$(`#dep_to_arr${vid}`).val(0);
						$(`#hub_to_arr${vid}`).val(0);
						$(`#veh_total${vid}`).val(0);
					});
					$(`#veh_grand_total${count}${night}`).val(0);
				}
			}

			// Ensure all room totals are updated (recompute base/gst for display, even if no exp)
			for (let i = 1; i <= numDoubles; i++) {
				updateRoomTotals(count, night, i);
			}
			for (let i = 1; i <= numSingles; i++) {
				var seq = numDoubles + i;
				updateRoomTotals(count, night, seq);
			}

			// Compute grand totals for rooms
			var grandDouble = 0;
			for (let i = 1; i <= numDoubles; i++) {
				var rid = `${count}${night}${i}`;
				grandDouble += parseFloat($(`#d_total_rate${rid}`).val() || 0);
			}
			$(`#dd_total_rate${count}${night}`).val(grandDouble);

			var grandSingle = 0;
			for (let i = 1; i <= numSingles; i++) {
				var seq = numDoubles + i;
				var sid = `${count}${night}${seq}`;
				grandSingle += parseFloat($(`#s_total_rate${sid}`).val() || 0);
			}
			$(`#ss_total_rate${count}${night}`).val(grandSingle);

			/*
			REMOVED: The overriding "Handle vehicle grand total" block here.
			This was setting totals to 0 via dummy data, wiping saved values.
			The if/else above already handles vehicles correctly (saved or 0).
			If needed for recompute, modify updateVehicleTotalsViewMode to read DOM values.
			*/
		}

		// Keep select2 visually active (not grayed out)
		$(`#nightly-details${count} .select2-selection`).css({
			'background-color': '#fff',
			'color': '#000',
			'cursor': 'default'
		});

		// Disable all native form inputs as final safety net
		$(`#nightly-details${count} input, #nightly-details${count} select, #nightly-details${count} textarea`).prop('disabled', true);

		console.log(`=== COMPLETED NIGHTLY DETAILS (VIEW MODE) for location ${count} ===\n`);
	}
</script>

<script type="text/javascript">
	$(document).on('click', '.qq_view', function(e) {
		e.preventDefault();
		var tourPlanDet = <?php echo json_encode($tour_plan_det); ?>;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var quick_quote_det = <?php echo json_encode($quick_quote_det); ?>;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var rts;
		var room_types = JSON.parse(tourPlanDet[0]['room_type']);
		var vehicle_details = JSON.parse(tourPlanDet[0]['vehicle_details']);
		var rt_count = 0;
		var sino;
		var room_t_d = 0;
		var room_t_s = 0;

		var child_t_d = 0;
		var child_t_s = 0;

		var child_wb_t_d = 0;
		var child_wb_t_s = 0;

		var extra_t_d = 0;
		var extra_t_s = 0;

		var no_of_double = 0;
		var no_of_single = 0;

		var room_total;
		var child_total;
		var child_wb_total;
		var extra_total;
		var d_totals = 0;
		var s_totals = 0;
		var g_total = 0;
		var veh_total;
		var veh_totals;
		var extra_cost;
		var ttc = 0;
		$.each(room_types, function(index1, item1) {
			if (parseInt(item1.double) > 0) {
				rt_count += 1;
				no_of_double = item1.double;
			}
			if (parseInt(item1.single) > 0) {
				rt_count += 1;
				no_of_single = item1.single;
			}
		});

		var html = '';
		html += '<textarea name="quick_quote_template" id="quick_quote_template" style="width:100%; height:1000px;">';
		html += '<div class="container">';
		html += '<table style="width:100%;border-collapse: collapse;border: 1px solid black;">';
		html += '<tr>';
		html += '<td colspan="7" style="background-color:#ffe680;color:black;font-weight:bold;text-align:center;"> Accommodation </td>';
		html += '<td colspan="6" style="background-color:#ffe680;color:black;font-weight:bold;text-align:center;"> Quantity </td>';
		html += '<td colspan="6" style="background-color:#ffe680;color:black;font-weight:bold;text-align:center;"> Tariff Rates </td>';
		html += '</tr>';
		html += '<tr>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Si No </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Location </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Start Date </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Nights </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> End Date </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Hotel </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Room Category </th>';
		if (no_of_double > 0) {
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Double </th>';
		}
		if (no_of_single > 0) {
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Single </th>';
		}
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Adult </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> C.With Bed </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> C.Without Bed </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Extra Bed </th>';

		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Room Type </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Adult </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> C.With Bed </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> C.Without Bed </th>';
		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Extra Bed </th>';

		html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Total </th>';
		html += '</tr>';
		$.each(quick_quote_det, function(index, item) {
			sino = index + 1;
			rts = JSON.parse(item.room_type);
			html += '<tr>';

			if (item.is_own_arrangement == 1) {
				html += '<td style="border:1px solid black;">' + sino + '</td>';
				html += '<td style="border:1px solid black;">' + item.geog_name + '</td>';
				html += '<td style="border:1px solid black;">' + item.check_in_date + '</td>';
				html += '<td style="border:1px solid black;">' + item.no_of_days + '</td>';
				html += '<td style="border:1px solid black;">' + item.check_out_date + '</td>';
				html += '<td style="border:1px solid black;">' + item.object_name + '</td>';
				html += '<td style="border:1px solid black;">' + item.room_category_name + '</td>';

				if (no_of_double > 0) {
					html += '<td style="border:1px solid black;">' + item.no_of_double_room + '</td>';
				}
				if (no_of_single > 0) {
					html += '<td style="border:1px solid black;">' + item.no_of_single_room + '</td>';
				}
				html += '<td style="border:1px solid black;">' + item.no_of_adult + '</td>';
				html += '<td style="border:1px solid black;">' + item.no_of_child_with_bed + '</td>';
				html += '<td style="border:1px solid black;">' + item.no_of_child_without_bed + '</td>';
				html += '<td style="border:1px solid black;">' + item.no_of_extra_bed + '</td>';
				html += '<td colspan="6" style="border:1px solid black;">Own Arrangement</td>';

			} else {
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + sino + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.geog_name + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.check_in_date + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_days + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.check_out_date + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.object_name + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.room_category_name + '</td>';

				if (no_of_double > 0) {
					html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_double_room + '</td>';
				}
				if (no_of_single > 0) {
					html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_single_room + '</td>';
				}
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_adult + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_child_with_bed + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_child_without_bed + '</td>';
				html += '<td rowspan="' + rt_count + '" style="border:1px solid black;">' + item.no_of_extra_bed + '</td>';
				$.each(rts, function(index2, item2) {
					if (item2.double > 0) {
						html += '<td style="border:1px solid black;">Double</td>';
						$.each(item.cost, function(index3, item3) {
							if (item3.cost_component_id == "6" && item3.room_type_id == "2") {
								room_t_d = item3.quick_quote_tariff;
							}
							if (item3.cost_component_id == "12" && item3.room_type_id == "2") {
								child_t_d = item3.quick_quote_tariff;
							}
							if (item3.cost_component_id == "15" && item3.room_type_id == "2") {
								child_wb_t_d = item3.quick_quote_tariff;
							}
							if (item3.cost_component_id == "9" && item3.room_type_id == "2") {
								extra_t_d = item3.quick_quote_tariff;
							}
						});
						html += '<td style="border:1px solid black;">' + room_t_d + '</td>';
						html += '<td style="border:1px solid black;">' + child_t_d + '</td>';
						html += '<td style="border:1px solid black;">' + child_wb_t_d + '</td>';
						html += '<td style="border:1px solid black;">' + extra_t_d + '</td>';
						room_total = parseInt(item.no_of_double_room) * parseInt(room_t_d);
						child_total = parseInt(item.no_of_child_with_bed) * parseInt(child_t_d);
						child_wb_total = parseInt(item.no_of_child_without_bed) * parseInt(child_wb_t_d);
						extra_total = parseInt(item.no_of_extra_bed) * parseInt(extra_t_d);
						var d_totals = (room_total + child_total + child_wb_total + extra_total) * parseInt(item.no_of_days);
						g_total = g_total + d_totals;
						html += '<td style="border:1px solid black;"><b>' + d_totals + '</b></td>';
						html += '</tr>';
					}



					if (item2.single > 0) {
						if (item2.double > 0) {
							html += '<tr>';
						}
						html += '<td style="border:1px solid black;">Single</td>';
						$.each(item.cost, function(index3, item3) {
							if (item3.cost_component_id == "6" && item3.room_type_id == "1") {
								room_t_s = item3.quick_quote_tariff;
							}
							if (item3.cost_component_id == "12" && item3.room_type_id == "1") {
								child_t_s = item3.quick_quote_tariff;
							}
							if (item3.cost_component_id == "15" && item3.room_type_id == "1") {
								child_wb_t_s = item3.quick_quote_tariff;
							}
							if (item3.cost_component_id == "9" && item3.room_type_id == "1") {
								extra_t_s = item3.quick_quote_tariff;
							}
						});
						html += '<td style="border:1px solid black;">' + room_t_s + '</td>';
						html += '<td style="border:1px solid black;">' + child_t_s + '</td>';
						html += '<td style="border:1px solid black;">' + child_wb_t_s + '</td>';
						html += '<td style="border:1px solid black;">' + extra_t_s + '</td>';
						s_totals = (parseInt(item.no_of_single_room) * parseInt(room_t_s)) * parseInt(item.no_of_days);
						g_total = g_total + s_totals;
						html += '<td style="border:1px solid black;"><b>' + s_totals + '</b></td>';
					}

				});
			}

			html += '</tr>';
		});
		html += '</table>';
		html += '<h4 style="float:right;">Total Accommodation Cost : Rs. ' + g_total + '.00</h4>';
		if (is_vehicle_required == 1) {
			html += '<table style="width:100%;border-collapse: collapse;border: 1px solid black;">';
			html += '<tr>';
			html += '<td colspan="12" style="background-color:#ffe680;color:black;font-weight:bold;text-align:center;"> Transportation </td>';
			html += '</tr>';
			html += '<tr>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Si No </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Location </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Checkin </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Night </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Checkout </td>';

			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Vehicle Model </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Vehicle Count </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Day Rent </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Distance </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Extra KM </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Extra KM Rate </td>';
			html += '<td style="background-color:#4baf58;color:#fff;border:1px solid black;"> Total </td>';
			html += '</tr>';
			var vehicleDetails;
			$.each(quick_quote_det, function(index5, item5) {
				sino = index5 + 1;
				vehicleDetails = JSON.parse(item5.vehicle_details);
				html += '<tr>';
				html += '<td rowspan="' + vehicle_details.length + '" style="border:1px solid black;">' + sino + '</td>';
				html += '<td rowspan="' + vehicle_details.length + '" style="border:1px solid black;">' + item5.geog_name + '</td>';
				html += '<td rowspan="' + vehicle_details.length + '" style="border:1px solid black;">' + item5.check_in_date + '</td>';
				html += '<td rowspan="' + vehicle_details.length + '" style="border:1px solid black;">' + item5.no_of_days + '</td>';
				html += '<td rowspan="' + vehicle_details.length + '" style="border:1px solid black;">' + item5.check_out_date + '</td>';
				$.each(vehicleDetails, function(indexv, itemv) {
					extra_cost = parseInt(itemv.extra_kilometer) * parseInt(itemv.extra_km_rate);
					veh_totals = (parseInt(itemv.vehicle_count) * parseInt(itemv.day_rent)) * parseInt(item5.no_of_days);
					veh_total = veh_totals + extra_cost;

					html += '<td style="border:1px solid black;">' + itemv.vehicle_model + '</td>';
					html += '<td style="border:1px solid black;">' + itemv.vehicle_count + '</td>';
					html += '<td style="border:1px solid black;">' + itemv.day_rent + '</td>';
					html += '<td style="border:1px solid black;">' + itemv.travel_distance + '</td>';
					html += '<td style="border:1px solid black;">' + itemv.extra_kilometer + '</td>';
					html += '<td style="border:1px solid black;">' + itemv.extra_km_rate + '</td>';
					html += '<td style="border:1px solid black;">' + veh_total + '</td>';
					html += '</tr>';
					html += '<tr>';
					ttc = ttc + veh_total;
				});
				html += '</tr>';

			});

			html += '</table>';
		}
		if (is_vehicle_required == 1) {
			html += '<h4 style="float:right;">Total Transportation Cost : Rs. ' + ttc + '.00</h4>';
		}
		var grand_total = ttc + g_total;
		html += '<br/><br/><h4 style="float:right;">Grand Total : Rs. ' + grand_total + '.00</h4>';
		html += '</div>';
		html += '</textarea>';

		$('.tab_con_qq').html(html);
		$('#modal_qq').modal('show');
		$('#modal_qq').on('shown.bs.modal', function() {
			tinymce.remove('#quick_quote_template');
			tinyMCE.init({
				theme: "advanced",
				theme_advanced_toolbar_location: "top",
				theme_advanced_toolbar_align: "left",
				mode: "exact",
				elements: "quick_quote_template",
				readonly: true
			});
		});
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
		var rent_per_day_temp = day_rent + extra_cost;
		var veh_count = parseInt($('#veh_count' + id).val());
		var no_of_night = parseInt($('#no_of_night' + cid).val());
		var total = (veh_count * rent_per_day_temp) * no_of_night;
		$('#veh_total' + id).val(total);

		var veh_grand_total = get_veh_grand_total();
		// $('#v_total').text(veh_grand_total);

		var accom_grand_total = updateGrandtotalBoth();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		// $('#g_total').text(g_total);

		var veh_grand_totalloc = get_veh_grand_total_byloc(cid);
		var accom_grand_totalloc = get_accom_grand_total_byloc(cid);
		// $('#loc_total' + cid).text(accom_grand_totalloc + " + " + veh_grand_totalloc);
		calculateVehicleExtraKmCharges();

	});
</script>
<script type="text/javascript">
	// $(document).on('keyup', '.cls_dist', function(e) {
	// 	var id = $(this).attr('data-id');
	// 	var cid = $(this).attr('data-cid');
	// 	var extra_klm = 0;
	// 	var max_km_day = parseInt($('#max_km_day' + id).val());
	// 	var travel_distance = parseInt($('#travel_distance' + id).val());
	// 	if (travel_distance > max_km_day) {
	// 		extra_klm = travel_distance - max_km_day;
	// 	} else {
	// 		extra_klm = 0;
	// 	}

	// 	$('#extra_kilometer' + id).val(extra_klm);
	// 	var extra_km_rate = parseInt($('#extra_km_rate' + id).val());
	// 	var extra_cost = extra_klm * extra_km_rate;

	// 	var day_rent = parseInt($('#day_rent' + id).val());

	// 	var rent_per_day_temp = day_rent + extra_cost;
	// 	var veh_count = parseInt($('#veh_count' + id).val());
	// 	var no_of_night = parseInt($('#no_of_night' + cid).val());
	// 	var total = (veh_count * rent_per_day_temp) * no_of_night;
	// 	// $('#veh_total' + id).val(total);

	// 	var veh_grand_total = get_veh_grand_total();
	// 	// $('#v_total').text(veh_grand_total);

	// 	var accom_grand_total = updateGrandtotalBoth();
	// 	var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
	// 	// $('#g_total').text(g_total);

	// 	var veh_grand_totalloc = get_veh_grand_total_byloc(cid);
	// 	var accom_grand_totalloc = get_accom_grand_total_byloc(cid);
	// 	// $('#loc_total' + cid).text(accom_grand_totalloc + " + " + veh_grand_totalloc);
	// 	calculateVehicleExtraKmCharges();
	// });
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
<!-- //nj// -->
<script>
	var isDraftLoading = false; // Global flag to skip handlers during draft load

	$(document).on('click', '.draft_view', function() {
		var $this = $(this);
		if ($this.prop('disabled')) return;
		$this.prop('disabled', true);
		$('#spinner_draft').show();

		// Safe PHP variable initialization
		var enquiry_header_id = <?php echo isset($object_det[0]['enquiry_header_id']) ? $object_det[0]['enquiry_header_id'] : 'null'; ?>;
		var enquiry_details_id = <?php echo isset($object_det[0]['enquiry_details_id']) ? $object_det[0]['enquiry_details_id'] : 'null'; ?>;
		var hotel_categories = <?php echo isset($hotel_categories) ? json_encode($hotel_categories) : '[]'; ?>;
		var no_of_night = <?php echo isset($object_det[0]['no_of_night']) ? $object_det[0]['no_of_night'] : '0'; ?>;
		var total_no_of_pax = <?php echo isset($object_det[0]['total_no_of_pax']) ? $object_det[0]['total_no_of_pax'] : '0'; ?>;
		var no_of_adult = <?php echo isset($object_det[0]['no_of_adult']) ? $object_det[0]['no_of_adult'] : '0'; ?>;
		var no_of_child_with_bed = <?php echo isset($object_det[0]['no_of_child_with_bed']) ? $object_det[0]['no_of_child_with_bed'] : '0'; ?>;
		var no_of_child_without_bed = <?php echo isset($object_det[0]['no_of_child_without_bed']) ? $object_det[0]['no_of_child_without_bed'] : '0'; ?>;
		var no_of_double_room = <?php echo isset($object_det[0]['no_of_double_room']) ? $object_det[0]['no_of_double_room'] : '0'; ?>;
		var no_of_single_room = <?php echo isset($object_det[0]['no_of_single_room']) ? $object_det[0]['no_of_single_room'] : '0'; ?>;
		var no_of_extra_bed = <?php echo isset($object_det[0]['no_of_extra_bed']) ? $object_det[0]['no_of_extra_bed'] : '0'; ?>;
		var is_vehicle_required = <?php echo isset($object_det[0]['is_vehicle_required']) ? $object_det[0]['is_vehicle_required'] : '0'; ?>;
		var vehicle_models = <?php echo isset($vehicle_data) ? json_encode($vehicle_data) : '[]'; ?>;

		// Validate critical inputs
		if (!enquiry_header_id || !enquiry_details_id) {
			console.error('Missing enquiry_header_id or enquiry_details_id');
			$('#spinner_draft').hide();
			$this.prop('disabled', false);
			alert('Error: Invalid enquiry data.');
			return;
		}

		$('#btn_add_bt').prop('disabled', false);
		$.ajax({
			url: '<?php echo site_url('Enquiry/loadTourLocation'); ?>',
			type: 'POST',
			data: {
				enquiry_header_id,
				enquiry_details_id
			},
			dataType: 'json',
			success: function(response) {
				console.log('=== DRAFT LOAD RESPONSE ===');
				console.log('Full Response:', response);
				if (!response || response.length === 0) {
					showAlert('warning', 'No draft data found.');
					$('#spinner_draft').hide();
					return;
				}

				// Clear existing tour plan
				$('.tour_plan_div').empty();
				$('.dyn_list').empty();

				// Group data by tour_details_id
				var groupedData = {};
				$.each(response, function(index, item) {
					var tourDetailsId = item.tour_details_id;
					console.log(`Processing item ${index}, tour_details_id: ${tourDetailsId}`);
					console.log('Item room_category_id:', item.room_category_id);
					console.log('Item room_category_name:', item.room_category_name);

					if (!groupedData[tourDetailsId]) {
						groupedData[tourDetailsId] = {
							main: {
								tour_details_id: item.tour_details_id,
								geog_name: item.geog_name || 'Unknown Location',
								geog_id: item.tour_location || '',
								check_in_date: item.check_in_date || '',
								check_out_date: item.check_out_date || '',
								no_of_days: item.no_of_days || 0,
								hotel_id: item.hotel_id || '',
								hot_cat_id: item.hot_cat_id || '',
								room_category_id: item.room_category_id || '',
								tax_status: item.tax_status || 0,
								is_own_arrangement: item.is_own_arrangement || 0,
								tour_location: item.tour_location || '',
								meal_plan_id: item.meal_plan_id || '',
								vehicle_details: item.vehicle_details || ''
							},
							expansions: [] // Collect all expansions here
						};
						console.log(`Created main data for tour ${tourDetailsId}:`, groupedData[tourDetailsId].main);
					}

					// Handle nested expansions
					if (item.expansion && Array.isArray(item.expansion)) {
						console.log(`Processing ${item.expansion.length} expansions for tour ${tourDetailsId}`);
						$.each(item.expansion, function(eIndex, exp) {
							console.log(`Expansion ${eIndex}:`, exp);
							console.log(`Expansion room_category_id: ${exp.room_category_id}`);
							groupedData[tourDetailsId].expansions.push({
								tour_expansion_id: exp.tour_expansion_id,
								tour_expansion_date: exp.tour_expansion_date,
								expansion_room_category_id: exp.room_category_id || item.room_category_id || '',
								meal_plan_id: exp.meal_plan_id || item.meal_plan_id || '',
								room_rate_double: exp.room_rate_double || 0,
								child_with_bed_double: exp.child_with_bed_double || 0,
								child_without_bed_double: exp.child_without_bed_double || 0,
								extra_bed_double: exp.extra_bed_double || 0,
								double_total_rate: exp.double_total_rate || 0,
								room_rate_single: exp.room_rate_single || 0,
								child_with_bed_single: exp.child_with_bed_single || 0,
								child_without_bed_single: exp.child_without_bed_single || 0,
								extra_bed_single: exp.extra_bed_single || 0,
								single_total_rate: exp.single_total_rate || 0,
								vehicle_details_json: exp.vehicle_details_json || ''
							});
							console.log(`Added expansion with room_category_id: ${exp.room_category_id || item.room_category_id}`);
						});
					}
				});

				console.log('=== GROUPED DATA ===');
				console.log(groupedData);

				// Convert to array
				var tourDetailsArray = Object.keys(groupedData).map(function(key) {
					return groupedData[key];
				});

				// Set loading flag ON
				isDraftLoading = true;

				// Loop through each location and create cards
				$.each(tourDetailsArray, function(index, locationData) {
					var count = index + 1;
					var main = locationData.main;
					var expansions = locationData.expansions; // Raw expansions for grouping in function
					console.log(`\n=== CREATING CARD ${count} ===`);
					console.log('Main data:', main);
					console.log('Common room_category_id:', main.room_category_id);
					console.log('Number of expansions:', expansions.length);

					var ep_sel = main.meal_plan_id == 1 ? "selected" : "";
					var cp_sel = main.meal_plan_id == 2 ? "selected" : "";
					var map_sel = main.meal_plan_id == 3 ? "selected" : "";
					var ap_sel = main.meal_plan_id == 4 ? "selected" : "";

					// Build card HTML
					var newCard = `
	<div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
		<div class="card">
			<div class="card-header cardy">
				<div id="eighteen_div_d${count}"></div>
				<div id="eighteen_div_s${count}"></div>
				<input type="hidden" id="tax_status${count}" name="addloc[${count}][tax_status]" value="${main.tax_status}">
				<input type="hidden" id="own_arrange${count}" name="addloc[${count}][own_arrange]" value="${main.is_own_arrangement}">
				<input type="hidden" id="tour_location_id${count}" name="addloc[${count}][tour_location_id]" value="${main.geog_id}">
				<input type="hidden" id="location_sequence${count}" name="addloc[${count}][location_sequence]" value="${count}">
				<div class="card-title"><span class="card-seq" style="color:#339966;">${count}</span>. <span style="color:#339966;">${main.geog_name}</span></div>
				<div class="card-options">
					<a href="#" class="card-options-remove"><i class="fe fe-x"></i></a>
				</div>
			</div>
			<div class="card-body">
				<div class="ibox teams mb-30 bg-boxshadow">
					<div class="ibox-content teams">
						<div class="row mt-2">
						<div class="col-xl col-sm-12 col-md-2">
						<div class="teams-rank"><b>Hotel Category</b></div>
						<select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search input-sm hotel_cat_change" data-id="${count}" required>
						<option value="">Select</option>
						</select>
						</div>
						<div class="col-xl col-sm-12 col-md-2">
						<div class="teams-rank"><b>Hotel</b></div>
						<span class="text-muted">
						<select id="hotelid${count}" name="addloc[${count}][hotelid]" class="form-control select2-show-search input-sm hotel_change" data-id="${count}" required>
						<option value="">Select</option>
						</select>
						</span>
						</div>
						<div class="col-xl col-sm-12 col-md-2">
						<div class="teams-rank"><b>Room Category</b></div>
						<select id="roomcat_common${count}" name="addloc[${count}][roomcat_common]" class="form-control select2-show-search input-sm room_cat_common_change" data-id="${count}">
						<option value="">Select</option>
						</select>
						</div>
						<div class="col-xl col-sm-12 col-md-2">
						<div class="teams-rank"><b>Checkin</b></div>
						<span class="text-muted">
						<input type="date" value="${main.check_in_date}" id="checkin${count}" name="addloc[${count}][checkin]" class="form-control input-sm" required readonly>
						</span>
						</div>
						
						<div class="col-xl col-sm-12 col-md-2">
						<div class="teams-rank"><b>Nights</b></div>
						<span class="text-muted">
						<input type="text" id="no_of_night${count}" name="addloc[${count}][no_of_night]" value="${main.no_of_days}" class="form-control input-sm no_of_night" count-id="${count}" maxlength="2" oninput="validateNumericInput(this); calculateCheckout(${count}); updateNightlyDetails(${count});" required>
						</span>
						</div>
						<div class="col-xl col-sm-12 col-md-2">
							<div class="teams-rank"><b>Checkout</b></div>
							<span class="text-muted">
								<input type="date" id="checkout${count}" name="addloc[${count}][checkout]" value="${main.check_out_date}" class="form-control input-sm" required readonly>
							</span>
						</div>
						</div>
						<div class="row mt-2">
							<div class="col-xl col-sm-12 col-md-2">
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
							<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>No Of Adult</b></div>
								<input type="text" id="no_of_adult${count}" name="addloc[${count}][no_of_adult]" value="${no_of_adult}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>C.With Bed Qty</b></div>
								<input type="text" id="no_of_ch${count}" name="addloc[${count}][no_of_ch]" value="${no_of_child_with_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>C.Without Bed Qty</b></div>
								<input type="text" id="no_of_cw${count}" name="addloc[${count}][no_of_cw]" value="${no_of_child_without_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Extra Bed Qty</b></div>
								<input type="text" id="no_of_extra${count}" name="addloc[${count}][no_of_extra]" value="${no_of_extra_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Total Pax</b></div>
								<input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly>
							</div>
						</div>
						<div class="nightly-details" id="nightly-details${count}"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	`;
					$(".tour_plan_div").append(newCard);

					// Build breadcrumb
					var breadcrumb = `
	<li class="bc-card" data-index="${count}">
		<a>
			<span class="bc-card-seq" style="color:#fff">${count}</span>.<span style="color:#fff">${main.geog_name}(<span id="span_night_id${count}" style="color:#fff">${main.no_of_days}</span>)<span id="loc_total${count}" style="color:#fff"></span></span>
		</a>
	</li>
	`;
					$('.dyn_list').append(breadcrumb);

					// Populate hotel categories
					var hotelCat = $('#hotelcat' + count);
					hotelCat.empty();
					hotelCat.append('<option value="">Select</option>');
					if (hotel_categories.length > 0) {
						$.each(hotel_categories, function(index, hotelcat) {
							var selected = hotelcat.hotel_category_id == main.hot_cat_id ? ' selected' : '';
							hotelCat.append('<option value="' + hotelcat.hotel_category_id + '"' + selected + '>' + hotelcat.hotel_category_name + '</option>');
						});
					}
					console.log(`Hotel category ${main.hot_cat_id} selected for location ${count}`);

					// Initialize Select2
					$(`.location-card[data-index="${count}"] .select2-show-search`).select2();

					// Trigger hotel category change to load hotels
					console.log(`Triggering hotel category change for location ${count}`);
					hotelCat.trigger('change');

					// Wait for hotels to load, then set selected hotel and room categories
					setTimeout(function() {
						console.log(`\n=== SETTING HOTEL ${main.hotel_id} for location ${count} ===`);
						$(`#hotelid${count}`).val(main.hotel_id).trigger('change');

						// Wait for room categories to load
						setTimeout(function() {
							console.log(`\n=== SETTING ROOM CATEGORY for location ${count} ===`);
							console.log(`Room category ID to set: ${main.room_category_id}`);

							// Check if room categories are loaded
							var roomCatOptions = $(`#roomcat_common${count} option`);
							console.log(`Number of room category options loaded: ${roomCatOptions.length}`);
							roomCatOptions.each(function() {
								console.log(`Option: value="${$(this).val()}", text="${$(this).text()}"`);
							});

							// Set the room category value
							$(`#roomcat_common${count}`).val(main.room_category_id);
							console.log(`Set roomcat_common${count} to: ${main.room_category_id}`);
							console.log(`Current value of roomcat_common${count}: ${$(`#roomcat_common${count}`).val()}`);

							// Trigger change event
							$(`#roomcat_common${count}`).trigger('change');

							// Generate nightly details with expansion data
							generateNightlyDetailsFromDraft(count, main, expansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models);
						}, 1000); // Increased timeout to ensure room categories are loaded
					}, 1000); // Increased timeout to ensure hotels are loaded
				});

				// Update totals and UI
				setTimeout(function() {
					var totalNights = calculateTotalNights();
					$('#planned_night').text(totalNights + " / ");
					if (totalNights == no_of_night) {
						$("#btn_save_tour_plan").show();
						$("#btn_savedraft_tour_plan").show();
						$('#btn_add_bt').prop('disabled', true);
					} else {
						$("#btn_save_tour_plan").hide();
						$("#btn_savedraft_tour_plan").show();
						$('#btn_add_bt').prop('disabled', false);
					}
					updateGrandtotalBoth();
					get_veh_grand_total();
					toggleNightsVisibility();
					calculateVehicleExtraKmCharges();

					// Set loading flag OFF
					isDraftLoading = false;

					$('#spinner_draft').hide();
					showAlert('success', 'Draft loaded successfully!');
				}, 3000);
			},
			error: function(xhr, status, error) {
				console.error('Error loading draft:', error);
				showAlert('danger', 'Error loading draft data. Please try again.');
				$('#spinner_draft').hide();
			}
		});
	});


	// Add these GST field mappings to the expansion data population in generateNightlyDetailsFromDraft

	function generateNightlyDetailsFromDraft(count, main, allExpansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models) {
		console.log(`\n=== GENERATING NIGHTLY DETAILS for location ${count} ===`);
		console.log('Main room_category_id:', main.room_category_id);
		console.log('Main tax_status:', main.tax_status);
		console.log('Number of expansions:', allExpansions.length);

		var nightlyDetails = $(`#nightly-details${count}`);
		nightlyDetails.empty();
		var no_of_days = parseInt(main.no_of_days) || 0;
		var checkInDate = new Date(main.check_in_date);
		var isDynamic = getIsDynamic();

		// Group expansions by date
		var expansionsByDate = {};
		allExpansions.forEach(function(exp) {
			var expDate = new Date(exp.tour_expansion_date).toDateString();
			if (!expansionsByDate[expDate]) {
				expansionsByDate[expDate] = [];
			}
			expansionsByDate[expDate].push(exp);
		});
		console.log('Expansions grouped by date:', expansionsByDate);

		// Generate night sections
		for (let night = 1; night <= no_of_days; night++) {
			var nightDate = new Date(checkInDate);
			nightDate.setDate(checkInDate.getDate() + (night - 1));
			var nightDateStr = nightDate.toDateString();
			var nightExpansions = expansionsByDate[nightDateStr] || [];
			console.log(`\n--- Night ${night} (Date: ${nightDateStr}) ---`);
			console.log('Night expansions count:', nightExpansions.length);

			var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, main.check_in_date);
			nightlyDetails.append(nightlyHtml);

			// Populate room categories from common dropdown
			var commonOptions = $(`#roomcat_common${count}`).html();
			$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
				$(this).html(commonOptions);
			});

			// Initialize Select2
			$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();

			// Set vehicle header based on mode
			if (!isDynamic && main.vehicle_details) {
				try {
					var mainVehicleDetails = typeof main.vehicle_details === 'string' ? JSON.parse(main.vehicle_details) : main.vehicle_details;
					if (mainVehicleDetails.length > 0 && mainVehicleDetails[0].veh_header) {
						$(`#v_from_to${count}${night}`).text(mainVehicleDetails[0].veh_header);
					}
				} catch (e) {
					console.error('Error parsing main vehicle details for header:', e);
				}
			}

			// Populate expansion data per room
			if (nightExpansions.length > 0) {
				console.log(`Populating expansion data for night ${night}`);
				var numDoubles = parseInt(no_of_double_room);
				var numSingles = parseInt(no_of_single_room);
				var doubleExpansions = nightExpansions.slice(0, numDoubles);
				var singleExpansions = nightExpansions.slice(numDoubles, numDoubles + numSingles);
				var vehicleExpansion = nightExpansions[0];

				// Dynamic mode: Set vehicle header from expansion
				if (isDynamic && vehicleExpansion && vehicleExpansion.vehicle_details_json) {
					try {
						var vehicleDetails = JSON.parse(vehicleExpansion.vehicle_details_json);
						if (vehicleDetails.length > 0 && vehicleDetails[0].veh_header) {
							$(`#v_from_to${count}${night}`).text(vehicleDetails[0].veh_header);
						}
					} catch (e) {
						console.error('Error parsing vehicle details for header:', e);
					}
				}

				// Set room data for double rooms
				for (let i = 1; i <= numDoubles; i++) {
					var rid = `${count}${night}${i}`;
					var exp = doubleExpansions[i - 1] || null;
					console.log(`Setting double room ${i} (ID: ${rid})`);
					if (exp) {
						console.log(`Using expansion for double room ${i}:`, exp);

						// Set room category
						var roomCatId = exp.expansion_room_category_id;
						if (!roomCatId || roomCatId === '0' || roomCatId === 0) {
							roomCatId = main.room_category_id;
						}
						$(`#roomcat${rid}`).val(roomCatId).trigger('change');

						// Set meal plan
						var mealPlanId = exp.meal_plan_id;
						if (!mealPlanId || mealPlanId === '0' || mealPlanId === 0) {
							mealPlanId = main.meal_plan_id;
						}
						$(`#mealplan${rid}`).val(mealPlanId).trigger('change');

						// Set rate fields
						$(`#d_adult_rate${rid}`).val(exp.room_rate_double || 0);
						$(`#d_child_rate${rid}`).val(exp.child_with_bed_double || 0);
						$(`#d_child_wb_rate${rid}`).val(exp.child_without_bed_double || 0);
						$(`#d_extra_bed_rate${rid}`).val(exp.extra_bed_double || 0);

						// *** ADD GST FIELDS FOR DOUBLE ROOMS ***
						if (main.tax_status == 1) {
							$(`#d_adult_gst${rid}`).val(exp.room_rate_double_gst || 0);
							$(`#d_child_gst${rid}`).val(exp.child_with_bed_double_gst || 0);
							$(`#d_child_wb_gst${rid}`).val(exp.child_without_bed_double_gst || 0);
							$(`#d_extra_bed_gst${rid}`).val(exp.extra_bed_double_gst || 0);
							console.log(`Set GST values for double room ${i}`);
						}
					}
					updateRoomTotals(count, night, i);
				}

				// Set room data for single rooms
				for (let i = 1; i <= numSingles; i++) {
					var seq = numDoubles + i;
					var sid = `${count}${night}${seq}`;
					var exp = singleExpansions[i - 1] || null;
					console.log(`Setting single room ${i} (ID: ${sid})`);
					if (exp) {
						console.log(`Using expansion for single room ${i}:`, exp);

						// Set room category
						var roomCatId = exp.expansion_room_category_id;
						if (!roomCatId || roomCatId === '0' || roomCatId === 0) {
							roomCatId = main.room_category_id;
						}
						$(`#roomcat${sid}`).val(roomCatId).trigger('change');

						// Set meal plan
						var mealPlanId = exp.meal_plan_id;
						if (!mealPlanId || mealPlanId === '0' || mealPlanId === 0) {
							mealPlanId = main.meal_plan_id;
						}
						$(`#mealplan${sid}`).val(mealPlanId).trigger('change');

						// Set rate fields
						$(`#s_adult_rate${sid}`).val(exp.room_rate_single || 0);
						$(`#s_child_rate${sid}`).val(exp.child_with_bed_single || 0);
						$(`#s_child_wb_rate${sid}`).val(exp.child_without_bed_single || 0);
						$(`#s_extra_bed_rate${sid}`).val(exp.extra_bed_single || 0);

						// *** ADD GST FIELDS FOR SINGLE ROOMS ***
						if (main.tax_status == 1) {
							$(`#s_adult_gst${sid}`).val(exp.room_rate_single_gst || 0);
							$(`#s_child_gst${sid}`).val(exp.child_with_bed_single_gst || 0);
							$(`#s_child_wb_gst${sid}`).val(exp.child_without_bed_single_gst || 0);
							$(`#s_extra_bed_gst${sid}`).val(exp.extra_bed_single_gst || 0);
							console.log(`Set GST values for single room ${i}`);
						}
					}
					updateRoomTotals(count, night, seq);
				}

				// Populate vehicle data (unchanged)
				if (vehicleExpansion && vehicleExpansion.vehicle_details_json) {
					try {
						var vehicleDetails = JSON.parse(vehicleExpansion.vehicle_details_json);
						$.each(vehicleDetails, function(vindex, vdata) {
							var vid = `${count}${night}${vdata.veh_type_id}`;
							$(`#day_rent${vid}`).val(vdata.day_rent || 0);
							$(`#travel_distance${vid}`).val(vdata.travel_distance || 0);
							$(`#max_km_day${vid}`).val(vdata.max_km_day || 0);
							$(`#extra_km_rate${vid}`).val(vdata.extra_km_rate || 0);
							$(`#extra_kilometer${vid}`).val(vdata.extra_kilometer || 0);
							$(`#veh_total${vid}`).val(vdata.veh_total || 0);
							updateVehicleTotals(count, night, vindex);
						});
					} catch (e) {
						console.error('Error parsing vehicle details:', e);
					}
				}
			}
		}

		// *** FORCE GST COLUMN VISIBILITY AFTER ALL DATA IS LOADED ***
		setTimeout(function() {
			console.log(`Forcing GST column visibility for location ${count}, tax_status: ${main.tax_status}`);
			if (main.tax_status == 1) {
				toggleGSTColumns(true, count);
			} else {
				toggleGSTColumns(false, count);
			}
			toggleNightsVisibility();
		}, 100);

		// **Add and populate vehicle summary with combined headers**
		if (is_vehicle_required == 1) {
			console.log(`\n=== GENERATING VEHICLE SUMMARY for location ${count} ===`);

			// Generate vehicle summary HTML
			var summaryHtml = generateVehicleSummary(count, no_of_days, vehicle_models);
			nightlyDetails.append(summaryHtml);

			// **Populate vehicle summary from draft data**
			var isDynamic = getIsDynamic();
			console.log('Is Dynamic Mode:', isDynamic);

			if (!isDynamic) {
				// **STATIC MODE: Use aggregated vehicle_details from main (parent level)**
				console.log('Static Mode - Using main.vehicle_details');

				if (main.vehicle_details) {
					try {
						var mainVehicleDetails = typeof main.vehicle_details === 'string' ?
							JSON.parse(main.vehicle_details) :
							main.vehicle_details;

						console.log('Main vehicle details:', mainVehicleDetails);

						$.each(mainVehicleDetails, function(vindex, vdata) {
							console.log(`Populating summary for vehicle ${vindex}:`, vdata);

							// Match by vehicle_type_id
							var matchedVehicleIndex = -1;
							$.each(vehicle_models, function(modelIndex, model) {
								if (model.vehicle_type_id == vdata.veh_type_id) {
									matchedVehicleIndex = modelIndex;
									return false; // break
								}
							});

							if (matchedVehicleIndex !== -1) {
								// Calculate total days (should equal no_of_days in static mode)
								var totalDays = no_of_days;

								// Daily rent (total rent / days)
								var totalRent = parseFloat(vdata.veh_total) || 0;
								var dailyRent = totalDays > 0 ? (totalRent / totalDays) : 0;

								// Total distance
								var totalDistance = parseFloat(vdata.travel_distance) || 0;

								// Extra KM
								var maxKmDay = parseFloat(vdata.max_km_day) || 0;
								var extraKmRate = parseFloat(vdata.extra_km_rate) || 0;
								var totalExtraKm = parseFloat(vdata.extra_kilometer) || 0;

								console.log(`Setting summary values - Daily Rent: ${dailyRent}, Distance: ${totalDistance}, Extra KM: ${totalExtraKm}`);

								// Populate summary fields
								$(`#summary_days_${count}_${matchedVehicleIndex}`).val(totalDays);
								$(`#summary_rent_${count}_${matchedVehicleIndex}`).val(dailyRent.toFixed(0));
								$(`#summary_distance_${count}_${matchedVehicleIndex}`).val(totalDistance);
								$(`#summary_extra_km_rate_${count}_${matchedVehicleIndex}`).val(extraKmRate);
								$(`#summary_extra_km_${count}_${matchedVehicleIndex}`).val(totalExtraKm);
								$(`#summary_total_${count}_${matchedVehicleIndex}`).val(totalRent);
							}
						});
					} catch (e) {
						console.error('Error parsing main vehicle details:', e);
					}
				}
			} else {
				// **DYNAMIC MODE: Aggregate from expansion vehicle_details_json**
				console.log('Dynamic Mode - Aggregating from expansions');

				// Initialize aggregation object for each vehicle type
				var vehicleAggregates = {};
				$.each(vehicle_models, function(vindex, vmodel) {
					vehicleAggregates[vmodel.vehicle_type_id] = {
						modelIndex: vindex,
						totalDays: 0,
						totalRent: 0,
						totalDistance: 0,
						totalExtraKm: 0,
						extraKmRate: 0 // Take from first occurrence
					};
				});

				// Aggregate from all expansions
				$.each(allExpansions, function(expIndex, exp) {
					if (exp.vehicle_details_json) {
						try {
							var expVehicleDetails = JSON.parse(exp.vehicle_details_json);
							$.each(expVehicleDetails, function(vindex, vdata) {
								var vehTypeId = vdata.veh_type_id;
								if (vehicleAggregates[vehTypeId]) {
									vehicleAggregates[vehTypeId].totalDays++;
									vehicleAggregates[vehTypeId].totalRent += parseFloat(vdata.veh_total) || 0;
									vehicleAggregates[vehTypeId].totalDistance += parseFloat(vdata.travel_distance) || 0;
									vehicleAggregates[vehTypeId].totalExtraKm += parseFloat(vdata.extra_kilometer) || 0;

									// Take extra km rate from first occurrence
									if (vehicleAggregates[vehTypeId].extraKmRate === 0) {
										vehicleAggregates[vehTypeId].extraKmRate = parseFloat(vdata.extra_km_rate) || 0;
									}
								}
							});
						} catch (e) {
							console.error('Error parsing expansion vehicle details:', e);
						}
					}
				});

				console.log('Aggregated vehicle data:', vehicleAggregates);

				// Populate summary from aggregates
				$.each(vehicleAggregates, function(vehTypeId, agg) {
					if (agg.totalDays > 0) {
						var dailyRent = agg.totalRent / agg.totalDays;

						console.log(`Setting summary for vehicle type ${vehTypeId}:`, agg);

						$(`#summary_days_${count}_${agg.modelIndex}`).val(agg.totalDays);
						$(`#summary_rent_${count}_${agg.modelIndex}`).val(dailyRent.toFixed(0));
						$(`#summary_distance_${count}_${agg.modelIndex}`).val(agg.totalDistance);
						$(`#summary_extra_km_rate_${count}_${agg.modelIndex}`).val(agg.extraKmRate);
						$(`#summary_extra_km_${count}_${agg.modelIndex}`).val(agg.totalExtraKm);
						$(`#summary_total_${count}_${agg.modelIndex}`).val(agg.totalRent);
					}
				});
			}

			// **NOW build and set the vehicle header AFTER all night data is populated**
			// Use setTimeout to ensure DOM is fully updated
			setTimeout(function() {
				var combinedHeaders = [];
				for (let night = 1; night <= no_of_days; night++) {
					var nightHeader = $(`#v_from_to${count}${night}`).text().trim();
					if (nightHeader && nightHeader !== '') {
						// Remove leading dash/hyphen if present
						nightHeader = nightHeader.replace(/^\s*-\s*/, '');
						// For static mode, avoid duplicates by using unique headers
						if (combinedHeaders.indexOf(nightHeader) === -1) {
							combinedHeaders.push(nightHeader);
						}
					} else {
						combinedHeaders.push(`N${night}`);
					}
				}

				var summaryHeaderText = '';
				if (combinedHeaders.length > 0) {
					summaryHeaderText = ' (' + combinedHeaders.join(' + ') + ')';
				}

				console.log('Combined vehicle header for summary:', summaryHeaderText);

				// Update the summary header with combined route info (only one refresh icon)
				var $summaryHeader = $(`#vehicle-summary-header-${count}`);
				$summaryHeader.html(`
            <span style="display: flex; align-items: center; justify-content: center; width: 100%;">
                <a href="#" class="refresh-vehicle-summary" data-count="${count}" style="font-size: 16px; color: #003300; margin-right: 10px;" title="Refresh Vehicle Data">
                    <i class="fa fa-refresh"></i>
                </a>
                <span>Vehicle Summary${summaryHeaderText}</span>
            </span>
        `);

				// Ensure header is centered
				$summaryHeader.css({
					'text-align': 'center',
					'display': 'flex',
					'align-items': 'center',
					'justify-content': 'center'
				});

				// Update the overall total after populating
				updateVehicleSummary(count);
				console.log(`=== VEHICLE SUMMARY HEADER UPDATED for location ${count} ===`);
			}, 500); // Give time for DOM to update

			console.log(`=== VEHICLE SUMMARY POPULATED for location ${count} ===`);
		}

		// Update totals
		updateGrandtotalBoth();
		get_veh_grand_total();
		console.log(`=== COMPLETED NIGHTLY DETAILS for location ${count} ===\n`);
	}
</script>

<script>
	function get_veh_grand_total() {
		var veh_grand_total = 0;

		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

			for (let night = 1; night <= no_of_night; night++) {
				var $elem = $(`#veh_grand_total${count}${night}`);
				if ($elem.length > 0) {
					var veh_total = parseFloat($elem.val()) || 0;
					veh_grand_total += veh_total;
				}
			}
		});

		// Update display
		$('#v_total').text(Math.round(veh_grand_total));

		// Update grand total
		var accom_total = parseFloat($('#a_total').text()) || 0;
		$('#g_total').text(Math.round(accom_total + veh_grand_total));

		console.log('Base Vehicle Total (without extra KM):', veh_grand_total);

		return veh_grand_total;
	}


	$(document).on('input', '.travel_distance0', function() {
		calculateVehicleExtraKmCharges();
	});

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



<!-- //nj// -->
<!-- loadveh -->
<script>
	function loadVehicles(count) {
		let no_of_night = $(`#no_of_night${count}`).val();
		let checkin = $(`#checkin${count}`).val();
		let checkout = $(`#checkout${count}`).val();
		let vehicle_from_location = <?php echo $object_det[0]['vehicle_from_location'] ? $object_det[0]['vehicle_from_location'] : 0; ?>;
		let arrival_location = <?php echo $object_det[0]['arrival_location']; ?>;
		let departure_location = <?php echo $object_det[0]['departure_location']; ?>;
		let tour_location_id = $(`#tour_location_id${count}`).val();
		let previous_location_id = count > 1 ? $(`#tour_location_id${parseInt(count) - 1}`).val() : null;
		let duration = <?php echo $object_det[0]['no_of_night']; ?>;
		let totalNights = calculateTotalNights_new(count);
		let is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		let vehicle_models = is_vehicle_required == 1 ? <?php echo json_encode($vehicle_data); ?> : null;
		let $spinner = $('#csspinner');

		if (!no_of_night || no_of_night === 'undefined') {
			alert("Please enter number of nights");
			return;
		} else if (parseInt(no_of_night) === 0) {
			alert("Number of nights must be greater than zero");
			$(`#no_of_night${count}`).val('');
			return;
		}

		$spinner.show();

		$.ajax({
			url: "<?= site_url('Enquiry/getVehicleTariffDetails'); ?>",
			method: "POST",
			data: {
				no_of_night: no_of_night,
				vehicle_models: vehicle_models,
				id: count,
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
				let parsedNoOfNight = parseInt(no_of_night);

				// Update vehicle distance fields
				for (let night = 1; night <= parsedNoOfNight; night++) {
					$(`#cur_to_dep${count}${night}`).val("");
					$(`#dep_to_arr${count}${night}`).val("");
					$(`#hub_to_arr${count}${night}`).val("");
					$(`#arr_to_loc${count}${night}`).val("");
					$(`#pre_to_cur${count}${night}`).val("");

					let v_parts = [];
					let is_first_night = night === 1;
					let is_last_night = night === parsedNoOfNight;
					let total_distance_int = 0;

					// Inbound
					let has_inbound = (data.distance_type == 1 || data.distance_type == 2);
					if (has_inbound && is_first_night) {
						$(`#hub_to_arr${count}${night}`).val(data.dist1);
						$(`#arr_to_loc${count}${night}`).val(data.dist2);
						v_parts.push(`Hub to Arrival - ${data.dist1} KM, Arrival to Location - ${data.dist2} KM`);
						total_distance_int += parseInt(data.dist1 || 0) + parseInt(data.dist2 || 0);
					}

					// Inter
					if ((data.distance_type == 3 && is_first_night) ||
						(data.distance_type != 1 && data.distance_type != 2 && data.distance_type != 3 && is_first_night)) {
						let inter_dist = (data.distance_type == 3) ? data.dist3 : data.total_distance;
						$(`#pre_to_cur${count}${night}`).val(inter_dist);
						v_parts.push(`Previous to Current - ${inter_dist} KM`);
						total_distance_int += parseInt(inter_dist || 0);
					}

					// Outbound
					let has_outbound = (data.distance_type == 1 || data.distance_type == 3);
					if (has_outbound && is_last_night) {
						let outbound_dist1 = (data.distance_type == 1) ? data.dist3 : data.dist1;
						let outbound_dist2 = (data.distance_type == 1) ? data.dist4 : data.dist2;
						$(`#cur_to_dep${count}${night}`).val(outbound_dist1);
						$(`#dep_to_arr${count}${night}`).val(outbound_dist2);
						v_parts.push(`Location to Departure - ${outbound_dist1} KM, Departure to Hub - ${outbound_dist2} KM`);
						total_distance_int += parseInt(outbound_dist1 || 0) + parseInt(outbound_dist2 || 0);
					}

					// Update display
					let v_from_to_data = v_parts.length === 0 ?
						` - (Stay at location - 0 KM)` :
						` - (${v_parts.join(', ')})`;

					$(`#v_from_to${count}${night}`).html(v_from_to_data);
					$(`#veh_header${count}${night}`).val(v_from_to_data);

					// Set vehicle data for this night
					if (data.vehicles && data.vehicles.length > 0) {
						$.each(data.vehicles, function(index, item) {
							let type_id = item.vehicle_type_id;
							let vid = `${count}${night}${type_id}`;

							$(`#day_rent${vid}`).val(item.rate_per_day);
							$(`#veh_count${vid}`).val(item.vehicle_count);
							$(`#max_km_day${vid}`).val(item.max_km_day);
							$(`#extra_km_rate${vid}`).val(item.extra_km_rate);
							$(`#travel_distance${vid}`).val(total_distance_int);
						});
					}
				}

				// Recalculate ALL totals
				calculateVehicleExtraKmCharges();
				updateVehicleSummary(count);
			},
			error: function(xhr, status, error) {
				console.error('Error fetching vehicle tariff details:', error);
			},
			complete: function() {
				$spinner.hide();
			}
		});
	}

	// STEP 10: Event handlers
	$(document).on('click', '.load_vehs_click', function() {
		let count = $(this).attr('data-id');
		$(this).attr('data-loaded', 'true');
		loadVehicles(count);
	});

	// Recalculate when distance changes
	$(document).on('input', 'input[id^="travel_distance"].cls_dist', function() {
		// Extract location count
		var count = $(this).data('cid');

		calculateVehicleExtraKmCharges(); // Calculates totals
		updateVehicleSummary(count); // ✅ Updates summary too!
	});

	// Recalculate when day rent changes
	$(document).on('input', 'input[id^="day_rent"]', function() {
		var count = $(this).data('cid');
		calculateVehicleExtraKmCharges();
		updateVehicleSummary(count);
	});

	// Recalculate when extra KM rate changes
	$(document).on('input', 'input[id^="extra_km_rate"]', function() {
		var count = $(this).data('cid');
		calculateVehicleExtraKmCharges();
		updateVehicleSummary(count);
	});

	console.log('✅ Vehicle calculation system fixed and loaded');

	function calculateVehicleExtraKmCharges() {
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required != 1) {
			return 0;
		}

		console.log('=== Calculating Vehicle Extra KM Charges ===');

		let locationCount = $('.location-card').length;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;

		let total_extra_charges = 0;

		// Loop through all locations
		for (let count = 1; count <= locationCount; count++) {
			let no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

			if (no_of_night === 0) continue;

			console.log(`Processing Location ${count} (${no_of_night} nights)`);

			// Loop through all nights for this location
			for (let night = 1; night <= no_of_night; night++) {

				// Process each vehicle type
				$.each(vehicle_models, function(index, vmodel) {
					let type_id = vmodel.vehicle_type_id;
					let vid = `${count}${night}${type_id}`;

					// Check if inputs exist
					var $dayRent = $(`#day_rent${vid}`);
					if ($dayRent.length === 0) {
						return true; // Skip this vehicle
					}

					// Get values for this vehicle on this night
					let veh_count = parseInt($(`#veh_count${vid}`).val()) || 1;
					let travel_distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
					let max_km_day = parseFloat($(`#max_km_day${vid}`).val()) || 0;
					let extra_km_rate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;
					let day_rent = parseFloat($dayRent.val()) || 0;

					// Calculate extra KM for this night
					let extra_km_per_vehicle = Math.max(0, travel_distance - max_km_day);

					// Update the extra kilometer field
					$(`#extra_kilometer${vid}`).val(extra_km_per_vehicle);

					// Calculate total for this vehicle on this night
					let base_cost = day_rent * veh_count;
					let extra_cost = extra_km_per_vehicle * extra_km_rate * veh_count;
					let veh_total = base_cost + extra_cost;

					// Update vehicle total field
					$(`#veh_total${vid}`).val(Math.round(veh_total));

					console.log(`  Night ${night}, Vehicle ${type_id}: Base=${base_cost}, Extra=${extra_cost}, Total=${veh_total}`);

					total_extra_charges += extra_cost;
				});

				// Update night grand total (sum of all vehicles for this night)
				let night_total = 0;
				$.each(vehicle_models, function(index, vmodel) {
					let type_id = vmodel.vehicle_type_id;
					let vid = `${count}${night}${type_id}`;
					let veh_total = parseFloat($(`#veh_total${vid}`).val()) || 0;
					night_total += veh_total;
				});

				$(`#veh_grand_total${count}${night}`).val(Math.round(night_total));
				console.log(`  Night ${night} Total: ${night_total}`);
			}
		}

		console.log('Total Extra KM Charges:', total_extra_charges);

		// **CRITICAL: Update all display totals**
		updateAllTotals();

		return total_extra_charges;
	}


	// function updateAllTotals() {
	// 	console.log('=== Updating All Totals ===');

	// 	// 1. Update accommodation grand total
	// 	var accom_grand_total = 0;
	// 	var isDynamic = getIsDynamic(); // Check if we're in dynamic mode

	// 	$('.tour_plan_div .location-card').each(function() {
	// 		var count = $(this).attr('data-index');
	// 		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
	// 		var cardTotal = 0;

	// 		if (isDynamic) {
	// 			// DYNAMIC MODE: Sum from night-by-night rows
	// 			for (let night = 1; night <= no_of_night; night++) {
	// 				var dd_total = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
	// 				var ss_total = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
	// 				cardTotal += dd_total + ss_total;
	// 			}
	// 		} else {
	// 			// STATIC MODE: Get from summary total only
	// 			var summary_total = parseFloat($(`#accommodation_summary_total${count}`).val()) || 0;
	// 			cardTotal = summary_total;
	// 		}

	// 		accom_grand_total += cardTotal;
	// 	});

	// 	$('#a_total').text(Math.round(accom_grand_total));
	// 	console.log('Accommodation Total:', accom_grand_total);

	// 	// 2. Update vehicle grand total (remains the same)
	// 	var veh_grand_total = 0;
	// 	$('.tour_plan_div .location-card').each(function() {
	// 		var count = $(this).attr('data-index');
	// 		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

	// 		for (let night = 1; night <= no_of_night; night++) {
	// 			var $elem = $(`#veh_grand_total${count}${night}`);
	// 			if ($elem.length > 0) {
	// 				var veh_total = parseFloat($elem.val()) || 0;
	// 				veh_grand_total += veh_total;
	// 			}
	// 		}
	// 	});

	// 	$('#v_total').text(Math.round(veh_grand_total));
	// 	console.log('Vehicle Total:', veh_grand_total);

	// 	// 3. Update grand total
	// 	var grand_total = accom_grand_total + veh_grand_total;
	// 	$('#g_total').text(Math.round(grand_total));
	// 	console.log('Grand Total:', grand_total);

	// 	// 4. Update each location's breadcrumb
	// 	$('.tour_plan_div .location-card').each(function() {
	// 		var count = $(this).attr('data-index');
	// 		updateLocationTotal(count);
	// 	});

	// 	console.log('=== All Totals Updated ===');
	// }
	function updateAllTotals() {
		console.log('=== Updating All Totals ===');

		// 1. Update accommodation grand total
		var accom_grand_total = 0;

		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			var cardTotal = 0;

			// ALWAYS sum from night-by-night rows (whether visible or not)
			for (let night = 1; night <= no_of_night; night++) {
				var dd_total = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
				var ss_total = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
				cardTotal += dd_total + ss_total;

				console.log(`  Night ${night}: DD=${dd_total}, SS=${ss_total}`);
			}

			console.log(`Location ${count} Accom Total: ${cardTotal}`);
			accom_grand_total += cardTotal;
		});

		$('#a_total').text(Math.round(accom_grand_total));
		console.log('Accommodation Total:', accom_grand_total);

		// 2. Update vehicle grand total
		var veh_grand_total = 0;
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

			for (let night = 1; night <= no_of_night; night++) {
				var $elem = $(`#veh_grand_total${count}${night}`);
				if ($elem.length > 0) {
					var veh_total = parseFloat($elem.val()) || 0;
					veh_grand_total += veh_total;
				}
			}
		});

		$('#v_total').text(Math.round(veh_grand_total));
		console.log('Vehicle Total:', veh_grand_total);

		// 3. Update grand total
		var grand_total = accom_grand_total + veh_grand_total;
		$('#g_total').text(Math.round(grand_total));
		console.log('Grand Total:', grand_total);

		// 4. Update each location's breadcrumb
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			updateLocationTotal(count);
		});

		console.log('=== All Totals Updated ===');
	}

	function updateLocationTotal(count) {
		let no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

		// Calculate accommodation total for this location
		let accom_total = 0;
		for (let night = 1; night <= no_of_night; night++) {
			let dd_total = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
			let ss_total = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
			accom_total += dd_total + ss_total;
		}

		// Calculate vehicle total for this location
		let veh_total = 0;
		for (let night = 1; night <= no_of_night; night++) {
			let night_veh_total = parseFloat($(`#veh_grand_total${count}${night}`).val()) || 0;
			veh_total += night_veh_total;
		}

		// Update location breadcrumb display
		$(`#loc_total${count}`).text(`${Math.round(accom_total)} + ${Math.round(veh_total)}`);

		console.log(`Location ${count}: Accom=${accom_total}, Vehicle=${veh_total}`);
	}

	function updateLocationTotal(count) {
		let no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

		// Calculate accommodation total for this location
		let accom_total = 0;
		for (let night = 1; night <= no_of_night; night++) {
			let dd_total = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
			let ss_total = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
			accom_total += dd_total + ss_total;
		}

		// Calculate vehicle total for this location
		let veh_total = 0;
		for (let night = 1; night <= no_of_night; night++) {
			let night_veh_total = parseFloat($(`#veh_grand_total${count}${night}`).val()) || 0;
			veh_total += night_veh_total;
		}

		// Update location breadcrumb display
		$(`#loc_total${count}`).text(`${Math.round(accom_total)} + ${Math.round(veh_total)}`);

		console.log(`Location ${count}: Accom=${accom_total}, Vehicle=${veh_total}`);
	}
	$(document).on('click', '.load_vehs_click', function() {
		let count = $(this).attr('data-id');
		let night = $(this).attr('data-night');
		$(this).attr('data-loaded', 'true');
		loadVehicles(count);
		calculateVehicleExtraKmCharges();

	});


	function propagateSummaryToNights(count, vindex) {
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var vehicle_type_id = vehicle_models[vindex].vehicle_type_id;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

		// Get values from summary fields
		var dailyRent = parseFloat($(`#summary_rent_${count}_${vindex}`).val()) || 0;
		var extraKmRate = parseFloat($(`#summary_extra_km_rate_${count}_${vindex}`).val()) || 0;

		console.log(`Propagating summary to nights for location ${count}, vehicle ${vindex}:`, {
			dailyRent,
			extraKmRate,
			no_of_night
		});

		// Update ALL nights with new values
		for (let night = 1; night <= no_of_night; night++) {
			var vid = `${count}${night}${vehicle_type_id}`;

			// Update the night fields
			$(`#day_rent${vid}`).val(dailyRent);
			$(`#extra_km_rate${vid}`).val(extraKmRate);
		}

		// Recalculate totals
		calculateVehicleExtraKmCharges();
		updateVehicleSummary(count);
	}


	$(document).on('input change', '.summary-daily-rent', function() {
		var count = $(this).data('count');
		var vindex = $(this).data('vindex');

		console.log('Summary daily rent changed:', count, vindex);

		// Propagate to all nights
		propagateSummaryToNights(count, vindex);
	});

	$(document).on('input change', '.summary-extra-km-rate', function() {
		var count = $(this).data('count');
		var vindex = $(this).data('vindex');

		console.log('Summary extra KM rate changed:', count, vindex);

		// Propagate to all nights
		propagateSummaryToNights(count, vindex);
	});

	// STEP 6: **CRITICAL** - Handle distance changes in night fields (dynamic mode)
	$(document).on('input change', 'input[id^="travel_distance"]', function() {
		var $input = $(this);
		var count = $input.data('cid') || $input.data('count');

		console.log('Travel distance changed for location:', count);

		// Recalculate vehicle totals
		calculateVehicleExtraKmCharges();

		// Update summary if in static mode
		if (!getIsDynamic() && count) {
			updateVehicleSummary(count);
		}
	});

	// STEP 7: **CRITICAL** - Handle day rent changes in night fields (dynamic mode)
	$(document).on('input change', 'input[id^="day_rent"]', function() {
		var $input = $(this);
		var count = $input.data('cid') || $input.data('count');

		console.log('Day rent changed for location:', count);

		// Recalculate vehicle totals
		calculateVehicleExtraKmCharges();

		// Update summary if in static mode
		if (!getIsDynamic() && count) {
			updateVehicleSummary(count);
		}
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
<!-- <script>
	$(document).on('click', '#copy_tour_plan', async function() {

		var $btn = $(this);
		if ($btn.prop('disabled')) return;
		$btn.prop('disabled', true);
		$('#spinner_draft').show();

		var pre_tour_plan = <?php echo json_encode($pre_tour_plan); ?>;
		var date_of_tour_start = '<?php echo $object_det[0]['start_date'] ?? ''; ?>';
		var pre_start_date = '<?php echo $pre_start_date ?? ''; ?>';
		var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;
		var pre_no_night = <?php echo $pre_no_night; ?>;

		if (date_of_tour_start.includes('-')) {
			if (date_of_tour_start.split('-')[0].length === 2) {
				date_of_tour_start = convertToYMD(date_of_tour_start);
			}
		}

		var startDate = new Date(date_of_tour_start);
		var preStartDate = new Date(pre_start_date);

		if (startDate.getTime() !== preStartDate.getTime()) {
			alert("Tour Start Date Changed. You must create a new tour plan!");
			resetButton();
			return;
		} else if (no_of_night !== pre_no_night) {
			alert("No Of Night Changed. You must create a new tour plan!");
			resetButton();
			return;
		} else if (!Array.isArray(pre_tour_plan) || pre_tour_plan.length === 0) {
			alert("Previous tour plan not completed!");
			resetButton();
			return;
		}

		await copyTourLocations(pre_tour_plan, 0);
		resetButton();

		function convertToYMD(dateStr) {
			var parts = dateStr.split('-');
			return parts[2] + '-' + parts[1] + '-' + parts[0];
		}

		async function copyTourLocations(planData, index) {
			console.log(planData);
			var meal_plan_exist = <?php echo $object_det[0]['meal_plan']; ?>;
			if (index >= planData.length) return; // All done

			var count = index + 1;

			$('#tour_location').val(planData[index].tour_location).trigger('change');
			await delay(300); // wait for location change processing

			$('#btn_add_bt').trigger('click');
			await delay(500); // wait after adding block

			var latestNightsInput = $('input[id^="no_of_night"]').last();
			if (latestNightsInput.length > 0) {
				latestNightsInput.val(planData[index].no_of_days).trigger('input');
				calculateCheckout(count);
			}
			await delay(300); // wait after setting nights

			var hotelSelect = $('select[id^="hotelid"][data-id="' + count + '"]');
			if (hotelSelect.length > 0) {
				hotelSelect.val(planData[index].hotel_id).trigger('change');
				await delay(600); // wait for hotel rooms to reload

				var roomcatSelect = $('select[id^="roomcat"][data-id="' + count + '"]');
				if (roomcatSelect.length > 0) {
					roomcatSelect.val(planData[index].room_category_id).trigger('change');
				}
				await delay(300); // wait after room category

				/*if(planData[index].meal_plan_id != meal_plan_exist){
					var mealplanSelect = $('select[id^="mealplan"][data-id="' + count + '"]');
					if (mealplanSelect.length > 0) {
						mealplanSelect.val(planData[index].meal_plan_exist).trigger('change');
					}
					await delay(300);
				}*/

				var vehBtn = $('.load_vehs_click[data-id="' + count + '"]');
				if (vehBtn.length > 0) {
					vehBtn.trigger('click');
				}
				var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
				var vehicleDetails = JSON.parse(planData[index].vehicle_details);

				await delay(500);
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

							v_pre_to_cur = v_item.pre_to_cur;
							v_cur_to_dep = v_item.cur_to_dep;
							v_dep_to_arr = v_item.dep_to_arr;

							v_hub_to_arr = v_item.hub_to_arr;
							v_arr_to_loc = v_item.arr_to_loc;

							$("#day_rent" + vid_t).val(v_day_rent);
							$("#max_km_day" + vid_t).val(v_max_km_day);
							$("#travel_distance" + vid_t).val(v_travel_distance);
							$("#extra_kilometer" + vid_t).val(v_extra_kilometer);
							$("#veh_total" + vid_t).val(v_veh_total);
						}
					});
				});

				$.each(planData[index].cost, function(cindex, cval) {
					if (planData[index].meal_plan_id == meal_plan_exist) {
						if ((cval['cost_component_id'] == 6 || cval['cost_component_id'] == 7) && cval['room_type_id'] == 2) {
							$("#d_adult_rate" + count).val(cval['quick_quote_tariff']);
						}
						if ((cval['cost_component_id'] == 12 || cval['cost_component_id'] == 13) && cval['room_type_id'] == 2) {
							$("#d_child_rate" + count).val(cval['quick_quote_tariff']);
						}
						if ((cval['cost_component_id'] == 15 || cval['cost_component_id'] == 16) && cval['room_type_id'] == 2) {
							$("#d_child_wb_rate" + count).val(cval['quick_quote_tariff']);
						}
						if ((cval['cost_component_id'] == 9 || cval['cost_component_id'] == 10) && cval['room_type_id'] == 2) {
							$("#d_extra_bed_rate" + count).val(cval['quick_quote_tariff']);
						}

						if ((cval['cost_component_id'] == 6 || cval['cost_component_id'] == 7) && cval['room_type_id'] == 1) {
							$("#s_adult_rate" + count).val(cval['quick_quote_tariff']);
						}
						if ((cval['cost_component_id'] == 12 || cval['cost_component_id'] == 13) && cval['room_type_id'] == 1) {
							$("#s_child_rate" + count).val(cval['quick_quote_tariff']);
						}
						if ((cval['cost_component_id'] == 15 || cval['cost_component_id'] == 16) && cval['room_type_id'] == 1) {
							$("#s_child_wb_rate" + count).val(cval['quick_quote_tariff']);
						}
						if ((cval['cost_component_id'] == 9 || cval['cost_component_id'] == 10) && cval['room_type_id'] == 1) {
							$("#s_extra_bed_rate" + count).val(cval['quick_quote_tariff']);
						}
					}
				});
				double_total_update(count);
				single_total_update(count);
			}

			// After finishing current location, go next
			await copyTourLocations(planData, index + 1);
		}

		function delay(ms) {
			return new Promise(resolve => setTimeout(resolve, ms));
		}

		function resetButton() {
			$btn.prop('disabled', false);
			$('#spinner_draft').hide();
		}
	});
</script> -->
<script>
	// Updated copy_tour_plan click handler with nightly details generation
	$(document).on('click', '#copy_tour_plan', async function() {
		var $btn = $(this);
		if ($btn.prop('disabled')) return;
		$btn.prop('disabled', true);
		$('#spinner_draft').show();

		// Get current and previous tour data
		var pre_tour_plan = <?php echo json_encode($pre_tour_plan); ?>;
		var date_of_tour_start = '<?php echo $object_det[0]['start_date'] ?? ''; ?>';
		var pre_start_date = '<?php echo $pre_start_date ?? ''; ?>';
		var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;
		var pre_no_night = <?php echo $pre_no_night; ?>;
		var hotel_categories = <?php echo isset($hotel_categories) ? json_encode($hotel_categories) : '[]'; ?>;
		var no_of_double_room = <?php echo isset($object_det[0]['no_of_double_room']) ? $object_det[0]['no_of_double_room'] : '0'; ?>;
		var no_of_single_room = <?php echo isset($object_det[0]['no_of_single_room']) ? $object_det[0]['no_of_single_room'] : '0'; ?>;
		var pre_no_of_double_room = <?php echo isset($pre_object_det[0]['no_of_double_room']) ? $pre_object_det[0]['no_of_double_room'] : '0'; ?>;
		var pre_no_of_single_room = <?php echo isset($pre_object_det[0]['no_of_single_room']) ? $pre_object_det[0]['no_of_single_room'] : '0'; ?>;
		var is_vehicle_required = <?php echo isset($object_det[0]['is_vehicle_required']) ? $object_det[0]['is_vehicle_required'] : '0'; ?>;
		var vehicle_models = <?php echo isset($vehicle_data) ? json_encode($vehicle_data) : '[]'; ?>;
		var pre_vehicle_models = <?php echo isset($pre_vehicle_data) ? json_encode($pre_vehicle_data) : '[]'; ?>;
		var total_no_of_pax = <?php echo isset($object_det[0]['total_no_of_pax']) ? $object_det[0]['total_no_of_pax'] : '0'; ?>;
		var pre_total_no_of_pax = <?php echo isset($pre_object_det[0]['total_no_of_pax']) ? $pre_object_det[0]['total_no_of_pax'] : '0'; ?>;
		var no_of_adult = <?php echo isset($object_det[0]['no_of_adult']) ? $object_det[0]['no_of_adult'] : '0'; ?>;
		var no_of_child_with_bed = <?php echo isset($object_det[0]['no_of_child_with_bed']) ? $object_det[0]['no_of_child_with_bed'] : '0'; ?>;
		var no_of_child_without_bed = <?php echo isset($object_det[0]['no_of_child_without_bed']) ? $object_det[0]['no_of_child_without_bed'] : '0'; ?>;
		var no_of_extra_bed = <?php echo isset($object_det[0]['no_of_extra_bed']) ? $object_det[0]['no_of_extra_bed'] : '0'; ?>;
		var pre_no_of_adult = <?php echo isset($pre_object_det[0]['no_of_adult']) ? $pre_object_det[0]['no_of_adult'] : '0'; ?>;
		var pre_no_of_child_with_bed = <?php echo isset($pre_object_det[0]['no_of_child_with_bed']) ? $pre_object_det[0]['no_of_child_with_bed'] : '0'; ?>;
		var pre_no_of_child_without_bed = <?php echo isset($pre_object_det[0]['no_of_child_without_bed']) ? $pre_object_det[0]['no_of_child_without_bed'] : '0'; ?>;
		var pre_no_of_extra_bed = <?php echo isset($pre_object_det[0]['no_of_extra_bed']) ? $pre_object_det[0]['no_of_extra_bed'] : '0'; ?>;

		// Convert date format if needed
		if (date_of_tour_start.includes('-')) {
			if (date_of_tour_start.split('-')[0].length === 2) {
				date_of_tour_start = convertToYMD(date_of_tour_start);
			}
		}

		var startDate = new Date(date_of_tour_start);
		var preStartDate = new Date(pre_start_date);

		// Validate previous tour plan exists
		if (!Array.isArray(pre_tour_plan) || pre_tour_plan.length === 0) {
			alert("Previous tour plan not completed!");
			resetButton();
			return;
		}

		// Detect what has changed
		var changeDetection = {
			dateChanged: startDate.getTime() !== preStartDate.getTime(),
			nightsIncreased: no_of_night > pre_no_night,
			nightsDecreased: no_of_night < pre_no_night,
			roomsChanged: (no_of_double_room != pre_no_of_double_room || no_of_single_room != pre_no_of_single_room),
			paxChanged: (no_of_adult != pre_no_of_adult || no_of_child_with_bed != pre_no_of_child_with_bed ||
				no_of_child_without_bed != pre_no_of_child_without_bed || no_of_extra_bed != pre_no_of_extra_bed),
			vehicleModelsChanged: JSON.stringify(vehicle_models) !== JSON.stringify(pre_vehicle_models),
			totalPaxChanged: total_no_of_pax != pre_total_no_of_pax
		};

		console.log('Change Detection:', changeDetection);

		// Handle nights decrease
		if (changeDetection.nightsDecreased) {
			var nightsDiff = pre_no_night - no_of_night;
			console.log(`Nights decreased by ${nightsDiff}. Adjusting tour plan...`);

			pre_tour_plan = adjustTourPlanForDecreasedNights(pre_tour_plan, nightsDiff, no_of_night);

			if (pre_tour_plan.length === 0) {
				alert("Cannot reduce nights to this level. Please create a new tour plan.");
				resetButton();
				return;
			}
		}

		// Clear existing tour plan
		$('.tour_plan_div').empty();
		$('.dyn_list').empty();

		// Set loading flag ON
		isDraftLoading = true;

		// Determine copy mode
		var copyMode = determineCopyMode(changeDetection);
		console.log('Copy Mode:', copyMode);

		await copyTourPlanWithChangeHandling(pre_tour_plan, 0, copyMode, changeDetection);

		// Update totals after all locations are added
		setTimeout(function() {
			var totalNights = calculateTotalNights();
			$('#planned_night').text(totalNights + " / ");

			if (totalNights == no_of_night) {
				$("#btn_save_tour_plan").show();
				$("#btn_savedraft_tour_plan").show();
				$('#btn_add_bt').prop('disabled', true);
			} else if (totalNights < no_of_night) {
				$("#btn_save_tour_plan").hide();
				$("#btn_savedraft_tour_plan").show();
				$('#btn_add_bt').prop('disabled', false);
				showAlert('info', `You can add more locations. Planned: ${totalNights}, Required: ${no_of_night}`);
			} else {
				$("#btn_save_tour_plan").hide();
				$("#btn_savedraft_tour_plan").show();
				$('#btn_add_bt').prop('disabled', false);
			}

			updateGrandtotalBoth();
			get_veh_grand_total();
			toggleNightsVisibility();
			calculateVehicleExtraKmCharges();

			isDraftLoading = false;
			resetButton();

			var successMsg = getSuccessMessage(copyMode, changeDetection);
			showAlert('success', successMsg);
		}, 3000);

		function convertToYMD(dateStr) {
			var parts = dateStr.split('-');
			return parts[2] + '-' + parts[1] + '-' + parts[0];
		}

		function determineCopyMode(changes) {
			if (changes.nightsDecreased && !changes.dateChanged && !changes.roomsChanged) {
				return 'NIGHTS_DECREASED_ONLY';
			}
			if (changes.nightsIncreased) {
				return 'NIGHTS_INCREASED';
			}
			if (changes.paxChanged && !changes.dateChanged && !changes.roomsChanged && !changes.nightsIncreased && !changes.nightsDecreased) {
				return 'PAX_ONLY_CHANGED';
			}
			if (changes.dateChanged) {
				return 'DATE_CHANGED';
			}
			if (changes.roomsChanged) {
				return 'ROOMS_CHANGED';
			}
			if (changes.vehicleModelsChanged) {
				return 'VEHICLE_CHANGED';
			}
			return 'NO_CHANGES';
		}

		function getSuccessMessage(mode, changes) {
			switch (mode) {
				case 'DATE_CHANGED':
					return 'Tour dates changed - fresh tariffs fetched!';
				case 'NIGHTS_DECREASED_ONLY':
					return `Nights reduced - using previous tariff rates!`;
				case 'NIGHTS_INCREASED':
					return 'Nights increased - you can add more locations with fresh tariffs!';
				case 'ROOMS_CHANGED':
					return 'Room configuration changed - fresh tariffs applied!';
				case 'VEHICLE_CHANGED':
					return 'Vehicle types changed - fresh vehicle tariffs applied!';
				case 'PAX_ONLY_CHANGED':
					return 'Passenger count changed - totals recalculated with previous rates!';
				default:
					return 'Tour plan copied successfully with all previous data!';
			}
		}

		function adjustTourPlanForDecreasedNights(tourPlan, nightsToRemove, targetNights) {
			var adjustedPlan = [];
			var remainingNightsToRemove = nightsToRemove;

			for (var i = tourPlan.length - 1; i >= 0; i--) {
				var location = JSON.parse(JSON.stringify(tourPlan[i]));
				var locationNights = parseInt(location.no_of_days) || 0;

				if (remainingNightsToRemove >= locationNights) {
					remainingNightsToRemove -= locationNights;
					console.log(`Removing entire location: ${location.geog_name} (${locationNights} nights)`);
					continue;
				} else if (remainingNightsToRemove > 0) {
					location.no_of_days = locationNights - remainingNightsToRemove;
					console.log(`Reducing ${location.geog_name} from ${locationNights} to ${location.no_of_days} nights`);

					var checkinDate = new Date(location.check_in_date);
					var newCheckoutDate = new Date(checkinDate);
					newCheckoutDate.setDate(checkinDate.getDate() + location.no_of_days);
					location.check_out_date = newCheckoutDate.toISOString().split('T')[0];

					if (location.cost && Array.isArray(location.cost)) {
						var nightsToKeep = location.no_of_days;
						location.cost = location.cost.filter(function(costItem, idx) {
							var nightNum = Math.floor(idx / 8) + 1;
							return nightNum <= nightsToKeep;
						});
					}

					remainingNightsToRemove = 0;
				}

				adjustedPlan.unshift(location);

				if (remainingNightsToRemove === 0) {
					for (var j = i - 1; j >= 0; j--) {
						adjustedPlan.unshift(tourPlan[j]);
					}
					break;
				}
			}

			var currentDate = new Date(date_of_tour_start);
			for (var k = 0; k < adjustedPlan.length; k++) {
				adjustedPlan[k].check_in_date = currentDate.toISOString().split('T')[0];
				var nights = parseInt(adjustedPlan[k].no_of_days) || 0;
				currentDate.setDate(currentDate.getDate() + nights);
				adjustedPlan[k].check_out_date = currentDate.toISOString().split('T')[0];
			}

			return adjustedPlan;
		}

		async function copyTourPlanWithChangeHandling(planData, index, mode, changes) {
			if (index >= planData.length) return;

			var count = index + 1;
			var locationData = planData[index];
			console.log(`\n=== COPYING LOCATION ${count} (Mode: ${mode}) ===`);

			var ep_sel = locationData.meal_plan_id == 1 ? "selected" : "";
			var cp_sel = locationData.meal_plan_id == 2 ? "selected" : "";
			var map_sel = locationData.meal_plan_id == 3 ? "selected" : "";
			var ap_sel = locationData.meal_plan_id == 4 ? "selected" : "";

			var usePreTariffs = (mode === 'NO_CHANGES' || mode === 'NIGHTS_DECREASED_ONLY' || mode === 'PAX_ONLY_CHANGED');
			var usePreVehicle = (mode !== 'DATE_CHANGED' && mode !== 'VEHICLE_CHANGED');

			console.log(`Use Pre-Tariffs: ${usePreTariffs}, Use Pre-Vehicle: ${usePreVehicle}`);

			var newCard = buildLocationCardHtml(count, locationData, ep_sel, cp_sel, map_sel, ap_sel);
			$(".tour_plan_div").append(newCard);

			var breadcrumb = buildBreadcrumbHtml(count, locationData);
			$('.dyn_list').append(breadcrumb);

			populateHotelCategories(count, locationData);

			$(`.location-card[data-index="${count}"] .select2-show-search`).select2();

			$('#hotelcat' + count).trigger('change');

			await delay(1000);

			$(`#hotelid${count}`).val(locationData.hotel_id).trigger('change');

			await delay(1000);

			$(`#roomcat_common${count}`).val(locationData.room_category_id);
			$(`#roomcat_common${count}`).trigger('change');

			await delay(500);

			if (usePreTariffs) {
				await generateNightlyDetailsFromPreData(count, locationData, mode, changes);
			} else {
				await generateNightlyDetailsWithFreshTariffs(count, locationData, mode, changes);
			}

			await copyTourPlanWithChangeHandling(planData, index + 1, mode, changes);
		}

		async function generateNightlyDetailsFromPreData(count, locationData, mode, changes) {
			console.log(`\n=== USING PRE-DATA TARIFFS - Location ${count} ===`);

			var nightlyDetails = $(`#nightly-details${count}`);
			nightlyDetails.empty();
			var no_of_days = parseInt(locationData.no_of_days) || 0;

			var expansionData = locationData.expansion || [];
			var vehicleDetails = parseVehicleDetails(locationData.vehicle_details);

			console.log('Expansion data:', expansionData);
			console.log('Vehicle details (aggregated):', vehicleDetails);
			console.log('Number of nights:', no_of_days);

			if (expansionData.length === 0) {
				console.error('No expansion data available!');
				return;
			}

			for (let night = 1; night <= no_of_days; night++) {
				await generateNightWithPreData(count, night, locationData, expansionData, vehicleDetails);
			}

			if (is_vehicle_required == 1) {
				await addVehicleSummaryWithPreData(count, no_of_days, vehicleDetails, expansionData);
			}

			updateLocationTotals(count);
		}

		async function generateNightlyDetailsWithFreshTariffs(count, locationData, mode, changes) {
			console.log(`\n=== FETCHING FRESH TARIFFS - Location ${count} ===`);

			var nightlyDetails = $(`#nightly-details${count}`);
			nightlyDetails.empty();
			var no_of_days = parseInt(locationData.no_of_days) || 0;

			var vehicleDetails = parseVehicleDetails(locationData.vehicle_details);
			var usePreVehicleHeaders = (mode !== 'DATE_CHANGED' && mode !== 'VEHICLE_CHANGED');
			var usePreVehicle = (mode !== 'DATE_CHANGED' && mode !== 'VEHICLE_CHANGED');
			var expansionData = locationData.expansion || [];

			for (let night = 1; night <= no_of_days; night++) {
				await generateNightWithFreshTariff(count, night, locationData, vehicleDetails, usePreVehicleHeaders, usePreVehicle, expansionData);
			}

			if (is_vehicle_required == 1) {
				if (mode === 'VEHICLE_CHANGED' || mode === 'DATE_CHANGED') {
					await addVehicleSummaryWithFreshData(count, no_of_days);
				} else {
					await addVehicleSummaryWithPreData(count, no_of_days, vehicleDetails, expansionData);
				}
			}

			updateLocationTotals(count);
		}

		async function generateNightWithPreData(count, night, locationData, expansionData, vehicleDetails) {
			var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, locationData.check_in_date);
			$(`#nightly-details${count}`).append(nightlyHtml);

			// Wait for DOM to be ready
			await delay(200);

			var commonOptions = $(`#roomcat_common${count}`).html();
			$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
				$(this).html(commonOptions);
			});

			$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();

			// CRITICAL FIX: Set vehicle header FIRST (before setting data)
			if (is_vehicle_required == 1 && expansionData.length > 0) {
				var nightIndex = night - 1;
				if (nightIndex < expansionData.length) {
					var nightData = expansionData[nightIndex];

					// Extract header from night's expansion data
					if (nightData.vehicle_details_json) {
						try {
							var nightVehicleDetails = JSON.parse(nightData.vehicle_details_json);

							// Get header text from first vehicle in night data
							var headerText = '';
							if (nightVehicleDetails.length > 0 && nightVehicleDetails[0].veh_header) {
								headerText = nightVehicleDetails[0].veh_header;
							}

							console.log(`Setting night ${night} header from expansion: "${headerText}"`);

							// Set header with icon
							setVehicleHeaderWithIcon(count, night, headerText);

							// Then set vehicle data
							setVehicleDataFromNightExpansion(count, night, nightVehicleDetails);
						} catch (e) {
							console.error('Error parsing vehicle_details_json:', e);
							// Even on error, add the icon placeholder
							setVehicleHeaderWithIcon(count, night, '');
						}
					} else {
						// No vehicle data for this night, add icon placeholder
						setVehicleHeaderWithIcon(count, night, '');
					}
				}
			}

			// Set room data AFTER vehicle setup
			await setRoomDataFromExpansion(count, night, locationData, expansionData);
		}

		async function generateNightWithFreshTariff(count, night, locationData, vehicleDetails, usePreHeaders, usePreVehicle, expansionData) {
			var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, locationData.check_in_date);
			$(`#nightly-details${count}`).append(nightlyHtml);

			// Wait for DOM
			await delay(200);

			var commonOptions = $(`#roomcat_common${count}`).html();
			$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
				$(this).html(commonOptions);
			});

			$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();

			var wasDraftLoading = isDraftLoading;
			isDraftLoading = false;

			var numDoubles = parseInt(no_of_double_room);
			var numSingles = parseInt(no_of_single_room);

			// Trigger room tariff fetch
			for (let i = 1; i <= numDoubles; i++) {
				var rid = `${count}${night}${i}`;
				$(`#roomcat${rid}`).val(locationData.room_category_id).trigger('change');
				await delay(100);
				$(`#mealplan${rid}`).val(locationData.meal_plan_id).trigger('change');
				await delay(100);
			}

			for (let i = 1; i <= numSingles; i++) {
				var seq = numDoubles + i;
				var sid = `${count}${night}${seq}`;
				$(`#roomcat${sid}`).val(locationData.room_category_id).trigger('change');
				await delay(100);
				$(`#mealplan${sid}`).val(locationData.meal_plan_id).trigger('change');
				await delay(100);
			}

			isDraftLoading = wasDraftLoading;

			// CRITICAL FIX: Vehicle header logic based on scenario
			if (is_vehicle_required == 1) {
				var headerText = '';
				var nightVehicleDetails = [];

				// RULE: Use expansion data for headers when NOT changing dates/vehicles
				if (usePreVehicle && expansionData && expansionData.length > 0) {
					var nightIndex = night - 1;
					if (nightIndex < expansionData.length) {
						var nightData = expansionData[nightIndex];
						if (nightData && nightData.vehicle_details_json) {
							try {
								nightVehicleDetails = JSON.parse(nightData.vehicle_details_json);

								// Get header from night's expansion data
								if (nightVehicleDetails.length > 0 && nightVehicleDetails[0].veh_header) {
									headerText = nightVehicleDetails[0].veh_header;
									console.log(`Night ${night}: Using expansion header: "${headerText}"`);
								}
							} catch (e) {
								console.error('Error parsing vehicle_details_json for night ' + night + ':', e);
							}
						}
					}
				}

				// FALLBACK: If no expansion header found, try aggregated vehicle details
				// (This happens when dates/vehicles changed, or expansion empty)
				if (!headerText && usePreHeaders && vehicleDetails.length > 0) {
					if (vehicleDetails[0].veh_header) {
						headerText = vehicleDetails[0].veh_header;
						console.log(`Night ${night}: Using aggregated header: "${headerText}"`);
					}
				}

				// Set the header (even if empty - adds icon placeholder)
				setVehicleHeaderWithIcon(count, night, headerText);

				// Set vehicle data if using pre-data
				if (usePreVehicle && nightVehicleDetails.length > 0) {
					console.log(`Night ${night}: Setting vehicle data from expansion`);
					setVehicleDataFromNightExpansion(count, night, nightVehicleDetails);
				} else {
					console.log(`Night ${night}: No pre-vehicle data to set (will fetch fresh)`);
				}
			}

			await delay(300);
		}

		// NEW FUNCTION: Set vehicle header with refresh icon
		function setVehicleHeaderWithIcon(count, night, headerText) {
			var $headerElement = $(`#v_from_to${count}${night}`);

			if ($headerElement.length === 0) {
				console.error(`Vehicle header element #v_from_to${count}${night} not found!`);
				return;
			}

			// Clean header text
			headerText = (headerText || '').trim().replace(/^\s*-\s*/, '');

			// Build HTML with icon - ALWAYS refresh content
			var headerHtml = `
		<a href="#" class="refresh-night-vehicle" 
		   data-count="${count}" 
		   data-night="${night}" 
		   style="font-size: 14px; color: #003300; margin-right: 8px;" 
		   title="Refresh Vehicle Data">
			<i class="fa fa-refresh"></i>
		</a>
		<span>${headerText ? '- ' + headerText : ''}</span>
	`;

			// Always update (remove duplicate check)
			$headerElement.html(headerHtml);

			console.log(`Vehicle header set for Location ${count}, Night ${night}: "${headerText}"`);
		}

		async function setRoomDataFromExpansion(count, night, locationData, expansionData) {
			console.log(`Setting PRE-TARIFF rates for Location ${count}, Night ${night}`);

			var numDoubles = parseInt(no_of_double_room);
			var numSingles = parseInt(no_of_single_room);
			var nightIndex = night - 1;

			if (!expansionData || expansionData.length === 0) {
				console.error('No expansion data available!');
				return;
			}

			if (nightIndex >= expansionData.length) {
				console.error(`Night ${night} index ${nightIndex} exceeds expansion data length ${expansionData.length}`);
				return;
			}

			var nightData = expansionData[nightIndex];
			console.log(`Night ${night} data:`, nightData);

			var doubleRoomRate = parseFloat(nightData.room_rate_double) || 0;
			var singleRoomRate = parseFloat(nightData.room_rate_single) || 0;
			var childWithBedDouble = parseFloat(nightData.child_with_bed_double) || 0;
			var childWithBedSingle = parseFloat(nightData.child_with_bed_single) || 0;
			var childWithoutBedDouble = parseFloat(nightData.child_without_bed_double) || 0;
			var childWithoutBedSingle = parseFloat(nightData.child_without_bed_single) || 0;
			var extraBedDouble = parseFloat(nightData.extra_bed_double) || 0;
			var extraBedSingle = parseFloat(nightData.extra_bed_single) || 0;

			console.log(`Rates - Double: ${doubleRoomRate}, Single: ${singleRoomRate}`);

			for (let i = 1; i <= numDoubles; i++) {
				var rid = `${count}${night}${i}`;

				$(`#roomcat${rid}`).val(locationData.room_category_id);
				$(`#mealplan${rid}`).val(locationData.meal_plan_id);

				$(`#d_adult_rate${rid}`).val(doubleRoomRate);
				$(`#d_child_rate${rid}`).val(childWithBedDouble);
				$(`#d_child_wb_rate${rid}`).val(childWithoutBedDouble);
				$(`#d_extra_bed_rate${rid}`).val(extraBedDouble);

				updateRoomTotals(count, night, i);
			}

			for (let i = 1; i <= numSingles; i++) {
				var seq = numDoubles + i;
				var sid = `${count}${night}${seq}`;

				$(`#roomcat${sid}`).val(locationData.room_category_id);
				$(`#mealplan${sid}`).val(locationData.meal_plan_id);

				$(`#s_adult_rate${sid}`).val(singleRoomRate);
				$(`#s_child_rate${sid}`).val(childWithBedSingle);
				$(`#s_child_wb_rate${sid}`).val(childWithoutBedSingle);
				$(`#s_extra_bed_rate${sid}`).val(extraBedSingle);

				updateRoomTotals(count, night, seq);
			}

			console.log(`Completed setting pre-tariff rates for Location ${count}, Night ${night}`);
		}

		function setVehicleDataFromNightExpansion(count, night, nightVehicleDetails) {
			console.log(`Setting vehicle data for Night ${night}:`, nightVehicleDetails);

			$.each(vehicle_models, function(vindex, vmodel) {
				var matchedVehicle = nightVehicleDetails.find(function(veh) {
					return veh.veh_type_id == vmodel.vehicle_type_id;
				});

				if (matchedVehicle) {
					var vid = `${count}${night}${vmodel.vehicle_type_id}`;

					$(`#day_rent${vid}`).val(matchedVehicle.day_rent || 0);
					$(`#max_km_day${vid}`).val(matchedVehicle.max_km_day || 0);
					$(`#travel_distance${vid}`).val(matchedVehicle.travel_distance || 0);
					$(`#extra_kilometer${vid}`).val(matchedVehicle.extra_kilometer || 0);
					$(`#extra_km_rate${vid}`).val(matchedVehicle.extra_km_rate || 0);
					$(`#veh_total${vid}`).val(matchedVehicle.veh_total || 0);

					console.log(`Vehicle ${vmodel.vehicle_type_id} set: rent=${matchedVehicle.day_rent}`);

					updateVehicleTotals(count, night, vindex);
				}
			});
		}

		async function addVehicleSummaryWithPreData(count, no_of_days, vehicleDetails, expansionData) {
			var summaryHtml = generateVehicleSummary(count, no_of_days, vehicle_models);
			$(`#nightly-details${count}`).append(summaryHtml);

			// Wait for DOM
			await delay(200);

			var isDynamic = getIsDynamic();
			console.log(`Adding vehicle summary - Dynamic: ${isDynamic}`);

			if (!isDynamic && vehicleDetails.length > 0) {
				console.log('Static Mode - Using locationData.vehicle_details (aggregated)');
				$.each(vehicleDetails, function(vindex, vdata) {
					var matchedIndex = findVehicleModelIndex(vdata.veh_type_id);
					if (matchedIndex !== -1) {
						var totalDays = no_of_days;
						var totalRent = parseFloat(vdata.veh_total) || 0;
						var dailyRent = totalDays > 0 ? (totalRent / totalDays) : 0;

						$(`#summary_days_${count}_${matchedIndex}`).val(totalDays);
						$(`#summary_rent_${count}_${matchedIndex}`).val(dailyRent.toFixed(0));
						$(`#summary_distance_${count}_${matchedIndex}`).val(vdata.travel_distance || 0);
						$(`#summary_extra_km_rate_${count}_${matchedIndex}`).val(vdata.extra_km_rate || 0);
						$(`#summary_extra_km_${count}_${matchedIndex}`).val(vdata.extra_kilometer || 0);
						$(`#summary_total_${count}_${matchedIndex}`).val(totalRent);
					}
				});
			} else if (isDynamic) {
				console.log('Dynamic Mode - Aggregating from nightly expansion data');
				var vehicleAggregates = {};
				$.each(vehicle_models, function(vindex, vmodel) {
					vehicleAggregates[vmodel.vehicle_type_id] = {
						modelIndex: vindex,
						totalDays: 0,
						totalRent: 0,
						totalDistance: 0,
						totalExtraKm: 0,
						extraKmRate: 0
					};
				});

				// Aggregate from each night's expansion data
				for (let night = 1; night <= no_of_days; night++) {
					var nightIndex = night - 1;
					if (nightIndex < expansionData.length && expansionData[nightIndex].vehicle_details_json) {
						try {
							var nightVehicleDetails = JSON.parse(expansionData[nightIndex].vehicle_details_json);
							$.each(nightVehicleDetails, function(vindex, vdata) {
								var vehTypeId = vdata.veh_type_id;
								if (vehicleAggregates[vehTypeId]) {
									vehicleAggregates[vehTypeId].totalDays++;
									vehicleAggregates[vehTypeId].totalRent += parseFloat(vdata.veh_total) || 0;
									vehicleAggregates[vehTypeId].totalDistance += parseFloat(vdata.travel_distance) || 0;
									vehicleAggregates[vehTypeId].totalExtraKm += parseFloat(vdata.extra_kilometer) || 0;

									if (vehicleAggregates[vehTypeId].extraKmRate === 0) {
										vehicleAggregates[vehTypeId].extraKmRate = parseFloat(vdata.extra_km_rate) || 0;
									}
								}
							});
						} catch (e) {
							console.error(`Error parsing night ${night} vehicle details:`, e);
						}
					}
				}

				console.log('Aggregated vehicle data:', vehicleAggregates);

				// Populate summary fields
				$.each(vehicleAggregates, function(vehTypeId, agg) {
					if (agg.totalDays > 0) {
						var dailyRent = agg.totalRent / agg.totalDays;

						$(`#summary_days_${count}_${agg.modelIndex}`).val(agg.totalDays);
						$(`#summary_rent_${count}_${agg.modelIndex}`).val(dailyRent.toFixed(0));
						$(`#summary_distance_${count}_${agg.modelIndex}`).val(agg.totalDistance);
						$(`#summary_extra_km_rate_${count}_${agg.modelIndex}`).val(agg.extraKmRate);
						$(`#summary_extra_km_${count}_${agg.modelIndex}`).val(agg.totalExtraKm);
						$(`#summary_total_${count}_${agg.modelIndex}`).val(agg.totalRent);
					}
				});
			}

			// FIXED: Longer delay to ensure all nightly spans are rendered before building header
			await delay(500);
			await buildVehicleSummaryHeaderWithIcon(count, no_of_days);
			updateVehicleSummary(count);
		}

		async function addVehicleSummaryWithFreshData(count, no_of_days) {
			var summaryHtml = generateVehicleSummary(count, no_of_days, vehicle_models);
			$(`#nightly-details${count}`).append(summaryHtml);

			await delay(200);

			await buildVehicleSummaryHeaderWithIcon(count, no_of_days);
			updateVehicleSummary(count);
		}

		// UPDATED FUNCTION: Build vehicle summary header with refresh icon
		async function buildVehicleSummaryHeaderWithIcon(count, no_of_days) {
			var isDynamic = getIsDynamic();
			console.log(`Building summary header for ${count} (Dynamic: ${isDynamic}, Nights: ${no_of_days})`);

			var combinedHeaders = [];
			var missingHeaders = [];

			// Collect all night headers with longer delay and logging
			for (let night = 1; night <= no_of_days; night++) {
				await delay(100); // FIXED: Increased from 50ms to 100ms for better DOM readiness
				var $nightHeader = $(`#v_from_to${count}${night}`);
				if ($nightHeader.length > 0) {
					// Extract text only from span
					var nightHeaderText = $nightHeader.find('span').text().trim();
					// FIXED: More robust cleaning - handle multiple leading dashes/spaces
					nightHeaderText = nightHeaderText.replace(/^\s*[-–—]\s*/, '').trim(); // Handles -, –, —
					if (nightHeaderText && nightHeaderText !== '') {
						combinedHeaders.push('(' + nightHeaderText + ')');
						console.log(`Extracted header for night ${night}: "${nightHeaderText}"`);
					} else {
						console.warn(`Empty header text for night ${night} - check expansion data`);
					}
				} else {
					missingHeaders.push(night);
					console.error(`Header element not found for night ${night}: #v_from_to${count}${night}`);
				}
			}

			if (missingHeaders.length > 0) {
				console.warn(`Missing headers for nights: ${missingHeaders.join(', ')}`);
			}

			var summaryHeaderText = combinedHeaders.length > 0 ? ' ' + combinedHeaders.join(' + ') : '';
			console.log(`Combined headers: ${combinedHeaders.join(' + ')}`);

			var $summaryHeader = $(`#vehicle-summary-header-${count}`);
			if ($summaryHeader.length === 0) {
				console.error(`Summary header element not found: #vehicle-summary-header-${count}`);
				return;
			}

			// FIXED: Retry once if no headers found (rare DOM lag)
			if (combinedHeaders.length === 0 && no_of_days > 0) {
				console.log('No headers found on first pass - retrying after extra delay...');
				await delay(300);
				// Quick re-run of collection (without full loop delay for speed)
				combinedHeaders = [];
				for (let night = 1; night <= no_of_days; night++) {
					var $retryHeader = $(`#v_from_to${count}${night}`);
					if ($retryHeader.length > 0) {
						var retryText = $retryHeader.find('span').text().trim().replace(/^\s*[-–—]\s*/, '').trim();
						if (retryText && retryText !== '') {
							combinedHeaders.push('(' + retryText + ')');
						}
					}
				}
				summaryHeaderText = combinedHeaders.length > 0 ? ' ' + combinedHeaders.join(' + ') : '';
			}

			// FIXED: Add refresh icon ONLY in dynamic mode
			if (isDynamic) {
				// Dynamic mode: Show refresh icon for entire location
				$summaryHeader.html(`
            <a href="#" class="refresh-vehicle-summary" 
               data-count="${count}" 
               style="font-size: 14px; color: #003300; margin-right: 8px;" 
               title="Refresh All Vehicle Data">
                <i class="fa fa-refresh"></i>
            </a>
            <span>Vehicle Summary${summaryHeaderText}</span>
        `);
			} else {
				// Static mode: No icon, just text
				$summaryHeader.html(`
            <span>Vehicle Summary${summaryHeaderText}</span>
        `);
			}

			$summaryHeader.css({
				'position': 'relative',
				'text-align': 'center',
				'display': 'block'
			});

			console.log(`Vehicle summary header set for location ${count}: ${combinedHeaders.length} headers, Text: "${summaryHeaderText.trim()}", Dynamic: ${isDynamic}`);
		}

		// No changes needed to other functions, but ensure delay() is defined (it is, at the bottom)
		function delay(ms) {
			return new Promise(resolve => setTimeout(resolve, ms));
		}

		function parseVehicleDetails(vehDetails) {
			try {
				return typeof vehDetails === 'string' ? JSON.parse(vehDetails) : (vehDetails || []);
			} catch (e) {
				console.error('Error parsing vehicle details:', e);
				return [];
			}
		}

		function findVehicleModelIndex(vehTypeId) {
			for (var i = 0; i < vehicle_models.length; i++) {
				if (vehicle_models[i].vehicle_type_id == vehTypeId) {
					return i;
				}
			}
			return -1;
		}

		function buildLocationCardHtml(count, locationData, ep_sel, cp_sel, map_sel, ap_sel) {
			return `
		<div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
			<div class="card">
				<div class="card-header cardy">
					<div id="eighteen_div_d${count}"></div>
					<div id="eighteen_div_s${count}"></div>
					<input type="hidden" id="tax_status${count}" name="addloc[${count}][tax_status]" value="${locationData.tax_status || 0}">
					<input type="hidden" id="own_arrange${count}" name="addloc[${count}][own_arrange]" value="${locationData.is_own_arrangement || 0}">
					<input type="hidden" id="tour_location_id${count}" name="addloc[${count}][tour_location_id]" value="${locationData.tour_location}">
					<input type="hidden" id="location_sequence${count}" name="addloc[${count}][location_sequence]" value="${count}">
					<div class="card-title"><span class="card-seq" style="color:#339966;">${count}</span>. <span style="color:#339966;">${locationData.geog_name || 'Unknown Location'}</span></div>
					<div class="card-options">
						<a href="#" class="card-options-remove"><i class="fe fe-x"></i></a>
					</div>
				</div>
				<div class="card-body">
					<div class="ibox teams mb-30 bg-boxshadow">
						<div class="ibox-content teams">
							<div class="row mt-2">
							
							<div class="col-xl col-sm-12 col-md-2">
							<div class="teams-rank"><b>Hotel</b></div>
							<span class="text-muted">
							<select id="hotelid${count}" name="addloc[${count}][hotelid]" class="form-control select2-show-search input-sm hotel_change" data-id="${count}" required>
							<option value="">Select</option>
							</select>
							</span>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
							<div class="teams-rank"><b>Room Category</b></div>
							<select id="roomcat_common${count}" name="addloc[${count}][roomcat_common]" class="form-control select2-show-search input-sm room_cat_common_change" data-id="${count}">
							<option value="">Select</option>
							</select>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Checkin</b></div>
								<span class="text-muted">
									<input type="date" value="${locationData.check_in_date || ''}" id="checkin${count}" name="addloc[${count}][checkin]" class="form-control input-sm" required readonly>
								</span>
							</div>
							<div class="col-xl col-sm-12 col-md-2">
							<div class="teams-rank"><b>Nights</b></div>
							<span class="text-muted">
								<input type="text" id="no_of_night${count}" name="addloc[${count}][no_of_night]" value="${locationData.no_of_days || 0}" class="form-control input-sm no_of_night" count-id="${count}" maxlength="2" oninput="validateNumericInput(this); calculateCheckout(${count}); updateNightlyDetails(${count});" required>
								</span>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
								<div class="teams-rank"><b>Checkout</b></div>
								<span class="text-muted">
								<input type="date" id="checkout${count}" name="addloc[${count}][checkout]" value="${locationData.check_out_date || ''}" class="form-control input-sm" required readonly>
								</span>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>Hotel Category</b></div>
									<select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search input-sm hotel_cat_change" data-id="${count}" required>
										<option value="">Select</option>
									</select>
								</div>
							</div>
							<div class="row mt-2">
								<div class="col-xl col-sm-12 col-md-2">
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
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>No Of Adult</b></div>
									<input type="text" id="no_of_adult${count}" name="addloc[${count}][no_of_adult]" value="${no_of_adult}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>C.With Bed Qty</b></div>
									<input type="text" id="no_of_ch${count}" name="addloc[${count}][no_of_ch]" value="${no_of_child_with_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>C.Without Bed Qty</b></div>
									<input type="text" id="no_of_cw${count}" name="addloc[${count}][no_of_cw]" value="${no_of_child_without_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>Extra Bed Qty</b></div>
									<input type="text" id="no_of_extra${count}" name="addloc[${count}][no_of_extra]" value="${no_of_extra_bed}" class="form-control input-sm" maxlength="2" oninput="validateNumericInput(this);" readonly>
								</div>
								<div class="col-xl col-sm-12 col-md-2">
									<div class="teams-rank"><b>Total Pax</b></div>
									<input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly>
								</div>
							</div>
							<div class="nightly-details" id="nightly-details${count}"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		`;
		}

		function buildBreadcrumbHtml(count, locationData) {
			return `
		<li class="bc-card" data-index="${count}">
			<a>
				<span class="bc-card-seq" style="color:#fff">${count}</span>.<span style="color:#fff">${locationData.geog_name || 'Unknown'}(<span id="span_night_id${count}" style="color:#fff">${locationData.no_of_days || 0}</span>)<span id="loc_total${count}" style="color:#fff"></span></span>
			</a>
		</li>
		`;
		}

		function populateHotelCategories(count, locationData) {
			var hotelCat = $('#hotelcat' + count);
			hotelCat.empty();
			hotelCat.append('<option value="">Select</option>');
			if (hotel_categories.length > 0) {
				$.each(hotel_categories, function(index, hotelcat) {
					var selected = hotelcat.hotel_category_id == locationData.hot_cat_id ? ' selected' : '';
					hotelCat.append('<option value="' + hotelcat.hotel_category_id + '"' + selected + '>' + hotelcat.hotel_category_name + '</option>');
				});
			}
		}

		function updateLocationTotals(count) {
			updateGrandtotalBoth();
			get_veh_grand_total();

			var locationTotal = calculateLocationTotal(count);
			$(`#loc_total${count}`).text(' - ₹' + locationTotal.toFixed(2));
			$(`#span_night_id${count}`).text($(`#no_of_night${count}`).val());
		}

		function calculateLocationTotal(count) {
			var total = 0;
			var nights = parseInt($(`#no_of_night${count}`).val()) || 0;

			for (let night = 1; night <= nights; night++) {
				var numDoubles = parseInt(no_of_double_room);
				var numSingles = parseInt(no_of_single_room);

				for (let i = 1; i <= numDoubles + numSingles; i++) {
					var roomTotal = parseFloat($(`#room_total${count}${night}${i}`).val()) || 0;
					total += roomTotal;
				}
			}

			if (is_vehicle_required == 1) {
				for (let vindex = 0; vindex < vehicle_models.length; vindex++) {
					var vehTotal = parseFloat($(`#summary_total_${count}_${vindex}`).val()) || 0;
					total += vehTotal;
				}
			}

			return total;
		}

		function delay(ms) {
			return new Promise(resolve => setTimeout(resolve, ms));
		}

		function resetButton() {
			$btn.prop('disabled', false);
			$('#spinner_draft').hide();
		}
	});

	// EVENT HANDLERS FOR REFRESH ICONS

	// Refresh individual night vehicle data
	$(document).on('click', '.refresh-night-vehicle', function(e) {
		e.preventDefault();

		var $link = $(this);
		var count = $link.data('count');
		var night = $link.data('night');

		console.log(`Refreshing vehicle data for Location ${count}, Night ${night}`);

		// Add spinning animation
		$link.find('i').addClass('fa-spin');

		// Trigger vehicle data refresh (you need to implement this function)
		refreshNightVehicleData(count, night).then(function() {
			// Remove spinning animation
			$link.find('i').removeClass('fa-spin');
			showAlert('success', `Vehicle data refreshed for Night ${night}`);
		}).catch(function(error) {
			$link.find('i').removeClass('fa-spin');
			showAlert('error', 'Failed to refresh vehicle data');
			console.error(error);
		});
	});

	// Refresh all location vehicle data
	$(document).on('click', '.refresh-vehicle-summary', function(e) {
		e.preventDefault();

		var $link = $(this);
		var count = $link.data('count');

		console.log(`Refreshing all vehicle data for Location ${count}`);

		// Add spinning animation
		$link.find('i').addClass('fa-spin');

		// Trigger all vehicle data refresh
		refreshAllVehicleData(count).then(function() {
			$link.find('i').removeClass('fa-spin');
			showAlert('success', `All vehicle data refreshed for Location ${count}`);
		}).catch(function(error) {
			$link.find('i').removeClass('fa-spin');
			showAlert('error', 'Failed to refresh vehicle data');
			console.error(error);
		});
	});

	// REFRESH FUNCTIONS (implement based on your API)

	async function refreshNightVehicleData(count, night) {
		// Implement your vehicle data refresh logic here
		// This should fetch fresh data from server and update the night's vehicle fields

		return new Promise((resolve, reject) => {
			// Example implementation:
			// Call your API to get fresh vehicle tariffs for this night
			// Update the fields: day_rent, max_km_day, travel_distance, etc.

			// For now, just simulate a delay
			setTimeout(() => {
				console.log(`Vehicle data refreshed for Night ${night}`);
				resolve();
			}, 1000);
		});
	}

	async function refreshAllVehicleData(count) {
		// Refresh all nights for this location
		var nights = parseInt($(`#no_of_night${count}`).val()) || 0;

		for (let night = 1; night <= nights; night++) {
			await refreshNightVehicleData(count, night);
		}

		// Update summary
		updateVehicleSummary(count);
		await buildVehicleSummaryHeaderWithIcon(count, nights);
	}
</script>

<script>
	$(document).ready(function() {
		tinyMCE.init({
			mode: "exact",
			elements: "quick_quote_template", // The ID of your textarea element
			readonly: true,
			setup: function(ed) {
				ed.onInit.add(function(ed) {
					// TinyMCE has been initialized

				});
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#myTourplanForm').on('submit', function() {
			$('#btn_savedraft_tour_plan, #btn_save_tour_plan').prop('disabled', true);
			$('#btn_save_tour_plan').html('<i class="fa fa-spinner fa-spin"></i> Saving...');
			$('#btn_savedraft_tour_plan').html('<i class="fa fa-spinner fa-spin"></i> Saving...');
			$('#csspinner').show();
		});
	});
</script>

<script>
	$(document).on('input', '[id^="ster_d_adult_rate"], [id^="ster_n_d_child_rate"], [id^="ster_d_child_rate"], [id^="ster_n_d_child_wb_rate"], [id^="ster_d_child_wb_rate"], [id^="ster_n_d_extra_bed_rate"], [id^="ster_d_extra_bed_rate"]', function() {
		var id = this.id.match(/\d+/)[0];
		var ids = parseInt($('#ster_d_id' + id).val());

		//var ids = id;
		var no_of_ch = parseInt($('#no_of_ch' + ids).val()) || 0;
		var no_of_cw = parseInt($('#no_of_cw' + ids).val()) || 0;
		var no_of_extra = parseInt($('#no_of_extra' + ids).val()) || 0;

		var child_count = calculate_total_child_count();
		var child_wb_count = calculate_total_child_wb_count();
		var extra_count = calculate_total_extra_count();
		if (child_count > no_of_ch) {
			alert("Total number of children with bed cannot exceed " + no_of_ch);
			$('#ster_n_d_child_rate' + id).val(0).trigger('change');
		}
		if (child_wb_count > no_of_cw) {
			alert("Total number of children without bed cannot exceed " + no_of_cw);
			$('#ster_n_d_child_wb_rate' + id).val(0).trigger('change');
		}
		if (extra_count > no_of_extra) {
			alert("Total number of extra bed cannot exceed " + no_of_extra);
			$('#ster_n_d_extra_bed_rate' + id).val(0).trigger('change');
		}
		var room_rate = parseInt($('#ster_d_adult_rate' + id).val());

		var no_of_child_with_bed = parseInt($('#ster_n_d_child_rate' + id).val());
		var child_with_bed_rate = parseInt($('#ster_d_child_rate' + id).val());

		var no_of_child_without_bed = parseInt($('#ster_n_d_child_wb_rate' + id).val());
		var child_without_bed_rate = parseInt($('#ster_d_child_wb_rate' + id).val());

		var no_of_extra_bed = parseInt($('#ster_n_d_extra_bed_rate' + id).val());
		var extra_bed_rate = parseInt($('#ster_d_extra_bed_rate' + id).val());

		var total = room_rate + (no_of_child_with_bed * child_with_bed_rate) + (no_of_child_without_bed * child_without_bed_rate) + (no_of_extra_bed * extra_bed_rate);

		$('#ster_d_total_rate' + id).val(total);

		if (total >= 7500) {
			var gst = 18;
		} else {
			var gst = 5;
		}
		$('#ster_gst_per' + id).val(gst);
		var gst_val = total * (gst / 100);
		var grand_tot = total + gst_val;

		$('#ster_g_tot' + id).val(grand_tot);
		var grand_totals = calculate_total();
		var no_of_night = parseInt($('#no_of_night' + ids).val());
		$('#d_total_rate' + ids).val((grand_totals * no_of_night));

		$('#hd_ster_d_adult_rate' + id).val($('#ster_d_adult_rate' + id).val());
		$('#hd_ster_n_d_child_rate' + id).val($('#ster_n_d_child_rate' + id).val());
		$('#hd_ster_d_child_rate' + id).val($('#ster_d_child_rate' + id).val());
		$('#hd_ster_n_d_child_wb_rate' + id).val($('#ster_n_d_child_wb_rate' + id).val());
		$('#hd_ster_d_child_wb_rate' + id).val($('#ster_d_child_wb_rate' + id).val());
		$('#hd_ster_n_d_extra_bed_rate' + id).val($('#ster_n_d_extra_bed_rate' + id).val());
		$('#hd_ster_d_extra_bed_rate' + id).val($('#ster_d_extra_bed_rate' + id).val());
		$('#hd_ster_d_total_rate' + id).val($('#ster_d_total_rate' + id).val());
		$('#hd_ster_gst_per' + id).val($('#ster_gst_per' + id).val());
		$('#hd_ster_g_tot' + id).val($('#ster_g_tot' + id).val());
	});

	function calculate_total() {
		var totals = 0;
		$('.sterling_d_grand').each(function() {
			var grand = parseInt($(this).val()) || 0;
			totals += grand;
		});
		return totals;
	}

	function calculate_total_child_count() {
		var totals = 0;
		$('.cls_child_count').each(function() {
			var grand = parseInt($(this).val()) || 0;
			totals += grand;
		});
		return totals;
	}

	function calculate_total_child_wb_count() {
		var totals = 0;
		$('.cls_child_wb_count').each(function() {
			var grand = parseInt($(this).val()) || 0;
			totals += grand;
		});
		return totals;
	}

	function calculate_total_extra_count() {
		var totals = 0;
		$('.cls_extra_count').each(function() {
			var grand = parseInt($(this).val()) || 0;
			totals += grand;
		});
		return totals;
	}
</script>

<script>
	$(document).on('input', '[id^="ster_s_adult_rate"], [id^="ster_n_s_child_rate"], [id^="ster_s_child_rate"], [id^="ster_n_s_child_wb_rate"], [id^="ster_s_child_wb_rate"], [id^="ster_n_s_extra_bed_rate"], [id^="ster_s_extra_bed_rate"]', function() {
		var id = this.id.match(/\d+/)[0];

		var room_rate = parseInt($('#ster_s_adult_rate' + id).val());
		var ids = parseInt($('#ster_s_id' + id).val());
		//var ids = id;
		var total = room_rate;

		$('#ster_s_total_rate' + id).val(total);

		if (total >= 7500) {
			var gst = 18;
		} else {
			var gst = 5;
		}
		$('#ster_s_gst_per' + id).val(gst);
		var gst_val = total * (gst / 100);
		var grand_tot = total + gst_val;

		$('#ster_s_g_tot' + id).val(grand_tot);
		var grand_totals = calculate_total_s();
		var no_of_night = parseInt($('#no_of_night' + ids).val());
		$('#s_total_rate' + ids).val((grand_totals * no_of_night));

		$('#hd_ster_s_adult_rate' + id).val($('#ster_s_adult_rate' + id).val());
		$('#hd_ster_n_s_child_rate' + id).val($('#ster_n_s_child_rate' + id).val());
		$('#hd_ster_s_child_rate' + id).val($('#ster_s_child_rate' + id).val());
		$('#hd_ster_n_s_child_wb_rate' + id).val($('#ster_n_s_child_wb_rate' + id).val());
		$('#hd_ster_s_child_wb_rate' + id).val($('#ster_s_child_wb_rate' + id).val());
		$('#hd_ster_n_s_extra_bed_rate' + id).val($('#ster_n_s_extra_bed_rate' + id).val());
		$('#hd_ster_s_extra_bed_rate' + id).val($('#ster_s_extra_bed_rate' + id).val());
		$('#hd_ster_s_total_rate' + id).val($('#ster_s_total_rate' + id).val());
		$('#hd_ster_s_gst_per' + id).val($('#ster_s_gst_per' + id).val());
		$('#hd_ster_s_g_tot' + id).val($('#ster_s_g_tot' + id).val());
	});

	function calculate_total_s() {
		var totals = 0;
		$('.sterling_s_grand').each(function() {
			var grand = parseInt($(this).val()) || 0;
			totals += grand;
		});
		return totals;
	}
</script>