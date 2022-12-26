<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
        <link href="{{ secure_asset('build/assets/custom.css') }}" rel="stylesheet" media="all">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight header">
                    {{ __('マイページ') }}
                </h2>
            </x-slot>
            <div class="post">
            @foreach($recording as $rc)
            @if(Auth::id() == $id=$rc->user_id)
            <div class="py-12 size">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <p class="time" style="text-align:right;">{{ $rc->updated_at }}</p>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if($rc->recording_file)
                                <p class="music-name" style="font-size:110%;font-weight: bold;">{{ $rc->recording_name }}</p>
                                <p>{{ $rc->memo }}</p>
                                <p>{{ $rc->hashtag_id }}</p>
                                <p>{{ $rc->tag_id }}</p>
                                <audio controls src="{{ $rc->recording_file }}"></audio>
                                <br>
                            @endif
                            <form method="post" action="/recordings/edit">
                                @csrf
                                <button type="submit">編集</button>
                                <input type="hidden" name="recording_id" value="{{ $rc->recording_id }}">
                                <input type="hidden" name="recording_name" value="{{ $rc->recording_name }}">
                            </form>
                            <form method="post" action="/recordings/delete">
                                @csrf
                                <button type="submit">削除</button>
                                <input type="hidden" name="recording_id" value="{{ $rc->recording_id }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif 
           @endforeach
           </div>
            <div class="custom profile fixed">
                <div class="overflow-hidden sm:rounded-lg p-6 bg-white border-b border-gray-200">
                    @if(Auth::id() == $id)
                    <h3>プロフィール</h3>
                    <hr>
                    <br>
                    <p>{{ Auth::user()->name }} さん</p>
                    <br>
                    <p><投稿数> 3件</p>
                    @endif
                </div>
            </div>

        </x-app-layout>
        <h2></h2>
        
    </body>
</html>