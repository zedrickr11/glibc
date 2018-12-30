<div class="modal fade" id="primaryModal-{{$pago->id_pagomensualidad}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('pagomensualidad.update', $pago->id_pagomensualidad) }}" method="post">
{!!method_field('PUT')!!}
{!!csrf_field()!!}
    <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Registrar pago de mensualidad {{$pago->id_pagomensualidad}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="monto">Monto a pagar</label>
                    <input type="number" min="0" step="0.01" class="form-control" name="monto" placeholder="Monto...">
                    {!!$errors->first('monto','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label for="mora">Mora</label>
                    <input type="number" min="0" step="0.01" class="form-control" name="mora" placeholder="Mora...">
                    {!!$errors->first('mora','<span class=text-danger>:message</span>')!!}
                </div>
            </div><br>
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