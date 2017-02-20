@extends('back.layouts.base')

@section('titulo')
    <title>Nueva venta | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Ventas', 'subtitulo' => 'Nuevo'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::open(array('route' => 'dashboard.ventas.store', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'ventaForm', 'id' => 'ventaForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.ventas.form.VentasFormType')

        @include('back.layouts.botonesFormularios', ['nombreId' => 'ventaSubmit', 'cancelar' => URL::route('dashboard.ventas.index'), 'data' => 1, 'layer' => 'Guardar'])

    {!! Form::close() !!}
@stop