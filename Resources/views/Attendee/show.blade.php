@extends('Public.ViewEvent.Layouts.EventPage')

@section('head')
    <link rel="stylesheet" href="{{ \Module::asset('volunteers:css/app.css') }}">
@stop

@section('content')

    <section id="intro" class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> {{ $user->name }}</h2>
            </div>
        </div>
    </section>

    {{-- Navigation--}}
    <section id="navigation" class="container mb0 pb0 pr0 pl0">
        <ul class="nav nav-tabs pl15 pr15">
            <li role="presentation" class="active">
                <a role="tab" data-toggle="tab" aria-controls="volunteers_profile" href="#volunteers_profile">Profile</a>
            </li>
            <li role="presentation">
                <a role="tab" data-toggle="tab" aria-controls="volunteers_food" href="#volunteers_food">Food-plan</a>
            </li>
        </ul>
    </section>

    {{-- Tab Content --}}
    <div class="tab-content">
        <section id="volunteers_profile" role="tabpanel" class="tab-pane active container">
            @include('volunteers::Attendee.partials.profile')
        </section>

        <section id="volunteers_food" role="tabpanel" class="tab-pane container">
            @include('volunteers::Attendee.auth.register')
        </section>
    </div>
@stop

@section('footer')
    @include('Public.ViewEvent.Partials.EventFooterSection')
@stop

@section('scripts')
    {{-- Scripts --}}
    <script src="{{ \Module::asset('volunteers:js/vue/formHelper.min.js') }}"></script>
@stop


