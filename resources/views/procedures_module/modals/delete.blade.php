<div class="modal fade in" id="modal-delete" style="padding-right: 16px;">
  <div class="modal-dialog" style="width: 35%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Eliminar documento</h4>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro de eliminar el documento?</p>
        <p class="text-muted well well-sm no-shadow">
          Tipo: <span id="del-type"></span><br>
          Referencia: <span id="del-ref"></span>
        </p>
        <span id="del-id" style="display: none;"></span>
      </div>
      <div class="modal-footer">
        <button id="btn-cancel" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <button id="btn_deldoc" class="btn btn-primary btn-flat">Si, Eliminar</button>
      </div>
    </div>
  </div>
</div>