<div class="control-group">
	<label class="control-label" for="cantidad">Producto:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::select('producto', $productos, null, ['id' => 'producto', 'class' => 'span6', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="cantidad">Cantidad:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::input('number', 'cantidad', null, $attributes = array('id' => 'cantidad', 'class' => 'span6', 'placeholder' => '0.00', 'required' => true)) !!}
		</div>
	</div>
</div>