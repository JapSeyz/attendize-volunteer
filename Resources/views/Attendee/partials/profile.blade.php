<form class="row ajax" method="post" action="{{ $url }}/update">
    {{ csrf_field() }}

    {{-- Name --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="name" class="form-control-label required">Name</label>
        <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
    </div>

    {{-- Email --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="email" class="form-control-label required">Email</label>
        <input type="text" name="email" class="form-control" disabled required value="{{ $user->email }}">
    </div>

    {{-- Password --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="password" class="form-control-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    {{-- Password --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="password_confirmation" class="form-control-label">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    {{-- Address --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="address" class="form-control-label required">Address</label>
        <input type="text" name="address" class="form-control" required value="{{ $user->address }}">
    </div>

    {{-- Zip --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="zip" class="form-control-label required">Zip code</label>
        <div class="input-group">
            <input type="text" name="zip" class="form-control" v-model="zip" maxlength="4" required
                   value="{{ $user->zip }}">
            <span class="input-group-addon" v-if="zip.length == 4" v-city="zip"></span>
        </div>
    </div>

    {{-- Phone --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="phone" class="form-control-label required">Phone</label>
        <input type="text" name="phone" class="form-control" maxlength="8" required value="{{ $user->phone }}">
    </div>

    {{-- Mobile --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="mobile" class="form-control-label">Mobile</label>
        <input type="text" name="mobile" class="form-control" maxlength="8" value="{{ $user->mobile }}">
    </div>

    {{-- Birthday --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="birthday" class="form-control-label required">Birthday</label>
        <input type="text" name="birthday" date class="form-control" maxlength="10" required
               value="{{ $user->birthday }}">
    </div>

    {{-- Additional Information --}}
    <div class="col-xs-12 form-group">
        <label for="additional_information" class="form-control-label">Additional information</label>
        <textarea name="additional_information" class="form-control">{{ $user->additional_information }}</textarea>
    </div>

    {{-- Previous Tasks --}}
    <div class="col-xs-12 form-group">
        <label for="additional_information" class="form-control-label">Previous tasks</label>
        <textarea name="additional_information" class="form-control">{{ $user->previous_tasks }}</textarea>
    </div>

    {{-- Extra Events --}}
    <div class="col-xs-12 form-group">
        <label for="additional_information" class="form-control-label">Previous tasks</label>
        <textarea name="additional_information" class="form-control">{{ $user->previous_tasks }}</textarea>
    </div>

    {{-- Newsletter --}}
    <div class="col-xs-12 form-group">
        <label for="additional_information" class="form-control-label">Previous tasks</label>
        <textarea name="additional_information" class="form-control">{{ $user->previous_tasks }}</textarea>
    </div>

    {{-- Tasks --}}
    @for( $i = 1; $i < 4; $i++)
        <div class="col-xs-12 form-group">
            <div class="input-group">
                <span class="input-group-addon">Priority {{ $i }}:
                    <i class="absolute-right ico-menu2"></i>
                </span>
                <select class="form-control" required name='priority{{$i}}'>

                    @foreach( $tasks as $task )
                        @if($user->hasTaskAtPriority($task->id, $i))
                            <option value="{{ $task->id }}" selected>{{ $task->name }}</option>
                        @else
                            <option value="{{ $task->id }}">{{ $task->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    @endfor

    <div class="col-xs-12">
        <input class="btn btn-success" type="submit" value="Join">
    </div>
