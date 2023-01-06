<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>管理画面</title>
        <link href="{{ secure_asset('build/assets/custom.css') }}" rel="stylesheet" media="all">
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
                    <p class="time" style="text-align: right;">{{ $rc->updated_at }}</p>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                           <!-- お問い合わせを表で表示：foreach使用する -->
                           <!-- 管理者用のデータベースも必要→id,user_id userとリレーション -->
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>