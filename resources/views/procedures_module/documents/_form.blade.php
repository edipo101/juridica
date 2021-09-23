<div class="box">
	<div class="box-body">
		<div class="row">
			@if (session('type_doc') == 'extdocs')
			<div class="form-group col-md-2">
				<label for="entry_number">Nro. registro <span class="req">*</span></label>
				<input type="text" class="form-control" id="entry_number" name="entry_number" value="{{old('entry_number', $document->entry_number)}}">
				{!! $errors->first('entry_number', '<span class="help-block">:message</span>')!!}
			</div>	
			<div class="form-group col-md-2">
				<label for="entry_date">Fecha registro <span class="req">*</span></label>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					<input type="text" class="form-control pull-right datepicker" name="entry_date" 
					value="{{old('entry_date', ($document->entry_date) ? $document->entry_date : '')}}"
					>
				</div>
				{!! $errors->first('entry_date', '<span class="help-block">:message</span>')!!}
			</div>	
			@endif	
			<div class="form-group col-md-3">
				<label for="type_id">Tipo de documento <span class="req">*</span></label>
				<select name="type_id" id="type_id" class="form-control">
					<option value="" disabled selected style="display:none;">Elegir el tipo de documento</option>
					@foreach ($type_docs as $type)
					<option {!!((old('type_id', $document->type_id) == $type->id) ? "selected" : "")!!} value="{{$type->id}}">
						{{$type->name}}
					</option>
					@endforeach
				</select>
				{!! $errors->first('type_id', '<span class="help-block">:message</span>')!!}
			</div>
		</div>

		@if (session('type_doc') == 'extdocs')
		<h2 class="page-header">Datos Solicitante</h2>
		@endif

		@if (session('type_doc') == 'extdocs')
		<div class="row">			
			<div class="form-group col-md-10" style="margin-bottom: 0px;">
				<div class="radio">
					<label>
						<input type="radio" name="optionApplicant" id="optionApplicant1" value="option1" checked="">
						Nombre o empresa solicitante
					</label>

				</div>
				<div>
					<div class="form-group col-md-8">
						<label for="applicant">Nombre solicitante </label> 
						<input type="text" class="form-control" id="applicant" name="applicant" placeholder="Nombre completo" value="{{old('applicant', $document->applicant)}}">
						{!! $errors->first('applicant', '<span class="help-block">:message</span>')!!}
					</div>
					<div class="form-group col-md-4">
						<label for="identity_card">Ced. Identidad</label>
						<input type="text" class="form-control" id="identity_card" name="identity_card" placeholder="Ejm. 1548241" value="{{old('quote', $document->quote)}}">
					</div>
				</div>
				
				<div class="radio">
					<label>
						<input type="radio" name="optionApplicant" id="optionApplicant2" value="option2">
						Unidad Solicitante
					</label>
				</div>
				<div>
					<div class="form-group col-md-8">
						<label for="unit_id">Unidad solicitante</label>
						<div class="input-group">
							<select name="unit_id" id="unit_id" class="form-control select2 col-md-6" disabled="disabled">
								<option value="" disabled selected style="display:none;">Elegir una Unidad Solicitante</option>
								@foreach ($units as $unit)
								<option 
								{!!((old('unit_id', $document->unit_id) == $unit->id) ? "selected" : "")!!} 
								value="{{$unit->id}}">
								{{$unit->name}}
								</option>
								@endforeach
							</select>
							<div class="input-group-addon" style="padding: 0px; border: none;">
								<button id="new-unit" class="btn btn-default" data-toggle="modal" data-target="#modal-create-unit" style="width: 37px; margin-left: 5px; height: 34px;" disabled="disabled">...</button>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4">
						<label for="quote">Cite</label>
						<input type="text" class="form-control" id="quote" name="quote" disabled="disabled" placeholder="Ejm. 23/2021" value="{{old('quote', $document->quote)}}">
					</div>
				</div>
			</div>
		</div>
		@endif
		@if (session('type_doc') != 'extdocs')
		<div class="row">			
			<div class="form-group col-md-2">
				<label for="quote">Cite</label>
				<input type="text" class="form-control" id="quote" name="quote" placeholder="Ejm. 23/2021" value="{{old('quote', $document->quote)}}">
			</div>
		</div>
		@endif
	<div class="row">
		<div class="form-group col-md-2">
			<label for="date">Fecha de elaboración <span class="req">*</span></label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
				<input type="text" class="form-control pull-right datepicker" name="date" 
				value="{{old('date', ($document->date) ? $document->date : '')}}"
				>
			</div>
			{!! $errors->first('date', '<span class="help-block">:message</span>')!!}
		</div>
		<div class="form-group col-md-2">
			<label for="amount">Nro hojas <span class="req">*</span></label>
			<input type="text" class="form-control" id="amount" name="amount" placeholder="" value="{{old('amount', $document->amount)}}">
			{!! $errors->first('amount', '<span class="help-block">:message</span>')!!}
		</div>
		@if (session('type_doc') == 'extdocs')
		<div class="form-group col-md-2">
			<label for="add_type_id">Tipo dato adicional</label>
			<select name="add_type_id" id="add_type_id" class="form-control">
				<option value="" disabled selected style="display:none;">Elegir el tipo adicional</option>
				@foreach ($type_adds as $type_add)
				<option {!!((old('add_type_id', $document->add_type_id) == $type_add->id) ? "selected" : "")!!} value="{{$type_add->id}}">
					{{$type_add->name}}
				</option>
				@endforeach
			</select>
			{!! $errors->first('add_type_id', '<span class="help-block">:message</span>')!!}
		</div>
		<div class="form-group col-md-2">
			<label for="add_data">Nro. adicional</label>
			<input type="text" class="form-control" id="add_data" name="add_data" placeholder="" value="{{old('add_data', $document->add_data)}}">
			{!! $errors->first('add_data', '<span class="help-block">:message</span>')!!}
		</div>
		@endif
	</div>

	<h2 class="page-header">Detalle</h2>

	<div class="row">
		<div class="form-group col-md-8">
			<label for="reference">Referencia <span class="req">*</span></label> 
			<input type="text" class="form-control" id="reference" name="reference" placeholder="Añadir una referencia..." value="{{old('reference', $document->reference)}}">
			{!! $errors->first('reference', '<span class="help-block">:message</span>')!!}
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-8">
			<label for="description">Descripción</label>
			<textarea name="description" id="description" rows="5" class="form-control" placeholder="Añadir una descripción...">{{old('description', $document->description)}}</textarea>
			{!! $errors->first('description', '<span class="help-block">:message</span>')!!}
		</div>
	</div>
	<div class="form-group">
		<label for="attached_file">Adjuntar archivo</label>
		<input type="file" id="attached_file" name="attached_file" accept="application/pdf">
		{!! $errors->first('attached_file', '<span class="help-block">:message</span>')!!}
	</div>
</div>
<div class="box-footer">
	<button type="submit" class="btn btn-primary col-md-1">Guardar</button>
	@if (session('type_doc') == 'mydocs')
	<a href="{{route('documents.index')}}" style="margin-left: 7px;" class="btn btn-default col-md-1">Cancelar</a>
	@else
	<a href="{{route('documents.ext_docs')}}" style="margin-left: 7px;" class="btn btn-default col-md-1">Cancelar</a>
	@endif
</div>
</div>