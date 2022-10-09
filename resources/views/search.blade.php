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
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h2>検索する</h2>
                    <form action="" method="POST">
                        @csrf
                        <p>
                            <input type="text">
                            <input type="submit">
                        </p>
                    </form>
                    <br>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            
                        </div>
                    </div>
                </div>
            </div>
           
        </x-app-layout>
    </body>
</html>