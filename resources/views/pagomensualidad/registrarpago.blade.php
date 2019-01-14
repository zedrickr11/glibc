<div class="modal fade" id="primaryModal-{{$pago->id_pagomensualidad}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('pagomensualidad.update', $pago->id_pagomensualidad) }}" method="post">
{!!method_field('PUT')!!}
{!!csrf_field()!!}
    <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Registrar pago de {{$pago->mensualidad->nombre}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group row">
                <label class="col-md-8 col-form-label" for=""><h5><strong>&nbsp;Cuota: </strong></h5></label>
                <div class="col-md-4">
                  <input type="number" class="form-control" name="cuota" min="0" max="{{ $inscripcion->cuota }}" value="{{ $pago->monto != null ? $pago->monto: $inscripcion->cuota }}">
                </div>
            </div>
            
                @if(\Carbon\Carbon::parse($pago->mensualidad->dia_limite . '-' . ($pago->mensualidad->id_mensualidad + 1) . '-' . $ano) <  \Carbon\Carbon::parse($date))
                <div class="form-group row">
                    <label class="col-md-8 col-form-label" for=""><h5><strong>&nbsp;Mora: </strong></h5></label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" min="0" max="{{ $mora->cantidad }}" name="mora" value="{{ $pago->mora != null ? $pago->mora: $mora->cantidad }}">
                    </div>
                    {!!$errors->first('mora','<span class=text-danger>:message</span>')!!}
                </div>
                <div class="form-group row">
                    <label class="col-md-8 col-form-label" for=""><h5><strong>&nbsp;Numero de Boleta: </strong></h5></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="num_boleta">
                    </div>
                </div>
                <hr style="background-color: #2C3E50;">
                <div class="row">
                    <div class="col-md-11">
                        <label for=""><h5><strong>&nbsp;Total a pagar: </strong></h5></label>
                        <label class="pull-right" for=""><h5>&nbsp;Q. {{ number_format($inscripcion->cuota + $mora->cantidad, 2, '.', ',') }}</h5></label>
                    </div>
                </div>
                @else
                <input type="hidden" class="form-control" name="mora" value="0">
                <div class="form-group row">
                    <label class="col-md-8 col-form-label" for=""><h5><strong>&nbsp;Numero de Boleta: </strong></h5></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="num_boleta">
                    </div>
                </div>
                {!!$errors->first('mora','<span class=text-danger>:message</span>')!!}
                <hr style="background-color: #2C3E50;">
                <div class="row">
                    <div class="col-md-11">
                        <label for=""><h5><strong>&nbsp;Total a pagar: </strong></h5></label>
                        <label class="pull-right" for=""><h5>&nbsp;Q. {{ $inscripcion->cuota }}</h5></label>
                    </div>
                </div>
                @endif
            
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