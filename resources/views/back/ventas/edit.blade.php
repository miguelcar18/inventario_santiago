@extends('back.layouts.base')

@section('titulo')
    <title>Editar venta | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Ventas', 'subtitulo' => 'Editar'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::model($venta, array('route' => ['dashboard.ventas.update', $venta->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'name' => 'ventaForm', 'id' => 'ventaForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.ventas.form.VentasFormType', ['venta' => $venta])

        @include('back.layouts.botonesFormularios', ['nombreId' => 'ventaSubmit', 'cancelar' => URL::route('dashboard.ventas.index'), 'data' => 0, 'layer' => 'Actualizar'])

    {!! Form::close() !!}
@stop