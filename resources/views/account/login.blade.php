<!DOCTYPE html>
<html lang="en" dir="rtl">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Clont - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>

		<!-- Title -->
		<title>Clont - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('./template/images/brand/favicon.png')}}" type="image/png"/>

		<!-- Style css -->
        <link type="text/css" href="{{asset('template/css/style-rtl.css')}}" rel="stylesheet"/>
        <link type="text/css" href="{{asset('template/css/dark-rtl.css')}}" rel="stylesheet"/>


		<!---Icons css-->
        <link rel="stylesheet" href="{{asset('template/plugins/web-fonts/icons.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{asset('template/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{asset('template/plugins/web-fonts/plugin.css')}}" type="text/css"/>
		

		<!--- JQUERY-COUNTDOWN CSS -->
        <link rel="stylesheet" href="{{asset('template/plugins/jquery-countdown/jquery.countdown.css')}}" type="text/css"/>


	</head>

	<body class="h-100vh ">
		<div class="page comb-page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="text-center mb-6">
								<img src="{{asset('template/images/brand/logo.png')}}" class="header-brand-img desktop-lgo" alt="Clont logo">
								<img src="{{asset('template/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Clont logo">
							</div>
							<div class="row justify-content-center">
								<div class="col-md-5">
									<div class="card-group mb-0">
										<div class="card p-4">
											<div class="card-body">
												<h1>Login</h1>
												<p class="text-muted">Sign In to your account</p>
												<div class="input-group mb-3">
													<span class="input-group-addon"><i class="fa fa-user"></i></span>
													<input type="text" class="form-control" placeholder="Username">
												</div>
												<div class="input-group mb-4">
													<span class="input-group-addon"><i class="fa fa-lock"></i></span>
													<input type="password" class="form-control" placeholder="Password">
												</div>
												<div class="row">
													<div class="col-12">
														<button type="button" class="btn btn-primary btn-block">Login</button>
													</div>
													<div class="col-12">
														<a href="forgot-password.html" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="{{asset('tamplate/js/vendors/jquery-3.4.0.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{asset('tamplate/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('tamplate/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('tamplate/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('tamplate/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('tamplate/plugins/rating/jquery.rating-stars.js')}}"></script>

	</body>
</html>
