@extends('back.layouts.base')

@section('titulo')
    <title>Editar cliente | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Cliente', 'subtitulo' => 'Editar'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::model($cliente, array('route' => ['dashboard.clientes.update', $cliente->id], 'method' => 'PUT', 'class' => 'form-horizontal', 'name' => 'clienteForm', 'id' => 'clienteForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.clientes.form.ClienteFormType', ['cliente' => $cliente])

        @include('back.layouts.botonesFormularios', ['nombreId' => 'clienteSubmit', 'cancelar' => URL::route('dashboard.clientes.index'), 'data' => 0, 'layer' => 'Actualizar'])

    {!! Form::close() !!}
@stop