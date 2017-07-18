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
                <li role="presentation" id="tabPhoto"><a href="#photo" aria-controls="special" role="tab" data-toggle="tab">Album Fotografico
                        <span class="badge">7</span>
                    </a></li>
                @if(Auth::user()->role_id==1 || Auth::user()->role_id==2)
                <li role="presentation" id="finish"><a href="#" aria-controls="special" role="tab" data-toggle="tab">Finalizar</a></li>
                @endif
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
                <div role="tabpanel" class="tab-pane " id="photo">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.photo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>