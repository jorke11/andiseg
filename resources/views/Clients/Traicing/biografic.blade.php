
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success btn-sm" type="button" id="btnSaveBiografic">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"> Save</span>
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
                    <select class="form-control input-biografic input-sm" id="document_id" name="document_id">
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
                    <select class="form-control input-biografic input-sm" id="city_expedition_id" name="city_expedition_id">
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
                    <select class="form-control input-biografic input-sm" id="city_birth_id" name="city_birth_id">
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
                    <input type="text" class="form-control input-biografic" id="age" name='age' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estado Civil</label>
                    <input type="text" class="form-control input-biografic" id="civil_status_id" name='civil_status_id' required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Pasaporte</label>
                    <input type="text" class="form-control input-biografic" id="passport" name='passport' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Libreta Militar</label>
                    <input type="text" class="form-control input-biografic" id="militar_card" name='militar_card' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Clase</label>
                    <input type="text" class="form-control input-biografic" id="classes" name='classes' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Distrito</label>
                    <input type="text" class="form-control input-biografic" id="district" name='district' required>
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
                    <input type="text" class="form-control input-biografic" id="professional_card" name='professional_card' required>
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
                    <input type="text" class="form-control input-biografic" id="driving_licence" name='driving_licence'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Categoria</label>
                    <input type="text" class="form-control input-biografic" id="category_id" name='category_id' required>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ciudad</label>
                    <select class="form-control input-biografic input-sm" id="city_id" name="city_id">
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
                    <input type="text" class="form-control input-biografic" id="address" name='address'>
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
                    <input type="text" class="form-control input-biografic" id="eps" name='eps' required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Pensiones</label>
                    <input type="text" class="form-control input-biografic" id="pension" name='pension' required>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>