@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Change Password
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Current Password:</label>
                    <input type="password" name="current" class="form-control">
                </div>

                <div class="form-group">
                    <label>New Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>New Password Again:</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <input type="submit" value="Change" class="btn btn-primary">
                <a class="btn" href="{{ url('/account') }}">Back</a>
            </form>
        </div>
    </div>
@endsection