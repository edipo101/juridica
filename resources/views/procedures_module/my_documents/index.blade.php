@extends('layout')

@section('title', 'Mis documentos')

@section('content-header')
<h1>Mis documentos</h1>
<div class="pull-right">
	<a href="{{route('documents.create')}}" class="btn btn-primary"><i class="fa fa-file"></i> Nuevo registro</a>
</div>
<p class="description">Lista general de mis documentos.</p>
@endsection

@section('content')
@include('procedures_module.modals.view')
@include('procedures_module.modals.send')
@include('procedures_module.modals.delete')
@php
session(['type_doc' => 'mydocs']);
@endphp

<div class="row toolbar">
</div>

<div class="row">
	<div class="col-md-12">
		<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
			<thead>	
				<tr>
					<th>Id</th>
					<th>Fecha elaboración</th>
					<th>Tipo</th>
					<th>Referencia</th>
					<th>Elaborado en</th>
					<th>Cite</th>
					<th>Estado</th>
					<th>Creado por</th>
					<th></th>
					<th></th>
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
	var table;
	$(document).ready(function(){
		table = $('#table').DataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
			},
			"aaSorting": [],
			"ajax": {
				"url": "{{route('documents.json_mydocs')}}",
				"dataSrc": "data"
			},
			"columns": [
			{"data": "id"},
			{"data": "date"},
			{"data": "type"},
			{"data": "reference", "width": "25%"},
			{"data": "details"},
			{"data": "quote"},
			{"data": "status"},
			{"data": "created_by", "width": "100px"},
			{"data": "file", "className": "text-center"},
			{"data": "sent", "className": "text-center"},
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