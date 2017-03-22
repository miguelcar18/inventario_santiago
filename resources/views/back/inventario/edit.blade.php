@extends('back.layouts.base')

@section('titulo')
    <title>Editar registro | Panel AGM</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Inventario', 'subtitulo' => 'Editar'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::model($inventario, array('route' => ['dashboard.inventario.update', $inventario->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'name' => 'inventarioForm', 'id' => 'inventarioForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.inventario.form.InventarioFormType', ['inventario' => $inventario])

        @include('back.layouts.botonesFormularios', ['nombreId' => 'inventarioSubmit', 'cancelar' => URL::route('dashboard.inventario.index'), 'data' => 0, 'layer' => 'Actualizar'])

    {!! Form::close() !!}
@stop