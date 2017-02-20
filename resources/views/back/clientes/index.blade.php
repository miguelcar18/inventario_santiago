@extends('back.layouts.base')

@section('titulo')
    <title>Listado de clientes | Sistema de inventario</title>
@stop

@section('contenido')
    @include('back.layouts.encabezadoContenido', ['titulo' => 'Clientes', 'subtitulo' => 'Listado'])

	<table id="sample-table-1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td><a href="#">{{ $cliente->id }}</a></td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td class="hidden-480">
                    <a href="{{ URL::route('dashboard.clientes.show', $cliente->id) }}" data-rel="tooltip" title="Mostrar {{ $cliente->nombre.' '.$cliente->apellido }}" objeto="{{ $cliente->nombre.' '.$cliente->apellido }}" style="text-decoration:none;"> 
                        <span class="btn btn-mini btn-info"> <i class="icon-eye-open bigger-120"></i> </span> 
                    </a>
                    &nbsp;
                    <a href="{{ URL::route('dashboard.clientes.edit', $cliente->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $cliente->nombre.' '.$cliente->apellido }}" objeto="{{ $cliente->nombre.' '.$cliente->apellido }}" style="text-decoration:none;"> 
                        <span class="btn btn-mini btn-success"> <i class="icon-pencil bigger-120"></i> </span> 
                    </a>
                    &nbsp;
                    <a href="#" data-id="{{ $cliente->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $cliente->nombre.' '.$cliente->apellido }}" objeto="{{ $cliente->nombre.' '.$cliente->apellido }}"> 
                        <span class="btn btn-mini btn-danger"> <i class="icon-remove bigger-120"></i> </span> 
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- [[ $users->render() ]] --}}

    {!! Form::open(array('route' => array('dashboard.clientes.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
    {!! Form::close() !!}
@stop

@section('javascripts')
    <script src="{{ asset('back/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/jquery.dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript">
        if ( $ ('.tooltip-error').length)
        {
           $('.tooltip-error').click(function () {

                var message = "¿Está realmente seguro(a) de eliminar este cliente?";
                var id = $(this).data('id');
                var form = $('#form-delete');
                var action = form.attr('action').replace('USER_ID', id);
                var row =  $(this).parents('tr');
                if(confirm(message))
                {
                    $.post(action, form.serialize(), function(result) {
                        if (result.success) {
                            row.fadeOut(1000);
                            setTimeout (function () {
                                row.delay(1000).remove();
                                $.gritter.add({
                                    title: 'Eliminado',
                                    text: result.msg,
                                    class_name: 'gritter-success'
                                });
                            }, 1000);                
                        }
                        else if (result.error) {
                            setTimeout (function () {
                                $.gritter.add({
                                    title: 'Error',
                                    text: result.msg,
                                    class_name: 'gritter-error'
                                });
                            }, 1000);
                            row.show();               
                        } 
                        else 
                        {
                            row.show();
                        }
                    }, 'json');
                } 
           });
        }

        var oTable1 = $('#sample-table-1').dataTable( {
            "aoColumns": [
              null, null, null, null,
              { "bSortable": false }
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
            
        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function(){
                this.checked = that.checked;
                $(this).closest('tr').toggleClass('selected');
            });
                
        });

        @if(Session::has('message-alert'))
            var messageAlert = "{{ Session::get('message-alert') }}";
            $.gritter.add({
                title: 'Eliminado',
                text: messageAlert.replace('&quot;', '"'),
                class_name: 'gritter-success'
            });
        @endif
    </script>

@stop