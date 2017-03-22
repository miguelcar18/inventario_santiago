@extends('front.layouts.base')

@section('titulo')
    <title>Productos | AGM Academia de Negocios Online</title>
@stop

@section('tituloContenido')
	<tr>
		<td height="54">
			<p align="center" class="Estilo15 Estilo17">Los Mejores Productos Para El Desarrollo Humano<br />Salud y Bienestar</p>
		</td>
	</tr>
@stop
@section('altoTabla')<td height="157">@stop

@section('contenido')
	<div id="menu">
		<table width="454" height="81" border="0" bgcolor="#FFFFFF">
			<tr>
				<td width="115">
					<img src="{{ asset('front/images/Etiqueta_del_Minillard.jpg') }}" width="150" height="100" onmouseover="MM_showHideLayers('uliwis','','hide','minillard','','show')" onmouseout="MM_showHideLayers('uliwis','','hide','minillard','','hide')" />
				</td>
				<td width="295">
					<img src="{{ asset('front/images/Etiqueta_del_ULI-WIS.jpg') }}" width="150" height="100" onmouseover="MM_showHideLayers('uliwis','','show')" onmouseout="MM_showHideLayers('mtdp','','hide')" />
				</td>
				<td width="30">
					<img src="{{ asset('front/images/etiqueta_del_Sandwllard.jpg') }}" width="150" height="100" onmouseover="MM_showHideLayers('uliwis','','hide','minillard','','hide')" />
				</td>
			</tr>
		</table>
	</div>
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div id="uliwis">
    	<table width="449" height="261" border="0">
    		<tr>
    		<td><img src="{{ asset('front/images/GM_VendiendoUli_Wis.jpg') }}" width="500" height="250" /></td>
    		</tr>
    	</table>
    </div>    
    <div id="minillard">
    	<table width="507" height="257" border="0">
    		<tr>
    		<td><img src="{{ asset('front/images/GM_Vendiendo_un_Minillard.jpg') }}" width="500" height="250" /></td>
    		</tr>
    	</table>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
@stop