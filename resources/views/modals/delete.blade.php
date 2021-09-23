<div class="modal fade in" id="modal-delete" style="padding-right: 16px;">
  <div class="modal-dialog" style="width: 350px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Eliminar registro</h4>
      </div>
      <div class="modal-body">
        ¿Esta seguro de eliminar el siguiente documento?<br>
        Tipo: <span id="del_type"></span>        
        Documento: <span id="del_type"></span>        
      </div>
      <div class="modal-footer">
        <button id="btn-cancel" type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
        <form method="post" action="">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id" id="id" value="">
          <button type="submit" class="btn btn-primary btn-flat">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>