<div class="modal fade"  role="dialog" id='modalNew'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ciudades</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frm']) !!}
                <input type="hidden" id="id" name="id" class="input-cities">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Department</label>
                            <select class="form-control input-cities" id='department_id' name="department_id" data-api="/api/getDepartment" required>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Code</label>
                            <input type="text" class="form-control input-cities" id="code" name='code' required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Description</label>
                            <input type="text" class="form-control input-cities" id="description" name='description' required>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id='new'>Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>