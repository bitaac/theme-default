@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Forum
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th width="60%">Board</th>
                    <th>Posts</th>
                    <th>Threads</th>
                    <th>Latest Post</th>
                </tr>

                @forelse ($boards as $board)
                    <tr>
                        <td>
                            <a href="{{ route('forum.board', $board) }}">{{ $board->title }}</a>

                            @if ($board->description)
                                <br>{{ $board->description }}
                            @endif
                        </td>

                        <td>{{ $board->replies->count() }}</td>

                        <td>{{ $board->threads->count() }}</td>

                        <td>
                            @if ($board->threads->count())
                                <?php
                                    $latest = $board->latest();
                                ?>

                                <a href="{{ route('forum.thread', [$board, $latest]) }}">{{ $latest->title }}</a>

                                <br>

                                <small>
                                    by
                                    <a href="{{ route('forum') }}">
                                        <img src="{{ asset('bitaac/theme-default/images/forum-latest.png') }}" class="forum-post-latest" width="8" height="8">
                                    </a>

                                    <a href="{{ $latest->player->link() }}">
                                        {{ $latest->player->name }}
                                    </a>,

                                    <abbr title="{{ date('M d Y, H:i:s T', $latest->timestamp) }}">
                                        {{ ago($latest->timestamp) }}
                                    </abbr>
                                </small>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no forum boards as of right now.</td>
                    </tr>
                @endforelse

                <tr class="header">
                    <th colspan="4"><small>All times are {{ date('T') }}.</small></th>
                </tr>
            </table>
        </div>
    </div>
@endsection
