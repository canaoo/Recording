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
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <button>編集</button>
                    <button>削除</button>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if($rc->user_id = Auth::id())
                            @if($rc->recording_file)
                                <h4>{{ $rc->recording_name }}</h4>
                                <p>{{ $rc->memo }}</p>
                                <p>{{ $rc->hashtag_id }}</p>
                                <p>{{ $rc->tag_id }}</p>
                                <audio controls src="{{ $rc->recording_file }}"></audio>
                                <br>
                            @endif
                            @endif        
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            @endforeach
           
        </x-app-layout>
        <h2></h2>
        
    </body>
</html>