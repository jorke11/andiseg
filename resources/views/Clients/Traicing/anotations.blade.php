<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkAnotations">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveAnotations">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmAnotations','files'=>true]) !!}
        <input type="hidden" id="id" name="id" class="input-anotations">
        <input type="hidden" id="order_id" name="order_id" class="input-anotations">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Entidad</label>
                    <select class="form-control input-anotations input-sm" id="entity_id" name="entity_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($entities as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="email">Cod Verificación</label>
                    <input type="text" class="form-control input-anotations" id="verification_code" name="verification_code">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="email">Certificado</label>
                    <input type="text" class="form-control input-anotations" id="certificate" name="certificate">
                </div>
            </div>

            <div class="col-lg-5">
                <div class="form-group">
                    <label for="email">Anotacion</label>
                    <input type="text" class="form-control input-anotations" id="anotation" name="anotation">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Concepto</label>
                    <select class="form-control input-anotations input-sm" id="concept_id" name="concept_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($results as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="email">Foto</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-condensed table-bordered" width="100%" id="tblAnotations">
                    <thead>
                        <tr>
                            <th>Entidad</th>
                            <th>Codigo Verificación</th>
                            <th>Certificado</th>
                            <th>Anotación</th>
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