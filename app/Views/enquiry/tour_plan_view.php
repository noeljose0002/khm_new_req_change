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

		/* Label (like Total(Double), Grand Total(Double)) */


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
																				<div class="col-xl-8">

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
																				<div class="d-flex align-items-center gap-3">
																					<div class="form-check">

																						<input class="form-check-input" type="checkbox" id="dynamicNeeded" />
																						<label class="btn btn-success btn-block dyna " for="dynamicNeeded">Dynamic needed</label>
																					</div>


																				</div>
																				<div class="col-xl-2">
																					<button type="button" class="btn btn-success btn-block pt-2 pb-2" id="btn_add_bt">Add Location<i class="fa fa-plus ml-2"></i></button>
																				</div>
																				<?php if (!empty($pre_tour_plan) && empty($cur_tour_plan)) { ?>
																					<div class="col-xl-2">
																						<button type="button" class="btn btn-success btn-block pt-2 pb-2" id="copy_tour_plan">Import Tour Plan<i class="fa fa-save ml-2"></i></button>
																					</div>
																				<?php } ?>
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
</script>

<script>
	$(document).on('click', '#btn_add_bt', function(e) {
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
		var dyn_list_data = '';
		var lastLocationId = $('.tour_plan_div .location-card:last').find('input[name^="addloc["][name$="[tour_location_id]"]').val();
		var vid;
		var newCard = '';
		var breadcrumb = '';
		var si_nos;

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

					newCard += `
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
                                                <input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly> <br>
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

					breadcrumb += `
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

		// Night header + open card wrapper to contain rows (prevents .row negative margins from overflowing)
		nightlyHtml += `<div class="night-section" data-night="${night}">
					<h3 style="color:#0000CD; text-align: center;"><b>Night ${night} (${nightDateStr}) </b><a href="#" class="close-night-btn" style="float: right; font-size: 12px;"><i class="fe fe-x"></i></a></h3>
					<div class="card p-3 mb-3" id="card_night_${count}_${night}">
					<div class="container-fluid px-2">`;

		// Double Rooms
		if (no_of_double_room > 0) {
			nightlyHtml += `<div class="row mt-2 double_row">`;
			nightlyHtml += `
						
							<div class="col-12 d-flex justify-content-left">
								<div class="col-xl-1.3 col-sm-12 col-md-2 total-col-room">
										<div class="teams-rank"><b>Double Room</b></div>
										<input type="text" id="double${count}${night}" name="addloc[${count}][nights][${night}][double]" value="${no_of_double_room}" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}">
									</div>
							</div>
						
						</div>`;
			for (let i = 1; i <= no_of_double_room; i++) {
				let rid = `${count}${night}${i}`;
				nightlyHtml += `
							<div class="row mt-2 align-items-center">
								<div style="display:none;" class="col-xl col-sm-12 col-md-2 room-type-col">
									<div class="teams-rank"><b>No. of Double Rooms</b></div>
									<input type="text" id="double${rid}" name="addloc[${count}][nights][${night}][double][${i}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${i}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>Room Category</b></div>
									<select id="roomcat${rid}" name="addloc[${count}][nights][${night}][roomcat][${i}]" class="form-control select2-show-search input-sm room_cat_change"  data-type="double" count-id="${count}" data-id="${rid}" data-night="${night}" data-room-index="${i}" required>
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
									<div class="teams-rank"><b>Daily Room Rate</b></div>
									<input type="text" id="d_adult_rate${rid}" name="addloc[${count}][nights][${night}][d_adult_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${night}, ${i});" required data-night="${night}" data-room-index="${i}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>C.With Bed Rate</b></div>
									<input type="text" id="d_child_rate${rid}" name="addloc[${count}][nights][${night}][d_child_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${night}, ${i});" data-night="${night}" data-room-index="${i}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>C.Without Bed Rate</b></div>
									<input type="text" id="d_child_wb_rate${rid}" name="addloc[${count}][nights][${night}][d_child_wb_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${night}, ${i});" data-night="${night}" data-room-index="${i}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>Extra Bed Rate</b></div>
									<input type="text" id="d_extra_bed_rate${rid}" name="addloc[${count}][nights][${night}][d_extra_bed_rate][${i}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${night}, ${i});" data-night="${night}" data-room-index="${i}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>Total(Double)</b></div>
									<input type="text" id="d_total_rate${rid}" name="addloc[${count}][nights][${night}][d_total_rate][${i}]" class="form-control input-sm d_total_rate" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${i}">
								</div>
							</div>`;
			}
			nightlyHtml += `
						<div class="row mt-3">
							<div class="col-12 d-flex justify-content-end">
								<div class="col-xl-2 col-sm-12 col-md-2 total-col">
									<div class="teams-rank textlef"><b>Grand Total(Double)</b></div>
									<input type="text" id="dd_total_rate${count}${night}" name="addloc[${count}][nights][${night}][dd_total_rate]" value="0" class="form-control input-sm" maxlength="6" readonly data-night="${night}"><br>
								</div>
							</div>
						</div>
						<div class="card" id="sterling_double${count}${night}" data-night="${night}"></div>
					`;
		} else {
			nightlyHtml += `
						<input type="hidden" id="double${count}${night}" name="addloc[${count}][nights][${night}][double]" value="0" data-night="${night}">
						<input type="hidden" id="d_adult_rate${count}${night}" name="addloc[${count}][nights][${night}][d_adult_rate]" value="0" data-night="${night}">
						<input type="hidden" id="d_child_rate${count}${night}" name="addloc[${count}][nights][${night}][d_child_rate]" value="0" data-night="${night}">
						<input type="hidden" id="d_child_wb_rate${count}${night}" name="addloc[${count}][nights][${night}][d_child_wb_rate]" value="0" data-night="${night}">
						<input type="hidden" id="d_extra_bed_rate${count}${night}" name="addloc[${count}][nights][${night}][d_extra_bed_rate]" value="0" data-night="${night}">
						<input type="hidden" id="d_total_rate${count}${night}" name="addloc[${count}][nights][${night}][d_total_rate]" value="0" data-night="${night}">
						<input type="hidden" id="dd_total_rate${count}${night}" name="addloc[${count}][nights][${night}][dd_total_rate]" value="0" data-night="${night}">
					`;
		}

		// Single Rooms
		let double_count = no_of_double_room > 0 ? no_of_double_room : 0;
		if (no_of_single_room > 0) {
			nightlyHtml += `<div class="row mt-2 single_row">`;
			nightlyHtml += `
						
							<div class="col-12 d-flex justify-content-left">
								<div class="col-xl-1.3 col-sm-12 col-md-2 total-col-room">
										<div class="teams-rank col-room"><b>Single Room</b></div>
										<input type="text" id="single${count}${night}" name="addloc[${count}][nights][${night}][single]" value="${no_of_single_room}" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" >
									</div>
							</div>
						
						</div>`;
			for (let i = 1; i <= no_of_single_room; i++) {
				let seq = double_count + i;
				let sid = `${count}${night}${seq}`;
				nightlyHtml += `
							<div class="row mt-2 align-items-center">
								<div style="display:none;" class="col-xl col-sm-12 col-md-2 room-type-col">
									<div class="teams-rank"><b>No. of Single Rooms</b></div>
									<input type="text" id="single${sid}" name="addloc[${count}][nights][${night}][single][${seq}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${seq}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>Room Category</b></div>
									<select id="roomcat${sid}" name="addloc[${count}][nights][${night}][roomcat][${seq}]" class="form-control select2-show-search input-sm room_cat_change"  data-type="single" count-id="${count}" data-id="${sid}" data-night="${night}" data-room-index="${seq}" required>
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
									<div class="teams-rank"><b>Daily Room Rate</b></div>
									<input type="text" id="s_adult_rate${sid}" name="addloc[${count}][nights][${night}][s_adult_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${night}, ${seq});" data-night="${night}" data-room-index="${seq}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>C.With Bed Rate</b></div>
									<input type="text" id="s_child_rate${sid}" name="addloc[${count}][nights][${night}][s_child_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);"  data-night="${night}" data-room-index="${seq}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>C.Without Bed Rate</b></div>
									<input type="text" id="s_child_wb_rate${sid}" name="addloc[${count}][nights][${night}][s_child_wb_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);"  data-night="${night}" data-room-index="${seq}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>Extra Bed Rate</b></div>
									<input type="text" id="s_extra_bed_rate${sid}" name="addloc[${count}][nights][${night}][s_extra_bed_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);"  data-night="${night}" data-room-index="${seq}">
								</div>
								<div class="col-xl col-sm-12 col-md-2 ps-2">
									<div class="teams-rank"><b>Total(Single)</b></div>
									<input type="text" id="s_total_rate${sid}" name="addloc[${count}][nights][${night}][s_total_rate][${seq}]" class="form-control input-sm s_total_rate" data-count="${count}" maxlength="6"  data-night="${night}" data-room-index="${seq}">
								</div>
							</div>`;
			}
			nightlyHtml += `
					
						<div class="row mt-3">
							<div class="col-12 d-flex justify-content-end">
								<div class="col-xl-1.3 col-sm-12 col-md-2 total-col">
									<div class="teams-rank textlef"><b>Grand Total(Single)</b></div>
									<input type="text" id="ss_total_rate${count}${night}" name="addloc[${count}][nights][${night}][ss_total_rate]" value="0" class="form-control input-sm" maxlength="6" readonly data-night="${night}"> <br>
								</div>
							</div>
						</div>
						<div class="card" id="sterling_single${count}${night}" data-night="${night}"></div>
					`;
		} else {
			nightlyHtml += `
						<input type="hidden" id="single${count}${night}" name="addloc[${count}][nights][${night}][single]" value="0" data-night="${night}">
						<input type="hidden" id="s_adult_rate${count}${night}" name="addloc[${count}][nights][${night}][s_adult_rate]" value="0" data-night="${night}">
						<input type="hidden" id="s_child_rate${count}${night}" name="addloc[${count}][nights][${night}][s_child_rate]" value="0" data-night="${night}">
						<input type="hidden" id="s_child_wb_rate${count}${night}" name="addloc[${count}][nights][${night}][s_child_wb_rate]" value="0" data-night="${night}">
						<input type="hidden" id="s_extra_bed_rate${count}${night}" name="addloc[${count}][nights][${night}][s_extra_bed_rate]" value="0" data-night="${night}">
						<input type="hidden" id="s_total_rate${count}${night}" name="addloc[${count}][nights][${night}][s_total_rate]" value="0" data-night="${night}">
						<input type="hidden" id="ss_total_rate${count}${night}" name="addloc[${count}][nights][${night}][ss_total_rate]" value="0" data-night="${night}">
					`;
		}

		// Vehicle Details
		if (is_vehicle_required == 1) {
			nightlyHtml += `
						<div class="row mt-2 vehicle-details-section">
							<div class="col-xl-1 col-sm-12 col-md-1 ps-2">
								<a id="loadvehs${count}${night}" class="nav-link load_vehs_click" data-id="${count}" data-night="${night}" data-loaded="false"><i class="fa fa-refresh"></i></a>
							</div>
							<div class="col-xl-11 col-sm-12 col-md-11 ps-2"><h5 style="color:#003300;">Vehicle Details<span id="v_from_to${count}${night}"></span></h5></div>
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
						</div>
					`;
			$.each(vehicle_models, function(vindex, vmodel) {
				let vid = `${count}${night}${vmodel.vehicle_type_id}`;
				nightlyHtml += `
							<div class="row mt-2 single_row align-items-center vehicle-row">
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
									<input type="text" id="extra_km_rate${vid}" name="addloc[${count}][nights][${night}][extra_km_rate][${vindex}]" value="0" class="form-control input-sm extra_km_rate${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${night}" data-veh-index="${vindex}">
								</div>
								<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
									<input type="text" id="veh_total${vid}" name="addloc[${count}][nights][${night}][veh_total][${vindex}]" value="0" class="form-control input-sm munn${vindex}" maxlength="5" readonly data-night="${night}" data-veh-index="${vindex}">
								</div>
							</div>`;
			});
			nightlyHtml += `
						<div class="row mt-3">
							<div class="col-12 d-flex justify-content-end">
								<div class="col-xl-1.3 col-sm-12 col-md-2">
									<div class="teams-rank"><b>Grand Total(Vehicle)</b></div>
									<input type="text" id="veh_grand_total${count}${night}" name="addloc[${count}][nights][${night}][veh_grand_total]" value="0" class="form-control input-sm" maxlength="6" readonly data-night="${night}">
								</div>
							</div>
						</div>
					`;
		} else {
			nightlyHtml += `
						<input type="hidden" id="veh_model${count}${night}0" name="addloc[${count}][nights][${night}][veh_model][0]" value="" data-night="${night}">
						<input type="hidden" id="veh_count${count}${night}0" name="addloc[${count}][nights][${night}][veh_count][0]" value="0" data-night="${night}">
						<input type="hidden" id="day_rent${count}${night}0" name="addloc[${count}][nights][${night}][day_rent][0]" value="0" data-night="${night}">
						<input type="hidden" id="max_km_day${count}${night}0" name="addloc[${count}][nights][${night}][max_km_day][0]" value="0" data-night="${night}">
						<input type="hidden" id="extra_km_rate${count}${night}0" name="addloc[${count}][nights][${night}][extra_km_rate][0]" value="0" data-night="${night}">
						<input type="hidden" id="veh_total${count}${night}0" name="addloc[${count}][nights][${night}][veh_total][0]" value="0" data-night="${night}">
						<input type="hidden" id="veh_grand_total${count}${night}" name="addloc[${count}][nights][${night}][veh_grand_total]" value="0" data-night="${night}">
					`;
		}

		// close container and card, then the night-section wrapper
		nightlyHtml += `</div> <!-- /container-fluid -->\n</div> <!-- /card -->\n</div> <!-- /night-section -->`;

		return nightlyHtml;
		calculateVehicleExtraKmCharges();
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

	// Add the mp_row_change handler here, similar to room_cat_change

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

	// Add the mp_row_change handler here, similar to room_cat_change
	// Fixed mp_row_change handler with proper visual update
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

	// ===== OPTIMIZED MEAL PLAN CHANGE HANDLER =====
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
						var prefix = type === 'double' ? 'd_' : 's_';
						var $rateField = $(`#${prefix}adult_rate${otherRid}`);

						if ($rateField.length > 0) {
							var mealPlanId = `${prefix}mealplan${otherRid}`;
							var $otherMealPlan = $(`#${mealPlanId}`);

							console.log(`Checking Night ${n}, Room ${r} (${type}):`, {
								otherRid: otherRid,
								mealPlanId: mealPlanId,
								found: $otherMealPlan.length > 0
							});

							if ($otherMealPlan.length === 0) {
								$otherMealPlan = $(`#mealplan${otherRid}`);
								console.log('Trying fallback selector #mealplan' + otherRid + ':', $otherMealPlan.length > 0);
							}

							if ($otherMealPlan.length === 0) {
								$otherMealPlan = $(`[id="mealplan${otherRid}"][data-type="${type}"]`);
								console.log('Trying data-type selector:', $otherMealPlan.length > 0);
							}

							// **OPTIMIZATION 2: Only propagate if value is different**
							if ($otherMealPlan.length > 0 && $otherMealPlan.val() !== mealplan) {
								propagationTargets.push({
									element: $otherMealPlan,
									value: mealplan,
									rid: otherRid
								});
							}
						} else {
							console.log(`Rate field #${prefix}adult_rate${otherRid} does not exist - room ${r} doesn't exist for night ${n}`);
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
					// Set rates for this room
					if (type === 'double') {
						$(`#d_adult_rate${rid}`).prop("readonly", false).val(room_r);
						$(`#d_child_rate${rid}`).prop("readonly", false).val(child_r);
						$(`#d_child_wb_rate${rid}`).prop("readonly", false).val(child_wb_r);
						$(`#d_extra_bed_rate${rid}`).prop("readonly", false).val(extra_r);
					} else {
						$(`#s_adult_rate${rid}`).prop("readonly", false).val(room_r);
						$(`#s_child_rate${rid}`).prop("readonly", false).val(child_r);
						$(`#s_child_wb_rate${rid}`).prop("readonly", false).val(child_wb_r);
						$(`#s_extra_bed_rate${rid}`).prop("readonly", false).val(extra_r);
					}

					// Generate sterling only for first room
					if (roomIndex === 1 && tax_status == 1) {
						var tot_d = effective_room_r + (child_with_bed_count * child_r) + (child_without_bed_count * child_wb_r) + (extra_bed_count * extra_r);
						var gst = tot_d >= 7500 ? 18 : 12;
						var gstval = (gst / 100) * tot_d;
						var total_doubles = tot_d + gstval;

						var tt = rid;
						var sterling_html = `
						<div class="row">
							<div class="col-xl-1 col-sm-12 col-md-1"></div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>Room Rate</b></div>
								<input type="text" id="ster_d_adult_rate${tt}" class="form-control input-sm" maxlength="7" value="${effective_room_r}" oninput="validateNumericInput(this);" required>
								<input type="hidden" id="ster_d_id${tt}" class="form-control input-sm" maxlength="6" value="${rid}">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>C. with Bed Qty</b></div>
								<input type="text" id="ster_n_d_child_rate${tt}" class="form-control input-sm cls_child_count" maxlength="7" value="${child_with_bed_count}" oninput="validateNumericInput(this);">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>C. with Bed Rate</b></div>
								<input type="text" id="ster_d_child_rate${tt}" value="${child_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>C. w/o Bed Qty</b></div>
								<input type="text" id="ster_n_d_child_wb_rate${tt}" value="${child_without_bed_count}" class="form-control input-sm cls_child_wb_count" maxlength="7" oninput="validateNumericInput(this);">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>C. w/o Bed Rate</b></div>
								<input type="text" id="ster_d_child_wb_rate${tt}" value="${child_wb_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>Extra Bed Qty</b></div>
								<input type="text" id="ster_n_d_extra_bed_rate${tt}" value="${extra_bed_count}" class="form-control input-sm cls_extra_count" maxlength="7" oninput="validateNumericInput(this);">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>Extra Bed Rate</b></div>
								<input type="text" id="ster_d_extra_bed_rate${tt}" value="${extra_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>Total</b></div>
								<input type="text" id="ster_d_total_rate${tt}" value="${tot_d}" class="form-control input-sm" maxlength="7" readonly>
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>GST%</b></div>
								<input type="text" id="ster_gst_per${tt}" value="${gst}" class="form-control input-sm" maxlength="7" readonly>
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1">
								<div class="teams-rank"><b>Grand Total</b></div>
								<input type="text" id="ster_g_tot${tt}" value="${total_doubles}" class="form-control input-sm sterling_d_grand" maxlength="7" readonly>
							</div>
							<div class="col-xl-1 col-sm-12 col-md-1"></div>
						</div>
					`;

						var div_id = type === 'double' ? 'sterling_double' : 'sterling_single';
						var eighteen_div = type === 'double' ? 'eighteen_div_d' : 'eighteen_div_s';
						var total_field = type === 'double' ? 'd_total_rate' : 's_total_rate';
						var hd_prefix = type === 'double' ? 'hd_ster_d' : 'hd_ster_s';
						var ster_prefix = type === 'double' ? 'ster_d' : 'ster_s';
						var n_prefix = type === 'double' ? 'n_d' : 'n_s';
						var g_prefix = type === 'double' ? '' : 's_';

						var ediv = `
						<input type="hidden" id="${hd_prefix}_id${tt}" value="${rid}" name="hd_ster_addloc_${g_prefix}[${tt}][ster_${g_prefix}id]">
						<input type="hidden" id="${hd_prefix}_adult_rate${tt}" value="${effective_room_r}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}adult_rate]">
						<input type="hidden" id="hd_ster_${n_prefix}_child_rate${tt}" value="${child_with_bed_count}" name="hd_ster_addloc_${g_prefix}[${tt}][n_${g_prefix}child_rate]">
						<input type="hidden" id="${hd_prefix}_child_rate${tt}" value="${child_r}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}child_rate]">
						<input type="hidden" id="hd_ster_${n_prefix}_child_wb_rate${tt}" value="${child_without_bed_count}" name="hd_ster_addloc_${g_prefix}[${tt}][n_${g_prefix}child_wb_rate]">
						<input type="hidden" id="${hd_prefix}_child_wb_rate${tt}" value="${child_wb_r}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}child_wb_rate]">
						<input type="hidden" id="hd_ster_${n_prefix}_extra_bed_rate${tt}" value="${extra_bed_count}" name="hd_ster_addloc_${g_prefix}[${tt}][n_${g_prefix}extra_bed_rate]">
						<input type="hidden" id="${hd_prefix}_extra_bed_rate${tt}" value="${extra_r}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}extra_bed_rate]">
						<input type="hidden" id="${hd_prefix}_total_rate${tt}" value="${tot_d}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}total_rate]">
						<input type="hidden" id="hd_ster_${g_prefix}gst_per${tt}" value="${gst}" name="hd_ster_addloc_${g_prefix}[${g_prefix}gst_per]">
						<input type="hidden" id="hd_ster_${g_prefix}g_tot${tt}" value="${total_doubles}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}g_tot]">
					`;

						$(`#${eighteen_div}${count}`).append(ediv);
						$(`#${div_id}${count}${night}`).html(sterling_html);
						$(`#${total_field}${rid}`).val(total_doubles);
					} else if (tax_status != 1) {
						$(`#sterling_double${count}${night}`).html('');
						$(`#sterling_single${count}${night}`).html('');
						$(`#eighteen_div_d${count}`).html('');
						$(`#eighteen_div_s${count}`).html('');
					}
				});

				// **OPTIMIZATION 8: Defer heavy calculations to idle time**
				deferToIdle(function() {
					updateRoomTotals(count, night, roomIndex);

					if (roomIndex === 1 && !getIsDynamic()) {
						propagateRoomData(count, night, type);
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
			},
			complete: function() {
				$spinner.hide();
				$mealplanSelect.prop('disabled', false);
				$(`#roomcat${rid}`).prop('disabled', false);
			}
		});
	});
	// Event handler for rate inputs to propagate in static mode
	$(document).on('input', 'input[id^="d_adult_rate"], input[id^="d_child_rate"], input[id^="d_child_wb_rate"], input[id^="d_extra_bed_rate"], input[id^="s_adult_rate"], input[id^="s_child_rate"], input[id^="s_child_wb_rate"], input[id^="s_extra_bed_rate"]', function() {
		var $input = $(this);
		validateNumericInput($input[0]); // Validate input

		var count = $input.data('count');
		var night = parseInt($input.data('night'));
		var roomIndex = parseInt($input.data('room-index'));
		var fieldId = $input.attr('id');
		var value = $input.val();
		var roomType = fieldId.includes('d_') ? 'double' : 'single';
		var prefix = roomType === 'double' ? 'd_' : 's_';

		console.log('=== Rate Input Change ===');
		console.log('Field:', fieldId, 'Count:', count, 'Night:', night, 'Room Index:', roomIndex, 'Room Type:', roomType, 'Value:', value);

		// **CHECK: In dynamic mode or not the first room, update only the current room**
		if (getIsDynamic() || roomIndex !== 1) {
			console.log('Dynamic mode or not first room - Updating only current room');
			updateRoomTotals(count, night, roomIndex);
			updateGrandtotalBoth();
			var veh_grand_total = get_veh_grand_total();
			$(`#loc_total${count}`).text(updateGrandtotalBoth(count) + " + " + veh_grand_total);
			$('#v_total').text(veh_grand_total);
			$('#g_total').text((updateGrandtotalBoth() + veh_grand_total));
			calculateVehicleExtraKmCharges();
			return;
		}

		// **STATIC MODE: Propagate rate change to ALL rooms of the same type across ALL nights**
		console.log('Static mode - Propagating rate change for first room');
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

		// Determine which rate field was changed
		var fieldType = fieldId.replace(prefix, '').split(`${count}${night}${roomIndex}`)[0];

		console.log('Field Type:', fieldType, 'Total Nights:', no_of_night);

		// Loop through ALL nights
		for (let n = 1; n <= no_of_night; n++) {
			// Get total double and single rooms for this night
			var totalDoubleRooms = parseInt($(`#double${count}${n}`).val()) || 0;
			var totalSingleRooms = parseInt($(`#single${count}${n}`).val()) || 0;

			console.log(`Night ${n}: Total double rooms = ${totalDoubleRooms}, Total single rooms = ${totalSingleRooms}`);

			// Calculate room index range based on type
			var startIndex = roomType === 'double' ? 1 : totalDoubleRooms + 1;
			var endIndex = roomType === 'double' ? totalDoubleRooms : totalDoubleRooms + totalSingleRooms;

			console.log(`Propagating ${roomType} room rates from index ${startIndex} to ${endIndex} for night ${n}`);

			// Loop through rooms of the same type for this night
			for (let r = startIndex; r <= endIndex; r++) {
				// Skip the current room that user is changing
				if (n === night && r === roomIndex) {
					console.log('Skipping current room - Night:', n, 'Room:', r);
					continue;
				}

				var otherRid = `${count}${n}${r}`;
				var otherFieldId = `${prefix}${fieldType}${otherRid}`;

				// **CHECK: Ensure the target field exists**
				var $otherField = $(`#${otherFieldId}`);
				if ($otherField.length > 0) {
					console.log(`Propagating value ${value} to field ${otherFieldId}`);
					$otherField.val(value);
					updateRoomTotals(count, n, r);
				} else {
					console.warn(`Field ${otherFieldId} not found - room ${r} may not exist for night ${n}`);
				}
			}
		}

		// Update totals for the current room
		updateRoomTotals(count, night, roomIndex);

		// Update card and overall totals
		var singleCardTotal = updateGrandtotalBoth(count);
		var veh_grand_total = get_veh_grand_total();
		$(`#loc_total${count}`).text(singleCardTotal + " + " + veh_grand_total);
		$('#v_total').text(veh_grand_total);
		$('#g_total').text((updateGrandtotalBoth() + veh_grand_total));
		calculateVehicleExtraKmCharges();

		console.log('Rate propagation complete');
	});

	// Add this function to generate vehicle summary section
	// 1. Update generateVehicleSummary function to add refresh button and extra km rate column
	// function generateVehicleSummary(count, no_of_night, vehicle_models) {
	// 	// Build night labels with vehicle details
	// 	var nightLabels = '';
	// 	for (let i = 1; i <= no_of_night; i++) {
	// 		var vFromTo = $(`#v_from_to${count}${i}`).text().trim();
	// 		if (vFromTo && vFromTo !== '') {
	// 			vFromTo = vFromTo.replace(/^\s*-\s*/, '');
	// 			nightLabels += vFromTo;
	// 		} else {
	// 			nightLabels += `N${i}`;
	// 		}
	// 		if (i < no_of_night) {
	// 			nightLabels += ' + ';
	// 		}
	// 	}

	// 	var summaryHtml = `
	//     <div class="vehicle-summary-section mt-4" id="vehicle-summary-${count}">
	//         <h5 style="color:#003300; text-align: center;" id="vehicle-summary-header-${count}">
	//             <a href="#" class="refresh-vehicle-summary" data-count="${count}" style="font-size: 16px; color: #003300; margin-right: 10px;" title="Refresh Vehicle Data">
	//                 <i class="fa fa-refresh"></i>
	//             </a>
	//             Vehicle Summary (${nightLabels})
	//         </h5>
	//         <div class="card p-3 mb-3">
	//             <div class="container-fluid px-2">
	//                 <div class="row mt-2 single_row">
	//                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Vehicle Model</b></div>
	//                     </div>
	//                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Vehicle Count</b></div>
	//                     </div>
	//                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Total Days</b></div>
	//                     </div>
	//                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Daily Rent</b></div>
	//                     </div>
	//                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Total Distance</b></div>
	//                     </div>
	//                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Extra KM Rate</b></div>
	//                     </div>
	//                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Total Extra KM</b></div>
	//                     </div>
	//                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                         <div class="teams-rank"><b>Grand Total</b></div>
	//                     </div>
	//                 </div>`;

	// 	$.each(vehicle_models, function(vindex, vmodel) {
	// 		summaryHtml += `
	//         <div class="row mt-2 single_row align-items-center">
	//             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_model_name]" value="${vmodel.vehicle_model_name}" class="form-control input-sm" readonly>
	//                 <input type="hidden" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_type_id]" value="${vmodel.vehicle_type_id}">
	//             </div>
	//             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_count]" value="${vmodel.vehicle_count}" class="form-control input-sm" readonly>
	//             </div>
	//             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_days]" id="summary_days_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
	//             </div>
	//             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][daily_rent]" id="summary_rent_${count}_${vindex}" value="0" class="form-control input-sm summary-daily-rent" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
	//             </div>
	//             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_distance]" id="summary_distance_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
	//             </div>
	//             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][extra_km_rate]" id="summary_extra_km_rate_${count}_${vindex}" value="0" class="form-control input-sm summary-extra-km-rate" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
	//             </div>
	//             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_extra_km]" id="summary_extra_km_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
	//             </div>
	//             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
	//                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][grand_total]" id="summary_total_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
	//             </div>
	//         </div>`;
	// 	});

	// 	summaryHtml += `
	//         <div class="row mt-3">
	//             <div class="col-12 d-flex justify-content-end">
	//                 <div class="col-xl-2 col-sm-12 col-md-2">
	//                     <div class="teams-rank"><b>Overall Vehicle Total</b></div>
	//                     <input type="text" name="addloc[${count}][vehicle_summary_total]" id="summary_overall_total_${count}" value="0" class="form-control input-sm" readonly>
	//                 </div>
	//             </div>
	//         </div>
	//     </div>
	// 	</div>
	// 	</div>`;

	// 	return summaryHtml;
	// }

	// function generateVehicleSummary(count, no_of_night, vehicle_models) {
	// 	// **ADD: Remove any existing summary first (defensive check)**
	// 	$(`#vehicle-summary-${count}`).remove();

	// 	// Build night labels with vehicle details
	// 	var nightLabels = '';
	// 	for (let i = 1; i <= no_of_night; i++) {
	// 		var vFromTo = $(`#v_from_to${count}${i}`).text().trim();
	// 		if (vFromTo && vFromTo !== '') {
	// 			vFromTo = vFromTo.replace(/^\s*-\s*/, '');
	// 			nightLabels += vFromTo;
	// 		} else {
	// 			nightLabels += `N${i}`;
	// 		}
	// 		if (i < no_of_night) {
	// 			nightLabels += ' + ';
	// 		}
	// 	}

	// 	var summaryHtml = `
    //     <div class="vehicle-summary-section mt-4" id="vehicle-summary-${count}">
    //         <h5 style="color:#003300; text-align: center;" id="vehicle-summary-header-${count}">
    //             <a href="#" class="refresh-vehicle-summary" data-count="${count}" style="font-size: 16px; color: #003300; margin-right: 10px;" title="Refresh Vehicle Data">
    //                 <i class="fa fa-refresh"></i>
    //             </a>
    //             Vehicle Summary (${nightLabels})
    //         </h5>
    //         <div class="card p-3 mb-3">
    //             <div class="container-fluid px-2">
    //                 <div class="row mt-2 single_row">
    //                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Vehicle Model</b></div>
    //                     </div>
    //                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Vehicle Count</b></div>
    //                     </div>
    //                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Total Days</b></div>
    //                     </div>
    //                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Daily Rent</b></div>
    //                     </div>
    //                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Total Distance</b></div>
    //                     </div>
    //                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Extra KM Rate</b></div>
    //                     </div>
    //                     <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Total Extra KM</b></div>
    //                     </div>
    //                     <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                         <div class="teams-rank"><b>Grand Total</b></div>
    //                     </div>
    //                 </div>`;

	// 	$.each(vehicle_models, function(vindex, vmodel) {
	// 		summaryHtml += `
    //         <div class="row mt-2 single_row align-items-center">
    //             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_model_name]" value="${vmodel.vehicle_model_name}" class="form-control input-sm" readonly>
    //                 <input type="hidden" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_type_id]" value="${vmodel.vehicle_type_id}">
    //             </div>
    //             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][vehicle_count]" value="${vmodel.vehicle_count}" class="form-control input-sm" readonly>
    //             </div>
    //             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_days]" id="summary_days_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
    //             </div>
    //             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][daily_rent]" id="summary_rent_${count}_${vindex}" value="0" class="form-control input-sm summary-daily-rent" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
    //             </div>
    //             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_distance]" id="summary_distance_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
    //             </div>
    //             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][extra_km_rate]" id="summary_extra_km_rate_${count}_${vindex}" value="0" class="form-control input-sm summary-extra-km-rate" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
    //             </div>
    //             <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][total_extra_km]" id="summary_extra_km_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
    //             </div>
    //             <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
    //                 <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][grand_total]" id="summary_total_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
    //             </div>
    //         </div>`;
	// 	});

	// 	summaryHtml += `
    //                 <div class="row mt-3">
    //                     <div class="col-12 d-flex justify-content-end">
    //                         <div class="col-xl-2 col-sm-12 col-md-2">
    //                             <div class="teams-rank"><b>Overall Vehicle Total</b></div>
    //                             <input type="text" name="addloc[${count}][vehicle_summary_total]" id="summary_overall_total_${count}" value="0" class="form-control input-sm" readonly>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>`;

	// 	return summaryHtml;
	// }
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
            <h5 style="color:#003300; text-align: center; display: flex; align-items: center; justify-content: center;" id="vehicle-summary-header-${count}">
                <a href="#" class="refresh-vehicle-summary" data-count="${count}" style="font-size: 16px; color: #003300; margin-right: 10px; position: absolute; left: 0;" title="Refresh Vehicle Data">
                    <i class="fa fa-refresh"></i>
                </a>
                <span style="flex: 1;">Vehicle Summary (${nightLabels})</span>
            </h5>
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
                    <input type="text" name="addloc[${count}][vehicle_summary][${vindex}][extra_km_rate]" id="summary_extra_km_rate_${count}_${vindex}" value="0" class="form-control input-sm summary-extra-km-rate" data-count="${count}" data-vindex="${vindex}" data-vehicle-type="${vmodel.vehicle_type_id}" maxlength="6">
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
	function updateVehicleSummary(count) {
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required != 1) return;

		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

		console.log('Updating vehicle summary for card:', count, 'Nights:', no_of_night);

		if (no_of_night < 1) {
			$(`#vehicle-summary-${count}`).hide();
			return;
		}

		var showSummary = !getIsDynamic();
		if (showSummary) {
			$(`#vehicle-summary-${count}`).show();
		}

		// Update header with actual vehicle details
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
		$(`#vehicle-summary-header-${count}`).html(`
        <a href="#" class="refresh-vehicle-summary" data-count="${count}" style="font-size: 16px; color: #003300; margin-right: 10px;" title="Refresh Vehicle Data">
            <i class="fa fa-refresh"></i>
        </a>
        Vehicle Summary (${nightLabels})
    `);

		var overallTotal = 0;

		$.each(vehicle_models, function(vindex, vmodel) {
			var totalDays = 0;
			var dailyRent = 0;
			var totalDistance = 0;
			var totalExtraKm = 0;
			var extraKmRate = 0;
			var totalAmount = 0;

			// Loop through all nights and sum up values
			for (let night = 1; night <= no_of_night; night++) {
				var vid = `${count}${night}${vmodel.vehicle_type_id}`;

				var dayRent = parseFloat($(`#day_rent${vid}`).val()) || 0;
				var distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
				var extraKm = parseFloat($(`#extra_kilometer${vid}`).val()) || 0;
				var vehTotal = parseFloat($(`#veh_total${vid}`).val()) || 0;
				var kmRate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;

				console.log(`Night ${night}, Vehicle ${vindex}:`, {
					dayRent,
					distance,
					extraKm,
					vehTotal,
					kmRate
				});

				if (dayRent > 0 || distance > 0) {
					totalDays++;
				}

				// For daily rent, just take the first night's value (they should all be same in static mode)
				if (night === 1 || dailyRent === 0) {
					dailyRent = dayRent;
				}

				// Get extra km rate from first night
				if (night === 1) {
					extraKmRate = kmRate;
				}

				totalDistance += distance;
				totalExtraKm += extraKm;
				totalAmount += vehTotal;
			}

			console.log(`Summary for Vehicle ${vindex}:`, {
				totalDays,
				dailyRent,
				totalDistance,
				totalExtraKm,
				extraKmRate,
				totalAmount
			});

			// Update summary fields - don't overwrite if user is currently editing
			var $rentField = $(`#summary_rent_${count}_${vindex}`);
			var $rateField = $(`#summary_extra_km_rate_${count}_${vindex}`);

			// Only update if not focused (user not editing)
			if (!$rentField.is(':focus')) {
				$rentField.val(dailyRent);
			}
			if (!$rateField.is(':focus')) {
				$rateField.val(extraKmRate);
			}

			$(`#summary_days_${count}_${vindex}`).val(totalDays);
			$(`#summary_distance_${count}_${vindex}`).val(totalDistance);
			$(`#summary_extra_km_${count}_${vindex}`).val(totalExtraKm);
			$(`#summary_total_${count}_${vindex}`).val(totalAmount);

			overallTotal += totalAmount;
		});

		// Update overall total
		$(`#summary_overall_total_${count}`).val(overallTotal.toFixed(2));

		console.log('Overall vehicle total:', overallTotal);
	}

	// Show alert function
	function showAlert(type, message) {
		var iconClass = type === 'success' ? 'fe-check-circle' :
			type === 'danger' ? 'fe-alert-triangle' :
			type === 'warning' ? 'fe-alert-circle' :
			'fe-info';

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

	// Modified updateVehicleTotals function
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
	if (typeof getIsDynamic !== 'function') {
		function getIsDynamic() {
			// Check if checkbox exists and return its state
			var $checkbox = $('#dynamic_nights_checkbox');
			if ($checkbox.length > 0) {
				return $checkbox.is(':checked');
			}
			// Default to false if checkbox doesn't exist
			return false;
		}
	}

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

	// Also update when nightly details are updated
	// function updateNightlyDetails(count) {
	// 	var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
	// 	var checkinDate = $(`#checkin${count}`).val();
	// 	var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
	// 	var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
	// 	var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
	// 	var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
	// 	var nightlyDetails = $(`#nightly-details${count}`);
	// 	var currentNights = nightlyDetails.find('.night-section').length;

	// 	// Update breadcrumb with number of nights
	// 	$(`#span_night_id${count}`).text(no_of_night > 0 ? no_of_night : '');

	// 	if (no_of_night < 1) {
	// 		nightlyDetails.empty();
	// 		$(`#vehicle-summary-${count}`).remove();
	// 		updateGrandtotalBoth();
	// 		get_veh_grand_total();
	// 		return;
	// 	}

	// 	// Add new nights if increased
	// 	for (let night = currentNights + 1; night <= no_of_night; night++) {
	// 		var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, checkinDate);
	// 		nightlyDetails.append(nightlyHtml);
	// 		var commonOptions = $(`#roomcat_common${count}`).html();
	// 		$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
	// 			$(this).html(commonOptions);
	// 		});
	// 		$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();
	// 	}

	// 	// Remove extra nights if decreased
	// 	if (no_of_night < currentNights) {
	// 		for (let night = currentNights; night > no_of_night; night--) {
	// 			nightlyDetails.find(`.night-section[data-night="${night}"]`).remove();
	// 		}
	// 	}

	// 	// Add or update vehicle summary section
	// 	if (is_vehicle_required == 1) {
	// 		// Remove existing summary to regenerate with updated night labels
	// 		$(`#vehicle-summary-${count}`).remove();
	// 		var summaryHtml = generateVehicleSummary(count, no_of_night, vehicle_models);
	// 		nightlyDetails.append(summaryHtml);
	// 		updateVehicleSummary(count);
	// 	}

	// 	// Set individual meal plans based on common meal plan
	// 	var commonMeal = $(`#mealplan${count}`).val();
	// 	if (commonMeal) {
	// 		$(`#nightly-details${count} .mp_row_change`).val(commonMeal).trigger('change');
	// 	}
	// 	var commonRoom = $(`#roomcat_common${count}`).val();
	// 	if (commonRoom) {
	// 		$(`#nightly-details${count} .room_cat_change`).val(commonRoom).trigger('change');
	// 	}

	// 	// Update totals
	// 	updateGrandtotalBoth();
	// 	get_veh_grand_total();

	// 	// Toggle visibility after updating nights
	// 	toggleNightsVisibility();
	// 	calculateVehicleExtraKmCharges();
	// 	// $('.load_vehs_click').trigger('click');
	// }

	// Function to update room totals for a specific room and night
	function updateRoomTotals(count, night, roomIndex) {
		var rid = `${count}${night}${roomIndex}`;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;
		var double_qty = parseInt($(`#double${count}${night}`).val()) || 0;
		var single_qty = parseInt($(`#single${count}${night}`).val()) || 0;

		if ($(`#d_adult_rate${rid}`).length > 0) {
			// Double room
			var d_adult_rate = parseFloat($(`#d_adult_rate${rid}`).val()) || 0;
			var d_child_rate = parseFloat($(`#d_child_rate${rid}`).val()) || 0;
			var d_child_wb_rate = parseFloat($(`#d_child_wb_rate${rid}`).val()) || 0;
			var d_extra_bed_rate = parseFloat($(`#d_extra_bed_rate${rid}`).val()) || 0;
			$(`#d_total_rate${rid}`).val(d_adult_rate);
			var dd_total = double_qty * d_adult_rate + no_of_ch * d_child_rate + no_of_cw * d_child_wb_rate + no_of_extra * d_extra_bed_rate;
			$(`#dd_total_rate${count}${night}`).val(dd_total);
		} else if ($(`#s_adult_rate${rid}`).length > 0) {
			// Single room
			var s_adult_rate = parseFloat($(`#s_adult_rate${rid}`).val()) || 0;
			var s_child_rate = parseFloat($(`#s_child_rate${rid}`).val()) || 0;
			var s_child_wb_rate = parseFloat($(`#s_child_wb_rate${rid}`).val()) || 0;
			var s_extra_bed_rate = parseFloat($(`#s_extra_bed_rate${rid}`).val()) || 0;
			$(`#s_total_rate${rid}`).val(s_adult_rate);
			var ss_total = single_qty * s_adult_rate + no_of_ch * s_child_rate + no_of_cw * s_child_wb_rate + no_of_extra * s_extra_bed_rate;
			$(`#ss_total_rate${count}${night}`).val(ss_total);
		}

		// Update overall location total
		updateGrandtotalBoth();
	}

	// Modified updateNightlyDetails - add summary generation
	// function updateNightlyDetails(count) {
	// 	var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
	// 	var checkinDate = $(`#checkin${count}`).val();
	// 	var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
	// 	var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
	// 	var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
	// 	var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
	// 	var nightlyDetails = $(`#nightly-details${count}`);
	// 	var currentNights = nightlyDetails.find('.night-section').length;

	// 	// Update breadcrumb with number of nights
	// 	$(`#span_night_id${count}`).text(no_of_night > 0 ? no_of_night : '');

	// 	if (no_of_night < 1) {
	// 		nightlyDetails.empty();
	// 		$(`#vehicle-summary-${count}`).remove();
	// 		updateGrandtotalBoth();
	// 		get_veh_grand_total();
	// 		return;
	// 	}

	// 	// Add new nights if increased
	// 	for (let night = currentNights + 1; night <= no_of_night; night++) {
	// 		var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, checkinDate);
	// 		nightlyDetails.append(nightlyHtml);
	// 		var commonOptions = $(`#roomcat_common${count}`).html();
	// 		$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
	// 			$(this).html(commonOptions);
	// 		});
	// 		$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();
	// 	}

	// 	// Remove extra nights if decreased
	// 	if (no_of_night < currentNights) {
	// 		for (let night = currentNights; night > no_of_night; night--) {
	// 			nightlyDetails.find(`.night-section[data-night="${night}"]`).remove();
	// 		}
	// 	}

	// 	// Add or update vehicle summary section
	// 	if (is_vehicle_required == 1) {
	// 		// Remove existing summary to regenerate with updated night labels
	// 		$(`#vehicle-summary-${count}`).remove();
	// 		var summaryHtml = generateVehicleSummary(count, no_of_night, vehicle_models);
	// 		nightlyDetails.append(summaryHtml);
	// 		updateVehicleSummary(count);
	// 	}

	// 	// Set individual meal plans based on common meal plan
	// 	var commonMeal = $(`#mealplan${count}`).val();
	// 	if (commonMeal) {
	// 		$(`#nightly-details${count} .mp_row_change`).val(commonMeal).trigger('change');
	// 	}
	// 	var commonRoom = $(`#roomcat_common${count}`).val();
	// 	if (commonRoom) {
	// 		$(`#nightly-details${count} .room_cat_change`).val(commonRoom).trigger('change');
	// 	}

	// 	// Update totals
	// 	updateGrandtotalBoth();
	// 	get_veh_grand_total();

	// 	// Toggle visibility after updating nights
	// 	toggleNightsVisibility();
	// 	calculateVehicleExtraKmCharges();
	// 	// $('.load_vehs_click').trigger('click');
	// }

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

		// Toggle visibility after updating nights
		toggleNightsVisibility();
		calculateVehicleExtraKmCharges();
	}


	// Also update the vehicle load callback to refresh summary
	$(document).on('click', '.load_vehs_click', function() {
		var count = $(this).attr('data-id');
		var night = $(this).attr('data-night');
		// updateVehicleSummary(count);
		setTimeout(function() {
			updateVehicleSummary(count);
		}, 500);
	});

	// Function to toggle visibility of nights based on checkbox
	function toggleNightsVisibility() {
		var showAll = getIsDynamic(); // true if checked (dynamic), false otherwise

		$('.location-card').each(function() {
			var $locationCard = $(this);
			var count = $locationCard.attr('data-index');

			// CRITICAL: Force location card visible at start
			$locationCard.show().css('display', 'block');

			// Also ensure the nightly-details container is visible
			$(`#nightly-details${count}`).show().css('display', 'block');

			var noOfNight = parseInt($(`#no_of_night${count}`).val()) || 0;

			// If no nights specified, ensure card stays visible
			if (noOfNight === 0) {
				$locationCard.show().css('display', 'block');
				$(`#nightly-details${count}`).show().css('display', 'block');
				return; // Skip processing if no nights
			}

			$(`#nightly-details${count} .night-section`).each(function() {
				var $nightSection = $(this);
				var night = parseInt($nightSection.attr('data-night'));

				// CRITICAL: Hide nights beyond the current no_of_night
				if (night > noOfNight) {
					$nightSection.hide();
					return;
				}

				if (night > 1) {
					if (showAll) {
						// Show everything for nights > 1 when dynamic
						$nightSection.show();
					} else {
						// Hide entire night section when not dynamic
						$nightSection.hide();
					}
				} else {
					// Night 1 - ALWAYS show the section
					$nightSection.show();

					if (!showAll) {
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

						// Static mode: Show quantity and adjust totals for first visible rows
						var $firstDoubleRow = $nightSection.find('.row.mt-2.align-items-center').filter(function() {
							return $(this).find('input[id^="d_adult_rate"]').length > 0;
						}).first();
						if ($firstDoubleRow.length) {
							var $roomTypeColDouble = $firstDoubleRow.find('.room-type-col');
							$roomTypeColDouble.show();
							var doubleQty = parseInt($(`#double${count}${night}`).val()) || 0;
							var doubleQtyInput = $roomTypeColDouble.find('input');
							doubleQtyInput.val(doubleQty);
							var ddTotal = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
							$firstDoubleRow.find('input.d_total_rate').val(ddTotal);
						}

						var $firstSingleRow = $nightSection.find('.row.mt-2.align-items-center').filter(function() {
							return $(this).find('input[id^="s_adult_rate"]').length > 0;
						}).first();
						if ($firstSingleRow.length) {
							var $roomTypeColSingle = $firstSingleRow.find('.room-type-col');
							$roomTypeColSingle.show();
							var singleQty = parseInt($(`#single${count}${night}`).val()) || 0;
							var singleQtyInput = $roomTypeColSingle.find('input');
							singleQtyInput.val(singleQty);
							var ssTotal = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
							$firstSingleRow.find('input.s_total_rate').val(ssTotal);
						}

					} else {
						// Dynamic mode: Show everything in night 1, revert static modifications
						$nightSection.find('> h3').show();
						$nightSection.find('.double_row, .single_row').show(); // Show count rows
						$nightSection.find('input[id^="dd_total_rate"], input[id^="ss_total_rate"]').closest('.row').show(); // Show grand room totals
						$nightSection.find('.row.mt-2.align-items-center').show();

						// Revert room type columns to hidden and value=1
						$nightSection.find('.room-type-col').hide();
						$nightSection.find('input[id^="double"], input[id^="single"]').not(`#double${count}${night}, #single${count}${night}`).val(1);

						// Re-update per-room totals (since static may have overridden)
						for (let n = 1; n <= noOfNight; n++) {
							// Re-call updateRoomTotals for all rooms in this night to reset per-room values
							var numDouble = parseInt($(`#double${count}${n}`).val()) || 0;
							for (let i = 1; i <= numDouble; i++) {
								updateRoomTotals(count, n, i);
							}
							var numSingle = parseInt($(`#single${count}${n}`).val()) || 0;
							var doubleCount = numDouble;
							for (let i = 1; i <= numSingle; i++) {
								updateRoomTotals(count, n, doubleCount + i);
							}
						}
					}
				}
			});

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
		});

		updateGrandtotalBoth();
		get_veh_grand_total();
		// $('.load_vehs_click').trigger('click');
	}
	// Function to update vehicle totals for a specific vehicle and night
	function updateVehicleTotals(count, night, vindex) {
		var vid = `${count}${night}${vindex}`;
		var day_rent = parseFloat($(`#day_rent${vid}`).val()) || 0;
		var travel_distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
		var max_km_day = parseFloat($(`#max_km_day${vid}`).val()) || 0;
		var extra_km_rate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;
		var extra_kilometer = travel_distance > max_km_day ? travel_distance - max_km_day : 0;
		$(`#extra_kilometer${vid}`).val(extra_kilometer);
		// var veh_total = day_rent + (extra_kilometer * extra_km_rate);
		var veh_total = day_rent
		$(`#veh_total${vid}`).val(veh_total);

		// Update grand total for vehicles
		var veh_grand_total = 0;
		$(`#nightly-details${count} .night-section[data-night="${night}"] .munn${vindex}`).each(function() {
			veh_grand_total += parseFloat($(this).val()) || 0;
		});
		$(`#veh_grand_total${count}${night}`).val(veh_grand_total);

		// Update overall vehicle grand total
		get_veh_grand_total();
		calculateVehicleExtraKmCharges();
	}

	// Function to calculate total nights
	function calculateTotalNights() {
		var totalNights = 0;
		$('.no_of_night').each(function() {
			var nights = parseInt($(this).val()) || 0;
			totalNights += nights;
		});
		return totalNights;
		calculateVehicleExtraKmCharges();
	}

	// Function to calculate location count
	function calculateLocationCount() {
		var totalCount = $('.tour_plan_div .location-card').length;
		return totalCount;
		calculateVehicleExtraKmCharges();
	}

	// Function to calculate total nights up to a specific ID
	function calculateTotalNights_new(id) {
		var totalNights = 0;
		for (let i = 1; i <= parseInt(id); i++) {
			var nights = parseInt($(`#no_of_night${i}`).val()) || 0;
			totalNights += nights;
		}
		return totalNights;
		calculateVehicleExtraKmCharges();
	}

	// Remove location card and update sequence numbers
	// $(document).on("click", ".card-options-remove", function(e) {
	// 	e.preventDefault();
	// 	var card = $(this).closest(".location-card");
	// 	var removedIndex = card.index();
	// 	var bcid = card.attr("data-index");
	// 	card.remove();
	// 	$('.dyn_list li').each(function() {
	// 		if ($(this).text().trim().startsWith(bcid + ".")) {
	// 			$(this).remove();
	// 		}
	// 	});
	// 	updateSequenceNumbers();
	// 	var remainingCards = $('.tour_plan_div .location-card');
	// 	if (remainingCards.length === 0) {
	// 		$("#btn_save_tour_plan").hide();
	// 		$("#btn_savedraft_tour_plan").hide();
	// 	} else {
	// 		if (removedIndex === 0) {
	// 			var newFirstIndex = 1;
	// 			$(`#checkin${newFirstIndex}`).val(start_date);
	// 		}
	// 		remainingCards.each(function(index) {
	// 			if (index >= removedIndex) {
	// 				calculateCheckout(index + 1);
	// 			}
	// 		});
	// 	}
	// 	var totalNights = calculateTotalNights();
	// 	$('#planned_night').text(totalNights + " / ");
	// 	var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;
	// 	if (totalNights == no_of_night) {
	// 		$("#btn_save_tour_plan").show();
	// 		$('#btn_add_bt').prop('disabled', true);
	// 	} else {
	// 		$("#btn_save_tour_plan").hide();
	// 		$('#btn_add_bt').prop('disabled', false);
	// 	}
	// 	updateGrandtotalBoth();
	// 	get_veh_grand_total();
	// 	toggleNightsVisibility(); // Re-toggle after removal
	// 	calculateVehicleExtraKmCharges();
	// });

	// --- Improved card remove handler ---

	// Prefer a server-side injected start date if available, otherwise take the #checkin1 value if present.
	// Replace the PHP part with your server var if different.
	var tourStartDate = (function() {
		// Try server-provided start date (PHP). Fallbacks below prevent "undefined".
		var phpStart = '<?php echo isset($object_det[0]["check_in_date"]) ? $object_det[0]["check_in_date"] : ""; ?>';
		if (phpStart && phpStart !== '') return phpStart;

		// If the DOM has #checkin1 at load, use it
		if ($('#checkin1').length) return $('#checkin1').val();

		// final fallback: empty string (no-op)
		return '';
	})();

	// $(document).on("click", ".card-options-remove", function(e) {
	// 	e.preventDefault();

	// 	var card = $(this).closest(".location-card");

	// 	// Use data-index (sequence) if present and numeric, otherwise fallback to its position among .location-card
	// 	var removedSeqAttr = parseInt(card.attr("data-index"), 10);
	// 	var removedSeq = Number.isFinite(removedSeqAttr) ? removedSeqAttr : card.index();

	// 	// Remove card from DOM
	// 	card.remove();

	// 	// Remove matching entry in dyn_list by sequence prefix (bcid)
	// 	$('.dyn_list li').each(function() {
	// 		var txt = $(this).text().trim();
	// 		// match "N." prefix where N is the sequence
	// 		if (txt.startsWith(removedSeq + ".")) {
	// 			$(this).remove();
	// 		}
	// 	});

	// 	// Re-number remaining cards and their data-index attributes / IDs
	// 	updateSequenceNumbers(); // make sure this function reassigns data-index and ids consistently

	// 	// Get remaining cards after renumber
	// 	var remainingCards = $('.tour_plan_div .location-card');

	// 	// Hide save buttons when nothing remains
	// 	if (remainingCards.length === 0) {
	// 		$("#btn_save_tour_plan, #btn_savedraft_tour_plan").hide();
	// 	} else {
	// 		// If first card was removed, ensure the new first card's check-in is start_date (if that is intended)
	// 		// Make sure start_date is defined globally or set above this script
	// 		if (removedSeq === 1) {
	// 			var newFirstSeq = 1;
	// 			if (typeof start_date !== 'undefined') {
	// 				$(`#checkin${newFirstSeq}`).val(start_date);
	// 			} else {
	// 				console.warn('start_date is not defined; cannot reset first checkin.');
	// 			}
	// 		}

	// 		// Recalculate checkout for every remaining card (safer than conditionally using removed index)
	// 		remainingCards.each(function(i) {
	// 			var seq = i + 1; // sequence is 1-based after updateSequenceNumbers()
	// 			calculateCheckout(seq);
	// 		});
	// 	}

	// 	// Recompute totals and UI
	// 	var totalNights = calculateTotalNights();
	// 	$('#planned_night').text(totalNights + " / ");

	// 	// Use PHP injected expected nights (ensure PHP prints a numeric JS literal)
	// 	var no_of_night = <?php echo (int)$object_det[0]['no_of_night']; ?>;
	// 	if (totalNights === no_of_night) {
	// 		$("#btn_save_tour_plan").show();
	// 		$('#btn_add_bt').prop('disabled', true);
	// 	} else {
	// 		$("#btn_save_tour_plan").hide();
	// 		$('#btn_add_bt').prop('disabled', false);
	// 	}

	// 	// Update grand totals and vehicle totals AFTER calculateTotalNights
	// 	updateGrandtotalBoth();
	// 	get_veh_grand_total();
	// 	toggleNightsVisibility();
	// 	calculateVehicleExtraKmCharges();
	// });

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
			var isRecalculating = true;

			remainingCards.each(function(i) {
				var seq = i + 1; // after updateSequenceNumbers() we assume sequence is 1-based and contiguous

				// **IMPORTANT: Clear vehicle summaries before recalculation**
				if (i === 0) {
					// Only on first iteration, clean all vehicle summaries
					remainingCards.each(function(j) {
						var cardSeq = j + 1;
						$(`#vehicle-summary-${cardSeq}`).remove();
						$(`#nightly-details${cardSeq}`).find('.vehicle-summary-section').remove();
					});
				}

				calculateCheckout(seq);
			});

			isRecalculating = false;
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


	// --- Fixed calculateTotalNights (no unreachable code) ---
	function calculateTotalNights() {
		var totalNights = 0;
		$('.no_of_night').each(function() {
			var nights = parseInt($(this).val(), 10) || 0;
			totalNights += nights;
		});
		return totalNights;
	}


	// Handle close night button
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

			// Recalculate checkouts for each remaining card using their new sequence (safer than conditional update)
			remainingCards.each(function(i) {
				var seq = i + 1; // after updateSequenceNumbers() we assume sequence is 1-based and contiguous
				calculateCheckout(seq);
			});
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


	// Function to update sequence numbers and adjust input IDs/names
	// function updateSequenceNumbers() {
	// 	if ($('.tour_plan_div .location-card').length === 0) {
	// 		location.reload();
	// 	}
	// 	var prefixes = ['checkin', 'no_of_night', 'checkout', 'hotelcat', 'hotelid', 'roomcat_common', 'mealplan', 'no_of_adult', 'no_of_ch', 'no_of_cw', 'no_of_extra', 'no_of_pax', 'tax_status', 'own_arrange', 'tour_location_id', 'location_sequence', 'eighteen_div_d', 'eighteen_div_s', 'nightly-details', 'roomcat', 'mealplan', 'double', 'd_adult_rate', 'd_child_rate', 'd_child_wb_rate', 'd_extra_bed_rate', 'd_total_rate', 'single', 's_adult_rate', 's_child_rate', 's_child_wb_rate', 's_extra_bed_rate', 's_total_rate', 'dd_total_rate', 'ss_total_rate', 'loadvehs', 'v_from_to', 'veh_header', 'pre_to_cur', 'cur_to_dep', 'dep_to_arr', 'hub_to_arr', 'arr_to_loc', 'veh_model', 'veh_type_id', 'veh_count', 'day_rent', 'max_km_day', 'travel_distance', 'extra_kilometer', 'extra_km_rate', 'veh_total', 'veh_grand_total', 'ster_d_adult_rate', 'ster_n_d_child_rate', 'ster_d_child_rate', 'ster_n_d_child_wb_rate', 'ster_d_child_wb_rate', 'ster_n_d_extra_bed_rate', 'ster_d_extra_bed_rate', 'ster_d_total_rate', 'ster_gst_per', 'ster_g_tot', 'ster_s_adult_rate', 'ster_n_s_child_rate', 'ster_s_child_rate', 'ster_n_s_child_wb_rate', 'ster_s_child_wb_rate', 'ster_n_s_extra_bed_rate', 'ster_s_extra_bed_rate', 'ster_s_total_rate', 'ster_gst_per', 'ster_g_tot', 'hd_ster_d_id', 'hd_ster_d_adult_rate', 'hd_ster_n_d_child_rate', 'hd_ster_d_child_rate', 'hd_ster_n_d_child_wb_rate', 'hd_ster_d_child_wb_rate', 'hd_ster_n_d_extra_bed_rate', 'hd_ster_d_extra_bed_rate', 'hd_ster_d_total_rate', 'hd_ster_d_gst_per', 'hd_ster_d_g_tot', 'hd_ster_s_id', 'hd_ster_s_adult_rate', 'hd_ster_n_s_child_rate', 'hd_ster_s_child_rate', 'hd_ster_n_s_child_wb_rate', 'hd_ster_s_child_wb_rate', 'hd_ster_n_s_extra_bed_rate', 'hd_ster_s_extra_bed_rate', 'hd_ster_s_total_rate', 'hd_ster_s_gst_per', 'hd_ster_s_g_tot', 'sterling_double', 'sterling_single'];

	// 	$('.tour_plan_div .location-card').each(function(index) {
	// 		let newIndex = index + 1;
	// 		let oldIndex = $(this).attr("data-index");
	// 		let oldStr = oldIndex.toString();
	// 		let newStr = newIndex.toString();
	// 		let oldLen = oldStr.length;

	// 		$(this).attr("data-index", newIndex);
	// 		$(this).find('.card-seq').text(newIndex);

	// 		// Update IDs and Names of input fields
	// 		$(this).find('[id^="own_arrange"]').attr("id", `own_arrange${newIndex}`).attr("name", `addloc[${newIndex}][own_arrange]`);
	// 		$(this).find('[id^="tour_location_id"]').attr("id", `tour_location_id${newIndex}`).attr("name", `addloc[${newIndex}][tour_location_id]`);
	// 		$(this).find('[id^="location_sequence"]').attr("id", `location_sequence${newIndex}`).attr("name", `addloc[${newIndex}][location_sequence]`).val(newIndex);
	// 		$(this).find('[id^="checkin"]').attr("id", `checkin${newIndex}`).attr("name", `addloc[${newIndex}][checkin]`);
	// 		$(this).find('[id^="no_of_night"]').attr("id", `no_of_night${newIndex}`).attr("name", `addloc[${newIndex}][no_of_night]`).attr("oninput", `validateNumericInput(this); calculateCheckout(${newIndex}); updateNightlyDetails(${newIndex});`);
	// 		$(this).find('[id^="checkout"]').attr("id", `checkout${newIndex}`).attr("name", `addloc[${newIndex}][checkout]`);
	// 		$(this).find('[id^="hotelcat"]').attr("id", `hotelcat${newIndex}`).attr("name", `addloc[${newIndex}][hotelcat]`).attr("data-id", newIndex);
	// 		$(this).find('[id^="hotelid"]').attr("id", `hotelid${newIndex}`).attr("name", `addloc[${newIndex}][hotelid]`).attr("data-id", newIndex);
	// 		$(this).find('[id^="roomcat_common"]').attr("id", `roomcat_common${newIndex}`).attr("name", `addloc[${newIndex}][roomcat_common]`).attr("data-id", newIndex);
	// 		$(this).find('[id^="mealplan"]').attr("id", `mealplan${newIndex}`).attr("name", `addloc[${newIndex}][mealplan]`).attr("data-id", newIndex);
	// 		$(this).find('[id^="no_of_adult"]').attr("id", `no_of_adult${newIndex}`).attr("name", `addloc[${newIndex}][no_of_adult]`);
	// 		$(this).find('[id^="no_of_ch"]').attr("id", `no_of_ch${newIndex}`).attr("name", `addloc[${newIndex}][no_of_ch]`);
	// 		$(this).find('[id^="no_of_cw"]').attr("id", `no_of_cw${newIndex}`).attr("name", `addloc[${newIndex}][no_of_cw]`);
	// 		$(this).find('[id^="no_of_extra"]').attr("id", `no_of_extra${newIndex}`).attr("name", `addloc[${newIndex}][no_of_extra]`);
	// 		$(this).find('[id^="no_of_pax"]').attr("id", `no_of_pax${newIndex}`).attr("name", `addloc[${newIndex}][no_of_pax]`);
	// 		$(this).find('[id^="tax_status"]').attr("id", `tax_status${newIndex}`).attr("name", `addloc[${newIndex}][tax_status]`);
	// 		$(this).find('[id^="eighteen_div_d"]').attr("id", `eighteen_div_d${newIndex}`);
	// 		$(this).find('[id^="eighteen_div_s"]').attr("id", `eighteen_div_s${newIndex}`);
	// 		$(this).find('[id^="nightly-details"]').attr("id", `nightly-details${newIndex}`);

	// 		// Update names
	// 		$(this).find('[name]').each(function() {
	// 			var oldName = $(this).attr('name');
	// 			if (oldName) {
	// 				var newName = oldName.replace('[' + oldStr + ']', '[' + newStr + ']');
	// 				$(this).attr('name', newName);
	// 			}
	// 		});

	// 		// Update ids
	// 		$(this).find('[id]').each(function() {
	// 			var elem = $(this);
	// 			var oldId = elem.attr('id');
	// 			if (oldId) {
	// 				for (var p = 0; p < prefixes.length; p++) {
	// 					var prefix = prefixes[p];
	// 					if (oldId.startsWith(prefix)) {
	// 						var rest = oldId.substring(prefix.length);
	// 						var newId = prefix + newStr + rest.substring(oldLen);
	// 						elem.attr('id', newId);
	// 						break;
	// 					}
	// 				}
	// 			}
	// 		});

	// 		// Update data-id
	// 		$(this).find('[data-id]').each(function() {
	// 			var oldDataId = $(this).attr('data-id');
	// 			if (oldDataId) {
	// 				var newDataId = newStr + oldDataId.substring(oldLen);
	// 				$(this).attr('data-id', newDataId);
	// 			}
	// 		});

	// 		// Update data-cid
	// 		$(this).find('[data-cid]').each(function() {
	// 			$(this).attr('data-cid', newIndex);
	// 		});

	// 		// Update count-id
	// 		$(this).find('[count-id]').each(function() {
	// 			$(this).attr('count-id', newIndex);
	// 		});

	// 		// Update oninput
	// 		$(this).find('[oninput]').each(function() {
	// 			var oldOninput = $(this).attr('oninput');
	// 			if (oldOninput) {
	// 				var newOninput = oldOninput.replace(oldStr, newStr);
	// 				$(this).attr('oninput', newOninput);
	// 			}
	// 		});
	// 	});

	// 	$('.dyn_list .bc-card').each(function(index1) {
	// 		let bcIndex = index1 + 1;
	// 		$(this).attr("data-index", bcIndex);
	// 		$(this).find('.bc-card-seq').text(bcIndex);
	// 		$(this).find('[id^="span_night_id"]').attr("id", `span_night_id${bcIndex}`);
	// 		$(this).find('[id^="loc_total"]').attr("id", `loc_total${bcIndex}`);
	// 	});

	// 	$('.tour_plan_div .select2-show-search').select2('destroy');
	// 	$('.tour_plan_div .select2-show-search').select2();

	// 	var accom_grand_total = updateGrandtotalBoth();
	// 	$('#a_total').text(accom_grand_total);
	// 	var veh_grand_total = get_veh_grand_total();
	// 	$('#v_total').text(veh_grand_total);
	// 	$('#g_total').text((accom_grand_total + veh_grand_total));
	// 	toggleNightsVisibility(); // Re-toggle after update
	// 	calculateVehicleExtraKmCharges();
	// }

	function updateSequenceNumbers() {
		if ($('.tour_plan_div .location-card').length === 0) {
			location.reload();
		}

		var prefixes = ['checkin', 'no_of_night', 'checkout', 'hotelcat', 'hotelid', 'roomcat_common',
			'mealplan', 'no_of_adult', 'no_of_ch', 'no_of_cw', 'no_of_extra', 'no_of_pax',
			'tax_status', 'own_arrange', 'tour_location_id', 'location_sequence',
			'eighteen_div_d', 'eighteen_div_s', 'nightly-details',
			'roomcat', 'double', 'single',
			'd_adult_rate', 'd_child_rate', 'd_child_wb_rate', 'd_extra_bed_rate', 'd_total_rate',
			's_adult_rate', 's_child_rate', 's_child_wb_rate', 's_extra_bed_rate', 's_total_rate',
			'dd_total_rate', 'ss_total_rate',
			'loadvehs', 'v_from_to', 'veh_header', 'pre_to_cur', 'cur_to_dep', 'dep_to_arr',
			'hub_to_arr', 'arr_to_loc',
			'veh_model', 'veh_type_id', 'veh_count', 'day_rent', 'max_km_day',
			'travel_distance', 'extra_kilometer', 'extra_km_rate', 'veh_total', 'veh_grand_total',
			'ster_d_adult_rate', 'ster_n_d_child_rate', 'ster_d_child_rate',
			'ster_n_d_child_wb_rate', 'ster_d_child_wb_rate', 'ster_n_d_extra_bed_rate',
			'ster_d_extra_bed_rate', 'ster_d_total_rate', 'ster_gst_per', 'ster_g_tot',
			'ster_s_adult_rate', 'ster_n_s_child_rate', 'ster_s_child_rate',
			'ster_n_s_child_wb_rate', 'ster_s_child_wb_rate', 'ster_n_s_extra_bed_rate',
			'ster_s_extra_bed_rate', 'ster_s_total_rate',
			'hd_ster_d_id', 'hd_ster_d_adult_rate', 'hd_ster_n_d_child_rate',
			'hd_ster_d_child_rate', 'hd_ster_n_d_child_wb_rate', 'hd_ster_d_child_wb_rate',
			'hd_ster_n_d_extra_bed_rate', 'hd_ster_d_extra_bed_rate', 'hd_ster_d_total_rate',
			'hd_ster_d_gst_per', 'hd_ster_d_g_tot',
			'hd_ster_s_id', 'hd_ster_s_adult_rate', 'hd_ster_n_s_child_rate',
			'hd_ster_s_child_rate', 'hd_ster_n_s_child_wb_rate', 'hd_ster_s_child_wb_rate',
			'hd_ster_n_s_extra_bed_rate', 'hd_ster_s_extra_bed_rate', 'hd_ster_s_total_rate',
			'hd_ster_s_gst_per', 'hd_ster_s_g_tot',
			'sterling_double', 'sterling_single', 'span_night_id', 'loc_total'
		];

		$('.tour_plan_div .location-card').each(function(index) {
			let newIndex = index + 1;
			let oldIndex = $(this).attr("data-index");
			let oldStr = oldIndex.toString();
			let newStr = newIndex.toString();
			let oldLen = oldStr.length;

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

	// Function to calculate checkout date
	// function calculateCheckout(count) {
	// 	var totalDuration = <?php echo $object_det[0]['no_of_night']; ?>;
	// 	var sum = 0;
	// 	$(".no_of_night").each(function() {
	// 		let nights = parseInt($(this).val()) || 0;
	// 		sum += nights;
	// 	});
	// 	if (sum > totalDuration) {
	// 		alert("Total nights exceed the allowed duration!");
	// 		$(`#no_of_night${count}`).val('');
	// 		updateNightlyDetails(count);
	// 		updateGrandtotalBoth();
	// 		get_veh_grand_total();
	// 		var totalNights = calculateTotalNights();
	// 		$('#planned_night').text(totalNights + " / ");
	// 		if (totalNights == totalDuration) {
	// 			$("#btn_save_tour_plan").show();
	// 			$('#btn_add_bt').prop('disabled', true);
	// 		} else {
	// 			$("#btn_save_tour_plan").hide();
	// 			$('#btn_add_bt').prop('disabled', false);
	// 		}
	// 		return;
	// 	}
	// 	var checkin = document.getElementById(`checkin${count}`)?.value;
	// 	var nights = document.getElementById(`no_of_night${count}`)?.value;
	// 	var checkoutField = document.getElementById(`checkout${count}`);

	// 	if (checkin && nights) {
	// 		var checkinDate = new Date(checkin);
	// 		checkinDate.setDate(checkinDate.getDate() + parseInt(nights, 10));
	// 		var checkoutDate = checkinDate.toISOString().split('T')[0];
	// 		checkoutField.value = checkoutDate;

	// 		// Update checkin for subsequent locations
	// 		$('.tour_plan_div .location-card').each(function(index) {
	// 			if (index >= count) {
	// 				var nextIndex = index + 1;
	// 				var nextCheckinField = document.getElementById(`checkin${nextIndex}`);
	// 				var prevCheckout = document.getElementById(`checkout${nextIndex - 1}`)?.value;
	// 				if (nextCheckinField && prevCheckout) {
	// 					nextCheckinField.value = prevCheckout;
	// 				}
	// 				updateNightlyDetails(nextIndex);
	// 			}
	// 		});
	// 	}
	// 	updateNightlyDetails(count);
	// 	updateGrandtotalBoth();
	// 	get_veh_grand_total();
	// 	calculateVehicleExtraKmCharges();

	// 	var totalNights = calculateTotalNights();
	// 	$('#planned_night').text(totalNights + " / ");
	// 	if (totalNights == totalDuration) {
	// 		$("#btn_save_tour_plan").show();
	// 		$('#btn_add_bt').prop('disabled', true);
	// 	} else {
	// 		$("#btn_save_tour_plan").hide();
	// 		$('#btn_add_bt').prop('disabled', false);
	// 	}
	// }

	function calculateCheckout(count) {
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

	// Function to update accommodation grand totals
	function updateGrandtotalBoth(specificCount = null) {
		var accom_grand_total = 0;
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			if (specificCount && count != specificCount) return;
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			for (let night = 1; night <= no_of_night; night++) {
				var dd_total = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
				var ss_total = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
				accom_grand_total += dd_total + ss_total;
			}
		});
		if (!specificCount) {
			$('#a_total').text(accom_grand_total);
		}
		return accom_grand_total;
		calculateVehicleExtraKmCharges();
	}

	// Function to update vehicle grand totals
	function get_veh_grand_total() {
		var veh_grand_total = 0;
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			for (let night = 1; night <= no_of_night; night++) {
				var veh_total = parseFloat($(`#veh_grand_total${count}${night}`).val()) || 0;
				veh_grand_total += veh_total;
			}
		});
		$('#v_total').text(veh_grand_total);

		var accom_grand_total = parseFloat($('#a_total').text()) || 0;
		$('#g_total').text((accom_grand_total + veh_grand_total));

		return veh_grand_total;

	}

	// Function to allow only numeric input
	function validateNumericInput(input) {
		input.value = input.value.replace(/\D/g, '');
	}

	$(document).on('change', '.room_cat_common_change', function() {
		if (isDraftLoading) {
			console.log('Skipping meal plan change during draft load');
			return; // Early return: No propagation during load
		}

		var value = $(this).val();
		var count = $(this).attr('data-id');
		var commonOptions = $(this).html();
		// alert(commonOptions); // Get the current options from the common dropdown

		$(`#nightly-details${count} .room_cat_change`).each(function() {
			$(this).select2('destroy'); // Destroy existing Select2 to allow HTML update
			$(this).html(commonOptions); // Update options to match common
			$(this).select2(); // Reinitialize Select2
			$(this).val(value); // Set the selected value
			$(this).trigger('change'); // Trigger change to update any dependent logic (e.g., tariffs)
		});
		$('.mp_change').trigger('change');
	});

	$(document).on('change', '.mp_change', function() {
		if (isDraftLoading) {
			console.log('Skipping meal plan change during draft load');
			return; // Early return: No propagation during load
		}

		var value = $(this).val();
		var count = $(this).attr('data-id');
		$(`#nightly-details${count} .mp_row_change`).val(value).trigger('change');
	});

	// **HELPER FUNCTION: Display alerts consistently**
	function showAlert(type, message) {
		var iconClass = type === 'danger' ? 'fe-alert-triangle' :
			type === 'warning' ? 'fe-alert-circle' :
			'fe-info';

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
		var id = $(this).attr('data-id'); // Location card index (count)
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var $spinner = $('#csspinner');

		// Show spinner and disable the select
		$spinner.show();
		$(this).prop('disabled', true);

		// Reset common room category dropdown
		$(`#roomcat_common${id}`).val('').trigger('change');

		if (!hotel_id || hotel_id == '0') {
			// Clear room category dropdowns if no hotel is selected
			$(`#nightly-details${id} .room_cat_change`).each(function() {
				var $select = $(this);
				$select.html('<option value="">Select</option>').select2();
				$select.trigger('change'); // Trigger change to reset dependent fields
			});
			$(`#tax_status${id}`).val(0); // Reset tax status
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
				// Update room category dropdowns for the specific location card
				$(`#nightly-details${id} .room_cat_change`).each(function() {
					var $select = $(this);
					$select.html(data.output); // Update dropdown options
					$select.select2(); // Reinitialize Select2
					$select.trigger('change'); // Trigger change to fetch tariffs
				});

				// Update common room category dropdown with the same options
				$(`#roomcat_common${id}`).html(data.output).select2();

				// Update tax status
				$(`#tax_status${id}`).val(data.hotel_status || 0);

				// Update totals
				updateGrandtotalBoth();
				get_veh_grand_total();
				$(`#loc_total${id}`).text(updateGrandtotalBoth(id) + " + " + 0);
			},
			error: function(xhr, status, error) {
				console.error('Error fetching room categories:', error);
				// Show error alert
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

				// Reset dropdowns on error
				$(`#nightly-details${id} .room_cat_change`).each(function() {
					var $select = $(this);
					$select.html('<option value="">Select</option>').select2();
					$select.trigger('change');
				});
				$(`#roomcat_common${id}`).html('<option value="">Select</option>').select2();
				$(`#tax_status${id}`).val(0);
			},
			complete: function() {
				$spinner.hide();
				$(`#hotelid${id}`).prop('disabled', false);
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
			// Defer non-critical updates
			changeTimeout = setTimeout(() => {
				const nightIndex = rid[rid.length - 2];

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

					$(`#sterling_double${count}${nightIndex}`).empty();
					$(`#sterling_single${count}${nightIndex}`).empty();
					$(`#eighteen_div_d${count}`).empty();
					$(`#eighteen_div_s${count}`).empty();
				});

				// Defer calculation-heavy operations
				requestIdleCallback(() => {
					updateRoomTotals(count, rid[rid.length - 2], rid[rid.length - 1]);
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

		// Gather data for AJAX call (use const for better optimization)
		const ajaxData = {
			hotel_id: $(`#hotelid${count}`).val(),
			room_cat_id: room_cat_id,
			mealplan: $(`#mealplan${count}`).val(),
			checkin: $(`#checkin${count}`).val(),
			checkout: $(`#checkout${count}`).val(),
			no_of_night: $(`#no_of_night${count}`).val(),
			double: $(`#double${rid}`).val() || 0,
			single: $(`#single${rid}`).val() || 0,
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
		const night = rid[rid.length - 2];
		const roomIndex = rid[rid.length - 1];

		// Optimized HTML generation using array join (faster than string concatenation)
		const createSterlingHTML = (type, rates, counts, ridVal, tot, gst, total) => {
			const fields = [
				['Room Rate', `ster_${type}_adult_rate`, rates.room, false, type === 'd'],
				['Child', `ster_n_${type}_child_rate`, counts.child, type === 's', type === 'd', 'cls_child_count'],
				['Child Rate', `ster_${type}_child_rate`, rates.child, type === 's', type === 'd'],
				['No.Of C.WB', `ster_n_${type}_child_wb_rate`, counts.child_wb, type === 's', type === 'd', 'cls_child_wb_count'],
				['C.WBed Rate', `ster_${type}_child_wb_rate`, rates.child_wb, type === 's', type === 'd'],
				['No.Of Extra', `ster_n_${type}_extra_bed_rate`, counts.extra, type === 's', type === 'd', 'cls_extra_count'],
				['Extra Rate', `ster_${type}_extra_bed_rate`, rates.extra, type === 's', type === 'd'],
				['Room wise total', `ster_${type}_total_rate`, tot, true, false],
				['GST%', `ster_${type}_gst_per`, gst, true, false],
				['Room wise total', `ster_${type}_g_tot`, total, true, false, `sterling_${type}_grand`]
			];

			const htmlParts = ['<div class="row"><div class="col-xl-1 col-sm-12 col-md-1"></div>'];

			for (let i = 0; i < fields.length; i++) {
				const [label, id, value, readonly, hasInput, extraClass] = fields[i];
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

					// Split DOM updates into chunks for better INP
					const processUpdates = () => {
						if (ajaxData.tax_status == 1) {
							// Calculate double room values
							const counts = {
								child: values.no_of_ch > 0 ? 1 : 0,
								child_wb: values.no_of_cw > 0 ? 1 : 0,
								extra: values.no_of_extra > 0 ? 1 : 0
							};

							const tot_d = values.room_r + (counts.child * values.child_r) +
								(counts.child_wb * values.child_wb_r) + (counts.extra * values.extra_r);
							const gst = tot_d >= 7500 ? 18 : 12;
							const total_doubles = tot_d + ((gst / 100) * tot_d);

							// First frame: Update rate fields
							requestAnimationFrame(() => {
								cachedElements.rateFields.d_adult.prop("readonly", true).val(values.room_r);
								cachedElements.rateFields.d_child.prop("readonly", true).val(values.child_r);
								cachedElements.rateFields.d_child_wb.prop("readonly", true).val(values.child_wb_r);
								cachedElements.rateFields.d_extra_bed.prop("readonly", true).val(values.extra_r);
								cachedElements.d_total_rate.val(total_doubles);
							});

							// Second frame: Generate and insert HTML
							requestAnimationFrame(() => {
								const sterling_double = createSterlingHTML('d', {
										room: values.room_r,
										child: values.child_r,
										child_wb: values.child_wb_r,
										extra: values.extra_r
									},
									counts, rid, tot_d, gst, total_doubles
								);
								const ediv = createHiddenFields('d', {
										room: values.room_r,
										child: values.child_r,
										child_wb: values.child_wb_r,
										extra: values.extra_r
									},
									counts, rid, tot_d, gst, total_doubles
								);

								$(`#eighteen_div_d${count}`).html(ediv);
								$(`#sterling_double${count}${night}`).html(sterling_double);
							});

							// Handle single rooms
							if (values.nsingle > 0) {
								const tot_s = parseInt(data.s_room_tariff) || 0;
								const s_gst = tot_s >= 7500 ? 18 : 12;
								const total_singles = tot_s + ((s_gst / 100) * tot_s);

								requestAnimationFrame(() => {
									cachedElements.rateFields.s_adult.prop("readonly", true).val(tot_s);
									cachedElements.rateFields.s_child.prop("readonly", true).val(data.s_child_tariff);
									cachedElements.rateFields.s_child_wb.prop("readonly", true).val(data.s_child_wb_tariff);
									cachedElements.rateFields.s_extra_bed.prop("readonly", true).val(data.s_extra_tariff);
									cachedElements.s_total_rate.val(total_singles);

									const sterling_single = createSterlingHTML('s', {
											room: tot_s,
											child: 0,
											child_wb: 0,
											extra: 0
										}, {
											child: 0,
											child_wb: 0,
											extra: 0
										},
										rid, tot_s, s_gst, total_singles
									);
									const sdiv = createHiddenFields('s', {
											room: tot_s,
											child: 0,
											child_wb: 0,
											extra: 0
										}, {
											child: 0,
											child_wb: 0,
											extra: 0
										},
										rid, tot_s, s_gst, total_singles
									);

									$(`#eighteen_div_s${count}`).html(sdiv);
									$(`#sterling_single${count}${night}`).html(sterling_single);
								});
							}

							// Defer calculations to idle time
							requestIdleCallback(() => {
								updateRoomTotals(count, night, roomIndex);
								calculateVehicleExtraKmCharges();
							}, {
								timeout: 100
							});
						} else {
							// Non-tax case
							requestAnimationFrame(() => {
								$(`#sterling_double${count}${night}`).empty();
								$(`#sterling_single${count}${night}`).empty();
								$(`#eighteen_div_d${count}`).empty();
								$(`#eighteen_div_s${count}`).empty();

								cachedElements.rateFields.d_adult.prop("readonly", false).val(values.room_r);
								cachedElements.rateFields.d_child.prop("readonly", false).val(values.child_r);
								cachedElements.rateFields.d_child_wb.prop("readonly", false).val(values.child_wb_r);
								cachedElements.rateFields.d_extra_bed.prop("readonly", false).val(values.extra_r);

								if (values.nsingle > 0) {
									cachedElements.rateFields.s_adult.prop("readonly", false).val(data.s_room_tariff);
									cachedElements.rateFields.s_child.prop("readonly", false).val(data.s_child_tariff);
									cachedElements.rateFields.s_child_wb.prop("readonly", false).val(data.s_child_wb_tariff);
									cachedElements.rateFields.s_extra_bed.prop("readonly", false).val(data.s_extra_tariff);
								}
							});

							requestIdleCallback(() => {
								updateRoomTotals(count, night, roomIndex);
							}, {
								timeout: 100
							});
						}

						// Final frame: Update totals
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
						}, {
							timeout: 150
						});
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

	$(document).on('click', '.tour_view', function() {
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

		$.ajax({
			url: '<?php echo site_url('Enquiry/loadTourLocation'); ?>',
			type: 'POST',
			data: {
				enquiry_header_id,
				enquiry_details_id
			},
			dataType: 'json',
			success: function(response) {
				console.log('=== TOUR VIEW LOAD RESPONSE ===');
				console.log('Full Response:', response);
				if (!response || response.length === 0) {
					showAlert('warning', 'No tour data found.');
					$('#spinner_draft').hide();
					return;
				}

				// Clear existing content
				$('.tab_con').empty();

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

				var viewHtml = '';

				// Loop through each location and create cards
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

				// Append all HTML at once
				$('.tab_con').html(viewHtml);

				// Now populate dropdowns and nightly details dynamically
				$.each(tourDetailsArray, function(index, locationData) {
					var count = index + 1;
					var main = locationData.main;
					var expansions = locationData.expansions;

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

					// Initialize Select2 (disabled)
					$(`.location-card[data-index="${count}"] .select2-show-search`).select2();

					// Trigger hotel category change to load hotels (simulate for view)
					console.log(`Triggering hotel category change for location ${count} in view mode`);
					hotelCat.trigger('change');

					// Wait for hotels to load, then set selected hotel and room categories
					setTimeout(function() {
						console.log(`\n=== SETTING HOTEL ${main.hotel_id} for location ${count} in view ===`);
						$(`#hotelid${count}`).val(main.hotel_id).trigger('change');

						// Wait for room categories to load
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

							// Generate nightly details with expansion data for view
							generateNightlyDetailsForView(count, main, expansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models);
						}, 1000); // Increased timeout to ensure room categories are loaded
					}, 1000); // Increased timeout to ensure hotels are loaded
				});

				// Update UI (no totals update needed for view, but for consistency)
				setTimeout(function() {
					// Set loading flag OFF
					isDraftLoading = false;

					$('#spinner_draft').hide();
					showAlert('success', 'Tour details loaded successfully!');
					$('#modal_tour').modal('show');
				}, 3000);
			},
			error: function(xhr, status, error) {
				console.error('Error loading tour:', error);
				showAlert('danger', 'Error loading tour data. Please try again.');
				$('#spinner_draft').hide();
				$this.prop('disabled', false);
			}
		});
	});

	// Helper function to generate nightly details from draft data for view (UPDATED - readonly)
	// Helper function to generate nightly details from draft data for view (UPDATED - readonly, fixed select2)
	function generateNightlyDetailsForView(count, main, allExpansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models) {
		console.log(`\n=== GENERATING NIGHTLY DETAILS (VIEW MODE) for location ${count} ===`);
		console.log('Main room_category_id:', main.room_category_id);
		console.log('Number of expansions:', allExpansions.length);

		var nightlyDetails = $(`#nightly-details${count}`);
		nightlyDetails.empty();
		var no_of_days = parseInt(main.no_of_days) || 0;
		var checkInDate = new Date(main.check_in_date);

		// Get option templates from the common selects (must exist)
		var commonRoomOptions = $(`#roomcat_common${count}`).html() || '<option value="">Select</option>';
		var commonMealOptions = $(`#mealplan${count}`).html() || '<option value="">Select</option>';

		// Group expansions by date
		var expansionsByDate = {};
		allExpansions.forEach(function(exp) {
			var expDate = new Date(exp.tour_expansion_date).toDateString();
			if (!expansionsByDate[expDate]) expansionsByDate[expDate] = [];
			expansionsByDate[expDate].push(exp);
		});
		console.log('Expansions grouped by date:', expansionsByDate);

		for (let night = 1; night <= no_of_days; night++) {
			var nightDate = new Date(checkInDate);
			nightDate.setDate(checkInDate.getDate() + (night - 1));
			var nightDateStr = nightDate.toDateString();
			var nightExpansions = expansionsByDate[nightDateStr] || [];

			// Reuse same UI structure from draft version
			var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, main.check_in_date);
			nightlyDetails.append(nightlyHtml);

			// Populate each room select's options and mealplan select's options BEFORE initializing Select2
			$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
				$(this).html(commonRoomOptions);
			});
			$(`#nightly-details${count} .night-section[data-night="${night}"] .mp_change`).each(function() {
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
				});
			});

			// Populate expansion data into the fields and set the selects' values (then trigger change for Select2 to update UI)
			if (nightExpansions.length > 0) {
				var numDoubles = parseInt(no_of_double_room) || 0;
				var numSingles = parseInt(no_of_single_room) || 0;
				var doubleExpansions = nightExpansions.slice(0, numDoubles);
				var singleExpansions = nightExpansions.slice(numDoubles, numDoubles + numSingles);
				var vehicleExpansion = nightExpansions[0];

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
						$(`#s_total_rate${sid}`).val(exp.single_total_rate || 0);
					}
				}

				// Vehicle data (readonly)
				if (vehicleExpansion && vehicleExpansion.vehicle_details_json) {
					try {
						var vehicleDetails = JSON.parse(vehicleExpansion.vehicle_details_json);
						$.each(vehicleDetails, function(vindex, vdata) {
							var vid = `${count}${night}${vdata.veh_type_id}`;
							$(`#day_rent${vid}`).val(vdata.day_rent || 0);
							$(`#travel_distance${vid}`).val(vdata.travel_distance || 0);
							$(`#max_km_day${vid}`).val(vdata.max_km_day || 0);
							$(`#extra_km_rate${vid}`).val(vdata.extra_km_rate || 0);
							$(`#veh_total${vid}`).val(vdata.veh_total || 0);
							var travel = parseFloat(vdata.travel_distance || 0);
							var maxkm = parseFloat(vdata.max_km_day || 0);
							$(`#extra_kilometer${vid}`).val(Math.max(0, travel - maxkm));
						});
					} catch (e) {
						console.error('Error parsing vehicle details:', e);
					}
				}
			}
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
<script>
	// Function to update accommodation grand totals (with NaN safeguards)
	function updateGrandtotalBoth(specificCount = null) {
		var accom_grand_total = 0;
		$('.tour_plan_div .location-card').each(function() {
			var count = $(this).attr('data-index');
			if (specificCount && count != specificCount) return;
			var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			for (let night = 1; night <= no_of_night; night++) {
				// Double rooms total
				var $ddElem = $(`#dd_total_rate${count}${night}`);
				if ($ddElem.length > 0) {
					var dd_total = parseFloat($ddElem.val() || '0') || 0;
					accom_grand_total += dd_total;
				}
				// Single rooms total
				var $ssElem = $(`#ss_total_rate${count}${night}`);
				if ($ssElem.length > 0) {
					var ss_total = parseFloat($ssElem.val() || '0') || 0;
					accom_grand_total += ss_total;
				}
				// If elements missing, skip (treat as 0)
			}
		});
		accom_grand_total = isNaN(accom_grand_total) ? 0 : accom_grand_total; // Final NaN guard
		if (!specificCount) {
			$('#a_total').text(accom_grand_total);
		}
		return accom_grand_total;
	}



	function updateGrandTotalDouble() {
		$('.tour_plan_div .location-card').each(function() {
			let id2 = $(this).attr('data-index');
			let grand_total_double = 0;

			$(this).find('.d_total_rate').each(function() {
				var val = parseFloat($(this).val()) || 0;
				grand_total_double += val;
			});

			$('#dd_total_rate' + id2).val(grand_total_double);
		});
	}

	function updateGrandTotalSingle() {
		$('.tour_plan_div .location-card').each(function() {
			let id2 = $(this).attr('data-index');
			let grand_total_single = 0;

			$(this).find('.s_total_rate').each(function() {
				var val = parseFloat($(this).val()) || 0;
				grand_total_single += val;
			});

			$('#ss_total_rate' + id2).val(grand_total_single);
		});
	}



	function double_total_update(rid, count) {
		// var id = $(this).attr('data-id');
		var no_of_night = parseInt($('#no_of_night' + count).val()) || 0;
		var no_of_ch = parseInt($('#no_of_ch' + count).val()) || 0;
		var no_of_cw = parseInt($('#no_of_cw' + count).val()) || 0;
		var no_of_extra = parseInt($('#no_of_extra' + count).val()) || 0;

		$('.tour_plan_div .location-card').each(function() {});
		// var double = parseInt($('#double' + id).val()) || 0;
		var room = parseInt($('#d_adult_rate' + rid).val()) || 0;
		var child = parseInt($('#d_child_rate' + rid).val()) || 0;
		var child_wb = parseInt($('#d_child_wb_rate' + rid).val()) || 0;
		var extra = parseInt($('#d_extra_bed_rate' + rid).val()) || 0;
		var tax_status = parseInt($('#tax_status' + count).val()) || 0;
		if (tax_status == 1) {
			var tot_d = room + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra);
			if (tot_d >= 7500) {
				var gst = 18;
				var gstval = (gst / 100) * tot_d;
				var total_doubles = (tot_d + gstval) * double;
				var total = total_doubles * no_of_night;
			} else {
				var total = ((double * room) + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra)) * no_of_night;
			}
		} else {
			// var total = ((double * room) + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra)) * no_of_night;
			var total = ((room) + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra)) * no_of_night;
		}
		// alert(total);
		$('#d_total_rate' + rid).val(total);

		updateGrandTotalDouble();
		updateGrandtotalBoth();
		var svalue = parseInt($('#s_total_rate' + id).val());
		//$('#loc_total'+id).text(total+svalue);
		var veh_grand_totalloc = get_veh_grand_total_byloc(id);
		var actotals = total + svalue;
		$('#loc_total' + id).text(actotals + " + " + veh_grand_totalloc);
		// var accom_grand_total = updateGrandtotalBoth();
		// $('#a_total').text(accom_grand_total);

		var veh_grand_total = get_veh_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);
	}
	$(document).on('input', '[id^="double"], [id^="d_adult_rate"], [id^="d_child_rate"], [id^="d_child_wb_rate"], [id^="d_extra_bed_rate"]', function() {
		var rid = this.id.match(/\d+/)[0];
		var count = $(this).data('count');
		double_total_update(rid, count);


	});
