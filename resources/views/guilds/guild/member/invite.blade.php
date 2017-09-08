@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Invite Character
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="character" class="form-control" value="{{ old('character') }}">
                </div>

                <input type="submit" value="Invite" class="btn btn-primary">
                <a href="{{ $guild->link() }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
