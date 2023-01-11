<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>お問い合わせ</title>
        <link href="{{ secure_asset('build/assets/custom.7447f65f.css') }}" rel="stylesheet" media="all">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight header">
                    {{ __('お問い合わせ') }}
                </h2>
            </x-slot>
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- 確認画面へ送る -->
                            <!-- 新しいコントローラ作成？→actionでconfirmに送れるように -->
                            <!-- 次、動作確認してみる -->
                            <form action="/recordings/contact" method="POST">
                                @csrf
                                <p><label>ユーザ名（任意）</label><br>
                                    <input type="text" name="name" style="width:300px;height:35px;"></p><br>
                                <p><label>メールアドレス</label><br>
                                    <input type="text" name="mail" style="width:300px;height:35px;"></p><br>
                                <p><label>件名</label><br>
                                    <input type="text" name="name" style="width:300px;height:35px;"></p><br>
                                <p><label>お問い合わせ内容</label><br>
                                    <textarea name="message" rows="3" cols="40"></textarea></p><br>
                                <button class="btn btn-success">確認する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </x-app-layout>
        <h2></h2>
        
    </body>
</html>