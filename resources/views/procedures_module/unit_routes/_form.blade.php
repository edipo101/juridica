<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="form-group col-md-4">
				<label for="type_id">Tipo de documento 	</label>
				<select name="type_id" id="type_id" class="form-control">
					<option value="" disabled selected style="display:none;">Elegir el tipo de documento</option>
					@foreach ($type_docs as $type)
					<option {!!((old('type_id', $item->type_id) == $type->id) ? "selected" : "")!!} value="{{$type->id}}">
						{{$type->name}}
					</option>
					@endforeach
				</select>
				{!! $errors->first('type_id', '<span class="help-block">:message</span>')!!}
			</div>
		</div>

		<h2 class="page-header">Datos Unidad Solicitante</h2>
		<div class="row">
			<div class="form-group col-md-4">
				<label>Fecha de elaboración <span class="req">*</span></label>
				<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
					<input type="text" class="form-control pull-right" id="datepicker" name="date" 
					value="{{old('date', ($item->date) ? $item->date : '')}}"
					>
				</div>
				{!! $errors->first('date', '<span class="help-block">:message</span>')!!}
			</div>
			<div class="form-group col-md-2">
				<label for="amount">Nro hojas <span class="req">*</span></label>
				<input type="text" class="form-control" id="amount" name="amount" placeholder="" value="{{old('amount', $item->amount)}}">
				{!! $errors->first('amount', '<span class="help-block">:message</span>')!!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="unit_id">Unidad solicitante</label>
				<select name="unit_id" id="unit_id" class="form-control">
					<option value="" disabled selected style="display:none;">Elegir una Unidad Solicitante</option>
					@foreach ($units as $unit)
					<option 
					{!!((old('unit_id', $item->unit_id) == $unit->id) ? "selected" : "")!!} 
					value="{{$unit->id}}">
					{{$unit->name}}
				</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-2">
			<label for="quote">Cite</label>
			<input type="text" class="form-control" id="quote" name="quote" placeholder="Ejm. 23/2021" value="{{old('quote', $item->quote)}}">
		</div>
	</div>

	<h2 class="page-header">Detalle</h2>

	<div class="form-group">
		<label for="reference">Referencia <span class="req">*</span></label> 
		<input type="text" class="form-control" id="reference" name="reference" placeholder="Añadir una referencia..." value="{{old('reference', $item->reference)}}">
		{!! $errors->first('reference', '<span class="help-block">:message</span>')!!}
	</div>
	<div class="form-group">
		<label for="description">Descripción</label>
		<textarea name="description" id="description" rows="5" class="form-control" placeholder="Añadir una descripción...">{{old('description', $item->description)}}</textarea>
		{!! $errors->first('description', '<span class="help-block">:message</span>')!!}
	</div>
	<div class="form-group">
		<label for="attached_file">Adjuntar archivo</label>
		<input type="file" id="attached_file" name="attached_file" accept="application/pdf">
		{!! $errors->first('attached_file', '<span class="help-block">:message</span>')!!}
		{{-- <p class="help-block">Example block-level help text here.</p> --}}
	</div>
</div>
<div class="box-footer">
	<button type="submit" class="btn btn-primary col-md-1">Guardar</button>
	<a href="{{route('unit_routes.index')}}" style="margin-left: 7px;" class="btn btn-default col-md-1">Cancelar</a>
</div>
</div>