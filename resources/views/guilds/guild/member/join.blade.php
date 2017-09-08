@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Two-Factor Authentication
        </div>

        <div class="panel-body">
            <p>The following of your characters have been invited to this guild. If you want to join, select a character and click on "Submit".</p>

            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Character:</label>
                    <select name="character" class="form-control">
                        @foreach ($invites as $invite)
                            <option value="{{ $invite->player_id }}">{{ $invite->player->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="Submit" value="Join" class="btn btn-primary">
                <a href="{{ $guild->link() }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
