@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Who Is Online
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th width="70%">Name</th>
                    <th>Level</th>
                    <th>Vocation</th>
                </tr>

                @forelse ($players as $player)
                    <tr>
                        <td><a href="{{ $player->link() }}">{{ $player->name }}</a></td>
                        <td>{{ $player->level }}</td>
                        <td>{{ $player->vocation->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">There are no players online at this moment.</td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
@endsection
