@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Cancel Invite
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Character:</label>

                    <select name="character" class="form-control">
                        @foreach ($guild->getInvites as $invite)
                            <option value="{{ $invite->player_id }}">{{ $invite->player->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Cancel" class="btn btn-primary">
                <a href="{{ route('guild', $guild) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
