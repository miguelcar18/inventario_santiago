<div class="control-group">
	<label class="control-label" for="cliente">Cliente:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::select('cliente', $clientes, null, ['id' => 'cliente', 'class' => 'span6', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="apellido">Producto:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::select('producto', $productos, null, ['id' => 'producto', 'class' => 'span6', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="desde">Desde:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('desde', null, ['id' => 'desde', 'class' => 'span6 date-picker', 'placeholder' => 'Desde', 'data-date-format' => "dd-mm-yyyy"]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="hasta">Hasta:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('hasta', null, ['id' => 'hasta', 'class' => 'span6 date-picker', 'placeholder' => 'Hasta', 'data-date-format' => "dd-mm-yyyy"]) !!}
		</div>
	</div>
</div>