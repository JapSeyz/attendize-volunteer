<form method="post" action="{{ $url }}/update/tasks" class="row ajax mt5">

    @foreach($tasks as $task)
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
            <input type="text" class="form-control" name="task[{{ $task->id }}]" value="{{ $task->name }}">
            </div>
        </div>
    @endforeach
</form>