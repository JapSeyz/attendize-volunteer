<form class="row ajax" method="post" action="{{ $url }}/register">

    {{ csrf_field() }}

    {{-- Name --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="name" class="form-control-label required">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    {{-- Email --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="email" class="form-control-label required">Email</label>
        <input type="text" email name="email" class="form-control" required>
    </div>

    {{-- Password --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="password" class="form-control-label required">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    {{-- Password --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="password_confirmation" class="form-control-label required">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    {{-- Address --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="address" class="form-control-label required">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    {{-- Zip --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="zip" class="form-control-label required">Zip code</label>
        <div class="input-group">
            <input type="text" name="zip" class="form-control" v-model="zip" maxlength="4" required>
            <span class="input-group-addon" v-if="zip.length == 4" v-city="zip"></span>
        </div>
    </div>

    {{-- Phone --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="phone" class="form-control-label required">Phone</label>
        <input type="text" name="phone" class="form-control" maxlength="8" required>
    </div>

    {{-- Mobile --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="mobile" class="form-control-label">Mobile</label>
        <input type="text" name="mobile" class="form-control" maxlength="8">
    </div>

    {{-- Birthday --}}
    <div class="col-xs-12 col-md-6 form-group">
        <label for="birthday" class="form-control-label required">Birthday</label>
        <input type="text" name="birthday" date class="form-control" maxlength="10" required>
    </div>

    {{-- Additional Information --}}
    <div class="col-xs-12 form-group">
        <label for="additional_information" class="form-control-label">Additional information</label>
        <textarea name="additional_information" class="form-control"></textarea>
    </div>

    {{-- Tasks --}}
    @for( $i = 1; $i < 4; $i++)
        <div class="col-xs-12 form-group">
            <div class="input-group">
                        <span class="input-group-addon">Priority {{ $i }}:<i
                                    class="absolute-right ico-menu2"></i></span>
                <select class="form-control" required name='priority{{$i}}'>

                    @foreach( $tasks as $task )
                        <option value="{{ $task->id }}">{{ $task->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endfor

    <div class="col-xs-12">
        <input class="btn btn-success" type="submit" value="Join">
    </div>
</form>