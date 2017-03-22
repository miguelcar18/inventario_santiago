@extends('back.layouts.base')

@section('titulo')
    <title>Reportes | Panel AGM</title>
@stop

@section('contenido')
	@include('back.layouts.encabezadoContenido', ['titulo' => 'Reportes', 'subtitulo' => 'Consulta'])

	{!! Form::open(array('route' => 'consultar.store', 'method' => 'post', 'class' => 'form-horizontal', 'name' => 'reporteForm', 'id' => 'reporteForm', 'files' => true, 'novalidate' => true)) !!}

        @include('back.reportes.form.ReportesFormType')

        @include('back.layouts.botonesFormularios', ['nombreId' => 'reporteSubmit', 'cancelar' => URL::route('dashboard'), 'data' => 1, 'layer' => 'Consultar'])

    {!! Form::close() !!}
@stop

@section('javascripts')
	<script type="text/javascript">
		$(function() {
			$('.date-picker').datepicker().next().on(ace.click_event, function(){
				$(this).prev().focus();
			});
		});
	</script>
@stop