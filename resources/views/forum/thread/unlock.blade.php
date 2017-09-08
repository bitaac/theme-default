@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('forum') }}">Forum</a> &rarr;
            <a href="{{ route('forum.board', $board) }}">{{ $board->title }}</a> &rarr;
            <a href="{{ route('forum.thread', [$board, $thread]) }}">{{ $thread->title }}</a> &rarr;
            Unlock
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    Are you sure you want to unlock the thread <strong>{{ $thread->title }}</strong> by <a href="{{ route('character', $thread->player) }}">{{ $thread->player->name }}</a>?
                </div>

                <input type="submit" value="Unlock" class="btn btn-primary">
                <a href="{{ route('forum.thread', [$board, $thread]) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
