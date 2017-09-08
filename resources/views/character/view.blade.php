@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Character Information
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th width="22%">Name:</th>
                    <td>{{ $player->name }}</td>
                </tr>

                <tr>
                    <th>Gender</th>
                    <td>{{ $player->gender->name }}</td>
                </tr>

                <tr>
                    <th>Profession:</th>
                    <td>{{ $player->vocation->name }}</td>
                </tr>

                <tr>
                    <th>Level:</th>
                    <td>{{ $player->level }}</td>
                </tr>

                <tr>
                    <th>Residence:</th>
                    <td>{{ $player->town->name }}</td>
                </tr>

                @if ($player->guild)
                    <tr>
                        <th>Guild:</th>
                        <td>
                            He is {{ $player->guild->rank->name }} of
                            <a href="{{ $player->guild->link() }}">{{ $player->guild->name() }}</a>
                        </td>
                    </tr>
                @endif

                <tr>
                    <th>Last Login:</th>
                    <td>
                        @if ($player->lastlogin)
                            {{ date('M d Y, H:i:s T', $player->lastlogin) }}
                        @else
                            Never logged in.
                        @endif
                    </td>
                </tr>

                @if ( ! empty($player->bitaac->comment))
                    <tr>
                        <th valign="top">Comment:</th>
                        <td>{{ nl2br(e(lines($player->bitaac->comment, 10))) }}</td>
                    </tr>
                @endif

                <tr>
                    <th>Account Status:</th>
                    <td>
                        @if ($player->account->premium)
                            <span class="online">Premium Account</span>
                        @else
                            Free Account
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    @if ($deaths->count())
        <div class="panel panel-default">
            <div class="panel-heading">
                Deaths
            </div>

            <div class="panel-body">
                <table class="table">
                    @foreach ($deaths as $death)
                        <tr>
                            <td width="22%">{{ date('M d Y, H:i:s T', (int) $death->time) }}</td>
                            <td>
                                {{
                                    str_e('Killed at level :level by :killed_by and :mostdamage_by.', [
                                        'level'         => $death->level,
                                        'killed_by'     => $death->killed_by,
                                        'mostdamage_by' => $death->mostdamage_by
                                    ])
                                }}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif

    @if ( ! $player->isHidden())
        <div class="panel panel-default">
            <div class="panel-heading">
                Account Information
            </div>

            <div class="panel-body">
                @if ($player->account->birthday())
                    <table class="table">
                        <tr>
                            <th width="22%">Created</th>
                            <td>{{{ date('M d Y, H:i:s T', $player->account->birthday()) }}}</td>
                        </tr>
                    </table>

                    <table class="table">
                        <tr>
                            <th width="70%">Name</th>
                            <th>Level</th>
                            <th>Vocation</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($player->account->characters as $key => $character)
                            <tr>
                                <td>
                                    {{ ++$key }}.
                                    @if ($player->id === $character->id)
                                        {{ $character->name }}
                                        <em style="font-size: 90%; opacity: .5;">(currently viewing)</em>
                                    @else
                                        <a href="{{ $character->link() }}">{{{ $character->name }}}</a>
                                    @endif
                                </td>

                                <td>{{ $character->level }}</td>

                                <td>{{ $character->vocation->name }}</td>

                                <td>
                                    @if ($character->isOnline())
                                        <span class="online">online</span>
                                    @else
                                        offline
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Search Character
        </div>

        <div class="panel-body">
            <form method="POST" action="{{ route('character.search') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Character:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <input type="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
