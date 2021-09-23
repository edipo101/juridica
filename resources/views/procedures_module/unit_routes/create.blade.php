@extends('layout')

@section('title', 'Crear registro')

@section('content-header')
<h1>Crear nuevo registro</h1> 
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		@if ($errors->count() > 0)
		{{-- @include('unit_routes._error_alert') --}}
		@else
		<p>Ingrese los datos del nuevo registro. Los campos con (<span class="req">*</span>) son obligatorios.</p>
		@endif

		<form method="post" action="{{route('unit_routes.store')}}" autocomplete="off" enctype="multipart/form-data">
			@csrf
			@include('procedures_module.unit_routes._form')
		</form>
	</div>
</div>
@endsection

@push('javascript')
<script src="{{asset('js/custom-project.js')}}"></script>
@endpush