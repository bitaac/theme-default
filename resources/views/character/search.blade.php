@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Search Character
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Character:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
