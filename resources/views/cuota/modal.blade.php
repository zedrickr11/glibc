<div class="modal fade" id="dangerModal-{{$cuota->id_cuota}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('cuota.destroy', $cuota->id_cuota )}}">
  {!!method_field('DELETE')!!}
  {!!csrf_field()!!}


          <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Deshabilitar cuota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Confirme si desea deshabilitar la cuota</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Deshabilitar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
  </form>
          <!-- /.modal-dialog -->
</div>
