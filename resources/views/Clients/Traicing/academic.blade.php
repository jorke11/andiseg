<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-danger btn-sm" type="button" id="btnOkAcademic">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-warning btn-sm" type="button" id="btnNewAcademic">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Nuevo</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveAcademic">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmAcademic']) !!}
        <input type="hidden" id="id" name="id" class="input-academic">
        <input type="hidden" id="order_id" name="order_id" class="input-academic">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estudio</label>
                    <select class="form-control input-academic input-sm" id="study_id" name="study_id">
                        <option value="0">Seleccione</option>
                        @foreach($type_study as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Titulo Obtenido</label>
                    <input type="text" class="form-control input-academic" id="obtained_title" name='obtained_title' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Institución</label>
                    <input type="text" class="form-control input-academic" id="institution" name='institution' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Concepto</label>
                    <select class="form-control input-academic input-sm" id="concept_id" name="concept_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($results as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-condensed table-bordered" width="100%" id="tblAcademic">
                    <thead>
                        <tr>
                            <th>Estudio</th>
                            <th>Titulo Obtenido</th>
                            <th>Institución</th>
                            <th>Concepto</th>
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