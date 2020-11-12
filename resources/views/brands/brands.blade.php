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
		<title>Brands</title>

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
		<style>
			#Rest_on .left{
				float: left;
			}
			#Rest_on .right{
				float: right;
			}
			#Rest_on {
				overflow: auto;
				background: #F2F4F9;
				padding: 10px 17px;
				border-radius: 15px;
			}
			#brand_title{
				font-weight: 700;
			}
			.space{
				height: 28px;
				width: 100%;
			}
		</style>
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
								<h4 class="page-title">Brands</h4>
								<ol class="breadcrumb pr-0">
								<ol class="breadcrumb pr-0">
									<li class="breadcrumb-item active" aria-current="page">Brands</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Brands Details</div>
									<div class="card-options ">
										<form action="/brands"><a href="#">
											<div class="form-group ">
												<select class="form-control select2 custom-select" data-placeholder="Choose one">
													<option value="">Categories</option>
													<option value="1">Chuck Testa</option>
													<option value="2">Sage Cattabriga-Alosa</option>
													<option value="3">Nikola Tesla</option>
													<option value="4">Cattabriga-Alosa</option>
													<option value="5">Nikola Alosa</option>
												</select>
											</div>	
										</a></form>
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
												<td><a href="#" data-toggle="modal" data-target="#showbrand">brand 1</a></td>
												<td><a href="users/1">ahmed el assimi</a></td>
												<td>Kuwait</td>
												<td>http://ahmed.exemple.com</td>
												<td>address</td>
												<td><a href="/categories/1">category</a></td>
												<td>10</td>
												<td>2018/03/12</td>
											</tr>
											<tr>
												<td><a href="#" data-toggle="modal" data-target="#showbrand">brand 1</a></td>
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
						<!--End row-->


					</div>
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			@include('components.footer')
			<!-- End Footer-->

		</div>
		<!-- Message Modal -->
		<div class="modal fade" id="showbrand" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="example-Modal3">Show Brand</h5>
						<button type="button"  class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="" id="show-model">
						<div class="">
							<!--start banner -->
							<div id="banner">
								<div id="carousel-indicators" class="carousel slide" data-ride="carousel">
									<ol class="carousel-indicators">
										<li data-target="#carousel-indicators" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-indicators" data-slide-to="1" class=""></li>
										<li data-target="#carousel-indicators" data-slide-to="2" class=""></li>
										<li data-target="#carousel-indicators" data-slide-to="3" class=""></li>
										<li data-target="#carousel-indicators" data-slide-to="4" class=""></li>
									</ol>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img class="d-block w-100" alt="" src="{{asset('template/images/photos/24.jpg')}}" data-holder-rendered="true">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" alt="" src="{{asset('template/images/photos/25.jpg')}}" data-holder-rendered="true">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" alt="" src="{{asset('template/images/photos/1.jpg')}}" data-holder-rendered="true">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" alt="" src="{{asset('template/images/photos/2.jpg')}}" data-holder-rendered="true">
										</div>
										<div class="carousel-item">
											<img class="d-block w-100" alt="" src="{{asset('template/images/photos/3.jpg')}}" data-holder-rendered="true">
										</div>
									</div>
								</div>
							</div>
							<!--end banner -->

							<!--start rest on -->
							<div style="margin: 11px 5px">
								<div id="Rest_on">
									<div class="left">
										
										<div>Rest on the end of the show</div>
									</div>
									<div class="right">
										<div>
											22:45:31
											<img src="{{asset('files/timer.png')}}" alt="">
										</div>
									</div>
								</div>
							</div>
							
							<!--end rest on -->
							<div style="margin: 11px 5px">
								<div id="brand_title">
									<center>title</center>
								</div>
								<div id="brand_description">description description description description description description description </div>
								<div style="height: 10px; width: 100%;"></div>
								<div id="brand_website">
									<button type="button" style="background: #1FC0D8; border: none; border-radius: 15px;" class="btn btn-dark">Web <i class="fa fa-chrome fa-spin mr-2"></i></button>

								</div>
								<div style="height: 28px; width: 100%;"></div>
								<div id="brand_adress">
									<div><span style="font-weight: 700">Address</span></div>
									<div>address address address address </div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
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