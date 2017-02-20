@extends('back.layouts.base')

@section('titulo')
    <title>Nuevo producto | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Productos', 'subtitulo' => 'Nuevo'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::open(array('route' => 'dashboard.productos.store', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'productoForm', 'id' => 'productoForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.productos.form.ProductoFormType')

        @include('back.layouts.botonesFormularios', ['nombreId' => 'productoSubmit', 'cancelar' => URL::route('dashboard.productos.index'), 'data' => 1, 'layer' => 'Guardar'])

    {!! Form::close() !!}
@stop