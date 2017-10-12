<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkAnotations">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSavePoligrafia">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmPoligrafia','files'=>true]) !!}
        <input type="hidden" id="id" name="id" class="input-poligrafia">
        <input type="hidden" id="order_id" name="order_id" class="input-poligrafia">
        <div class="row">
            <div class="col-lg-5">
                <div class="form-group">
                    <label for="email">Foto</label>
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div id="poligraphy">
                </div>
            </div>
        </div>

        {!!Form::close()!!}
    </div>
</div>