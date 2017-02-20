<div class="control-group">
	<label class="control-label" for="nombre">Nombre:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('nombre', null, ['id' => 'nombre', 'class' => 'span6', 'placeholder' => 'Nombre', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="apellido">Apellido:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('apellido', null, ['id' => 'apellido', 'class' => 'span6', 'placeholder' => 'Apellido', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="cedula">Cédula:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('cedula', null, ['id' => 'cedula', 'class' => 'span6', 'placeholder' => 'Cédula', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="telefono">Teléfono:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('telefono', null, ['id' => 'telefono', 'class' => 'span6', 'placeholder' => 'Teléfono', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="email">Correo:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::email('correo', null, ['id' => 'correo', 'class' => 'span6', 'placeholder' => 'Correo', 'required' => true]) !!}
		</div>
	</div>
</div>