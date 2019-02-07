<div class="modal fade" id="userModal-{{$cur->id_persona}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('loginAdmin')}}">
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
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      @foreach ($roles as $role)
                        <div class="col-lg-6">
                            <label for=""> {{ $role->display_name }}  </label>
                        </div>
                        <div class="col-lg-6">
                          <label class="switch switch-icon switch-pill switch-success">
                            <input type="checkbox" value="{{ $role->id }}" class="switch-input" name="role_id[]" >
                            <span class="switch-label" data-on="" data-off=""></span>
                            <span class="switch-handle"></span>
                          </label>
                        </div>


                      <br>
                    @endforeach
                    </div>
                </div><br>
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
