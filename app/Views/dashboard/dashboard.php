<?php
$currentDate = date('Y-m-d');
$startOfWeek = date('d-m-Y', strtotime('last Sunday', strtotime($currentDate)));
$endOfWeek = date('d-m-Y', strtotime('next Saturday', strtotime($currentDate)));
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
	<link rel="icon" href="<?php echo base_url('assets/images/brand/favicon_new.png'); ?>" type="image/x-icon" />

	<!-- Title -->
	<title>KHM Dashboard</title>

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
	<style>
		@media (min-width: 768px) {
			.app-header {
				padding-right: 0px !important;
				background: #194d33 !important;
			}
		}

		.app-header {
			background: #194d33 !important;
		}
	</style>

	<style>
		#performance_chart,
		#monthly_sales,
		#lead_management,
		#source_of_leads {
			background: #006699;
			color: white;
			border: 1px solid #00334d;
			border-radius: 12px;
			backdrop-filter: blur(8px);
			-webkit-backdrop-filter: blur(8px);
			padding: 6px 14px;
			font-size: 16px;
			margin: 4px;
			font-weight: 600;
			float: right;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}

		#performance_chart:hover,
		#monthly_sales:hover,
		#lead_management:hover,
		#source_of_leads:hover {
			background: #00334d;
			transform: scale(1.05);
		}

		/*.page-header {
			position: sticky;
			top: 67px;
			z-index: 998;
			background: #d7e6d7; 
			padding: 10px 15px;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
		}
		.app-content,
		.icon-content,
		.section {
			overflow: visible !important;
		}*/
	</style>
	<style>
		#chartdiv {
			width: 100%;
			height: 600px;
		}

		#chartdiv_source {
			width: 100%;
			height: 600px;
		}

		#chartdiv_lb {
			width: 100%;
			height: 600px;
		}

		#chartdiv_tree {
			width: 100%;
			height: 300px;
		}
	</style>

</head>

