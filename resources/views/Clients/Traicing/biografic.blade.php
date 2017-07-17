
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkBiografic">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveBiografic">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmBiografic']) !!}
        <input type="hidden" id="id" name="id" class="input-biografic">
        <input type="hidden" id="order_id" name="order_id" class="input-biografic">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Nombres</label>
                    <input type="text" class="form-control input-biografic" id="name" name='name' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Apellidos</label>
                    <input type="text" class="form-control input-biografic" id="last_name" name='last_name' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tipo Documento</label>
                    <select class="form-control input-biografic input-sm" id="document_id" name="document_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($type_document as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Documento</label>
                    <input type="text" class="form-control input-biografic" id="document" name='document' required>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ciudad Expedicion</label>
                    <select class="form-control input-biografic input-sm" id="city_expedition_id" name="city_expedition_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($cities as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Lugar de Nacimiento</label>
                    <select class="form-control input-biografic input-sm" id="city_birth_id" name="city_birth_id" required>
                        <option value="0">Seleccione</option>
                        @foreach($cities as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Edad</label>
                    <input type="text" class="form-control input-biografic" id="age" name='age' required data-type="number">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estado Civil</label>
                    <select class="form-control input-biografic input-sm" id="civil_status_id" name="civil_status_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($civil_status as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Pasaporte</label>
                    <input type="text" class="form-control input-biografic" id="passport" name='passport' data-type="number" required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Libreta Militar</label>
                    <input type="text" class="form-control input-biografic" id="militar_card" name='militar_card' required data-type="number">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Clase</label>
                    <select class="form-control input-biografic input-sm" id="classes_id" name="classes_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($class_military as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Distrito</label>
                    <input type="text" class="form-control input-biografic" id="district" name='district' required data-type="number">
                </div>
            </div>

        </div>
        <div class="row">


            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ocupación o profesion</label>
                    <input type="text" class="form-control input-biografic" id="profession" name='profession' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tarjeta Profesional</label>
                    <input type="text" class="form-control input-biografic" id="professional_card" name='professional_card' required data-type="number">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" class="form-control input-biografic" id="email" name='email' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Celular</label>
                    <input type="text" class="form-control input-biografic" id="mobil" name='mobil' required>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Licencia de conducción</label>
                    <input type="text" class="form-control input-biografic" id="driving_licence" name='driving_licence' >
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Categoria</label>
                    <select class="form-control input-biografic input-sm" id="category_id" name="category_id" >
                        <option value="0">Seleccione</option>
                        @foreach($category as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ciudad</label>
                    <select class="form-control input-biografic input-sm" id="city_id" name="city_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($cities as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Dirección de residencia</label>
                    <input type="text" class="form-control input-biografic" id="address" name='address' required="">
                </div>
            </div>



        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Barrio</label>
                    <input type="text" class="form-control input-biografic" id="neighborhood" name='neighborhood'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Telefono 1</label>
                    <input type="text" class="form-control input-biografic" id="phone" name='phone'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Telefono 2</label>
                    <input type="text" class="form-control input-biografic" id="phone2" name='phone2'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">EPS</label>
                    <select class="form-control input-biografic input-sm" id="eps_id" name="eps_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($eps as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Pensiones</label>
                    <select class="form-control input-biografic input-sm" id="pension_id" name="pension_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($pensiones as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>