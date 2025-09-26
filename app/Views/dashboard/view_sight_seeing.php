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
		<title>KHM Dashboard</title>

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

		<link href="<?php echo base_url('assets/plugins/datatable/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" />


		<!-- Font-icons css -->
		<link  href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="<?php echo base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

		<!-- Nice-select css  -->
		<link href="<?php echo base_url('assets/plugins/jquery-nice-select/css/nice-select.css'); ?>" rel="stylesheet"/>
		
		<link rel="stylesheet" href="https://pn-ciamis.go.id/asset/DataTables/extensions/Responsive/css/responsive.dataTables.css">
		<link rel="stylesheet" href="https://pn-ciamis.go.id/asset/DataTables/extensions/Buttons/css/buttons.dataTables.css">
		<!-- Color-palette css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins.css'); ?>"/>
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/multipleselect/multiple-select.css'); ?>">
	<style>
		.modal-dialog-custom {
    max-width: 90%;
    width: 1200px; /* Adjust as needed */
    margin: auto;
}

.modal-content {
    overflow: hidden; /* Prevents overflow of content */
    max-width: 100%; /* Ensures the content does not exceed the modal width */
    box-sizing: border-box; /* Ensures padding and border are included in the width */
	height: 100%; /* Make content take full modal height */
    overflow-y: auto; /* Enable scrollbars if necessary */
}

.modal-footer {
    display: flex;
    justify-content: flex-end; /* Align buttons to the right */
    padding: 15px; /* Add appropriate padding */
    border-top: 1px solid #dee2e6; /* Optional: Add a top border for separation */
    width: 100%; /* Ensure the footer fits within the modal */
    box-sizing: border-box; /* Prevents overflow due to padding */
}
.custom-modal-width {
    max-width: 90%; /* Adjust as needed */
    width: 90%;
	height: 80%;
}
.custom-modal-widths {
    max-width: 50%; /* Adjust as needed */
    width: 50%;
	height: 80%;
}
.table th, .text-wrap table th {
    color: rgb(4, 96, 4) !important;
}

.modal-header {
    background-color:#339966; /* Change to your desired background color */
    color: white; /* Change to your desired text color */
}
.modal-title {
    color: white; /* Ensures the title text is also white */
}
.close {
    color: white;
    opacity: 1;
}
.close:hover {
    color: #ccc;
}
table.dataTable.dtr-inline.collapsed > tbody > tr > td:first-child:before, table.dataTable.dtr-inline.collapsed > tbody > tr > th:first-child:before {
    top: 0px !important;
}


#hotel_table {
    width: 100%; /* Ensure the table takes up the full width of its container */
    table-layout: auto; /* Let the browser determine the column widths */
  
}

#hotel_table th, #hotel_table td {
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

