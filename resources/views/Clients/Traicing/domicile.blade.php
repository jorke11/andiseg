<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-warning btn-sm" type="button" id="btnOkDomicile">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"> Terminar</span>
                </button>
                <button class="btn btn-success btn-sm" type="button" id="btnSaveDomicile">
                    <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                </button>
            </div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['id'=>'frmDomicile']) !!}
        <input type="hidden" id="id" name="id" class="input-domicile">
        <input type="hidden" id="order_id" name="order_id" class="input-domicile">
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">Informacion Personal</h3></div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Nombres</label>
                    <input type="text" class="form-control input-domicile" id="name" name='name' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Apellidos</label>
                    <input type="text" class="form-control input-domicile" id="last_name" name='last_name' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tipo Documento</label>
                    <select class="form-control input-domicile input-sm" id="document_id" name="document_id" required="">
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
                    <input type="text" class="form-control input-domicile" id="document" name='document' required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ciudad Expedicion</label>
                    <select class="form-control input-domicile input-sm" id="city_expedition_id" name="city_expedition_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($cities as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Fecha de exped. Documento</label>
                    <input type="text" class="form-control input-domicile calendar" id="expedition_date" name='expedition_date' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Lugar de Nacimiento</label>
                    <select class="form-control input-domicile input-sm" id="city_birth_id" name="city_birth_id" required>
                        <option value="0">Seleccione</option>
                        @foreach($cities as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Fecha de Nacimiento</label>
                    <input type="text" class="form-control input-domicile calendar" id="birth_date" name='birth_date' required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Grupo sanguineo</label>
                    <select class="form-control input-domicile input-sm" id="blood_group" name="blood_group" required>
                        <option value="0">Seleccione</option>
                        <option value="1">a+</option>
                        <option value="2">a-</option>
                        <option value="3">o+</option>
                        <option value="4">o-</option>
                        <option value="5">b+</option>
                        <option value="6">o-</option>

                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Edad</label>
                    <input type="text" class="form-control input-domicile" id="age" name='age' required data-type="number">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estado Civil</label>
                    <select class="form-control input-domicile input-sm" id="civil_status_id" name="civil_status_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($civil_status as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tiempo Casado</label>
                    <input type="text" class="form-control input-domicile" id="time_married" name='time_married' >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Numero de hijos</label>
                    <input type="text" class="form-control input-domicile" id="quantity_child" name='quantity_child'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Dirección de residencia</label>
                    <input type="text" class="form-control input-domicile" id="address" name='address' required="">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Barrio</label>
                    <input type="text" class="form-control input-domicile" id="neighborhood" name='neighborhood'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Localidad</label>
                    <input type="text" class="form-control input-domicile" id="location" name='location'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estrato</label>
                    <input type="text" class="form-control input-domicile" id="stratum" name='stratum' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Correo electronico</label>
                    <input type="text" class="form-control input-domicile" id="email" name='email' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Celular</label>
                    <input type="text" class="form-control input-domicile" id="mobil" name='mobil' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Cargo al que aspira</label>
                    <input type="text" class="form-control input-domicile" id="aspiration" name='aspiration' required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Telefono</label>
                    <input type="text" class="form-control input-domicile" id="phone" name='phone'>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">Documentación presentada por el Candidato</h3></div>
        </div>
        <br>
        {!! Form::open(['id'=>'frmDomicileDocument']) !!}
        <input id="order_id" name="order_id" type="hidden">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tipo Documento</label>
                    <select class="form-control input-domicile-pre input-sm" id="document_id" name="document_id">
                        <option value="0">Seleccione</option>
                        @foreach($type_document as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Numero de documento</label>
                    <input type="text" class="form-control input-domicile-pre" id="document" name='document' data-type="number">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Fecha expedición</label>
                    <input type="text" class="form-control input-domicile-pre calendar" id="expedition_date" name='expedition_date'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Clase</label>
                    <select class="form-control input-domicile-pre input-sm" id="classes_id" name="classes_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($class_military as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Distrito</label>
                    <input type="text" class="form-control input-domicile-pre" id="district" name='district'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Categoria</label>
                    <select class="form-control input-domicile-pre input-sm" id="category_id" name="category_id" >
                        <option value="0">Seleccione</option>
                        @foreach($category as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <button type="button" class="btn btn-success" id="addDocumentPresent">Agregar</button>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover" id="tblDocumentacionPresenter">
                    <thead>
                        <tr>
                            <th>Tipo Documento</th>
                            <th>Numero</th>
                            <th>Fecha expedición</th>
                            <th>Clase</th>
                            <th>Distrito</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">NÚCLEO FAMILIAR(padres, hermanos, esposa e hijos) personas con la cuales vive</h3></div>
        </div>
        <br>
        {!! Form::open(['id'=>'frmDomicileLive']) !!}
        <input id="order_id" name="order_id" type="hidden">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Nombres y apellidos</label>
                    <input type="text" class="form-control input-domicile-live" id="name" name='name'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Parentesco</label>
                    <input type="text" class="form-control input-domicile-live" id="relationship" name='relationship'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Edad</label>
                    <input type="text" class="form-control input-domicile-live" id="age" name='age'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ocupación</label>
                    <input type="text" class="form-control input-domicile-live" id="occupation" name='occupation'>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button type='button' id="btnDocumentLive" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover" id="tblFamiliarLive">
                    <thead>
                        <tr>
                            <th>Nombres y apellidos</th>
                            <th>Parentesco</th>
                            <th>Edad</th>
                            <th>Ocupación</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">NÚCLEO FAMILIAR(padres, hermanos, esposa e hijos) personas con la cuales No vive</h3></div>
        </div>
        <br>
        {!! Form::open(['id'=>'frmDomicileNoLive']) !!}
        <input id="order_id" name="order_id" type="hidden">
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Nombres y apellidos</label>
                    <input type="text" class="form-control input-domicile-nolive" id="name" name='name'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Parentesco</label>
                    <input type="text" class="form-control input-domicile-nolive" id="relationship" name='relationship'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Edad</label>
                    <input type="text" class="form-control input-domicile-nolive" id="age" name='age'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ocupación</label>
                    <input type="text" class="form-control input-domicile-nolive" id="occupation" name='occupation'>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button type="button" id="btnDocumentNoLive" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th>Nombres y apellidos</th>
                            <th>Parentesco</th>
                            <th>Edad</th>
                            <th>Ocupación</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">SALUD</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-bordered" id="tblsalud">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Si</th>
                            <th>No</th>
                            <th>¿Quien? ¿Que enfermedad?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>¿Usted sufre o sufrio algún tipo de enfermedada?</td>
                            <td><input type="radio" name="si" id="si1"></td>
                            <td><input type="radio" name="no" id="no1"></td>
                            <td><input type="text" name="description1" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>¿Algún integrante de la familia sufre o sufrio algún tipo de enfermedad?</td>
                            <td><input type="radio" name="no" id="si2"></td>
                            <td><input type="radio" name="no" id="no2"></td>
                            <td><input type="text" name="description2" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">RESIDENCIA</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-bordered" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Si</th>
                            <th>No</th>
                            <th>¿Por que mótivo? ¿Que lugar?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>¿Ha residido en otra región del país?</td>
                            <td><input type="radio" name="si" ></td>
                            <td><input type="radio" name="si"></td>
                            <td><input type="text" name="description" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>¿Ha realizado viajes al exterior?</td>
                            <td><input type="radio" name="no"></td>
                            <td><input type="radio" name="no"></td>
                            <td><input type="text" name="description" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">CARACTERISTICAS DE LA VIVIENDA</h3></div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <select class="form-control input-orders input-sm" id="document_id" name="document_id" required>
                    <option value="0">Seleccione</option>
                    @foreach($features_home as $val)
                    <option value="{{$val->code}}">{{$val->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-hover table-bordered" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th>Caracteristica</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Información residencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Familias que habitan a vivienda</td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tiempo que ud lleva en el sector</td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">En caso de ser arrendada, especificar los siguientes datos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre del propietario</td>
                            <td><input class="form-control"></td>
                            <td>Telefono No.</td>
                            <td><input class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Tiempo de permanencia del evaluado en el inmueble</td>
                            <td><input class="form-control"></td>
                            <td>Valor Arriendo</td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">AREAS Y ESTADO DE LA VIVIENDA</h3></div>
        </div>
        <br>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Area</label>
                    <select class="form-control input-area input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($photo as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Unidad</label>
                    <input type="text" class="form-control input-area" id="unit" name='unit'>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estado</label>
                    <select class="form-control input-area input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($status_home as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Aseo</label>
                    <select class="form-control input-area input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($status_home as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th>Area</th>
                            <th>Unidad</th>
                            <th>Estado</th>
                            <th>Aseo</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-6"><h3 class="text-center">INVENTARIO DE ENSERES DEL EVALUADO</h3></div>
            <div class="col-lg-6"><h3 class="text-center">SERVICIOS PUBLICOS Y OTROS</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Enseres</label>
                    <select class="form-control input-inventory input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($inventory as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Unidad</label>
                    <input type="text" class="form-control input-domicile" id="unit" name='unit'>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Servicios</label>
                    <select class="form-control input-inventory input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($service as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Agregar</button>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-hover" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th>Enseres</th>
                            <th>Unidad</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table table-hover" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th>Servicios</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">PONDERACIÓN DE LA VIVIENDA</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-hover" id="tblFamiliarNoLive">
                    <thead>
                        <tr>
                            <th>Aspectos</th>
                            <th>Nivel calificado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nivel de Hacinamiento</td>
                            <td>
                                <select class="form-control input-ponderacion input-sm" id="typephoto_id" name="typephoto_id" required="">
                                    <option value="0">Seleccione</option>
                                    @foreach($status_home as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nivel de Humedad</td>
                            <td>
                                <select class="form-control input-ponderacion input-sm" id="typephoto_id" name="typephoto_id" required="">
                                    <option value="0">Seleccione</option>
                                    @foreach($status_home as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nivel delincuencial</td>
                            <td>
                                <select class="form-control input-ponderacion input-sm" id="typephoto_id" name="typephoto_id" required="">
                                    <option value="0">Seleccione</option>
                                    @foreach($status_home as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Vias de acceso</td>
                            <td>
                                <select class="form-control input-ponderacion input-sm" id="typephoto_id" name="typephoto_id" required="">
                                    <option value="0">Seleccione</option>
                                    @foreach($status_home as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <br><br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">CONCEPTO DE VECINDARIO (en caso de no encontrar vecino, tomar datos de una referencia personal)</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <th>Telefono</th>
                            <th>Tiempo de conocer al evaluado</th>
                            <th>Concepto (realizar breve Descripción)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <br><br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">Información financiera</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Activos</label>
                    <select class="form-control input-domicile-fin input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($property as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tipo</label>
                    <select class="form-control input-domicile-fin input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($property_type as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Avaluo</label>
                    <input type="text" class="form-control input-domicile-fin" id="document" name='document' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Dirección</label>
                    <input type="text" class="form-control input-domicile-fin" id="document" name='document' required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Marca</label>
                    <input type="text" class="form-control input-domicile-fin" id="document" name='document' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Modelo</label>
                    <input type="text" class="form-control input-domicile-fin" id="document" name='document' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Estado</label>
                    <select class="form-control input-domicile-fin input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="1">Cancelado</option>
                        <option value="2">Deuda</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Activo</th>
                            <th>Tipo</th>
                            <th>Avaluo</th>
                            <th>Dirección</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <br><br>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">Datos bancarios</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table>
                    <thead>
                        <tr>
                            <th>Cuenta Bancaria</th>
                            <th>Telefono</th>
                            <th>Tiempo de conocer al evaluado</th>
                            <th>Concepto (realizar breve Descripción)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                            <td><input class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">Obligaciones Financiera</h3></div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Item</label>
                    <select class="form-control input-domicile-oblig input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($financial_obligation as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Entidad</label>
                    <select class="form-control input-domicile-oblig input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($finantial_entities as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Tipo Invensión</label>
                    <select class="form-control input-domicile-oblig input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($investment_type as $val)
                        <option value="{{$val->code}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Ciudad</label>
                    <select class="form-control input-domicile-oblig input-sm" id="typephoto_id" name="typephoto_id" required="">
                        <option value="0">Seleccione</option>
                        @foreach($cities as $val)
                        <option value="{{$val->id}}">{{$val->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Deuda Actual</label>
                    <input type="text" class="form-control input-domicile-oblig" id="document" name='document' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="email">Pago cuota x Mes</label>
                    <input type="text" class="form-control input-domicile-oblig" id="document" name='document' required>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Entidad</th>
                            <th>Tipo Inversion</th>
                            <th>Ciudad</th>
                            <th>Deuda Actual</th>
                            <th>Pago couta x Mes</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12"><h3 class="text-center">Concepto Final visitador</h3></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <textarea class="form-control"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <button id="btnDocmentPresent" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>

    </div>
</div>