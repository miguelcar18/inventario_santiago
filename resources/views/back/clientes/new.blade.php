@extends('back.layouts.base')

@section('titulo')
    <title>Nuevo cliente | Panel OGM</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Clientes', 'subtitulo' => 'Nuevo'])

    @if(Session::has('message'))
        @include('back.layouts.mensaje', ['mensaje' => Session::get('message')])
    @endif

    {!! Form::open(array('route' => 'dashboard.clientes.store', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'clienteForm', 'id' => 'clienteForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.clientes.form.ClienteFormType')

        @include('back.layouts.botonesFormularios', ['nombreId' => 'clienteSubmit', 'cancelar' => URL::route('dashboard.clientes.index'), 'data' => 1, 'layer' => 'Guardar'])

    {!! Form::close() !!}
@stop