#hotel_table th.auto-width, #hotel_table td.auto-width {
    width: auto; /* Auto width for content */
    max-width: 200px; /* Optional: Limit max width */
}
	</style>
	</head>

	<body class="app sidebar-mini">	
    <?php
		$home_url = base_url();
	?>
		<!-- Loader -->
		<div id="loading">
			<img src="<?php echo base_url('assets/images/other/loader.svg'); ?>" class="loader-img" alt="Loader">
		</div>

		
											
											<div class="modal fade overflow-hidden" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
												<div class="modal-dialog custom-modal-widths" role="document">
													<div class="modal-content">
														
														
														<div class="modal-body">
															<p id="mod_des_id"></p>
															<img src="" alt="img">
														</div>
														
														<div class="modal-footer">
															
															<button type="button" class="btn btn-success  ml-auto" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
		


		<div class="modal fade" id="seasonsmodal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog custom-modal-width" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="example-Modal3"><span id="ssn_header"></span> Sight Seeing - Season Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						
									<div class="row">
										<div class="col-lg-3">
											<input type="hidden" name="hd_edit" id="hd_edit_ssn" value="0">
											<label class="form-control-label">Season Name <span style="color: red;">*</span></label>
											<input class="form-control" type="text" id="season_name">
										</div>
										<div class="col-lg-3">
											<input type="hidden" name="hd_object_id_ssn" id="hd_object_id_ssn" value="">
											<label class="form-control-label">Start Date <span style="color: red;">*</span></label>
											<input class="form-control" type="date" id="ssn_start_date">
										</div>
										<div class="col-lg-3">
											<label class="form-control-label">End Date <span style="color: red;">*</span></label>
											<input class="form-control" type="date" id="ssn_end_date">
										</div>
									
										<div class="col-lg-2">
											<label class="form-control-label">Tariff <span style="color: red;">*</span></label>
											<input class="form-control" type="text" id="tariff" inputmode="decimal" pattern="[0-9]*" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
										</div>
										<div class="col-lg-1" style="padding-top:25px;">
											<button type="button" id="btn_seasons" class="btn btn-success" style="float:right;"><span id="ssn_span_btn"></span></button>
										</div>
									</div>
									
								<div id="season-alert" style="padding-top:10px;"></div>
							
								<div class="row" style="padding-top:5px;">
									<div class="col-lg-12">
										<table class="table" id="table_seasons" style="width: 100%;">
											<thead style="background-color:#c6ecd9;"> 
												<tr>
													<th scope="col">Season Name</th>
													<th scope="col">Start Date</th>
													<th scope="col">End Date</th>

													<th scope="col">Tariff</th>
													<th scope="col">Edit</th>
													
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
								<h4 class="page-title mb-0"><?php echo $object_class_name; ?></h4>
								<small class="text-muted mt-0 fs-14">View / Add / Edit <?php echo $object_class_name; ?> Details</small>
							</div>

                            

							<div class="page-rightheader">
								<div class="ml-3 ml-auto d-flex">
									<!--<div class="mt-3 mt-md-0">
										<div class="border-right pr-4 mt-1 d-xl-block">
											<p class="text-muted mb-2">Category</p>
											<h6 class="font-weight-semibold mb-0">All Categories</h6>
										</div>
									</div>
									<div class="mt-3 mt-md-0">
										<div class="border-right pl-0 pl-md-4 pr-4 mt-1 d-xl-block">
											<p class="text-muted mb-1">Customer Rating</p>
											<div class="wideget-user-rating">
												<a href="#">
													<i class="fa fa-star text-warning"></i>
												</a>
												<a href="#">
													<i class="fa fa-star text-warning"></i>
												</a>
												<a href="#">
													<i class="fa fa-star text-warning"></i>
												</a>
												<a href="#">
													<i class="fa fa-star text-warning"></i>
												</a>
												<a href="#">
													<i class="fa fa-star-o text-warning mr-1"></i>
												</a>
												<span class="">(4.5/5)</span>
											</div>
										</div>
									</div>-->
									<span class="mt-3 mt-md-0 pg-header">
										<a href="<?=site_url('Dashboard/add_object_ss/'.$object_class_id);?>" class="btn btn-success ml-0 ml-md-4 mt-1 "><i class="typcn typcn-plus mr-1"></i>Create New</a>
									</span>
								</div>
							</div>
						</div>
						<!-- Page-header closed -->

						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									
									
									<div class="card-body">
										<!-- ✅ FILTER DROPDOWN GOES HERE -->
									<div class="row mb-3">
										<div class="col-md-3">
											<label for="location_filter"><strong>Filter by Location</strong></label>
											<select id="location_filter" class="form-control">
												<option value="">All Locations</option>
												<!-- Populated via JS -->
											</select>
										</div>
									</div>
										<div class="table-responsive">
										    <table id="ss_table" class="table table-bordered table-striped" cellspacing="0" width="100%">
											<thead style="background-color:#c6ecd9;">
													<tr>
														<th><?php echo $object_class_name; ?> Name</th>
														<th>Location</th>
														<th>S.End Date</th>
														<th>Distance</th>
														<th>Description</th>
														<th>Season</th>
														<th>Edit</th>
														
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
					</div>
				</div>
				<!-- App-content closed -->
			</div>

			<!-- Right-sidebar-->
			
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

		
		

		<!-- Bootstrap-colorpicker js -->
		<script src="<?php echo base_url('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js'); ?>"></script>

		<!-- Bootstrap-timepicker js -->
		<script src="<?php echo base_url('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/select2.js'); ?>"></script>



		<script src="<?php echo base_url('assets/plugins/datatable/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/datatable/datatable.js'); ?>"></script>
		
		<script src="https://pn-ciamis.go.id/asset/DataTables/extensions/Responsive/js/dataTables.responsive.js"></script>
		<script src="https://pn-ciamis.go.id/asset/DataTables/extensions/Buttons/js/dataTables.buttons.js"></script>
		<script src="https://pn-ciamis.go.id/asset/DataTables/extensions/Buttons/js/buttons.colVis.js"></script>

		<script src="<?php echo base_url('assets/plugins/multipleselect/multiple-select.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/multipleselect/multi-select.js'); ?>"></script>
	</body>
</html>

