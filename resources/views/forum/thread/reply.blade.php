@extends('bitaac::layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="/bitaac/theme-default/plugins/wysiwyg/ui/trumbowyg.min.css">
@endpush

@push('scripts')
    <script src="/bitaac/theme-default/plugins/wysiwyg/trumbowyg.min.js"></script>
    <script type="text/javascript">
        $('#wysiwyg').trumbowyg({
            fullscreenable: false
        });
    </script>
@endpush

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('forum') }}">Forum</a> &rarr;
            <a href="{{ route('forum.board', $board) }}">{{ $board->title }}</a> &rarr;
            @if ($thread->locked)
                <i class="fa fa-lock" aria-hidden="true"></i>
            @endif
            <a href="{{ route('forum.thread', [$board, $thread]) }}">{{ $thread->title }}</a> &rarr;
            Reply
        </div>

        <div class="panel-body">
            <form method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Author:</label>

                    <select name="author" class="form-control">
                        @foreach ($account->characters as $character)
                            <option value="{{ $character->id }}">{{ $character->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Content:</label>
                    <textarea name="content" id="wysiwyg">{{ old('content') }}</textarea>
                </div>

                <input type="submit" value="Reply" class="btn btn-primary">
                <a href="{{ route('forum.thread', [$board, $thread]) }}" class="btn">Back</a>
            </form>
        </div>
    </div>
@endsection
