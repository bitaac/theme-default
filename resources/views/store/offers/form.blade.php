@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('store') }}">Store</a> &rarr;
            <a href="{{ route('store.offers') }}">Buy Points</a> &rarr;
            {{ $gateway->presentable }}
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th></th>
                    <th width="57%">Product</th>
                    <th>Points</th>
                    <th>Price</th>
                    <th width="120"></th>
                </tr>

                @foreach ($gateway->offers as $price => $points)
                    <tr>
                        <td width="32" height="32" valign="middle" align="center"><img src="https://cdn.rawgit.com/pandaac-cdn/items/1076/2319.gif"></td>
                        <td>
                            <strong>Purchase {{ $points }} Points</strong><br>
                            <small>
                                These points are used to claim products from the store at any given time.
                            </small>
                        </td>
                        <td>{{ $points }}</td>
                        <td>{{ $price }} {{ $gateway->currency }}</td>
                        <td>
                            <form method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="amount" value="{{ $price }}">

                                @if (Auth::check())
                                    <input type="submit" value="Purchase points!" class="btn btn-primary">
                                @else
                                    <input type="submit" value="Login to purchase points!" class="btn btn-primary" disabled>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