<script>
$(document).ready(function() {
	var object_class_id = "<?php echo $object_class_id; ?>";
	$.ajax({
			url: '<?= site_url('Dashboard/get_unique_locations'); ?>',
			type: 'POST',
			data: {
				object_class_id: object_class_id
			},
			dataType: 'json',
			success: function(response) {
				$('#location_filter').empty().append('<option value="">All Locations</option>');
				response.forEach(function(row) {
					if (row.geog_name) {
						$('#location_filter').append('<option value="' + row.geog_name + '">' + row.geog_name + '</option>');
					}
				});
			}
		});
    $('#ss_table').DataTable({
		'processing': true,
        'serverSide': true,
        'responsive': true,
		'serverMethod': 'post',
        'pageLength': 10,
        'dom': 'Bfrtip',
        'buttons': [
            'colvis'
        ],
		'ajax': {
                'url': '<?=site_url('Dashboard/ss_list_view');?>',
                'type': 'POST',
				
				'data': function(d) {

					d.object_class_id = object_class_id;
					d.location_filter = $('#location_filter').val(); // ✅ Include selected location
				
				}
            },
            'columns': [{
                data: 'object_name'
            },

			{
                data: 'geog_name'
            },
			{
					title: 'S.End date',
					data: 'latest_end_date',
				},
            {
                data: 'sightseeing_distance'
            },
			{
                data: 'object_id',
                render: function (data, type, row, meta) {
					let obj_name = row.object_name.replace(/ /g, "_");
					return '<a class="decription_view" data-id-object=' + data + ' data-id-name=' + obj_name + ' data-toggle="tooltip" data-original-title="Image and Description" href=""><i class="fa fa-eye" style="color:#006600"></i></a>';
                }
            },
		
			{
                data: 'object_id',
                render: function (data, type, row, meta) {
					let obj_name = row.object_name.replace(/ /g, "_");
					return '<a class="season_form" data-id-object=' + data + ' data-id-name=' + obj_name + ' data-toggle="tooltip" data-original-title="Season" href=""><i class="fa fa-tripadvisor" style="color:#006600"></i></a>';
                }
            },
			{
                data: 'object_id',
                render: function (data, type, row, meta) {
					return '<a data-toggle="tooltip" data-original-title="Edit" href="<?=site_url('Dashboard/add_object_ss/');?>'+object_class_id+'/'+data+'"><i class="fa fa-edit" style="color:#339966"></i></a>';
                }
            }
		
        ]
    });
	$('#location_filter').on('change', function() {
			$('#ss_table').DataTable().ajax.reload();
		});
});
</script>

