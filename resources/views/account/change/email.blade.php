@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Change Email
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" name="email" class="form-control" value="{{ $account->email }}">
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" value="Change" class="btn btn-primary">
                <a class="btn" href="{{ url('/account') }}">Back</a>
            </form>
        </div>
    </div>
@endsection