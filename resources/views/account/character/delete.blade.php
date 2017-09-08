@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Delete Character
        </div>

        <div class="panel-body">
            <p>To delete a character enter the name of the character and your password.</p>

            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="character" class="form-control" value="{{ old('character') }}">
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" value="Delete" class="btn btn-primary">
                <a class="btn" href="{{ route('account') }}">Back</a>
            </form>
        </div>
    </div>
@endsection
