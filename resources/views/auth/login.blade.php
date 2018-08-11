@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Login
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Account:</label>
                    <input type="password" name="account" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" value="Login" class="btn btn-primary"> or <a href="{{ route('register') }}">register</a>.
            </form>
        </div>
    </div>
@endsection
