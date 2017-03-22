@extends('back.layouts.base')

@section('titulo')
    <title>Datos de la venta | Panel AGM</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Ventas', 'subtitulo' => 'datos detallados'])
    {!! Form::open(['route' => ['dashboard.ventas.destroy', $venta->id], 'method' =>'DELETE', 'id' => 'form-eliminar-venta', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar esta venta?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $venta->id }}</td>
            </tr>
            <tr>
                <th>Cliente</th>
                <td>{{ $venta->nombreCliente->nombre.' '.$venta->nombreCliente->apellido }}</td>
            </tr>
            <tr>
                <th>Producto</th>
                <td>{{ $venta->nombreProducto->nombre }}</td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td>{{ $venta->cantidad }}</td>
            </tr>
            <tr>
                <th>Apartado</th>
                <td>
                    @if($venta->apartar == 1)
                        Si
                    @elseif($venta->apartar == 0)
                        No
                    @endif
                </td>
            </tr>
            @if($venta->apartar == 1)
            <tr>
                <th>Acciones</th>
                <td>
                    
                    <a href="{{ URL::route('dashboard.ventas.edit', $venta->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$venta->id}}" style="text-decoration:none;">
                        <span class="btn btn-small btn-success"> 
                            <i class="icon-pencil bigger-120">&nbsp;Editar</i> 
                        </span>
                    </a>
                    &nbsp;
                    <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$venta->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-venta'], '¿Está realmente seguro de eliminar esta venta?');">
                        <span class="btn btn-small btn-danger"> 
                            <i class="icon-remove bigger-120">&nbsp;Eliminar</i> 
                        </span>
                    </a>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    {!! Form::close() !!}
@stop