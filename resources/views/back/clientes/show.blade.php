@extends('back.layouts.base')

@section('titulo')
    <title>Datos del cliente | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Clientes', 'subtitulo' => 'datos detallados'])
    {!! Form::open(['route' => ['dashboard.clientes.destroy', $cliente->id], 'method' =>'DELETE', 'id' => 'form-eliminar-cliente', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este cliente?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $cliente->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $cliente->nombre }}</td>
            </tr>
            <tr>
                <th>Apellido</th>
                <td>{{ $cliente->apellido }}</td>
            </tr>
            <tr>
                <th>Cédula</th>
                <td>{{ number_format($cliente->cedula, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $cliente->telefono }}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{ $cliente->correo }}</td>
            </tr>
            <tr>
                <th>Acciones</th>
                <td>
                    
                    <a href="{{ URL::route('dashboard.clientes.edit', $cliente->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$cliente->id}}" style="text-decoration:none;">
                        <span class="btn btn-small btn-success"> 
                            <i class="icon-pencil bigger-120">&nbsp;Editar</i> 
                        </span>
                    </a>
                    &nbsp;
                    <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$cliente->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-cliente'], '¿Está realmente seguro de eliminar este cliente?');">
                        <span class="btn btn-small btn-danger"> 
                            <i class="icon-remove bigger-120">&nbsp;Eliminar</i> 
                        </span>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    {!! Form::close() !!}
@stop