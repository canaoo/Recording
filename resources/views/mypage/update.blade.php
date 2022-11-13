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
                    {{ __('録音情報の編集') }}
                </h2>
            </x-slot>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="/recordings/update" method="post">
                                @csrf
                                <p>曲名を変更する</p>
                                <input type="text" name="recording_name" value="{{$name}}">
                                <br>
                                <button type="button" onclick="history.back()">戻る</button>
                                <input type="submit" name="action" value="保存する">
                                <input type="hidden" name="recording_id" value="{{$id}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
        
    </body>
</html>