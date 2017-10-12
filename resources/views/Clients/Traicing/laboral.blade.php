<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-danger btn-sm" type="button" id="btnOkLaboral">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-warning btn-sm" type="button" id="btnNewLaboral">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Nuevo</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveLaboral">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmLaboral']) !!}
        <input type="hidden" id="id" name="id" class="input-laboral">
        <input type="hidden" id="order_id" name="order_id" class="input-laboral">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Nombre Empresa</label>
                    <input type="text" class="form-control input-laboral" id="business" name="business" required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Actividad</label>
                    <input type="text" class="form-control input-laboral" id="activity" name="activity" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Telefono</label>
                    <input type="text" class="form-control input-laboral" id="phone" name="phone" required>
                </div>
            </div>
           
        </div>
        <div class="row">
             <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Cargo Desempeñado</label>
                    <input type="text" class="form-control input-laboral" id="position" name="position" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Fecha Ingreso</label>
                    <input type="text" class="form-control input-laboral" id="fentry" name="fentry" value="<?php echo date("Y-m-d") ?>" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Fecha Retiro</label>
                    <input type="text" class="form-control input-laboral" id="fdeparture" name="fdeparture" value="<?php echo date("Y-m-d") ?>" required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Nombre Persona contactada</label>
                    <input type="text" class="form-control input-laboral" id="contact" name="contact">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Cargo Contacto</label>
                    <input type="text" class="form-control input-laboral" id="position_contact" name="position_contact">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Concepto Emitido</label>
                    <input type="text" class="form-control input-laboral" id="concept" name="concept">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Resultado</label>
                    <select class="form-control input-laboral input-sm" id="result_id" name="result_id" required="">
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
                <table class="table table-condensed table-bordered" width="100%" id="tblLaboral">
                    <thead>
                        <tr>
                            <th>Nombre Empresa</th>
                            <th>Actividad</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>F Ingreso</th>
                            <th>F Retiro</th>
                            <th>Contacto</th>
                            <th>Concepto</th>
                            <th>Resultado</th>
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