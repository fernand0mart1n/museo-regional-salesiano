<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header modal-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> Autorizar al usuario {{ $usuario->name }}</h4>
        </div>
        <div class="modal-body">
            ¿Está seguro que desea autorizar al usuario {{ $usuario->name }}? <br>
            Se activará al usuario con el rol seleccionado. <br>

                <?= Former::select('rol')
                ->fromQuery(App\Role::all(), 'display_name', 'id')
                ->required() ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button id="btnDel" type="button" class="btn btn-primary">Autorizar usuario</button>
        </div>
    </div>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->