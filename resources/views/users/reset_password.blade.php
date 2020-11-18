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
		<title>Reset password</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('template/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!-- Style css -->
		<link href="{{asset('template/css/style-rtl.css')}}" rel="stylesheet" />
		<link href="{{asset('template/css/dark-rtl.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('template/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{asset('template/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('template/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />
		
	</head>
	<body class="h-100vh">

		<div class="page ">
			<div class="page-content">
				<div class="container text-center">
					<div class="display-2 text-primary mb-1">{{$data['password']}}</div>
					<h1 class="h3  mb-5">password was resets successfuly</h1>
					<a class="btn btn-primary" href={{URL::previous()}}">
						
						<i class="zmdi zmdi-email" data-toggle="tooltip" title="" data-original-title="zmdi zmdi-email-open"></i>
						send to user
					</a>
					<a class="btn btn-primary" style="background: #3cda08,border-color:#3cda08" href="{{URL::previous()}}">
						<i class="fe fe-arrow-left" data-toggle="tooltip" title="" data-original-title="fe fe-arrow-left"></i>
						Back
					</a>
					
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="{{asset('template/js/vendors/jquery-3.4.0.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{asset('template/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('template/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('template/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('template/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('template/plugins/rating/jquery.rating-stars.js')}}"></script>

	</body>
</html>