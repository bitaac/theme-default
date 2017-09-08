@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create Guild
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Leader:</label>
                    <select name="leader" class="form-control">
                        @foreach($account->characters as $character)
                            <option value="{{ $character->id }}">
                                {{ $character->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Create" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
