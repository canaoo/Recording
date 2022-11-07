<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('マイページ') }}
                </h2>
            </x-slot>
            @foreach($recording as $rc)
            @if(Auth::id() == $rc->user_id)
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <p class="time" style="text-align:right;">{{ $rc->updated_at }}</p>
                    <form method="post" action="/recordings/edit">
                        @csrf
                        <input type="submit" value="編集">
                    </form>
                    <button>削除</button>
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
                            
                        </div>
                    </div>
                </div>
            </div>
            @endif 
           @endforeach
        </x-app-layout>
        <h2></h2>
        
    </body>
</html>