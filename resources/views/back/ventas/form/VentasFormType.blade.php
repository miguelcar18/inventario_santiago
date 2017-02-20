<div class="control-group">
	<label class="control-label" for="cliente">Cliente:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::select('cliente', $clientes, null, ['id' => 'cliente', 'class' => 'span6', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="cliente">Producto en inventario:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::select('producto', $productos, null, ['id' => 'producto', 'class' => 'span6', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="limite">Cantidad total:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::input('number', 'limite', null, $attributes = array('id' => 'limite', 'class' => 'span6', 'readOnly' => true)) !!}
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
<div class="control-group">
	<label class="control-label" for="cantidad">Apartar:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::checkbox('apartar', 1, false, $attributes = array('id' => 'apartar', 'class' => 'ace-switch')) !!}
			<span class="lbl"></span>
		</div>
	</div>
</div>