@extends('layout')

@section('title', 'Documentos internos')

@section('content-header')
<h1>Documentos internos</h1>
<p class="description">Lista general de trámites, registros y otros registrados en la unidad.</p>
@endsection

@section('content')
@include('procedures_module.modals.view')
{{-- @include('procedures_module.modals.send') --}}
@include('procedures_module.modals.delete')
{{-- <div class="row toolbar">
	<div class="pull-right">
		<a href="{{route('documents.create')}}" class="btn btn-primary"><i class="fa fa-file"></i> Nuevo registro</a>
	</div>
</div> --}}

<div class="row">
	<div class="col-md-12">
		<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
			<thead>	
				<tr>
					<th>Id</th>
					<th>Tipo</th>
					<th>Documento</th>
					<th>Cite</th>
					<th>Dato adicional</th>
					<th>Estado</th>
					<th title="Tiempo transcurrido">Ubicación actual</th>
					<th></th>
					<th></th>
					{{-- <th></th> --}}
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
	$(document).ready(function(){
		var table = $('#table').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"aaSorting": [],
			"ajax": {
				"url": "{{route('documents.json_intdocs')}}",
				"dataSrc": "data"
			},
			"columns": [
			{"data": "id"},
			{"data": "type"},
			{"data": "details", "width": "35%"},
			{"data": "quote"},
			{"data": "add_data"},
			{"data": "status"},
			{"data": "image"},
			{"data": "file", "className": "text-center"},
			// {"data": "send", "className": "text-center"},
			{"data": "actions"},
			],
			pageLength: 10,
			ordering: false,
			paging: true,
			bInfo: true,
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

	});
</script>
<script src="{{asset('js/actions.js')}}"></script>
@endpush