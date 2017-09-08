@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Members
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name:</label>
                    <select name="member" class="form-control">
                        @foreach ($guild->getMembersExceptOwner as $member)
                            <option value="{{ $member->player_id }}">{{ $member->player->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>
                        <input type="radio" name="action" id="action_rank">
                        Set rank to
                    </label>
                    <select name="rank" class="form-control">
                        @foreach ($guild->getRanks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="{{ route('guild', $guild) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
