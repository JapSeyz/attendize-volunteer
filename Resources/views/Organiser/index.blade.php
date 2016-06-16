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
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                </thead>

                <tbody>
                @foreach($volunteers as $volunteer)
                    <tr>
                        <td>{{ $volunteer->name }}</td>
                        <td>{{ $volunteer->email }}</td>
                        <td>{{ $volunteer->phone }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop