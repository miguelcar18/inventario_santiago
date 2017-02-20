<div class="control-group">
	<label class="control-label" for="name">Imagen Actual:</label>
	<div class="controls">
		<div class="span6">
			<span class="profile-picture" id="cambiante">
				@if($user->path == '')
                <img id="avatar2" alt="{{ $user->name }} foto" src="{{ asset('uploads/usuarios/unfile.png') }}" />
                @else
                <img id="avatar2" alt="{{ $user->name }} foto" src="{{ asset('uploads/usuarios/'.$user->path) }}" />
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
	<label class="control-label" for="name">Nombre y apellido:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('name', null, ['id' => 'name', 'class' => 'span6', 'placeholder' => 'Nombre y apellido', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="email">Correo:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::email('email', null, ['id' => 'email', 'class' => 'span6', 'placeholder' => 'Correo', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="username">Nombre de usuario:</label>
	<div class="controls">
		<div class="span12">
			{!! Form::text('username', null, ['id' => 'username', 'class' => 'span6', 'placeholder' => 'Nombre de usuario', 'required' => true]) !!}
		</div>
	</div>
</div>