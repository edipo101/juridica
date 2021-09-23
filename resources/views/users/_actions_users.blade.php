<div class="btn-group">
	{{-- <button type="button" class="btn btn-sm">Acciones</button> --}}
	<button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		Acciones <i class="fa fa-caret-down" style="margin-left: 3px;"></i>
		<span class="sr-only">Toggle Dropdown</span>
	</button>
	<ul class="dropdown-menu" role="menu" data-id="{{$user->id}}">
		<li><a id="action-send" href="#" data-toggle="modal" data-target="#modal-view" onclick=""><i class="fa fa-eye"></i>Ver perfil</a></li>
		<li><a href="{{route('users.edit', $user->id)}}"><i class="fa fa-pencil"></i>Editar</a></li>
		<li><a href="#" data-toggle="modal" data-target="#modal-password" onclick="showModalPassword({{$user->id}});"><i class="fa fa-lock"></i>Cambiar contraseña</a></li>
		<li><a href="#" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-remove"></i>Eliminar</a></li>
	</ul>
</div>