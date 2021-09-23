@extends('layout')

@section('title', 'Modificar documento')

@section('content-header')
<h1>Modificar documento</h1> 
@endsection
@section('content')

<div class="row">
	<div class="col-md-12">
		<p>Ingrese los nuevos datos del documento. Los campos con (<span class="req">*</span>) son obligatorios.</p>

		<form method="post" action="{{route('documents.update')}}" autocomplete="off" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="previous_route" value="{{old('previous_route', url()->previous())}}">
			<input type="hidden" name="id" value="{{old('id', $document->id)}}">
			@include('procedures_module.documents._form')
		</form>
	</div>
</div>
@endsection

@push('javascript')
<script src="{{asset('js/custom-project.js')}}"></script>
@endpush