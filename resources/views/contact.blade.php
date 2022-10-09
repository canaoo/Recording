<!DOCTYPE HTML>
<html>
    <head>
        <title>お問い合わせ</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('お問い合わせ') }}
                </h2>
            </x-slot>
            
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="" method="POST">
                                @csrf
                                <p><label>ユーザ名</label>
                                    <input type="text" name="name"></p><br>
                                <p><label>メールアドレス</label>
                                    <inpnut type="text" name="mail"></p><br>
                                <p><label>お問い合わせ内容</label>
                                    <textarea name="message" rows="3" cols="40"></textarea></p>
                                <button class="btn btn-success">送信する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </x-app-layout>
        <h2></h2>
        
    </body>
</html>