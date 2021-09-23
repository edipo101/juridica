@extends('layout')

@section('title', 'Perfil de usuario')

@section('content-header')
<h1>Perfil de usuario</h1>
@endsection

@section('content')
@include('modals.changepass')
@include('modals.message')
<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="{{asset('img/avatar/'.auth()->user()->avatar.'.jpg')}}" alt="User profile picture">
				<h3 class="profile-username text-center">{{auth()->user()->fullname}}</h3>
				<p class="text-muted text-center">{{auth()->user()->job_title}}</p>
				<a href="#" class="btn btn-primary btn-block"><b>Cambiar imagen</b></a><br>
				<button class="btn btn-success btn-block" data-toggle="modal" data-target="#modal-change"><b>Cambiar contraseña</b></button>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-md-5">
		<h3 class="page-header">Datos personales</h3>
		<table class="table table-borderless" width="100%">
			<tr>
				<td class="td-label">Nombres</td>
				<td>{{auth()->user()->first_name.' '.auth()->user()->second_name}}</td>
			</tr>
			<tr>
				<td class="td-label">Apellidos</td>
				<td>{{auth()->user()->first_surname.' '.auth()->user()->second_surname}}</td>
			</tr>
			<tr>
				<td class="td-label">Cargo</td>
				<td>{{auth()->user()->job_title}}</td>
			</tr>
			<tr>
				<td class="td-label">Unidad</td>
				<td>{{auth()->user()->unit->name}}</td>
			</tr>
			<tr>
				<td class="td-label">Correo institucional</td>
				<td>{{auth()->user()->email}}</td>
			</tr>
		</table>
		<h3 class="page-header">Datos de usuario</h3>
		<table class="table table-borderless" width="100%">
			<tr>
				<td class="td-label">Nombre de usuario</td>
				<td>{{auth()->user()->username}}</td>
			</tr>
			<tr>
				<td class="td-label">Perfil</td>
				<td>{{auth()->user()->profile->name}}</td>
			</tr>
			<tr>
				<td class="td-label">Estado</td>
				<td>{{(auth()->user()->status == 1) ? 'ACTIVO' : 'DESHABILITADO'}}</td>
			</tr>
			<tr>
				<td class="td-label">Fecha de registro</td>
				<td>{{auth()->user()->created_at->format('d/m/Y H:i:s')}}</td>
			</tr>
			<tr>
				<td class="td-label">Última modificación</td>
				<td>{{auth()->user()->updated_at->format('d/m/Y H:i:s')}}</td>
			</tr>
		</table>
		
	</div>
</div>
@endsection

@push('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		var result = false;

		$('#btn-change').click(function(){
			url = '{{route('users.changepass')}}';
			data = $('#form-change').serialize();
			$.get(url, data, function(res){
				console.log(res);
				if (res == '200 OK'){
					$('#message').html('Se cambió la contraseña exitosamente!');
					result = true;
				}
				else
					$('#message').html('Error en la introducción de datos!');
			});
		});

		$('#modal-message').on('hidden.bs.modal', function(){
			if (result) 
				$('#btn-cancel').click();
		});

		$('#modal-change').on('hidden.bs.modal', function(){
			$('#form-change')[0].reset();
		});

		$("#form-change").keypress(function(e) {
			if(e.which == 13) {
          		$('#btn-change').click();
      		}
  		});
	})
</script>
@endpush