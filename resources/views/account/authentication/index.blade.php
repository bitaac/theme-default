@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Two-Factor Authentication
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $google2fa_url }}"> 
                        </div>

                        <div class="col-md-8">
                            <li>Scan the QR code with <b>Google Authenticator</b> or <b>Authy</b>.</li>
                            <li>Write the generated token into the field below and press enable/disable.</li>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Token:</label>
                    <input type="text" name="secret" class="form-control"> 
                </div>

                @if ($account->secret)
                    <input type="submit" value="Disable" class="btn btn-primary">
                @else
                    <input type="submit" value="Enable" class="btn btn-primary">
                @endif

                <a href="{{ route('account') }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection