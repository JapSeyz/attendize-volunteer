@extends('Shared.Layouts.Master')

@section('title')
    @parent
    Volunteers
@stop


@section('page_title')
    <i class="ico-user-tie"></i>
    Volunteers
@stop

@section('top_nav')
    @include('ManageModule.TopNav')
@stop

@section('menu')
    @include('ManageEvent.Partials.Sidebar')
@stop


@section('head')

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active">
                    <a href="#volunteers_volunteers"
                       aria-controls="volunteers_volunteers"
                       role="tab"
                       data-toggle="tab">Volunteers</a>
                </li>

                <li role="presentation">
                    <a href="#volunteers_settings"
                       aria-controls="volunteers_settings"
                       role="tab"
                       data-toggle="tab">Settings</a>
                </li>

                <li role="presentation">
                    <a href="#volunteers_data"
                       aria-controls="volunteers_data"
                       role="tab"
                       data-toggle="tab">Data</a>
                </li>

            </ul>
        </div>
    </div>

    <div class="tab-content row">

        <div role="tabpanel" class="tab-pane active col-xs-12" id="volunteers_volunteers">
            @include('volunteers::Organiser.partials.volunteers')
        </div>

        <div role="tabpanel" class="tab-pane col-xs-12" id="volunteers_settings">
            @include('volunteers::Organiser.partials.settings')
        </div>

        <div role="tabpanel" class="tab-pane col-xs-12" id="volunteers_data">Export Foodplan etc.</div>
    </div>
@stop