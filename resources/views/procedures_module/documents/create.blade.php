@extends('layout')

@section('title', 'Crear documento')

@section('content-header')
@if(session('type_doc') == 'mydocs')
<h1>Registrar nuevo documento</h1> 
@else
<h1>Registrar nuevo documento externo</h1> 
@endif
<p class="description">Ingrese los datos del nuevo documento. Los campos con (<span class="req">*</span>) son obligatorios.</p>
@endsection

@section('content')
@include('procedures_module.modals.create_unit')
<div class="row">
	<div class="col-md-12">		
		@if(session('type_doc') == 'mydocs')
		<form method="post" action="{{route('documents.store')}}" autocomplete="off" enctype="multipart/form-data">
		@else
		<form method="post" action="{{route('documents.ext_store')}}" autocomplete="off" enctype="multipart/form-data">
		@endif
			@csrf
			<input type="hidden" name="previous_route" value="{{old('previous_route', url()->previous())}}">
			@include('procedures_module.documents._form')
		</form>
	</div>
</div>
@endsection

@push('javascript')
<script src="{{asset('js/custom-project.js')}}"></script>
<script>
	$('#optionApplicant1').on('click', function(){
		$('#applicant').removeAttr('disabled');
		$('#identity_card').removeAttr('disabled');
		$('#unit_id').attr('disabled', 'disabled');
		$('#new-unit').attr('disabled', 'disabled');
		$('#quote').attr('disabled', 'disabled');
	});

	$('#optionApplicant2').on('click', function(){
		$('#applicant').attr('disabled', 'disabled');
		$('#identity_card').attr('disabled', 'disabled');
		$('#unit_id').removeAttr('disabled');
		$('#new-unit').removeAttr('disabled');
		$('#quote').removeAttr('disabled');
	});

	$('#new-unit').on('click', function(e){
		e.preventDefault();
	});
	
	$('#btn-save').on('click', function(){
		url = '{{route('units.ajax_store')}}'
		data = $('#form-unit').serialize();
		$.get(url, data, function(result){
			console.log(result);
			if (result.success == false){
        		$('#error_name').html(result.data.name[0]);
        		$('#error_name').show();
			}
			else{
				$('#modal-create-unit').modal('hide');
				$('#unit_id').append('<option value="'+result.data.id+'">'+result.data.name+'</option>');
			}
		});
	});

	//Cerrar ventana al presionar enter
	$('#form-unit').keypress(function(e){
		if(e.which == 13){
			e.preventDefault();
			$('#btn-save').click();
		}
	});

	//Resetear valores al salir
	$('#modal-create-unit').on('hidden.bs.modal', function(){
		$('#form-unit')[0].reset();
		$('.help-block').hide();
	});

	//Establecer el foco en un determinado campo
	$('#modal-create-unit').on('shown.bs.modal', function(){
		$('#name').focus();
	});	
</script>
@endpush