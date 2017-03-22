<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Inicio de sesión | Panel AGM</title>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="{{ asset('back/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="{{ asset('back/assets/css/font-awesome-ie7.min.css') }}" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<!--ace styles-->
		<link href="{{ asset('back/assets/css/ace.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/ace-responsive.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('back/assets/css/ace-skins.min.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('back/assets/css/jquery.gritter.css') }}" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="{{ asset('back/assets/css/ace-ie.min.css') }}" />
		<![endif]-->
		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										<i class="icon-book green"></i>
										<span class="white">Panel AGM</span>
									</h1>
								</div>
							</div>
							<div class="space-6"></div>
							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-desktop green"></i>
													Inicio de sesión
												</h4>
												<div class="space-6"></div>
												<div id="respuesta"></div>
												{!! Form::open(['route' => 'login.store', 'method' => 'post', 'id' => 'loginForm', 'name' => 'loginForm', 'class' => 'form-validate', 'novalidate' => 'novalidate']) !!}
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																{!! Form::text('username', null, ['placeholder' => 'Nombre de usuario', 'class' => 'span12', 'id' => 'username', 'required' => true]) !!}
																<i class="icon-user"></i>
															</span>
														</label>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" id="password" class="span12" placeholder="Contraseña" required/>
																<i class="icon-lock"></i>
															</span>
														</label>
														<div class="space"></div>
														<div class="clearfix">
															{!! Form::button('<i class="icon-key"></i> Ingresar', ['class'=> 'width-35 pull-right btn btn-small btn-primary', 'id' => 'loginButton', 'type' => 'submit']) !!}
														</div>
														<div class="space-4"></div>
													</fieldset>
												{!! Form::close()!!}
											</div><!--/widget-main-->
											<div class="toolbar clearfix">
												<div class="text-center">
													<a href="{{ URL::route('restaurarContrasena') }}" class="forgot-password-link">
														Olvidé mi contraseña
													</a>
												</div>
											</div>
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->
		<!--basic scripts-->
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
			if("ontouchend" in document) document.write("<script src='{{ asset('back/assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
		</script>
		<script src="{{ asset('back/assets/js/bootstrap.min.js') }}"></script>
		<!--page specific plugin scripts-->
		<script src="{{ asset('back/assets/js/jquery.gritter.min.js') }}"></script>
		<!--ace scripts-->
		<script src="{{ asset('back/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('back/assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('back/assets/js/ace.min.js') }}"></script>
		<script src="{{ asset('back/assets/js/formularios/custom.js') }}"></script>
		<!--inline scripts related to this page-->
		<script type="text/javascript">
			function show_box(id) {
				$('.widget-box.visible').removeClass('visible');
				$('#'+id).addClass('visible');
			}
		</script>
	</body>
</html>