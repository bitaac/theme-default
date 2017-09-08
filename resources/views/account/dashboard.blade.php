@extends('bitaac::layouts.app')

@section('content')
    @if ($account->hasPendingEmail())
        <div class="alert alert-warning">
            <p>A request has been submitted to change the email address of this account to {{ $account->getPendingEmail() }}. <br> The actual change will take place after {{ $account->getPendingEmailTime() }}. <br> Please cancel the request if you do not want your email address to be changed! <a href="#">Click here to cancel</a></p>
        </div>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Account
        </div>

        <div class="panel-body">
            <table class="table">
                <tr class="header">
                    <th colspan="2">General Information</th>
                </tr>

                <tr>
                    <th width="20%">Account:</th>
                    <td>{{ $account->name }}</td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td>{{ $account->email }}</td>
                </tr>

                <tr>
                    <th>Created:</th>
                    <td>{{ $account->bitaac->created_at }}</td>
                </tr>

                <tr>
                    <th>Last Login:</th>
                    <td>{{ $account->bitaac->last_login }}</td>
                </tr>

                <tr>
                    <th>Account Status:</th>
                    <td>
                        @if ($days = $account->premium)
                            <span class="online">Premium account</span>
                        @else
                            Free Account
                        @endif
                    </td>
                </tr>

                @if (config('bitaac.account.two-factor'))
                    <tr>
                        <th>Two-Factor Authentication:</th>
                        <td>
                            @if ($account->secret)
                                <span class="online">Enabled</span>
                            @else
                                <span class="offline">Disabled</span>
                            @endif
                        </td>
                    </tr>
                @endif
            </table>

            <table>
                <tr>
                    <td width="100%">
                        <a href="{{ route('account.email') }}" class="btn btn-primary">Change Email</a>
                        <a href="{{ route('account.password') }}" class="btn btn-primary">Change Password</a>
                        @if (config('bitaac.account.two-factor'))
                            <a href="{{ route('account.authentication') }}" class="btn btn-primary">Two-Factor Authentication</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('account.logout') }}" class="btn btn-danger">Log Out</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Characters
        </div>

        <div class="panel-body">
            <table class="table">
                <tr class="header">
                    <th colspan="4">Characters</th>
                </tr>
                <tr>
                    <th width="70%">Name</th>
                    <th>Gender</th>
                    <th>Status</th>
                    {{-- <th></th> --}}
                </tr>

                @forelse($account->characters as $character)
                    <tr>
                        <td>
                            {{ $loop->iteration }}.
                            <a href="{{ $character->link() }}">{{ $character->name }}</a>
                            <em class="desc">(Level {{ $character->level . ' ' . $character->vocation->name }})</em>
                            @if ($character->hasPendingDeletion())
                                <font color="red">DELETED</font>
                                <a href="{{ url_e('/account/undelete/:name', ['name' => $character->name]) }}">
                                    (cancel)
                                </a>
                            @endif
                        </td>
                        <td>{{ gender($character->sex) }}</td>
                        @if ($character->isOnline())
                            <td><div class="online">online</div></td>
                        @else
                            <td>offline</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">You do not have any characters as of right now, why don't you go ahead and create one?</td>
                    </tr>
                @endforelse
            </table>

            <a href="{{ route('account.character') }}" class="btn btn-primary">Create Character</a>
            <a href="{{ route('account.character.delete') }}" class="btn btn-danger">Delete Character</a>
        </div>
    </div>
@endsection
