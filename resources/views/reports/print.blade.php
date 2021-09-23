<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/pdf.css')}}">
</head>
<body>
	<div class="row" style="border: red solid 1px;">
		<div id="logo" class="col-xs-2 header">
			<img src="{{asset('img/gams.jpg')}}" alt="">
		</div>
		
		<div class="col-xs-7 header">
			GOBIERNO AUTÓNOMO MUNICIPAL DE SUCRE<br>
			DETALLE DE REGISTROS
		</div>
		
		<div class="col-xs-3 header">
			<strong>Admin, Inc.</strong><br>
			fecha<br>
			Phone: (804) 123-5432<br>
			Email: info@almasaeedstudio.com
		</div>
	</div>

	<div class="row">
		<table id="table" class="table-bordered" style="width: 100%">
			<thead>	
				<tr>
					<th>Id</th>
					<th>Tipo</th>
					<th>Detalle</th>
					<th>Documento</th>
					<th>Ult. destinatario</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
				<tr>
					<td>{{$item->id}}</td>
					<td>{{$item->type}}</td>
					<td>{{$item->quote}}</td>
					<td>{{$item->request_by}}</td>
					<td>{{$item->reference}}</td>
					<td>{{$item->amount}}</td>
				</tr>	
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>