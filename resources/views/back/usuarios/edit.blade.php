@extends('back.layouts.base')

@section('titulo')
    <title>Editar usuario | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Usuarios', 'subtitulo' => 'Editar'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::model($user, array('route' => ['dashboard.usuarios.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'name' => 'usuarioEditForm', 'id' => 'usuarioEditForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.usuarios.form.UsuarioEditFormType', ['user' => $user])

        @include('back.layouts.botonesFormularios', ['nombreId' => 'usuarioSubmit', 'cancelar' => URL::route('dashboard.usuarios.index'), 'data' => 0, 'layer' => 'Actualizar'])

    {!! Form::close() !!}
@stop

@section('javascripts')
	<script type="text/javascript">
		$(function() {
			$('#file').ace_file_input({
				style:'well',
				btn_choose:'Arrastre la imagen o haga click para elegir',
				btn_change:null,
				no_icon:'icon-picture',
				droppable:true,
				thumbnail:'large',
				allowExt:  ['jpg', 'jpeg', 'png', 'gif', 'tif', 'tiff', 'bmp'],
	    		allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/tif', 'image/tiff', 'image/bmp'],
				preview_error:function(filename, error_code) {
					alert(error_code);
				},
				before_change : function(files,dropped){
					var allowed_files = [];
					for(var i = 0 ; i < files.length; i++) {
						var file = files[i];
						if(typeof file === "string") {
							if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) 
								return false;
						}
						else {
							var type = $.trim(file.type);
							if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) ) || ( type.length === 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )	) 
								continue;
						}
						allowed_files.push(file);
					}
					if(allowed_files.length === 0) return false;
						return allowed_files;
				}
			}).on('change', function(){
			});
		});
	</script>
@stop