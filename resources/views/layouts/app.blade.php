<!DOCTYPE html>
<html>
<head>
    <title></title>

    {{-- Fonts --}}
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- Styles --}}
    <link rel="stylesheet" type="text/css" href="/bitaac/theme-default/css/app.css">
    @stack('styles')
</head>
<body>
    @if (Session::has('bitaac:impersonator'))
        <div style="background: #fff; padding: 25px; text-align:center; color: #000;">
            You are impersonating account <strong>{{ $account->name }}</strong>.<br><br> <a href="{{ route('admin.account.impersonate.stop', $account) }}">(cancel)</a>
        </div>
    @endif

    <div id="app">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ config('laravel.app.name', 'Laravel') }}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ route('index') }}">Latest News</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Community <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('character.search') }}">Characters</a></li>
                                <li><a href="{{ route('highscores') }}">Highscores</a></li>
                                <li><a href="{{ route('guilds') }}">Guilds</a></li>
                                <li><a href="{{ route('deaths') }}">Latest Deaths</a></li>
                                <li><a href="{{ route('forum') }}">Forum</a></li>
                                <li><a href="{{ route('faq') }}">Faq</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Store <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('store.offers') }}">Buy Points</a></li>
                                <li><a href="{{ route('store') }}">Shop Offers</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @auth
                            @if ($account->isAdmin())
                                <li><a href="{{ route('admin') }}">Adminpanel</a></li>
                            @endif
                            <li><a href="{{ route('account') }}">My Account</a></li>
                            <li><a href="{{ route('account.logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('bitaac::partials.notifications')

                    @yield('content')
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Server Information
                        </div>

                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td width="35%">Status</td>
                                    <td>
                                        @if (isServerOnline())
                                            <span class="label label-success">online</span>
                                        @else
                                            <span class="label label-danger">offline</span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Online</td>
                                    <td>
                                        <a href="{{ route('online') }}">
                                            {{ getOnlinePlayersCount() }} players online
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="/bitaac/theme-default/js/app.js"></script>
    @stack('scripts')
</body>
</html>
