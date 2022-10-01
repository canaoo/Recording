<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <!--<link rel="stylesheet" href="./css/">-->
    </head>
    <body>
        <x-app-layout>
        <h1>Title</h1>
        @if (Route::has('login'))
            @auth
                <div class="header"><a href="">ユーザ名</a><br>
                    <a href="">Top</a>
                    <a href="">Timeline</a>
                    <a href="">Search</a>
                    <a href="">Mypage</a>
                    <a href="">Contact</a>
                <div>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                <a href="">Top</a>
            <a href="">Timeline</a>
            <a href="">Search</a>
            <a href="">Contact</a></div>
            @endauth
            <br>
            <!--<div class="header"><a href="/user/registar">新規登録 </a>
            <a href="/login.php">ログイン</a><br>-->
            
        @else
            
        @endif
        </x-app-layout>
    </body>
</html>