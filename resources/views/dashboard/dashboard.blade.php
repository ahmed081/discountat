<!DOCTYPE html>
<html lang="ae" dir="rtl">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Clont - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>

		<!-- Title -->
		<title>Dashboard</title>

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
								<h4 class="page-title">Dashboard</h4>
								<ol class="breadcrumb pr-0">
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card">
									<div class="card-body pb-0">
										<div class="text-right mb-4">
											<p class=" mb-1 ">
											  <i class="fa fa-line-chart ml-1"></i>
											  Total Sales
											</p>
											<h2 class="mb-0">4,786<span class="fs-12 text-muted"><span class="text-success ml-1"><i class="fe fe-arrow-up mr-1 "></i> 12%</span> since last week</span></h2>
										</div>
									</div>
									<div id="spark1"></div>
								</div>
							</div>
							
							
							<div class="col-xl-3 col-lg-6 col-md-12">
								<div class="card">
									<div class="card-body pb-0">
										<div class="text-right mb-4">
											<p class=" mb-1">
											  <i class="fa fa-signal ml-1"></i>
											  Total views
											</p>
											<h2 class="mb-0">356<span class="fs-12 text-muted"><span class="text-danger ml-1"><i class="fe fe-arrow-down mr-1"></i>0.82%</span> since last week</span></h2>
										</div>
									</div>
									<div id="spark4"></div>
								</div>
							</div>
							<div class=" col-xl-6 col-lg-6 col-md-12 card">
								<div class="card-body">
									<h3 class="card-title mb-0">view Funnel & Avg. Length of views Stages</h3>
									<div class="row">
										<div class="col-3">
											<p class="data-attributes mt-3 mb-1">
												<span class="donut" data-peity='{ "fill": ["#2d66f7", "#1d2846"]}'>5/5</span>
											</p>
											<h4 class=" mb-0">180</h4>
											<p class="mb-0 text-muted fs-12">ads count</p>
										</div>
										<div class="col-3">
											<p class="data-attributes mt-3 mb-1">
												<span class="donut" data-peity='{ "fill": ["#f72d66", "#1d2846"]}'>50/180</span>
											</p>
											<h4 class=" mb-0">50</h4>
											<p class="mb-0 text-muted fs-12">current ads count</p>
										</div>
										<div class="col-3">
											<p class="data-attributes mt-3 mb-1">
												<span class="donut" data-peity='{ "fill": ["#f72d66", "#1d2846"]}'>30/180</span>
											</p>
											<h4 class=" mb-0">30</h4>
											<p class="mb-0 text-muted fs-12">expaired ads count</p>
										</div>
										<div class="col-3 ">
											<p class="data-attributes mt-3 mb-1">
												<span class="donut" data-peity='{ "fill": ["#f7be2d", "#1d2846"]}'>100/180</span>
											</p>
											<h4 class=" mb-0">100</h4>
											<p class="mb-0 text-muted fs-12">availeble ads count</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--End row-->

						<!--Row-->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Overview Of Revenue and profit</h3>
										
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
												<p class=" mb-0 "> This Year Sales</p>
												<h2 class="mb-0">35,789<span class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down mr-1"></i>0.9%</span>last year</span></h2>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
												<p class=" mb-0 "> This Year Profits</p>
												<h2 class="mb-0">$9,265<span class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up mr-1"></i>0.15%</span>last year</span></h2>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
												<p class=" mb-0 "> This Year Sales Revenue</p>
												<h2 class="mb-0">$4,678<span class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down mr-1"></i>1.04%</span>last year</span></h2>
											</div>
										</div>
										<div id="chart" class="mb-0"></div>
									</div>
								</div>
							</div>
							
						</div>
						<!--End row-->

						<!--Row-->
						
						<!--End row-->

						<!--Row-->
						<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">New Users</h3>
										
									</div>
									<div class="card-body p-0 ">
										<div class="list-group list-lg-group list-group-flush">
											<div class="list-group-item list-group-item-action" href="#">
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3" src="{{asset('template/images/users/1.jpg')}}" alt="Image description">
													<div class="media-body">
														<div class="d-md-flex align-items-center">
															<div class="mt-1">
																<h5 class="mb-0 text-dark">Lillian Blake</h5>
																<p class="mb-0  fs-13 text-muted">User ID: #1234</p>
															</div>
															<small class="mr-md-auto fs-16 mt-2">
																<i class="si si-envelope mr-1"  data-toggle="tooltip" data-placement="top" title="Chat"></i>
																<i class="si si-settings" data-toggle="tooltip" data-placement="top" title="Settings"></i>
																<i class="si si-trash mr-1" data-toggle="tooltip" data-placement="top" title="Delete"></i>
															</small>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item list-group-item-action" href="#">
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3" src="{{asset('template/images/users/10.jpg')}}" alt="Image description">
													<div class="media-body">
														<div class="d-md-flex align-items-center">
															<div class="mt-1">
																<h5 class="mb-0 font-weight-normal text-dark">Tim	Gray</h5>
																<p class="mb-0 fs-13 text-muted">User ID: #1234</p>
															</div>
															<small class="mr-md-auto fs-16 mt-2">
																<i class="si si-envelope mr-1"  data-toggle="tooltip" data-placement="top" title="Chat"></i>
																<i class="si si-settings" data-toggle="tooltip" data-placement="top" title="Settings"></i>
																<i class="si si-trash mr-1" data-toggle="tooltip" data-placement="top" title="Delete"></i>
															</small>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item list-group-item-action" href="#">
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3" src="{{asset('template/images/users/2.jpg')}}" alt="Image description">
													<div class="media-body">
														<div class="d-md-flex align-items-center">
															<div class="mt-1">
																<h5 class="mb-0 font-weight-normal text-dark">Rose Nash</h5>
																<p class="mb-0 fs-13 text-muted">User ID: #1234</p>
															</div>
															<small class="mr-md-auto fs-16 mt-2">
																<i class="si si-envelope mr-1"  data-toggle="tooltip" data-placement="top" title="Chat"></i>
																<i class="si si-settings" data-toggle="tooltip" data-placement="top" title="Settings"></i>
																<i class="si si-trash mr-1" data-toggle="tooltip" data-placement="top" title="Delete"></i>
															</small>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3" src="{{asset('template/images/users/9.jpg')}}" alt="Image description">
													<div class="media-body">
														<div class="d-md-flex align-items-center">
															<div class="mt-1">
																<h5 class="mb-0 font-weight-normal text-dark">Justin Parr</h5>
																<p class="mb-0  fs-13 text-muted">User ID: #1234</p>
															</div>
															<small class="mr-md-auto fs-16 mt-2">
																<i class="si si-envelope mr-1"  data-toggle="tooltip" data-placement="top" title="Chat"></i>
																<i class="si si-settings" data-toggle="tooltip" data-placement="top" title="Settings"></i>
																<i class="si si-trash mr-1" data-toggle="tooltip" data-placement="top" title="Delete"></i>
															</small>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3" src="{{asset('template/images/users/4.jpg')}}" alt="Image description">
													<div class="media-body">
														<div class="d-md-flex align-items-center">
															<div class="mt-1">
																<h5 class="mb-0 font-weight-normal text-dark">Vanessa	Quinn</h5>
																<p class="mb-0  fs-13 text-muted">User ID: #1234</p>
															</div>
															<small class="mr-md-auto fs-16 mt-2">
																<i class="si si-envelope mr-1"  data-toggle="tooltip" data-placement="top" title="Chat"></i>
																<i class="si si-settings" data-toggle="tooltip" data-placement="top" title="Settings"></i>
																<i class="si si-trash mr-1" data-toggle="tooltip" data-placement="top" title="Delete"></i>
															</small>
														</div>

													</div>
												</div>
											</div>
											<div class="list-group-item list-group-item-action br-br-7 br-bl-7" href="#">
												<div class="media mt-0">
													<img class="avatar-lg rounded-circle ml-3" src="{{asset('template/images/users/11.jpg')}}" alt="Image description">
													<div class="media-body">
														<div class="d-md-flex align-items-center">
															<div class="mt-1">
																<h5 class="mb-0 font-weight-normal text-dark">Steven Roberts</h5>
																<p class="mb-0 fs-13 text-muted">User ID: #1234</p>
															</div>
															<small class="mr-md-auto fs-16 mt-2">
																<i class="si si-envelope mr-1"  data-toggle="tooltip" data-placement="top" title="Chat"></i>
																<i class="si si-settings" data-toggle="tooltip" data-placement="top" title="Settings"></i>
																<i class="si si-trash mr-1" data-toggle="tooltip" data-placement="top" title="Delete"></i>
															</small>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
						</div>
						<!--End row-->

						<!--Row-->
						
						<!--End row-->

					</div>
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © 2019 <a href="#">Clont</a>. Designed by <a href="#">Spruko Technologies Pvt.Ltd</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
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

		<!-- ECharts js -->
		<script src="{{asset('template/plugins/echarts/echarts.js')}}"></script>

		<!-- Peitychart js-->
		<script src="{{asset('template/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{asset('template/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- Index js-->
		<script src="{{asset('template/js/index1.js')}}"></script>

		<!-- Apexchart js-->
		<script src="{{asset('template/js/apexcharts.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('template/js/custom.js')}}"></script>

	</body>
</html>