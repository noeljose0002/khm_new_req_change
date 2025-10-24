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
		select.input-sm + .select2-container {
    width: 100% !important; /* Force full width of parent container for responsiveness on zoom/resize */
}

select.input-sm + .select2-container .select2-selection--single {
    border: 1px solid #0c502e !important;
    border-radius: 10px !important;
    min-height: 30px !important; /* Stick with min-height for zoom flexibility */
    display: flex !important;
    align-items: center !important;
    padding-left: 8px !important;
    background-color: #fff !important;
    transition: box-shadow 0.3s ease, border-color 0.3s ease !important;
    box-sizing: border-box !important;
    width: 100% !important; /* Ensure selection matches container width */
}

/* Rendered text adjustments remain the same */
select.input-sm + .select2-container .select2-selection__rendered {
    line-height: 1.4 !important;
    font-size: 13px !important;
    color: #000 !important;
    padding: 0 !important;
    height: auto !important;
    white-space: nowrap !important; /* Prevent text wrapping if it's causing stretch issues; adjust to normal if needed */
    overflow: hidden !important; /* Hide overflow to keep it tidy on zoom */
}

/* Dropdown arrow - keep relative */
select.input-sm + .select2-container .select2-selection__arrow {
    height: 100% !important;
    top: 0 !important;
    width: 20px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    flex-shrink: 0 !important; /* Prevent arrow from shrinking on narrow zooms */
}

/* Open/Focus states unchanged */
select.input-sm + .select2.select2-container--open .select2-selection,
select.input-sm + .select2.select2-container--focus .select2-selection {
    border-color: #0c502e !important;
    box-shadow: 0 0 0 4px rgba(21, 236, 68, 0.2) !important;
}

/* Ensure dropdown itself is also responsive */
select.input-sm + .select2-container .select2-dropdown {
    width: auto !important; /* Let it match selection width naturally */
    min-width: 100% !important; /* At minimum, full width of trigger */
}

.textlef{
	margin-left:10px ;
}

/* Override form-control styles specifically for inputs inside .total-col-room */
.total-col .form-control.input-sm{
    height: 30px !important; /* Match your desired height */
    min-height: 30px !important; /* For zoom flexibility */
    border: 1px solid #0c502e !important; /* Custom border */
    border-radius: 10px !important; /* Rounded corners */
    display: flex !important;
    align-items: left !important; /* Center content vertically */
    background-color: #fff !important; /* White background */
    width: 87% !important; /* Full width stretch */
    box-sizing: border-box !important; /* Include padding/border in width */
    margin-left: 44px !important; /* Override any default margins; adjust if needed */
    padding: 0 8px !important; /* Add internal padding for text alignment */
    font-size: 13px !important; /* Small input font */

    text-align: left !important; /* Center numeric input if desired */
    /* For readonly inputs: subtle focus styles */
    &:focus {
        border-color: #0c502e !important;
        box-shadow: 0 0 0 0.2rem rgba(21, 236, 68, 0.2)!important; /* Subtle glow */
    }
}

/* Ensure the label (.teams-rank) doesn't interfere with input stretching */
.total-col .teams-rank.col-room {
    width: 100% !important;
    box-sizing: border-box !important;
    margin-bottom: 5px !important; /* Space between label and input */
    text-align: left !important;
    font-weight: bold !important;
}

/* Parent .total-col-room flex responsiveness (from previous fixes) */
 .total-col{
    margin-left: -9px !important;
    flex: 1 !important;
    min-width: 180px;
    width: auto !important;
    box-sizing: border-box !important;
    flex-basis: 0 !important;
    flex-grow: 1 !important;
    flex-shrink: 1 !important;
}

.total-col-room .form-control.input-sm{
    height: 30px !important; /* Match your desired height */
    min-height: 30px !important; /* For zoom flexibility */
    border: 1px solid #0c502e !important; /* Custom border */
    border-radius: 10px !important; /* Rounded corners */
    display: flex !important;
    align-items: left !important; /* Center content vertically */
    background-color: #fff !important; /* White background */
    width: 87% !important; /* Full width stretch */
    box-sizing: border-box !important; /* Include padding/border in width */
    margin-left: 0 !important; /* Override any default margins; adjust if needed */
    padding: 0 8px !important; /* Add internal padding for text alignment */
    font-size: 13px !important; /* Small input font */

    text-align: left !important; /* Center numeric input if desired */
    /* For readonly inputs: subtle focus styles */
    &:focus {
        border-color: #0c502e !important;
        box-shadow: 0 0 0 0.2rem rgba(21, 236, 68, 0.2)!important; /* Subtle glow */
    }
}

