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
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('トップ') }}
                </h2>
            </x-slot>
            
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!--<nav style="text-align:right;">
                        <a href="#概要" class="text-sm text-gray-700 dark:text-gray-500 underline">Webアプリの概要</a>
                        <a href="#操作方法"  class="text-sm text-gray-700 dark:text-gray-500 underline">ピアノの操作方法</a>
                    </nav>-->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <button id="startBtn"><img src="https://user-images.githubusercontent.com/109420472/206719628-31dd1da2-771b-4972-883f-a2cba432ccf5.png"></button>
                            <button id="stopBtn"><img src="https://user-images.githubusercontent.com/109420472/206719937-091bd03b-f25e-49b4-9145-ba1d39e8ce7f.png"></button>
                            <br>
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
                            <form enctype="multipart/form-data">
                                @csrf
                                <a id="download" download="test.wav">ダウンロード</a>
                                <button id="resetBtn">リセット</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ログインユーザのみに投稿フォームを表示する -->
            @if (Auth::user() != null)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h4 style="font-size:140%;font-weight: bold;">投稿フォーム</h4>
                            @if ($errors->any())
                                <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                                </ul>
                            @endif
                            
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <form action="/recordings/process" method="post" enctype="multipart/form-data" style="display:inline">
                                @csrf
                                <p><lavel>曲名</lavel>
                                    <input type="text" name="recording_name" required></p><br>
                                <p><lavel>音声ファイル</lavel>
                                    <input type="file" accept="audio/wav" name="recording_file" required></p>
                                <br>
                                <input type="submit" value="保存">
                            </form>
                            <br>
                            <br>
                            <!--<h1 id="概要">Webアプリの概要</h1>
                            <p>Web Audio APIを用いて作られています。</p><br>
                            <h1 id="操作方法">キーボードの操作方法</h1>
                            <p>マウスでクリックしてください。</p><br>-->
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <script src="{{ secure_asset('build/assets/main.js') }}"></script>
        </x-app-layout>
    </body>
</html>