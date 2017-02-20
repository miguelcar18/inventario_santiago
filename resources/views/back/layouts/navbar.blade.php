<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a href="#" class="brand">
				<small>
					<i class="icon-desktop"></i>
					Inventario
				</small>
				</a><!--/.brand-->
			<ul class="nav ace-nav pull-right">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle" id="navbarCambiante">
						@if(Auth::user()->path == '')
							<img class="nav-user-photo" src="{ asset('back/assets/avatars/user.jpg') }}" alt="Jason's Photo" />
	                    @else
	                    	<img class="nav-user-photo" src="{{ asset('uploads/usuarios/'.Auth::user()->path) }}" alt="Foto de {{ Auth::user()->username }}" />
	                    @endif
						<span class="user-info">
							<small>Bienvenido,</small>
							{{ Auth::user()->name }}
						</span>
						<i class="icon-caret-down"></i>
					</a>
					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
						<li>
							<a href="{{ URL::route('dashboard.usuarios.show', Auth::user()->id) }}">
								<i class="icon-user"></i>
								Perfil
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ URL::route('logout') }}">
								<i class="icon-off"></i>
								Salir
							</a>
						</li>
					</ul>
				</li>
			</ul><!--/.ace-nav-->
		</div><!--/.container-fluid-->
	</div><!--/.navbar-inner-->
</div>