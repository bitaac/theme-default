@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Guild
        </div>

        <div class="panel-body">
            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>
                        @if ($guild->bitaac->logo)
                            Logo:
                            <small>(<a href="{{ URL::current() . '/deletelogo' }}">Remove</a>)</small>:
                        @else
                            Logo:
                        @endif
                    </label>
                    @if ($guild->bitaac->logo)
                        <img src="{{ $guild->logoLink() }}" width="64" height="64">
                    @else
                        <img src="{{ asset('bitaac/theme-default/images/guild.gif') }}" width="64" height="64">
                    @endif
                </div>

                <div class="form-group">
                    <label>New Logo:</label>
                    <input type="file" name="logo" class="form-control">
                </div>

                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="description" class="form-control">{{ lines($guild->bitaac->description, 5) }}</textarea>
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="{{ route('guild', $guild) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
