<div class="modal fade" id="userModal-{{$cur->id_persona}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('loginPadre')}}">
  {!!csrf_field()!!}


          <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Credenciales <span class="fa fa-unlock-alt"></span> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              
              <input type="hidden" name="name" value="{{$cur->nombres}}{{ " " }}{{ $cur->apellidos }}">
              <input type="hidden" name="email" value="{{$cur->email}}">
              <input type="hidden" name="id_persona" value="{{$cur->id_persona}}">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
  </form>
          <!-- /.modal-dialog -->
</div>
