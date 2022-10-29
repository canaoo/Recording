<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>検索</title>
        <!--<link rel="stylesheet" href="./css/">-->
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('検索') }}
                </h2>
            </x-slot>
            
            
            
            <div class="py-12">
                <div>
                    <h2>検索する</h2>
                    <form method="get" action="/recordings/search">
                        @csrf
                        <p>
                            <input type="search" name="search" value="{{request('search')}}" placeholder="キーワードを入力">
                            <input type="submit">
                        </p>
                    </form>
                </div>
                @foreach($recording as $rc)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <br>
                        <p class="time">{{ $rc->updated_at }}</p>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <p class="music-name">{{ $rc->recording_name }}</p>
                                <p class="hashtag">{{ $rc->hashtag_id }}</p>
                                <p class="tag">{{ $rc->tag_id }}</p>
                                <p class="user-name">{{ $rc->user_id }}</p>
                                <p class="memo">{{ $rc->memo }}</p>
                                <p class="memo">{{ $rc->recording_file }}</p>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
        </x-app-layout>
    </body>
</html>