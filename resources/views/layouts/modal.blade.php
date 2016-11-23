<div id="@yield('modalid')" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header modal-danger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> @yield('modaltitle')</h4>
        </div>
        <div class="modal-body">
            @yield('modalbody')
        </div>
        <div class="modal-footer">
            @yield('modalfooter')
        </div>
    </div>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->