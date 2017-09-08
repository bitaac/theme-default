@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('store') }}">Store</a> &rarr;
            Buy Points
        </div>

        <div class="panel-body">
            <div class="row">
                @if(config('bitaac.store.gateways.paypal.enabled'))
                    <div class="col-md-4">
                        <a href="{{ route('store.gateway', 'paypal') }}">
                            <img src="/bitaac/theme-default/images/paypal.png" width="170" height="51">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
