<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkJuridic">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveJurific">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmJuridic']) !!}
        <input type="hidden" id="id" name="id" class="input-juridic">
        <input type="hidden" id="order_id" name="order_id" class="input-juridic">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="email">Pregunta</label>
                    <select class="form-control input-juridic input-sm" id="question_id" name="question_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($questions as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <label for="email">SI/NO</label>
                    <input type="checkbox" id="si_no" name="si_no" class="input-juridic form-control">
                </div>
                
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Descripción</label>
                    <input type="text" class="form-control input-juridic" id="description" name="description">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-condensed table-bordered" width="100%" id="tblJuridic">
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>SI/NO</th>
                            <th>Descripción</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        {!!Form::close()!!}
    </div>
</div>