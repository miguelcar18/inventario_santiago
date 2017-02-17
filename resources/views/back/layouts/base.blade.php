<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Sistema de inventario</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="{{ asset('back/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('back/assets/css/font-awesome.min.css') }}" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="{{ asset('back/assets/css/font-awesome-ie7.min.css') }}" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<!--ace styles-->
		<link rel="stylesheet" href="{{ asset('back/assets/css/ace.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('back/assets/css/ace-responsive.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('back/assets/css/ace-skins.min.css') }}" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="{{ asset('back/assets/css/ace-ie.min.css') }}" />
		<![endif]-->
		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		@section('estilos')@show
	</head>
	<body>
		@include('back.layouts.navbar')
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			@include('back.layouts.sidebar')
			<div class="main-content">
				@include('back.layouts.breadcrumbs')
				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							@section('contenido')
							@show
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
				@include('back.layouts.configuration')
			</div><!--/.main-content-->
		</div><!--/.main-container-->
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
		<!--basic scripts-->
		<!--[if !IE]>-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<!--[if IE]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if !IE]>-->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{ asset('back/assets/js/jquery-2.0.3.min.js') }}'>"+"<"+"/script>");
		</script>
		<!--<![endif]-->
		<!--[if IE]>
		<script type="text/javascript">
			window.jQuery || document.write("<script src='{{ asset('back/assets/js/jquery-1.10.2.min.js') }}'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='{{ asset('back/assets/js/jquery.mobile.custom.min.js') }}''>"+"<"+"/script>");
		</script>
		<script src="{{ asset('back/assets/js/bootstrap.min.js') }}"></script>
		<!--page specific plugin scripts-->
		<!--ace scripts-->
		<script src="{{ asset('back/assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('back/assets/js/ace.min.js') }}"></script>
		<!--inline scripts related to this page-->
		@section('javascripts')@show
	</body>
</html>