@extends('back.layouts.base')

@section('titulo')
    <title>Nuevo registro | Panel AGM</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Inventario', 'subtitulo' => 'Nuevo'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    @if(count($productos) > 1)
	    {!! Form::open(array('route' => 'dashboard.inventario.store', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'inventarioForm', 'id' => 'inventarioForm', 'files' => true, 'novalidate' => true)) !!}

	        @include('back.inventario.form.InventarioFormType')

	        @include('back.layouts.botonesFormularios', ['nombreId' => 'inventarioSubmit', 'cancelar' => URL::route('dashboard.inventario.index'), 'data' => 1, 'layer' => 'Guardar'])

	    {!! Form::close() !!}
    @elseif(count($productos) == 1)
        @include('back.layouts.tablaVacia', ['mensaje' => 'Debe de registrar al menos un producto'])
    @endif
@stop