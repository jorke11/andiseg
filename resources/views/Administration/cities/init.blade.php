@extends('layouts.app')

@section('content')
<div class="row">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id='myTabs'>
        <li role="presentation" class="active" id="tabList"><a href="#list" aria-controls="home" role="tab" data-toggle="tab">List</a></li>
        <li role="presentation" id="tabUplod"><a href="#upload" aria-controls="special" role="tab" data-toggle="tab">Load</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="list">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('Administration.cities.list')
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane " id="upload">
            @include('Administration.cities.upload')
        </div>

    </div>
</div>



@include('Administration.cities.form')
{!!Html::script('js/Administration/Cities.js')!!}
@endsection