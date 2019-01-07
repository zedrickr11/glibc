<div class="modal fade" id="primaryModal-{{$cuota->id_cuota}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('pagocuota.store') }}" method="post">
{!!csrf_field()!!}
    <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Registrar Pago</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-11">
                    <label for=""><h5>Descripción:</h5></label><br>
                    <label for=""><h4>{{$cuota->nombre}}</h4></label>
                </div>
            </div>
            <input type="hidden" class="form-control" name="id_inscripcion" value="{{ $inscripcion->id_inscripcion }}">
            {!!$errors->first('id_inscripcion','<span class=text-danger>:message</span>')!!}
            <input type="hidden" class="form-control" name="id_cuota" value="{{$cuota->id_cuota}}">
            {!!$errors->first('id_cuota','<span class=text-danger>:message</span>')!!}
            <hr style="background-color: #2C3E50;">
            <div class="row">
                <div class="col-md-11">
                    <label for=""><h5><strong>&nbsp;Total a pagar: </strong></h5></label>
                    <label class="pull-right" for=""><h5>&nbsp;Q. {{$cuota->cantidad}}</h5></label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</form>
</div>
<!-- /.modal -->