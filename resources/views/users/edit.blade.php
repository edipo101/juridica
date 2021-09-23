@extends('layout')

@section('title', 'Crear usuario')

@section('content-header')
<h1>Modificar usuario</h1> 
<p class="description">Ingrese los datos del usuario. Los campos con (<span class="req">*</span>) son obligatorios.</p>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		@if ($errors->count() > 0)
		@include('modals.message')
		@endif

		<form method="post" action="{{route('users.update')}}" autocomplete="off">
			@csrf
			<input type="hidden" name="id" value="{{$item->id}}">
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