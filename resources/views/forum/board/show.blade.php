@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('forum') }}">Forum</a> &rarr; {{ $board->title }}
        </div>

        <div class="panel-body">
            @if ($board->description)
                <p>{{ $board->description }}</p>
            @endif

            @if (Auth::check() && (! $board->news or $account->isAdmin()))
                <a href="{{ route('forum.thread.create', $board) }}" class="btn btn-primary">Create Thread</a>
            @endif

            <br><br>

            <table class="table">
                <tr class="header">
                    <th width="54%">Thread</th>
                    <th width="8%">Replies</th>
                    <th width="8%">Views</th>
                    <th>Latest Post</th>
                </tr>

                @forelse ($threads as $thread)
                    <tr>
                        <td>
                            @if ($thread->locked)
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            @endif

                            <a href="{{ url_e('/forum/:board/:title', ['board' => $board->title, 'title' => $thread->title]) }}">{{ $thread->title }}</a>

                            <br>

                            <small>
                                by
                                <a href="{{ $thread->player->link() }}">{{ $thread->player->name }}</a>,
                                <abbr title="{{ date('M d Y, H:i:s T', strtotime($thread->thread_created_at)) }}">
                                    {{ ago(strtotime($thread->created_at)) }}
                                </abbr>
                            </small>
                        </td>

                        <td>{{ $thread->replies->count() }}</td>

                        <td>{{ $thread->views }}</td>

                        <td>
                            @if ($latest = $thread->replies->last())
                                <small>
                                    by
                                    <a href="{{ url_e('/forum/:board/:title#2', ['board' => $board->title, 'title' => $thread->title]) }}">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a>

                                    <a href="{{ route('character', $latest->player) }}">{{ $latest->player->name }}</a>,

                                    <abbr title="{{ date('M d Y, H:i:s T', strtotime($latest->created_at)) }}">
                                        {{ ago(strtotime($latest->created_at)) }}
                                    </abbr>
                                </small>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no threads as of right now. Why don't you create one?</td>
                    </tr>
                @endforelse

                <tr class="header">
                    <th colspan="4"><small>All times are {{ date('T') }}.</small></th>
                </tr>
            </table>

            @if (Auth::check() && (! $board->news or $account->isAdmin()))
                <a href="{{ route('forum.thread.create', $board) }}" class="btn btn-primary">Create Thread</a><br><br>
            @endif

            @if ($threads->hasPages())
                <nav>
                    <ul class="pager">
                        @if ($previous = $threads->previousPageUrl())
                            <li class="previous"><a href="{{ $previous }}"><span aria-hidden="true">&larr;</span> Previous</a></li>
                        @endif

                        @if ($next = $threads->nextPageUrl())
                            <li class="next"><a href="{{ $next }}">Next <span aria-hidden="true">&rarr;</span></a></li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>
@endsection