<body class="app sidebar-mini">

	<!-- Loader -->
	<div id="loading">
		<img src="<?php echo base_url('assets/images/other/loader.svg'); ?>" class="loader-img" alt="Loader">
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
								<img src="<?php echo base_url('assets/images/brand/logowhite.png'); ?>" class="header-brand-img desktop-logo " alt="KHM logo">
								<img src="<?php echo base_url('assets/images/brand/logowhite.png'); ?>" class="header-brand-img desktop-logo-1 " alt="KHM logo">
								<img src="<?php echo base_url('assets/images/brand/favicon_new.png'); ?>" class="mobile-logo" alt="KHM logo">
								<img src="<?php echo base_url('assets/images/brand/favicon_new_white.png'); ?>" class="mobile-logo-1" alt="KHM logo">
							</a>
							<a href="#" data-toggle="sidebar" class="nav-link icon toggle"><i class="fe fe-align-justify fs-20" style="color: white;"></i></a>
							<div class="d-flex header-left left-header">
								<div class="d-none d-lg-block horizontal">
									<ul class="nav">
										<li class="">
											<div class="dropdown d-none d-md-flex">
												<a href="#" class="d-flex nav-link pr-0  pt-2 mt-3 country-flag1" data-toggle="dropdown">
													<span class="d-flex"><img src="<?php echo base_url('assets/images/role.png'); ?>" alt="img" class="avatar country-Flag mr-2 align-self-center"></span>
													<div>
														<span class="d-flex fs-14 mr-3 mt-0" style="color:#fff;"><?php echo session('active_role_name'); ?><span><i class="mdi mdi-chevron-down"></i></span></span>
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
													<span class="d-flex"><img src="<?php echo base_url('assets/images/systems.png'); ?>" alt="img" class="avatar country-Flag mr-2 align-self-center"></span>
													<div>
														<span class="d-flex fs-14 mr-3 mt-0" style="color:#fff;"><?php echo session('system_name'); ?><span><i class="mdi mdi-chevron-down"></i></span></span>
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
										<i class="mdi mdi-arrow-collapse fs-20" style="color:#fff;"></i>
									</a>
								</div>

								<div class="dropdown drop-profile">
									<a href="<?= site_url('Login/logout'); ?>">
										<img class="avatar avatar-md brround" src="<?php echo base_url('assets/images/users/logout.png'); ?>" alt="image">
									</a>
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
						<img src="<?php echo base_url('assets/images/users/users.png'); ?>" alt="profile-img" class="rounded-circle w-25">
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
							<h4 class="page-title mb-0">KHM, Admin Dashboard</h4>
							<small class="text-muted mt-0 fs-14">Welcome back, <?php echo session('user_name'); ?></small>
						</div>
						<div class="page-rightheader">
							<div class="d-flex flex-wrap justify-content-end gap-2">
								<div>
									<a href="#source_leads">
										<button type="button" id="source_of_leads" class="btn btn-success w-100">Source Of Leads</button>
									</a>
								</div>
								<div>
									<a href="#sales_chart">
										<button type="button" id="monthly_sales" class="btn btn-success w-100">Monthly Sales</button>
									</a>
								</div>
								<div>
									<a href="#leads_mn">
										<button type="button" id="lead_management" class="btn btn-success w-100">Lead Management</button>
									</a>
								</div>
								<div>
									<a href="#per_chart">
										<button type="button" id="performance_chart" class="btn btn-success w-100">Performance Chart</button>
									</a>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Leads - <?php echo date('F'); ?></p>
											<h4 class="mb-1 "><?php echo $lead_count_current; ?></h4>
											<?php
											if ($lead_count_previous > $lead_count_current) {
											?>
												<p>(<?php echo $lead_count_previous; ?>)<i class="fe fe-arrow-up"></i> <?php echo $previousMonthName; ?></p>
											<?php } else { ?>
												<p><span class="text-danger">(<?php echo $lead_count_previous; ?>)<i class="fe fe-arrow-down"></i> <?php echo $previousMonthName; ?></span></p>
											<?php }  ?>


										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Arrivals - <?php echo date('F'); ?></p>
											<h4 class="mb-1 "><?php echo $arrivals_count_current; ?></h4>
											<?php
											if ($arrivals_count_previous > $arrivals_count_current) {
											?>
												<p>(<?php echo $arrivals_count_previous; ?>)<i class="fe fe-arrow-up"></i> <?php echo $previousMonthName; ?></p>
											<?php } else { ?>
												<p><span class="text-danger">(<?php echo $arrivals_count_previous; ?>)<i class="fe fe-arrow-down"></i> <?php echo $previousMonthName; ?></span></p>
											<?php }  ?>

										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Sales - <?php echo date('F'); ?></p>
											<h4 class="mb-1 "><?php echo $sales_count_current; ?></h4>
											<?php
											if ($sales_count_previous > $sales_count_current) {
											?>
												<p>(<?php echo $sales_count_previous; ?>)<i class="fe fe-arrow-up"></i> <?php echo $previousMonthName; ?></p>
											<?php } else { ?>
												<p><span class="text-danger">(<?php echo $sales_count_previous; ?>)<i class="fe fe-arrow-down"></i> <?php echo $previousMonthName; ?></span></p>
											<?php }  ?>

										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Target - <?php echo date('F'); ?></p>
											<h4 class="mb-1 "><?php echo $target_count_current; ?></h4>
											<?php
											if ($target_count_previous > $target_count_current) {
											?>
												<p>(<?php echo $target_count_previous; ?>)<i class="fe fe-arrow-up"></i> <?php echo $previousMonthName; ?></p>
											<?php } else { ?>
												<p><span class="text-danger">(<?php echo $target_count_previous; ?>)<i class="fe fe-arrow-down"></i> <?php echo $previousMonthName; ?></span></p>
											<?php } ?>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
												Today
											</p>
											<p><b>Arrivals : <?php echo $arrivals_today_count; ?></b></p>
											<p><b>Departure : <?php echo $departure_today_count; ?></b></p>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Follow Ups</p>
											<p><b>Coming : <?php echo $followup_coming_count; ?></b></p>
											<p><b>Pending : <?php echo $followup_pending_count; ?></b></p>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Client In Tour </p>
											<p><b><?php echo $client_in_tour_count; ?></b></p>
											<p>&nbsp;</p>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Payment</p>
											<p><b>Partial : <?php echo $partial_payment_count; ?></b></p>
											<p><b>Not Received : <?php echo $not_receive_payment_count; ?></b></p>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Tomorrow</p>

											<p><b>Arrivals : <?php echo $arrivals_tomorrow_count; ?></b></p>
											<p><b>Departure : <?php echo $departure_tomorrow_count; ?></b></p>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Yesterday Enquiries</p>
											<p><b>Confirmation : <?php echo $yesterday_enq_confirmation_count; ?></b></p>
											<p><b>Ammendment : <?php echo $yesterday_enq_amend_count; ?></b></p>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Today Enquiries</p>
											<p><b>Confirmation : <?php echo $today_enq_confirmation_count; ?></b></p>
											<p><b>Ammendment : <?php echo $today_enq_amend_count; ?></b></p>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-3">
							<div class="card shadow-lg border-0 rounded-4 bg-gradient"
								style="border-radius: 20px;background: linear-gradient(to right, #ffffff, #d1e0e0); transition: transform 0.3s ease; color: #003300;"
								onmouseover="this.style.transform='scale(1.02)'"
								onmouseout="this.style.transform='scale(1)'">
								<div class="card-body">
									<div class="d-flex">
										<div class="text-center w-100">
											<p class="mb-2" style="font-style: italic; font-weight: bold; font-size: 1.2rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Today Cut-off Dates</p>
											<p><b>Hotels : 0</b></p>
											<p><b>Agents : 0</b></p>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-12 product">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Employee Hierarchy</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div id="chartdiv_tree"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!----------Performane Chart------------------------->
					<div class="row" id="per_chart">
						<div class="col-lg-12">
							<div class="wideget-user-tab wideget-user-tab3 border-bottom">
								<div class="tab-menu-heading">
									<div class="tabs-menu1">
										<ul class="nav">
											<li class=""><a href="#tab-5" class="h5 active" data-toggle="tab">Executive</a></li>
											<li><a href="#tab-6" data-toggle="tab" class="h5">SOP</a></li>
											<li><a href="#tab-7" data-toggle="tab" class="h5">TOP</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="bg-white widget-user mb-0">
								<div class="card-body">
									<div class="border-0">
										<div class="tab-content">
											<div class="tab-pane active" id="tab-5">
												<div class="profile-log-switch">
													<!-- Row-->
													<div class="row">
														<div class="col-xl-12 ">
															<div class="">
																<div class="card mb-0 box-shadow-0">
																	<div class="card-header ">
																		<h3 class="card-title ">Executives</h3>
																	</div>
																	<div class="">
																		<div class="table-responsive border-top">
																			<table class="table  table-responsive-md table-striped mb-0 text-nowrap">
																				<thead>
																					<tr>
																						<th rowspan="2" style="text-align:left;">Name</th>
																						<th colspan="7" style="text-align:center;">Week Days (<?php echo $startOfWeek; ?> - <?php echo $endOfWeek; ?>)</th>
																						<th rowspan="2" style="text-align:left;"><?php echo date('F'); ?></th>
																					</tr>
																					<tr>
																						<th>Sun</th>
																						<th>Mon</th>
																						<th>Tue</th>
																						<th>Wed</th>
																						<th>Thu</th>
																						<th>Fri</th>
																						<th>Sat</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php foreach ($executive_performance as $key => $val) { ?>
																						<tr>
																							<td><?php echo isset($val[0]) ? $val[0] : ''; ?></td>
																							<td><?php echo isset($val[1]) ? $val[2] . ' (' . $val[1] . ')' : ''; ?></td>
																							<td><?php echo isset($val[3]) ? $val[4] . ' (' . $val[3] . ')' : ''; ?></td>
																							<td><?php echo isset($val[5]) ? $val[6] . ' (' . $val[5] . ')' : ''; ?></td>
																							<td><?php echo isset($val[7]) ? $val[8] . ' (' . $val[7] . ')' : ''; ?></td>
																							<td><?php echo isset($val[9]) ? $val[10] . ' (' . $val[9] . ')' : ''; ?></td>
																							<td><?php echo isset($val[11]) ? $val[12] . ' (' . $val[11] . ')' : ''; ?></td>
																							<td><?php echo isset($val[13]) ? $val[14] . ' (' . $val[13] . ')' : ''; ?></td>
																							<td><?php echo isset($val[15]) ? $val[16] . ' (' . $val[15] . ')' : ''; ?></td>
																						</tr>
																					<?php } ?>
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!-- End Row -->
												</div>
											</div>
											<div class="tab-pane" id="tab-6">
												<!-- Row-->
												<div class="row">
													<div class="col-xl-12 ">
														<div class="">
															<div class="card mb-0 box-shadow-0">
																<div class="card-header ">
																	<h3 class="card-title ">Sales Operation Executives</h3>
																</div>
																<div class="">
																	<div class="table-responsive border-top">
																		<table class="table table-responsive-md table-striped mb-0 text-nowrap">
																			<thead>
																				<tr>
																					<th rowspan="2" style="text-align:left;">Name</th>
																					<th colspan="7" style="text-align:center;">Week Days (<?php echo $startOfWeek; ?> - <?php echo $endOfWeek; ?>)</th>
																					<th rowspan="2" style="text-align:left;"><?php echo date('F'); ?></th>
																				</tr>
																				<tr>
																					<th>Sun</th>
																					<th>Mon</th>
																					<th>Tue</th>
																					<th>Wed</th>
																					<th>Thu</th>
																					<th>Fri</th>
																					<th>Sat</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php foreach ($sop_performance as $key => $val) { ?>
																					<tr>
																						<td><?php echo isset($val[0]) ? $val[0] : ''; ?></td>
																						<td><?php echo isset($val[1]) ? $val[2] . ' (' . $val[1] . ')' : ''; ?></td>
																						<td><?php echo isset($val[3]) ? $val[4] . ' (' . $val[3] . ')' : ''; ?></td>
																						<td><?php echo isset($val[5]) ? $val[6] . ' (' . $val[5] . ')' : ''; ?></td>
																						<td><?php echo isset($val[7]) ? $val[8] . ' (' . $val[7] . ')' : ''; ?></td>
																						<td><?php echo isset($val[9]) ? $val[10] . ' (' . $val[9] . ')' : ''; ?></td>
																						<td><?php echo isset($val[11]) ? $val[12] . ' (' . $val[11] . ')' : ''; ?></td>
																						<td><?php echo isset($val[13]) ? $val[14] . ' (' . $val[13] . ')' : ''; ?></td>
																						<td><?php echo isset($val[15]) ? $val[16] . ' (' . $val[15] . ')' : ''; ?></td>
																					</tr>
																				<?php } ?>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- End Row -->
											</div>
											<div class="tab-pane" id="tab-7">
												<div class="row">
													<div class="col-12">
														<div class="">
															<div class="border border-bottom-0 d-flex p-3">
																<div class="text-left float-left">
																	<h3 class="card-title mt-2 ml-3">Transport Operation Exeutives</h3>
																</div>

															</div>
															<div id="table1" class="table-responsive table-editable">
																<table class="table table-bordered table-responsive-md table-striped mb-0 text-nowrap">
																	<tr>
																		<th rowspan="2" style="text-align:left;">Name</th>
																		<th colspan="7" style="text-align:center;">Week Days (<?php echo $startOfWeek; ?> - <?php echo $endOfWeek; ?>)</th>
																		<th rowspan="2" style="text-align:left;"><?php echo date('F'); ?></th>
																	</tr>
																	<tr>
																		<th>Sun</th>
																		<th>Mon</th>
																		<th>Tue</th>
																		<th>Wed</th>
																		<th>Thu</th>
																		<th>Fri</th>
																		<th>Sat</th>
																	</tr>

																	<?php foreach ($top_performance as $key => $val) { ?>
																		<tr>
																			<td><?php echo isset($val[0]) ? $val[0] : ''; ?></td>
																			<td><?php echo isset($val[1]) ? $val[2] . ' (' . $val[1] . ')' : ''; ?></td>
																			<td><?php echo isset($val[3]) ? $val[4] . ' (' . $val[3] . ')' : ''; ?></td>
																			<td><?php echo isset($val[5]) ? $val[6] . ' (' . $val[5] . ')' : ''; ?></td>
																			<td><?php echo isset($val[7]) ? $val[8] . ' (' . $val[7] . ')' : ''; ?></td>
																			<td><?php echo isset($val[9]) ? $val[10] . ' (' . $val[9] . ')' : ''; ?></td>
																			<td><?php echo isset($val[11]) ? $val[12] . ' (' . $val[11] . ')' : ''; ?></td>
																			<td><?php echo isset($val[13]) ? $val[14] . ' (' . $val[13] . ')' : ''; ?></td>
																			<td><?php echo isset($val[15]) ? $val[16] . ' (' . $val[15] . ')' : ''; ?></td>
																		</tr>
																	<?php } ?>

																</table>
															</div>
														</div>
													</div>
												</div>
												<!--row closed-->
											</div>


										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!------------------------------------------------------------------------------------------->
					<div class="row" id="sales_chart">
						<div class="col-xl-12 product">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Sales Chart</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div id="chartdiv"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="source_leads">
						<div class="col-xl-12 product">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Source Of Leads</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div id="chartdiv_source"></div>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="leads_mn">
						<div class="col-xl-12 product">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Lead Management</h3>
								</div>
								<div class="card-body">
									<div class="row">
										<div id="chartdiv_lb"></div>

									</div>
								</div>
							</div>
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
				<div class="mt-2 mb-2 text-center">
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

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
	var sales_datas = <?php echo json_encode($sales_datas); ?>;
	am5.ready(function() {
		var root = am5.Root.new("chartdiv");
		root.setThemes([
			am5themes_Animated.new(root)
		]);
		var chart = root.container.children.push(am5xy.XYChart.new(root, {
			panX: false,
			panY: false,
			paddingLeft: 0,
			wheelX: "panX",
			wheelY: "zoomX",
			layout: root.verticalLayout
		}));
		var legend = chart.children.push(
			am5.Legend.new(root, {
				centerX: am5.p50,
				x: am5.p50
			})
		);

		var data = sales_datas

		var xRenderer = am5xy.AxisRendererX.new(root, {
			cellStartLocation: 0.1,
			cellEndLocation: 0.9,
			minorGridEnabled: true
		})

		var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
			categoryField: "year",
			renderer: xRenderer,
			tooltip: am5.Tooltip.new(root, {})
		}));

		xRenderer.grid.template.setAll({
			location: 1
		})

		xAxis.data.setAll(data);

		var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
			renderer: am5xy.AxisRendererY.new(root, {
				strokeOpacity: 0.1
			})
		}));


		function makeSeries(name, fieldName) {
			var series = chart.series.push(am5xy.ColumnSeries.new(root, {
				name: name,
				xAxis: xAxis,
				yAxis: yAxis,
				valueYField: fieldName,
				categoryXField: "year"
			}));

			series.columns.template.setAll({
				tooltipText: "{name}, {categoryX}:{valueY}",
				width: am5.percent(90),
				tooltipY: 0,
				strokeOpacity: 0
			});

			series.data.setAll(data);

			series.appear();

			series.bullets.push(function() {
				return am5.Bullet.new(root, {
					locationY: 0,
					sprite: am5.Label.new(root, {
						text: "{valueY}",
						fill: root.interfaceColors.get("alternativeText"),
						centerY: 0,
						centerX: am5.p50,
						populateText: true
					})
				});
			});

			legend.data.push(series);
		}

		makeSeries("target", "target");
		makeSeries("sales", "sales");

		chart.appear(1000, 100);

	});
