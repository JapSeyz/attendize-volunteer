@extends('Public.ViewEvent.Layouts.EventPage')

@section('head')
    <link rel="stylesheet" href="{{ \Module::asset('volunteers:css/app.css') }}">
@stop

@section('content')

    <section id="intro" class="container">
        <div class="row">
            <div class="col-md-12">
                <h2> Volunteering for {{ $event->title }}</h2>
            </div>
        </div>
    </section>

    {{-- Navigation--}}
    <section id="navigation" class="container mb0 pb0 pr0 pl0">
        <ul class="nav nav-tabs pl15 pr15">
            <li role="presentation" class="active">
                <a role="tab" data-toggle="tab" aria-controls="register" aria-expanded="false" href="#login">Login</a>
            </li>
            <li role="presentation">
                <a role="tab" data-toggle="tab" aria-controls="register" aria-expanded="false" href="#register">Register</a>
            </li>
        </ul>
    </section>

    {{-- Tab Content --}}
    <div class="tab-content">
        <section id="login" role="tabpanel" class="tab-pane active container">
           @include('volunteers::Attendee.auth.login')
        </section>

        <section id="register" role="tabpanel" class="tab-pane container">
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


