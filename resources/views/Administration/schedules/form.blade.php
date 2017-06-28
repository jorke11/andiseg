<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="page-title" style="">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-success btn-sm" id='btnNew'>
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> NUevo</span>
                            </button>
                            <button class="btn btn-success btn-sm" id='btnSave'>
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"> Guardar</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['id'=>'frm']) !!}
                    <div class="row">
                        <input type="hidden" id="id" name="id" class="input-schedules">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Description</label>
                                <input class="form-control input-schedules" id="description" name="description">
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="page-title" style="">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <button class="btn btn-info btn-sm" id='btnNewDetail'>
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> Detalle</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-condensed table-bordered" id="tblDetail">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="frmModalDetail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agrega</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        {!! Form::open(['id'=>'frmDetail']) !!}
                        <input id="id" type="hidden" name="id">
                        <input id="schedule_id" type="hidden" name="schedule_id">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Servicios</label>
                                    <select class="form-control input-detail" name="course_id" id="course_id">
                                        <option value="0">Seleccionar</option>
                                        @foreach($courses as $i=>$val)
                                        <option value="{{$val->id}}">{{$val->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnAddDetail">Guardar</button>
            </div>
        </div>
    </div>
</div>