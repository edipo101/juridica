@extends('layout')

@section('title', 'Denuncias')

@section('content-header')
<h1>Denuncias</h1>
<div class="pull-right">
	<a href="#" class="btn btn-primary"><i class="fa fa-file"></i> Nuevo registro</a>
</div>
<p class="description">Lista general de denuncias.</p>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
			<thead>	
				<tr>
					<th>Id</th>
					<th>Denunciante</th>
					<th>Denunciado</th>
					<th>Fecha ingreso</th>
					<th>fis</th>
					<th>ianus</th>
					<th>nurej</th>
					<th>Tribunal</th>
					<th>Etapa</th>
					<th>Hechos</th>
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
				"url": "{{route('denunciations.ajax_get')}}",
				"dataSrc": "data"
			},
			"columns": [
			{"data": "id"},
			{"data": "informer"},
			{"data": "denounced"},
			{"data": "entry_date"},
			{"data": "fis"},
			{"data": "ianus"},
			{"data": "nurej"},
			{"data": "tribunal"},
			{"data": "stage"},
			{"data": "facts"},
			// {"data": "actions"},
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