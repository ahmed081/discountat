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
		<title>Categories</title>
		<style>
			
			
		</style>
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

		<!-- File Uploads css-->
		<link href="{{asset('template/plugins/fileupload/css/dropify.css')}}" rel="stylesheet" type="text/css" />

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
								<h4 class="page-title">Categories</h4>
								<ol class="breadcrumb pr-0">
								<ol class="breadcrumb pr-0">
									<li class="breadcrumb-item active" aria-current="page">Categories</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

						<!--Row-->
						<div class="row">
							<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Categories Details</div>
									<div class="card-options ">
										<button type="button" style="background: #1FC0D8; border-radius: 17px; width: 180px; height: 40px; color: white;" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Add New Category</button>
									</div>
								</div>
								<div class="card-body">
                                	<div class="table-responsive">
										@include('components.tables.table_categories')
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
		<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="example-Modal3">Add New Category</h5>
						<button type="button"  class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="/categories/add" enctype="multipart/form-data">
						@csrf
						<div class="modal-body">
							
								<div class="form-group">
									<label for="name" class="form-control-label">Name</label>
									<input type="text" name="name" class="form-control" id="name">
								</div>
								<div class="form-group">
									<label for="ar-name" class="form-control-label">Arabic name</label>
									<input type="text" name="name_ar" class="form-control" id="ar-name">
								</div>
								<div class="col-lg-12 col-sm-12">
									<input type="file" class="dropify" name="image_url" data-default-file="" data-height="180"  />
								</div>
								
							
						</div>
						<div class="modal-footer">
							<button type="button" style="background: white; border-radius: 17px; width: 80px; height: 40px; color:#1FC0D8;border: 1px solid ;#1FC0D8" class="btn" data-dismiss="modal">Close</button>
							<button type="submit" style="background: #1FC0D8; border-radius: 17px; width: 180px; height: 40px; color: white;"  class="btn">Add Category</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		@foreach ($data['categories'] as $category)
			@include('components.delete.delete_category',['category'=>$category])
		@endforeach
		@foreach ($data['categories'] as $category)
			@include('components.update.update_category',['category'=>$category])
		@endforeach
		<!-- Message Modal -->
		
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
		
		
		<!-- File uploads js -->
		<script src="{{asset('template/plugins/fileupload/js/dropify.js')}}"></script>
		<script src="{{asset('template/js/filupload.js')}}"></script>


		<!-- Select2 js -->
		<script src="{{asset('template/plugins/select2/select2.full.min.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('template/js/custom.js')}}"></script>

	</body>
</html>