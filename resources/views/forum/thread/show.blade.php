@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('forum') }}">Forum</a> &rarr;
            <a href="{{ route('forum.board', $board) }}">{{ $board->title }}</a> &rarr;
            @if ($thread->locked)
                <i class="fa fa-lock" aria-hidden="true"></i>
            @endif
            {{ $thread->title }}
        </div>

        <div class="panel-body">
            @if (Auth::check())
                @if (! $thread->isLocked() or $account->isAdmin())
                    <a href="{{ route('forum.thread.reply', [$board, $thread]) }}" class="btn btn-primary">Reply</a>
                @endif

                @if ($account->isAdmin())
                    @if ($thread->isLocked())
                        <a href="{{ route('forum.thread.unlock', [$board, $thread]) }}" class="btn btn-primary">Unlock</a>
                    @else
                        <a href="{{ route('forum.thread.lock', [$board, $thread]) }}" class="btn btn-primary">Lock</a>
                    @endif

                    <a href="{{ route('forum.thread.delete', [$board, $thread]) }}" class="btn btn-primary">Delete</a>
                @endif
            @endif

            <br><br>

            <table class="table">
                {{-- Original post. --}}
                @if ($posts->currentPage() === 1)
                    @include('bitaac::forum.thread.post', ['post' => $thread, 'i' => 1])
                @endif

                {{-- Responses. --}}
                @foreach ($posts as $i => $post)
                    @include('bitaac::forum.thread.post', ['post' => $post, 'i' => ($offset + $i) + 2])
                @endforeach

                <tr class="header">
                    <th colspan="2"><small>All times are {{ date('T') }}</small></th>
                </tr>
            </table>

            @if ($posts->hasPages())
                <nav>
                    <ul class="pager">
                        @if ($previous = $posts->previousPageUrl())
                            <li class="previous"><a href="{{ $previous }}"><span aria-hidden="true">&larr;</span> Previous</a></li>
                        @endif

                        @if ($next = $posts->nextPageUrl())
                            <li class="next"><a href="{{ $next }}">Next <span aria-hidden="true">&rarr;</span></a></li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>
@endsection
