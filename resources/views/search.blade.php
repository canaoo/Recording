<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>検索</title>
        <link href="{{ secure_asset('build/assets/custom.7447f65f.css') }}" rel="stylesheet" media="all">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight header">
                    {{ __('検索') }}
                </h2>
            </x-slot>
            <div class="py-12">
                <div>
                    <form method="get" action="/recordings/search">
                        @csrf
                        <p style="margin-left: 5%;">
                            <input type="search" name="search" value="{{request('search')}}" placeholder="曲名で検索">
                            <input type="submit" value="検索" class="btn">
                        </p>
                    </form>
                </div>
                <br>
                @foreach($recording as $rc)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <br>
                        <p class="time" style="text-align: right;">{{ $rc->updated_at }}</p>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <p class="music-name" style="font-size:110%;font-weight: bold;">{{ $rc->recording_name }}</p>
                                <p class="hashtag">{{ $rc->hashtag_id }}</p>
                                <p class="tag">{{ $rc->tag_id }}</p>
                                <p class="user-name">{{ $rc->user->name }}</p>
                                <p class="memo">{{ $rc->memo }}</p>
                                <audio controls src="{{ $rc->recording_file }}"></audio>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
            
        </x-app-layout>
    </body>
</html>