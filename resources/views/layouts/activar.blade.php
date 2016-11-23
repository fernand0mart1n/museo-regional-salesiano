<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header modal-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Cambiar el estado del usuario {{ $usuario->name }}</h4>
        </div>
        <div class="modal-body">
            ¿Está seguro que desea cambiar el estado del usuario {{ $usuario->name }}?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="btnDel" type="button" class="btn btn-primary">Cambiar estado</button>
        </div>
    </div>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->