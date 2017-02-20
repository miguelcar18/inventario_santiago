@extends('back.layouts.base')

@section('titulo')
    <title>Datos del producto | Sistema de inventario</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Productos', 'subtitulo' => 'datos detallados'])
    {!! Form::open(['route' => ['dashboard.productos.destroy', $producto->id], 'method' =>'DELETE', 'id' => 'form-eliminar-producto', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este producto?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td colspan="2" align="center">
                    <div class="span6">
                        <span class="profile-picture" id="cambiante">
                            @if($producto->path == '')
                            <img id="avatar2" alt="{{ $producto->nombre }} foto" src="{{ asset('uploads/productos/unfile.png') }}" />
                            @else
                            <img id="avatar2" alt="{{ $producto->nombre }} foto" src="{{ asset('uploads/productos/'.$producto->path) }}" />
                            @endif
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Id</th>
                <td>{{ $producto->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $producto->nombre }}</td>
            </tr>
            <tr>
                <th>Precio de costo</th>
                <td>{{ number_format($producto->precioCosto, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Precio de venta</th>
                <td>{{ number_format($producto->precioVenta, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Acciones</th>
                <td>
                    
                    <a href="{{ URL::route('dashboard.productos.edit', $producto->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$producto->id}}" style="text-decoration:none;">
                        <span class="btn btn-small btn-success"> 
                            <i class="icon-pencil bigger-120">&nbsp;Editar</i> 
                        </span>
                    </a>
                    &nbsp;
                    <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$producto->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-producto'], '¿Está realmente seguro de eliminar este producto?');">
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