<script type="text/javascript">
    $(document).on('click', '.season_form', function(e) {
        e.preventDefault();
		var v_names = $(this).attr('data-id-name');
		var object_id = $(this).attr('data-id-object');
		let vehicle_name = v_names.replace(/_/g, " ");
		$('#ssn_header').html(vehicle_name);
		season_form_datatable(object_id);
    });

	$(document).on('click', '#btn_seasons', function (e) {
        e.preventDefault();
		var hd_edit_ssn = $('#hd_edit_ssn').val();
		var object_id = $('#hd_object_id_ssn').val();
		var start_date = $('#ssn_start_date').val();
		var end_date = $('#ssn_end_date').val();
		var season_name = $('#season_name').val();

		var tariff = $('#tariff').val();
		if(season_name == '' || season_name == null || season_name == 'undefined'){
            alert("Please Enter Season Name");
		}
		else if(start_date == '' || start_date == null || start_date == 'undefined'){
            alert("Please select Start Date");
		}
		else if(end_date == '' || end_date == null || end_date == 'undefined'){
            alert("Please select End Date");
		}
		else if(start_date > end_date){
            alert("Start date must be less than or equal to end date");
		}
		else if(season_name == '' || season_name == null || season_name == 'undefined'){
            alert("Please Enter Season Name");
		}
		else if(tariff == '' || tariff == null || tariff == 'undefined'){
            alert("Please Enter Tariff");
		}
		else{
				$.ajax({
					url: '<?=site_url('Dashboard/addnewssSeasons');?>',
					method: 'POST',
					data: {
						hd_edit_ssn:hd_edit_ssn,
						object_id:object_id,
                		start_date: start_date,
						end_date: end_date,
						season_name: season_name,
						tariff: tariff
					},
					dataType: 'json',
					success: function (response) {
						if(response == 1){
							alertHtml = `<div class="alert alert-success alert-dismissible fade show" role="alert">
								<span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
								<span class="alert-inner--text"><strong>Success!</strong> Season Added.</span>
								<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>`;
							season_form_datatable(object_id);
							$('#ssn_start_date').val('');
							$('#ssn_end_date').val('');
							$('#season_name').val('');
							$('#tariff').val('');
						}
						else if(response == 2){
							alertHtml = `<div class="alert alert-success alert-dismissible fade show" role="alert">
								<span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
								<span class="alert-inner--text"><strong>Success!</strong> Season Updated.</span>
								<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>`;

							season_form_datatable(object_id);
							$('#ssn_start_date').val('');
							$('#ssn_end_date').val('');
							$('#season_name').val('');
							$('#max_pax').val('');
							$('#rate_per_day').val('');
							$('#extra_km_rate').val('');
							$('#max_km_per_day').val('');
						}
						else{
							alertHtml = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
								<span class="alert-inner--icon"><i class="fe fe-info"></i></span>
								<span class="alert-inner--text"><strong>Warning!</strong> This season already exist!</span>
								<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>`;
						}
						$('#season-alert').html(alertHtml);
						setTimeout(function () {
							$(".alert").fadeOut("slow", function () {
								$(this).remove();
							});
						}, 2000);
					},
					error: function (xhr, status, error) {
						console.error('Error adding node:', error);
					}
				});
			}
    	});

	function season_form_datatable(object_id){
		if ($.fn.DataTable.isDataTable('#table_seasons')) {
            $('#table_seasons').DataTable().destroy();
        }
        var table = $('#table_seasons').DataTable({
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?=site_url('Dashboard/ss_seasons_modal');?>',
                'data': {
					'object_id': object_id
                }
            },
            'columns': [
				{
                data: 'season_name'
            },
            {
                data: 'sdate'
            },
			{
                data: 'edate'
            },
			{
                data: 'tariff'
            },
			{
                data: 'season_id',
                render: function (data, type, row, meta) {
                    if (data) {
                		return '<a href="" class="ssn_edit_id" data-id="'+data+'"><i class="fa fa-edit" style="color:rgb(7, 138, 2); padding-right:10px;" type="button" title="Edit Season"></i></a>';
                    } else {
                        return '';
                    }
                }
            }
            ],
			paging: true, // Ensure paging is enabled
    		pageLength: 10, // Number of rows per page
    		lengthMenu: [5, 10, 25, 50], // Options for rows per page
    		order: [[0, 'asc']] // Default sorting
        });
        /*$('#refreshButton').on('click', function() {
            table.ajax.reload();
        });*/
		$('#hd_object_id_ssn').val(object_id);
		$('#hd_edit_ssn').val(0);
		$('#ssn_span_btn').html("Save");
        $('#seasonsmodal').modal('show');
	}
</script>
<script type="text/javascript">
    $(document).on('click', '.ssn_edit_id', function(e) {
        e.preventDefault();
        var season_id = $(this).attr('data-id');
        $.ajax({
			url: '<?=site_url('Dashboard/fetchssSeasonDetails');?>',
			method: 'POST',
			data: { season_id: season_id },
			dataType: 'json',
			success: function (response) {
				$('#hd_edit_ssn').val(season_id);
				$('#ssn_span_btn').html("Update");
				$('#ssn_start_date').val(response[0].season_start_date);
				$('#ssn_end_date').val(response[0].season_end_date);
				$('#season_name').val(response[0].season_name);
				$('#tariff').val(response[0].tariff);
			},
			error: function (xhr, status, error) {
				console.error('Error fetching weekend data:', error);
			}
		});
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.decription_view', function(e) {
        e.preventDefault();
		var v_names = $(this).attr('data-id-name');
		var object_id = $(this).attr('data-id-object');
		var vehicle_name = v_names.replace(/_/g, " ");
		$.ajax({
			url: '<?=site_url('Dashboard/fetchDescriptionandImage');?>',
			method: 'POST',
			data: { object_id: object_id },
			dataType: 'json',
			success: function (response) {
				if (response.length > 0) {
					var obj_id = response[0].object_id;	
					var image_name = response[0].img_name;	
					var imgpath = "<?= base_url('uploads/sight/') ?>" + obj_id + '/' + image_name;
					$('#mod_des_id').html(response[0].sightseeing_description);
					
					$('#modal_image img').attr('src', imgpath);
                	$('#modal_image').modal('show');
            	} else {
                	$('#not_found').html("");
            	}
			},
			error: function (xhr, status, error) {
				console.error('Error fetching weekend data:', error);
			}
		});
    });
</script>
<script>
      function switchroles(role_id,role_name) {
        const newUrl = '<?php echo site_url('Dashboard/add_entity/3'); ?>'
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