<div class="modal fade" id="successModal-{{$mensualidad->id_mensualidad}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('mensualidad.destroy', $mensualidad->id_mensualidad )}}">
  {!!method_field('DELETE')!!}
  {!!csrf_field()!!}
    <div class="modal-dialog modal-success" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Habilitar mensualidad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Confirme si desea habilitar la mensualidad</p>
          <input type="hidden" name="valor" value="1">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Habilitar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
  </form>
  <!-- /.modal-dialog -->
</div>
