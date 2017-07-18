<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-9 text-right">
                            @if(Auth::user()->role_id==1)
                            <button class="btn btn-success btn-sm" type="button" id="btnNew">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> Nuevo</span>
                            </button>
                            <button class="btn btn-success btn-sm" type="button" id="btnSave">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['id'=>'frm']) !!}
                    <input type="hidden" id="id" name="id" class="input-clients">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="email">Razón Social</label>
                                <input type="text" class="form-control input-clients input-sm" id="business_name" name='business_name' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Tipo de Documento</label>
                                <select class="form-control input-clients input-sm" id="document_id" name="document_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($type_document as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Documento</label>
                                <input type="text" class="form-control input-clients input-sm" id="document" name='document' required="" data-type="number">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Verificacion</label>
                                <input type="text" class="form-control input-clients input-sm" id="verification" name='verification' required="" data-type="number" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Tipo Persona</label>
                                <select class="form-control input-clients input-sm" id="person_id" name="person_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($person_id as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Tipo Regimen</label>
                                <select class="form-control input-clients input-sm" id="regimen_id" name="regimen_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($regimen_id as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Departamento</label>
                                <select class="form-control input-clients input-sm" id="department_id" name="department_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($department as $val)
                                    <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Ciudad</label>
                                <select class="form-control input-clients input-sm" id="city_id" name="city_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($cities as $val)
                                    <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Direccion</label>
                                <input type="text" class="form-control input-clients input-sm" id="address" name='address' required="" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Celular</label>
                                <input type="text" class="form-control input-clients input-sm" id="mobil" name='mobil' required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Ejecutivo</label>
                                <select class="form-control input-clients input-sm" id="executive_id" name="executive_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($executive as $val)
                                    <option value="{{$val->id}}">{{$val->name." ".$val->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Logo</label>
                                <input type="file" class="form-control input-clients input-sm" id="logo" name='logo'>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>