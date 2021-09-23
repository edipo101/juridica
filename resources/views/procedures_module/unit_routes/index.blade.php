@extends('layout')

@section('title', 'Rutas de unidades')

@section('content-header')
<h1>{{auth()->user()->unit->name}}</h1>
<p class="description">Lista general de trámites, registros y otros ingresados a la unidad.</p>
@endsection

@section('content')
@include('procedures_module.modals.view')
@include('procedures_module.modals.send')
@include('procedures_module.modals.delete')

<div class="row toolbar">
	{{-- <div class="group-control col-md-3">
		<select name="" id="type_doc" class="form-control">
			<option value="" selected>Tipo de documento</option>
			@foreach ($type_docs as $type)
			<option value="{{$type->name}}">{{$type->name}}</option>
			@endforeach
		</select>
	</div>
	<button id="clear_filter" class="btn btn-default">Borrar Filtro</button>	 --}}
	<div class="margin" style="margin-bottom: 15px;">
		{{-- <div class="btn-group"> --}}
			{{-- <button type="button" class="btn btn-default">Action</button>
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#">Action</a></li>
				<li><a href="#">Another action</a></li>
				<li><a href="#">Something else here</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated link</a></li>
			</ul> --}}
		{{-- 	<select name="" id="search_by" class="form-control" style="background-color: #f4f4f4">
				<option value="" selected>Buscar por:</option>
				<option value="4">Cite</option>
				<option value="Rupe">Rupe</option>
				<option value="">Nro. solicitud</option>
				<option value="">Nro. registro</option>
			</select>
		</div>
		<div class="btn-group">
			<input type="text" id="search_text" class="form-control" value="" placeholder="Buscar...">
			
		</div> --}}
		{{-- <button id="search" class="btn btn-primary">Buscar</button> --}}
		
		<div class="pull-right">
			<a href="{{route('unit_routes.create')}}" class="btn btn-primary"><i class="fa fa-file"></i> Nuevo registro</a>
		</div>
	</div>


	<div class="row">

		<div class="col-md-12">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li id="all" class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Todos</a></li>
					<li id="solicitud" class=""><a href="#tab_2" data-toggle="tab" aria-expanded="true">Solicitud</a></li>
					<li id="informe" class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Informe</a></li>
					<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
				</ul>
			</div>
			<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
				<thead>	
					<tr>
						<th>Reg</th>
						<th></th>
						<th>Tipo</th>
						<th>Documento</th>
						<th>Cite</th>
						<th>Ingreso</th>
						<th>Enviado a</th>
						<th title="Tiempo transcurrido">Tiempo trans.</th>
						<th title="Archivo adjunto"><i class="fa fa-paperclip"></i></th>
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
	<script type="text/javascript">
		function view_details(id){
			url = "{{route('documents.ajax_get')}}";
			request = "id="+id;
			$.get(url, request, function(data){
				console.log(data);
				$('#type').html(data.type.name);
				$('#date').html(data.date);
				$('#unit').html(data.unit.name);
				$('#quote').html(data.quote);
				$('#amount').html(data.amount);
				$('#reference').html(data.reference);
				$('#description').html(data.description);

			});
		};

		function send(doc_id, unit_route_id){
			$('#document_id').val(doc_id);
			$('#unit_route_id').val(unit_route_id);
			$('#status').val('ENVIADO');
		};

		$(document).ready(function(){
			var table = $('#table').DataTable({
				"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
				},
				"aaSorting": [],
				"ajax": {
					"url": "{{route('unit_routes.datatable')}}",
					"dataSrc": "data"
				},
				"pageLength": 10,
				"columns": [
				{"data": "document.id"},
				{"data": "priority"},
				{"data": "document.type"},
				{	"data": "document.request_by",
				"width": "30%"
			},
			{"data": "document.quote"},
			{"data": "registration_date"},
			{"data": "last_destiny"},
			{"data": "time_elapsed"},
			{"data": "file", "className": "text-center"},
			{"data": "actions"},
			],
			ordering: false,
			paging: true,
			"bInfo": true,
		});

			$('#all').on('click', function(){
				table.column(2).search('').draw();
			});

			$('#clear_filter').on('click', function(){
				table.search('').columns('').search('').draw();
				$('#type_doc').prop('selectedIndex', 0);
			});

			$('#search').on('click', function(){
				console.log($('#search_by').val());
				console.log($('#search_text').val());
				table.column($('#search_by').val()).search($('#search_text').val()).draw();
				// table.search('').columns('').search('').draw();
				// $('#type_doc').prop('selectedIndex', 0);
			});		

			$('#solicitud').on('click', function(){
				table.column(2).search($(this).find('a').html()).draw();
			});

			$('#informe').on('click', function(){
				table.column(2).search($(this).find('a').html()).draw();
			});

			$('#type_doc').on('change', function(){
				console.log($(this).val());
				table.column(2).search($(this).val()).draw();
			});

			$('#btn-cancel').on('click', function(){
				$('#form-send')[0].reset();
				$('.help-block').hide();
			});


			$('#send').on('click', function(){
				validation = true;
				if ($('#to_id').val() === null){
					$('#error_id').show();
					validation = false;
				}
				else $('#error_id').hide();
				console.log($('#reference_x').val());	
				if ($('#reference_x').val() == ''){
					$('#error_message').show();
					validation = false;
				}
				else $('#error_message').hide();

				if (!validation) 
					return false;

				url = '{{route('user_routes.ajax_store')}}';
				data = $('#form-send').serialize();
				$.get(url, data, function(data){
					console.log(data);	
				});
				table.ajax.reload();
				$('#btn-cancel').click();
			// form = $('#form-send');
			// form.submit();
		});

		});
	</script>
	@endpush