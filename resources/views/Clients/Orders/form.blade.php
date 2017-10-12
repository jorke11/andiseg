<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-center">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-lg-3">Petición</div>
                        <div class="col-lg-9 text-right">
                            <button class="btn btn-success btn-sm" type="button" id="btnNew">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> Nuevo</span>
                            </button>
                            <button class="btn btn-success btn-sm" type="button" id="btnSave">
                                <span class="glyphicon glyphicon-save" aria-hidden="true"> Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">


                    <div class="progress">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100" style="width:0%" id="bar-progress">
                            00% Complete
                        </div>
                    </div>


<!--                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar"
                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="bar-progress">
                            <span class="sr-only">40% completado (éxito)</span>
                        </div>
                    </div>-->
                    <br>
                    {!! Form::open(['id'=>'frm']) !!}
                    <input type="hidden" id="id" name="id" class="input-orders">
                    <input type="hidden" id="schema_id" name="schema_id" class="input-orders" required="">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Nombre</label>
                                <input type="text" class="form-control input-orders input-sm" id="name" name='name' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Apellido</label>
                                <input type="text" class="form-control input-orders input-sm" id="last_name" name='last_name' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Cargo</label>
                                <input type="text" class="form-control input-orders input-sm" id="position" name='position' required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Tipo de Documento</label>
                                <select class="form-control input-orders input-sm" id="document_id" name="document_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($type_document as $val)
                                    <option value="{{$val->code}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Documento</label>
                                <input type="text" class="form-control input-orders input-sm" id="document" name='document' required="" data-type="number">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Centro de costo</label>
                                <input type="text" class="form-control input-orders input-sm" id="cost_center" name='cost_center' required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Departamento</label>
                                <select class="form-control input-orders input-sm" id="department_id" name="department_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($department as $val)
                                    <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Ciudad</label>
                                <select class="form-control input-orders input-sm" id="city_id" name="city_id" required>
                                    <option value="0">Seleccione</option>
                                    @foreach($cities as $val)
                                    <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Direccion</label>
                                <input type="text" class="form-control input-orders input-sm" id="address" name='address' required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Barrio</label>
                                <input type="text" class="form-control input-orders input-sm" id="neighborhood" name='neighborhood' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Telefono</label>
                                <input type="text" class="form-control input-orders input-sm" id="phone" name='phone' required="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="email">Celular</label>
                                <input type="text" class="form-control input-orders input-sm" id="mobil" name='mobil' required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
<div id="container">
    <div class="row">
        <?php
        $cont = 0;
        foreach ($esquemas as $i => $val) {
            ?>
            <div class="col-lg-3">
                <div class="thumbnail" id="item_{{$val->id}}">
                    <div class="caption">
                        <h3 >{{ucwords($val->description)}}</h3>
                        <ul class="list-group">
                            @foreach($val->courses as $value)
                            <li class="list-group-item">{{$value->course}}</li>
                            @endforeach
                        </ul>
                        <p class="text-center"><button type="button" class="btn btn-success" onclick=obj.selectionProduct({{$val->id}})>Seleccionar</button></p>
                    </div>
                </div>
            </div>

            <?php
            if ($cont == 3) {
                $cont = 0;
                ?>
            </div>
            <div class="row">
                <?php
            }

            $cont++;
        }
        ?>
    </div>
</div>
