<div class="modal fade" id="warningModal-{{$alumno->id_inscripcion}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('pagocuota.editar', ['idCuota' => $cuota->id_cuota, 'idInscripcion' => $alumno->id_inscripcion]) }}" method="post">
{!!method_field('PUT')!!}
{!!csrf_field()!!}
    <div class="modal-dialog modal-warning" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Editar Pago</h4>
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
            <div class="row">
                <div class="col-md-11">
                    <label for=""><h5>Monto pagado anteriormente </h5></label>
                    <label class="pull-right" for=""><h5>Q. {{ $montoanterior}}</h5></label>
                </div>
            </div>
            <hr style="background-color: #2C3E50;">
            <div class="form-group row">
                <label class="col-md-8 col-form-label" for=""><h5>&nbsp;Saldo a pagar: </h5></label>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="monto" min="0" max="{{ $faltante }}" value="{{ $faltante }}">
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning">Guardar</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</form>
</div>
<!-- /.modal -->