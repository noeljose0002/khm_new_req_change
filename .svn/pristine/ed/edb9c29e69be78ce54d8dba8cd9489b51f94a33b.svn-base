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
		<title>KHM Login</title>

		<!-- Bootstrap css -->
		<link href="<?php echo base_url('assets/plugins/bootstrap-4.1.3/css/bootstrap.min.css'); ?>" rel="stylesheet" />

		<!-- Style css -->
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/css/default.css'); ?>" rel="stylesheet" />

		<!-- Sidemenu css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sidemenu/sidemenu.css'); ?>">

		<!-- owl-carousel css-->
		<link href="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.css'); ?>" rel="stylesheet" />

		<!--Bootstrap-daterangepicker css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>">

		<!--Bootstrap-datepicker css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css'); ?>">

		<!-- Sidemenu-responsive  css -->
		<link href="<?php echo base_url('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css'); ?>" rel="stylesheet">

		<!-- P-scroll css -->
		<link href="<?php echo base_url('assets/plugins/p-scroll/p-scroll.css'); ?>" rel="stylesheet" type="text/css">

		<!--Font icons css-->
		<link  href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="<?php echo base_url('assets/plugins/sidebar/sidebar.css'); ?>" rel="stylesheet">

		<!-- Nice-select css  -->
		<link href="<?php echo base_url('assets/plugins/jquery-nice-select/css/nice-select.css'); ?>" rel="stylesheet"/>

		<!-- Color-palette css-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins.css'); ?>"/>
		<style>
        .error { color: red; font-size: 0.9em; }
        .valid { color: green; font-size: 0.9em; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 5px 0; }

		#passwordFeedback {
			list-style: disc; /* Standard bullet */
			margin: 0; /* Remove default margin */
			padding-left: 20px; /* Indent bullets slightly */
			text-align: left; /* Align text to the left */
		}

		#passwordFeedback li {
			margin-bottom: 1px; /* Add spacing between list items */
		}

		#btn_signin {
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

		#btn_signin:hover {
			background: #006600;
			transform: scale(1.05);
		}
    </style>

	</head>
	<body class="app h-100vh">

		<!-- Loader -->
		<div id="loading">
			<img src="<?php echo base_url('assets/images/other/loader.svg'); ?>" class="loader-img" alt="Loader">
		</div>

		<!-- Page opened -->
		<div class="page">
			<div class="">
				<div class="col col-login mx-auto">
					<div class="text-center">
						<img src="<?php echo base_url('assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-logo h-100 mb-5" alt="Dashlot logo">
						<img src="<?php echo base_url('assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-theme h-100 mb-5 " alt="Dashlot logo">
					</div>
				</div>
				<!-- container opened -->
				<div class="container">
					<div class="row">
						<div class="col-xl-9 justify-content-center mx-auto text-center">
							<div class="card">
								<div class="row">
									<div class="col-md-12 col-lg-7 pr-0 d-none d-lg-block">
										<img src="<?php echo base_url('assets/images/photos/login.png'); ?>" alt="img" class="br-tl-2 br-bl-2 ">
									</div>
                                    
									<div class="col-md-12 col-lg-5 pl-0 ">
										<div class="card-body p-6 about-con pabout">
										<?php if (session()->getFlashdata('error')): ?>
											<div class="alert alert-danger">
												<?= session()->getFlashdata('error') ?>
											</div>
										<?php endif; ?>
                                            <form action="<?=site_url('Login/login');?>" method="post" autocomplete="off">
                                                <div class="card-title text-center  mb-4">LOGIN</div>
                                                <div class="form-group">
                                                    <input type="text" name="login_userid" id="login_userid" maxlength="20" class="form-control input-sm" placeholder="User ID" autocomplete="off" required>
													<span id="userIdFeedback" class="error"></span>
												</div>
                                                <div class="form-group">
                                                    <input type="password" name="login_password" id="login_password" maxlength="20" class="form-control input-sm" id="exampleInputPassword1" placeholder="Password" autocomplete="off" required>
													<ul id="passwordFeedback">
														<li id="length" class="error">At least 8 characters</li>
														<li id="uppercase" class="error">At least one uppercase letter</li>
														<li id="number" class="error">At least one number</li>
														<li id="special" class="error">At least one special character (!@#$%^&*)</li>
													</ul>
												</div>
                                                <div class="form-footer mt-1">
                                                    <button type="submit" id="btn_signin" class="btn btn-success btn-block" disabled>SignIn</button>
                                                </div>
                                            </form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- container closed -->
				<footer class="footer-main icon-footer">
					<div class="container">
						<div class="  mt-2 mb-2 text-center">
							Copyright © 2025 <a href="#" class="fs-14 text-primary">KHM</a>. Designed by <a href="https://megatrendkms.co.in" class="fs-14 text-primary" target="_blank">Megatrend Knowledge Management Systems Pvt Ltd</a> All rights reserved.
						</div>
					</div>
				</footer>
			</div>
		</div>
		<!-- Page closed -->

		<!-- Dashboard js -->
		<script src="<?php echo base_url('assets/js/vendors/jquery-3.2.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap-4.1.3/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/bootstrap-4.1.3/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendors/jquery.sparkline.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendors/circle-progress.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/rating/jquery.rating-stars.js'); ?>"></script>

		<!--Moment js-->
        <script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>

		<!-- Custom scroll bar js-->
		<script src="<?php echo base_url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

		<!--owl-carousel js-->
		<script src="<?php echo base_url('assets/plugins/owl-carousel/owl.carousel.js'); ?>"></script>

		<!-- Bootstrap-daterangepicker js -->
		<script src="<?php echo base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

		<!-- Bootstrap-datepicker js -->
		<script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js'); ?>"></script>

		<!--Counters -->
		<script src="<?php echo base_url('assets/plugins/jquery-countdown/countdown.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/jquery-countdown/jquery.plugin.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/plugins/jquery-countdown/jquery.countdown.js'); ?>"></script>

		<!-- Custom js-->
		<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

		

	</body>
</html>

<script>
	$(document).ready(function () {
    const allowedPattern = /^[a-zA-Z0-9_]+$/; // Allow letters, numbers, and underscores only

    $("#login_userid").on("input", function () {
        let userId = $(this).val();

        // Remove invalid characters
        if (!allowedPattern.test(userId)) {
            $(this).val(userId.replace(/[^a-zA-Z0-9_]/g, "")); // Replace invalid characters
            $("#userIdFeedback").text("Only letters, numbers, and underscores are allowed.");
        } else {
            $("#userIdFeedback").text("");
        }
    });
});
</script>
<script>
$(document).ready(function () {
    const lengthRule = /^(?=.{8,})/;                // At least 8 characters
    const uppercaseRule = /^(?=.*[A-Z])/;          // At least one uppercase letter
    const numberRule = /^(?=.*[0-9])/;             // At least one number
    const specialCharRule = /^(?=.*[!@#$%^&*])/;   // At least one special character

    $("#login_password").on("input", function () {
        let password = $(this).val();
		let isValid = true;
        // Validate length
        if (lengthRule.test(password)) {
            $("#length").removeClass("error").addClass("valid");
        } else {
            $("#length").removeClass("valid").addClass("error");
			isValid = false;
        }

        // Validate uppercase letter
        if (uppercaseRule.test(password)) {
            $("#uppercase").removeClass("error").addClass("valid");
        } else {
            $("#uppercase").removeClass("valid").addClass("error");
			isValid = false;
        }

        // Validate number
        if (numberRule.test(password)) {
            $("#number").removeClass("error").addClass("valid");
        } else {
            $("#number").removeClass("valid").addClass("error");
			isValid = false;
        }

        // Validate special character
        if (specialCharRule.test(password)) {
            $("#special").removeClass("error").addClass("valid");
        } else {
            $("#special").removeClass("valid").addClass("error");
			isValid = false;
        }

		$("#btn_signin").prop("disabled", !isValid);
    });
});
</script>
<script>
$(document).ready(function () {
    setTimeout(function () {
        $('input[name="login_userid"]').val('');
        $('input[name="login_password"]').val('');
    }, 600); // Adjust the timeout as needed
});
</script>