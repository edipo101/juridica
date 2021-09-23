@extends('layout')

@section('title', 'Crear usuario')

@section('content-header')
<h1>Crear nuevo usuario</h1> 
<p class="description">Ingrese los datos del nuevo usuario. Los campos con (<span class="req">*</span>) son obligatorios.</p>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<form method="post" action="{{route('users.store')}}" autocomplete="off">
			@csrf
			@include('users._form')
		</form>
	</div>
</div>
@endsection

@push('javascript')
<script src="{{asset('js/custom-project.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#message').html('Error en la introducción de datos!');
		$('#modal-message').modal('show');
	});
</script>
@endpush