<tr>
    <td width="20%">
        @if (isset($i))
            <a name="{{ $i }}"></a>
        @endif

        <a href="{{ route('character', $post->player) }}">{{ $post->player->name }}</a>

        <br><br>

        <small>
            <strong>Vocation</strong> {{ $post->player->vocation->name }}<br>
            <strong>Level</strong> {{ $post->player->level }}<br>
            <strong>Posts</strong> {{ $post->player->posts->count() }}
        </small>
    </td>

    <td style="word-break: break-all;">
        {!! strip_tags($post->content, '<p><h1><h2><strong><em><b><i><ul><ol><li><u><strike><hr><br><a><img>') !!}
    </td>
</tr>

<tr>
    <td>
        <small>
            <abbr title="{{ date('M d Y, H:i:s T', strtotime($post->created_at)) }}">{{ ago(strtotime($post->created_at)) }}</abbr>
        </small>
    </td>

    <td>
        <small>
            @if (isset($i))
                #{{ $i }}
            @endif
        </small>
    </td>
</tr>