</script>
<script>
	function night_total_update_double(id) {
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var no_of_night = parseInt($('#no_of_night' + id).val()) || 0;
		var no_of_ch = parseInt($('#no_of_ch' + id).val()) || 0;
		var no_of_cw = parseInt($('#no_of_cw' + id).val()) || 0;
		var no_of_extra = parseInt($('#no_of_extra' + id).val()) || 0;

		var double = parseInt($('#double' + id).val()) || 0;
		var room = parseInt($('#d_adult_rate' + id).val()) || 0;
		var child = parseInt($('#d_child_rate' + id).val()) || 0;
		var child_wb = parseInt($('#d_child_wb_rate' + id).val()) || 0;
		var extra = parseInt($('#d_extra_bed_rate' + id).val()) || 0;

		var total = ((double * room) + (no_of_ch * child) + (no_of_cw * child_wb) + (no_of_extra * extra)) * no_of_night;
		$('#d_total_rate' + id).val(total);
		$('#span_night_id' + id).text(no_of_night);

		var svalue = parseInt($('#s_total_rate' + id).val());
		//$('#loc_total'+id).text(total+svalue);
		var veh_grand_totalloc = get_veh_grand_total_byloc(id);
		var actotals = total + svalue;
		$('#loc_total' + id).text(actotals + " + " + veh_grand_totalloc);
		var accom_grand_total = updateGrandtotalBoth();
		$('#a_total').text(accom_grand_total);

		var veh_grand_total = get_veh_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);
		var vid;
		var veh_count;
		var day_rent;
		var extra_kilometer;
		var extra_km_rate;
		var vtotal;
		$.each(vehicle_models, function(veh_index, veh_model) {
			vid = id + veh_model.vehicle_type_id;
			veh_count = parseInt($('#veh_count' + vid).val());
			day_rent = parseInt($('#day_rent' + vid).val());
			extra_kilometer = parseInt($('#extra_kilometer' + vid).val());
			extra_km_rate = parseInt($('#extra_km_rate' + vid).val());
			// vtotal = (veh_count * day_rent * no_of_night) + (extra_kilometer * extra_km_rate);
			vtotal = (veh_count * day_rent * no_of_night);
			$('#veh_total' + vid).val(vtotal);
		});



	}
	/*$(document).on('input', '[id^="no_of_night"]', function() {
		var id = this.id.match(/\d+/)[0];
		night_total_update_double(id);
	});*/