</script>

<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script>
	var sol_datas = <?php echo json_encode($sol_datas); ?>;
	am5.ready(function() {
		var root = am5.Root.new("chartdiv_source");
		root.setThemes([
			am5themes_Animated.new(root)
		]);
		var chart = root.container.children.push(
			am5percent.PieChart.new(root, {
				endAngle: 270
			})
		);
		var series = chart.series.push(
			am5percent.PieSeries.new(root, {
				valueField: "value",
				categoryField: "category",
				endAngle: 270
			})
		);

		series.states.create("hidden", {
			endAngle: -90
		});

		series.data.setAll(sol_datas);

		series.appear(1000, 100);

	});
</script>

<script>
	var lb_datas = <?php echo json_encode($lb_datas); ?>;
	am5.ready(function() {
		var root = am5.Root.new("chartdiv_lb");
		root.setThemes([
			am5themes_Animated.new(root)
		]);
		var chart = root.container.children.push(am5xy.XYChart.new(root, {
			panX: false,
			panY: false,
			paddingLeft: 0,
			wheelX: "panX",
			wheelY: "zoomX",
			layout: root.verticalLayout
		}));
		var legend = chart.children.push(
			am5.Legend.new(root, {
				centerX: am5.p50,
				x: am5.p50
			})
		);

		var data = lb_datas

		var xRenderer = am5xy.AxisRendererX.new(root, {
			cellStartLocation: 0.1,
			cellEndLocation: 0.9,
			minorGridEnabled: true
		})

		var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
			categoryField: "year",
			renderer: xRenderer,
			tooltip: am5.Tooltip.new(root, {})
		}));

		xRenderer.grid.template.setAll({
			location: 1
		})

		xAxis.data.setAll(data);

		var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
			renderer: am5xy.AxisRendererY.new(root, {
				strokeOpacity: 0.1
			})
		}));


		function makeSeries(name, fieldName) {
			var series = chart.series.push(am5xy.ColumnSeries.new(root, {
				name: name,
				xAxis: xAxis,
				yAxis: yAxis,
				valueYField: fieldName,
				categoryXField: "year"
			}));

			series.columns.template.setAll({
				tooltipText: "{name}, {categoryX}:{valueY}",
				width: am5.percent(90),
				tooltipY: 0,
				strokeOpacity: 0
			});

			series.data.setAll(data);

			series.appear();

			series.bullets.push(function() {
				return am5.Bullet.new(root, {
					locationY: 0,
					sprite: am5.Label.new(root, {
						text: "{valueY}",
						fill: root.interfaceColors.get("alternativeText"),
						centerY: 0,
						centerX: am5.p50,
						populateText: true
					})
				});
			});

			legend.data.push(series);
		}

		makeSeries("leads", "leads");
		makeSeries("arrivals", "arrivals");
		makeSeries("sales", "sales");

		chart.appear(1000, 100);

	});
