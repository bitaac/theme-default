@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Store
        </div>

        <div class="panel-body">
            You currently have <span class="label label-success">{{ $account->bitaac->points }}</span> points.<br><br>

            <table class="table">
                @forelse ($products as $product)
                    <tr>
                        <td width="10%"><img src="{{ preg_replace('/\{item_id\}/i', $product->item_id, config('bitaac.app.images')) }}" width="32" height="32"></td>

                        <td width="90%" style="vertical-align: middle;">
                            <strong>{{ $product->count }}x {{ $product->title }}</strong> ({{ $product->points }} points)
                            @if ($product->description)
                                <br>{{ e(lines($product->description, 3)) }}
                            @endif
                        </td>

                        <td>
                            @if (Auth::check() and Auth::user()->bitaac->points >= $product->points)
                                <a href="{{ route('store.claim', $product) }}" class="btn btn-primary">Claim</a>
                            @else
                                <a class="btn btn-primary" disabled>Claim</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>There are no products as of right now. You can still purchase points if you want to get a head start, but do so at your own incentive.</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
