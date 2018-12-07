@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Logout
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    Are you sure you want to logout?
                </div>

                <input type="submit" value="Yes, logout" class="btn btn-primary">
                <a href="{{ route('account') }}" class="btn btn-secondary">No, back</a>
            </form>
        </div>
    </div>
@endsection
