@extends('bitaac::layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Filter
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="skill" class="form-control">
                                @foreach ($highscore->getSkills() as $key => $value)
                                    <option value="{{ $key }}" {{ ($highscore->getSkillPresentable($skill) == $highscore->getSkillPresentable($key)) ? 'selected': '' }}>
                                        {{ $highscore->getSkillPresentable($key) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="vocation" class="form-control">
                                @foreach (config('bitaac.server.vocations', []) as $key => $value)
                                    <option value="{{ $key }}" {{ ($key == $vocation) ? 'selected': '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Search" class="btn btn-primary">
                <a href="{{ route('highscores') }}" class="btn btn-primary">Clear</a>
            </form>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Highscores
        </div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>#</th>
                    @if ($highscore->getSkill() == 'experience')
                        <th width="76%">Name</th>
                        <th width="8%">Level</th>
                        <th width="16%">Experience</th>
                    @else
                        <th width="84%">Name</th>
                        <th width="16%">{{ $highscore->getSkillPresentable() }}</th>
                    @endif
                </tr>

                {{-- Characters. --}}
                @forelse ($pagination = $highscore->getHighscore() as $key => $character)
                    <tr>
                        <td>{{{ (++$key) + (($pagination->currentPage() - 1) * $pagination->perPage()) }}}</td>
                        <td>
                            <a href="{{ route('character', $character) }}">{{ $character->name }}</a>
                            <em style="font-size: 90%; opacity: .5;">(Level {{ $character->level . ' ' . vocation($highscore->vocation)}})</em>
                        </td>
                        <td>{{ $character->value }}</td>
                        @if ($highscore->getSkill() == 'experience')
                            <td>{{ $character->experience }}</td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no ranked characters as of right now.</td>
                    </tr>
                @endforelse
            </table>

            @if ($pagination->hasPages())
                <nav>
                    <ul class="pager">
                        @if ($previous = $pagination->previousPageUrl())
                            <li class="previous"><a href="{{ $previous }}"><span aria-hidden="true">&larr;</span> Previous</a></li>
                        @endif

                        @if ($next = $pagination->nextPageUrl())
                            <li class="next"><a href="{{ $next }}">Next <span aria-hidden="true">&rarr;</span></a></li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </div>
@endsection
