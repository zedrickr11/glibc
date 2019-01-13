<div class="modal fade" id="warningModal-{{$pago->id_pagomensualidad}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('pagomensualidad.editar', $pago->id_pagomensualidad) }}" method="post">
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
                    <label for=""><h5>Pago de {{$pago->mensualidad->nombre}} </h5></label>
                    <label class="pull-right" for=""><h5>Q. {{ $inscripcion->cuota }}</h5></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <label for=""><h5>Monto pagado anteriormente </h5></label>
                    <label class="pull-right" for=""><h5>Q. {{ $pago->monto }}</h5></label>
                </div>
            </div>
            @if(\Carbon\Carbon::parse($pago->mensualidad->dia_limite . '-' . ($pago->mensualidad->id_mensualidad + 1) . '-' . $ano) <  \Carbon\Carbon::parse($date))
                <div class="row">
                    <div class="col-md-11">
                        <label for=""><h5>Mora pagada anteriormente </h5></label>
                        <label class="pull-right" for=""><h5>Q. {{ $pago->mora }}</h5></label>
                    </div>
                </div>
            @endif
            <hr style="background-color: #2C3E50;">
            <div class="form-group row">
                <label class="col-md-8 col-form-label" for=""><h5>&nbsp;Monto pendiente a pagar: </h5></label>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="cuota" min="0" max="{{ $inscripcion->cuota - $pago->monto }}" value="{{ $inscripcion->cuota - $pago->monto }}">
                </div>
            </div>
            @if(\Carbon\Carbon::parse($pago->mensualidad->dia_limite . '-' . ($pago->mensualidad->id_mensualidad + 1) . '-' . $ano) <  \Carbon\Carbon::parse($date))
            <div class="form-group row">
                <label class="col-md-8 col-form-label" for=""><h5>&nbsp;Mora pendiente a pagar: </h5></label>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="mora" min="0" max="{{ $mora->cantidad - $pago->mora }}" value="{{ $mora->cantidad - $pago->mora }}">
                </div>
            </div>
            @else
                <input type="hidden" class="form-control" name="mora" value="0">
            @endif
            <div class="form-group row">
                <label class="col-md-8 col-form-label" for=""><h5><strong>&nbsp;Numero de Boleta: </strong></h5></label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="num_boleta" value="{{ $pago->num_boleta }}">
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