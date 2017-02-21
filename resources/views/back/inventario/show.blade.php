@extends('back.layouts.base')

@section('titulo')
    <title>Datos del registro | Panel OGM</title>
@stop

@section('contenido')
    @inject('InventarioController', 'App\Http\Controllers\back\InventarioController')
    {{--*/ $cantidadTotal = $InventarioController->totalCantidad($inventario->producto) /*--}}
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Inventario', 'subtitulo' => 'datos detallados'])
    {!! Form::open(['route' => ['dashboard.inventario.destroy', $inventario->id], 'method' =>'DELETE', 'id' => 'form-eliminar-inventario', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este registro?\')']) !!}

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ $inventario->id }}</td>
            </tr>
            <tr>
                <th>Producto</th>
                <td>{{ $inventario->nombreProducto->nombre }}</td>
            </tr>
            <tr>
                <th>Cantidad</th>
                <td>{{ $inventario->cantidad }}</td>
            </tr>
            <tr>
                <th>Cantidad total en inventario</th>
                <td>{{ $cantidadTotal }}</td>
            </tr>
            <tr>
                <th>Acciones</th>
                <td>
                    
                    <a href="{{ URL::route('dashboard.inventario.edit', $inventario->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$inventario->id}}" style="text-decoration:none;">
                        <span class="btn btn-small btn-success"> 
                            <i class="icon-pencil bigger-120">&nbsp;Editar</i> 
                        </span>
                    </a>
                    &nbsp;
                    <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$inventario->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-inventario'], '¿Está realmente seguro de eliminar este registro?');">
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