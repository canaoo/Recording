<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Keyboard Recordings</title>
        <link href="{{ secure_asset('build/assets/piano.css') }}" rel="stylesheet" media="all">
        <link href="{{ secure_asset('build/assets/custom.css') }}" rel="stylesheet" media="all">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight header">
                    {{ __('トップ') }}
                </h2>
            </x-slot>
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 keyboard">
                            <!-- 操作ボタン -->
                            <div class="recording_button">
                                <button id="startBtn"><img src="https://user-images.githubusercontent.com/109420472/206719628-31dd1da2-771b-4972-883f-a2cba432ccf5.png">録音</button>
                                <button id="stopBtn"><img src="https://user-images.githubusercontent.com/109420472/206719937-091bd03b-f25e-49b4-9145-ba1d39e8ce7f.png">停止</button>
                                <button id="resetBtn"><img src="https://user-images.githubusercontent.com/109420472/206908056-2343e466-070a-488c-aaba-c73997e0fe84.png">リセット</button>
                                <br>
                            </div>
                            <!-- キーボード本体 -->
                            <div id="wrap"> 
                                <div id="inline-block_w1"><button class="white"></button></div><!-- C -->
                                <div id="inline-block_b1"><button class="black"></button></div><!-- C# -->
                                <div id="inline-block_w2"><button class="white"></button></div><!-- D -->
                                <div id="inline-block_b2"><button class="black"></button></div><!-- D# -->
                                <div id="inline-block_w3"><button class="white"></button></div><!-- E -->
                            
                                <div id="inline-block_w4"><button class="white"></button></div><!-- F -->
                                <div id="inline-block_b4"><button class="black"></button></div><!-- F# -->
                                <div id="inline-block_w5"><button class="white"></button></div><!-- G -->
                                <div id="inline-block_b5"><button class="black"></button></div><!-- G# -->
                                <div id="inline-block_w6"><button class="white"></button></div><!-- A -->
                                <div id="inline-block_b6"><button class="black"></button></div><!-- A# -->
                                <div id="inline-block_w7"><button class="white"></button></div><!-- B -->
                              
                                <div id="inline-block_w8"><button class="white"></button></div><!-- C -->
                            </div>
                            <br>
                            <!-- オーディオプレイヤーの表示 -->
                            <audio controls id="audio"></audio>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ログインユーザのみに表示する -->
            @auth
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h4 style="font-size:140%;font-weight: bold;">投稿フォーム</h4>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- 投稿フォーム -->
                            <form action="/recordings/process" method="post" enctype="multipart/form-data" style="display:inline">
                                @csrf
                                <p><lavel>曲名</lavel>
                                    <input type="text" name="recording_name" required></p><br>
                                <p><lavel>音声ファイル</lavel>
                                    <input type="file" accept="audio/wav" name="recording_file" required></p>
                                <br>
                                <input type="submit" value="投稿" class="btn">
                            </form>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
            <script src="{{ secure_asset('build/assets/main.js') }}"></script>
        </x-app-layout>
    </body>
</html>