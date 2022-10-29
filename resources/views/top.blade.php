<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <link href="{{ secure_asset('build/assets/piano.css') }}" rel="stylesheet" media="all">
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
                    <nav style="text-align:right;">
                        <a href="#概要" class="text-sm text-gray-700 dark:text-gray-500 underline">Webアプリの概要</a>
                        <a href="#操作方法"  class="text-sm text-gray-700 dark:text-gray-500 underline">ピアノの操作方法</a>
                    </nav>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <button id="startBtn">録音開始</button>
                            <button id="stopBtn">録音停止</button>
                            <br>
                            <div id="wrap"> 
                                <div id="inline-block_w1"><button class="white"></button></div>
                                <div id="inline-block_b1"><button class="black"></button></div>
                                <div id="inline-block_w2"><button class="white"></button></div>
                                <div id="inline-block_b2"><button class="black"></button></div>
                                <div id="inline-block_w3"><button class="white"></button></div>
                            
                                <div id="inline-block_w4"><button class="white"></button></div>
                                <div id="inline-block_b4"><button class="black"></button></div>
                                <div id="inline-block_w5"><button class="white"></button></div>
                                <div id="inline-block_b5"><button class="black"></button></div>
                                <div id="inline-block_w6"><button class="white"></button></div>
                                <div id="inline-block_b6"><button class="black"></button></div>
                                <div id="inline-block_w7"><button class="white"></button></div>
                              
                                <div id="inline-block_w8"><button class="white"></button></div>
                            </div>
                            <br />
                            <audio controls id="audio"></audio>
                            <br />
                            <form enctype="multipart/form-data">
                                @csrf
                                <a id="download" download="test.wav">ダウンロード</a>
                                <button id="resetBtn">リセット</button>
                            </form>
                            <br>
                            @if ($errors->any())
                                <ul>
                            @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                                </ul>
                            @endif
                            @if (Auth::user() != null)
                           
                            <form action="/recordings/process" method="post" enctype="multipart/form-data" style="display:inline">
                                @csrf
                                <p><lavel>曲名</lavel>
                                    <input type="text" name="recording_name"></p><br>
                                <p><lavel>音声ファイル</lavel>
                                    <input type="file" accept="audio/wav" name="recording_file"></p>
                                    
                                <input type="submit" value="保存">
                            </form>
                            @endif
                            <br>
                            <br>
                            <h1 id="概要">Webアプリの概要</h1>
                            <p></p><br>
                            <h1 id="操作方法">キーボードの操作方法</h1>
                            <p></p><br>
                            <script src="{{ secure_asset('build/assets/main.js') }}"></script>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>
</html>