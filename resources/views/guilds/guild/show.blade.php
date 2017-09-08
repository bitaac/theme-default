@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Guild Information
        </div>

        <div class="panel-body">
            <table class="table">
                <tr class="transparent noborderpadding">
                    <th>
                        @if ($guild->bitaac->logo)
                            <img src="{{ $guild->logoLink() }}" width="64" height="64">
                        @else
                            <img src="{{ asset('bitaac/theme-default/images/guild.gif') }}" width="64" height="64">
                        @endif
                    </th>

                    <th width="100%" class="text-center">
                        <h1>{{ $guild->name }}</h1>
                    </th>

                    {{-- Right logo field. --}}
                    <th>
                        @if ($guild->bitaac->logo)
                            <img src="{{ $guild->logoLink() }}" width="64" height="64">
                        @else
                            <img src="{{ asset('bitaac/theme-default/images/guild.gif') }}" width="64" height="64">
                        @endif
                    </th>
                </tr>

                {{-- Description field. --}}
                <tr class="transparent noborderpadding">
                    <td colspan="3">
                        @if ($guild->description)
                            <p>{{ nl2br(e(lines($guild->description, 5))) }}</p>
                        @endif
                    </td>
                </tr>
            </table>

            {{-- Edit & disband guild buttons (leaders & owners only). --}}
            @if ($auth && $hasLeader)
                <p>
                    <a href="{{ URL::current() . '/edit' }}" class="btn btn-primary">Edit</a>

                    @if ($hasOwner)
                        <td align="right">
                            <a href="{{ URL::current() . '/disband' }}" class="btn btn-primary">Disband</a>
                        </td>
                    @endif
                </p>
            @endif

            <table class="table">
                <tr>
                    <th width="25%">Rank</th>
                    <th width="50%">Name</th>
                    <th width="9%">Level</th>
                    <th>Vocation</th>
                </tr>

                @foreach ($guild->getRanks as $rank)
                    <?php $iteration = $loop->iteration % 2 == 0 ? 'odd' : 'even'; ?>

                    {{-- Rank members. --}}
                    @foreach ($rank->getMembers as $k => $member)
                        <tr class="{{ $iteration }}">
                            {{-- Rank field. --}}
                            <td>
                                @if ($k == 0)
                                    {{ $rank->name }}
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('character', $member->player) }}">{{ $member->player->name }}</a>

                                @if ($member->nick)
                                    ({{ $member->nick }})
                                @endif
                            </td>

                            {{-- Level field. --}}
                            <td>{{ $member->player->level }}</td>

                            {{-- Vocation field. --}}
                            <td>{{ $member->player->vocation->name }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </table>

            {{-- Various member buttons. --}}
            @if ($auth and $hasMember)
                {{-- Edit ranks (leaders & owners only). --}}
                @if ($hasViceLeader or $hasOwner or $hasLeader)
                    <a href="{{ route('guild.ranks', $guild) }}" class="btn btn-primary">Edit Ranks</a>
                @endif

                {{-- Edit members (vice leaders, leaders & owners only). --}}
                @if ($hasViceLeader or $hasOwner or $hasLeader)
                    <a href="{{ route('guild.members', $guild) }}" class="btn btn-primary">Edit Members</a>
                @endif

                {{-- Leave guild (everyone except the owner). --}}
                @if ($account->getGuildCharactersExpectOwner($guild))
                    <a href="{{ route('guild.leave', $guild) }}" class="btn btn-primary">Leave Guild</a>
                @endif
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Invites
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th width="75%">Name</th>
                    <th width="9%">Level</th>
                    <th>Vocation</th>
                </tr>

                @forelse ($guild->getInvites as $invite)
                    <tr>
                        {{-- Name field. --}}
                        <td>
                            <a href="{{ $invite->player->link() }}">
                                {{ $invite->player->name }}
                            </a>
                        </td>

                        {{-- Level field. --}}
                        <td>{{ $invite->player->level }}</td>

                        {{-- Vocation field. --}}
                        <td>{{ $invite->player->vocation->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">There are no invites as of right now.</td>
                    </tr>
                @endforelse
            </table>

            @if ($auth and $hasMember or $hasInvite)
                {{-- Join guild button (invitees only). --}}
                @if ($hasInvite)
                    <a href="{{ URL::current() . '/join' }}" class="btn btn-primary">Join Guild</a>
                @endif

                {{-- Invite member button (vice leaders, leaders and owners only). --}}
                @if ($hasViceLeader or $hasLeader)
                    <a href="{{ URL::current() . '/invite' }}" class="btn btn-primary">Invite Character</a>
                @endif

                @if ($hasViceLeader or $hasLeader and $guild->getInvites->count() > 0)
                    <a href="{{ URL::current() . '/cancel' }}" class="btn btn-primary">Cancel Invite</a>
                @endif
            @endif
        </div>
    </div>
@endsection
