@extends('back.layouts.base')

@section('titulo')
    <title>Resultados de la consulta | Panel AGM</title>
@stop

@section('contenido')
    @include('back.layouts.encabezadoContenido', ['titulo' => 'Reportes', 'subtitulo' => 'Resultados'])

    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Producción</th>
                <th>Costo</th>
                <th>Ganancia</th>
            </tr>
        </thead>
        <tbody>
        @foreach($resultados as $resultado)
            <tr>
                <td><a href="#">{{ $resultado->id }}</a></td>
                <td>{{ $resultado->nombreCliente->nombre.' '.$resultado->nombreCliente->apellido }}</td>
                <td>{{ $resultado->nombreProducto->nombre }}</td>
                <td>{{ $resultado->cantidad }}</td>
                <td>{{ number_format($resultado->nombreProducto->precioVenta, 2, ',', '.') }}</td>
                <td>{{ number_format($resultado->nombreProducto->precioCosto, 2, ',', '.') }}</td>
                <td>{{ number_format($resultado->nombreProducto->precioVenta - $resultado->nombreProducto->precioCosto, 2, ',', '.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('javascripts')
    <script src="{{ asset('back/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/jquery.dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        var oTable1 = $('#sample-table-1').dataTable( {
            "aoColumns": [
              null, null, null, null
            ], 
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ ",
                "sZeroRecords": "No existen datos para esta consulta",
                "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(De un maximo de _MAX_ registros)",
                "sSearch": "Buscar: _INPUT_",
                "sEmptyTable": "No hay datos disponibles para esta tabla",
                "sLoadingRecords": "Por favor espere - Cargando...",  
                "sProcessing": "Actualmente ocupado",
                "sSortAscending": " - click/Volver a ordenar en orden Ascendente",
                "sSortDescending": " - click/Volver a ordenar en orden descendente",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Ultimo",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },

            }
        } );
    </script>
@stop