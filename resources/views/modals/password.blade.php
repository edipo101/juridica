<div class="modal fade" id="modal-password">
	<div class="modal-dialog" style="width: 35%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Cambiar contraseña</h4>
			</div>
			<div class="modal-body">
				<form id="form-change" class="form-horizontal">
					<input type="hidden" name="user_id" id="user_id">
					<div class="form-group">
						<label for="new_pass" class="col-sm-5 control-label"><span class="req">*</span> Contraseña nueva:</label>
						<div class="col-sm-6">
							<input type="text" id="new_pass" name="new_pass" class="form-control">
							<span id="error_password" class="help-block" style="display: none;">Campo requerido</span>
						</div>
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button id="btn-cancel" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-success" id="btn-save">Guardar</button>
			</div>
		</div>
	</div>
</div>