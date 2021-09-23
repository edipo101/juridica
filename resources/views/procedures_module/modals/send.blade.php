<div class="modal fade" id="modal-send">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Enviar documento</h4>
			</div>
			<div class="modal-body">
				<form id="form-send" class="form-horizontal">
					<input type="hidden" name="doc_id" id="doc_id">
					<input type="hidden" name="route_id" id="route_id">
					
					<div class="form-group">
						<label for="doc_reference" class="col-sm-3 control-label">Referencia:</label>
						<div class="col-sm-8">
							<textarea name="doc_reference" id="doc_reference" rows="3" class="form-control" disabled></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="from_id" class="col-sm-3 control-label">De:</label>
						<div class="col-sm-8">
							<input type="hidden" name="from_id" value="{{auth()->user()->id}}">
							<input type="text" id="from_id" name="" disabled class="form-control" value="{{auth()->user()->username.' ('. auth()->user()->full_name.')'}}">
						</div>
					</div>
					<div class="form-group">
						<label for="to_id" class="col-sm-3 control-label"><span class="req">*</span> Para:</label>
						<div class="col-sm-8">
							<select name="to_id" id="to_id" class="form-control">
								<option value="" disabled selected style="display:none;">Elegir destinatario</option>
								@foreach ($users as $user)
								<option value="{{$user->id}}">{{$user->username.' ('. $user->full_name.')'}}</option>
								@endforeach
							</select>
							<span id="error_id" class="help-block" style="display: none;">Campo requerido</span>
						</div>
						{{-- <div class="col-sm-8">
							<select name="users" id="users" class="form-control"></select>
						</div> --}}
					</div>
					<div class="form-group">
						<label for="mesg_reference" class="col-sm-3 control-label"><span class="req">*</span> Mensaje:</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="msg_reference" id="msg_reference" placeholder="Añadir un mensaje..."></textarea>
							<span id="error_message" class="help-block" style="display: none;">Campo requerido</span>
						</div>
					</div>
					<div class="form-group">
						<label for="priority" class="col-sm-3 control-label">Prioridad:</label>
						<div class="col-sm-7" style="padding-top: 7px;">
							<label class="option_radio">
								<input type="radio" name="priority" class="flat-red" value="Alta"> Alta
							</label>
							<label class="option_radio">
								<input type="radio" name="priority" class="flat-red" value="Media" checked> Normal
							</label>
							<label class="option_radio">
								<input type="radio" name="priority" class="flat-red" value="Baja"> Baja
							</label>
						</div>
						<span id="priority" class="help-block" style="display: none;">Campo requerido</span>
					</div>
					{{-- <div class="form-group">
						<label for="files" class="col-sm-3 control-label">Adjuntar:</label>
						<div class="col-sm-8">
							<input type="file" name="files" id="files">
						</div>
					</div> --}}

				</form>
			</div>
			<div class="modal-footer">
				<button id="btn-cancel" type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" id="send">Enviar</button>
			</div>
		</div>
	</div>
</div>