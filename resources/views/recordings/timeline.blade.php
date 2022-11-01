<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>タイムライン</title>
        <!--<link rel="stylesheet" href="./css/">-->
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('タイムライン') }}
                </h2>
            </x-slot>
            
            @foreach($recording as $rc)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <p class="time">{{ $rc->updated_at }}</p>
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
            </div>
            @endforeach
        </x-app-layout>
    </body>
</html>