<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a href="#" class="brand">
				<small>
					<i class="icon-leaf"></i>
					Inventario
				</small>
				</a><!--/.brand-->
			<ul class="nav ace-nav pull-right">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						{{--
						@if(Auth::user()->path == '')
							<img class="nav-user-photo" src="{ asset('back/assets/avatars/user.jpg') }}" alt="Jason's Photo" />
	                    @else
	                    	<img src="{{ asset('uploads/users/'.Auth::user()->path) }}"/>
	                    	<img class="nav-user-photo" src="{{ asset('uploads/users/'.Auth::user()->path) }}" alt="Foto de {{ Auth::user()->username }}" />
	                    @endif
						--}}
						<img class="nav-user-photo" src="{{ asset('back/assets/avatars/user.jpg') }}" alt="Jason's Photo" />
						<span class="user-info">
							<small>Bienvenido,</small>
							Miguel Carmona
							{{-- Auth::user()->name --}}
						</span>
						<i class="icon-caret-down"></i>
					</a>
					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
						{{--
						<li>
							<a href="{{ URL::route('users.show', Auth::user()->id) }}">
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
						--}}
						<li>
							<a href="#">
								<i class="icon-user"></i>
								Perfil
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">
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