@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Register
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Account:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password Confirmation:</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <div class="checkbox">
                      <label><input type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }}>I agree with the <a href="#">Terms of Service</a> & <a href="#">Server Rules</a>.</label>
                    </div>
                </div>

                <input type="submit" value="Register" class="btn btn-primary"> or <a href="{{ route('login') }}">login</a>.
            </form>
        </div>
    </div>
@endsection