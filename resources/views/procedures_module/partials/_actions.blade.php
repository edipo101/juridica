<div class="btn-group">
	{{-- <button type="button" class="btn btn-sm">Acciones</button> --}}
	<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true" title="Acciones">
		Acciones <i class="fa fa-caret-down" style="margin-left: 3px;"></i>
		{{-- <span class="caret"></span> --}}
		{{-- <span class="sr-only">Toggle Dropdown</span> --}}
	</button>
	<ul class="dropdown-menu" role="menu">
		<li><a id="btn-view-details" href="#" data-toggle="modal" data-target="#modal-view" onclick="view_details({{isset($route_id) ? $id.', '.$route_id : $id}})"><i class="fa fa-info"></i>Información</a></li>
		{{-- <li><a id="action-send" href="#" data-toggle="modal" data-target="#modal-view" onclick=""><i class="fa fa-file-pdf-o"></i>Imprimir</a></li> --}}
		@if (!is_null($attached_file))
		<li><a id="action-send" target="_blank" href="{{asset(Storage::url($attached_file))}}"><i class="fa fa-paperclip"></i>Ver archivo adjunto</a></li>
		@endif
		@if (($created_by == auth()->user()->id) && ($status_id == 1))
		<li><a href="{{route('documents.edit', $id)}}"><i class="fa fa-pencil"></i>Editar</a></li>
		@endif
		@if ($created_by == auth()->user()->id && ($status_id == 1))
		<li><a href="#" data-toggle="modal" data-target="#modal-delete" onclick="delete_document({{$id}})"><i class="fa fa-remove"></i>Eliminar</a></li>
		@endif
		@if (($status_id == 1) && ($created_by == auth()->user()->id))
		<li class="divider"></li>
		<li><a href="#" data-toggle="modal" data-target="#modal-send" onclick="send({{$id}})"><i class="fa fa-mail-forward"></i>Enviar a</a></li>
		@endif
		@if (($status_id == 2) && ($created_by == auth()->user()->id))
		<li class="divider"></li>
		<li><a href="#" data-toggle="modal" data-target="#modal-send" onclick="send({{$id}})"><i class="fa fa-mail-forward"></i>Reenviar a</a></li>
		@endif
		{{-- <li><a href="#" data-toggle="modal" data-target="#modal-send" onclick=""><i class="fa fa-archive"></i>Archivar</a></li> --}}
	</ul>
</div>