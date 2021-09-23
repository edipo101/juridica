@extends('layout')

@section('title', 'Editar registro')

@section('content-header')
<h1>Editar registro</h1> 
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		@if ($errors->count() > 0)
		@include('unit_routes._error_alert')
		@else
		<p>Crea un nuevo registro. Utiliza columnas y estados para definir cómo progresa el trabajo en tu tablero. Las columnas representan el flujo de trabajo del tablero. Los campos con (<span class="req">*</span>) son obligatorios.</p>
		@endif

		<form method="post" action="{{route('unit_routes.update')}}" autocomplete="off">
			@csrf
			<input type="hidden" name="id" value="{{$item->id}}">
			@include('procedures_module.unit_routes._form')
		</form>
	</div>
</div>
@endsection

@push('javascript')
<script src="{{asset('js/custom-project.js')}}"></script>
@endpush