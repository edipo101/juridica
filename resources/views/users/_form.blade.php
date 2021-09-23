<div class="box">
	<div class="box-body">
		<h2 class="page-header">Datos personales</h2>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="first_name">Primer nombre <span class="req">*</span></label>
				<input type="text" id="first_name" name="first_name" class="form-control" placeholder="Primer nombre del usuario" value="{{old('first_name', ($item->first_name) ?: $item->first_name)}}">
				{!! $errors->first('first_name', '<span class="help-block">:message</span>')!!}
			</div>
			<div class="form-group col-md-4">
				<label for="second_name">Segundo nombre</label>
				<input type="text" id="second_name" name="second_name" class="form-control" placeholder="Segundo nombre del usuari" value="{{old('second_name', ($item->second_name) ?: $item->second_name)}}">
				{!! $errors->first('second_name', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="first_surname">Primer Apellido <span class="req">*</span></label>
				<input type="text" id="first_surname" name="first_surname" class="form-control" placeholder="Primer apellido del usuario" value="{{old('first_surname', ($item->first_surname) ?: $item->first_surname)}}">
				{!! $errors->first('first_surname', '<span class="help-block">:message</span>')!!}
			</div>
			<div class="form-group col-md-4">
				<label for="second_surname">Segundo Apellido</label>
				<input type="text" id="second_surname" name="second_surname" class="form-control" placeholder="Segundo apellido del usuario" value="{{old('second_surname', ($item->second_surname) ?: $item->second_surname)}}">
				{!! $errors->first('second_surname', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="job_title">Cargo <span class="req">*</span></label>
				<input type="text" id="job_title" name="job_title" class="form-control" placeholder="Cargo o puesto de trabajo" value="{{old('job_title', ($item->job_title) ?: $item->job_title)}}">
				{!! $errors->first('job_title', '<span class="help-block">:message</span>')!!}
			</div>
			<div class="form-group col-md-4">
				<label for="unit_id">Unidad de trabajo <span class="req">*</span></label>
				<select name="unit_id" id="unit_id" class="form-control select2">
					<option value="" disabled selected style="display:none;">Elegir una Unidad</option>
					@foreach ($units as $unit)
					<option	{!!((old('unit_id', $item->unit_id) == $unit->id) ? "selected" : "")!!} value="{{$unit->id}}">
						{{$unit->name}}
					</option>
					@endforeach
				</select>
				{!! $errors->first('unit_id', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="email">Correo institucional </label>
				<input type="text" id="email" name="email" class="form-control" placeholder="Correo institucional" value="{{old('email', ($item->email) ?: $item->email)}}">
				{!! $errors->first('email', '<span class="help-block">:message</span>')!!}
			</div>
		</div>

		<h2 class="page-header">Datos de usuario</h2>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="username">Nombre de usuario <span class="req">*</span></label>
				<input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario" value="{{old('username', ($item->username) ?: $item->username)}}">
				{!! $errors->first('username', '<span class="help-block">:message</span>')!!}
			</div>
			
			@if(Route::is('users.create'))
			<div class="form-group col-md-4">
				<label for="password">Contraseña</label>
				<input type="text" id="password" name="password" class="form-control" placeholder="Contraseña">
				{!! $errors->first('password', '<span class="help-block">:message</span>')!!}
			</div>
			@endif
			
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="profile_id">Perfil <span class="req">*</span></label>
				<select name="profile_id" id="profile_id" class="form-control">
					<option value="" disabled selected style="display:none;">Elegir un perfil</option>
					@foreach ($profiles as $profile)
					<option	{!!((old('profile_id', $item->profile_id) == $profile->id) ? "selected" : "")!!} value="{{$profile->id}}">
						{{$profile->name}}
					</option>
					@endforeach
				</select>
				{!! $errors->first('profile_id', '<span class="help-block">:message</span>')!!}
			</div>
			<div class="form-group col-md-4">
				<label for="status">Estado <span class="req">*</span></label>
				<div class="row input-group col-md-12">
					<input id="status" type="checkbox" data-toggle="toggle" name="status" {!!((old('status', $item->status) == 1) ? "checked" : "")!!}>
				</div>
				{!! $errors->first('status', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary col-md-1">Guardar</button>
		<a href="{{route('users.index')}}" class="btn btn-default col-md-1" style="margin-left: 7px;">Cancelar</a>
	</div>
</div>