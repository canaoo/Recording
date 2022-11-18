 <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Keyboard Recordings</title>
        <link href="{{ secure_asset('build/assets/custom.css') }}" rel="stylesheet" media="all">
    </head>
    <body>
        <x-app-layout>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg center">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 style="font-size: 30px;">Keyboard Recordingsへようこそ</h1>
                            <br><br><p>ログインしました !</p><br>
                            <a href="{{ route('top') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">トップ画面へ</a><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>