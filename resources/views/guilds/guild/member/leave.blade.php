@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Leave Guild
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Character:</label>
                    <select name="character" class="form-control">
                        @foreach ($account->getGuildCharactersExpectOwner($guild) as $invite)
                            <option value="{{ $invite->player_id }}"> {{ $invite->player->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="Submit" value="Leave" class="btn btn-primary">
                <a href="{{ $guild->link() }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
