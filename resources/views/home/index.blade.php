@extends('bitaac::layouts.app')

@section('content')
    @forelse ($articles as $article)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ date('M d Y', $article->timestamp) }} - {{ $article->title }}
            </div>

            <div class="panel-body" style="word-break: break-all;">
                {!! strip_tags($article->content, '<p><h1><h2><strong><em><b><i><ul><ol><li><u><strike><hr><br><a><img>') !!}
            </div>

            <div class="panel-footer">
                Published by <a href="{{ $article->player->link() }}">{{ $article->player->name }}</a> in <a href="{{ $article->board->link() }}">{{ $article->board->title }}</a> (<a href="{{ $article->link() }}">{{ $article->replies->count() }}</a>).
            </div>
        </div>
    @empty
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ date('M d Y') }} - Welcome to bitaac
            </div>

            <div class="panel-body">
                Hello & welcome to bitaac! <br>
                This is just a placeholder news, you can remove it anytime by create a news record
                <a href="{{ url('/forum/latest-news') }}">here</a>.
            </div>
        </div>
    @endforelse
@endsection