/* Ensure the label (.teams-rank) doesn't interfere with input stretching */
.total-col-room .teams-rank.col-room {
    width: 100% !important;
    box-sizing: border-box !important;
    margin-bottom: 5px !important; /* Space between label and input */
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




.col-room{
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
                            <div class="card-header">
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
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Room Category</b></div>
                        <select id="roomcat${rid}" name="addloc[${count}][nights][${night}][roomcat][${i}]" class="form-control select2-show-search input-sm room_cat_change" count-id="${count}" data-id="${rid}" data-night="${night}" data-room-index="${i}" required>
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
                    <div style="display:none;" class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>Double Room</b></div>
                        <input type="text" id="double${rid}" name="addloc[${count}][nights][${night}][double][${i}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${i}">
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
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <div class="col-xl col-sm-12 col-md-2 total-col">
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
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Room Category</b></div>
                        <select id="roomcat${sid}" name="addloc[${count}][nights][${night}][roomcat][${seq}]" class="form-control select2-show-search input-sm room_cat_change" count-id="${count}" data-id="${sid}" data-night="${night}" data-room-index="${seq}" required>
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
                    <div style="display:none;" class="col-xl col-sm-12 col-md-2">
                        <div class="teams-rank"><b>Single Room</b></div>
                        <input type="text" id="single${sid}" name="addloc[${count}][nights][${night}][single][${seq}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${seq}">
                    </div>
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Daily Room Rate</b></div>
                        <input type="text" id="s_adult_rate${sid}" name="addloc[${count}][nights][${night}][s_adult_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${night}, ${seq});" data-night="${night}" data-room-index="${seq}">
                    </div>
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>C.With Bed Rate</b></div>
                        <input type="text" id="s_child_rate${sid}" name="addloc[${count}][nights][${night}][s_child_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${seq}">
                    </div>
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>C.Without Bed Rate</b></div>
                        <input type="text" id="s_child_wb_rate${sid}" name="addloc[${count}][nights][${night}][s_child_wb_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${seq}">
                    </div>
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Extra Bed Rate</b></div>
                        <input type="text" id="s_extra_bed_rate${sid}" name="addloc[${count}][nights][${night}][s_extra_bed_rate][${seq}]" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" readonly data-night="${night}" data-room-index="${seq}">
                    </div>
                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Total(Single)</b></div>
                        <input type="text" id="s_total_rate${sid}" name="addloc[${count}][nights][${night}][s_total_rate][${seq}]" class="form-control input-sm s_total_rate" data-count="${count}" maxlength="6" readonly data-night="${night}" data-room-index="${seq}">
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

	// Modified function to update nightly details based on no_of_night
	// Add this function to generate vehicle summary section
	function generateVehicleSummary(count, no_of_night, vehicle_models) {
		// Build night labels with vehicle details
		var nightLabels = '';
		for (let i = 1; i <= no_of_night; i++) {
			var vFromTo = $(`#v_from_to${count}${i}`).text().trim();
			if (vFromTo && vFromTo !== '') {
				// Remove any leading " - " if present
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
			<h5 style="color:#003300; text-align: center;" id="vehicle-summary-header-${count}">Vehicle Summary (${nightLabels})</h5>
			<div class="card p-3 mb-3">
				<div class="container-fluid px-2">
					<div class="row mt-2 single_row">
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Vehicle Model</b></div>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Vehicle Count</b></div>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Total Days</b></div>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Total Daily Rent</b></div>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<div class="teams-rank"><b>Total Distance</b></div>
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
							<input type="text" value="${vmodel.vehicle_model_name}" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" value="${vmodel.vehicle_count}" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<input type="text" id="summary_days_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" id="summary_rent_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" id="summary_distance_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-2 ps-2">
							<input type="text" id="summary_extra_km_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
						</div>
						<div class="col-xl-2 col-sm-12 col-md-2 ps-2">
							<input type="text" id="summary_total_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
						</div>
					</div>`;
		});

		summaryHtml += `
					<div class="row mt-3">
						<div class="col-12 d-flex justify-content-end">
							<div class="col-xl-2 col-sm-12 col-md-2">
								<div class="teams-rank"><b>Overall Vehicle Total</b></div>
								<input type="text" id="summary_overall_total_${count}" value="0.00" class="form-control input-sm" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`;

		return summaryHtml;
	}

	// Function to update vehicle summary for a specific card
	function updateVehicleSummary(count) {
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		if (is_vehicle_required != 1) return;

		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

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
				// Remove any leading " - " if present
				vFromTo = vFromTo.replace(/^\s*-\s*/, '');
				nightLabels += vFromTo;
			} else {
				nightLabels += `N${i}`;
			}
			if (i < no_of_night) {
				nightLabels += ' + ';
			}
		}
		$(`#vehicle-summary-header-${count}`).html(`Vehicle Summary (${nightLabels})`);

		var overallTotal = 0;

		$.each(vehicle_models, function(vindex, vmodel) {
			var totalDays = 0;
			var totalRent = 0;
			var totalDistance = 0;
			var totalExtraKm = 0;
			var totalAmount = 0;

			// Loop through all nights and sum up values
			for (let night = 1; night <= no_of_night; night++) {
				var vid = `${count}${night}${vmodel.vehicle_type_id}`;

				var dayRent = parseFloat($(`#day_rent${vid}`).val()) || 0;
				var distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
				var extraKm = parseFloat($(`#extra_kilometer${vid}`).val()) || 0;
				var vehTotal = parseFloat($(`#veh_total${vid}`).val()) || 0;

				if (dayRent > 0 || distance > 0) {
					totalDays++;
				}
				totalRent += dayRent;
				totalDistance += distance;
				totalExtraKm += extraKm;
				totalAmount += vehTotal;
			}

			// Update summary fields
			$(`#summary_days_${count}_${vindex}`).val(totalDays);
			$(`#summary_rent_${count}_${vindex}`).val(totalRent);
			$(`#summary_distance_${count}_${vindex}`).val(totalDistance);
			$(`#summary_extra_km_${count}_${vindex}`).val(totalExtraKm);
			$(`#summary_total_${count}_${vindex}`).val(totalAmount);

			overallTotal += totalAmount;
		});

		// Update overall total
		$(`#summary_overall_total_${count}`).val(overallTotal);
	}

	// Modified updateVehicleTotals function - add this at the end
	function updateVehicleTotals(count, night, vindex) {
		var vid = `${count}${night}${vindex}`;
		var day_rent = parseFloat($(`#day_rent${vid}`).val()) || 0;
		var travel_distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
		var max_km_day = parseFloat($(`#max_km_day${vid}`).val()) || 0;
		var extra_km_rate = parseFloat($(`#extra_km_rate${vid}`).val()) || 0;
		var extra_kilometer = travel_distance > max_km_day ? travel_distance - max_km_day : 0;
		var v_count = parseInt($(`#veh_count${vid}`).val()) || 1;
		$(`#extra_kilometer${vid}`).val(extra_kilometer);
		// var veh_total = day_rent + (extra_kilometer * extra_km_rate);
		var veh_total = day_rent * v_count;
		$(`#veh_total${vid}`).val(veh_total);

		// Update grand total for vehicles
		var veh_grand_total = 0;
		$(`#nightly-details${count} .night-section[data-night="${night}"] .munn${vindex}`).each(function() {
			veh_grand_total += parseFloat($(this).val()) || 0;
		});
		$(`#veh_grand_total${count}${night}`).val(veh_grand_total);

		// Update vehicle summary
		updateVehicleSummary(count);

		// Update overall vehicle grand total
		get_veh_grand_total();
		calculateVehicleExtraKmCharges();
	}

	// Modified updateNightlyDetails - add summary generation
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

		// Add or update vehicle summary section
		if (is_vehicle_required == 1) {
			// Remove existing summary to regenerate with updated night labels
			$(`#vehicle-summary-${count}`).remove();
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
		// $('.load_vehs_click').trigger('click');
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
			var count = $(this).attr('data-index');

			$(`#nightly-details${count} .night-section`).each(function() {
				var $nightSection = $(this);
				var night = parseInt($nightSection.attr('data-night'));

				if (night > 1) {
					if (showAll) {
						// Show everything for nights > 1 when dynamic
						$nightSection.show();
					} else {
						// Hide entire night section when not dynamic
						$nightSection.hide();
					}
				} else {
					// Night 1 - always show the section
					$nightSection.show();

					if (!showAll) {
						// When NOT dynamic, hide specific elements in night 1

						// Hide the night count/date header
						$nightSection.find('> h3').hide();

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

					} else {
						// When dynamic, show everything in night 1
						$nightSection.find('> h3').show();
						$nightSection.find('.row.mt-2.align-items-center').show();
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
					$(`#vehicle-summary-${count}`).show();
				} else {
					// Dynamic mode: Show all vehicle details, hide Vehicle Summary
					$(`#nightly-details${count} .vehicle-details-section`).show();
					$(`#nightly-details${count} .vehicle-rows`).show();
					$(`#nightly-details${count} .vehicle-row`).show();
					$(`#vehicle-summary-${count}`).hide();
					$(`#nightly-details${count} .night-section [id^="veh_grand_total"]`)
						.closest('.row')
						.hide();

				}
			}
		});
		// $('.load_vehs_click').trigger('click');
	}

	// Function to update room totals for a specific room and night
	function updateRoomTotals(count, night, roomIndex) {
		var rid = `${count}${night}${roomIndex}`;
		var no_of_adult = parseFloat($(`#no_of_adult${count}`).val()) || 0;
		var no_of_ch = parseFloat($(`#no_of_ch${count}`).val()) || 0;
		var no_of_cw = parseFloat($(`#no_of_cw${count}`).val()) || 0;
		var no_of_extra = parseFloat($(`#no_of_extra${count}`).val()) || 0;

		var d_adult_rate = parseFloat($(`#d_adult_rate${rid}`).val()) || 0;
		var d_child_rate = parseFloat($(`#d_child_rate${rid}`).val()) || 0;
		var d_child_wb_rate = parseFloat($(`#d_child_wb_rate${rid}`).val()) || 0;
		var d_extra_bed_rate = parseFloat($(`#d_extra_bed_rate${rid}`).val()) || 0;
		var d_total = d_adult_rate + (no_of_ch * d_child_rate) + (no_of_cw * d_child_wb_rate) + (no_of_extra * d_extra_bed_rate);
		$(`#d_total_rate${rid}`).val(d_total);

		// Update grand total for double rooms
		var dd_total = 0;
		$(`#nightly-details${count} .night-section[data-night="${night}"] .d_total_rate`).each(function() {
			dd_total += parseFloat($(this).val()) || 0;
		});
		$(`#dd_total_rate${count}${night}`).val(dd_total);

		// Single room totals
		var s_adult_rate = parseFloat($(`#s_adult_rate${count}${night}${roomIndex}`).val()) || 0;
		var s_total = s_adult_rate; // Single rooms typically only consider adult rate
		$(`#s_total_rate${count}${night}${roomIndex}`).val(s_total);

		// Update grand total for single rooms
		var ss_total = 0;
		$(`#nightly-details${count} .night-section[data-night="${night}"] .s_total_rate`).each(function() {
			ss_total += parseFloat($(this).val()) || 0;
		});
		$(`#ss_total_rate${count}${night}`).val(ss_total);

		// Update overall location total
		updateGrandtotalBoth();
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
	$(document).on("click", ".card-options-remove", function(e) {
		e.preventDefault();
		var card = $(this).closest(".location-card");
		var removedIndex = card.index();
		var bcid = card.attr("data-index");
		card.remove();
		$('.dyn_list li').each(function() {
			if ($(this).text().trim().startsWith(bcid + ".")) {
				$(this).remove();
			}
		});
		updateSequenceNumbers();
		var remainingCards = $('.tour_plan_div .location-card');
		if (remainingCards.length === 0) {
			$("#btn_save_tour_plan").hide();
			$("#btn_savedraft_tour_plan").hide();
		} else {
			if (removedIndex === 0) {
				var newFirstIndex = 1;
				$(`#checkin${newFirstIndex}`).val(start_date);
			}
			remainingCards.each(function(index) {
				if (index >= removedIndex) {
					calculateCheckout(index + 1);
				}
			});
		}
		var totalNights = calculateTotalNights();
		$('#planned_night').text(totalNights + " / ");
		var no_of_night = <?php echo $object_det[0]['no_of_night']; ?>;
		if (totalNights == no_of_night) {
			$("#btn_save_tour_plan").show();
			$('#btn_add_bt').prop('disabled', true);
		} else {
			$("#btn_save_tour_plan").hide();
			$('#btn_add_bt').prop('disabled', false);
		}
		updateGrandtotalBoth();
		get_veh_grand_total();
		toggleNightsVisibility(); // Re-toggle after removal
		calculateVehicleExtraKmCharges();
	});

	// Handle close night button
	$(document).on('click', '.close-night-btn', function(e) {
		e.preventDefault();
		var night_section = $(this).closest('.night-section');
		var nightToRemove = parseInt(night_section.attr('data-night'));
		var card = $(this).closest(".location-card");
		var count = card.attr('data-index');
		var no_of_double_room = <?php echo $object_det[0]['no_of_double_room']; ?>;
		var no_of_single_room = <?php echo $object_det[0]['no_of_single_room']; ?>;
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		var checkinDate = $(`#checkin${count}`).val();

		// Collect data
		var nightData = collectAllNightData(count);

		// Clear sterling hiddens
		$(`#eighteen_div_d${count}`).empty();
		$(`#eighteen_div_s${count}`).empty();

		// Remove the specific night section
		night_section.remove();

		// Get remaining nights
		var remainingNights = [];
		for (var n in nightData) {
			if (parseInt(n) !== nightToRemove) {
				remainingNights.push(parseInt(n));
			}
		}
		remainingNights.sort(function(a, b) {
			return a - b;
		});

		// Empty nightly details
		$(`#nightly-details${count}`).empty();

		// Regenerate and populate
		var newNight = 1;
		remainingNights.forEach(function(oldNight) {
			var oldData = nightData[oldNight];
			var nightlyHtml = generateNightHtml(count, newNight, no_of_double_room, no_of_single_room, is_vehicle_required, vehicle_models, checkinDate);
			$(`#nightly-details${count}`).append(nightlyHtml);
			var commonOptions = $(`#roomcat_common${count}`).html();
			$(`#nightly-details${count} .night-section[data-night="${newNight}"] .room_cat_change`).html(commonOptions);


			// Populate data
			for (var subPath in oldData) {
				var newName = `addloc[${count}][nights][${newNight}]${subPath}`;
				var $target = $(`[name="${newName}"]`);
				if ($target.length) {
					$target.val(oldData[subPath]);
					if ($target.hasClass('select2-show-search')) {
						$target.trigger('change');
					}
				}
			}

			// Trigger changes to regenerate tariffs and sterling
			$(`#nightly-details${count} .night-section[data-night="${newNight}"] .room_cat_change`).trigger('change');
			$(`#nightly-details${count} .night-section[data-night="${newNight}"] .mp_row_change`).trigger('change');

			// Init select2
			$(`#nightly-details${count} .night-section[data-night="${newNight}"] .select2-show-search`).select2();

			newNight++;
		});

		// Update no_of_night
		$(`#no_of_night${count}`).val(remainingNights.length);

		// Update checkout and totals
		calculateCheckout(count);
		updateGrandtotalBoth();
		get_veh_grand_total();
		toggleNightsVisibility(); // Re-toggle after close
		calculateVehicleExtraKmCharges();
	});

	// Function to update sequence numbers and adjust input IDs/names
	function updateSequenceNumbers() {
		if ($('.tour_plan_div .location-card').length === 0) {
			location.reload();
		}
		var prefixes = ['checkin', 'no_of_night', 'checkout', 'hotelcat', 'hotelid', 'roomcat_common', 'mealplan', 'no_of_adult', 'no_of_ch', 'no_of_cw', 'no_of_extra', 'no_of_pax', 'tax_status', 'own_arrange', 'tour_location_id', 'location_sequence', 'eighteen_div_d', 'eighteen_div_s', 'nightly-details', 'roomcat', 'mealplan', 'double', 'd_adult_rate', 'd_child_rate', 'd_child_wb_rate', 'd_extra_bed_rate', 'd_total_rate', 'single', 's_adult_rate', 's_child_rate', 's_child_wb_rate', 's_extra_bed_rate', 's_total_rate', 'dd_total_rate', 'ss_total_rate', 'loadvehs', 'v_from_to', 'veh_header', 'pre_to_cur', 'cur_to_dep', 'dep_to_arr', 'hub_to_arr', 'arr_to_loc', 'veh_model', 'veh_type_id', 'veh_count', 'day_rent', 'max_km_day', 'travel_distance', 'extra_kilometer', 'extra_km_rate', 'veh_total', 'veh_grand_total', 'ster_d_adult_rate', 'ster_n_d_child_rate', 'ster_d_child_rate', 'ster_n_d_child_wb_rate', 'ster_d_child_wb_rate', 'ster_n_d_extra_bed_rate', 'ster_d_extra_bed_rate', 'ster_d_total_rate', 'ster_gst_per', 'ster_g_tot', 'ster_s_adult_rate', 'ster_n_s_child_rate', 'ster_s_child_rate', 'ster_n_s_child_wb_rate', 'ster_s_child_wb_rate', 'ster_n_s_extra_bed_rate', 'ster_s_extra_bed_rate', 'ster_s_total_rate', 'ster_gst_per', 'ster_g_tot', 'hd_ster_d_id', 'hd_ster_d_adult_rate', 'hd_ster_n_d_child_rate', 'hd_ster_d_child_rate', 'hd_ster_n_d_child_wb_rate', 'hd_ster_d_child_wb_rate', 'hd_ster_n_d_extra_bed_rate', 'hd_ster_d_extra_bed_rate', 'hd_ster_d_total_rate', 'hd_ster_d_gst_per', 'hd_ster_d_g_tot', 'hd_ster_s_id', 'hd_ster_s_adult_rate', 'hd_ster_n_s_child_rate', 'hd_ster_s_child_rate', 'hd_ster_n_s_child_wb_rate', 'hd_ster_s_child_wb_rate', 'hd_ster_n_s_extra_bed_rate', 'hd_ster_s_extra_bed_rate', 'hd_ster_s_total_rate', 'hd_ster_s_gst_per', 'hd_ster_s_g_tot', 'sterling_double', 'sterling_single'];

		$('.tour_plan_div .location-card').each(function(index) {
			let newIndex = index + 1;
			let oldIndex = $(this).attr("data-index");
			let oldStr = oldIndex.toString();
			let newStr = newIndex.toString();
			let oldLen = oldStr.length;

			$(this).attr("data-index", newIndex);
			$(this).find('.card-seq').text(newIndex);

			// Update IDs and Names of input fields
			$(this).find('[id^="own_arrange"]').attr("id", `own_arrange${newIndex}`).attr("name", `addloc[${newIndex}][own_arrange]`);
			$(this).find('[id^="tour_location_id"]').attr("id", `tour_location_id${newIndex}`).attr("name", `addloc[${newIndex}][tour_location_id]`);
			$(this).find('[id^="location_sequence"]').attr("id", `location_sequence${newIndex}`).attr("name", `addloc[${newIndex}][location_sequence]`).val(newIndex);
			$(this).find('[id^="checkin"]').attr("id", `checkin${newIndex}`).attr("name", `addloc[${newIndex}][checkin]`);
			$(this).find('[id^="no_of_night"]').attr("id", `no_of_night${newIndex}`).attr("name", `addloc[${newIndex}][no_of_night]`).attr("oninput", `validateNumericInput(this); calculateCheckout(${newIndex}); updateNightlyDetails(${newIndex});`);
			$(this).find('[id^="checkout"]').attr("id", `checkout${newIndex}`).attr("name", `addloc[${newIndex}][checkout]`);
			$(this).find('[id^="hotelcat"]').attr("id", `hotelcat${newIndex}`).attr("name", `addloc[${newIndex}][hotelcat]`).attr("data-id", newIndex);
			$(this).find('[id^="hotelid"]').attr("id", `hotelid${newIndex}`).attr("name", `addloc[${newIndex}][hotelid]`).attr("data-id", newIndex);
			$(this).find('[id^="roomcat_common"]').attr("id", `roomcat_common${newIndex}`).attr("name", `addloc[${newIndex}][roomcat_common]`).attr("data-id", newIndex);
			$(this).find('[id^="mealplan"]').attr("id", `mealplan${newIndex}`).attr("name", `addloc[${newIndex}][mealplan]`).attr("data-id", newIndex);
			$(this).find('[id^="no_of_adult"]').attr("id", `no_of_adult${newIndex}`).attr("name", `addloc[${newIndex}][no_of_adult]`);
			$(this).find('[id^="no_of_ch"]').attr("id", `no_of_ch${newIndex}`).attr("name", `addloc[${newIndex}][no_of_ch]`);
			$(this).find('[id^="no_of_cw"]').attr("id", `no_of_cw${newIndex}`).attr("name", `addloc[${newIndex}][no_of_cw]`);
			$(this).find('[id^="no_of_extra"]').attr("id", `no_of_extra${newIndex}`).attr("name", `addloc[${newIndex}][no_of_extra]`);
			$(this).find('[id^="no_of_pax"]').attr("id", `no_of_pax${newIndex}`).attr("name", `addloc[${newIndex}][no_of_pax]`);
			$(this).find('[id^="tax_status"]').attr("id", `tax_status${newIndex}`).attr("name", `addloc[${newIndex}][tax_status]`);
			$(this).find('[id^="eighteen_div_d"]').attr("id", `eighteen_div_d${newIndex}`);
			$(this).find('[id^="eighteen_div_s"]').attr("id", `eighteen_div_s${newIndex}`);
			$(this).find('[id^="nightly-details"]').attr("id", `nightly-details${newIndex}`);

			// Update names
			$(this).find('[name]').each(function() {
				var oldName = $(this).attr('name');
				if (oldName) {
					var newName = oldName.replace('[' + oldStr + ']', '[' + newStr + ']');
					$(this).attr('name', newName);
				}
			});

			// Update ids
			$(this).find('[id]').each(function() {
				var elem = $(this);
				var oldId = elem.attr('id');
				if (oldId) {
					for (var p = 0; p < prefixes.length; p++) {
						var prefix = prefixes[p];
						if (oldId.startsWith(prefix)) {
							var rest = oldId.substring(prefix.length);
							var newId = prefix + newStr + rest.substring(oldLen);
							elem.attr('id', newId);
							break;
						}
					}
				}
			});

			// Update data-id
			$(this).find('[data-id]').each(function() {
				var oldDataId = $(this).attr('data-id');
				if (oldDataId) {
					var newDataId = newStr + oldDataId.substring(oldLen);
					$(this).attr('data-id', newDataId);
				}
			});

			// Update data-cid
			$(this).find('[data-cid]').each(function() {
				$(this).attr('data-cid', newIndex);
			});

			// Update count-id
			$(this).find('[count-id]').each(function() {
				$(this).attr('count-id', newIndex);
			});

			// Update oninput
			$(this).find('[oninput]').each(function() {
				var oldOninput = $(this).attr('oninput');
				if (oldOninput) {
					var newOninput = oldOninput.replace(oldStr, newStr);
					$(this).attr('oninput', newOninput);
				}
			});
		});

		$('.dyn_list .bc-card').each(function(index1) {
			let bcIndex = index1 + 1;
			$(this).attr("data-index", bcIndex);
			$(this).find('.bc-card-seq').text(bcIndex);
			$(this).find('[id^="span_night_id"]').attr("id", `span_night_id${bcIndex}`);
			$(this).find('[id^="loc_total"]').attr("id", `loc_total${bcIndex}`);
		});

		$('.tour_plan_div .select2-show-search').select2('destroy');
		$('.tour_plan_div .select2-show-search').select2();

		var accom_grand_total = updateGrandtotalBoth();
		$('#a_total').text(accom_grand_total);
		var veh_grand_total = get_veh_grand_total();
		$('#v_total').text(veh_grand_total);
		$('#g_total').text((accom_grand_total + veh_grand_total));
		toggleNightsVisibility(); // Re-toggle after update
		calculateVehicleExtraKmCharges();
	}

	// Function to calculate checkout date
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
		var value = $(this).val();
		var count = $(this).attr('data-id');
		$(`#nightly-details${count} .mp_row_change`).val(value).trigger('change');
	});

	// Add the mp_row_change handler here, similar to room_cat_change
	$(document).on('change', '.mp_row_change', function() {
		var mealplan = $(this).val();
		var rid = $(this).attr('data-id'); // e.g., count + night + i or count + night + seq
		var count = $(this).attr('data-count'); // Location card index
		var type = $(this).attr('data-type'); // 'double' or 'single'
		var $spinner = $('#csspinner');
		var $mealplanSelect = $(this);

		// Show spinner and disable the select
		$spinner.show();
		$mealplanSelect.prop('disabled', true);

		// Reset totals for this specific room if mealplan is empty or 0
		if (mealplan === "" || mealplan === "0") {
			$(`#d_total_rate${rid}`).val(0);
			$(`#s_total_rate${rid}`).val(0);
			updateRoomTotals(count, $(this).attr('data-night'), $(this).attr('data-room-index')); // Update totals for the specific room
			updateGrandtotalBoth();
			get_veh_grand_total();
			$(`#loc_total${count}`).text(updateGrandtotalBoth(count) + " + " + 0);
			// loadVehicles(count);
			$('#v_total').text(get_veh_grand_total());
			$('#g_total').text((updateGrandtotalBoth() + get_veh_grand_total()));
			calculateVehicleExtraKmCharges();
			$spinner.hide();
			$mealplanSelect.prop('disabled', false);
			return;
		}

		// **VALIDATION: Check if room category dropdown exists**
		if ($(`#roomcat${rid}`).length === 0) {
			console.error('Room category dropdown not found for rid:', rid);
			showAlert('error', 'Room category dropdown not found. Please refresh the page.');
			$spinner.hide();
			$mealplanSelect.prop('disabled', false).val(""); // Reset mealplan
			return;
		}

		// Gather data for AJAX call
		var no_of_night = $(`#no_of_night${count}`).val();
		var hotel_id = $(`#hotelid${count}`).val();
		var tax_status = $(`#tax_status${count}`).val();
		var checkin = $(`#checkin${count}`).val();
		var checkout = $(`#checkout${count}`).val();
		var room_cat_id = $(`#roomcat${rid}`).val();

		// **VALIDATION: Check if room category ID is valid**
		if (!room_cat_id || room_cat_id === "" || room_cat_id === "0" || room_cat_id === null) {
			console.error('Room category ID is missing or invalid for rid:', rid, 'Value:', room_cat_id);
			showAlert('warning', 'Please select a room category first before choosing a meal plan.');
			$spinner.hide();
			$mealplanSelect.prop('disabled', false).val(""); // Reset mealplan
			return;
		}

		// **VALIDATION: Check other required fields**
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

		// Extract night and room index from data attributes (fixed)
		var night = $(this).attr('data-night');
		var roomIndex = $(this).attr('data-room-index');

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
					return; // Don't hide spinner here, let the triggered change handle it
				}

				var no_of_ch = parseInt($(`#no_of_ch${count}`).val()) || 0;
				var no_of_cw = parseInt($(`#no_of_cw${count}`).val()) || 0;
				var no_of_extra = parseInt($(`#no_of_extra${count}`).val()) || 0;
				var ndouble = double;
				var nsingle = single;
				var room_r = parseInt(data.d_room_tariff) || parseInt(data.s_room_tariff) || 0;
				var child_r = parseInt(data.d_child_tariff) || parseInt(data.s_child_tariff) || 0;
				var child_wb_r = parseInt(data.d_child_wb_tariff) || parseInt(data.s_child_wb_tariff) || 0;
				var extra_r = parseInt(data.d_extra_tariff) || parseInt(data.s_extra_tariff) || 0;

				if (type === 'double') {
					$(`#d_adult_rate${rid}`).prop("readonly", true).val(room_r);
					$(`#d_child_rate${rid}`).prop("readonly", true).val(child_r);
					$(`#d_child_wb_rate${rid}`).prop("readonly", true).val(child_wb_r);
					$(`#d_extra_bed_rate${rid}`).prop("readonly", true).val(extra_r);
				} else {
					$(`#s_adult_rate${rid}`).prop("readonly", true).val(room_r);
					$(`#s_child_rate${rid}`).prop("readonly", true).val(child_r);
					$(`#s_child_wb_rate${rid}`).prop("readonly", true).val(child_wb_r);
					$(`#s_extra_bed_rate${rid}`).prop("readonly", true).val(extra_r);
				}

				if (tax_status == 1) {
					// Handle tax-enabled case (sterling fields)
					var child_with_bed_count = no_of_ch > 0 ? 1 : 0;
					var child_without_bed_count = no_of_cw > 0 ? 1 : 0;
					var extra_bed_count = no_of_extra > 0 ? 1 : 0;
					var tot_d = (room_r + (child_with_bed_count * child_r) + (child_without_bed_count * child_wb_r) + (extra_bed_count * extra_r));
					var gst = tot_d >= 7500 ? 18 : 12;
					var gstval = (gst / 100) * tot_d;
					var total_doubles = tot_d + gstval;

					// Generate sterling fields for the room
					var tt = rid;
					var sterling_html = `
					<div class="row">
						<div class="col-xl-1 col-sm-12 col-md-1"></div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>Room Rate</b></div>
							<input type="text" id="ster_d_adult_rate${tt}" class="form-control input-sm" maxlength="7" value="${room_r}" oninput="validateNumericInput(this);" required>
							<input type="hidden" id="ster_d_id${tt}" class="form-control input-sm" maxlength="6" value="${rid}">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>Child</b></div>
							<input type="text" id="ster_n_d_child_rate${tt}" class="form-control input-sm cls_child_count" maxlength="7" value="${child_with_bed_count}" oninput="validateNumericInput(this);">
						</div>
						<div class="col-xl-1 col-sm-12 col-cd-1">
							<div class="teams-rank"><b>Child Rate</b></div>
							<input type="text" id="ster_d_child_rate${tt}" value="${child_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>No.Of C.WB</b></div>
							<input type="text" id="ster_n_d_child_wb_rate${tt}" value="${child_without_bed_count}" class="form-control input-sm cls_child_wb_count" maxlength="7" oninput="validateNumericInput(this);">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>C.WBed Rate</b></div>
							<input type="text" id="ster_d_child_wb_rate${tt}" value="${child_wb_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>No.Of Extra</b></div>
							<input type="text" id="ster_n_d_extra_bed_rate${tt}" value="${extra_bed_count}" class="form-control input-sm cls_extra_count" maxlength="7" oninput="validateNumericInput(this);">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>Extra Rate</b></div>
							<input type="text" id="ster_d_extra_bed_rate${tt}" value="${extra_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>Room wise total</b></div>
							<input type="text" id="ster_d_total_rate${tt}" value="${tot_d}" class="form-control input-sm" maxlength="7" readonly>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>GST%</b></div>
							<input type="text" id="ster_gst_per${tt}" value="${gst}" class="form-control input-sm" maxlength="7" readonly>
						</div>
						<div class="col-xl-1 col-sm-12 col-md-1">
							<div class="teams-rank"><b>Room wise total</b></div>
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
					<input type="hidden" id="${hd_prefix}_adult_rate${tt}" value="${room_r}" name="hd_ster_addloc_${g_prefix}[${tt}][${g_prefix}adult_rate]">
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
				} else {
					// Handle non-tax case
					$(`#sterling_double${count}${night}`).html('');
					$(`#sterling_single${count}${night}`).html('');
					$(`#eighteen_div_d${count}`).html('');
					$(`#eighteen_div_s${count}`).html('');

					var total = (room_r + child_r + child_wb_r + extra_r);
					if (type === 'double') {
						$(`#d_total_rate${rid}`).val(total);
					} else {
						$(`#s_total_rate${rid}`).val(total);
					}
				}

				// Update room totals
				updateRoomTotals(count, night, roomIndex);

				// Update card and overall totals
				var singleCardTotal = updateGrandtotalBoth(count);
				$(`#loc_total${count}`).text(singleCardTotal + " + " + 0);
				// loadVehicles(count);
				var veh_grand_total = get_veh_grand_total();
				$('#v_total').text(veh_grand_total);
				var allCardTotal = updateGrandtotalBoth();
				$('#a_total').text(allCardTotal);
				$('#g_total').text((allCardTotal + veh_grand_total));
				calculateVehicleExtraKmCharges();
			},
			error: function(xhr, status, error) {
				console.error('Error fetching tariff details:', error);
				console.error('XHR Response:', xhr.responseText);
				showAlert('danger', 'Error fetching tariff details. Please try again.');
			},
			complete: function() {
				$spinner.hide();
				$mealplanSelect.prop('disabled', false);
				// Ensure room category dropdown is not disabled
				$(`#roomcat${rid}`).prop('disabled', false);
			}
		});
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


	$(document).on('change', '.room_cat_change', function() {
		var room_cat_id = $(this).val();
		var rid = $(this).attr('data-id'); // e.g., count + night + i or count + night + seq
		var count = $(this).attr('count-id'); // Location card index
		var $spinner = $('#csspinner');

		// Show spinner and disable the select
		// $spinner.show();
		// $(this).prop('disabled', true);

		// Reset totals for this specific room if room_cat_id is empty or 0
		if (room_cat_id === "" || room_cat_id === "0") {
			$(`#d_total_rate${rid}`).val(0);
			$(`#s_total_rate${rid}`).val(0);
			$(`#own_arrange${count}`).val(1);
			$(`#d_adult_rate${rid}`).val(0).prop('readonly', true);
			$(`#d_child_rate${rid}`).val(0).prop('readonly', true);
			$(`#d_child_wb_rate${rid}`).val(0).prop('readonly', true);
			$(`#d_extra_bed_rate${rid}`).val(0).prop('readonly', true);
			$(`#s_adult_rate${rid}`).val(0).prop('readonly', true);
			$(`#s_child_rate${rid}`).val(0).prop('readonly', true);
			$(`#s_child_wb_rate${rid}`).val(0).prop('readonly', true);
			$(`#s_extra_bed_rate${rid}`).val(0).prop('readonly', true);
			$(`#sterling_double${count}${rid[rid.length - 2]}`).html(''); // Clear sterling double for the night
			$(`#sterling_single${count}${rid[rid.length - 2]}`).html(''); // Clear sterling single for the night
			$(`#eighteen_div_d${count}`).html('');
			$(`#eighteen_div_s${count}`).html('');
			updateRoomTotals(count, rid[rid.length - 2], rid[rid.length - 1]); // Update totals for the specific room
			updateGrandtotalBoth();
			get_veh_grand_total();
			$(`#loc_total${count}`).text(updateGrandtotalBoth(count) + " + " + 0);
			// loadVehicles(count);
			$('#v_total').text(get_veh_grand_total());
			$('#g_total').text((updateGrandtotalBoth() + get_veh_grand_total()));
			$spinner.hide();
			$(this).prop('disabled', false);
			return;
		}

		// Set own_arrange to 0 and enable input fields
		$(`#own_arrange${count}`).val(0);
		$(`#d_adult_rate${rid}`).prop('readonly', false);
		$(`#d_child_rate${rid}`).prop('readonly', false);
		$(`#d_child_wb_rate${rid}`).prop('readonly', false);
		$(`#d_extra_bed_rate${rid}`).prop('readonly', false);
		$(`#s_adult_rate${rid}`).prop('readonly', false);
		$(`#s_child_rate${rid}`).prop('readonly', false);
		$(`#s_child_wb_rate${rid}`).prop('readonly', false);
		$(`#s_extra_bed_rate${rid}`).prop('readonly', false);

		// Gather data for AJAX call
		var no_of_night = $(`#no_of_night${count}`).val();
		var hotel_id = $(`#hotelid${count}`).val();
		var tax_status = $(`#tax_status${count}`).val();
		var mealplan = $(`#mealplan${count}`).val();
		var checkin = $(`#checkin${count}`).val();
		var checkout = $(`#checkout${count}`).val();
		var double = $(`#double${rid}`).val() || 0;
		var single = $(`#single${rid}`).val() || 0;
		var vehicle_from_location = <?php echo $object_det[0]['vehicle_from_location'] ? $object_det[0]['vehicle_from_location'] : 0; ?>;
		var arrival_location = <?php echo $object_det[0]['arrival_location']; ?>;
		var departure_location = <?php echo $object_det[0]['departure_location']; ?>;
		var tour_location_id = $(`#tour_location_id${count}`).val();
		var previous_location_id = count > 1 ? $(`#tour_location_id${parseInt(count) - 1}`).val() : null;
		var duration = <?php echo $object_det[0]['no_of_night']; ?>;
		var totalNights = calculateTotalNights();
		var is_vehicle_required = <?php echo $object_det[0]['is_vehicle_required']; ?>;
		var vehicle_models = is_vehicle_required == 1 ? <?php echo json_encode($vehicle_data); ?> : null;

		// Validate number of nights
		if (!no_of_night || no_of_night === 'undefined') {
			alert("Please enter number of nights");
			$(this)[0].selectedIndex = 0;
			$spinner.hide();
			$(this).prop('disabled', false);
			return;
		} else if (parseInt(no_of_night) === 0) {
			alert("Number of nights must be greater than zero");
			$(`#no_of_night${count}`).val('');
			$(this)[0].selectedIndex = 0;
			$spinner.hide();
			$(this).prop('disabled', false);
			return;
		}

		// Extract night and room index from rid
		var night = rid[rid.length - 2]; // Second-to-last character is the night
		var roomIndex = rid[rid.length - 1]; // Last character is the room index

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
					$(`#roomcat${rid}`).trigger('change');
					$spinner.hide();
					$(`#roomcat${rid}`).prop('disabled', false);
					return;
				}

				var no_of_ch = parseInt($(`#no_of_ch${count}`).val()) || 0;
				var no_of_cw = parseInt($(`#no_of_cw${count}`).val()) || 0;
				var no_of_extra = parseInt($(`#no_of_extra${count}`).val()) || 0;
				var ndouble = parseInt(double) || 0;
				var nsingle = parseInt(single) || 0;
				var room_r = parseInt(data.d_room_tariff) || 0;
				var child_r = parseInt(data.d_child_tariff) || 0;
				var child_wb_r = parseInt(data.d_child_wb_tariff) || 0;
				var extra_r = parseInt(data.d_extra_tariff) || 0;
				var sterling_double = '';
				var sterling_single = '';
				var ediv = '';
				var sdiv = '';

				if (tax_status == 1) {
					// Handle tax-enabled case (sterling fields)
					$(`#d_adult_rate${rid}`).prop("readonly", true).val(room_r);
					$(`#d_child_rate${rid}`).prop("readonly", true).val(child_r);
					$(`#d_child_wb_rate${rid}`).prop("readonly", true).val(child_wb_r);
					$(`#d_extra_bed_rate${rid}`).prop("readonly", true).val(extra_r);

					var ster_g_tot = 0;
					var child_with_bed_count = no_of_ch > 0 ? 1 : 0;
					var child_without_bed_count = no_of_cw > 0 ? 1 : 0;
					var extra_bed_count = no_of_extra > 0 ? 1 : 0;
					var tot_d = (room_r + (child_with_bed_count * child_r) + (child_without_bed_count * child_wb_r) + (extra_bed_count * extra_r));
					var gst = tot_d >= 7500 ? 18 : 12;
					var gstval = (gst / 100) * tot_d;
					var total_doubles = tot_d + gstval;

					// Generate sterling fields for double room
					var tt = rid;
					sterling_double += `
                    <div class="row">
                        <div class="col-xl-1 col-sm-12 col-md-1"></div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>Room Rate</b></div>
                            <input type="text" id="ster_d_adult_rate${tt}" class="form-control input-sm" maxlength="7" value="${room_r}" oninput="validateNumericInput(this);" required>
                            <input type="hidden" id="ster_d_id${tt}" class="form-control input-sm" maxlength="6" value="${rid}">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>Child</b></div>
                            <input type="text" id="ster_n_d_child_rate${tt}" class="form-control input-sm cls_child_count" maxlength="7" value="${child_with_bed_count}" oninput="validateNumericInput(this);">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>Child Rate</b></div>
                            <input type="text" id="ster_d_child_rate${tt}" value="${child_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>No.Of C.WB</b></div>
                            <input type="text" id="ster_n_d_child_wb_rate${tt}" value="${child_without_bed_count}" class="form-control input-sm cls_child_wb_count" maxlength="7" oninput="validateNumericInput(this);">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>C.WBed Rate</b></div>
                            <input type="text" id="ster_d_child_wb_rate${tt}" value="${child_wb_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>No.Of Extra</b></div>
                            <input type="text" id="ster_n_d_extra_bed_rate${tt}" value="${extra_bed_count}" class="form-control input-sm cls_extra_count" maxlength="7" oninput="validateNumericInput(this);">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>Extra Rate</b></div>
                            <input type="text" id="ster_d_extra_bed_rate${tt}" value="${extra_r}" class="form-control input-sm" maxlength="7" oninput="validateNumericInput(this);">
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>Room wise total</b></div>
                            <input type="text" id="ster_d_total_rate${tt}" value="${tot_d}" class="form-control input-sm" maxlength="7" readonly>
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>GST%</b></div>
                            <input type="text" id="ster_gst_per${tt}" value="${gst}" class="form-control input-sm" maxlength="7" readonly>
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1">
                            <div class="teams-rank"><b>Room wise total</b></div>
                            <input type="text" id="ster_g_tot${tt}" value="${total_doubles}" class="form-control input-sm sterling_d_grand" maxlength="7" readonly>
                        </div>
                        <div class="col-xl-1 col-sm-12 col-md-1"></div>
                    </div>
                `;
					ediv += `
                    <input type="hidden" id="hd_ster_d_id${tt}" value="${rid}" name="hd_ster_addloc_d[${tt}][ster_d_id]">
                    <input type="hidden" id="hd_ster_d_adult_rate${tt}" value="${room_r}" name="hd_ster_addloc_d[${tt}][d_adult_rate]">
                    <input type="hidden" id="hd_ster_n_d_child_rate${tt}" value="${child_with_bed_count}" name="hd_ster_addloc_d[${tt}][n_d_child_rate]">
                    <input type="hidden" id="hd_ster_d_child_rate${tt}" value="${child_r}" name="hd_ster_addloc_d[${tt}][d_child_rate]">
                    <input type="hidden" id="hd_ster_n_d_child_wb_rate${tt}" value="${child_without_bed_count}" name="hd_ster_addloc_d[${tt}][n_d_child_wb_rate]">
                    <input type="hidden" id="hd_ster_d_child_wb_rate${tt}" value="${child_wb_r}" name="hd_ster_addloc_d[${tt}][d_child_wb_rate]">
                    <input type="hidden" id="hd_ster_n_d_extra_bed_rate${tt}" value="${extra_bed_count}" name="hd_ster_addloc_d[${tt}][n_d_extra_bed_rate]">
                    <input type="hidden" id="hd_ster_d_extra_bed_rate${tt}" value="${extra_r}" name="hd_ster_addloc_d[${tt}][d_extra_bed_rate]">
                    <input type="hidden" id="hd_ster_d_total_rate${tt}" value="${tot_d}" name="hd_ster_addloc_d[${tt}][d_total_rate]">
                    <input type="hidden" id="hd_ster_gst_per${tt}" value="${gst}" name="hd_ster_addloc_d[${tt}][gst_per]">
                    <input type="hidden" id="hd_ster_g_tot${tt}" value="${total_doubles}" name="hd_ster_addloc_d[${tt}][g_tot]">
                `;

					// Update double room totals
					$(`#d_total_rate${rid}`).val(total_doubles);
					$(`#eighteen_div_d${count}`).append(ediv);
					$(`#sterling_double${count}${night}`).html(sterling_double);

					// Handle single rooms
					if (nsingle > 0) {
						$(`#s_adult_rate${rid}`).prop("readonly", true).val(data.s_room_tariff);
						$(`#s_child_rate${rid}`).prop("readonly", true).val(data.s_child_tariff);
						$(`#s_child_wb_rate${rid}`).prop("readonly", true).val(data.s_child_wb_tariff);
						$(`#s_extra_bed_rate${rid}`).prop("readonly", true).val(data.s_extra_tariff);
						var tot_s = parseInt(data.s_room_tariff) || 0;
						var gst = tot_s >= 7500 ? 18 : 12;
						var gstval = (gst / 100) * tot_s;
						var total_singles = tot_s + gstval;

						var tts = rid;
						sterling_single += `
                        <div class="row">
                            <div class="col-xl-1 col-sm-12 col-md-1"></div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>Room Rate</b></div>
                                <input type="text" id="ster_s_adult_rate${tts}" class="form-control input-sm" maxlength="7" value="${tot_s}" oninput="validateNumericInput(this);" required>
                                <input type="hidden" id="ster_s_id${tts}" class="form-control input-sm" maxlength="6" value="${rid}">
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>Child</b></div>
                                <input type="text" id="ster_n_s_child_rate${tts}" class="form-control input-sm" maxlength="7" value="0" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>Child Rate</b></div>
                                <input type="text" id="ster_s_child_rate${tts}" value="0" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>No.Of C.WB</b></div>
                                <input type="text" id="ster_n_s_child_wb_rate${tts}" value="0" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>C.WBed Rate</b></div>
                                <input type="text" id="ster_s_child_wb_rate${tts}" value="0" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>No.Of Extra</b></div>
                                <input type="text" id="ster_n_s_extra_bed_rate${tts}" value="0" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>Extra Rate</b></div>
                                <input type="text" id="ster_s_extra_bed_rate${tts}" value="0" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>Room wise total</b></div>
                                <input type="text" id="ster_s_total_rate${tts}" value="${tot_s}" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>GST%</b></div>
                                <input type="text" id="ster_s_gst_per${tts}" value="${gst}" class="form-control input-sm" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1">
                                <div class="teams-rank"><b>Room wise total</b></div>
                                <input type="text" id="ster_s_g_tot${tts}" value="${total_singles}" class="form-control input-sm sterling_s_grand" maxlength="7" readonly>
                            </div>
                            <div class="col-xl-1 col-sm-12 col-md-1"></div>
                        </div>
                    `;
						sdiv += `
                        <input type="hidden" id="hd_ster_s_id${tts}" value="${rid}" name="hd_ster_addloc_s[${tts}][ster_s_id]">
                        <input type="hidden" id="hd_ster_s_adult_rate${tts}" value="${tot_s}" name="hd_ster_addloc_s[${tts}][s_adult_rate]">
                        <input type="hidden" id="hd_ster_n_s_child_rate${tts}" value="0" name="hd_ster_addloc_s[${tts}][n_s_child_rate]">
                        <input type="hidden" id="hd_ster_s_child_rate${tts}" value="0" name="hd_ster_addloc_s[${tts}][s_child_rate]">
                        <input type="hidden" id="hd_ster_n_s_child_wb_rate${tts}" value="0" name="hd_ster_addloc_s[${tts}][n_s_child_wb_rate]">
                        <input type="hidden" id="hd_ster_s_child_wb_rate${tts}" value="0" name="hd_ster_addloc_s[${tts}][s_child_wb_rate]">
                        <input type="hidden" id="hd_ster_n_s_extra_bed_rate${tts}" value="0" name="hd_ster_addloc_s[${tts}][n_s_extra_bed_rate]">
                        <input type="hidden" id="hd_ster_s_extra_bed_rate${tts}" value="0" name="hd_ster_addloc_s[${tts}][s_extra_bed_rate]">
                        <input type="hidden" id="hd_ster_s_total_rate${tts}" value="${tot_s}" name="hd_ster_addloc_s[${tts}][s_total_rate]">
                        <input type="hidden" id="hd_ster_s_gst_per${tts}" value="${gst}" name="hd_ster_addloc_s[${tts}][s_gst_per]">
                        <input type="hidden" id="hd_ster_s_g_tot${tts}" value="${total_singles}" name="hd_ster_addloc_s[${tts}][s_g_tot]">
                    `;

						// Update single room totals
						$(`#s_total_rate${rid}`).val(total_singles);
						$(`#eighteen_div_s${count}`).append(sdiv);
						$(`#sterling_single${count}${night}`).html(sterling_single);
					}

					// Update grand totals for the night
					updateRoomTotals(count, night, roomIndex);
					calculateVehicleExtraKmCharges();
				} else {
					// Handle non-tax case
					$(`#sterling_double${count}${night}`).html('');
					$(`#sterling_single${count}${night}`).html('');
					$(`#eighteen_div_d${count}`).html('');
					$(`#eighteen_div_s${count}`).html('');

					$(`#d_adult_rate${rid}`).prop("readonly", false).val(room_r);
					$(`#d_child_rate${rid}`).prop("readonly", false).val(child_r);
					$(`#d_child_wb_rate${rid}`).prop("readonly", false).val(child_wb_r);
					$(`#d_extra_bed_rate${rid}`).prop("readonly", false).val(extra_r);

					if (nsingle > 0) {
						$(`#s_adult_rate${rid}`).prop("readonly", false).val(data.s_room_tariff);
						$(`#s_child_rate${rid}`).prop("readonly", false).val(data.s_child_tariff);
						$(`#s_child_wb_rate${rid}`).prop("readonly", false).val(data.s_child_wb_tariff);
						$(`#s_extra_bed_rate${rid}`).prop("readonly", false).val(data.s_extra_tariff);
					}

					// Update totals using existing function
					updateRoomTotals(count, night, roomIndex);
				}

				// Update card and overall totals
				var singleCardTotal = updateGrandtotalBoth(count);
				$(`#loc_total${count}`).text(singleCardTotal + " + " + 0);
				// loadVehicles(count);
				var veh_grand_total = get_veh_grand_total();
				$('#v_total').text(veh_grand_total);
				var allCardTotal = updateGrandtotalBoth();
				$('#a_total').text(allCardTotal);
				$('#g_total').text((allCardTotal + veh_grand_total));
				calculateVehicleExtraKmCharges();
			},
			error: function(xhr, status, error) {
				console.error('Error fetching tariff details:', error);
				var errorAlert = `
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-alert-triangle"></i></span>
                    <span class="alert-inner--text">Error fetching tariff details. Please try again.</span>
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
				$(`#roomcat${rid}`).prop('disabled', false);
			}
		});
	});
