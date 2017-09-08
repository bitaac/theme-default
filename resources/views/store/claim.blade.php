@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('store') }}">Store</a> &rarr;
            {{ $product->count }}x {{ $product->title }} &rarr;
            Claim
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Character:</label>

                    <select name="character" class="form-control">
                        @foreach (Auth::user()->characters as $character)
                            <option value="{{ $character->id }}">{{ $character->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Claim" class="btn btn-primary">
                <a href="{{ route('store') }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
