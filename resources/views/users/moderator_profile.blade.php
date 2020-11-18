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
		<title>Moderators</title>

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

		<!-- File Uploads css-->
		<link href="{{asset('template/plugins/fileupload/css/dropify.css')}}" rel="stylesheet" type="text/css" />
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
								<h4 class="page-title">Moderators </h4>
								<ol class="breadcrumb pr-0">
								<ol class="breadcrumb pr-0">
                                    <li class="breadcrumb-item active" aria-current="page">{{$data['moderator']->id}}</li>
                                    <li class="breadcrumb-item"><a href="/moderators">Moderators</a></li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						
						<div class="row">
							<div class="col-xl-4 col-lg-5 col-md-12">
								<div class="card ">
									<div class="card-body">
										<div class="inner-all">
											<ul class="list-unstyled">
												<li class="text-center border-bottom-0">
													<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="{{$data['moderator']->image}}" alt="John Doe">
												</li>
												<li class="text-center">
													<h4 class="text-capitalize mt-3 mb-0">{{$data["moderator"]->full_name}}  <span style="font-size: 11px; color: #8e9cad !important;">(moderator)</span>
														<a href="#" data-toggle="modal" data-target="{{"#updateuser".$data['moderator']->id}}" style="padding: 0;"data-toggle="tooltip" title="" data-original-title="Edit" class="btn btn-default"><i class="fa fa-edit ml-2"></a></i>
													</h4>
													
													@if ($data["moderator"]->availability===0)
														<p class="text-muted text-capitalize">desibled <i style="font-size: 11px; color: red" class="ion ion-record"></i></p>
														
													@else
														<p class="text-muted text-capitalize">enabled <i style="font-size: 11px; color:#3cda08" class="ion ion-record"></i></p>
													@endif
												</li>
												<li>
													
													@if ($data["moderator"]->availability===1)
														<form action="/users/desable/{{$data['moderator']->id}}" method="post">
															@csrf
															<button type="submit" href="/users/enable/{{$data['moderator']->id}}" style="background: red; border-color: red" class="btn btn-primary text-center btn-block">Desable </button>
														</form>
														@else
														<form action="/users/enable/{{$data['moderator']->id}}" method="post">
															@csrf
															<button type="submit" href="/users/enable/{{$data['moderator']->id}}" style="background: #3cda08; border-color: #3cda08" class="btn btn-primary text-center btn-block">Enable </button>
														</form>
													@endif
													<form>
														<button type="button" class="btn btn-warning text-center btn-block" data-toggle="modal" data-target=" {{"#resertpassword".$data['moderator']->id}}">Reset Password</button>
													</form>
													
												</li>
												<li>
												</li>
												<li><br></li>
												<li>
													<div class=" no-padding ">
														<ul class="list-group ">
															<li class="list-group-item"><i class="fa fa-envelope ml-4"></i> {{$data["moderator"]->email}}</li>
														</ul>
													</div>
												</li>
												<li>
													<div class=" no-padding ">
														<ul class="list-group ">
															<li class="list-group-item"><i class="fa fa-home ml-4"></i> Kuwait</li>
														</ul>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								
							</div>

							<div class="col-xl-8 col-lg-6 col-md-12">
								<!--Start subscription Components-->
								<!--Row-->
								
								<!--End row-->
								<!--End subscription Components-->
							</div>




					</div>
					<!--End row-->
					


					
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			@include('components.footer')
			<!-- End Footer-->

		</div>
		@include('components.reset_password',['user'=>$data['moderator']])
		@include('components.update.update_user',['user'=>$data['moderator']])

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

		<!-- File uploads js -->
		<script src="{{asset('template/plugins/fileupload/js/dropify.js')}}"></script>
		<script src="{{asset('template/js/filupload.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('template/js/custom.js')}}"></script>

	</body>
</html>