@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Undelete Character
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    Are you sure you want to undelete character <b>{{ $player->name }}</b>?
                </div>

                <input type="submit" value="Undelete" class="btn btn-primary">
                <a class="btn" href="{{ route('account') }}">Back</a>
            </form>
        </div>
    </div>
@endsection
