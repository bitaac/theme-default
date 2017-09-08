@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Guilds
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Logo</th>
                    <th width="100%">Description</th>
                    <th></th>
                </tr>

                @forelse ($guilds as $guild)
                    <tr>
                        <td>
                            @if ($guild->bitaac->logo)
                                <img src="{{ $guild->logoLink() }}" width="64" height="64">
                            @else
                                <img src="{{ asset('bitaac/theme-default/images/guild.gif') }}" width="64" height="64">
                            @endif
                        </td>

                        <td>
                            <strong>{{ $guild->name }}</strong>

                            @if ($guild->bitaac->description)
                                <br>{{ $guild->bitaac->description }}
                            @endif
                        </td>

                        <td>
                            <a href="{{ $guild->link() }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">There are no guilds as of right now, why dont you go ahead and create one?</td>
                    </tr>
                @endif
            </table>

            <a href="{{ route('guilds.create') }}" class="btn btn-primary">Create Guild</a>
        </div>
    </div>
@endsection
