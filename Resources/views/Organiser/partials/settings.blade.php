{{-- Tasks--}}
<form method="post" action="{{ $url }}/update/tasks" class="row ajax mt5">
    <div class="col-xs-12 my15">
        <h2>Tasks</h2>
    </div>

    @foreach($tasks as $task)
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" name="task[{{ $task->id }}]" value="{{ $task->name }}">
            </div>
        </div>
    @endforeach

    {{-- TODO: Create New Inputs --}}

    <div class="col-xs-12">
        <input class="btn btn-success pull-right" type="submit" value="Update">
    </div>
</form>

{{-- Food Plan--}}
<form method="post" action="{{ $url }}/update/foodplan" class="row ajax mt5">

    <div class="col-xs-12 my15">
        <h2>Foodplan</h2>
    </div>

    <div class="col-xs-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach($fooddays as $day)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="volunteers_foodHeading{{$day->id}}">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#volunteers_foodCollapse{{$day->id}}" aria-expanded="false"
                               aria-controls="volunteers_foodCollapse{{$day->id}}">
                                {{ $day->day }}
                            </a>
                        </h4>
                    </div>
                    <div id="volunteers_foodCollapse{{$day->id}}" class="panel-collapse collapse" role="tabpanel"
                         aria-labelledby="volunteers_foodHeading{{$day->id}}">
                        <div class="panel-body">

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="day[{{ $day->id }}]"
                                           value="{{ $day->day }}">
                                </div>
                            </div>

                            <hr>
                            <div class="col-xs-12">
                                <h4>Food Times</h4>
                            </div>
                            @foreach($day->times as $time)
                                {{ $time }}
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- TODO: Create New Inputs --}}

    <div class="col-xs-12">
        <input class="btn btn-success pull-right" type="submit" value="Update">
    </div>
</form>

