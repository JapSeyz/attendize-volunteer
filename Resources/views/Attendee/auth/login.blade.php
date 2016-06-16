<div class="row">
    <form class="row" method="post" action="{{ $url }}/login">
        {{ csrf_field() }}

        {{-- Email--}}
        <div class="col-xs-12 col-md-6 form-group">
            <div class="input-group">
                <span class="input-group-addon">Email</span>
                <input type="text" name="email" class="form-control">
            </div>
        </div>

        {{-- Password --}}
        <div class="col-xs-12 col-md-6 form-group">
            <div class="input-group">
                <span class="input-group-addon">Password</span>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="col-xs-12">
            <input type="submit" class="btn btn-info" value="login">
        </div>
    </form>
</div>