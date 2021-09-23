<div class="modal fade" id="modal-change">
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
					<div class="form-group">
						<label for="old_pass" class="col-sm-5 control-label"><span class="req">*</span> Contraseña actual:</label>
						<div class="col-sm-6">
							<input type="password" id="old_pass" name="old_pass" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="new_pass" class="col-sm-5 control-label"><span class="req">*</span> Contraseña nueva:</label>
						<div class="col-sm-6">
							<input type="password" id="new_pass" name="new_pass" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="re_pass" class="col-sm-5 control-label"><span class="req">*</span> Repetir contraseña:</label>
						<div class="col-sm-6">
							<input type="password" id="re_pass" name="re_pass" class="form-control" value="">
						</div>
					</div>
				</form>
				Los campos con (<span class="req">*</span>) son obligatorios
			</div>
			<div class="modal-footer">
				<button id="btn-cancel" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
				<button type="button" data-toggle="modal" data-target="#modal-message" class="btn btn-success" id="btn-change">Guardar</button>
			</div>
		</div>
	</div>
</div>