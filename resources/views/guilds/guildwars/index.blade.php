@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Guild Wars
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Agressor</th>
                    <th>Death Count</th>
                    <th>Defender</th>
                    <th></th>
                </tr>

                @forelse ($wars as $war)
                    <tr>
                        <td><a href="{{ route('guild', $war->aggressor->guild) }}">{{ $war->aggressor->guild->name }}</a></td>
                        <td>{{ $war->aggressor->kills->count() }} - {{ $war->defender->kills->count() }}</td>
                        <td><a href="{{ route('guild', $war->defender->guild) }}">{{ $war->defender->guild->name }}</a></td>
                        <td width="10%">
                            @if ($war->isPending())
                                <span class="label label-default">pending</span>
                            @elseif ($war->isActive())
                                <span class="label label-success">active</span>
                            @elseif ($war->isCancelled())
                                <span class="label label-danger">cancelled</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no guild wars at the moment.</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
