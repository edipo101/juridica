<div class="modal fade" id="modal-create-unit">
	<div class="modal-dialog" style="width: 50%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Crear unidad</h4>
			</div>
			<div class="modal-body">
				<form id="form-unit" class="form-horizontal" autocomplete="off">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label"><span class="req">*</span> Nombre:</label>
						<div class="col-sm-8">
							<input type="text" id="name" name="name" class="form-control" value="">
							<span id="error_name" class="help-block" style="display: none;">Campo requerido</span>
						</div>
					</div>
				</form>
				Los campos con (<span class="req">*</span>) son obligatorios
			</div>
			<div class="modal-footer">
				<button id="btn-cancel" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
				<button id="btn-save" type="button" data-toggle="modal" data-target="#modal-message" class="btn btn-success">Guardar</button>
			</div>
		</div>
	</div>
</div>