@extends('front.layouts.base')

@section('titulo')
    <title>Contacto | AGM Academia de Negocios Online</title>
@stop

@section('altoTabla')<td>@show

@section('contenido')
	<table width="505" height="142" border="3" align="center">
		<tr>
			<td bgcolor="#FFFFFF">
				<p class="Estilo33">Estamos ubicados en. La Av. Libertador al lado del Conjunto Residencial  Tama en Maturín Edo Monagas<br />Teléfonos: 04249510505<br />e-mail: elmasterulises@gmail.com</p>
			</td>
		</tr>
		<tr>
			<td height="60" bgcolor="#FFFFFF">
				<img src="{{ asset('front/images/siguenos_en_facebook.jpg') }}" alt="ulisesmaster" width="120" height="40" longdesc="uliseselmaster" />
				<span class="Estilo20">@Uliseselmaster</span>
			</td>
		</tr>
	</table>
@stop