<div class="modal fade" id="primaryModal-{{$alumno->id_inscripcion}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <label for="">Descripción:</label><br>
                    <label for=""><h5>{{$cuota->nombre}} </h5></label>
                    <label class="pull-right" for=""><h5>Q. {{ $cuota->cantidad}}</h5></label>
                </div>
            </div>
            <input type="hidden" class="form-control" name="id_inscripcion" value="{{ $alumno->id_inscripcion }}">
            {!!$errors->first('id_inscripcion','<span class=text-danger>:message</span>')!!}
            <input type="hidden" class="form-control" name="id_cuota" value="{{$cuota->id_cuota}}">
            {!!$errors->first('id_cuota','<span class=text-danger>:message</span>')!!}
            <hr style="background-color: #2C3E50;">
            <div class="form-group row">
                <label class="col-md-8 col-form-label" for=""><h5>&nbsp;Cantidad a pagar: </h5></label>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="monto" min="0" max="{{ $cuota->cantidad }}" value="{{ $cuota->cantidad }}">
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