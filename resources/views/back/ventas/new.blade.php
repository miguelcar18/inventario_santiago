@extends('back.layouts.base')

@section('titulo')
    <title>Nueva venta | Panel OGM</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Ventas', 'subtitulo' => 'Nuevo'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    @if(count($productos) > 1 && count($clientes) > 1)
	    {!! Form::open(array('route' => 'dashboard.ventas.store', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'ventaForm', 'id' => 'ventaForm', 'files' => true, 'novalidate' => true)) !!}

	        @include('back.ventas.form.VentasFormType')

	        @include('back.layouts.botonesFormularios', ['nombreId' => 'ventaSubmit', 'cancelar' => URL::route('dashboard.ventas.index'), 'data' => 1, 'layer' => 'Guardar'])

	    {!! Form::close() !!}
    @elseif(count($productos) == 1)
    	@include('back.layouts.tablaVacia', ['mensaje' => 'Debe de registrar al menos un producto'])
    @elseif(count($clientes) == 1)
    	@include('back.layouts.tablaVacia', ['mensaje' => 'Debe de registrar al menos un cliente'])
    @endif
@stop