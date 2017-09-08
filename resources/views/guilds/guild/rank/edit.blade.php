@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Ranks
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Set Rank Name:</label>
                    <select name="rank" class="form-control">
                        @foreach ($guild->getRanks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>To:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <input type="submit" value="Submit" class="btn btn-primary">
                <a href="{{ route('guild', $guild) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
