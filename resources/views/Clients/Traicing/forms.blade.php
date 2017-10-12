<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <div class="col-lg-3">
            <ul class="nav nav-tabs nav-stacked" role="tablist" id='myTabs'>
                <li role="presentation" class="active" id="tabList"><a href="#biografic" aria-controls="home" role="tab" data-toggle="tab">Componente Biografico
                        <span class="badge">1</span></a></li>
                <li role="presentation" id="tabAcademic"><a href="#academic" aria-controls="profile" role="tab" data-toggle="tab">Validación Academica
                        <span class="badge">2</span></a></li>
                <li role="presentation" id="tabJuridic"><a href="#judicial" aria-controls="special" role="tab" data-toggle="tab">Informción Judicial
                        <span class="badge">3</span></a></li>
                <li role="presentation" id="tabAnotations"><a href="#anotations" aria-controls="special" role="tab" data-toggle="tab">Registros y Anotaciones
                        <span class="badge">4</span></a></li>
                <li role="presentation" id="tabLaboral"><a href="#laboral" aria-controls="special" role="tab" data-toggle="tab">Experiencia Laboral
                        <span class="badge">5</span></a></li>
                <li role="presentation" id="tabDomicile"><a href="#domicile" aria-controls="special" role="tab" data-toggle="tab">Visita Domicialiaria
                        <span class="badge">6</span></a></li>
                <li role="presentation" id="tabPhoto"><a href="#photo1" aria-controls="special" role="tab" data-toggle="tab">Album Fotografico
                        <span class="badge">7</span>
                        <li role="presentation" id="tabPoligrafia"><a href="#polygraphy" aria-controls="special" role="tab" data-toggle="tab">Poligrafia
                                <span class="badge">8</span>
                            </a></li>

                        <li role="presentation" id="finish"><a href="#" aria-controls="special" role="tab" data-toggle="tab">Finalizar</a></li>

            </ul>
        </div>
        <div class="col-lg-9">

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="biografic">
                    @include('Clients.Traicing.biografic')
                </div>
                <div role="tabpanel" class="tab-pane " id="academic">
                    @include('Clients.Traicing.academic')
                </div>
                <div role="tabpanel" class="tab-pane " id="judicial">
                    @include('Clients.Traicing.juridic')
                </div>
                <div role="tabpanel" class="tab-pane " id="anotations">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.anotations')
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="laboral">
                    @include('Clients.Traicing.laboral')
                </div>
                <div role="tabpanel" class="tab-pane " id="domicile">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.domicile')
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="photo1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.photo')
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="polygraphy">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.poligrafia')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id='modalFinish'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Finalizar Estudio</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['id'=>'frmFinish']) !!}
                <div class="row">
                    <div class="col-lg-12">
                        <textarea class="form-control" id='comment' name="comment"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email">Concepto</label>
                            <select class="form-control input-academic input-sm" id="concept_id" name="concept_id" required="">
                                <option value="0">Seleccione</option>
                                @foreach($results as $val)
                                <option value="{{$val->code}}">{{$val->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnModalFinish">Finalizar</button>
            </div>
        </div>
    </div>
</div>
