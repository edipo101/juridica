@extends('layout')

@section('title', 'Documentos externos')

@section('content-header')
<h1>Documentos externos</h1>
<div class="pull-right">
	<a href="{{route('documents.create')}}" class="btn btn-primary"><i class="fa fa-file"></i> Nuevo registro</a>
</div>
<p class="description">Lista general de trámites, registros y otros documentos solicitadas por otras unidades ajenas a la unidad.</p>
@endsection

@section('content')
@include('procedures_module.modals.view')
@include('procedures_module.modals.send')
@include('procedures_module.modals.delete')
@php
session(['type_doc' => 'extdocs']);
@endphp
<div class="row toolbar">
</div>

<div class="row">
	<div class="col-md-12">
		<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
			<thead>	
				<tr>
					<th>Nro</th>
					<th>Fecha ingreso</th>
					<th>Tipo</th>
					<th>Documento</th>
					{{-- <th>Cite</th> --}}
					<th>Dato adicional</th>
					{{-- <th>Estado</th> --}}
					<th title="Tiempo transcurrido">Ubicación actual</th>
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
				"url": "{{route('documents.json_extdocs')}}",
				"dataSrc": "data"
			},
			"columns": [
			{"data": "entry_number"},
			{"data": "entry_date", "width": "50px"},
			{"data": "type", "width": "50px"},
			{"data": "details", "width": "35%"},
			// {"data": "quote"},
			{"data": "add_data"},
			// {"data": "status"},
			{"data": "image", "width": "350px"},
			{"data": "file", "className": "text-center"},
			{"data": "sent", "className": "text-center"},
			{"data": "actions"},
			],
			pageLength: 10,
			ordering: false,
			paging: true,
			bInfo: true,
		});
	});
</script>
<script src="{{asset('js/actions.js')}}"></script>
@endpush