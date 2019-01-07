<div class="modal fade" id="primaryModal-{{$cuota->id_cuota}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<form class="" action="{{ route('pagocuota.update', $cuota->id_cuota) }}" method="post">
{!!method_field('PUT')!!}
{!!csrf_field()!!}
    <div class="modal-dialog modal-primary" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Registrar pago de </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-11">
                  <label for=""><h5><strong>&nbsp;Cuota: </strong></h5></label>
                  <label class="pull-right" for=""><h5>&nbsp;Q. {{ $inscripcion->cuota }}</h5></label>
                </div>
            </div>
            @if ($inscripcion->cuota)
                @if($inscripcion->cuota)
                <input type="hidden" class="form-control" name="mora" value="1">
                {!!$errors->first('mora','<span class=text-danger>:message</span>')!!}
                <div class="row">
                    <div class="col-md-11">
                        <label for=""><h5><strong>&nbsp;Mora: </strong></h5></label>
                        <label class="pull-right" for=""><h5>&nbsp;Q. </h5></label>
                    </div>
                </div>
                <hr style="background-color: #2C3E50;">
                <div class="row">
                    <div class="col-md-11">
                        <label for=""><h5><strong>&nbsp;Total: </strong></h5></label>
                        <label class="pull-right" for=""><h5>&nbsp;Q. {{ number_format($inscripcion->cuota }}</h5></label>
                    </div>
                </div>
                @else
                <input type="hidden" class="form-control" name="mora" value="0">
                {!!$errors->first('mora','<span class=text-danger>:message</span>')!!}
                <hr style="background-color: #2C3E50;">
                <div class="row">
                    <div class="col-md-11">
                        <label for=""><h5><strong>&nbsp;Total: </strong></h5></label>
                        <label class="pull-right" for=""><h5>&nbsp;Q. {{ $inscripcion->cuota }}</h5></label>
                    </div>
                </div>
                @endif
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