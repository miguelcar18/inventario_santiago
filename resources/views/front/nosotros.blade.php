@extends('front.layouts.base')

@section('titulo')
    <title>Nosotros | AGM Academia de Negocios Online</title>
@stop

@section('contenido')
	<table width="656" border="0" align="center" background="{{ asset('front/images/fondo_para_anuncios.jpg') }}" bgcolor="#FFFFFF">
		<tr>
			<td></td>
		</tr>
		<tr></tr>
		<tr>
			<td>
				<table width="552" border="3" align="center" bgcolor="#FFFFFF">
					<tr>
						<td width="546">
							<p align="center" class="Estilo15 Estilo24">Quienes Somos  </p>
						</td>
					</tr>
					<tr>
						<td>
							<p align="justify" class="Estilo25">Somos Alimentos Grupo Master: nos  dedicamos a la producción de alimentos innovadores, saludables, deliciosos y prácticos  principalmente derivados del almidón, Fundada en el año 2016 bajo la dirección de  la figura publica el master y bajo los estatutos y principios de la filosofía del  factor alfa, comprometidos con el desarrollo empírico de sus empleados y  combinando su ideología con los métodos japoneses de gestión para la eficiencia  en la gestión de todas sus actividades, en Alimentos Grupo Master, creemos que  nuestro mayor activo es nuestro equipo de trabaja por ello Alimentos Grupo Master  invierte en su gente  y en su desarrollo para  que alcancen su máximo potencial con nosotros para así poder llevarle a sus  consumidores los productos más cómodos, prácticos y sabrosos</p>
						</td>
					</tr>
					<tr>
						<td class="Estilo15">
							<table width="546" border="2" bgcolor="">
								<tr>
									<td>
										<p align="justify" class="Estilo25">
											<a href="#" target="_blank" class="Estilo31">Misión:</a>
											<span class="Estilo30">Llevar al público la mayor variedad  de productos alimenticios que verdaderamente nutra el cuerpo alejándolos de la  necesidad del consumo de alimentos cárnicos para que el consumidor de productos  Grupo Master alcance su máximo potencial biológico  goce de una salud plena</span>
											<br />
										</p>
									</td>
								</tr>
								<tr>
									<td>
										<a href="#" target="_blank">
											<strong>
												<br />
												<span class="Estilo27">Visión:</span>
											</strong>
										</a>
										<span class="Estilo29">Un  mundo más sano donde la gente tenga una variedad enorme de opciones alimenticias  que o ayuden a alcanzar su máximo potencial biológico y alejarse del consumo de  Alimentos cárnicos </span>
									</td>
								</tr>
								<tr>
									<td>
										<p>
											<a href="#" target="_blank" class="Estilo27"><strong>Valores:</strong></a>
											<span class="Estilo29"> Nuestros valore se fundamentan en la filosofía del Factor  Alfa </span>
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
				        <td>
				        	<p align="justify" class="Estilo18">
				        		<img src="{{ asset('front/images/anyi_negocios_ad_4.gif') }}" width="150" height="200" />
			        			<a href="#">
			        				<img src="{{ asset('front/images/filosofiafactor_alfa.jpg') }}" alt="Filosofia factor alfa" width="390" height="201" longdesc="flosofia factor alfa" />
		        				</a>
	        				</p>
			        	</td>
			      	</tr>
				</table>
			</td>
		</tr>
	</table>
@stop