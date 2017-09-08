@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create Character
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label>Gender:</label>
                    @foreach (config('bitaac.character.create-genders', []) as $gender)
                        <label>
                            <input type="radio" name="gender" value="{{ $gender }}" {{ $loop->first ? 'checked' : '' }}> {{ gender($gender) }}
                        </label>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Gender:</label>
                    @foreach (config('bitaac.character.create-vocations') as $vocation)
                        <label>
                            <input type="radio" name="vocation" value="{{ $vocation }}" {{ $loop->first ? 'checked' : '' }}> {{ vocation($vocation) }}
                        </label>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Gender:</label>
                    @foreach (config('bitaac.character.create-towns') as $town)
                        <label>
                            <input type="radio" name="town" value="{{ $town }}" {{ $loop->first ? 'checked' : '' }}>{{ town($town) }}
                        </label>
                    @endforeach
                </div>

                <input type="submit" value="Create" class="btn btn-primary">
                <a class="btn" href="{{ url('/account') }}">Back</a>
            </form>
        </div>
    </div>
@endsection