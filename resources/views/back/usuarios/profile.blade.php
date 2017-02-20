@extends('back.layouts.base')

@section('titulo')
    <title>Perfil de usuarios | Sistema de inventario</title>
@stop

@section('contenido')

<div id="user-profile-2" class="user-profile row-fluid">
	<div class="tabbable">
		<div class="tab-content no-border padding-24">
			<div id="home" class="tab-pane in active">
				<div class="row-fluid">
					<div class="span3 center">
						<span class="profile-picture">
							@if($user->path == '')
	                        <img class="editable" id="avatar2" alt="{{ $user->name }} foto" src="{{ asset('uploads/usuarios/unfile.png') }}" />
	                        @else
	                        <img class="editable" id="avatar2" alt="{{ $user->name }} foto" src="{{ asset('uploads/usuarios/'.$user->path) }}" />
	                        @endif
						</span>
						<div class="space space-4"></div>
						<a href="{{ URL::route('dashboard.usuarios.edit', $user->id) }}" class="btn btn-small btn-block btn-success">
							<i class="icon-pencil bigger-110"></i>
							Editar Usuario
						</a>
					</div><!--/span-->
					<div class="span9">
						<h4 class="blue">
							<span class="middle">{{ $user->name }}</span>
						</h4>
						<div class="profile-user-info">
							<div class="profile-info-row">
								<div class="profile-info-name"> Usuario </div>
								<div class="profile-info-value">
									<span>{{ $user->username }}</span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Correo </div>
								<div class="profile-info-value">
									<span>{{ $user->email }}</span>
								</div>
							</div>
						</div>
					</div><!--/span-->
				</div><!--/row-fluid-->
			</div><!--#home-->
		</div>
	</div>
</div>
@stop