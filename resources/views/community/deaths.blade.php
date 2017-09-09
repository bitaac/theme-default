@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Latest Deaths
        </div>

        <div class="panel-body">
            <table class="table">
                @forelse ($deaths as $death)
                    <tr>
                        <td width="22%">{{ date('M d Y, H:i:s T', (int) $death->time) }}</td>

                        <td>
                            <a href="{{ route('character', $death->player) }}">
                                {{ $death->player->name }}
                            </a>

                            died on level {{ $death->level }} by

                            @if ($death->killed_by == $death->mostdamage_by)
                                @if ($death->is_player)
                                    <a href="{{ route('character', $death->killer) }}">{{ $death->killer->name }}</a>.
                                @else
                                    a {{ $death->killed_by }}.
                                @endif
                            @else
                                @if ($death->is_player)
                                    <a href="{{ route('character', $death->killer) }}">{{ $death->killer->name }}</a>
                                @else
                                    a {{ $death->killed_by }}
                                @endif

                                @if ($death->mostdamage_is_player)
                                    and <a href="{{ route('character', $death->mostDamagePlayer) }}">{{ $death->mostDamagePlayer->name }}</a>.
                                @else
                                    and a {{ $death->mostdamage_by }}.
                                @endif
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">There are no deaths to show.</td>
                    </tr>
                @endif
            </table>

            @if (config('bitaac.community.deaths-pagination') and $deaths->hasPages())
                <nav>
                    <ul class="pager">
                        @if ($previous = $deaths->previousPageUrl())
                            <li class="previous"><a href="{{ $previous }}"><span aria-hidden="true">&larr;</span> Previous</a></li>
                        @endif

                        @if ($next = $deaths->nextPageUrl())
                            <li class="next"><a href="{{ $next }}">Next <span aria-hidden="true">&rarr;</span></a></li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>
@endsection
