<!DOCTYPE HTML>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        @foreach($test as $ts)
            @if($ts->path)
                <a href="{{ $ts->path }}">wavファイルへ</a>
                <audio controls id="audio"><a href="{{ $ts->path }}"></a></audio>
            @endif
        @endforeach
    </body>
</html>