</script>
<script>
	function single_total_update(sid, count) {
		var no_of_night = parseInt($('#no_of_night' + count).val()) || 0;
		var single = parseInt($('#single' + count).val()) || 0;
		var room = parseInt($('#s_adult_rate' + sid).val()) || 0;
		var child = parseInt($('#s_child_rate' + sid).val()) || 0;
		var child_wb = parseInt($('#s_child_wb_rate' + sid).val()) || 0;
		var extra = parseInt($('#s_extra_bed_rate' + sid).val()) || 0;
		var tax_status = parseInt($('#tax_status' + count).val()) || 0;

		if (tax_status == 1) {
			var tot_s = room;
			if (tot_s >= 7500) {
				var gst = 18;
				var gstval = (gst / 100) * tot_s;
				var total_singles = (tot_s + gstval) * single;
				var total = total_singles * no_of_night;
			} else {
				var total = (single * room) * no_of_night;
			}
		} else {
			var total = (room) * no_of_night;
		}
		$('#s_total_rate' + sid).val(total);
		updateGrandTotalSingle();
		updateGrandtotalBoth();
		var dvalue = parseInt($('#d_total_rate' + id).val());
		//$('#loc_total'+id).text(total+dvalue);
		var veh_grand_totalloc = get_veh_grand_total_byloc(id);
		var actotals = total + dvalue;
		$('#loc_total' + id).text(actotals + " + " + veh_grand_totalloc);
		// var accom_grand_total = updateGrandtotalBoth();
		// $('#a_total').text(accom_grand_total);

		var veh_grand_total = get_veh_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);
	}
	$(document).on('input', '[id^="single"], [id^="s_adult_rate"], [id^="s_child_rate"], [id^="s_child_wb_rate"], [id^="s_extra_bed_rate"]', function() {
		var sid = this.id.match(/\d+/)[0];
		var count = $(this).data('count');
		// alert(count);
		// alert(sid);
		single_total_update(sid, count);
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
		var accom_grand_total = updateGrandtotalBoth();
		$('#a_total').text(accom_grand_total);

		var veh_grand_total = get_veh_grand_total();
		var g_total = parseInt(accom_grand_total) + parseInt(veh_grand_total);
		$('#g_total').text(g_total);
	}
	$(document).on('input', '[id^="no_of_night"]', function() {
		var id = this.id.match(/\d+/)[0];
		var cnt = parseInt(id);
		var no_of_nights = <?php echo $object_det[0]['no_of_night']; ?>;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var totalNights = calculateTotalNights();
		var loc_count = calculateLocationCount();
		$('#planned_night').text(totalNights + " / ");
		if (totalNights == no_of_nights) {
			$("#btn_save_tour_plan").show();
			$('#btn_add_bt').prop('disabled', true);
		} else {
			$("#btn_save_tour_plan").hide();
			$('#btn_add_bt').prop('disabled', false);
		}
		//night_single_total_update(id);

		var room_cat = $('#roomcat' + id).val();
		var location_sequence = $('#location_sequence' + id).val();
		if (room_cat == null || room_cat == '' || room_cat == 'undefined') {
			night_total_update_double(id);
			night_single_total_update(id);
		} else {
			$('#roomcat' + id).trigger('change');
			if (is_vehicle_required == 1) {
				setTimeout(function() {
					var $vehBtn = $('#loadvehs' + id);
					if ($vehBtn.length) {
						$vehBtn.trigger('click');
					}
				}, 100); // Adjust delay if needed
			}
		}
		if (parseInt(loc_count) > parseInt(id)) {
			let cnt = parseInt(id) + 1;
			while (cnt <= parseInt(loc_count)) {
				(function(cntVal) {
					setTimeout(function() {
						// Safely trigger only if element exists
						if ($('#no_of_night' + cntVal).length) {
							$('#no_of_night' + cntVal).trigger('input');
						}
						if ($('#roomcat' + cntVal).length) {
							$('#roomcat' + cntVal).trigger('change');
						}
						if (is_vehicle_required == 1 && $('#loadvehs' + cntVal).length) {
							$('#loadvehs' + cntVal).trigger('click');
						}
					}, cntVal * 300); // Delay increases with each count (adjust if needed)
				})(cnt);
				cnt++;
			}
		}

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

		var rent_per_day_temp = day_rent + extra_cost;
		var veh_count = parseInt($('#veh_count' + id).val());
		var no_of_night = parseInt($('#no_of_night' + cid).val());
		var total = (veh_count * rent_per_day_temp) * no_of_night;
		// $('#veh_total' + id).val(total);

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

	// Helper function to generate nightly details from draft data (UPDATED)
	// function generateNightlyDetailsFromDraft(count, main, allExpansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models) {
	// 	console.log(`\n=== GENERATING NIGHTLY DETAILS for location ${count} ===`);
	// 	console.log('Main room_category_id:', main.room_category_id);
	// 	console.log('Number of expansions:', allExpansions.length);

	// 	var nightlyDetails = $(`#nightly-details${count}`);
	// 	nightlyDetails.empty();
	// 	var no_of_days = parseInt(main.no_of_days) || 0;
	// 	var checkInDate = new Date(main.check_in_date); // For calculating night dates

	// 	// Group expansions by date (robust handling for per-room/night data)
	// 	var expansionsByDate = {};
	// 	allExpansions.forEach(function(exp) {
	// 		var expDate = new Date(exp.tour_expansion_date).toDateString(); // Normalize to date string
	// 		if (!expansionsByDate[expDate]) {
	// 			expansionsByDate[expDate] = [];
	// 		}
	// 		expansionsByDate[expDate].push(exp);
	// 	});
	// 	console.log('Expansions grouped by date:', expansionsByDate);

	// 	// Validate expansion count (assuming 1 per room per night)
	// 	var expectedExpansions = no_of_days * (parseInt(no_of_double_room) + parseInt(no_of_single_room));
	// 	if (allExpansions.length !== expectedExpansions) {
	// 		console.warn(`Expansion count mismatch for location ${count}: Got ${allExpansions.length}, expected ${expectedExpansions}. Using available data.`);
	// 	}

	// 	// Generate night sections
	// 	for (let night = 1; night <= no_of_days; night++) {
	// 		// Calculate night date for grouping
	// 		var nightDate = new Date(checkInDate);
	// 		nightDate.setDate(checkInDate.getDate() + (night - 1));
	// 		var nightDateStr = nightDate.toDateString();
	// 		var nightExpansions = expansionsByDate[nightDateStr] || []; // All expansions for this night
	// 		console.log(`\n--- Night ${night} (Date: ${nightDateStr}) ---`);
	// 		console.log('Night expansions count:', nightExpansions.length);

	// 		var nightlyHtml = generateNightHtml(count, night, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, main.check_in_date);
	// 		nightlyDetails.append(nightlyHtml);

	// 		// Populate room categories from common dropdown
	// 		var commonOptions = $(`#roomcat_common${count}`).html();
	// 		console.log(`Common room category options for night ${night}:`, commonOptions);
	// 		$(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
	// 			$(this).html(commonOptions);
	// 			console.log(`Populated room category dropdown: ${$(this).attr('id')}`);
	// 		});

	// 		// Initialize Select2
	// 		$(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();

	// 		// If expansion data exists, populate it per room (no change trigger due to isDraftLoading flag)
	// 		if (nightExpansions.length > 0) {
	// 			console.log(`Populating expansion data for night ${night}`);
	// 			var numDoubles = parseInt(no_of_double_room);
	// 			var numSingles = parseInt(no_of_single_room);
	// 			var doubleExpansions = nightExpansions.slice(0, numDoubles);
	// 			var singleExpansions = nightExpansions.slice(numDoubles, numDoubles + numSingles);
	// 			var vehicleExpansion = nightExpansions[0]; // Use first for vehicle (assumed uniform per night)

	// 			// Set room category, meal plan, rates for double rooms
	// 			for (let i = 1; i <= numDoubles; i++) {
	// 				var rid = `${count}${night}${i}`;
	// 				var exp = doubleExpansions[i - 1] || null;
	// 				console.log(`Setting double room ${i} (ID: ${rid})`);
	// 				if (exp) {
	// 					console.log(`Using expansion for double room ${i}:`, exp);
	// 					var roomCatId = exp.expansion_room_category_id;
	// 					if (!roomCatId || roomCatId === '0' || roomCatId === 0) {
	// 						roomCatId = main.room_category_id;
	// 						console.log(`Fallback to main room category for double room ${i}: ${roomCatId}`);
	// 					}
	// 					console.log(`Room category to set: ${roomCatId}`);
	// 					$(`#roomcat${rid}`).val(roomCatId).trigger('change');
	// 					console.log(`roomcat${rid} set to: ${$(`#roomcat${rid}`).val()}`);
	// 					var mealPlanId = exp.meal_plan_id;
	// 					if (!mealPlanId || mealPlanId === '0' || mealPlanId === 0) {
	// 						mealPlanId = main.meal_plan_id;
	// 						console.log(`Fallback to main meal plan for double room ${i}: ${mealPlanId}`);
	// 					}
	// 					$(`#mealplan${rid}`).val(mealPlanId).trigger('change');
	// 					$(`#d_adult_rate${rid}`).val(exp.room_rate_double);
	// 					$(`#d_child_rate${rid}`).val(exp.child_with_bed_double);
	// 					$(`#d_child_wb_rate${rid}`).val(exp.child_without_bed_double);
	// 					$(`#d_extra_bed_rate${rid}`).val(exp.extra_bed_double);
	// 				}
	// 				updateRoomTotals(count, night, i);
	// 			}

	// 			// Set room category, meal plan, rates for single rooms
	// 			for (let i = 1; i <= numSingles; i++) {
	// 				var seq = numDoubles + i;
	// 				var sid = `${count}${night}${seq}`;
	// 				var exp = singleExpansions[i - 1] || null;
	// 				console.log(`Setting single room ${i} (ID: ${sid})`);
	// 				if (exp) {
	// 					console.log(`Using expansion for single room ${i}:`, exp);
	// 					var roomCatId = exp.expansion_room_category_id;
	// 					if (!roomCatId || roomCatId === '0' || roomCatId === 0) {
	// 						roomCatId = main.room_category_id;
	// 						console.log(`Fallback to main room category for single room ${i}: ${roomCatId}`);
	// 					}
	// 					console.log(`Room category to set: ${roomCatId}`);
	// 					$(`#roomcat${sid}`).val(roomCatId).trigger('change');
	// 					console.log(`roomcat${sid} set to: ${$(`#roomcat${sid}`).val()}`);
	// 					var mealPlanId = exp.meal_plan_id;
	// 					if (!mealPlanId || mealPlanId === '0' || mealPlanId === 0) {
	// 						mealPlanId = main.meal_plan_id;
	// 						console.log(`Fallback to main meal plan for single room ${i}: ${mealPlanId}`);
	// 					}
	// 					$(`#mealplan${sid}`).val(mealPlanId).trigger('change');
	// 					$(`#s_adult_rate${sid}`).val(exp.room_rate_single);
	// 					$(`#s_child_rate${sid}`).val(exp.child_with_bed_single);
	// 					$(`#s_child_wb_rate${sid}`).val(exp.child_without_bed_single);
	// 					$(`#s_extra_bed_rate${sid}`).val(exp.extra_bed_single);
	// 				}
	// 				updateRoomTotals(count, night, seq);
	// 			}

	// 			// Populate vehicle data if exists (once per night)
	// 			if (vehicleExpansion && vehicleExpansion.vehicle_details_json) {
	// 				try {
	// 					var vehicleDetails = JSON.parse(vehicleExpansion.vehicle_details_json);
	// 					console.log(`Vehicle details for night ${night}:`, vehicleDetails);
	// 					$.each(vehicleDetails, function(vindex, vdata) {
	// 						var vid = `${count}${night}${vdata.veh_type_id}`;
	// 						$(`#day_rent${vid}`).val(vdata.day_rent || 0);
	// 						$(`#travel_distance${vid}`).val(vdata.travel_distance || 0);
	// 						$(`#max_km_day${vid}`).val(vdata.max_km_day || 0);
	// 						$(`#extra_km_rate${vid}`).val(vdata.extra_km_rate || 0);
	// 						updateVehicleTotals(count, night, vindex);
	// 					});
	// 				} catch (e) {
	// 					console.error('Error parsing vehicle details:', e);
	// 				}
	// 			}
	// 		}
	// 	}

	// 	// Add vehicle summary if required
	// 	if (is_vehicle_required == 1) {
	// 		var summaryHtml = generateVehicleSummary(count, no_of_days, vehicle_models);
	// 		nightlyDetails.append(summaryHtml);
	// 		updateVehicleSummary(count);
	// 	}

	// 	// Update totals
	// 	updateGrandtotalBoth();
	// 	get_veh_grand_total();
	// 	console.log(`=== COMPLETED NIGHTLY DETAILS for location ${count} ===\n`);
	// }

	// Helper function to generate nightly details from draft data (WITH VEHICLE HEADERS)
	// 
	// Helper function to generate nightly details from draft data (COMPLETE WITH ALL FIXES)
function generateNightlyDetailsFromDraft(count, main, allExpansions, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models) {
    console.log(`\n=== GENERATING NIGHTLY DETAILS for location ${count} ===`);
    console.log('Main room_category_id:', main.room_category_id);
    console.log('Number of expansions:', allExpansions.length);

    var nightlyDetails = $(`#nightly-details${count}`);
    nightlyDetails.empty();
    var no_of_days = parseInt(main.no_of_days) || 0;
    var checkInDate = new Date(main.check_in_date);

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

    // Validate expansion count
    var expectedExpansions = no_of_days * (parseInt(no_of_double_room) + parseInt(no_of_single_room));
    if (allExpansions.length !== expectedExpansions) {
        console.warn(`Expansion count mismatch for location ${count}: Got ${allExpansions.length}, expected ${expectedExpansions}. Using available data.`);
    }

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
        console.log(`Common room category options for night ${night}:`, commonOptions);
        $(`#nightly-details${count} .night-section[data-night="${night}"] .room_cat_change`).each(function() {
            $(this).html(commonOptions);
            console.log(`Populated room category dropdown: ${$(this).attr('id')}`);
        });

        // Initialize Select2
        $(`#nightly-details${count} .night-section[data-night="${night}"] .select2-show-search`).select2();

        // Populate expansion data per room
        if (nightExpansions.length > 0) {
            console.log(`Populating expansion data for night ${night}`);
            var numDoubles = parseInt(no_of_double_room);
            var numSingles = parseInt(no_of_single_room);
            var doubleExpansions = nightExpansions.slice(0, numDoubles);
            var singleExpansions = nightExpansions.slice(numDoubles, numDoubles + numSingles);
            var vehicleExpansion = nightExpansions[0];

            // Set room data for double rooms
            for (let i = 1; i <= numDoubles; i++) {
                var rid = `${count}${night}${i}`;
                var exp = doubleExpansions[i - 1] || null;
                console.log(`Setting double room ${i} (ID: ${rid})`);
                if (exp) {
                    console.log(`Using expansion for double room ${i}:`, exp);
                    var roomCatId = exp.expansion_room_category_id;
                    if (!roomCatId || roomCatId === '0' || roomCatId === 0) {
                        roomCatId = main.room_category_id;
                        console.log(`Fallback to main room category for double room ${i}: ${roomCatId}`);
                    }
                    console.log(`Room category to set: ${roomCatId}`);
                    $(`#roomcat${rid}`).val(roomCatId).trigger('change');
                    console.log(`roomcat${rid} set to: ${$(`#roomcat${rid}`).val()}`);
                    
                    var mealPlanId = exp.meal_plan_id;
                    if (!mealPlanId || mealPlanId === '0' || mealPlanId === 0) {
                        mealPlanId = main.meal_plan_id;
                        console.log(`Fallback to main meal plan for double room ${i}: ${mealPlanId}`);
                    }
                    $(`#mealplan${rid}`).val(mealPlanId).trigger('change');
                    $(`#d_adult_rate${rid}`).val(exp.room_rate_double);
                    $(`#d_child_rate${rid}`).val(exp.child_with_bed_double);
                    $(`#d_child_wb_rate${rid}`).val(exp.child_without_bed_double);
                    $(`#d_extra_bed_rate${rid}`).val(exp.extra_bed_double);
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
                    var roomCatId = exp.expansion_room_category_id;
                    if (!roomCatId || roomCatId === '0' || roomCatId === 0) {
                        roomCatId = main.room_category_id;
                        console.log(`Fallback to main room category for single room ${i}: ${roomCatId}`);
                    }
                    console.log(`Room category to set: ${roomCatId}`);
                    $(`#roomcat${sid}`).val(roomCatId).trigger('change');
                    console.log(`roomcat${sid} set to: ${$(`#roomcat${sid}`).val()}`);
                    
                    var mealPlanId = exp.meal_plan_id;
                    if (!mealPlanId || mealPlanId === '0' || mealPlanId === 0) {
                        mealPlanId = main.meal_plan_id;
                        console.log(`Fallback to main meal plan for single room ${i}: ${mealPlanId}`);
                    }
                    $(`#mealplan${sid}`).val(mealPlanId).trigger('change');
                    $(`#s_adult_rate${sid}`).val(exp.room_rate_single);
                    $(`#s_child_rate${sid}`).val(exp.child_with_bed_single);
                    $(`#s_child_wb_rate${sid}`).val(exp.child_without_bed_single);
                    $(`#s_extra_bed_rate${sid}`).val(exp.extra_bed_single);
                }
                updateRoomTotals(count, night, seq);
            }

            // Populate vehicle data for this night (INCLUDING VEHICLE HEADER)
            if (vehicleExpansion && vehicleExpansion.vehicle_details_json) {
                try {
                    var vehicleDetails = JSON.parse(vehicleExpansion.vehicle_details_json);
                    console.log(`Vehicle details for night ${night}:`, vehicleDetails);
                    
                    // **Set vehicle header for this night**
                    if (vehicleDetails.length > 0 && vehicleDetails[0].veh_header) {
                        var vehHeader = vehicleDetails[0].veh_header;
                        console.log(`Setting vehicle header for night ${night}: ${vehHeader}`);
                        $(`#v_from_to${count}${night}`).text(vehHeader);
                    }
                    
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
                    var mainVehicleDetails = typeof main.vehicle_details === 'string' 
                        ? JSON.parse(main.vehicle_details) 
                        : main.vehicle_details;
                    
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
        
        // **Build and set combined vehicle header for summary - CENTERED**
        var combinedHeaders = [];
        for (let night = 1; night <= no_of_days; night++) {
            var nightHeader = $(`#v_from_to${count}${night}`).text().trim();
            if (nightHeader && nightHeader !== '') {
                // Remove leading dash/hyphen if present
                nightHeader = nightHeader.replace(/^\s*-\s*/, '');
                combinedHeaders.push('(' + nightHeader + ')');
            }
        }
        
        var summaryHeaderText = '';
        if (combinedHeaders.length > 0) {
            summaryHeaderText = ' ' + combinedHeaders.join(' + ');
        }
        
        console.log('Combined vehicle header for summary:', summaryHeaderText);
        
        // Update the summary header with combined route info - CENTERED
        var $summaryHeader = $(`#vehicle-summary-header-${count}`);
        $summaryHeader.html(`
            <a href="#" class="refresh-vehicle-summary" data-count="${count}" style="font-size: 16px; color: #003300; position: absolute; left: 10px;" title="Refresh Vehicle Data">
                <i class="fa fa-refresh"></i>
            </a>
            <span style="display: block; width: 100%; padding: 0 40px;">Vehicle Summary${summaryHeaderText}</span>
        `);
        
        // Ensure parent is positioned and centered
        $summaryHeader.css({
            'position': 'relative',
            'text-align': 'center',
            'display': 'block'
        });
        
        // Update the overall total after populating
        updateVehicleSummary(count);
        console.log(`=== VEHICLE SUMMARY POPULATED for location ${count} ===`);
    }

    // Update totals
    updateGrandtotalBoth();
    get_veh_grand_total();
    console.log(`=== COMPLETED NIGHTLY DETAILS for location ${count} ===\n`);
}
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
	// function updateGrandtotalBoth() {
	// 	var grand_tot = 0;
	// 	$('.tour_plan_div .location-card').each(function(index) {
	// 		let id = index + 1;

	// 		var double_value = parseInt($('#d_total_rate' + id).val());
	// 		var single_value = parseInt($('#s_total_rate' + id).val());
	// 		grand_tot = grand_tot + double_value + single_value;

	// 	});
	// 	return grand_tot;
	// }
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
					var veh_total = parseFloat($elem.val() || '0') || 0; // Double safeguard
					veh_grand_total += veh_total;
				}
				// If element missing, skip (treat as 0)
			}
		});
		veh_grand_total = isNaN(veh_grand_total) ? 0 : veh_grand_total; // Final NaN guard
		$('#v_total').text(veh_grand_total);

		var a_total_val = parseFloat($('#a_total').text() || '0') || 0; // Safe parse of a_total
		var g_total = a_total_val + veh_grand_total;
		g_total = isNaN(g_total) ? 0 : g_total; // Final NaN guard
		$('#g_total').text(g_total);


		return veh_grand_total;
		calculateVehicleExtraKmCharges();
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

		// Validate number of nights
		if (!no_of_night || no_of_night === 'undefined') {
			alert("Please enter number of nights");
			$(`#nightly-details${count} .room_cat_change`)[0].selectedIndex = 0;
			return;
		} else if (parseInt(no_of_night) === 0) {
			alert("Number of nights must be greater than zero");
			$(`#no_of_night${count}`).val('');
			return;
		}

		// Show spinner
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
				// Calculate accommodation totals for the location card
				let accom_temp = 0;
				for (let night = 1; night <= parseInt(no_of_night); night++) {
					let total_double = parseFloat($(`#dd_total_rate${count}${night}`).val()) || 0;
					let total_single = parseFloat($(`#ss_total_rate${count}${night}`).val()) || 0;
					accom_temp += total_double + total_single;
				}

				let parsedNoOfNight = parseInt(no_of_night);

				// Update vehicle distance fields and display
				for (let night = 1; night <= parsedNoOfNight; night++) {
					// Clear all distance fields
					$(`#cur_to_dep${count}${night}`).val("");
					$(`#dep_to_arr${count}${night}`).val("");
					$(`#hub_to_arr${count}${night}`).val("");
					$(`#arr_to_loc${count}${night}`).val("");
					$(`#pre_to_cur${count}${night}`).val("");

					let v_parts = [];
					let is_first_night = night === 1;
					let is_last_night = night === parsedNoOfNight;

					// Inbound (Hub to Arrival to Location)
					let has_inbound = (data.distance_type == 1 || data.distance_type == 2);
					if (has_inbound && is_first_night) {
						$(`#hub_to_arr${count}${night}`).val(data.dist1);
						$(`#arr_to_loc${count}${night}`).val(data.dist2);
						v_parts.push(`Hub Location to Arrival - ${data.dist1} KM, Arrival to Location - ${data.dist2} KM`);
					}

					// Inter (Previous to Current)
					let inter_text = "";
					let inter_dist_val = "";
					if ((data.distance_type == 3 && is_first_night) || (data.distance_type != 1 && data.distance_type != 2 && data.distance_type != 3 && is_first_night)) {
						if (data.distance_type == 3) {
							inter_dist_val = data.dist3;
							inter_text = `Previous Location to Current Location - ${data.dist3} KM`;
						} else {
							inter_dist_val = data.total_distance;
							inter_text = `Previous Location to Current Location - ${data.total_distance} KM`;
						}
						$(`#pre_to_cur${count}${night}`).val(inter_dist_val);
						v_parts.push(inter_text);
					}

					// Outbound (Location to Departure to Hub)
					let has_outbound = (data.distance_type == 1 || data.distance_type == 3);
					if (has_outbound && is_last_night) {
						let outbound_dist1 = (data.distance_type == 1) ? data.dist3 : data.dist1;
						let outbound_dist2 = (data.distance_type == 1) ? data.dist4 : data.dist2;
						$(`#cur_to_dep${count}${night}`).val(outbound_dist1);
						$(`#dep_to_arr${count}${night}`).val(outbound_dist2);
						v_parts.push(`Location to Departure - ${outbound_dist1} KM, Departure to Hub Location - ${outbound_dist2} KM`);
					}

					// Build v_from_to_data
					let v_from_to_data;
					if (v_parts.length === 0) {
						v_from_to_data = ` - (Stay at location - 0 KM)`;
					} else {
						let prefix = " - ";
						if (data.distance_type == 3 && is_first_night && is_last_night) {
							prefix = "";
						}
						v_from_to_data = prefix + `(${v_parts.join(', ')})`;
					}

					$(`#v_from_to${count}${night}`).html(v_from_to_data);
					$(`#veh_header${count}${night}`).val(v_from_to_data);
				}

				// Store vehicle types for this count
				let vehicle_types = [];
				if (data.vehicles && data.vehicles.length > 0) {
					vehicle_types = data.vehicles.map(function(item) {
						return item.vehicle_type_id;
					});
					$(`#nightly-details${count}`).data('vehicle-types', vehicle_types);
				}

				// Vehicle calculations without carry-over
				let veh_grand_tot = 0;
				if (data.vehicles && data.vehicles.length > 0) {
					for (let night = 1; night <= parsedNoOfNight; night++) {
						let total_distance_int = 0;
						let is_first_night = night === 1;
						let is_last_night = night === parsedNoOfNight;

						// Inbound distance
						let has_inbound = (data.distance_type == 1 || data.distance_type == 2);
						if (has_inbound && is_first_night) {
							total_distance_int += parseInt(data.dist1 || 0) + parseInt(data.dist2 || 0);
						}

						// Inter distance
						let inter_dist = 0;
						if ((data.distance_type == 3 && is_first_night) || (data.distance_type != 1 && data.distance_type != 2 && data.distance_type != 3 && is_first_night)) {
							if (data.distance_type == 3) {
								inter_dist = parseInt(data.dist3 || 0);
							} else {
								inter_dist = parseInt(data.total_distance || 0);
							}
							total_distance_int += inter_dist;
						}

						// Outbound distance
						let has_outbound = (data.distance_type == 1 || data.distance_type == 3);
						if (has_outbound && is_last_night) {
							let outbound_d1 = (data.distance_type == 1) ? parseInt(data.dist3 || 0) : parseInt(data.dist1 || 0);
							let outbound_d2 = (data.distance_type == 1) ? parseInt(data.dist4 || 0) : parseInt(data.dist2 || 0);
							total_distance_int += outbound_d1 + outbound_d2;
						}

						let night_total = 0;
						$.each(data.vehicles, function(index, item) {
							let type_id = item.vehicle_type_id;
							let max_km_day = parseInt(item.max_km_day, 10);
							let extra_klm = Math.max(0, total_distance_int - max_km_day);
							let vid = `${count}${night}${type_id}`;

							let extra_cost = extra_klm * parseInt(item.extra_km_rate);
							let rate_per_day_temp = parseInt(item.rate_per_day);
							let veh_total = parseInt(item.vehicle_count) * rate_per_day_temp;

							let day_rent_id = `#day_rent${vid}`;
							let veh_count_id = `#veh_count${vid}`;
							let max_km_id = `#max_km_day${vid}`;
							let extra_km_rate_id = `#extra_km_rate${vid}`;
							let veh_total_id = `#veh_total${vid}`;
							let travel_dist_id = `#travel_distance${vid}`;
							let extra_km_id = `#extra_kilometer${vid}`;

							// Create hidden inputs if they don't exist
							if ($(day_rent_id).length === 0) $(`#nightly-details${count}`).append(`<input type="hidden" id="day_rent${vid}" data-count="${count}" data-vehicle-type="${type_id}" value="${item.rate_per_day}">`);
							else $(day_rent_id).val(item.rate_per_day).attr('data-count', count).attr('data-vehicle-type', type_id);

							if ($(veh_count_id).length === 0) $(`#nightly-details${count}`).append(`<input type="hidden" id="veh_count${vid}" value="${item.vehicle_count}">`);
							$(veh_count_id).val(item.vehicle_count);

							if ($(max_km_id).length === 0) $(`#nightly-details${count}`).append(`<input type="hidden" id="max_km_day${vid}" value="${item.max_km_day}">`);
							$(max_km_id).val(item.max_km_day);

							$(extra_km_rate_id).val(item.extra_km_rate);
							$(veh_total_id).val(veh_total);
							$(travel_dist_id).val(total_distance_int);
							$(extra_km_id).val(extra_klm);

							night_total += veh_total;
						});
						$(`#veh_grand_total${count}${night}`).val(night_total);
						veh_grand_tot += night_total;
					}
				}

				// Update location card total
				$(`#loc_total${count}`).text(`${accom_temp} + ${veh_grand_tot}`);

				// Update overall totals
				let accom_grand_total = updateGrandtotalBoth();
				$('#a_total').text(accom_grand_total);
				let veh_grand_total = get_veh_grand_total();
				$('#v_total').text(veh_grand_total);
				$('#g_total').text((accom_grand_total + veh_grand_total));
				calculateVehicleExtraKmCharges();
			},
			error: function(xhr, status, error) {
				console.error('Error fetching vehicle tariff details:', error);
				var errorAlert = `
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="fe fe-alert-triangle"></i></span>
            <span class="alert-inner--text">Error fetching vehicle tariff details. Please try again.</span>
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
			},
			complete: function() {
				$spinner.hide();
			}
		});
	}

	function calculateVehicleExtraKmCharges() {
		// Check if vehicles are required
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required != 1) {
			// console.log('Vehicles not required; skipping extra KM charges calculation.');
			return 0;
		}

		// Get all location counts
		let locationCount = $('.location-card').length;
		// console.log(`Processing ${locationCount} location cards...`);

		// Object to store totals per vehicle type (carry over across all locations/nights)
		let vehicleTotals = {};

		// Get vehicle models from PHP data
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		// console.log('Available vehicle models:', vehicle_models);

		// Map vehicle_type_id to vehicle model for reference
		let vehicleTypeMap = {};
		$.each(vehicle_models, function(index, vmodel) {
			vehicleTypeMap[vmodel.vehicle_type_id] = vmodel.vehicle_model_name;
		});

		// Loop through all locations
		for (let count = 1; count <= locationCount; count++) {
			// console.log(`--- Processing Location ${count} ---`);
			let no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			// console.log(`  Nights in Location ${count}: ${no_of_night}`);

			if (no_of_night === 0) {
				// console.log(`  No nights for Location ${count}; skipping.`);
				continue;
			}

			// Loop through all nights for this location
			for (let night = 1; night <= no_of_night; night++) {
				// console.log(`    Night ${night} in Location ${count}:`);

				// Process each vehicle type defined in vehicle_models
				$.each(vehicle_models, function(index, vmodel) {
					let type_id = vmodel.vehicle_type_id;
					let vid = `${count}${night}${type_id}`;

					// Check if inputs exist for this vehicle type on this night
					if ($(`#veh_count${vid}`).length === 0) {
						// console.log(`      Skipping Vehicle ${type_id} (${vmodel.vehicle_model_name}, ${vid}): No inputs found.`);
						return true; // Continue to next vehicle type
					}

					// Get values for this vehicle on this night
					let veh_count = parseInt($(`#veh_count${vid}`).val()) || 1;
					let travel_distance_per_veh = parseFloat($(`#travel_distance${vid}`).val()) || 0;
					let max_km_day_per_veh = parseFloat($(`#max_km_day${vid}`).val()) || 0;
					let extra_km_rate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;

					// Scale by veh_count for this night
					let total_travel_this_night = travel_distance_per_veh * veh_count;
					let total_max_this_night = max_km_day_per_veh * veh_count;

					// console.log(`      Vehicle ${type_id} (${vmodel.vehicle_model_name}, ${vid}): veh_count=${veh_count}, Per-veh Travel=${travel_distance_per_veh}km → Total Travel=${total_travel_this_night}km, Per-veh Max=${max_km_day_per_veh}km → Total Max=${total_max_this_night}km, Extra KM Rate=${extra_km_rate}`);

					// Initialize vehicle total if not exists
					if (!vehicleTotals[type_id]) {
						vehicleTotals[type_id] = {
							vehicle_model_name: vmodel.vehicle_model_name,
							total_distance: 0,
							total_max_km: 0,
							extra_km_rate: extra_km_rate
						};
					}

					// Ensure extra_km_rate consistency (use first non-zero rate encountered)
					if (vehicleTotals[type_id].extra_km_rate === 0 && extra_km_rate > 0) {
						vehicleTotals[type_id].extra_km_rate = extra_km_rate;
					}

					// Accumulate totals across all locations/nights for this vehicle type
					vehicleTotals[type_id].total_distance += total_travel_this_night;
					vehicleTotals[type_id].total_max_km += total_max_this_night;
				});
			}
		}

		// console.log('Vehicle Totals Summary:', vehicleTotals);

		// Calculate extra charges for each vehicle type (net carry-over)
		let total_extra_charges = 0;

		$.each(vehicleTotals, function(type_id, data) {
			// Calculate net difference across entire trip: total distance - total max km
			let difference = data.total_distance - data.total_max_km;

			// If positive, calculate extra charges using the type's rate
			if (difference > 0) {
				let extra_charge = difference * data.extra_km_rate;
				total_extra_charges += extra_charge;

				// console.log(`Vehicle Type ${type_id} (${data.vehicle_model_name}): Total Distance=${data.total_distance}km, Total Max=${data.total_max_km}km, Net Extra=${difference}km @ ${data.extra_km_rate}/km = Charge=${extra_charge}`);
			} else {
				// console.log(`Vehicle Type ${type_id} (${data.vehicle_model_name}): No extra KM (under by ${-difference}km)`);
			}
		});

		// Get current vehicle total (base total without extra charges)
		let base_v_total = get_veh_grand_total();
		// console.log(`Base Vehicle Total (from get_veh_grand_total): ${base_v_total}`);

		// Add extra charges to vehicle total
		let new_v_total = base_v_total + total_extra_charges;

		// Update the display
		$('#v_total').text(Math.round(new_v_total));

		// Update grand total
		let accom_total = parseFloat($('#a_total').text()) || 0;
		$('#g_total').text(Math.round(accom_total + new_v_total));

		// console.log(`Total Extra KM Charges (carry-over across all vehicle types, scaled by per-night veh_count): ${total_extra_charges}`);
		// console.log(`Updated Vehicle Total: ${new_v_total}`);
		// console.log(`Accommodation Total: ${accom_total}, Grand Total: ${accom_total + new_v_total}`);

		return total_extra_charges;
	}
	$(document).on('click', '.load_vehs_click', function() {
		let count = $(this).attr('data-id');
		let night = $(this).attr('data-night');
		$(this).attr('data-loaded', 'true');
		loadVehicles(count);
		calculateVehicleExtraKmCharges();

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
			var gst = 12;
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
			var gst = 12;
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