<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkDomicile">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveDomicile">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmDomicile']) !!}
        <input type="hidden" id="id" name="id" class="input-domicile">
        <input type="hidden" id="order_id" name="order_id" class="input-domicile">
        <div class="row">
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="email">Concepto Final del Visitador o Profesional</label>
                    <textarea class="form-control input-domicile" id="concept" name="concept"></textarea>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="email">Resultado</label>
                    <select class="form-control input-domicile input-sm" id="result_id" name="result_id">
                        <option value="0">Seleccione</option>
                        @foreach($results as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>