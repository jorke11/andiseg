<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">

                <table class="table table-bordered table-condensed" id="tbl" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Direccion</th>
                            <th>Tipo Documento</th>
                            <th>Ciudad</th>
                            <th>Departamento</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" role="dialog" id="modalSend">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Enviar a Cliente</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmSend']) !!}
                <input type="hidden" name="id" id="id" class="input-send">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control input-send">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Apellido</label>
                            <input type="text" name="last_name" id="last_name" class="form-control input-send">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" id="email" class="form-control input-send">
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnSend">Enviar</button>
            </div>
        </div>
    </div>
</div>