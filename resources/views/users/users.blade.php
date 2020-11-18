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
		<title>Users</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('template/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!-- Style css -->
		<link href="{{asset('template/css/style-rtl.css')}}" rel="stylesheet" />
		<link href="{{asset('template/css/dark-rtl.css')}}" rel="stylesheet" />

		<!--Horizontal css -->
        <link id="effect" href="{{asset('template/plugins/horizontal-menu/dropdown-effects/fade-up.css')}}" rel="stylesheet" />
        <link href="{{asset('template/plugins/horizontal-menu/horizontal-rtl.css')}}" rel="stylesheet" />

		<!--Sidemenu css -->
        <link href="{{asset('template/plugins/sidemenu/combine-menu/combine-menu-rtl.css')}}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{asset('template/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('template/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{asset('template/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('template/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />
		<!-- Data table css -->
		<link href="{{asset('template/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

		<!-- Slect2 css -->
		<link href="{{asset('template/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!-- Skin css-->
		<link href="{{asset('template/css/skins-rtl.css')}}" rel="stylesheet" />

	</head>

	<body class="app sidebar-mini">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('template/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page comb-page">
			<div class="page-main">
				

                <!--header  open-->
                    @include('components.header')
                <!--header close-->
                
				<!--aside open-->
                    @include('components.sidebar')
				<!--aside closed-->

				<div class="app-content page-body">

					<!-- Horizontal-menu -->
					
					<!-- Horizontal-menu end -->

					<div class="side-app" style="padding: 5.5rem 1.5rem 0 1.5rem;">

						<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Users</h4>
								<ol class="breadcrumb pr-0">
								<ol class="breadcrumb pr-0">
									<li class="breadcrumb-item active" aria-current="page">Users</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Users Details</div>
									<div class="card-options ">
										<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
										<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
										@include('components.tables.table_users')
									</div>
                                </div>
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->
							
							</div>
						</div>
						<!--End row-->


					</div>
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			@include('components.footer')
			<!-- End Footer-->

		</div>
		
		<!-- delete modal-->
		@foreach ($data['users'] as $user)
			@include('components.delete.delete_user',['user',$user])
		@endforeach
		
		<!-- Back to top -->
		<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

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

		<!--Horizontal js-->
		<script src="{{asset('template/plugins/horizontal-menu/horizontal.js')}}"></script>

		<!--Sidemenu js-->
		<script src="{{asset('template/plugins/sidemenu/combine-menu/combine-menu.js')}}"></script>

		<!-- P-scroll js-->
		<script src="{{asset('template/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
		<script src="{{asset('template/plugins/p-scrollbar/p-scroll1-rtl.js')}}"></script>

		<!-- Data tables js-->
		<script src="{{asset('template/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('template/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('template/js/datatables.js')}}"></script>

		<!-- Select2 js -->
		<script src="{{asset('template/plugins/select2/select2.full.min.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('template/js/custom.js')}}"></script>

	</body>
</html>