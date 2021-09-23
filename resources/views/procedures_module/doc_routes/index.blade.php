@extends('layout')

@section('title', 'Documentos recibidos')

@section('content-header')
<h1>Recibidos</h1>
<p class="description">Lista general de documentos recibidos.</p>
@endsection

@section('content')
@include('procedures_module.modals.view')
@include('procedures_module.modals.send')
<div class="row">
	<div class="col-md-12">
		<table id="table" class="table-bordered table-striped table hover" style="width: 100%">
			<thead>	
				<tr>
					<th>Id</th>
					<th>Documento</th>
					{{-- <th>Fecha envio</th> --}}
					<th style="text-align: center;">Mensaje</th>
					{{-- <th>Mensaje</th> --}}
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
				"url": "{{route('doc_routes.datatable')}}",
				"dataSrc": "data"
			},
			"columns": [
				{"data": "id","width": "10px"},
				{"data": "details", "width": "350px"},
				// {"data": "created_at", "width": "100px"},
				// {"data": "image"},
				{"data": "image", "width": "350px"},
				{"data": "priority"},
				{"data": "sent"},
				{"data": "actions","width": "70px"},
			],
			ordering: false,
		});
	});

	$('#modal-view').on('hide.bs.modal', function(){
		url = '{{route('doc_routes.set_viewed')}}';
		route_id = $('#route-id').html();
		// console.log(route_id);
		data = 'id='+route_id;
		$.get(url, data, function(data){
			if (data == '200'){
				table.ajax.reload();
				total = $('#quantity-news').html();
				total--;
				if (total < 1)
					$('#news').hide();
				else
					$('#quantity-news').html(total);
				// console.log(total);
			}				
		});
	})

	function getUsers(){
		url = "{{route('doc_routes.get_users')}}";
		// var ddData = [];
		$.get(url, function(result){
			// console.log(result);
			var ddData = [
				{
					text: "Facebook",
			        value: 1,
			        selected: false,
			        description: "Esto es una prueba para ver si funciona",
			        imageSrc: "{{asset('img/avatar/1.jpg')}}"
				},
				{
			        text: "Twitter",
			        value: 2,
			        selected: false,
			        description: "Description with Twitter",
			        imageSrc: "{{asset('img/avatar/1.jpg')}}"
			    }
			]
			console.log(ddData);
			return ddData;
		});
	};

	var ddData = [
	    {
	        text: "Facebook",
	        value: 1,
	        selected: false,
	        description: "Esto es una prueba para ver si funciona",
	        imageSrc: "{{asset('img/avatar/1.jpg')}}"
	    },
	    {
	        text: "Twitter",
	        value: 2,
	        selected: false,
	        description: "Description with Twitter",
	        imageSrc: "{{asset('img/avatar/10.jpg')}}"
	    },
	    {
	        text: "LinkedIn",
	        value: 3,
	        selected: true,
	        description: "Description with LinkedIn",
			imageSrc: "{{asset('img/avatar/12.jpg')}}"
	    },
	    {
	        text: "Foursquare",
	        value: 4,
	        selected: false,
	        description: "Description with Foursquare",
			imageSrc: "{{asset('img/avatar/13.jpg')}}"
	    }
	];

	$('#users').ddslick({
	    data: ddData,
	    width: 300,
	    imagePosition: "left",
	    selectText: "Select your favorite social network",
	    onSelected: function (data) {
	        console.log(data);
	    }
	});
</script>

<script src="{{asset('js/actions.js')}}"></script>
@endpush