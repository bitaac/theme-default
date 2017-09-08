@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-danger">
        <div class="panel-heading">
            Disband Guild
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="{{ route('guild', $guild) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
