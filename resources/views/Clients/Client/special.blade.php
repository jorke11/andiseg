<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-9 text-right">
                            @if(Auth::user()->role_id==1)
                            <button class="btn btn-success btn-sm" type="button" id="btnNewSpecial">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> Nuevo</span>
                            </button>
                            <button class="btn btn-success btn-sm" type="button" id="btnSaveSpecial">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['id'=>'frmSpecial']) !!}
                    <input type="hidden" id="id" name="id" class="input-special">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Servicios</label>
                                <select class="form-control input-special input-sm" id="service_id" name="service_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($courses as $val)
                                    <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Precio</label>
                                <input type="text" class="form-control input-special input-sm" id="price" name='price' required="">
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>