</script>
<script type="text/javascript">
	
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
									<div id="eighteen_div_d${count}"></div>
									<div id="eighteen_div_s${count}"></div>
									<input type="hidden" id="tax_status${count}" name="addloc[${count}][tax_status]" value="${item.tax_status}">
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
														<select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search  hotel_cat_change_draft" data-id="${count}" data-hid="${item.hotel_id}" readonly>
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
														<select id="roomcat${count}" name="addloc[${count}][roomcat]" class="form-control select2-show-search input-sm room_cat_change" data-id="${count}" readonly>
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
												</div>
												<div class="card" id="sterling_double${count}"> </div>
												`;
						if (item.tax_status == 1) {

							for (var si = 1; si <= no_of_double_room; si++) {
								newCard += `
															<div class="row">
															<div class="col-xl-1 col-sm-12 col-md-1">
															</div>
																		
															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>Room Rate</b></div>
															<input type="text" id="" class="form-control input-sm" maxlength="7" value="" oninput=" required>
															<input type="hidden" id="" class="form-control input-sm" maxlength="6" value="">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>Child</b></div>
															<input type="text" id="" class="form-control input-sm" maxlength="7" value="">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>Child Rate</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>No.Of C.WB</b></div>
															<input type="text" id="" value="" class="form-control input-sm cls_child_wb_count" maxlength="7" oninput="">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>C.WBed Rate</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7" oninput="">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>No.Of Extra</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7" oninput="">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>Extra Rate</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7" oninput="">
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>Room wise total</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7" oninput="" readonly>
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>GST%</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7" oninput="" readonly>
															</div>

															<div class="col-xl-1 col-sm-12 col-md-1">
															<div class="teams-rank"><b>Room wise total</b></div>
															<input type="text" id="" value="" class="form-control input-sm" maxlength="7" oninput="" readonly>
															</div>
															<div class="col-xl-1 col-sm-12 col-md-1">
															</div>
															</div>

														
														
													`;
							}
						}
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
												
											</div>
											<div class="card" id="sterling_single${count}"> </div>
											`;
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

									v_pre_to_cur = v_item.pre_to_cur;
									v_cur_to_dep = v_item.cur_to_dep;
									v_dep_to_arr = v_item.dep_to_arr;

									v_hub_to_arr = v_item.hub_to_arr;
									v_arr_to_loc = v_item.arr_to_loc;
								}
							});
							if (vindex == 0) {
								newCard += `
												<center><div class="col-md-12 col-lg-12 col-xl-12"style="padding-top:10px;"><h5 style="color:#003300;">Vehicle Details<span id="v_from_to${count}">${v_veh_header}</span></h5></div></center>
												<input type="hidden" id="veh_header${count}" name="addloc[${count}][veh_header]" value="${v_veh_header}">

												<input type="hidden" id="pre_to_cur${count}" name="addloc[${count}][pre_to_cur]" value="${v_pre_to_cur}">
												<input type="hidden" id="cur_to_dep${count}" name="addloc[${count}][cur_to_dep]" value="${v_cur_to_dep}">
												<input type="hidden" id="dep_to_arr${count}" name="addloc[${count}][dep_to_arr]" value="${v_dep_to_arr}">

												<input type="hidden" id="hub_to_arr${count}" name="addloc[${count}][hub_to_arr]" value="${v_hub_to_arr}">
												<input type="hidden" id="arr_to_loc${count}" name="addloc[${count}][arr_to_loc]" value="${v_arr_to_loc}">

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
		var is_quick_quote = <?php echo isset($object_det[0]['is_quick_quote']) ? $object_det[0]['is_quick_quote'] : '0'; ?>;
		var vehicle_models = <?php echo isset($vehicle_data) ? json_encode($vehicle_data) : '[]'; ?>;
		var start_date = <?php echo isset($start_date) ? json_encode($start_date) : 'null'; ?>;

		// Function to wait for select options to load
		function waitForOptions(selector, callback, maxAttempts = 100, attempt = 0) {
			var $select = $(selector);
			if ($select.find('option').length > 1 || attempt >= maxAttempts) {
				callback();
			} else {
				setTimeout(function() {
					waitForOptions(selector, callback, maxAttempts, attempt + 1);
				}, 200);
			}
		}

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
				$('.tour_plan_div').empty();
				$('.dyn_list').empty();

				if (!response || !Array.isArray(response) || response.length === 0) {
					console.warn('Empty or invalid response:', response);
					alert('No tour locations found.');
					$('#spinner_draft').hide();
					$this.prop('disabled', false);
					return;
				}

				// Group data by tour_details_id, handling nested expansions
				var groupedData = {};
				$.each(response, function(index, item) {
					var tourDetailsId = item.tour_details_id;
					if (!groupedData[tourDetailsId]) {
						groupedData[tourDetailsId] = {
							main: {
								tour_details_id: item.tour_details_id,
								geog_name: item.geog_name || 'Unknown Location',
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
							expansions: []
						};
					}
					// Handle nested expansions
					if (item.expansion && Array.isArray(item.expansion)) {
						$.each(item.expansion, function(eIndex, exp) {
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
						});
					}
				});

				var tourDetailsArray = Object.keys(groupedData).map(function(key) {
					return groupedData[key];
				});
				var count = 0;

				function processLocation(index) {
					if (index > tourDetailsArray.length) {
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

						// var totalNights = calculateTotalNights();
						// $('#planned_night').text(totalNights + " / " + no_of_night);
						// alert(no_of_night);
						// if (totalNights == no_of_night) {
						//     $("#btn_save_tour_plan").show();
						//     $("#btn_savedraft_tour_plan").show();
						//     $('#btn_add_bt').prop('disabled', true);
						// } else {
						//     $("#btn_save_tour_plan").hide();
						//     $("#btn_savedraft_tour_plan").show();
						//     $('#btn_add_bt').prop('disabled', false);
						// }
						var accom_grand_total = updateGrandtotalBoth();
						$('#a_total').text(accom_grand_total);
						var veh_grand_total = get_veh_grand_total();
						$('#v_total').text(veh_grand_total);
						$('#g_total').text((accom_grand_total + veh_grand_total));
						if (typeof toggleNightsVisibility === 'function') {
							toggleNightsVisibility();
						}
						calculateVehicleExtraKmCharges();
						$('#spinner_draft').hide();
						$this.prop('disabled', false);
						return;
					}

					count++;
					var data = tourDetailsArray[index - 1];
					var item = data.main;
					var allExpansions = data.expansions.sort(function(a, b) {
						return new Date(a.tour_expansion_date) - new Date(b.tour_expansion_date);
					});

					// Group expansions by date and sort within date by tour_expansion_id
					var expansionsByDate = {};
					$.each(allExpansions, function(idx, exp) {
						var dateStr = exp.tour_expansion_date;
						if (!expansionsByDate[dateStr]) {
							expansionsByDate[dateStr] = [];
						}
						expansionsByDate[dateStr].push(exp);
					});

					// Get sorted dates
					var sortedDates = Object.keys(expansionsByDate).sort(function(a, b) {
						return new Date(a) - new Date(b);
					});

					$("#btn_savedraft_tour_plan").show();

					var mealPlanSelections = {
						1: item.meal_plan_id == 1 ? "selected" : "",
						2: item.meal_plan_id == 2 ? "selected" : "",
						3: item.meal_plan_id == 3 ? "selected" : "",
						4: item.meal_plan_id == 4 ? "selected" : ""
					};

					var newCard = `
            <div class="col-md-12 col-lg-12 col-xl-12 location-card" data-index="${count}">
                <div class="card">
                    <div class="card-header">
                        <div id="eighteen_div_d${count}"></div>
                        <div id="eighteen_div_s${count}"></div>
                        <input type="hidden" id="tax_status${count}" name="addloc[${count}][tax_status]" value="${item.tax_status}">
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
                                    <div class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Checkin</b></div>
                                        <input type="date" value="${item.check_in_date}" id="checkin${count}" name="addloc[${count}][checkin]" class="form-control input-sm" required readonly>
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Nights</b></div>
                                        <input type="text" id="no_of_night${count}" name="addloc[${count}][no_of_night]" value="${item.no_of_days}" class="form-control input-sm no_of_night" count-id="${count}" maxlength="2" oninput="validateNumericInput(this); calculateCheckout(${count}); updateNightlyDetails(${count});" required>
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Checkout</b></div>
                                        <input type="date" id="checkout${count}" value="${item.check_out_date}" name="addloc[${count}][checkout]" class="form-control input-sm" required readonly>
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Hotel Category</b></div>
                                        <select id="hotelcat${count}" name="addloc[${count}][hotelcat]" class="form-control select2-show-search input-sm hotel_cat_change" data-id="${count}" required>
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Hotel</b></div>
                                        <select id="hotelid${count}" name="addloc[${count}][hotelid]" class="form-control select2-show-search input-sm hotel_change" data-id="${count}" required>
                                            <option value="">Select</option>
                                        </select>
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
                                        <select id="mealplan${count}" name="addloc[${count}][mealplan]" class="form-control select2-show-search input-sm mp_change" data-id="${count}" required>
                                            <option value="">Select</option>
                                            <option value="1" ${mealPlanSelections[1]}>EP</option>
                                            <option value="2" ${mealPlanSelections[2]}>CP</option>
                                            <option value="3" ${mealPlanSelections[3]}>MAP</option>
                                            <option value="4" ${mealPlanSelections[4]}>AP</option>
                                        </select>
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
                                        <input type="text" id="no_of_pax${count}" name="addloc[${count}][no_of_pax]" value="${total_no_of_pax}" class="form-control input-sm" maxlength="3" oninput="validateNumericInput(this);" readonly ><br>
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

					// Append breadcrumb
					var breadcrumb = `
            <li class="bc-card" data-index="${count}">
                <a>
                    <span class="bc-card-seq" style="color:#fff">${count}</span>.<span style="color:#fff">${item.geog_name}(<span id="span_night_id${count}" style="color:#fff"></span>)<span id="loc_total${count}" style="color:#fff"></span></span>
                </a>
            </li>
        `;
					$('.dyn_list').append(breadcrumb);
					$(`#span_night_id${count}`).text(item.no_of_days > 0 ? item.no_of_days : '');

					// Initialize Select2 early for the main selects
					$(`.location-card[data-index="${count}"] .select2-show-search`).select2();

					// Populate hotel categories
					var hotelCat = $(`#hotelcat${count}`);
					hotelCat.empty().append('<option value="">Select</option>');
					$.each(hotel_categories, function(hIndex, hotelcat) {
						var selected = (hotelcat.hotel_category_id == item.hot_cat_id) ? "selected" : "";
						hotelCat.append(`<option value="${hotelcat.hotel_category_id}" ${selected}>${hotelcat.hotel_category_name}</option>`);
					});
					hotelCat.val(item.hot_cat_id).trigger('change');

					// Chain the loading and setting: wait for hotels, then set hotel and wait for rooms
					waitForOptions(`#hotelid${count}`, function() {
						var hotelSelect = $(`#hotelid${count}`);
						hotelSelect.val(item.hotel_id).trigger('change');

						waitForOptions(`#roomcat_common${count}`, function() {
							var roomCatCommon = $(`#roomcat_common${count}`);
							roomCatCommon.val(item.room_category_id).trigger('change');

							// CHANGE 1: Remove card-level vehicle extraction (was assuming uniform data across nights)

							// Now generate nightly details after room categories are loaded
							var nightlyHtml = '';
							$.each(sortedDates, function(sIndex, dateStr) {
								var currentNightIndex = sIndex + 1;
								var nightExpansions = expansionsByDate[dateStr];
								nightExpansions.sort(function(a, b) {
									return parseInt(a.tour_expansion_id) - parseInt(b.tour_expansion_id);
								});
								var nightDateObj = new Date(dateStr);
								var day = nightDateObj.getDate().toString().padStart(2, '0');
								var month = (nightDateObj.getMonth() + 1).toString().padStart(2, '0');
								var year = nightDateObj.getFullYear().toString().slice(-2);
								var nightDateStr = `${day}/${month}/${year}`;

								// CHANGE 2: Extract vehicle data PER NIGHT from this date's expansions
								var nightVehicleExp = null;
								for (var expIdx = 0; expIdx < nightExpansions.length; expIdx++) {
									var exp = nightExpansions[expIdx];
									if (exp.vehicle_details_json && exp.vehicle_details_json.trim() !== '') {
										nightVehicleExp = exp;
										break; // Take first valid one for this night
									}
								}
								if (!nightVehicleExp) {
									nightVehicleExp = nightExpansions[0] || {};
								}
								var nightVehicleData = [];
								try {
									nightVehicleData = nightVehicleExp.vehicle_details_json ? JSON.parse(nightVehicleExp.vehicle_details_json) : [];
								} catch (e) {
									console.error('Invalid vehicle JSON for date', dateStr, ':', nightVehicleExp.vehicle_details_json);
								}

								var nightVehHeader = '';
								var nightPreToCur = '';
								var nightCurToDep = '';
								var nightDepToArr = '';
								var nightHubToArr = '';
								var nightArrToLoc = '';
								if (nightVehicleData.length > 0) {
									var firstVeh = nightVehicleData[0];
									nightVehHeader = firstVeh.veh_header || '';
									nightPreToCur = firstVeh.pre_to_cur || '';
									nightCurToDep = firstVeh.cur_to_dep || '';
									nightDepToArr = firstVeh.dep_to_arr || '';
									nightHubToArr = firstVeh.hub_to_arr || '';
									nightArrToLoc = firstVeh.arr_to_loc || '';
								}

								nightlyHtml += `
                        <div class="night-section" data-night="${currentNightIndex}">
                            <h3 style="color:#0000CD; text-align: center;">Night ${currentNightIndex} (${nightDateStr}) <a href="#" class="close-night-btn" style="float: right; font-size: 12px;"><i class="fe fe-x"></i></a></h3>
                            <div class="card p-3 mb-3" id="card_night_${count}_${currentNightIndex}">
                                <div class="container-fluid px-2">`;

								// Double Rooms (unchanged)
								var noDouble = parseInt(no_of_double_room) || 0;
								var doubleHtml = '';
								var ddTotal = 0;
								if (noDouble > 0) {
									doubleHtml += `
                            <div class="row mt-2 double_row">
                                <div class="col-12 d-flex justify-content-left">
                                    <div class="col-xl-2 col-sm-12 col-md-2 total-col-room">
                                        <div class="teams-rank col-room"><b>Double Room</b></div>
                                        <input type="text" id="double${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][double]" value="${noDouble}" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}">
                                    </div>
                                </div>
                            </div>`;

									for (let i = 1; i <= noDouble; i++) {
										let rid = `${count}${currentNightIndex}${i}`;
										let roomExp = nightExpansions[i - 1] || {};
										let mealPlanSel = {
											1: roomExp.meal_plan_id == 1 ? 'selected' : '',
											2: roomExp.meal_plan_id == 2 ? 'selected' : '',
											3: roomExp.meal_plan_id == 3 ? 'selected' : '',
											4: roomExp.meal_plan_id == 4 ? 'selected' : ''
										};
										ddTotal += parseFloat(roomExp.double_total_rate || 0);
										doubleHtml += `
                                <div class="row mt-2 align-items-center">
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Room Category</b></div>
                                        <select id="roomcat${rid}" name="addloc[${count}][nights][${currentNightIndex}][roomcat][${i}]" class="form-control select2-show-search input-sm room_cat_change" count-id="${count}" data-id="${rid}" data-night="${currentNightIndex}" data-room-index="${i}" required>
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Meal Plan</b></div>
                                        <select id="mealplan${rid}" name="addloc[${count}][nights][${currentNightIndex}][mealplan][${i}]" class="form-control select2-show-search input-sm mp_row_change" data-id="${rid}" data-type="double" data-count="${count}" data-night="${currentNightIndex}" data-room-index="${i}" required>
                                            <option value="">Select</option>
                                            <option value="1" ${mealPlanSel[1]}>EP</option>
                                            <option value="2" ${mealPlanSel[2]}>CP</option>
                                            <option value="3" ${mealPlanSel[3]}>MAP</option>
                                            <option value="4" ${mealPlanSel[4]}>AP</option>
                                        </select>
                                    </div>
                                    <div style="display:none;" class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Double Room</b></div>
                                        <input type="text" id="double${rid}" name="addloc[${count}][nights][${currentNightIndex}][double][${i}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-room-index="${i}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Daily Room Rate</b></div>
                                        <input type="text" id="d_adult_rate${rid}" name="addloc[${count}][nights][${currentNightIndex}][d_adult_rate][${i}]" value="${roomExp.room_rate_double}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${currentNightIndex}, ${i});" required data-night="${currentNightIndex}" data-room-index="${i}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>C.With Bed Rate</b></div>
                                        <input type="text" id="d_child_rate${rid}" name="addloc[${count}][nights][${currentNightIndex}][d_child_rate][${i}]" value="${roomExp.child_with_bed_double}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${currentNightIndex}, ${i});" data-night="${currentNightIndex}" data-room-index="${i}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>C.Without Bed Rate</b></div>
                                        <input type="text" id="d_child_wb_rate${rid}" name="addloc[${count}][nights][${currentNightIndex}][d_child_wb_rate][${i}]" value="${roomExp.child_without_bed_double}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${currentNightIndex}, ${i});" data-night="${currentNightIndex}" data-room-index="${i}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Extra Bed Rate</b></div>
                                        <input type="text" id="d_extra_bed_rate${rid}" name="addloc[${count}][nights][${currentNightIndex}][d_extra_bed_rate][${i}]" value="${roomExp.extra_bed_double}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${currentNightIndex}, ${i});" data-night="${currentNightIndex}" data-room-index="${i}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Total(Double)</b></div>
                                        <input type="text" id="d_total_rate${rid}" name="addloc[${count}][nights][${currentNightIndex}][d_total_rate][${i}]" value="${roomExp.double_total_rate}" class="form-control input-sm d_total_rate" data-count="${count}" maxlength="6" readonly data-night="${currentNightIndex}" data-room-index="${i}">
                                    </div>
                                </div>`;
									}

									doubleHtml += `
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="col-xl-2 col-sm-12 col-md-2 total-col">
                                        <div class="teams-rank textlef"><b> Grand Total(Double)</b></div>
                                        <input type="text" id="dd_total_rate${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][dd_total_rate]" value="${ddTotal}" class="form-control input-sm" maxlength="6" readonly data-night="${currentNightIndex}"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="sterling_double${count}${currentNightIndex}" data-night="${currentNightIndex}"></div>`;
								} else {
									doubleHtml += `
                            <input type="hidden" id="double${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][double]" value="0" data-night="${currentNightIndex}">
                            <input type="hidden" id="dd_total_rate${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][dd_total_rate]" value="0" data-night="${currentNightIndex}">`;
								}
								nightlyHtml += doubleHtml;

								// Single Rooms (unchanged)
								var noSingle = parseInt(no_of_single_room) || 0;
								var singleHtml = '';
								var ssTotal = 0;
								var doubleCount = noDouble;
								if (noSingle > 0) {
									singleHtml += `
                            <div class="row mt-2 single_row">
                                <div class="col-12 d-flex justify-content-left">
                                    <div class="col-xl-1.3 col-sm-12 col-md-2 total-col-room">
                                        <div class="teams-rank col-room"><b>Single Room</b></div>
                                        <input type="text" id="single${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][single]" value="${noSingle}" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}">
                                    </div>
                                </div>
                            </div>`;

									var singleStartIdx = noDouble;
									for (let i = 1; i <= noSingle; i++) {
										let seq = doubleCount + i;
										let sid = `${count}${currentNightIndex}${seq}`;
										let roomExp = nightExpansions[singleStartIdx + i - 1] || {};
										let mealPlanSel = {
											1: roomExp.meal_plan_id == 1 ? 'selected' : '',
											2: roomExp.meal_plan_id == 2 ? 'selected' : '',
											3: roomExp.meal_plan_id == 3 ? 'selected' : '',
											4: roomExp.meal_plan_id == 4 ? 'selected' : ''
										};
										ssTotal += parseFloat(roomExp.single_total_rate || 0);
										singleHtml += `
                                <div class="row mt-2 align-items-center">
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Room Category</b></div>
                                        <select id="roomcat${sid}" name="addloc[${count}][nights][${currentNightIndex}][roomcat][${seq}]" class="form-control select2-show-search input-sm room_cat_change" count-id="${count}" data-id="${sid}" data-night="${currentNightIndex}" data-room-index="${seq}" required>
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Meal Plan</b></div>
                                        <select id="mealplan${sid}" name="addloc[${count}][nights][${currentNightIndex}][mealplan][${seq}]" class="form-control select2-show-search input-sm mp_row_change" data-id="${sid}" data-type="single" data-count="${count}" data-night="${currentNightIndex}" data-room-index="${seq}" required>
                                            <option value="">Select</option>
                                            <option value="1" ${mealPlanSel[1]}>EP</option>
                                            <option value="2" ${mealPlanSel[2]}>CP</option>
                                            <option value="3" ${mealPlanSel[3]}>MAP</option>
                                            <option value="4" ${mealPlanSel[4]}>AP</option>
                                        </select>
                                    </div>
                                    <div style="display:none;" class="col-xl col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Single Room</b></div>
                                        <input type="text" id="single${sid}" name="addloc[${count}][nights][${currentNightIndex}][single][${seq}]" value="1" class="form-control input-sm" data-count="${count}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-room-index="${seq}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Daily Room Rate</b></div>
                                        <input type="text" id="s_adult_rate${sid}" name="addloc[${count}][nights][${currentNightIndex}][s_adult_rate][${seq}]" value="${roomExp.room_rate_single}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this); updateRoomTotals(${count}, ${currentNightIndex}, ${seq});" data-night="${currentNightIndex}" data-room-index="${seq}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>C.With Bed Rate</b></div>
                                        <input type="text" id="s_child_rate${sid}" name="addloc[${count}][nights][${currentNightIndex}][s_child_rate][${seq}]" value="${roomExp.child_with_bed_single}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-room-index="${seq}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>C.Without Bed Rate</b></div>
                                        <input type="text" id="s_child_wb_rate${sid}" name="addloc[${count}][nights][${currentNightIndex}][s_child_wb_rate][${seq}]" value="${roomExp.child_without_bed_single}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-room-index="${seq}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Extra Bed Rate</b></div>
                                        <input type="text" id="s_extra_bed_rate${sid}" name="addloc[${count}][nights][${currentNightIndex}][s_extra_bed_rate][${seq}]" value="${roomExp.extra_bed_single}" class="form-control input-sm" data-count="${count}" maxlength="6" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-room-index="${seq}">
                                    </div>
                                    <div class="col-xl col-sm-12 col-md-2 ps-2">
                                        <div class="teams-rank"><b>Total(Single)</b></div>
                                        <input type="text" id="s_total_rate${sid}" name="addloc[${count}][nights][${currentNightIndex}][s_total_rate][${seq}]" value="${roomExp.single_total_rate}" class="form-control input-sm s_total_rate" data-count="${count}" maxlength="6" readonly data-night="${currentNightIndex}" data-room-index="${seq}">
                                    </div>
                                </div>`;
									}

									singleHtml += `
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="col-xl-1.3 col-sm-12 col-md-2 total-col">
                                        <div class="teams-rank textlef"><b>Grand Total(Single)</b></div>
                                        <input type="text" id="ss_total_rate${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][ss_total_rate]" value="${ssTotal}" class="form-control input-sm" maxlength="6" readonly data-night="${currentNightIndex}"> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="sterling_single${count}${currentNightIndex}" data-night="${currentNightIndex}"></div>`;
								} else {
									singleHtml += `
                            <input type="hidden" id="single${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][single]" value="0" data-night="${currentNightIndex}">
                            <input type="hidden" id="ss_total_rate${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][ss_total_rate]" value="0" data-night="${currentNightIndex}">`;
								}
								nightlyHtml += singleHtml;

								// CHANGE 3: Vehicle Details - now using per-night data
								if (is_vehicle_required == 1) {
									nightlyHtml += `
                            <div class="row mt-2 vehicle-details-section">
                                <div class="col-xl-1 col-sm-12 col-md-1 ps-2">
                                    <a id="loadvehs${count}${currentNightIndex}" class="nav-link load_vehs_click" data-id="${count}" data-night="${currentNightIndex}" data-loaded="false"><i class="fa fa-refresh"></i></a>
                                </div>
                                <div class="col-xl-11 col-sm-12 col-md-11 ps-2"><h5 style="color:#003300;">Vehicle Details<span id="v_from_to${count}${currentNightIndex}">${nightVehHeader}</span></h5></div>
                            </div>
                            <input type="hidden" id="veh_header${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][veh_header]" value="${nightVehHeader}" data-night="${currentNightIndex}">
                            <input type="hidden" id="pre_to_cur${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][pre_to_cur]" value="${nightPreToCur}" data-night="${currentNightIndex}">
                            <input type="hidden" id="cur_to_dep${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][cur_to_dep]" value="${nightCurToDep}" data-night="${currentNightIndex}">
                            <input type="hidden" id="dep_to_arr${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][dep_to_arr]" value="${nightDepToArr}" data-night="${currentNightIndex}">
                            <input type="hidden" id="hub_to_arr${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][hub_to_arr]" value="${nightHubToArr}" data-night="${currentNightIndex}">
                            <input type="hidden" id="arr_to_loc${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][arr_to_loc]" value="${nightArrToLoc}" data-night="${currentNightIndex}">
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
                            </div>`;

									var vehicleRowsHtml = '';
									var vehGrandTotal = 0;
									// CHANGE 4: Use nightVehicleData in the loop
									$.each(vehicle_models, function(vindex, vmodel) {
										var veh = nightVehicleData.find(function(v) {
											return parseInt(v.veh_type_id) === parseInt(vmodel.vehicle_type_id);
										}) || {};
										var vid = `${count}${currentNightIndex}${vmodel.vehicle_type_id}`;
										vehGrandTotal += parseFloat(veh.veh_total || 0);

										vehicleRowsHtml += `
                                <div class="row mt-2 single_row align-items-center vehicle-row">
                                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="veh_model${vid}" name="addloc[${count}][nights][${currentNightIndex}][veh_model][${vindex}]" value="${vmodel.vehicle_model_name}" class="form-control input-sm veh_model${vindex}" readonly data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                        <input type="hidden" id="veh_type_id${vid}" name="addloc[${count}][nights][${currentNightIndex}][veh_type_id][${vindex}]" value="${vmodel.vehicle_type_id}" class="form-control input-sm veh_type_id${vindex}" data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="veh_count${vid}" name="addloc[${count}][nights][${currentNightIndex}][veh_count][${vindex}]" value="${veh.vehicle_count || 0}" class="form-control input-sm veh_count${vindex}" maxlength="2" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="day_rent${vid}" name="addloc[${count}][nights][${currentNightIndex}][day_rent][${vindex}]" value="${veh.day_rent || 0}" class="form-control input-sm cls_daily day_rent${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this); updateVehicleTotals(${count}, ${currentNightIndex}, ${vindex});" data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="max_km_day${vid}" name="addloc[${count}][nights][${currentNightIndex}][max_km_day][${vindex}]" value="${veh.max_km_day || 100}" class="form-control input-sm max_km_day${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="travel_distance${vid}" name="addloc[${count}][nights][${currentNightIndex}][travel_distance][${vindex}]" value="${veh.travel_distance || 0}" class="form-control input-sm cls_dist travel_distance${vindex}" data-id="${vid}" data-cid="${count}" maxlength="5" oninput="validateNumericInput(this); updateVehicleTotals(${count}, ${currentNightIndex}, ${vindex});" data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="extra_kilometer${vid}" name="addloc[${count}][nights][${currentNightIndex}][extra_kilometer][${vindex}]" value="${veh.extra_kilometer || 0}" class="form-control input-sm extra_kilometer${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="extra_km_rate${vid}" name="addloc[${count}][nights][${currentNightIndex}][extra_km_rate][${vindex}]" value="${veh.extra_km_rate || 0}" class="form-control input-sm extra_km_rate${vindex}" maxlength="5" oninput="validateNumericInput(this);" readonly data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                                        <input type="text" id="veh_total${vid}" name="addloc[${count}][nights][${currentNightIndex}][veh_total][${vindex}]" value="${veh.veh_total || 0}" class="form-control input-sm munn${vindex}" maxlength="5" readonly data-night="${currentNightIndex}" data-veh-index="${vindex}">
                                    </div>
                                </div>`;
									});

									nightlyHtml += vehicleRowsHtml;

									nightlyHtml += `
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="col-xl-1.3 col-sm-12 col-md-2">
                                        <div class="teams-rank"><b>Grand Total(Vehicle)</b></div>
                                        <input type="text" id="veh_grand_total${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][veh_grand_total]" value="${vehGrandTotal}" class="form-control input-sm" maxlength="6" readonly data-night="${currentNightIndex}">
                                    </div>
                                </div>
                            </div>`;
								} else {
									nightlyHtml += `
                            <input type="hidden" id="veh_grand_total${count}${currentNightIndex}" name="addloc[${count}][nights][${currentNightIndex}][veh_grand_total]" value="0" data-night="${currentNightIndex}">`;
								}

								nightlyHtml += `</div></div></div>`;
							});

							$(`#nightly-details${count}`).html(nightlyHtml);

							// Re-initialize Select2 for nightly selects
							$(`.location-card[data-index="${count}"] .select2-show-search`).select2();

							// Copy room category options from common to nightly selects and set values per room
							var $commonRoom = $(`#roomcat_common${count}`);
							if ($commonRoom.find('option').length > 1) {
								$(`.location-card[data-index="${count}"] .room_cat_change`).each(function() {
									var $this = $(this);
									$this.empty().append('<option value="">Select</option>');
									$commonRoom.find('option:not([value=""])').each(function() {
										$this.append($(this).clone());
									});
									// Set value from saved per room expansion
									var nightIndex = parseInt($this.attr('data-night'));
									var roomIndex = parseInt($this.attr('data-room-index'));
									var dateStr = sortedDates[nightIndex - 1];
									var nightExpansions = expansionsByDate[dateStr];
									nightExpansions.sort(function(a, b) {
										return parseInt(a.tour_expansion_id) - parseInt(b.tour_expansion_id);
									});
									var roomExp = (roomIndex <= no_of_double_room) ? nightExpansions[roomIndex - 1] : nightExpansions[no_of_double_room + (roomIndex - no_of_double_room) - 1];
									var roomCatId = roomExp.expansion_room_category_id || item.room_category_id;
									$this.val(roomCatId).trigger('change');
								});
							}

							// Trigger meal plan changes if needed
							$(`.location-card[data-index="${count}"] .mp_row_change`).each(function() {
								$(this).trigger('change');
							});

							// Generate and append vehicle summary if vehicle is required (unchanged; will use per-night inputs)
							if (is_vehicle_required == 1) {
								var no_of_night_local = item.no_of_days;
								var summaryHtml = generateVehicleSummary(count, no_of_night_local, vehicle_models);
								$(`#nightly-details${count}`).append(summaryHtml);
								// Update the summary with current data
								updateVehicleSummary(count);
							}

							updateNightlyDetails(count);
							updateGrandtotalBoth(count);
							get_veh_grand_total();
							calculateVehicleExtraKmCharges();

							// Proceed to next location after this one is fully loaded
							processLocation(index + 1);
						});
					});
				}

				// Start processing locations sequentially
				processLocation(1);
			},
			error: function(xhr, status, error) {
				console.error('AJAX error:', status, error, xhr.responseText);
				alert('Error loading tour locations.');
				$('#spinner_draft').hide();
				$this.prop('disabled', false);
			}
		});
	});

	// Function to generate vehicle summary for a specific card
	function generateVehicleSummary(count, no_of_night, vehicle_models) {
		// Build night labels with vehicle details
		var nightLabels = '';
		for (let i = 1; i <= no_of_night; i++) {
			var vFromTo = $(`#v_from_to${count}${i}`).text().trim();
			if (vFromTo && vFromTo !== '') {
				// Remove any leading " - " if present
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
        <h5 style="color:#003300; text-align: center;" id="vehicle-summary-header-${count}">Vehicle Summary (${nightLabels})</h5>
        <div class="card p-3 mb-3">
            <div class="container-fluid px-2">
                <div class="row mt-2 single_row">
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Vehicle Model</b></div>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Vehicle Count</b></div>
                    </div>
                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Total Days</b></div>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Total Daily Rent</b></div>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Total Distance</b></div>
                    </div>
                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Total Extra KM</b></div>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <div class="teams-rank"><b>Grand Total</b></div>
                    </div>
                </div>`;

		$.each(vehicle_models, function(vindex, vmodel) {
			var vehicleCount = vmodel.vehicle_count || 0; // Fallback if not present
			summaryHtml += `
                <div class="row mt-2 single_row align-items-center">
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <input type="text" value="${vmodel.vehicle_model_name}" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <input type="text" value="${vehicleCount}" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                        <input type="text" id="summary_days_${count}_${vindex}" value="0" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <input type="text" id="summary_rent_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <input type="text" id="summary_distance_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-xl-1 col-sm-12 col-md-2 ps-2">
                        <input type="text" id="summary_extra_km_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
                    </div>
                    <div class="col-xl-2 col-sm-12 col-md-2 ps-2">
                        <input type="text" id="summary_total_${count}_${vindex}" value="0.00" class="form-control input-sm" readonly>
                    </div>
                </div>`;
		});

		summaryHtml += `
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="col-xl-2 col-sm-12 col-md-2">
                            <div class="teams-rank"><b>Overall Vehicle Total</b></div>
                            <input type="text" id="summary_overall_total_${count}" value="0.00" class="form-control input-sm" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

		return summaryHtml;
	}

	// Function to update vehicle summary for a specific card
	function updateVehicleSummary(count) {
		var is_vehicle_required = <?php echo isset($object_det[0]['is_vehicle_required']) ? $object_det[0]['is_vehicle_required'] : '0'; ?>;
		if (is_vehicle_required != 1) return;

		var vehicle_models = <?php echo isset($vehicle_data) ? json_encode($vehicle_data) : '[]'; ?>;
		var no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;

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
				// Remove any leading " - " if present
				vFromTo = vFromTo.replace(/^\s*-\s*/, '');
				nightLabels += vFromTo;
			} else {
				nightLabels += `N${i}`;
			}
			if (i < no_of_night) {
				nightLabels += ' + ';
			}
		}
		$(`#vehicle-summary-header-${count}`).html(`Vehicle Summary (${nightLabels})`);

		var overallTotal = 0;

		$.each(vehicle_models, function(vindex, vmodel) {
			var totalDays = 0;
			var totalRent = 0;
			var totalDistance = 0;
			var totalExtraKm = 0;
			var totalAmount = 0;

			// Loop through all nights and sum up values
			for (let night = 1; night <= no_of_night; night++) {
				var vid = `${count}${night}${vmodel.vehicle_type_id}`;

				var dayRent = parseFloat($(`#day_rent${vid}`).val()) || 0;
				var distance = parseFloat($(`#travel_distance${vid}`).val()) || 0;
				var extraKm = parseFloat($(`#extra_kilometer${vid}`).val()) || 0;
				var vehTotal = parseFloat($(`#veh_total${vid}`).val()) || 0;

				if (dayRent > 0 || distance > 0) {
					totalDays++;
				}
				totalRent += dayRent;
				totalDistance += distance;
				totalExtraKm += extraKm;
				totalAmount += vehTotal;
			}

			// Update summary fields
			$(`#summary_days_${count}_${vindex}`).val(totalDays);
			$(`#summary_rent_${count}_${vindex}`).val(totalRent);
			$(`#summary_distance_${count}_${vindex}`).val(totalDistance);
			$(`#summary_extra_km_${count}_${vindex}`).val(totalExtraKm);
			$(`#summary_total_${count}_${vindex}`).val(totalAmount);

			overallTotal += totalAmount;
		});

		// Update overall total
		$(`#summary_overall_total_${count}`).val(overallTotal);
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
			console.log('Vehicles not required; skipping extra KM charges calculation.');
			return 0;
		}

		// Get all location counts
		let locationCount = $('.location-card').length;
		console.log(`Processing ${locationCount} location cards...`);

		// Object to store totals per vehicle type (carry over across all locations/nights)
		let vehicleTotals = {};

		// Get vehicle models from PHP data
		var vehicle_models = <?php echo json_encode($vehicle_data); ?>;
		console.log('Available vehicle models:', vehicle_models);

		// Map vehicle_type_id to vehicle model for reference
		let vehicleTypeMap = {};
		$.each(vehicle_models, function(index, vmodel) {
			vehicleTypeMap[vmodel.vehicle_type_id] = vmodel.vehicle_model_name;
		});

		// Loop through all locations
		for (let count = 1; count <= locationCount; count++) {
			console.log(`--- Processing Location ${count} ---`);
			let no_of_night = parseInt($(`#no_of_night${count}`).val()) || 0;
			console.log(`  Nights in Location ${count}: ${no_of_night}`);

			if (no_of_night === 0) {
				console.log(`  No nights for Location ${count}; skipping.`);
				continue;
			}

			// Loop through all nights for this location
			for (let night = 1; night <= no_of_night; night++) {
				console.log(`    Night ${night} in Location ${count}:`);

				// Process each vehicle type defined in vehicle_models
				$.each(vehicle_models, function(index, vmodel) {
					let type_id = vmodel.vehicle_type_id;
					let vid = `${count}${night}${type_id}`;

					// Check if inputs exist for this vehicle type on this night
					if ($(`#veh_count${vid}`).length === 0) {
						console.log(`      Skipping Vehicle ${type_id} (${vmodel.vehicle_model_name}, ${vid}): No inputs found.`);
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

					console.log(`      Vehicle ${type_id} (${vmodel.vehicle_model_name}, ${vid}): veh_count=${veh_count}, Per-veh Travel=${travel_distance_per_veh}km → Total Travel=${total_travel_this_night}km, Per-veh Max=${max_km_day_per_veh}km → Total Max=${total_max_this_night}km, Extra KM Rate=${extra_km_rate}`);

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

		console.log('Vehicle Totals Summary:', vehicleTotals);

		// Calculate extra charges for each vehicle type (net carry-over)
		let total_extra_charges = 0;

		$.each(vehicleTotals, function(type_id, data) {
			// Calculate net difference across entire trip: total distance - total max km
			let difference = data.total_distance - data.total_max_km;

			// If positive, calculate extra charges using the type's rate
			if (difference > 0) {
				let extra_charge = difference * data.extra_km_rate;
				total_extra_charges += extra_charge;

				console.log(`Vehicle Type ${type_id} (${data.vehicle_model_name}): Total Distance=${data.total_distance}km, Total Max=${data.total_max_km}km, Net Extra=${difference}km @ ${data.extra_km_rate}/km = Charge=${extra_charge}`);
			} else {
				console.log(`Vehicle Type ${type_id} (${data.vehicle_model_name}): No extra KM (under by ${-difference}km)`);
			}
		});

		// Get current vehicle total (base total without extra charges)
		let base_v_total = get_veh_grand_total();
		console.log(`Base Vehicle Total (from get_veh_grand_total): ${base_v_total}`);

		// Add extra charges to vehicle total
		let new_v_total = base_v_total + total_extra_charges;

		// Update the display
		$('#v_total').text(Math.round(new_v_total));

		// Update grand total
		let accom_total = parseFloat($('#a_total').text()) || 0;
		$('#g_total').text(Math.round(accom_total + new_v_total));

		console.log(`Total Extra KM Charges (carry-over across all vehicle types, scaled by per-night veh_count): ${total_extra_charges}`);
		console.log(`Updated Vehicle Total: ${new_v_total}`);
		console.log(`Accommodation Total: ${accom_total}, Grand Total: ${accom_total + new_v_total}`);

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