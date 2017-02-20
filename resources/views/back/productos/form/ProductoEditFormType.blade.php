<div class="control-group">
	<label class="control-label" for="name">Imagen Actual:</label>
	<div class="controls">
		<div class="span6">
			<span class="profile-picture" id="cambiante">
				@if($producto->path == '')
                <img id="avatar2" alt="{{ $producto->nombre }} foto" src="{{ asset('uploads/productos/unfile.png') }}" />
                @else
                <img id="avatar2" alt="{{ $producto->nombre }} foto" src="{{ asset('uploads/productos/'.$producto->path) }}" />
                @endif
			</span>
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="name">Imagen:</label>
	<div class="controls">
		<div class="span6">
			{!! Form::file('file', ['id' => 'file', 'class' => 'file-styled', 'accept' => 'image/jpg,image/png,image/jpeg,image/gif']) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="nombre">Nombre:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('nombre', null, ['id' => 'nombre', 'class' => 'span6', 'placeholder' => 'Nombre', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="apellido">Precio de costo:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::input('number', 'precioCosto', null, $attributes = array('id' => 'precioCosto', 'class' => 'span6', 'placeholder' => '0.00', 'step' => 'any', 'required' => true)) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="cedula">Precio de venta:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::input('number', 'precioVenta', null, $attributes = array('id' => 'precioVenta', 'class' => 'span6', 'placeholder' => '0.00', 'step' => 'any', 'required' => true)) !!}
		</div>
	</div>
</div>