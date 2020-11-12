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
                                    <li class="breadcrumb-item active" aria-current="page">id</li>
                                    <li class="breadcrumb-item"><a href="/users">Users</a></li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						
						<div class="row">
							<div class="col-xl-3 col-lg-5 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="inner-all">
											<ul class="list-unstyled">
												<li class="text-center border-bottom-0">
												<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="{{asset('template/images/users/16.jpg')}}" alt="John Doe">
												</li>
												<li class="text-center">
													<h4 class="text-capitalize mt-3 mb-0">Ahmed EL ASSIMI</h4>
													<p class="text-muted text-capitalize">desibled <i style="font-size: 11px;" class="ion ion-record"></i></p>
												</li>
												<li>
													<a href="" class="btn btn-success text-center btn-block">enable </a>
													<a href="" class="btn btn-primary text-center btn-block">Statistics</a>
												</li>
												<li><br></li>
												<li>
													<div class=" no-padding ">
														<ul class="list-group ">
															<li class="list-group-item"><i class="fa fa-envelope ml-4"></i> support@demo.com</li>
															<li class="list-group-item"><i class="fa fa-phone ml-4"></i> +125 5826 3658 </li>
															<li class="list-group-item"><i class="fa fa-home ml-4"></i> address</li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
						</div>

						<div class="col-xl-9 col-lg-6 col-md-12">
							<!--Start subscription Components-->
							<!--Row-->
							<div class="row">
								<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Subscriptions Details</div>
										<div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th class="wd-15p">Active At</th>
													<th class="wd-25p">Ends At</th>
													<th class="wd-15p">availabily</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><a href="/ads/1">2020/03/12</a></td>
													<td>2020/03/12</td>
													<td>active</td>
													
												</tr>
												<tr>
													<td><a href="/ads/1">2020/03/12</a></td>
													<td>2020/03/12</td>
													<td>expired </td>
													
												</tr>
												
												
											</tbody>
										</table>
									</div>
									</div>
									<!-- table-wrapper -->
								</div>

								</div>
							</div>
							<!--End row-->
							<!--End subscription Components-->
						</div>




					</div>
					<!--End row-->
					<!--Start brands Components-->

					<div class="row">
						<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Brands Details</div>
								<div class="card-options ">
									<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th class="wd-15p">Name</th>
											<th class="wd-25p">User</th>
											<th class="wd-25p">Country</th>
											<th class="wd-20p">Web Site</th>
											<th class="wd-20p">Address</th>
											<th class="wd-15p">category</th>
											<th class="wd-10p">Ads count</th>
											<th class="wd-10p">created at</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="/moderators/1">brand 1</a></td>
											<td><a href="users/1">ahmed el assimi</a></td>
											<td>Kuwait</td>
											<td>http://ahmed.exemple.com</td>
											<td>address</td>
											<td><a href="/categories/1">category</a></td>
											<td>10</td>
											<td>2018/03/12</td>
										</tr>
										<tr>
											<td><a href="/moderators/1">brand 1</a></td>
											<td><a href="users/1">Nabil Hakik</a></td>
											<td>Kuwait</td>
											<td>http://nabil.exemple.com</td>
											<td>address</td>
											<td><a href="/categories/1">category</a></td>
											<td>10</td>
											<td>2018/03/12</td>
										</tr>
										
										
									</tbody>
								</table>
							</div>
							</div>
							<!-- table-wrapper -->
						</div>
						<!-- section-wrapper -->

						</div>
					</div>
					
					<!--End brands Components-->
					<!--Start ads Components-->
					<!--Row-->
					<div class="row">
						<div class="col-md-12 col-lg-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Ads Details</div>
								<div class="card-options ">
									<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th class="wd-15p">Title</th>
											<th class="wd-25p">Country</th>
											<th class="wd-15p">availabily</th>
											<th class="wd-25p">Brand</th>
											<th class="wd-25p">Views</th>
											<th class="wd-20p">Start at</th>
											<th class="wd-20p">Ends at</th>
											<th class="wd-15p">price</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="/ads/1">ads1 title</a></td>
											<td>Kuwait</td>
											<td>active</td>
											<td><a href="/brands/1">brand's name </a></td>
											<td>20</td>
											<td>2020/03/12</td>
											<td>2020/03/12</td>
											<td><a href="/categories/1">120$</a></td>
										</tr>
										<tr>
											<td><a href="/ads/1">ads2 title</a></td>
											<td>Kuwait</td>
											<td>expired </td>
											<td><a href="/brands/1">brand's name </a></td>
											<td>20</td>
											<td>2020/03/12</td>
											<td>2020/03/12</td>
											<td><a href="/categories/1">120$</a></td>
										</tr>
										
										
									</tbody>
								</table>
							</div>
							</div>
							<!-- table-wrapper -->
						</div>
						<!-- section-wrapper -->

						</div>
					</div>
					<!--End row-->
					<!--End ads Components-->


					
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			@include('components.footer')
			<!-- End Footer-->

		</div>

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