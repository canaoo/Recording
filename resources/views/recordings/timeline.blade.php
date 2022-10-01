<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <!--<link rel="stylesheet" href="./css/">-->
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('TimeLine') }}
                </h2>
            </x-slot>
            
            @foreach($recording as $rc)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <p class="time">Fri Sep 23 2022</p>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h4 class="music-name">{{ $rc->name }}</h4>
                            <p class="hashtag">{{ $rc->hashtag_id }}</p>
                            <p class="tag">{{ $rc->tag_id }}</p>
                            <p class="user-name">{{ $rc->user_id }}</p>
                            <p class="memo">{{ $rc->memo }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </x-app-layout>
    </body>
</html>