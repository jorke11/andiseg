<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-3">Petición</div>
                        <div class="col-lg-9 text-right">
                            @if(Auth::user()->role_id==1)
                            <button class="btn btn-success btn-sm" type="button" id="btnNew">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> Nuevo</span>
                            </button>
                            @endif
                            <button class="btn btn-success btn-sm" type="button" id="btnSave">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['id'=>'frm']) !!}
                    <input type="hidden" id="id" name="id" class="input-users">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Nombre</label>
                                <input type="text" class="form-control input-users input-sm" id="name" name='name' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Apellido</label>
                                <input type="text" class="form-control input-users input-sm" id="last_name" name='last_name' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Documento</label>
                                <input type="text" class="form-control input-users input-sm" id="document" name='document' required="" data-type="number">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control input-users input-sm" id="email" name='email' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Role</label>
                                <select class="form-control input-users input-sm" id="role_id" name="role_id">
                                    <option value="0">Seleccione</option>
                                    @foreach($role_id as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Empresa</label>
                                <select class="form-control input-users input-sm" id="client_id" name="client_id">
                                    <option value="0">Seleccione</option>
                                    @foreach($client_id as $val)
                                    <option value="{{$val->id}}">{{$val->business_name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Clave</label>
                                <input type="password" class="form-control input-users input-sm" id="password" name='password'>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Confirmación</label>
                                <input type="password" class="form-control input-users input-sm" id="confirmation" name='confirmation'>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>