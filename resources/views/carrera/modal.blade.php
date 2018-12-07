<div class="modal fade" id="dangerModal-{{$carrera->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('carrera.destroy', $carrera->id )}}">
  {!!method_field('DELETE')!!}
  {!!csrf_field()!!}
    <div class="modal-dialog modal-danger" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Deshabilitar carrera</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Confirme si desea deshabilitar la carrera</p>
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
