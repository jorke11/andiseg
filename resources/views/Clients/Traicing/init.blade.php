@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <div class="col-lg-3">
            <ul class="nav nav-tabs nav-stacked" role="tablist" id='myTabs'>
                <li role="presentation" class="active" id="tabList"><a href="#list" aria-controls="home" role="tab" data-toggle="tab">Componente Biografico
                        <span class="badge">1</span></a></li>
                <li role="presentation" id="tabManagement"><a href="#academic" aria-controls="profile" role="tab" data-toggle="tab">Validación Academica
                        <span class="badge">2</span></a></li>
                <li role="presentation" id="tabUplod"><a href="#judicial" aria-controls="special" role="tab" data-toggle="tab">Informción Judicial
                        <span class="badge">3</span></a></li>
                <li role="presentation" id="tabUplod"><a href="#anotations" aria-controls="special" role="tab" data-toggle="tab">Registros y Anotaciones
                        <span class="badge">4</span></a></li>
                <li role="presentation" id="tabUplod"><a href="#laboral" aria-controls="special" role="tab" data-toggle="tab">Experiencia Laboral
                        <span class="badge">5</span></a></li>
                <li role="presentation" id="tabUplod"><a href="#domicile" aria-controls="special" role="tab" data-toggle="tab">Visita Domicialiaria
                        <span class="badge">6</span></a></li>
                <li role="presentation" id="tabUplod"><a href="#photo" aria-controls="special" role="tab" data-toggle="tab">Album Fotografico
                        <span class="badge">7</span>
                    </a></li>
            </ul>
        </div>
        <div class="col-lg-9">


            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="list">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.biografic')
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane " id="academic">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.academic')
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="judicial">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.juridic')
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="anotations">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.anotations')
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane " id="laboral">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('Clients.Traicing.laboral')
                        </div>
                    </div>
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
@include('Administration.courses.form')
{!!Html::script('js/Administration/courses.js')!!}
@endsection