<div class="modal fade in" id="modal-view">
  <div class="modal-dialog" style="width: 55%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        {{-- <h4 id="func-title" class="modal-title">Detalle trámite</h4> --}}
        <h4 id="func-title" class="modal-title">Información documento</h4>
      </div>
      <div class="modal-body">
        {{-- <div class="mailbox-read-info">
          <h3 id="reference">Message Subject Is Placed Here</h3>
          <h5>From: <span id="from-id">help@example.com</span>
            <span class="mailbox-read-time pull-right">15 Feb. 2016 11:03 PM</span>
          </h5>
        </div> --}}
        <div class="row">          
          <div class="col-md-4" style="text-align: center; padding: 20px">
            <i class="fa fa-file-o" style="font-size: 1400%; color: #e3e4e5;"></i>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 20px; text-align: left; font-size: 12px">
            Creado, <span id="created_at"></span><br>
            Actualizado, <span id="updated_at"></span>
          </p>
          </div>
          <div class="col-md-8">
                <dl class="dl-horizontal">
                  @if (session('type_doc') == 'extdocs')
                  <dt>Nro. registro</dt>
                  <dd id="entry_number"></dd>
                  <dt>Fecha registro</dt>
                  <dd id="entry_date"></dd>
                  <hr class="hr2">
                  @endif
                  <dt>Tipo</dt>
                  <dd id="type"></dd>
                  <dt>Fecha de solicitud</dt>
                  <dd id="date"></dd>
                  <dt>Unidad solicitante</dt>
                  <dd id="unit"></dd>
                  <dt>Cite</dt>
                  <dd id="quote"></dd>
                  <div id="add"> 
                      <dt id="add_type"></dt>
                      <dd id="add_data"></dd>
                  </div>
                  <dt>Nro. de hojas</dt>
                  <dd id="amount"></dd>
                  <hr class="hr2">
                  <dt>Referencia</dt>
                  <dd id="reference"></dd>
                  <dt>Descripción</dt>
                  <dd id="description"></dd>
                  <dt>Archivo adjunto</dt>
                  <dd id="attached_file"></dd>
                  <hr class="hr2">
                  <dt>Registrado por:</dt>
                  <dd id="created_by"></dd>
                  <dd id="route-id" style="display: none;"></dd>
                </dl>       
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <a id="btn-file" class="btn btn-success" target="_blank" href=""><i class="fa fa-paperclip"></i> Ver archivo adjunto</a>
        {{-- <button id="" type="button" class="btn btn-danger"><i class="fa fa-print"></i> Generar PDF</button> --}}
        <button id="btn-close" type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>