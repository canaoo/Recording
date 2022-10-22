<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordings;
use Storage;

class SaveController extends Controller
{
    /*public function index(Test $test)
    {
        $test = Test::all();
        return view('test/index',['test'=>$test]);
    }
    
    public function add()
    {
        return view('test/create');
    }*/

    public function create(Request $request, Recordings $recording)
    {
        $form = $request->all();

        //s3アップロード開始
        $wav = $request->file('recording_file');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $wav, 'public');
        // アップロードした画像のフルパスを取得
        $recording->recording_file = Storage::disk('s3')->url($path);
        $recording->recording_name = $request->input('recording_name');
        

        $recording->save();

        return view('test/index')->with(['recording' => $recording->get()]);
    }
}