</script>



<script src="https://cdn.amcharts.com/lib/5/hierarchy.js"></script>
<script>
	var team_leads_exe = <?php echo json_encode($team_leads_exe); ?>;
	var sop_leads_exe = <?php echo json_encode($sop_leads_exe); ?>;
	var top_leads_exe = <?php echo json_encode($top_leads_exe); ?>;
	am5.ready(function() {
		var root = am5.Root.new("chartdiv_tree");
		root.setThemes([am5themes_Animated.new(root)]);

		var zoomableContainer = root.container.children.push(
			am5.ZoomableContainer.new(root, {
				width: am5.p100,
				height: am5.p100,
				wheelable: true,
				pinchZoom: true
			})
		);

		var zoomTools = zoomableContainer.children.push(am5.ZoomTools.new(root, {
			target: zoomableContainer
		}));

		var series = zoomableContainer.contents.children.push(am5hierarchy.Tree.new(root, {
			singleBranchOnly: false,
			downDepth: 1,
			initialDepth: 10,
			valueField: "value",
			categoryField: "name",
			childDataField: "children"
		}));

		series.labels.template.set("minScale", 0);

		// Dummy arrays
		const teamLeads = team_leads_exe;

		const sopLeads = sop_leads_exe;

		const topLeads = top_leads_exe;

		// Build tree structure
		const data = {
			name: "Admin",
			children: [{
					name: "Team Lead",
					children: teamLeads.map(lead => ({
						name: lead.name,
						children: lead.executives.map(exec => ({
							name: exec,
							value: 1
						}))
					}))
				},
				{
					name: "SOP Lead",
					children: sopLeads.map(lead => ({
						name: lead.name,
						children: lead.executives.map(exec => ({
							name: exec,
							value: 1
						}))
					}))
				},
				{
					name: "TOP Lead",
					children: topLeads.map(lead => ({
						name: lead.name,
						children: lead.executives.map(exec => ({
							name: exec,
							value: 1
						}))
					}))
				}
			]
		};

		series.data.setAll([data]);
		series.set("selectedDataItem", series.dataItems[0]);
		series.appear(1000, 100);
	});
</script>