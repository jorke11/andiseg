@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id='myTabs'>
            <li role="presentation" class="active" id="tabList"><a href="#list" aria-controls="home" role="tab" data-toggle="tab">List</a></li>
            <li role="presentation" id="tabManagement"><a href="#manager" aria-controls="special" role="tab" data-toggle="tab">Gestión</a></li>
            <li role="presentation" id="tabSpecial"><a href="#special" aria-controls="special" role="tab" data-toggle="tab">Precios Especiales</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="list">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @include('Clients.Client.list')
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane " id="manager">
                @include('Clients.Client.form')
            </div>

            <div role="tabpanel" class="tab-pane " id="special">
                @include('Clients.Client.special')
            </div>
            
        </div>
    </div>
</div>


{!!Html::script('js/Clients/Client.js')!!}
@endsection