@extends('layout')

@section('title', 'Documentos enviados')

@section('content-header')
<h1>Enviados</h1>
<p class="description">Lista general de documentos enviados.</p>
@endsection

@section('content')
@include('procedures_module.modals.view')
{{-- @include('procedures_module.modals.send') --}}
<div class="row">
	<div class="col-md-12">
		<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
			<thead>	
				<tr>
					<th>Id</th>
					<th>Documento</th>
					<th>Fecha envio</th>
					<th>Enviado a</th>
					<th>Mensaje</th>
					<th>Prioridad</th>
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
				"url": "{{route('doc_routes.json_sentdocs')}}",
				"dataSrc": "data"
			},
			"columns": [
				{"data": "id","width": "10px"},
				{"data": "details", "width": "250px"},
				{"data": "created_at", "width": "100px"},
				{"data": "image"},
				{"data": "message", "width": "250px"},
				{"data": "priority"},
				{"data": "sent"},
				{"data": "actions","width": "70px"},
			],
			ordering: false,
		});
	});
</script>
<script src="{{asset('js/actions.js')}}"></script>
@endpush