
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkPhoto">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSavePhoto">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> Save</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">

        {!! Form::open(['id'=>'frmPhoto','files'=>true]) !!}
        <input type="hidden" id="order_id" name="order_id" class="input-courses">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tipo Album</label>
                    <select class="form-control input-photo input-sm" id="photo_id" name="photo_id">
                        <option value="0">Seleccione</option>
                        @foreach($photo as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Archivo</label>
                    <input type="file" class="form-control input-photo" id="photo" name='photo'>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="listPhotos">
            </div>
        </div>
        {!!Form::close()!!}   
    </div>
</div>