@extends('layout')

@section('title', 'Lista de usuarios')

@section('content-header')

<h1>Usuarios</h1>
<div class="pull-right">
	<a href="{{route('users.create')}}" class="btn btn-primary"><i class="fa fa-user" style="padding-right: 3px;"></i> Nuevo usuario</a>
</div>
<p class="description">Lista de usuarios registrados en el sistema</p>
@endsection

@section('content')
@include('modals.password')
@include('modals.message')
<div class="row toolbar">
	<div class="col-md-5">
		<select id="units" class="form-control select2">
			<option value="" selected>Todas las unidades</option>
			@foreach ($units as $unit)
			<option>{{$unit->name}}</option>
			@endforeach
		</select>
	</div>
	<button id="btn-filterdel" class="btn btn-primary"><i class="fa fa-fw fa-close"></i>Borrar</button>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li id="all" class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Todos</a></li>
				<li id="admin" class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Administrador</a></li>
				<li id="boss_unit" class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Jefe de Unidad</a></li>
				<li id="secretary" class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Secretaria</a></li>
				<li id="technical" class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Técnico</a></li>
				<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
			</ul>
		</div>

		<table id="users" class="table table-bordered table-striped table-hover" style="width: 100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre y cargo</th>
					<th>Unidad de trabajo</th>
					<th>username</th>
					<th>Perfil</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>
@endsection

@push('javascript')
<script src="{{asset('js/custom-project.js')}}"></script>
<script type="text/javascript">
	var result_pass;
	var table;

	function showModalPassword(id){
		$('#user_id').val(id);		
	};

	$(document).ready(function(){
		table = $('#users').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"aaSorting": [],
			"ajax": {
				"url": "{{route('users.datatable')}}",
				"dataSrc": "data"
			},
			"columns": [
				{"data": "id"},
				{"data": "image"},
				{"data": "unit.name"},
				{"data": "username"},
				{"data": "profile.name"},
				{"data": "status"},
				{"data": "actions"}
			],
			searching: true,
			paging: true,
			ordering: false,
			searchCols: [
				null,
				null,
				null,
				null,
				null
				// {search: 'Administrador'}
			]
		});

		$('#all').on('click', function(){
			table.column(4).search('').draw();
		});

		$('#admin').on('click', function(){
			table.column(4).search($(this).find('a').html()).draw();
		});

		$('#boss_unit').on('click', function(){
			table.column(4).search('Jefe de Unidad').draw();
		});

		$('#secretary').on('click', function(){
			table.column(4).search('Secretaria').draw();
		});

		$('#technical').on('click', function(){
			table.column(4).search('Técnico').draw();
		});
	});

	$('#units').on('change', function(){
		option = $(this).find(":selected").val();
		if (option == '')
			table.column(2).search('').draw();
		else
			table.column(2).search($(this).find(":selected").text()).draw();
	});

	$('#btn-filterdel').on('click', function(){
		$('#units').val($("#units option:first").val());
		$('#select2-units-container').attr('title', 'Todas las unidades');
		$('#select2-units-container').html('Todas las unidades');
		table.column(2).search('').draw();
	});

	$('#modal-password').on('hidden.bs.modal', function(){
		$('#form-change')[0].reset();
		$('.help-block').hide();
	});

	$('#btn-save').on('click', function(){
		$('.help-block').hide();

        url = '{{route('users.chg_pass')}}';
        data = $('#form-change').serialize();
        $.get(url, data, function(result){
        	if (result == '200'){
        		$('#modal-password').modal('hide');
        		setTimeout(function(){
                	alert('¡Se cambió la contraseña exitosamente!');
            	}, 500);
        	}
        	else{
				var content = JSON.parse(result);
        		$('#error_password').html(content.new_pass[0]);
        		$('#error_password').show();
				return false;
			}
        });
		
	});
</script>
@endpush